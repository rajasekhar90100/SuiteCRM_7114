<?php
/**
  * FileName => solutionsTimesheetReminderMail.php
  * Created By => Rajasekhar (Created On Jan-30-2019)
  * Modified By => Rajasekhar (Modified On Jan-30-2019)
  * COMMENT => Code to send reminder notificaton from weekly timesheet report.
  */
global $db,$timedate;
$siteUrl = $GLOBALS['sugar_config']['site_url'];
$userId = $_REQUEST['user'];
$startDate = $_REQUEST['start'];
$endDate = $_REQUEST['end'];
$TID = $_REQUEST['id'];
$user = new User();
$user->retrieve($userId);
$userEmail = $user->email1;
$userFirstName = $user->first_name;
$userLastName = $user->last_name;
$userName = $userFirstName." ".$userLastName;

$subject = "Timesheet Reminder Notification";
$body = "<p>Hi $userName,</p><br/>";
if(empty($TID)) {
	$body .= "<div>Please submit your timesheet for the week (".$startDate." - ".$endDate.").</div> <br/>";
}
else {
	$body .= "<div>Please submit your timesheet for the week  <a href= $siteUrl/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$TID>(".$startDate."-".$endDate.")</a>. </div><br/>";
}
$body .= "<div> With Regards,</div>";
$body .= "<div>VATS Team</div>";
$body .= "<div><img src='$siteUrl/custom/vats/vedic_Common/Savantis-logo.png'></div>";
$emailObj = new Email();
$defaults = $emailObj->getSystemDefaultEmail();
$mail = new SugarPHPMailer();
$mail->setMailerForSystem();
$mail->From = $defaults['email'];
$mail->FromName = $defaults['name'];
$mail->ClearAllRecipients();
$mail->ClearReplyTos();
$mail->prepForOutbound();
$mail->AddAddress($userEmail); 
$mail->Subject= wordwrap($subject,900);
$mail->Body_html= $body;
$mail->Body = wordwrap($body,900);
$mail->isHTML(true); //Set true if the body has any HTML content
if (!$mail->Send()) {
	$message = "Mail not sent to ".$userName."";
}
 else {		
	$message = "Successfully Mail sent to ".$userName."";
}
echo $message;
?>
