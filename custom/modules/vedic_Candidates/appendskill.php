<?php
/**
  * FileName => appendskill.php
  * FunctionName => Appendskill
  * CreatedBy => Maneesha(Created on Jun-07-2018)
  * Modified By => Maneesha (Modified on Aug-23-2018)
  * Comment => logic hook file to append keyskills to different DOM's based on candidate type ,maintain the audit log for keyskills
  */
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
require_once('custom/modules/ModuleBuilder/parsers/parser.dropdown.php');   //changed path from standard to custom
require_once('include/utils.php');  
include_once('custom/include/language/en_us.lang.php');
require_once('modules/Administration/Common.php');
require_once('modules/Administration/QuickRepairAndRebuild.php');				
class AppendSkill 
{
	/**  
      * Function => appendSkill()
	  * CreatedBy => Maneesha(Created on Jun-07-2018)
      * Modified By => Udaykiran (Modified On Jun-27-2018)
      * COMMENT => Append keyskills to their respective DOM's
      */
	function appendSkill(&$bean, $event, $arguments) 
	{
		global $db, $current_user,$app_list_strings,$sugar_config;
		$id = $bean->id;
		$typeHiring = $bean->type_hiring;
		$keySkills = $bean->keyskill_list;
		$assignedUserId= $bean->assigned_user_id;
		/* Adding the condition  for not updating the keyskills for the candidates which are created from portals */
		if($id && $assignedUserId!='1') {
			if($typeHiring =='Us_staffing')	{
				$keyList = 'keyskill_list';
				$appKeyList = $app_list_strings['keyskill_list'];
			}
			else {
				$keyList = 'solutions_keyskills';
				$appKeyList = $app_list_strings['solutions_keyskills'];
			}	
			
			if(strpos($keySkills, ","))	{
				$keySkills=explode(",",$keySkills);
				$totalKeySkills = $appKeyList;
				//Comparing keyskills
				$matchedKeySkills = array_uintersect($totalKeySkills, $keySkills, 'strcasecmp');
				$unmatchedKeySkills = array_udiff($keySkills, array_keys($totalKeySkills), 'strcasecmp');
				$matchedArrayValues = array_values($matchedKeySkills);
				foreach($matchedArrayValues as $k => $v) {
					$matchedKeySkillValues[] = $totalKeySkills[$v];
				}
				if($matchedKeySkillValues){}
				if($unmatchedKeySkills)	{
					$keySkillList = array_map('ucwords', $unmatchedKeySkills);
					$parser = new ParserDropDown();
					$params = array();
					$_REQUEST['view_package'] = 'studio'; //need this in parser.dropdown.php
					$params['view_package'] = 'studio';
					$params['dropdown_name'] = $keyList; //replace with the dropdown name
					$params['dropdown_lang'] = 'en_us';
					$params['use_push']=true;
					//create your list...substitute with db query as needed
					$properties['options'] = 'keyskill_list'; 
					foreach (array_merge($appKeyList,$keySkillList) as $k=>$v) { 
						//merge new and old values
						$dropList[] = array($v,$v);
					}
					$json = getJSONobj();
					$params['list_value'] = $json->encode($dropList);
					$parser->saveDropDown($params);
				}
				$oldKeySkills = $bean->fetched_row['keyskill_list'];
				$combinedKeySkills = array_merge((array)$matchedKeySkillValues,(array)$keySkillList);			
				$combinedKeySkills = implode(',',$combinedKeySkills);
				$keySkills = str_replace(',','^,^',$combinedKeySkills);
				$keySkillList = '^'.$keySkills.'^';
				//Query to update the keyskills in the database
				$updateQuery = 'UPDATE vedic_candidates 
									SET keyskill_list = "'.$keySkillList.'" 
									WHERE id = "'.$id.'" 
									AND deleted=0';
				$result = $db->query($updateQuery);
				$this->auditKeySkill($combinedKeySkills,$oldKeySkills,$id);
			}
			else {
				$keySkillList = strtoupper($keySkills);
				$oldKeySkills = $bean->fetched_row['keyskill_list'];
				$totalKeySkills = $appKeyList;
				$totalKeySkills= array_change_key_case($totalKeySkills,CASE_UPPER);
				$totalKeySkillsKeys= array_keys($totalKeySkills);
				if(in_array($keySkillList,$totalKeySkillsKeys))	{
					$keySkillList = $totalKeySkills[$keySkillList];				
				}
				else {		
					$keySkillList= ucwords($keySkills);
					$parser = new ParserDropDown();
					$params = array();
					$_REQUEST['view_package'] = 'studio'; //need this in parser.dropdown.php
					$params['view_package'] = 'studio';
					$params['dropdown_name'] = $keyList; //replace with the dropdown name
					$params['dropdown_lang'] = 'en_us';
					$params['use_push']=true;
					//create your list...substitute with db query as needed
					$properties['options'] = 'keyskill_list'; 
					foreach (array_merge($appKeyList,(array)$keySkillList) as $k=>$v) { 
						//merge new and old values
						$dropList[] = array($v,$v);
					}
					$json = getJSONobj();
					$params['list_value'] = $json->encode($dropList);
					$parser->saveDropDown($params);	
					$keySkillList= '^'.$keySkillList.'^';
				}
				//Query to update the keyskills in the database
				$updateQuery = 'UPDATE vedic_candidates 
									SET keyskill_list = "'.$keySkillList.'" 
									WHERE id = "'.$id.'" 
									AND deleted=0';
				$result = $db->query($updateQuery);
				$this->auditKeySkill($keySkillList,$oldKeySkills,$id);
			}	
		}		
	}
	/**  
      * Function => auditKeySkill()
      * Created By => Udaykiran (Modified On Jun-26-2018)
      * Modified By => Udaykiran (Modified On Jun-26-2018)
      * COMMENT => code to maintain the audit log for keyskills field when data is modified
      */
	function auditKeySkill($keySkills,$oldKeySkills,$canID)
	{
		global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;
		$timeDate = new TimeDate();
		$CurrentDateTime = $timedate->getInstance()->nowDb();
		$currentUser = $current_user->id;
		$oldKeySkills = str_replace('^','',$oldKeySkills);
		if(strcasecmp($keySkills,$oldKeySkills)!= 0 ) {
			$id=create_guid();
			$auditCandidate = "INSERT INTO `vedic_candidates_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
			VALUES ('".$id."',
					'".$canID."',
					'".$CurrentDateTime."',
					'".$currentUser."',
					'keyskill_list',
					'multienum',
					'".$oldKeySkills."',
					'".$keySkills."',
					'',
					'')";
			$update_result = $db->query($auditCandidate);
		}
	}
}
