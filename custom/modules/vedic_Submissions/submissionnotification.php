<?php
/**
  * FileName => submissionnotification.php
  * Created By => Rajasekhar (Created On Feb-13-2018)
  * Modified By => Lakshmi (Modified On Apr-29-2018)
  * COMMENT => Code to send notification for job assigned  user if the submission done by other user.
  */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');
class submissionnotification {
	
    function subnotification(&$bean, $event, $arguments) {
		global $db, $current_user;
		$current_user_email = $current_user->email1;
		$current_user_name = $current_user->user_name;
		$current_userid = $current_user->id;
		$emailObj = new Email();
	    $defaults = $emailObj->getSystemDefaultEmail();
		$site_url = $GLOBALS['sugar_config']['site_url'];
		
		if (empty($bean->fetched_row['id'])) {
			
		//code to fetch the job id from the profiles_submissions relationship while doing the submission from the profile Subpanel 	
			if (gettype($bean->vedic_job_vedic_submissions_1vedic_job_ida) == 'object')
		{
			$arrayFoo = (array) $bean->vedic_job_vedic_submissions_1->beans;
			$JobID = array_keys($arrayFoo)[0];
		}else{
			$JobID = $bean->vedic_job_vedic_submissions_1vedic_job_ida;
		}
		//code to fetch the  profile id from the profiles_submissions relationship while doing the submission from the profile Subpanel 
		if (gettype($bean->vedic_profiles_vedic_submissions_1vedic_profiles_ida) == 'object')
		{
			$arrayFoo = (array) $bean->vedic_profiles_vedic_submissions_1->beans;
			$profId = array_keys($arrayFoo)[0];
		}else{
			$profId = $bean->vedic_profiles_vedic_submissions_1vedic_profiles_ida;
		}
			$SId = $bean->id;
			// $JobID = $bean->vedic_job_vedic_submissions_1vedic_job_ida;
			//$GLOBALS['log']->fatal("Job ID is : ".$JobID);
			$job_created_by = "select assigned_user_id from vedic_job where  id = '$JobID' and deleted = '0'";
			$jobcreatedby = $db->query($job_created_by);
			$job_created = $db->fetchByAssoc($jobcreatedby);
			$job_id = $job_created['assigned_user_id'];
			$JobMail = "SELECT email_addresses.email_address AS EmailID FROM email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id WHERE email_addr_bean_rel.bean_id = '$job_id' AND email_addr_bean_rel.bean_module = 'Users' AND email_addr_bean_rel.primary_address = '1' AND email_addr_bean_rel.deleted = '0' AND email_addresses.deleted = '0'";
			$JobMailResult = $db->query($JobMail);
			$JobMailResultRow = $db->fetchByAssoc($JobMailResult);
			$JobCreatedMail = $JobMailResultRow['EmailID'];
			
			$UserMail="select concat(COALESCE(users.first_name,' '),' ', users.last_name) AS Name from users where users.id='$job_id' and users.deleted ='0'";
			
			$UserMailResult = $db->query($UserMail);
			$UserMailResultRow = $db->fetchByAssoc($UserMailResult);
			$UserCreatedMail = $UserMailResultRow['Name'];
			
			//$GLOBALS['log']->fatal($JobCreatedMail);
			if($current_userid != $job_id){
			$URL = "$site_url/index.php?module=vedic_Submissions&return_module=vedic_Submissions&action=DetailView&record=$SId";
			
			$subject = "Job-Submission Alert";
			$body = "<p>Hi $UserCreatedMail,</p>";
			$body .= "<div>Submission created on your job</div>";
			$body .= "<div>You may review this <a href= '$URL' > Submission</a></div><br />";
			$body .= "<div> With Regards,</div>";
		    $body .= "<div> VATS Team</div>";
			$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
			
			$mail = new SugarPHPMailer();
			$mail->setMailerForSystem();
			$mail->From = $current_user_email;
			$mail->FromName = $current_user_name;
			$mail->ClearAllRecipients();
			$mail->ClearReplyTos();
			$mail->Subject= $subject;
			$mail->Body_html= $body;
			$mail->Body = $body;
			$mail->isHTML(true); //Set true if the body has any HTML content
			$mail->prepForOutbound();
			$mail->AddAddress($JobCreatedMail, "VATS"); 
			if (!$mail->Send()) {
						$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
					}
					else  {
						$emailObj->to_addrs= 'lakshmigayathri@vedicsoft.com';
						$emailObj->type= 'archived';
						$emailObj->deleted = '0';
						$emailObj->name = $mail->Subject ;
						$emailObj->description = $mail->Body;
						$emailObj->description_html = null;
						$emailObj->from_addr = $mail->From;
						$emailObj->parent_type = "vedic_Profiles";
						$emailObj->parent_id = $profId;
						$emailObj->date_sent = TimeDate::getInstance()->nowDb();
					    $emailObj->status = 'sent';
						$emailObj->save();
		
						
					}
				} 
		}
	}
}
