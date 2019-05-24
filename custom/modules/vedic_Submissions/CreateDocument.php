<?php
/**
  * FileName => CreateDocument.php
  * Created By => Udaykiran (Created On Oct-02-2017)
  * Modified By => Udaykiran (Modified On Apr-29-2018)
  * COMMENT => Code to Create document,documentrevision records for uploaded resume
  */
ini_set('display_errors',-1);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;

class MultipleDoc {
	/**
	  * Function => mulDoc()
	  * Created By => Udaykiran (Created On Oct-02-2017)
	  * Modified By => Udaykiran (Modified On Apr-29-2018)
	  * COMMENT => Code to Create document,documentrevision records for uploaded resume with category as Candidates 
	    and Sub category as Resume this document will realte to the selected candidate,selected profile while creating the submission
	  */
    function mulDoc(&$bean, $event, $arguments) {
		global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;

		$currentUser = $current_user->id;
		$submId=$bean->id;
		
		$file = $bean->uploadfile;
		//code to fetch the candidate id from the candidates_submissions relationship while doing the submission from the candidate Subpanel 		
		if (gettype($bean->vedic_candidates_vedic_submissions_1vedic_candidates_ida) == 'object')
		{
			$arrayFoo = (array) $bean->vedic_candidates_vedic_submissions_1->beans;
			$canId = array_keys($arrayFoo)[0];
		}else{
			$canId = $bean->vedic_candidates_vedic_submissions_1vedic_candidates_ida;
		}
		//code to fetch the candidate id from the profiles_submissions relationship while doing the submission from the profile Subpanel 
		if (gettype($bean->vedic_profiles_vedic_submissions_1vedic_profiles_ida) == 'object')
		{
			$arrayFoo = (array) $bean->vedic_profiles_vedic_submissions_1->beans;
			$profId = array_keys($arrayFoo)[0];
		}else{
			$profId = $bean->vedic_profiles_vedic_submissions_1vedic_profiles_ida;
		}
		$createdDate = $bean->date_entered;
		$modifiedDate = $bean->date_modified;
		$uploadType = $bean->submission_resume_type_c;
		$description = $bean->description;
		if(($createdDate == $modifiedDate)&&($uploadType == 'Manual_Submission')&&($description == 'single')){
			$sourcePath =  "upload/documents/".$submId;
			$filenameN = $file;
			$filename = basename($filenameN); //Filename with extension
			$docName = 	$filename;	
			
			$rev = 1;
			//Object creation for the Documents
			require_once('modules/Documents/Document.php');
			$target = new Document();
			//Creating documents using the object
			$target->document_name = $filename;
			$target->filename = $filename;
			$target->revision = $rev;
			$target->is_private_c = 1;
			$target->category_id = 'Candidates';
			$target->status_id = 'Active';
			$target->subcategory_id = 'Resume';
			$target->vedic_candidates_documents_1vedic_candidates_ida = $canId;
			$target->vedic_profiles_documents_1vedic_profiles_ida = $profId;			
			$target->save();

			$document_id = $target->id;
			$update_query2 = "  UPDATE documents
								SET created_by='$currentUser',
									modified_user_id ='$currentUser',
									assigned_user_id = '$currentUser'
								WHERE id = '$document_id'";
			$db->query($update_query2);
				
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
			$id=create_guid();
			$timeDate = new TimeDate();
			$CurrentDateTime = $timedate->getInstance()->nowDb();
			$update_query4 = "INSERT INTO `documents_vedic_submissions_1_c`(`id`, `date_modified`, `deleted`, `documents_vedic_submissions_1documents_ida`, `documents_vedic_submissions_1vedic_submissions_idb`) VALUES ('".$id."','".$CurrentDateTime."',0,'".$document_id."','".$submId."')";
			$db->query($update_query4);
			
			$upload_dir = $GLOBALS['sugar_config']['upload_dir'];
			$targetFile = $upload_dir . $docRevID;
			if($ext){
				$fileData = file_get_contents($sourcePath);
				$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
				$secretHash = $GLOBALS['sugar_config']['secretHash'];

				//To encrypt
				$encryptedMessage = openssl_encrypt($fileData, $encryptionMethod, $secretHash);
				$fileData = $encryptedMessage;
				file_put_contents($upload_dir . $docRevID, $fileData);
				/*********************S3 Upload Start**********************/
						$bucket = $GLOBALS['sugar_config']['s3_bucket'];
				//CREATE A S3CLIENT
				$client = new S3Client([
					'version'     => 'latest',
					'region'      => 'us-east-1',
				]);
				$fp = fopen($targetFile, 'r+');
				//UPLOADIND THE FILE
				$client->putObject(array(
					'Bucket' => $bucket,
					'Key'    => "VATS_DOCUMENTS/" . $canId . "/" . $docRevID, //This should be unique for all the documents
					'Body'   => $fp
				));
				fclose($fp);
				// We can poll the object until it is accessible
				$client->waitUntil('ObjectExists', array(
					'Bucket' => $bucket,
					'Key'    => "VATS_DOCUMENTS/" . $canId . "/" . $docRevID
				));

				//Unlink File from upload directory
				unlink($targetFile);
				unlink($sourcePath);
				/*********************S3 Upload End**********************/
			}
			
		}	
	}
}
