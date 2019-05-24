<?php 
 //WARNING: The contents of this file are auto-generated


/**  
  * FileName => menu.ext.php
  * Added By => Vineet (Modified On Dec-17-2018)
  * Modified By => Vineet (Modified On Dec-17-2018)
  * COMMENT => Added Open Opportunity Report
  */
global $mod_strings, $app_strings, $sugar_config;
if(ACLController::checkAccess('Opportunities', 'list', true)){
	$module_menu[] =Array("index.php?module=Opportunities&action=OpenOpportunitiesReport",'Open Opportunity Report',"Report", 'Open Opportunity Report');
}

?>