<?php
/**
  * FileName => checkduplicatesolutiontimesheet.php
  * Created By => Maneesha(Created on Nov-21-2018)
  * Modified By => Udaykiran(Modified on Jan-15-2019)
  * Comment => EntryPoint file to check the duplicate solution timesheet with start date,end date,user relationship id.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
require_once('custom/modules/vedic_Solutions_Timesheet/views/view.edit.php');
global $db,$sugar_config,$timedate,$current_user;
$userId = $_REQUEST['userId'];
$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];
$startdate = $timedate->to_db_date($startdate,false);
$enddate = $timedate->to_db_date($enddate,false);
if(!empty($userId)) {
	$query=$db->query("SELECT count(*) as Count,vst.id AS id,
								vst.startdate,
							   vst.enddate
						FROM vedic_solutions_timesheet as vst
					   INNER JOIN users_vedic_solutions_timesheet_1_c as uvst 
					   ON uvst.users_vedic_solutions_timesheet_1vedic_solutions_timesheet_idb = vst.id 
					   WHERE vst.deleted ='0'
						 AND ((vst.startdate >= '$startdate'
								AND vst.enddate <= '$enddate')
							   OR (vst.startdate <= '$enddate'
								   AND vst.enddate >= '$startdate'))
						  AND uvst.users_vedic_solutions_timesheet_1users_ida = '$userId'
						  AND uvst.deleted=0");

    $result = $db->fetchByAssoc($query);
	print_r($result['Count']."---".$result['id']."---".$result['startdate']."---".$result['enddate']);
}
?>