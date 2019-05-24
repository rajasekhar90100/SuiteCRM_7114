<?php
/**
  * FileName => candidatesMfile.php
  * Created By => Udaykiran (Created On Aug-03-2017)
  * Modified By => Udaykiran (Modified On Apr-25-2018)
  * COMMENT => Create Candidate documents ,documentrevision records through multiple file upload
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;

class MultiDocuments {

    function mulDoc(&$bean, $event, $arguments) {
		global $db, $current_user,$app_list_strings,$sugar_config;

		$currentUser = $current_user->id;
		$canId=$bean->id;
		
		$canName =$bean->name;
		$canDoc = html_entity_decode($bean->document_upload);
		$gname = explode(',',$canDoc);
		// $bean->name = "Sachin";
		for($i=0;$i<count($gname);$i++){
			if(($gname[$i]!='')) {		
				if($gname[$i] != 'undefined')
				{
					if( strpos( $gname[$i], '----') !== false ) {
						$gname[$i]=	str_replace("----",",",$gname[$i] );
						
					}
					$sourcePath =  "upload/libreDocs/".$gname[$i];
					$filenameN = "upload/".$gname[$i];
					$filename = basename($filenameN); //Filename with extension

					$query = "SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM vedic_candidates_documents_1_c
							INNER JOIN documents ON vedic_candidates_documents_1_c.vedic_candidates_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND vedic_candidates_documents_1_c.deleted = '0'
							  AND vedic_candidates_documents_1vedic_candidates_ida ='$canId'
							  AND document_name LIKE '$gname[$i]'
							  AND category_id = 'Candidates'
							ORDER BY documents.date_entered DESC
							LIMIT 0,
								  1";
					$select_result = $db->query($query);
					$select_row = $db->fetchByAssoc($select_result);
					$documentAv = $select_row['id'];
					
					if($documentAv)
					{
						//If document record is available increase the revision value
						$document_id = $documentAv;
						$revID = $select_row['revID'];
						$select_revision = "select (revision+1) as revision from document_revisions where id = '$revID' and deleted = '0'";
						$result_rev = $db->query($select_revision);
						$row_rev = $db->fetchByAssoc($result_rev);
						$rev = $row_rev['revision'];
					}
					else
					{

						$rev = 1;
						require_once('modules/Documents/Document.php');
						$target = new Document();

						$target->document_name = $filename;
						$target->filename = $filename;
						$target->revision = $rev[$i];
						$target->category_id = 'Candidates';
						$target->vedic_candidates_documents_1_name = $canName;
						$target->vedic_candidates_documents_1vedic_candidates_ida = $canId;
						$target->save();

						$document_id = $target->id;
						$update_query2 = "  UPDATE documents
											SET created_by='$currentUser',
												modified_user_id ='$currentUser',
												assigned_user_id = '$currentUser'
											WHERE id = '$document_id'";
						$db->query($update_query2);
					}			
					
					$contents = file_get_contents($sourcePath);
					
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					$base64EN = base64_encode($contents);
			
					//Saving the document revisions with below parameters
					$set_document_revision_parameters = array(
						'id' => $document_id,
						'file' => $base64EN,
						'filename' => $filename,
						'revision' => $rev,
						'doc_type' => "Sugar",
						'file_ext' => $ext,
					);
					
					require_once('modules/Documents/DocumentSoap.php');
					$dr = new DocumentSoap();
					$docRevID=$dr->saveFile($set_document_revision_parameters);
						
					$update_query1 = "  UPDATE document_revisions
										SET created_by='$currentUser'
										WHERE id = '$docRevID'";
					$db->query($update_query1);
						
					$update_query3 = "  UPDATE documents
										SET modified_user_id ='$currentUser'
										WHERE id = '$document_id'";
					$db->query($update_query3);
					
					$upload_dir = $GLOBALS['sugar_config']['upload_dir'];
					$filename = $upload_dir . $docRevID;
					if($ext)
					{
						$fileData = file_get_contents($filename);
						$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
						$secretHash = $GLOBALS['sugar_config']['secretHash'];

						//To encrypt
						$encryptedMessage = openssl_encrypt($fileData, $encryptionMethod, $secretHash);
						$fileData = $encryptedMessage;
						file_put_contents($upload_dir . $docRevID, $fileData);
					}
					else
					{			
						if($filename)
						{
							$k = rename($filename,$filename);
						}
					}
					
					/*********************S3 Upload Start**********************/
					$bucket = $GLOBALS['sugar_config']['s3_bucket'];
					//CREATE A S3CLIENT
					$client = new S3Client([
						'version'     => 'latest',
						'region'      => 'us-east-1',
					]);
					
					$fp = fopen($filename, 'r+');
					//UPLOADIND THE FILE
					$client->putObject(array(
						'Bucket' => $bucket,
						'Key'    => "VATS_DOCUMENTS/" . $docRevID, //This should be unique for all the documents
						'Body'   => $fp
					));
					fclose($fp);
					
					// We can poll the object until it is accessible
					$client->waitUntil('ObjectExists', array(
						'Bucket' => $bucket,
						'Key'    => "VATS_DOCUMENTS/" . $docRevID
					));
					
					//Unlink File from upload directory
					unlink($filename);
					
					/*********************S3 Upload End**********************/
				}
				else
				{
					echo $filename;
				}
			}
		}
	}
}
