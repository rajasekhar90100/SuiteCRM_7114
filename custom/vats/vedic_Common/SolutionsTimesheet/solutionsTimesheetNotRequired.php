<?php
/**
  * FileName => solutionsTimesheetNotRequired.php
  * Created By => Vineet (Created On Jan-18-2019)
  * Modified By => Vineet (Modified On Jan-18-2019)
  * COMMENT => Custom code for making timesheet not required.
  */
  ini_set('display_errors','on');
if(!defined('sugarEntry'))define('sugarEntry', true);
$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:[];
$start = isset($_REQUEST['start'])?$_REQUEST['start']:'';
$end = isset($_REQUEST['end'])?$_REQUEST['end']:'';
foreach($ids as $key => $val) {
	$timesheet = new vedic_Solutions_Timesheet();
	$timesheet->users_vedic_solutions_timesheet_1users_ida = $val;
	$timesheet->pm_approval_status = 'Not_Required';
	$timesheet->rm_approval_status = 'Not_Required';
	$timesheet->startdate = date("Y-m-d",strtotime($start));
	$timesheet->enddate = date("Y-m-d",strtotime($end));
	$timesheet->save();
}
echo true;
?>