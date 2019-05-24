<?php
/**
  * FileName => uploadMFile.php
  * Created By => Udaykiran (Modified On Aug-09-2017)
  * Modified By => Udaykiran (Modified On Apr-29-2018)
  * COMMENT => Create multiple submissions for single job 
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once("custom/library/sendMail.php");
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;
global $db, $current_user,$app_list_strings,$timedate,$sugar_config;

$currentUser = $current_user->id;
$gname = $_REQUEST['filename'];
// $gname = explode(',',$filename);
$profID = $_GET['profID'];
$profID = explode(',',$profID);
$jobName = $_REQUEST['jobName'];
$jobID = $_REQUEST['jobID'];
$isPrivate = $_REQUEST['isPrivate'];
// $isPrivate = explode(',',$$isPrivate =);
$to = $_REQUEST['to'];
$cc = $_REQUEST['cc'];
$bcc = $_REQUEST['bcc'];
$signature = $_REQUEST['signature'];
$subject = $_REQUEST['subject'];

$pathToFile = [];
$candidateToFile = [];
$docToFile = [];

for($i=0;$i<count($gname);$i++){
	if(($gname[$i]!='')) {		
		if($gname[$i] != 'undefined'){
			$sourcePath =  "upload/libreDocs/".$gname[$i];
			$filenameN = "upload/".$gname[$i];
			$filename = basename($filenameN); //Filename with extension
			$contents = file_get_contents($sourcePath);
			//Query to get the Candidated ID using Profile ID
			$query =$db->query("SELECT vc.id
								FROM vedic_profiles AS vp
								JOIN vedic_candidates_vedic_profiles_1_c AS vcp ON vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb = vp.id
								JOIN vedic_candidates AS vc ON vc.id=vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida
								WHERE vp.deleted=0
								  AND vp.id='$profID[$i]'
								  AND vc.deleted=0");
			$result = $db->fetchByAssoc($query);
			$canID = $result['id'];
				
			if($isPrivate[$i] == true){
				$isPrivate = 1;
			}
			else{
				$isPrivate = 0;
			}
			$rev = 1;
			//Object creation for the Documents
			require_once('modules/Documents/Document.php');
			$target = new Document();
			//Creating documents using the object
			$target->document_name = $filename;
			$target->filename = $filename;
			$target->revision = $rev;
			$target->status_id = 'Active';
			$target->category_id = 'Candidates';
			$target->subcategory_id = 'Resume';
			$target->is_private_c = $isPrivate;
			$target->vedic_candidates_documents_1vedic_candidates_ida = $canID;
			$target->vedic_profiles_documents_1vedic_profiles_ida = $profID[$i];
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
			
			require_once('modules/vedic_Submissions/vedic_Submissions.php');
			//Object creation for the submission
			$target = new vedic_Submissions();

			//Creating submissions using the object
			$target->document_name = $filename;
			$target->documents_vedic_submissions_1_name = $filename;
			$target->documents_vedic_submissions_1documents_ida = $document_id;
			$target->vedic_job_vedic_submissions_1_name = $jobName;
			$target->vedic_job_vedic_submissions_1vedic_job_ida = $jobID;
			$target->submission_resume_type_c = 'Manual_Submission';
			$target->vedic_candidates_vedic_submissions_1vedic_candidates_ida = $canID;
			$target->vedic_profiles_vedic_submissions_1vedic_profiles_ida = $profID[$i];			
			$target->signature_c = $signature;
			$target->subject_c = $subject;
			$target->job_poster_email_c = $to;
			$target->cc_c = $cc;
			$target->bcc_c = $bcc;
			$target->save();
			$document_id = $target->id;
			
			
			$update_query2 = "  UPDATE vedic_submissions
								SET created_by='$currentUser',
									modified_user_id ='$currentUser',
									assigned_user_id = '$currentUser'
								WHERE id = '$document_id'";
			$db->query($update_query2); 
	
		}
		$upload_dir = $GLOBALS['sugar_config']['upload_dir'];
		$filename = $upload_dir.$docRevID;
		if($ext){
			if(!is_dir($_SERVER['DOCUMENT_ROOT']."/upload/candidatesResumes/")) {
				mkdir($_SERVER['DOCUMENT_ROOT']."/upload/candidatesResumes/",0755,true);
				}
				if(!is_dir($_SERVER['DOCUMENT_ROOT']."/upload/candidatesResumes/$canID/")) {
					mkdir($_SERVER['DOCUMENT_ROOT'].'/upload/candidatesResumes/'.$canID.'/',0755,true);
				}
				$dest = $_SERVER['DOCUMENT_ROOT']."/upload/candidatesResumes/$canID/$docRevID";
				copy($filename, $dest);
				unlink($filename);
		} else{			
			if($filename){
				$k = rename($filename,$filename);
			}
		}
		
		$pathToFile[$i] = "upload/candidatesResumes/$canID/$docRevID";
		$candidateToFile[$i] = $canID;
		$docToFile[$i] = $docRevID;
	
		$current_user->id;
		$User = new User();		//user object
		$User->retrieve($current_user->id);	//retrieve user data
		$current_user_email = $User->email1;
		$current_user_name = $current_user->name;
		$current_user_phone = $current_user->phone_work;
		if(file_exists("upload/candidatesResumes/$canID/$docRevID")){	
			$attchment[$i] = "upload/candidatesResumes/$canID/$docRevID";
		}
		// $attchment[$i] = "upload/documents/".$document_id;
		$attchment_name[$i] = $gname[$i];
		$sconfig = SugarConfig::getInstance();
		$vats_config = $sconfig->get('vats', "vats");
		$cc_email = $vats_config['submit_email'];
		$GLOBALS ['log']->debug(__FILE__ . ":" . __LINE__ . ": " . "cc_email = " . $cc_email);

		$job_obj = new vedic_job();		//Job object
		$job_obj->retrieve($arguments['related_bean']->vedic_job_vedic_submissions_1vedic_job_ida);
		$jj = html_entity_decode($job_obj->job_listing_c);
		$sql_desc = " SELECT description, job_listing_c, submitter_email_c FROM vedic_job INNER JOIN vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c WHERE id ='".$document_id->vedic_job_vedic_submissions_1vedic_job_ida."'";

		$result = $db->query($sql_desc);
		$row_desc =  $db->fetchByAssoc($result);
		$email_text = $row_desc['description'];
		if ( "x" . $email_text == "x" ) {
		  $email_text = $row_desc['job_listing_c'];
		} else {
		  $email_text = nl2br($row_desc['description']);
		}
		$jobfrom = $row_desc['submitter_email_c'];

		$candidate_obj = new vedic_Candidates();		//user object
		$candidate_obj->retrieve($document_id->vedic_candidates_vedic_submissions_1vedic_candidates_ida);
		$signature_CC = nl2br($document_id->description);
		$signature_c = html_entity_decode($signature);
		$html_body = "
			<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
			<html>
			<head>
				<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
				<title>$bean->name</title>
			</head>
			<body>
				<p>$signature_c</p>
			";

		if($arguments['related_bean']->is_add_job_c){
			$senton = date('F j, Y, g:i a', strtotime($document_id->date_entered));
			$reply_text = "<hr />From: ".$jobfrom;
			$reply_text .= "<br>Sent: ".$senton;
			$reply_text .= "<br>Subject: ".$subject;
			$html_body .= '<br>'.$reply_text.'<br>';
			$html_body .= '<br><br>'.$email_text.' </body></html>';
		}				
	}	
}
// To send the mail after creating the submissions
sendMail($to,$cc,$bcc, $current_user_email, $current_user_name,$html_body,$subject,$attchment,$attchment_name);

/*********************S3 Upload Start**********************/
for($i=0;$i<count($pathToFile);$i++){
	$fileData = file_get_contents($pathToFile[$i]);
	$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
	$secretHash = $GLOBALS['sugar_config']['secretHash'];
	//To encrypt
	$encryptedMessage = openssl_encrypt($fileData, $encryptionMethod, $secretHash);
	$fileData = $encryptedMessage;
	file_put_contents($pathToFile[$i], $fileData);
	$bucket = $GLOBALS['sugar_config']['s3_bucket'];
	//CREATE A S3CLIENT
	$client = new S3Client([
		'version'     => 'latest',
		'region'      => 'us-east-1',
	]);
	$fp = fopen($pathToFile[$i], 'r+');
	//UPLOADIND THE FILE
	$client->putObject(array(
		'Bucket' => $bucket,
		'Key'    => "VATS_DOCUMENTS/" . $candidateToFile[$i] . "/" . $docToFile[$i], //This should be unique for all the documents
		'Body'   => $fp
	));
	fclose($fp);
	// We can poll the object until it is accessible
	$client->waitUntil('ObjectExists', array(
		'Bucket' => $bucket,
		'Key'    => "VATS_DOCUMENTS/" . $candidateToFile[$i] . "/" . $docToFile[$i]
	));
	
	//Unlink File from upload directory
	unlink($pathToFile[$i]);
}
/*********************S3 Upload End**********************/
echo "success";