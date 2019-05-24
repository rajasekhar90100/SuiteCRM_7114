<?php 
 //WARNING: The contents of this file are auto-generated


/**
  * FileName => menu.ext.php
  * Added By => Rajasekhar (Modified On Dec-10-2018)
  * Modified By => Udaykiran (Modified On Jan-17-2019)
  * COMMENT => Added the Timesheet Detailed Report and Practice ManagerReport and Project Manager Report
  */
global $current_user, $db,$dictionary,$app_list_strings;
$User = $current_user->name;
$currentUser = $current_user->id;
$userType = $current_user->is_admin;
$userid="SELECT reports_to_id AS id FROM users WHERE reports_to_id !='' AND users.deleted=0";
$result=$db->query($userid);
while($row=$db->fetchByAssoc($result)){
	$reportsToManagers[]=$row[id];
}
$objACLRole = new ACLRole();
$roles = $objACLRole->getUserRoles($currentUser);
if(in_array("Solutions Project Manager", $roles) || $userType == 1 ) {
	if(!in_array($currentUser, $reportsToManagers) && (in_array("Solutions Project Manager", $roles))) {
		if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=TimesheetDetailedHoursReport",'Timesheet Detailed Hours Report',"Report", 'Timesheet Detailed Hours Report');
		if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=NonSubmittedTimesheetReport",'Weekly Timesheet Status Report',"Report", 'Weekly Timesheet Status Report');
		if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=Labourbyproject",'Labor By Project Report',"Report", 'Labor By Project Report');
	}
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=ProjectManagerReport",'Project Manager Report',"Report", 'Project Manager Report');
	
}
if(in_array($currentUser, $reportsToManagers)|| $userType == 1) {
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=TimesheetDetailedHoursReport",'Timesheet Detailed Hours Report',"Report", 'Timesheet Detailed Hours Report');
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=ReportingManagerReport",'Practice Manager Report',"Report", 'Practice Manager Report');
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=NonSubmittedTimesheetReport",'Weekly Timesheet Status Report',"Report", 'Weekly Timesheet Status Report');
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=Labourbyproject",'Labor By Project Report',"Report", 'Labor By Project Report');
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=unbilledhoursreport",'Unbilled Time Report',"Report", 'Unbilled Time Report');
}
//Code to display the reports for the users who are in "Solutions FInance User" role.
if(in_array("Solutions Finance User", $roles) && $userType == 0) {
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=TimesheetDetailedHoursReport",'Timesheet Detailed Hours Report',"Report", 'Timesheet Detailed Hours Report');
	if(ACLController::checkAccess('vedic_Solutions_Timesheet', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Timesheet&action=NonSubmittedTimesheetReport",'Weekly Timesheet Status Report',"Report", 'Weekly Timesheet Status Report');	
}

?>