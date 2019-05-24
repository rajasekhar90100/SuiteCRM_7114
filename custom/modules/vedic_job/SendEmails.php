<?php
/**  
  * FileName => SendEmails.php
  * Added By => Udaykiran (Added On July-14-2018)
  * Modified By => Udaykiran (Modified On July-14-2018)
  * COMMENT => Code to send the mails from jobs
  */
require_once("custom/library/sendMail.php");
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
	global $current_user,$db;
	$userID = $current_user->id;

	$User = new User();		//user object
	$User->retrieve($current_user->id);	//retrieve user data
	$current_user_email = $User->email1;
	$current_user_name = $current_user->name;
	$current_user_phone = $current_user->phone_work;
	$postermailid = $_REQUEST['to'];
	$ccmailid = $_REQUEST['cc'];
	$bccmailid = $_REQUEST['bcc'];
	$html_body = html_entity_decode($_REQUEST['body']);
	$subject = $_REQUEST['subject'];
	
	if($subject !=''){
		sendMail($postermailid,$ccmailid,$bccmailid, $current_user_email, $current_user_name,$html_body,$subject,$attchment,$attchment_name);
		echo "Success";
	}
?>
