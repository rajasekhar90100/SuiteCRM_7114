<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');
include_once('include/utils/db_utils.php'); 
/**
	* FileName => Solutionscreationmails.php
	* Created By =>Lakshmigayathri (Created On July-14-2018)
	* Modified By =>Lakshmigayathri(Modify On July-14-2018)
	* COMMENT => after save job mails will trigger for solutions team members
	*/
class SolutionsMails{

	function Solutions_mails(&$bean, $event, $arguments){
	
	global $current_user,$db,$sugar_config; 	
		if (empty($bean->fetched_row['id'])) {
			$id = $bean->id;
			$name = $current_user->name;
			$username=$current_user->user_name;
			$users = array("lakshmigayathri", "Rudi.Jordaan");
		    $jobname = $bean->name;
			$site_url = $GLOBALS['sugar_config']['site_url'];
			$select_email = "SELECT email_addresses.email_address as genericMail from email_addresses 
							where id IN (SELECT email_addr_bean_rel.email_address_id FROM securitygroups_users INNER JOIN securitygroups 
							ON securitygroups.id = securitygroups_users.securitygroup_id INNER JOIN users 
							on users.id =  securitygroups_users.user_id INNER JOIN email_addr_bean_rel 
							ON users.id = email_addr_bean_rel.bean_id where securitygroups.deleted = '0' 
							and securitygroups.name IN('Solutions -Team') and securitygroups_users.deleted = '0' 
							and users.deleted = '0' and email_addr_bean_rel.deleted = '0' and email_addr_bean_rel.bean_module = 'Users' 
							and email_addr_bean_rel.primary_address = '1') and email_addresses.deleted = '0'";
			$result_email = $db->query($select_email);
			if (in_array($username, $users)) {
				while($row_email = $db->fetchByAssoc($result_email)) {
				$Mail = $row_email['genericMail'];
				$URL = "$site_url/index.php?module=vedic_job&action=DetailView&record=$id";
				$subject = "New job Alert";
				$body = "<p>Hi Team,</p>";
				$body .= "<p> $jobname job has been created by $name</p>";
				$body .= "<div>You may review <a href= '$URL' >  $jobname</a></div> <br />";
				$body .= "<div> With Regards,</div>";
				$body .= "<div>VATS Team</div>";
				$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
				
				$emailObj = new Email();
				$defaults = $emailObj->getSystemDefaultEmail();
				$mail = new SugarPHPMailer();
				$mail->setMailerForSystem();
				$mail->From = $defaults['email'];
				$mail->FromName = $defaults['name'];
				$mail->ClearAllRecipients();
				$mail->ClearReplyTos();
				$mail->prepForOutbound();
				$mail->AddAddress($Mail); 
				$mail->Subject= wordwrap($subject,900);
				$mail->Body_html= $body;
				$mail->Body = wordwrap($body,900);
				$mail->isHTML(true); //Set true if the body has any HTML content
				if (!$mail->Send()) {
					echo "Mail sent Failed!!";
				}
				else
				{
					
				echo "Mail sent";
				}
			  }
			}
		}
	}
}