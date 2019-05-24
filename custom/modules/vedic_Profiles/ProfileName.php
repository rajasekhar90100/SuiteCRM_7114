<?php
/**
  * FileName => ProfileName.php
  * Created By => Maneesha (Created On Feb-07-2018)
  * Modified By => Maneesha (Modified On Nov-12-2018)
  * COMMENT => Code to update the firstname,lastname of a profile and to update the keyskill list for particular candidate
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class ProfileName 
{
	function updateProfileName(&$bean, $event, $arguments)
    {
		global $db,$current_user;
		$profileID= $bean->id;
		$canId = $_REQUEST['vedic_candidates_vedic_profiles_1vedic_candidates_ida'];
		if(empty($canId)) {
			$canId = $bean->vedic_candidates_vedic_profiles_1vedic_candidates_ida;
		}
		require_once('modules/vedic_Candidates/vedic_Candidates.php');
		$candidate = new vedic_Candidates();
		$candidate->retrieve($canId);
		$firstName = ucwords($candidate->first_name);
		$lastName = ucwords($candidate->last_name);	
		$update= "UPDATE vedic_profiles 
					SET first_name ='".$firstName."',last_name = '".$lastName."' 
					WHERE id ='".$profileID."'";
		$updateRes = $db->query($update);
		if($stage =='Billing' && $status == 'Active'){
			$updateStageFlag = "UPDATE vedic_profiles SET stage_flag ='1'	WHERE id ='".$profileID."'";
			$updateStageFlagRes = $db->query($updateStageFlag);
		}
	}
	function keySkill(&$bean, $event, $arguments) 
	{
		global $db,$current_user,$timedate;
		$bean_id= $bean->id;
		$technology = $bean->technology_c;
		$technology = "^".$technology."^";   
		$id = $_REQUEST['vedic_candidates_vedic_profiles_1vedic_candidates_ida'];
		$keySkill = $db->query("select keyskill_list from vedic_candidates where id = '$id'");
		while($result = $db->fetchByAssoc($keySkill)) {
			$totalKeySkills= $result['keyskill_list'];
			$keySkills = explode(",",$totalKeySkills); 
		}
		if ((is_null($totalKeySkills))||($totalKeySkills == '')||($totalKeySkills == '^^') || $technology=='') {		
			$keySkillList = $technology;
			$query = $db->query("update vedic_candidates set keyskill_list = '$keySkillList' where id ='$id'");
		}
		else {
			if(!in_array($technology,$keySkills)) {
			/* code added by Maneesha -Sep-07-2018 */
				#technology in profiles
				if($technology != '^^') {
					if(count($keySkills) >= 1) {
						if(count($keySkills)==1 && $technology=='^^'){
							$keySkillList = $totalKeySkills;
						}
						else {
							$keySkillList = $totalKeySkills.",".$technology;
						}
					}
					else {
						$keySkillList = $technology;
					}
					$query = $db->query("UPDATE vedic_candidates SET keyskill_list ='$keySkillList' WHERE id ='$id'");
				}
			}
			/* End of Maneesha's code -Sep-07-2018 */
		}
		//code to maintain the audit log in realted candidate record when technology is modified in profile record.
		if(!empty($keySkillList)){
			/* Start of  Code for not update keyskills with '^' in candidates audit table - By Maneesha (Nov-12-2018)*/
			if(strpos($keySkillList,"^")){
				$keySkillList = str_replace('^','',$keySkillList);
			}
			/* End of Code for added by for not update keyskills with '^' in candidates audit table - By Maneesha (Nov-12-2018)*/
			$auditId= create_guid();
			$timeDate = new TimeDate();
			$currentDateTime = $timedate->getInstance()->nowDb();
			$currentUser = $current_user->id;
			$audit_query =$db->query("INSERT INTO `vedic_candidates_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
			VALUES ('".$auditId."',
			'".$id."',
			'".$currentDateTime."',
			'".$currentUser."',
			'keyskill_list',
			'multienum',
			'".$totalKeySkills."',
			'".$keySkillList."',
			'',
			'')");
		}
	}
}
?>