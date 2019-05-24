<?php
/**  
  * FileName => submit.php
  * Modified By => Udaykiran (Modified On Sep-23-2017)
  * COMMENT => added the code for increment/decrement for no of canidates
  */
require_once("custom/library/sendMail.php");
//require_once("dbconnection.php");
global $db;
if(!isset($GLOBALS['log']))
{
    $GLOBALS['log'] = LoggerManager::getLogger('SugarCRM');
}
class ProcessSubmit{
  function Submit(&$bean, $event, $arguments){	
    if($arguments['related_module'] == 'vedic_Submissions'){
      
		if($event == 'after_relationship_add'){
			
			// $bean->no_of_candidates_c = $bean->no_of_candidates_c + 1; //$bean->no_of_candidates_c + 1;
			
			global $current_user,$db;
			$userID = $current_user->id;
			
			/**  
			* Modified By => Sravanthi (Modified On Sep-08-2017)
			* COMMENT => Code to notify the manager in bcc for the submissions happened with in the team.
			*/
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

			$postermailid = $arguments['related_bean']->job_poster_email_c;
			$ccmailid = $arguments['related_bean']->cc_c;
			$bccmailid = $arguments['related_bean']->bcc_c.','.$reportToMail;

			$subject = $arguments['related_bean']->subject_c;
			//code to attach resumes from the documents ::added by Udaykiran  on Aug-30-2017
			//code to attach resumes from the documents ::Modified by Udaykiran  on Oct-25-2017
			$resumeType = $arguments['related_bean']->submission_resume_type_c;
			if($resumeType == 'Candidate_Documents'){
				$query = $db->query("select document_revisions.id,filename from document_revisions where document_id ='".$arguments['related_bean']->documents_vedic_submissions_1documents_ida."'");
				$result =  $db->fetchByAssoc($query);
				$canID = $arguments['related_bean']->vedic_candidates_vedic_submissions_1vedic_candidates_ida;
				$revID= $result['id'];
				if(file_exists("upload/candidatesResumes/$canID/$revID")){	
					$attchment = "upload/candidatesResumes/$canID/".$result['id'];
				}else{
					$attchment = "upload/documents/".$result['id'];
				}				
				
				$attchment_name = $result['filename'];
			}
			if($resumeType == 'Manual_Submission'){
				$attchment = "upload/documents/".$arguments['related_bean']->id;
				$attchment_name = $arguments['related_bean']->document_name;
			}
			//end of udaykiran code
			// $attchment = "upload/documents/".$arguments['related_bean']->id;
			// $attchment_name = $arguments['related_bean']->document_name;

			$sconfig = SugarConfig::getInstance();
			$vats_config = $sconfig->get('vats', "vats");
			$cc_email = $vats_config['submit_email'];
			$GLOBALS ['log']->debug(__FILE__ . ":" . __LINE__ . ": " . "cc_email = " . $cc_email);

			// $job_obj = new vedic_job();		//user object
			// $job_obj->retrieve($arguments['related_bean']->vedic_job_vedic_submissions_1vedic_job_ida);
					// $job_obj->no_of_candidates_c = $job_obj->no_of_candidates_c + 1;
					// $job_obj->save();
			$jj = html_entity_decode($job_obj->job_listing_c);
			$sql_desc = " SELECT description, job_listing_c,briefdescription_c, submitter_email_c FROM vedic_job INNER JOIN vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c WHERE id ='".$arguments['related_bean']->vedic_job_vedic_submissions_1vedic_job_ida."'";
			$result = $db->query($sql_desc) or die("query have some issues". mysql_error());			
		
			$row_desc = $db->fetchByAssoc($result);
			$email_text = $row_desc['briefdescription_c'];			
			
			if ( "x" . $email_text == "x" ) {
			  $email_text = $row_desc['job_listing_c'];
			}
			else {
			  $email_text = $row_desc['briefdescription_c'];
			}
		
			
			$jobfrom = $row_desc['submitter_email_c'];

			$candidate_obj = new vedic_Candidates();		//user object
			$candidate_obj->retrieve($arguments['related_bean']->vedic_candidates_vedic_submissions_1vedic_candidates_ida);
			$signature = nl2br($arguments['related_bean']->description);
			$signature_c = html_entity_decode($arguments['related_bean']->signature_c);
			$html_body = "
				<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">
				<html>
				<head>
					<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
				</head>
				<body>
					<p>$signature_c</p>
				";

			if($arguments['related_bean']->is_add_job_c){	
				$senton = date('F j, Y, g:i a', strtotime($bean->date_entered));
				$reply_text = "<hr />From: ".$jobfrom;
				$reply_text .= "<br>Sent: ".$senton;
				$reply_text .= "<br>Subject: ".$subject;
				
				$html_body .= '<br>'.$reply_text.'<br>';
				$html_body .= '<br><br>'.html_entity_decode($email_text).' </body></html>';
			
			}
			//Code to include the job description in the current submission signature field detail view ::Added by Udaykiran Sep-23-2017
				$arguments['related_bean']->signature_c =$html_body;
			/**   
	          * Modified By => Udaykiran (Modified On Sep-23-2017)
	          * COMMENT => Calling Send Mail function for single submissions
	          */
			if($arguments['related_bean']->description == 'single')
			{
				sendMail($postermailid,$ccmailid,$bccmailid, $current_user_email, $current_user_name,$html_body,$subject,$attchment,$attchment_name);
			}

		}
		if($event == 'after_relationship_delete'){
			//$GLOBALS['log']->fatal($bean->no_of_candidates_c - 1);
			// $bean->no_of_candidates_c = $bean->no_of_candidates_c - 1;
			$job_id=$bean->id;
			// delete relate submissions from candidate-submission apart from job-submission
			$update_vedic_candidates_vedic_submissions = "UPDATE vedic_candidates_vedic_submissions_1_c SET deleted =1
						WHERE vedic_candidates_vedic_submissions_1vedic_submissions_idb='".$arguments['related_id']."' ";
			$GLOBALS['db']->query($update_vedic_candidates_vedic_submissions);

			$update_vedic_submissions = "UPDATE vedic_submissions SET deleted =1 WHERE id ='".$arguments['related_id']."' ";
			
			
			$query="SELECT count(vedic_job_vedic_submissions_1vedic_submissions_idb) as count FROM vedic_job_vedic_submissions_1_c INNER JOIN vedic_submissions where vedic_submissions.id=vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_submissions_idb AND vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_job_ida='$job_id' AND vedic_job_vedic_submissions_1_c.deleted=0 and vedic_submissions.deleted=0";
			$updateQuery=$GLOBALS['db']->query($query);
			$result=$GLOBALS['db']->fetchByAssoc($updateQuery);
			
			$no_of_candidates = $result['count'];
			
			$update_job="UPDATE `vedic_job_cstm` SET `no_of_candidates_c`=$no_of_candidates WHERE id_c='$job_id'";
			$GLOBALS['db']->query($update_job);
			
			$GLOBALS['db']->query($update_vedic_submissions);
			$job="select no_of_candidates_c from vedic_job_cstm where id_c='$job_id'";
			
			$result=$GLOBALS['db']->query($job);
			$noofcandidates=$GLOBALS['db']->fetchByAssoc($result);
			$no_of_candidates = $noofcandidates['no_of_candidates_c'];
			$bean->no_of_candidates_c = $no_of_candidates;
		}

    }
    $bean->save();
  }
}


?>
