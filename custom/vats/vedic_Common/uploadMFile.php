<?php
/**
  * FileName => uploadMFile.php
  * Modified By => Maneesha (Modified On Dec-28-2018)
  * COMMENT => Create documents ,documentrevision records through multiple file upload
  */
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;
global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;

$currentUser = $current_user->id;
$category_id;
$module_id;
$gname = $_REQUEST['filename'];
// $gname = explode(',',$filename);
$docType = $_GET['docType'];
$docType = explode(',',$docType);
$subcategory = $_GET['subcategory'];
$subcategory = explode(',',$subcategory);
$immigration = $_GET['immigration'];
$immigration = explode(',',$immigration);
$immigration1 = $_GET['immigration1'];
$immigration1 = explode(',',$immigration1);
$employees = $_GET['employees'];
$employees = explode(',',$employees);
$employees1 = $_GET['employees1'];
$employees1 = explode(',',$employees1);
$holydays = $_GET['holydays'];
$vacations = explode(',',$holydays);
$holydays1 = $_GET['holydays1'];
$vacations1 = explode(',',$holydays1);
$counter = $_GET['c'];
$timsheet = $_GET['timesheetID'];
$canId = $_GET['CanId'];
$ProfId = $_GET['ProfId'];
$gc = $_GET['gc'];
$gc = explode(',',$gc);
$gc1 = $_GET['gc1'];
$gc1 = explode(',',$gc1);

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
			if(($immigration1[$i]!=''))
			{
				$module_id = $immigration1[$i];
				$category_id = "category_id = 'Immigration'";
				if($subcategory[$i])
				{	
					//query to check whether the document is available with selected category,subcategory,filename,Immigration record		
					$query = "  SELECT documents.id AS id,
									   documents.document_revision_id AS revID
								FROM vedic_immigration_documents_1_c
								INNER JOIN documents ON vedic_immigration_documents_1_c.vedic_immigration_documents_1documents_idb = documents.id
								WHERE documents.deleted= '0'
								  AND vedic_immigration_documents_1_c.deleted = '0'
								  AND vedic_immigration_documents_1vedic_immigration_ida ='$module_id'
								  AND document_name LIKE '$filename'
								  AND $category_id 
								  AND subcategory_id IS NOT NULL AND subcategory_id ='$subcategory[$i]'
								ORDER BY documents.date_entered DESC
								LIMIT 0,
									  1";
				}
				else
				{
					//query to check whether the document is available with selected category,filename,Immigration record and subcategory is NULL	
					$query = "  SELECT documents.id AS id,
									   documents.document_revision_id AS revID
								FROM vedic_immigration_documents_1_c
								INNER JOIN documents ON vedic_immigration_documents_1_c.vedic_immigration_documents_1documents_idb = documents.id
								WHERE documents.deleted= '0'
								  AND vedic_immigration_documents_1_c.deleted = '0'
								  AND vedic_immigration_documents_1vedic_immigration_ida ='$module_id'
								  AND document_name LIKE '$filename'
								  AND $category_id 
								  AND subcategory_id IS NULL
								ORDER BY documents.date_entered DESC
								LIMIT 0,
									  1";
				}
			}
			if(($employees1[$i]!=''))
			{
				$module_id = $employees1[$i];
				$category_id = "category_id = 'HR'";
				if(($subcategory[$i])&&($docType[$i]))
				{	
					$subcategory_id = "subcategory_id IS NOT NULL AND subcategory_id ='$subcategory[$i]'";
					$Type = "template_type IS NOT NULL AND  template_type = '$docType[$i]'";
				}
				else if(($subcategory[$i]!='')&&($docType[$i]==''))
				{
					$subcategory_id = "subcategory_id IS NOT NULL AND subcategory_id ='$subcategory[$i]'";
					$Type = "template_type IS NULL";
				}
				else if($subcategory[$i]==''&&$docType[$i]!='')
				{
					$subcategory_id = "subcategory_id IS NULL";
					$Type = "template_type IS NOT NULL AND  template_type = '$docType[$i]'";
				}
				else{
					$subcategory_id = "subcategory_id  IS NULL";
					$Type = "template_type IS NULL";
				}
				//query to check whether the document is available with selected category,subcategory,filename,Employees record		
				$query = "  SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM vedic_employees_documents_1_c
							INNER JOIN documents ON vedic_employees_documents_1_c.vedic_employees_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND vedic_employees_documents_1_c.deleted = '0'
							  AND vedic_employees_documents_1vedic_employees_ida ='$module_id'
							  AND document_name LIKE '$filename'
							  AND $category_id 
							  AND $subcategory_id
							  AND $Type
							ORDER BY documents.date_entered DESC
							LIMIT 0,
								  1";
				
				
			}
			/* Start of code to add conditions for GC documents upload-By Maneesha(Dec-28-2018)  */
			if(($gc1[$i]!=''))
			{
				$module_id = $gc1[$i];
				$category_id = "category_id = 'Immigration'";
				if($docType[$i]){
					$subcategory_id = "subcategory_id ='GC'";
					$Type = "template_type = '$docType[$i]'";
				}
				else{
					$subcategory_id = "subcategory_id ='GC'";
					$Type = "template_type IS NULL";
				}
				//query to check whether the document is available with selected category,subcategory,filename,GC record		
				$query = "  SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM vedic_gc_documents_1_c
							INNER JOIN documents ON vedic_gc_documents_1_c.vedic_gc_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND vedic_gc_documents_1_c.deleted = '0'
							  AND vedic_gc_documents_1vedic_gc_ida ='$module_id'
							  AND document_name LIKE '$filename'
							  AND $category_id 
							  AND $subcategory_id
							  AND $Type
							ORDER BY documents.date_entered DESC
							LIMIT 0,
								  1";
			}
			/* End of code to add conditions for GC documents upload-By Maneesha(Dec-28-2018)  */
			if(($vacations1[$i]!=''))
			{
				$module_id = $vacations1[$i];
				//query to check whether the document is available with selected category, filename, subcategory,Vacations record 
				$query = "  SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM vedic_holydays_documents_1_c
							INNER JOIN documents ON vedic_holydays_documents_1_c.vedic_holydays_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND vedic_holydays_documents_1_c.deleted = '0'
							  AND vedic_holydays_documents_1vedic_holydays_ida ='$module_id'
							  AND document_name LIKE '$filename'
							  AND category_id ='HR'
							  AND subcategory_id IS NOT NULL AND subcategory_id ='Employment'
							  AND template_type IS NOT NULL AND  template_type = 'Vacation_Letter'
							ORDER BY documents.date_entered DESC
							LIMIT 0,
								  1";
				
			}
			if(($timsheet!=''))
			{
				//query to check whether the document is available with selected category,subcategory,filename,Timesheet record
				$query = "  SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM timesheet_documents_1_c
							INNER JOIN documents ON timesheet_documents_1_c.timesheet_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND timesheet_documents_1_c.deleted = '0'
							  AND timesheet_documents_1timesheet_ida ='$timsheet'
							  AND document_name LIKE '$filename'
							  AND category_id ='Finance'
							  AND subcategory_id IS NOT NULL AND subcategory_id ='Timesheet'
							ORDER BY documents.date_entered DESC
							LIMIT 0,
									1";
			}
			if(($canId!=''))
			{
				//query to check whether the document is available with selected category,subcategory,filename,Timesheet record
				$query = "  SELECT documents.id AS id,
								   documents.document_revision_id AS revID
							FROM vedic_candidates_documents_1_c
							INNER JOIN documents ON vedic_candidates_documents_1_c.vedic_candidates_documents_1documents_idb = documents.id
							WHERE documents.deleted= '0'
							  AND vedic_candidates_documents_1_c.deleted = '0'
							  AND vedic_candidates_documents_1vedic_candidates_ida ='$canId'
							  AND document_name LIKE '$filename'
							  AND category_id ='HR India'
							ORDER BY documents.date_entered DESC
							LIMIT 0,
									1";
			}
			if(($ProfId!=''))				
			{				
				//query to check whether the document is available with selected category,subcategory,filename,Profile record				
				$query = "  SELECT documents.id AS id,				
								   documents.document_revision_id AS revID				
							FROM vedic_profiles_documents_1_c				
							INNER JOIN documents ON vedic_profiles_documents_1_c.vedic_profiles_documents_1documents_idb = documents.id				
							WHERE documents.deleted= '0'				
							  AND vedic_profiles_documents_1_c.deleted = '0'				
							  AND vedic_profiles_documents_1vedic_profiles_ida ='$ProfId'				
							  AND document_name LIKE '$filename'				
							  AND category_id ='Candidates'				
							ORDER BY documents.date_entered DESC				
							LIMIT 0,				
									1";				
			}
				
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
				$GLOBALS['log']->fatal($immigration1[$i]);
				$rev = 1;
				require_once('modules/Documents/Document.php');
				$target = new Document();
				
				$target->document_name = $filename;
				$target->filename = $filename;
				$target->revision = $rev[$i];
				//Immigration data fetching from the Pop view of multiple file upload
				if($immigration1[$i]!='')
				{
					$target->subcategory_id = $subcategory[$i];
					$target->category_id = 'Immigration';
					$target->status_id = 'Active';
					$target->vedic_immigration_documents_1vedic_immigration_ida = $immigration1[$i];
					$target->vedic_immigration_documents_1_name = $immigration[$i];
					$target->save();
				}
				//Employees data fetching from the Pop view of multiple file upload
				if($employees1[$i]!='')
				{
					$target->subcategory_id = $subcategory[$i];
					$target->category_id = 'HR';
					$target->template_type = $docType[$i];
					$target->status_id = 'Active';
					$target->vedic_employees_documents_1vedic_employees_ida = $employees1[$i];
					$target->vedic_employees_documents_1_name = $employees[$i];
					$target->save();
				}
				//GC data fetching from the Pop view of multiple file upload
				if($gc1[$i]!='')
				{
					$target->subcategory_id = 'GC';
					$target->category_id = 'Immigration';
					$target->template_type = $docType[$i];
					$target->vedic_gc_documents_1vedic_gc_ida = $gc1[$i];
					$target->status_id = 'Active';
					$target->vedic_gc_documents_1_name = $gc[$i];
					$target->save();
				}
				//Vacation data fetching from the Pop view of multiple file upload
				if($vacations1[$i]!='')
				{
					$target->subcategory_id = 'Employment';
					$target->category_id = 'HR';
					$target->template_type = 'Vacation_Letter';
					$target->status_id = 'Active';
					$target->vedic_holydays_documents_1vedic_holydays_ida = $vacations1[$i];
					$target->vedic_holydays_documents_1_name = $vacations[$i];
					$target->save();
				}
				//Timesheet data fetching from the Pop view of multiple file upload
				if($timsheet!='')
				{
					$target->subcategory_id = 'Timesheet';
					$target->category_id = 'Finance';
					$target->status_id = 'Active';
					$target->timesheet_documents_1timesheet_ida = $timsheet;
					$target->save();
				}
				//Candidates data fetching from the Pop view of multiple file upload
				if($canId!='')
				{
					$target->category_id = 'HR India';
					$target->status_id = 'Active';
					$target->vedic_candidates_documents_1vedic_candidates_ida = $canId;
					$target->save();
				}
				//Profiles data fetching from the Pop view of multiple file upload		
				if($ProfId!='')		
				{		
					$query = $db->query("SELECT vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_candidates_ida` AS ID
										FROM vedic_profiles
										JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_profiles_idb` = vedic_profiles.id
										WHERE vedic_profiles.id = '$ProfId'
										  AND vedic_candidates_vedic_profiles_1_c.deleted='0'");		
					$result = $db->fetchByAssoc($query);		
					$Can_ID = $result['ID'];		
					$target->category_id = 'Candidates';		
					$target->status_id = 'Active';		
					$target->vedic_candidates_documents_1vedic_candidates_ida = $Can_ID;		
					$target->vedic_profiles_documents_1vedic_profiles_ida = $ProfId;		
					$target->save();		
				}
				
				//Saving Document with above parameters
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
					
			$tmp_file = "upload/libreDocs/";
			$upload_dir = $GLOBALS['sugar_config']['upload_dir'];
			$filename = $upload_dir . $docRevID;
			$targetFile = $upload_dir . $docRevID;
			
			if($ext)
			{
				$fileData = $contents;
				$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
				$secretHash = $GLOBALS['sugar_config']['secretHash'];

				//To encrypt
				$encryptedMessage = openssl_encrypt($fileData, $encryptionMethod, $secretHash);
				$fileData = $encryptedMessage;
				file_put_contents($upload_dir . $docRevID, $fileData);
				
				$interval = strtotime('-1 hour');//files older than 24hours
				foreach (glob($tmp_file."*") as $file) 
				//delete if older
				if (filemtime($file) <= $interval ) {

					 unlink($file);
				}
				else  {
					echo "Session expired.Please try again upload Resume";
				}
				
					echo "Uploaded Successfully!!!<br/>";
			}
			else
			{			
				if($filename)
				{
					$k = rename($filename,$targetFile);
					echo "Uploaded Successfully!!!!<br/>";
				}
			}
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
			unlink($targetFile);
			
			/*********************S3 Upload End**********************/
		}
		else
		{
			echo $filename;
		}
	}
}
