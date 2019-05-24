<?php
/*   
    * FileName => managernotifications.php
	* Created By => Rajasekhar Reddy (Created On Sep-23-2017)
	* Modified By => Rajasekhar Reddy (Modified On Oct-11-2017)
	* COMMENT => When candidates changes Assign to field get alert message for Managers
    */
require_once('include/SugarPHPMailer.php');
class Manageralerts{
	function mNotifications(&$bean, $event, $arguments){
		global $current_user,$db;
		$site_url = $GLOBALS['sugar_config']['site_url'];
		$userID = $current_user->id;
		$rid = $current_user->reports_to_id;
		$current_user_email = $current_user->email1;
		$current_user_name = $current_user->user_name;
		$reports_to_email = "select email_addresses.email_address as EmailID from email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id where email_addr_bean_rel.bean_id = '$rid' and email_addr_bean_rel.bean_module = 'Users' and email_addr_bean_rel.primary_address = '1' and email_addr_bean_rel.deleted = '0' and email_addresses.deleted = '0'";
		$result = $db->query($reports_to_email);
		$result_reports_email = $db->fetchByAssoc($result);
		$reportsmailid = $result_reports_email['EmailID'];
		$reports_to_name = "select concat(COALESCE(users.first_name,' '),' ', users.last_name) as Fullname from users where users.id = '$rid'";
		$result1 = $db->query($reports_to_name);
		$reports_to_name = $db->fetchByAssoc($result1);
		$reportsname = $reports_to_name['Fullname'];
		$oldid = $bean->fetched_row['assigned_user_id'];
		$newid = $bean->assigned_user_id;
		$CID = $bean->id;
		$CFirstname = $bean->first_name;
		$CLastname = $bean->last_name;
		$FullName = ucfirst($CFirstname)." ".ucfirst($CLastname);
		$URL = "$site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$CID";
		$objACLRole = new ACLRole();
		$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
		$selectStatus = "select status from users where id = '$rid' and deleted = '0'";
		$resultStatus = $db->query($selectStatus);
		$rowStatus = $db->fetchByAssoc($resultStatus);
		$rStatus = $rowStatus['status'];
		if($rStatus == 'Active') {
			if(!in_array("Leadership", $roles)){
				if($newid != $oldid) {
					
					if (empty($bean->fetched_row['id'])) {
					$subject = "Candidate created - $FullName";
					$body = "<p>Hi $reportsname,</p>";
					$body .= "<p>$FullName created by me($current_user->first_name $current_user->last_name) </p>";
					$body .= "<div>You may review this candidate at:</div>";
					$body .= "<div><a href= $site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$CID>".$URL."</a></div> <br />";
					$body .= "<div> With Regards,</div>";
					$body .= "<div>$current_user->first_name $current_user->last_name</div>";
					$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
					$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
					}
					
					if ($bean->fetched_row['id']) {
					$subject = "Candidate modified - $FullName";
					$body = "<p>Hi $reportsname,</p>";
					$body .= "<p>$FullName modified by me($current_user->first_name $current_user->last_name) </p>";
					$body .= "<div>You may review this candidate at:</div>";
					$body .= "<div><a href= $site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$CID>".$URL."</a></div><br />";
					$body .= "<div> With Regards,</div>";
					$body .= "<div>$current_user->first_name $current_user->last_name</div>";
					$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
					$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
					}
					
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
					$mail->AddAddress($reportsmailid, $reportsname); 
					if (!$mail->Send()) {
								//$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
							}
							else  {
									//$GLOBALS['log']->fatal("Successfully Mail send");
							} 
				}
			}
		}
	}	
}
?>
