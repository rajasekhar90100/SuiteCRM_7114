<?php 
/**
  * FileName => createMarketingprofile.php
  * Created By => Udaykiran (Created On Mar-26-2018)
  * Modified By => Udaykiran (Modified On Jun-16-2018)
  * COMMENT => Code to create the Marketing Profile
  */

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');

global $db,$current_user,$app_list_strings,$sugar_config;

$can_name = $_REQUEST['CanId'];
$currentUser = $current_user->id;


	if($can_name!='')
	{
	    require_once('include/utils.php');
		require_once('modules/vedic_Candidates/vedic_Candidates.php');
	
		$candObj = new vedic_Candidates();
		$candObj->retrieve($can_name);		
		$canMobile = $candObj->phone_mobile;		
		$canEmail = $candObj->email1;
		$type_hiring = $candObj->type_hiring;
		//Creating an object of Profiles 			
		require_once('modules/vedic_Profiles/vedic_Profiles.php');
		
		if($type_hiring =='Us_staffing')
		{	
			$target = new vedic_Profiles();
			$target->first_name = $candObj->first_name;
			$target->last_name = $candObj->last_name;
			$target->vedic_candidates_vedic_profiles_1vedic_candidates_ida = $can_name;
			$target->stage_c = 'Marketing';
			$target->status_c = 'Start';
			$target->phone_mobile = $canMobile;		
			$target->email_c = $canEmail;
			$target->save();
			
			$document_id = $target->id;
			$update_query2 = "  UPDATE vedic_profiles
								SET created_by='$currentUser',
									modified_user_id ='$currentUser',
									assigned_user_id = '$currentUser'
								WHERE id = '$document_id'";
			$db->query($update_query2);
		}
		echo "success";
	}
?>