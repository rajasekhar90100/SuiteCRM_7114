<?php
/** 
	*File Name => setuserpreferences.php
	*Created By=> Rajasekhar(Created On Oct-25-2017)
	*Modified By => Rajasekhar(Modified on Oct-25-2017)
	*COMMENT => entry point to set as per user preference
	*/
chdir(dirname(dirname(dirname(dirname(__FILE__)))));
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('modules/UserPreferences/UserPreference.php');
 global $current_user;

$multiseletresult= isset($_REQUEST['financereportuserprefarence']) ? $_REQUEST['financereportuserprefarence'] : false;
$multiseletresult1= isset($_REQUEST['financereportuserprefarence1']) ? $_REQUEST['financereportuserprefarence1'] : false;
$user_preferences = new UserPreference($current_user);

if($multiseletresult) {	
	$user_preferences->setPreference('financereportresult',$multiseletresult,'financereportresult'); //set some settings to SESSION 
	$user_preferences->savePreferencesToDB(); //set some settings from SESSION to DB  
	$preferences1 = $user_preferences->getPreference('financereportresult','financereportresult'); //get setting by name
}
if($multiseletresult1) {	
	$user_preferences->setPreference('financereportresult1',$multiseletresult1,'financereportresult1'); //set some settings to SESSION 
	$user_preferences->savePreferencesToDB(); //set some settings from SESSION to DB  
	$preferences1 = $user_preferences->getPreference('financereportresult1','financereportresult1'); //get setting by name
}
?>