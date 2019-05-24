<?php
/**
  * FileName => getUserPreference.php
  * Created By => Udaykiran (Created On Dec-05-2018)
  * Modified By => Udaykiran (Modified On Dec-05-2018)
  * COMMENT => Code to fetch the user preference date format
  */

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('include/TimeDate.php');

global $db, $current_user,$app_list_strings,$sugar_config,$timedate;
$startDate = $_REQUEST['n3'];
$endDate = $_REQUEST['n4'];
$timeDate = new TimeDate();
	if($startDate!='') {
		$startDate = $timedate->swap_formats($startDate, 'm/d/Y', $timedate->get_date_format($current_user));
	}
	if($endDate!='') {
		$endDate = $timedate->swap_formats($endDate, 'm/d/Y', $timedate->get_date_format($current_user));
	}
echo $startDate."--".$endDate;
?>
