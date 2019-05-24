<?php
/**
  * FileName => unlockTimesheet.php
  * Created By => Lakshmi (Created On Apr-04-2019)
  * Modified By => Lakshmi (Modified On Apr-04-2019)
  * COMMENT => Custom code for making timesheet unlock the previous week
  */
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');

global $db, $current_user;
$ids = $_REQUEST['ids'];
$UserId = implode(" ",$ids);
$UID = ltrim($UserId,'#');
$updateQuery = 'UPDATE users
							SET  timesheetaccess = 1
							WHERE id= "'.$UID.'"';
$result = $db->query($updateQuery);
?>

