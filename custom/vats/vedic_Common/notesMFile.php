<?php
/**
  * FileName => notesMFile.php
  * Created By => LakshmiGayathri (Created On Feb-28-2018)
  * Modified By => Udaykiran (Modified On Oct-19-2018)
  * COMMENT => Create notes records through multiple file upload,added the update the from date,to date in notes records
  */  
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;

global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;

$currentUser = $current_user->id;
$module_id;
$gname = $_REQUEST['filename'];
$fromDate = $_REQUEST['fromdate'];
$toDate = $_REQUEST['todate'];
$profId=$_GET['ProfId'];
$counter = $_GET['c'];

for($i=0;$i<count($gname);$i++) {
	if(($gname[$i]!='')) {
		if($gname[$i] != 'undefined'){
			if( strpos( $gname[$i], '----') !== false ) {
				$gname[$i]=	str_replace("----",",",$gname[$i] );				
			}
			$sourcePath =  "upload/libreDocs/".$gname[$i];
			$filenameN = "upload/".$gname[$i];
			$filename = basename($filenameN); //Filename with extension
			require_once('modules/Notes/Note.php');
			$target = new Note();
			
			if($profId!='') {
				$target->filename = $filename;
				$target->name = $filename;
				$target->from_date = $fromDate[$i];
				$target->to_date = $toDate[$i];
				$target->parent_id = $profId;
				$target->parent_type = 'vedic_Profiles';
				$target->type_c = 'ER_Audio';
				$target->save();
			}
			
			$notes_id = $target->id;
			$update_query2 = "  UPDATE notes
								SET created_by = '$currentUser',
									modified_user_id = '$currentUser',
									assigned_user_id = '$currentUser'
								WHERE id = '$notes_id'";
			$db->query($update_query2); 
			$contents = file_get_contents($sourcePath);
					
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$base64EN = base64_encode($contents);			
						
			$upload_dir = $GLOBALS['sugar_config']['upload_dir'];
			$targetFile = $upload_dir . $filename;
			if($ext) {			
				copy($sourcePath, $targetFile);		
				echo "success";
			}
			else {			
				if($filename) {
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
			$fp = fopen($targetFile, 'r+');
			//UPLOADIND THE FILE
			$client->putObject(array(
				'Bucket' => $bucket,
				'Key'    => "VATS_DOCUMENTS/Recordings/" . $filename, //This should be unique for all the documents
				'Body'   => $fp,
				'ACL'    => 'public-read'
			));
			fclose($fp);
			// We can poll the object until it is accessible
			$client->waitUntil('ObjectExists', array(
				'Bucket' => $bucket,
				'Key'    => "VATS_DOCUMENTS/Recordings/" . $filename
			));
			
			//Unlink File from upload directory
			unlink($targetFile);
			
			/*********************S3 Upload End**********************/
		}
	}
}