<?php 
 //WARNING: The contents of this file are auto-generated


/**  
  * FileName => CustomMenu.php
  * Added By => Rajasekhar (Modified On Jun-14-2018)
  * Modified By => Rajasekhar (Modified On Jun-15-2018)
  * COMMENT => Added the Job Status report only for Solutions Team
  */

global $current_user;

$objACLRole = new ACLRole();
$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
$usertype = $current_user->is_admin;
$securitygroup = new SecurityGroup();
$groups = $securitygroup->getUserSecurityGroups($GLOBALS['current_user']->id);
$Operations = $securitygroup->retrieve_by_string_fields(array('name'=>'Operations','deleted'=>0));
$OperationsID = $Operations->id;
$Solutions = $securitygroup->retrieve_by_string_fields(array('name'=>'Solutions','deleted'=>0));
$SolutionsID = $Solutions->id;
if($usertype == 1){
	if(ACLController::checkAccess('vedic_job', 'edit', true))$module_menu[] =Array("index.php?module=vedic_job&action=Jobstatusreport",'Job Status Report',"Report", 'Job Status Report');
}
else{
	if(in_array($SolutionsID, array_keys($groups)) &&  $usertype == 0){
		if(ACLController::checkAccess('vedic_job', 'edit', true))$module_menu[] =Array("index.php?module=vedic_job&action=Jobstatusreport",'Job Status Report',"Report", 'Job Status Report');
	}
}
?>