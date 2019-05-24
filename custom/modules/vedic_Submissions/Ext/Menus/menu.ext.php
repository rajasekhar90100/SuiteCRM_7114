<?php 
 //WARNING: The contents of this file are auto-generated


 // if(ACLController::checkAccess('vedic_Submissions', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Submissions&action=reportsubmissions", 'Submissions Statistics',"Report", 'Submissions Statistics');
	
	


/**
  * FileName => menu.ext.php
  * Created By => Lakshmi (Created On Mar-08-2018)
  * Modified By => Lakshmi (Modified On Mar-08-2018)
  * COMMENT =>Code to disable the direct create option for the submission module
  */
foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_NEW_RECORD'])
 {
	unset($module_menu[$key]);
 }
 }

?>