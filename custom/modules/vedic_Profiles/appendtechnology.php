<?php
/**
  * FileName => appendtechnology.php
  * CreatedBy => Maneesha(Created on June-27-2018)
  * Modified By => Maneesha(Modified on Aug-24-2018)
  * Comment => logic hook file to append technology when selecting in profiles,append to keyskill dom.
  */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class AppendTechnology 
{
	/**  
      * Function => appendTechnology()
	  * CreatedBy => Maneesha(Created on Jun-27-2018)
      * Modified By => Maneesha (Modified On Jun-27-2018)
      * COMMENT => Append technologies which are not present in keyskill list DOM
      */
	function appendTechnology(&$bean, $event, $arguments) 
	{
		global $db, $current_user,$app_list_strings,$sugar_config;
		$id = $bean->id;
		$assignedUserId = $bean->assigned_user_id;
		if($id && $assignedUserId!='1')	{
			$keySkills = $bean->technology_c;
			$totalKeySkills = $app_list_strings['keyskill_list'];
			//Comparing keyskills
			$keySkillList = strtoupper($keySkills);
			$totalKeySkills= array_change_key_case($totalKeySkills,CASE_UPPER);
			$totalKeySkillsKeys= array_keys($totalKeySkills);
			if(in_array($keySkillList,$totalKeySkillsKeys))	{
				$keySkills = $totalKeySkills[$keySkillList];				
			}
			else {
				require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
				require_once('custom/modules/ModuleBuilder/parsers/parser.dropdown.php'); //file path changed from standard to custom
				require_once('modules/Studio/DropDowns/DropDownHelper.php');
				require_once('include/utils.php');  
				include_once('custom/include/language/en_us.lang.php');
				require_once('modules/Administration/Common.php');
				require_once('modules/Administration/QuickRepairAndRebuild.php');				
				$parser = new ParserDropDown();
				$params = array();
				$keySkills = ucwords($keySkills);
				$_REQUEST['view_package'] = 'studio'; //need this in parser.dropdown.php
				$params['view_package'] = 'studio';
				$params['dropdown_name'] = 'keyskill_list'; //replace with the dropdown name
				$params['dropdown_lang'] = 'en_us';
				$params['use_push']=true;
				//create your list...substitute with db query as needed
				$properties['options'] = 'keyskill_list'; 
				foreach (array_merge($app_list_strings['keyskill_list'],(array)$keySkills) as $k=>$v) { 
					//merge new and old values
					$dropList[] = array($v,$v);
				}
				$json = getJSONobj();
				$params['list_value'] = $json->encode($dropList);
				$parser->saveDropDown($params);	
			}
			//Query to update the techonologies in the database
			$updateQuery = 'UPDATE vedic_profiles_cstm
								SET  technology_c = "'.$keySkills.'" 
								WHERE id_c = "'.$id.'"';
			$result = $db->query($updateQuery);
		}
	}
}
?>