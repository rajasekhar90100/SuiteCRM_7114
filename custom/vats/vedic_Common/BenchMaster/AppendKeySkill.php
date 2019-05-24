<?php
/**
  * FileName => AppendKeySkill.php
  * Created By => Udaykiran (Created On Jun-28-2018)
  * Modified By => Maneesha (Modified On Aug-24-2018)
  * COMMENT => Code to update the values in the audit table of profiles,canIdates for Bench Master Report,Employee Active Report
  * COMMENT => Change made for require_once for parser.dropdown.php.
  */
if(!defined('sugarEntry')) define('sugarEntry', true);

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
require_once('include/entryPoint.php');
require_once('modules/Audit/Audit.php');
require_once('data/BeanFactory.php');  
require_once('modules/vedic_Profiles/vedic_Profiles.php');
require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
require_once('custom/modules/ModuleBuilder/parsers/parser.dropdown.php');
require_once('include/utils.php');  
include_once('custom/include/language/en_us.lang.php');
require_once('modules/Administration/Common.php');
require_once('modules/Administration/QuickRepairAndRebuild.php');	
global $db, $current_user,$app_list_strings,$timedate,$sugar_config;

$timeDate = new TimeDate();
$CurrentDateTime = $timedate->getInstance()->nowDb();
$currentUser = $current_user->id;
$profId = $_REQUEST['rowID'];
$fieldID = $_REQUEST['fieldID'];
$preValue = $_REQUEST['pre_value'];
$postValue = $_REQUEST['post_value'];
$fieldName = explode('.',$fieldID);

	$str = array();
	$bean = BeanFactory::getBean('vedic_Profiles', $profId);
	//code to get all the audited fields in the Profiles module
	if(!empty($bean->field_name_map)) {
		foreach($bean->field_name_map as $field_nm_arr) {
			if($field_nm_arr['audited']) {
				$arr = $field_nm_arr['name'];				
				array_push($str,$arr);
			}
		}
	}
	if(($preValue[$fieldID])!=($postValue[$fieldID])&&($postValue[$fieldID])) {
		//Code to check the availability of selected technology in keyskill dom
		$technology = strtoupper($postValue[$fieldID]);
		$totalKeySkills = $app_list_strings['keyskill_list'];
		$totalKeySkills= array_change_key_case($totalKeySkills,CASE_UPPER);
		$totalKeySkillsKeys= array_keys($totalKeySkills);
		if(in_array($technology,$totalKeySkillsKeys))	{
			$technology = $totalKeySkills[$technology];				
		}
		else {		
			$technology= ucwords($postValue[$fieldID]);
			$parser = new ParserDropDown();
			$params = array();
			$_REQUEST['view_package'] = 'studio'; //need this in parser.dropdown.php
			$params['view_package'] = 'studio';
			$params['dropdown_name'] = 'keyskill_list'; //replace with the dropdown name
			$params['dropdown_lang'] = 'en_us';
			$params['use_push']=true;
			//create your list...substitute with db query as needed
			$properties['options'] = 'keyskill_list'; 
			foreach (array_merge($app_list_strings['keyskill_list'],(array)$technology) as $k=>$v) { 
				//merge new and old values
				$dropList[] = array($v,$v);
			}
			$json = getJSONobj();
			$params['list_value'] = $json->encode($dropList);
			$parser->saveDropDown($params);	
		}
		//Query to update the technology in profiles audit table	
		$type = $bean->field_name_map[$fieldName[1]]['type'];
		$query = $db->query("UPDATE vedic_profiles
								SET 
									modified_user_id ='$currentUser',
									date_modified = '$CurrentDateTime'
								WHERE id = '$profId'");
		$id=create_guid();
		$auditProfile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
		VALUES ('".$id."',
				'".$profId."',
				'".$CurrentDateTime."',
				'".$currentUser."',
				'".$fieldName[1]."',
				'".$type."',
				'".$preValue[$fieldID]."',
				'".$technology."',
				'',
				'')";

		$update_result = $db->query($auditProfile);
		//Code to get the related canIdate id and his/her key skills
		require_once('modules/vedic_Profiles/vedic_Profiles.php');
		$profile = new vedic_Profiles();
		$profile->retrieve($profId);
		$canId = $profile->vedic_candidates_vedic_profiles_1vedic_candidates_ida;
		require_once('modules/vedic_Candidates/vedic_Candidates.php');
		$canIdate = new vedic_Candidates();
		$canIdate->retrieve($canId);
		$oldKeySkillscanIdate = $canIdate->keyskill_list;
		$keySkills = explode(",",$oldKeySkillscanIdate);
		//code to check and update keyskills to the related canIdate record
		if ((is_null($oldKeySkillscanIdate))||($oldKeySkillscanIdate == '')||($oldKeySkillscanIdate == '^^')) {		
			$query = $db->query("update vedic_candidates set keyskill_list = '^$technology^' where id ='$canId'");			
		}
		else {	
			if (!in_array("^".$technology."^", $keySkills)) { 
				if(count($keySkills) >=1) {
					$technologyNew = "^".$technology."^";   
					$keySkillList = $oldKeySkillscanIdate.",".$technologyNew;
				}
				else {
					$keySkillList = "^".$technology."^";
				}
				$query = $db->query("UPDATE vedic_candidates SET keyskill_list ='$keySkillList' WHERE id ='$canId'");
			}
		}
								
		if(!empty($keySkillList)) {
			//Query to update the keyskills in the canIdates audit table 
			$id=create_guid();
			$auditcanIdate = "INSERT INTO `vedic_candidates_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
			VALUES ('".$id."',
				'".$canId."',
				'".$CurrentDateTime."',
				'".$currentUser."',
				'keyskill_list',
				'multienum',
				'".$oldKeySkillscanIdate."',
				'".$keySkillList."',
				'',
				'')";
			$update_result = $db->query($auditcanIdate);
			$query = $db->query("UPDATE vedic_candidates
								SET 
									modified_user_id ='$currentUser',
									date_modified = '$CurrentDateTime'
								WHERE id = '$canId'");
		}
		if($technology!=''){
			echo $technology;
		}
	}
