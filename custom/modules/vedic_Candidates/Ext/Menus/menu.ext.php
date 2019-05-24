<?php 
 //WARNING: The contents of this file are auto-generated


/**  
	* FileName => CustomMenu.php
	* Modified By => Udaykiran (Modified On Jun-13-2018)
	* COMMENT => Added the All items report only for Leadership role users to the menu
	* COMMENT => Added the conditions to display menu based on Operations & Solutions Teams
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
	if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=BenchMaster", 'Bench Master Report',"Report", 'Bench Master Report');
	if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=EmployeeActive", 'Employee Active Report',"Report", 'Employee Active Report');
	if(in_array("Leadership", $roles)){
		if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] = Array("index.php?module=vedic_Candidates&action=Benchsalesreport&return_module=vedic_Candidates", "All Items Report", 'All Items Report');
	}
	if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=HiredCandidates",'Hired Candidates Report',"Report", 'Hired Candidates Report');
}
else{
	if(in_array($OperationsID, array_keys($groups)) &&  $usertype == 0){
		if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=BenchMaster", 'Bench Master Report',"Report", 'Bench Master Report');
		if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=EmployeeActive", 'Employee Active Report',"Report", 'Employee Active Report');
		if(in_array("Leadership", $roles)){
			if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] = Array("index.php?module=vedic_Candidates&action=Benchsalesreport&return_module=vedic_Candidates", "All Items Report", 'All Items Report');
		}
		if(in_array($SolutionsID, array_keys($groups)) &&  $usertype == 0){
			if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=HiredCandidates",'Hired Candidates Report',"Report", 'Hired Candidates Report');
		}
	}
	else if(in_array($SolutionsID, array_keys($groups)) &&  $usertype == 0){
		if(ACLController::checkAccess('vedic_Candidates', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Candidates&action=HiredCandidates",'Hired Candidates Report',"Report", 'Hired Candidates Report');
	}
}

?>