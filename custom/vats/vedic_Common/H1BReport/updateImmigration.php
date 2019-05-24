<?php
/**
  * FileName => updateImmigration.php
  * Created By => Udaykiran (Created On Feb-21-2018)
  * Modified By => Udaykiran (Modified On Feb-21-2018)
  * COMMENT => Code to update the values in the audit table of Immigration for H1B Report
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
	$bean = BeanFactory::getBean('vedic_Immigration', $canID);
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
	$relateFields = array('poc_c');
	if (strpos($fieldName[0], 'vedic_immigration') !== false) {
		if (in_array($fieldName[1], $str)) {
			if(($preValue[$fieldID])!=($postValue[$fieldID])) {	   
				
				$type = $bean->field_name_map[$fieldName[1]]['type'];
				$query = $db->query("UPDATE vedic_immigration
										SET 
										modified_user_id ='$currentUser',
										date_modified = '$CurrentDateTime'
									WHERE id = '$canID'");
				$id=create_guid();
				$auditMObile="INSERT INTO `vedic_immigration_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
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
			$auditMObile="INSERT INTO `vedic_immigration_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
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
			$query = $db->query("UPDATE vedic_immigration
								SET 
									modified_user_id ='$currentUser',
									date_modified = '$CurrentDateTime'
								WHERE id = '$canID'");
			$update_result = $db->query($auditMObile);
		}
	}
