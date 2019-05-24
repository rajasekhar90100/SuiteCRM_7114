<?php
/**
  * FileName => updateAgreement.php
  * Created By => Udaykiran (Modified On Nov-01-2018)
  * Modified By => Udaykiran (Modified On Nov-01-2018)
  * COMMENT => Code to update the agreement from Terms and Conditions Page
  */  
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('modules/Users/User.php');

global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;

$currentUser = $current_user->id;
$status = $_REQUEST['status'];

if(isset($_REQUEST['status'])) {	
	$users = new User();
	$users->retrieve($currentUser);
	$users->acceptance_status= $status;
	$users->save();
	echo "Success";
}

