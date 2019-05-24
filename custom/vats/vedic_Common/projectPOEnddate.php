<?php 
/**
  * FileName => projectPOEnddate.php
  * Created By => Lakshmi (Modified On Jan-08-2019)
  * Modified By => Lakshmi (Modified On Jan-08-2019)
  * COMMENT => code for PO Enddate to update in profile for respective project
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;

$profileid = $_REQUEST['profileid'];
$projectPOEnddate = $_REQUEST['projectPOEnddate'];
$projectPOEnddate = date_format(date_create($projectPOEnddate),"Y-m-d");
require_once('modules/vedic_Profiles/vedic_Profiles.php');
$prof = new vedic_Profiles();
$prof->retrieve($profileid);
$profilePOEndDate = $prof->po_end_date_c;
$profilePOEndDate = date_format(date_create($profilePOEndDate),"Y-m-d");
if($profilePOEndDate != $projectPOEnddate) {
	$updatePOEnddate = "update vedic_profiles_cstm set po_end_date_c = '$projectPOEnddate' where id_c = '$profileid' ";
	$db->query($updatePOEnddate);
}
?>
