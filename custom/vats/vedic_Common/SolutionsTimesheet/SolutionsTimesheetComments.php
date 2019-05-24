<?php
/**
  * FileName => SolutionsTimesheetComments.php
  * Created By => Rajasekhar (Created On Oct-02-2018)
  * Modified By => Maneesha (Modified On Mar-05-2019)
  * COMMENT => Custom code for timesheet comments based on timesheet date.
  */
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('include/TimeDate.php');

global $db, $current_user,$app_list_strings,$sugar_config,$timedate;
$Id = $_REQUEST['id'];
$order = $_REQUEST['order'];
$rejectcomment = $_REQUEST['rejectcomment'];
$projID = $_REQUEST['projID'];
$ord = explode("_",$order);
$roworder = 'timesheet_'.$ord[4];
$fieldorder = $ord[3];
$comments = 'timesheet_comments_day_'.$fieldorder;
$user = 'comments_by_day_'.$fieldorder;
$time = 'comments_date_day_'.$fieldorder;
if(!empty($projID) && !empty($rejectcomment)) {
	$query = $db->query("select reason_rejection from solution_timesheet_cycle where id_c ='$Id' AND solution_project='$projID' ");
	$result = $db->fetchByAssoc($query);
	$timesheetComments = $result['reason_rejection'];
}
else if(!empty($projID)) {
	$query = $db->query("select $comments as timesheet_comments,$user as comments_by,$time as comments_date from solution_timesheet_cycle where id_c ='$Id' AND solution_project='$projID' ");
	$result = $db->fetchByAssoc($query);
	$timesheetComments = $result['timesheet_comments'];
	$commentsBy = $result['comments_by'];
	$commentsDate = $result['comments_date'];
}
else {
	$query = $db->query("select $comments as timesheet_comments,$user as comments_by,$time as comments_date from solution_timesheet_cycle where id_c ='$Id' AND compare='$roworder' ");
	$result = $db->fetchByAssoc($query);
	$timesheetComments = $result['timesheet_comments'];
	$commentsBy = $result['comments_by'];
	$commentsDate = $result['comments_date'];
}
// $result = $db->fetchByAssoc($query);
// $timesheetComments = $result['timesheet_comments'];
// $commentsBy = $result['comments_by'];
// $commentsDate = $result['comments_date'];
$commentsDate1 = explode("||",$commentsDate);
$cDate = array();
for($i=0;$i<= count($commentsDate1);$i++) {
	$timeDate = new TimeDate();
	if($commentsDate1[$i]!='') {
		$cDate[$i] = $timeDate->to_display_date_time($commentsDate1[$i], true, true, $current_user);
	}
}
$cDate = implode("||",$cDate);
$cDate = $cDate."||";
echo $timesheetComments."~".$commentsBy."~".$cDate;
?>