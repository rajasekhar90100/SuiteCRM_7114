<?php
/**
  * FileName => keyskills.php
  * CreatedBy => Lakshmi(Created on June-26-2018)
  * Modified By => Lakshmi(Modified on June-26-2018)
  * Comment => To display the key skills based on type
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
global $db,$sugar_config;
$type = $_REQUEST['type'];
if($type != 'Us_staffing') {
	$keySkills = $GLOBALS['app_list_strings']['solutions_keyskills'];
	$flexData ="<datalist id='keySkills'>";
		foreach($keySkills as $k=>$v){
			$flexData .= "	<option value='".$v."' >".$v."</option>";
		}
	$flexData .= "</datalist>";
}
else {
	$keySkills = $GLOBALS['app_list_strings']['keyskill_list'];	
	$flexData ="<datalist id='keySkills'>";
		foreach($keySkills as $k=>$v){
			$flexData .= "	<option value='".$v."' >".$v."</option>";
		}
	$flexData .= "</datalist>";	
}
print_r($flexData);
?>

