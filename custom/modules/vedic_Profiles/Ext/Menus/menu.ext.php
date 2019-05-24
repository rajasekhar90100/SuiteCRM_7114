<?php 
 //WARNING: The contents of this file are auto-generated


/**
  * FileName => menu.ext.php
  * Created By => Udaykiran (Created On Apr-25-2018)
  * Modified By => Udaykiran (Modified On Apr-25-2018)
  * COMMENT =>Code to disable the direct create option for the profiles module
  */
foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_NEW_RECORD'])
 {
	unset($module_menu[$key]);
 }
 if($val[1] == $mod_strings['LNK_IMPORT_VCARD'])
 {
	unset($module_menu[$key]);
 }
 if($val[1] == $app_strings['LBL_IMPORT'])
 {
	unset($module_menu[$key]);
 }
}

?>