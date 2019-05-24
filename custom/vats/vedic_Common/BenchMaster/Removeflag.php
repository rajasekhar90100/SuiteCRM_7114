<?php
/**
  * FileName => Removeflag.php
  * Created By => Udaykiran (Created On May-08-2018)
  * Modified By => Udaykiran (Modified On Sep-17-2018)
  * COMMENT => Code to remove the flag when Bench Master is reloaded
  */

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$current_user,$app_list_strings,$sugar_config;
$flag = $_REQUEST['des'];
$currentUser = $current_user->id;
if($flag!='')
{
	$query_can = $db->query("update vedic_profiles SET description=NULL WHERE description='true'");
}
