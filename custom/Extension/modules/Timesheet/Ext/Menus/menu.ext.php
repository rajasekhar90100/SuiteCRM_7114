<?php
/**
	* FileName => menu.ext.php
	* Created By =>LakshmiGayathri(Created On  Oct-4-2017)
	* Modified By =>LakshmiGayathri(Modify On Oct-4-2017)
	* COMMENT => To Disable the create timesheet action in timesheet module
	*/
foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_NEW_TIMESHEET'])
 unset($module_menu[$key]);
}
?>