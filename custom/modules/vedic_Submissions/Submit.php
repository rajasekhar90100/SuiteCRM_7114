<?php
/**  
  * FileName => Submit.php
  * Created By => Udaykiran (Modified On May-03-2018)
  * Modified By => Udaykiran (Modified On May-24-2018)
  * COMMENT => Code to Send the Mail when submission is done
  */
require_once("custom/library/sendMail.php");
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
global $db;
class ProcessSubmit{
	function Submit(&$bean, $event, $arguments){	
		$site_url = $GLOBALS['sugar_config']['site_url'];
		$Id = $bean->id;
		$date_create = $bean->date_entered;
		$date_modified = $bean->date_modified;
		if(($date_create == $date_modified)&&($id =='')){
			
			global $current_user,$db;
			$userID = $current_user->id;
			
			$SID = $bean->id;
			if (gettype($bean->vedic_job_vedic_submissions_1vedic_job_ida) == 'object')
			{
				$arrayFoo = (array) $bean->vedic_job_vedic_submissions_1->beans;
				$SubID = array_keys($arrayFoo)[0];
			}
			else{
				$SubID = $bean->vedic_job_vedic_submissions_1vedic_job_ida;
			}
			$job_created_by = "select created_by from vedic_job where  id = '$SubID' and deleted = '0'";
			$jobcreatedby = $db->query($job_created_by);
			$job_created = $db->fetchByAssoc($jobcreatedby);
			$job_id = $job_created['created_by'];
			$JobMail = "SELECT email_addresses.email_address AS EmailID FROM email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id WHERE email_addr_bean_rel.bean_id = '$job_id' AND email_addr_bean_rel.bean_module = 'Users' AND email_addr_bean_rel.primary_address = '1' AND email_addr_bean_rel.deleted = '0' AND email_addresses.deleted = '0'";
			$JobMailResult = $db->query($JobMail);
			$JobMailResultRow = $db->fetchByAssoc($JobMailResult);
			$JobCreatedMail = $JobMailResultRow['EmailID'];
			$URL = "$site_url/index.php?module=vedic_Submissions&return_module=vedic_Submissions&action=DetailView&record=$SID";
			
			#Check the current user is in the Leadership role
			
			$objACLRole = new ACLRole();
			$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
			$rid = $current_user->reports_to_id;
			
			$selectStatus = "select status from users where id = '$rid' and deleted = '0'";
			$resultStatus = $db->query($selectStatus);
			$rowStatus = $db->fetchByAssoc($resultStatus);
			
			$rStatus = $rowStatus['status'];
			
			if($rStatus == 'Active')
			{
				if(!in_array("Leadership", $roles)){
					$selectRMail = "SELECT email_addresses.email_address AS EmailID FROM email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id WHERE email_addr_bean_rel.bean_id = '$rid' AND email_addr_bean_rel.bean_module = 'Users' AND email_addr_bean_rel.primary_address = '1' AND email_addr_bean_rel.deleted = '0' AND email_addresses.deleted = '0'";
					$selectReportResult = $db->query($selectRMail);
					$selectReRow = $db->fetchByAssoc($selectReportResult);
					
					$reportToMail = $selectReRow['EmailID'];
				}
			}
			$User = new User();		//user object
			$User->retrieve($current_user->id);	//retrieve user data
			$current_user_email = $User->email1;
			$current_user_name = $current_user->name;
			$current_user_phone = $current_user->phone_work;
			
			$postermailid = $bean->job_poster_email_c;
			$ccmailid = $bean->cc_c;
			$bccmailid = $bean->bcc_c.','.$reportToMail;
			
			$subject = $bean->subject_c;
			//code to attach resumes from the documents ::added by Udaykiran  on Aug-30-2017
			//code to attach resumes from the documents ::Modified by Udaykiran  on Oct-04-2017
			$resumeType = $bean->submission_resume_type_c;
			if($resumeType == 'Candidate_Documents') {
				$query = $db->query("select document_revisions.id,filename from document_revisions where document_id ='".$bean->documents_vedic_submissions_1documents_ida."'");
				$result =  $db->fetchByAssoc($query);
				$canID = $bean->vedic_candidates_vedic_submissions_1vedic_candidates_ida;
				$revID = $result['id'];
				
				$attchment = "upload/" . $revID;
				/*********************S3 Download Start**********************/
				$bucket = $GLOBALS['sugar_config']['s3_bucket'];
				//CREATE A S3CLIENT
				$client = new S3Client([
					'version'     => 'latest',
					'region'      => 'us-east-1',
				]);
				$key = "VATS_DOCUMENTS/" . $canID . "/" . $revID;
				if(!$client->doesObjectExist($bucket,$key)) {
					$key = "VATS_DOCUMENTS/" . $revID;
				}
				$client->getObject(array(
					'Bucket' => $bucket,
					'Key'    => $key,
					'SaveAs' => $attchment
				));
				/*********************S3 Download End**********************/
				$fileData = file_get_contents($attchment);
				$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
				$secretHash = $GLOBALS['sugar_config']['secretHash'];

				//To encrypt
				$encryptedMessage = openssl_decrypt($fileData, $encryptionMethod, $secretHash);
				$fileData = $encryptedMessage;
				file_put_contents($attchment, $fileData);
				$attchment_name = $result['filename'];
			}
			if($resumeType == 'Manual_Submission') {
				$attchment = "upload/documents/".$bean->id;
				$attchment_name = $bean->document_name;
			}
			//end of udaykiran code
			
			// $attchment = "upload/documents/".$bean->id;
			// $attchment_name = $bean->document_name;

			$sconfig = SugarConfig::getInstance();
			$vats_config = $sconfig->get('vats', "vats");
			$cc_email = $vats_config['submit_email'];
			$GLOBALS ['log']->debug(__FILE__ . ":" . __LINE__ . ": " . "cc_email = " . $cc_email);

			// $job_obj = new vedic_job();		//user object
			// $job_obj->retrieve($bean->vedic_job_vedic_submissions_1vedic_job_ida);
			$jj = html_entity_decode($job_obj->job_listing_c);
			$sql_desc = " SELECT description, job_listing_c, submitter_email_c FROM vedic_job INNER JOIN vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c WHERE id ='".$SubID."'";

			$result = $db->query($sql_desc);
			$row_desc = $db->fetchByAssoc($result);
			$email_text = $row_desc['description'];
			if ( "x" . $email_text == "x" ) {
			  $email_text = $row_desc['job_listing_c'];
			}
			else {
			  $email_text = nl2br($row_desc['description']);
			}
			$jobfrom = $row_desc['submitter_email_c'];

			$candidate_obj = new vedic_Candidates();		//user object
			$candidate_obj->retrieve($bean->vedic_candidates_vedic_submissions_1vedic_candidates_ida);
			$signature = nl2br($bean->description);
			$signature_c = html_entity_decode($bean->signature_c);
			$html_body = "
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
				<html>
				<head>
					<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
				</head>
				<body>
					<p>$signature_c</p>
				";

			if($bean->is_add_job_c){
			$senton = date('F j, Y, g:i a', strtotime($bean->date_entered));
			$reply_text = "<hr />From: ".$jobfrom;
			$reply_text .= "<br>Sent: ".$senton;
			$reply_text .= "<br>Subject: ".$subject;
			
			$html_body .= '<br>'.$reply_text.'<br>';
			$html_body .= '<br><br>'.$email_text.' </body></html>';
			
			}
			//Code to include the job description in the current submission signature field detail view ::Added by Udaykiran Aug-29-2017
			$bean->signature_c = $html_body;			
			/**   
	          * Modified By => Udaykiran (Modified On Aug-14-2017)
	          * COMMENT => Calling Send Mail function for single submissions
	          */
			if($bean->description == 'single')
			{
				sendMail($postermailid,$ccmailid,$bccmailid, $current_user_email, $current_user_name,$html_body,$subject,$attchment,$attchment_name);
				if($resumeType == 'Candidate_Documents') {
					unlink($attchment);
				}
			}
		}
	}
}
?>