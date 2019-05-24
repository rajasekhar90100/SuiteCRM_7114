<?php
/**
  * FileName => auditCandidate.php
  * Created By => Maneesha(Created On Nov-28-2017)
  * Modified By => Maneesha (Modified On Aug-27-2018)
  * COMMENT => Code to update the values in the audit table of profiles
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
require_once ('include/entryPoint.php');
require_once ('modules/Audit/Audit.php');
require_once('data/BeanFactory.php');  
require_once('modules/vedic_Profiles/vedic_Profiles.php');  
global $db, $current_user,$app_list_strings,$db,$timedate,$sugar_config;

$timeDate = new TimeDate();
$CurrentDateTime = $timedate->getInstance()->nowDb();

$currentUser = $current_user->id;
$canID = $_REQUEST['rowID'];
$fieldID = $_REQUEST['fieldID'];
$preValue = $_REQUEST['pre_value'];
$postValue = $_REQUEST['post_value'];
$fieldName = explode('.',$fieldID);

$str = array();
	$bean = BeanFactory::getBean('vedic_Profiles', $canID);
	//code to get all the audited fields in the candidates module
	if(!empty($bean->field_name_map))
	{
		foreach($bean->field_name_map as $field_nm_arr)
		{
			if($field_nm_arr['audited'])
			{
				$arr = $field_nm_arr['name'];				

			   array_push($str,$arr);
			}

		}
	}
	
	if($fieldID == 'vedic_profiles_cstm.technology_c')
	{
		$query = $db->query("SELECT vedic_candidates.keyskill_list,vedic_candidates.id FROM vedic_candidates JOIN `vedic_candidates_vedic_profiles_1_c` ON vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_candidates_ida` = vedic_candidates.id JOIN vedic_profiles ON vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_profiles_idb`= vedic_profiles.id WHERE vedic_profiles.id ='$canID ' AND vedic_profiles.deleted=0 AND vedic_candidates.deleted=0 AND vedic_candidates_vedic_profiles_1_c.deleted=0");
		$result = $db->fetchByAssoc($query);
		$keyskills = explode(",",$result['keyskill_list']);
		$candID = $result['id'];
		if ((is_null($result['keyskill_list']))||($result['keyskill_list'] == '')||($result['keyskill_list'] == '^^'))
		{		
			$query = $db->query("update vedic_candidates set keyskill_list = '^$postValue[$fieldID]^' where id ='$candID'");
		}
		else
		{		
			if (!in_array("^".$postValue[$fieldID]."^", $keyskills))
			{
				$query = $db->query("update vedic_candidates set keyskill_list = concat(keyskill_list,',^$postValue[$fieldID]^') where id ='$candID'");
			}
		}
	}
	
$relateFields = array('hirer_1_c','ml_1_c','ml_2_c','hirer_2_c','primary_marketer_c','secondary_marketer_c','sales_c','poc_c','recruiter_c');
if (strpos($fieldName[0], 'vedic_profiles') !== false) {
   
	if (in_array($fieldName[1], $str))
	{
	    if(($preValue[$fieldID])!=($postValue[$fieldID]))
		{	  
			if($fieldName[1] == 'end_client_c')
			{
				if(($preValue[$fieldID])!=($postValue[$fieldID]))
				{
					$pre_val = $preValue[$fieldID];
					$pre_res = $db->query("select name from accounts where deleted=0 AND id = '".$pre_val."'");
					$pre_row = $db->fetchByAssoc($pre_res);
					$pre_name = $pre_row['name'];
					$post_val = $postValue[$fieldID];
					$post_res = $db->query("select name from accounts where deleted=0 AND id ='".$post_val."'");
					$post_row = $db->fetchByAssoc($post_res);
					$post_name = $post_row['name'];
					$type = $bean->field_name_map[$fieldID]['type'];
					$id=create_guid();
					$auditMObile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$canID."',
							'".$CurrentDateTime."',
							'".$currentUser."',
							'".$fieldName[1]."',
							'".$type."',
							'".$pre_name."',
							'".$post_name."',
							'',
							'')";
					$update_result = $db->query($auditMObile);
				}
			}
			/** Start of Maneesha's code-Aug-27-2018 */
			else if(($fieldName[1] == 'project_start_date_c')||($fieldName[1] == 'project_end_date_c')) {
				require_once('modules/vedic_Profiles/vedic_Profiles.php');
				$focus = new vedic_Profiles();
				$focus->retrieve($canID);
				$projectID = $focus->vedic_profiles_project_1project_idb;
				if($fieldName[1] == 'project_start_date_c') {					
					if(($preValue[$fieldID])!=($postValue[$fieldID])) {
						if($projectID!='') {
							require_once('modules/Project/Project.php');
							$project = new Project();
							$project->retrieve($projectID);
							$project->estimated_start_date = $postValue[$fieldID];
							$project->save();
						}
					}
				}
				if($fieldName[1] == 'project_end_date_c') {
					if(($preValue[$fieldID])!=($postValue[$fieldID])) {
						if($projectID!='') {
							require_once('modules/Project/Project.php');
							$project1 = new Project();
							$project1->retrieve($projectID);
							$project1->estimated_end_date = $postValue[$fieldID];
							$project1->save();
						}
					}
				}
				$type = $bean->field_name_map[$fieldName[1]]['type'];
				$query = $db->query("UPDATE vedic_profiles
										SET 
											modified_user_id ='$currentUser',
											date_modified = '$CurrentDateTime'
										WHERE id = '$canID'");
				$id=create_guid();
				$auditMObile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
				VALUES ('".$id."',
						'".$canID."',
						'".$CurrentDateTime."',
						'".$currentUser."',
						'".$fieldName[1]."',
						'".$type."',
						'".$preValue[$fieldID]."',
						'".$postValue[$fieldID]."',
						'',
						'')";
				$update_result = $db->query($auditMObile);				
			}
			/** End of Maneesha's code-Aug-27-2018 */
			else if(($fieldName[1] == 'stage_c')||($fieldName[1] == 'status_c')){   
				$type = $bean->field_name_map[$fieldName[1]]['type'];
				$query = $db->query("UPDATE vedic_profiles
										SET 
											modified_user_id ='$currentUser',
											date_modified = '$CurrentDateTime'
										WHERE id = '$canID'");
				$id=create_guid();
				$auditMObile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
				VALUES ('".$id."',
						'".$canID."',
						'".$CurrentDateTime."',
						'".$currentUser."',
						'".$fieldName[1]."',
						'".$type."',
						'".$preValue[$fieldID]."',
						'".$postValue[$fieldID]."',
						'',
						'')";
				$update_result = $db->query($auditMObile);
				
				$query = $db->query("SELECT vedic_profiles.id AS Id,
									vedic_candidates.id AS CID,
									CONCAT(COALESCE(TRIM(vedic_profiles.first_name),' '),' ', TRIM(vedic_profiles.last_name)) AS Profilename,
									vedic_profiles_cstm.stage_c AS Stage,
									vedic_profiles_cstm.status_c AS STATUS,
									CONCAT(COALESCE(users.first_name,' '),' ', users.last_name) AS PrimaryMarketer,
									CONCAT(COALESCE(user1.first_name,' '),' ', user1.last_name) AS SecondaryMarketer,
									CONCAT(COALESCE(user2.first_name,' '),' ', user2.last_name) AS Hirer1,
									CONCAT(COALESCE(user3.first_name,' '),' ', user3.last_name) AS Hirer2,
									CONCAT(COALESCE(user4.first_name,' '),' ', user4.last_name) AS ML1,
									CONCAT(COALESCE(user5.first_name,' '),' ', user5.last_name) AS ML2,
									CONCAT(COALESCE(hl.first_name,' '),' ', hl.last_name) AS HLName,
									vedic_profiles_cstm.slead_c AS slead,
									CONCAT(COALESCE(sales.first_name,' '),' ', sales.last_name) AS Sales,
									CONCAT(COALESCE(recruiter.first_name,' '),' ', recruiter.last_name) AS Recruiter,
									CONCAT(COALESCE(rl.first_name,' '),' ', rl.last_name) AS RLName,
									vedic_profiles.date_modified AS DateModified,
									CONCAT(COALESCE(modified.first_name,' '),' ', modified.last_name) AS MOdifyBy,
									CONCAT(COALESCE(created.first_name,' '),' ', created.last_name) AS CreatedBy
									FROM vedic_candidates
									JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida = vedic_candidates.id 
									JOIN vedic_profiles ON vedic_profiles.id = vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_profiles_idb`
									LEFT JOIN vedic_profiles_cstm ON vedic_profiles_cstm.id_c = vedic_profiles.id
									LEFT JOIN users ON vedic_profiles_cstm.user_id_c = users.id
									LEFT JOIN users AS user1 ON vedic_profiles_cstm.user_id1_c = user1.id
									LEFT JOIN users AS user2 ON vedic_profiles_cstm.user_id2_c = user2.id
									LEFT JOIN users AS user3 ON vedic_profiles_cstm.user_id3_c = user3.id
									LEFT JOIN users AS user4 ON vedic_profiles_cstm.user_id4_c = user4.id
									LEFT JOIN users AS user5 ON vedic_profiles_cstm.user_id5_c = user5.id
									LEFT JOIN users AS rl ON vedic_profiles_cstm.user_id6_c = rl.id
									LEFT JOIN users AS hl ON vedic_profiles_cstm.user_id8_c = hl.id
									LEFT JOIN users AS sales ON vedic_profiles_cstm.user_id9_c = sales.id
									LEFT JOIN users AS recruiter ON vedic_profiles_cstm.user_id7_c = recruiter.id
									LEFT JOIN users AS modified ON vedic_profiles.modified_user_id = modified.id	
									LEFT JOIN users AS created ON vedic_profiles.created_by = created.id	
									WHERE vedic_profiles.deleted=0 AND vedic_profiles.id ='$canID' AND vedic_candidates.deleted=0 AND vedic_candidates_vedic_profiles_1_c.deleted=0");
				$result = $db->fetchByAssoc($query);	
				$pm = $result['PrimaryMarketer'];		
				$sm = $result['SecondaryMarketer'];		
				$stage = $result['Stage'];		
				$status = $result['STATUS'];		
				$hirer1 = $result['Hirer1'];		
				$hirer2 = $result['Hirer2'];		
				$ml1 = $result['ML1'];		
				$ml2 = $result['ML2'];		
				$hl = $result['HLName'];		
				$rl = $result['RLName'];		
				$slead = $result['slead'];		
				$sales = $result['Sales'];		
				$recruiter = $result['Recruiter'];		
				$modified = $result['DateModified'];		
				$modifiedBy = $result['MOdifyBy'];		
				$createdBy = $result['CreatedBy'];		
				$ID = $result['Id'];		
				$candId = $result['CID'];		
				$Profilename = $result['Profilename'];		
				$history_query = "INSERT INTO `vedic_Profiles_copy`(`primary_marketer_c`,`id`,`candidateid`,`name`,`secondary_marketer_c`,`hirer_1_c`,`hirer_2_c`,`hl_c`,				`ml_1_c`,`ml_2_c`,`slead_c`,`stage_c`,`status_c`,`sales_c`,`recruiter_c`,`rl_c`,`date_entered`,`date_modified`,`modified_user_id`,`created_by`)	VALUES ('$pm','$ID','$candId','$Profilename','$sm','$hirer1','$hirer2','$hl','$ml1','$ml2','$slead','$stage','$status','$sales','$recruiter','$rl',' ','$modified','$modifiedBy','$createdBy')";
				$update_result = $db->query($history_query);
					
			}else{
				$type = $bean->field_name_map[$fieldName[1]]['type'];
				$query = $db->query("UPDATE vedic_profiles
										SET 
											modified_user_id ='$currentUser',
											assigned_user_id = '$currentUser',
											date_modified = '$CurrentDateTime'
										WHERE id = '$canID'");
				$id=create_guid();
				$auditMObile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
				VALUES ('".$id."',
						'".$canID."',
						'".$CurrentDateTime."',
						'".$currentUser."',
						'".$fieldName[1]."',
						'".$type."',
						'".$preValue[$fieldID]."',
						'".$postValue[$fieldID]."',
						'',
						'')";
				$update_result = $db->query($auditMObile);
			}
		}
	}
}
if(in_array($fieldID, $relateFields))
{
	if(($preValue[$fieldID])!=($postValue[$fieldID]))
	{
		$pre_val = $preValue[$fieldID];
		$pre_res = $db->query("select concat(COALESCE(first_name,' '),' ',last_name) as user,id from users where deleted=0 AND id = '".$pre_val."'");
		$pre_row = $db->fetchByAssoc($pre_res);
		$pre_name = $pre_row['user'];
		$post_val = $postValue[$fieldID];
		$post_res = $db->query("select concat(COALESCE(first_name,' '),' ',last_name) as user,id from users where deleted=0 AND id = '".$post_val."'");
		$post_row = $db->fetchByAssoc($post_res);
		$post_name = $post_row['user'];
		$type = $bean->field_name_map[$fieldID]['type'];
		$id=create_guid();
		$auditMObile="INSERT INTO `vedic_profiles_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
		VALUES ('".$id."',
				'".$canID."',
				'".$CurrentDateTime."',
				'".$currentUser."',
				'".$fieldID."',
				'".$type."',
				'".$pre_name."',
				'".$post_name."',
				'',
				'')";
		$update_result = $db->query($auditMObile);
	}
}