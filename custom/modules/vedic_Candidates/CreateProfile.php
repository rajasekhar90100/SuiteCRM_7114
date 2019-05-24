<?php
/**
  * FileName => CreateProfile.php
  * Created By => Udaykiran (Created On Mar-23-2018)
  * Modified By =>    Maneesha (Modified On Jun-05-2018)	
  * COMMENT => Create Profile While creating the Candidate whose type of hiring is US staffing.	 
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class createProf {

    function createProf(&$bean, $event, $arguments) {
		global $db, $current_user,$app_list_strings,$sugar_config;
		
		$currentUser = $current_user->id;
		$canId=$bean->id;
		$createdDate = $bean->date_entered;
		$modifiedDate = $bean->date_modified;
		$type_hiring = $bean->type_hiring;
		if($type_hiring =='Us_staffing')
		{		
			if($createdDate == $modifiedDate)
			{
				//Fetching the data from Current Candidate
				$canFName = $bean->first_name;
				$canLName = $bean->last_name;
				$canStage = $bean->stage_c;
				$canStatus = $bean->status;
				$canPMID = $bean->user_id_c;
				$canSMID = $bean->user_id1_c;
				$canHirer1ID = $bean->user_id5_c;
				$canHirer2ID = $bean->user_id6_c;
				$canSales = $bean->user_id2_c;
				$canSLead = $bean->slead_c;
				$canML1ID = $bean->user_id7_c;
				$canML2ID = $bean->user_id8_c;
				$canRLID = $bean->rl_id;
				$canRecruiterID = $bean->user_id4_c;
				$canHLID = $bean->hl_id;
				$canmobile = $bean->phone_mobile;		
				$canemail = $bean->email1;
				
				//Creating an object of Profiles 			
				require_once('modules/vedic_Profiles/vedic_Profiles.php');
				$target = new vedic_Profiles();
						
				$target->first_name = $canFName;
				$target->last_name = $canLName;
				$target->vedic_candidates_vedic_profiles_1vedic_candidates_ida = $canId;
				$target->stage_c = $canStage;
				$target->status_c = $canStatus;
				$target->user_id_c = $canPMID;
				$target->user_id1_c = $canSMID;
				$target->user_id2_c = $canHirer1ID;
				$target->user_id3_c = $canHirer2ID;
				$target->user_id4_c = $canML1ID;
				$target->user_id5_c = $canML2ID;
				$target->slead_c = $canSLead;
				$target->user_id9_c = $canSales;
				$target->user_id7_c = $canRecruiterID;
				$target->user_id6_c = $canRLID;
				$target->user_id8_c = $canHLID;
				$target->phone_mobile = $canmobile;		
				$target->email_c = $canemail;
				$target->save();
				
				$document_id = $target->id;
				$update_query2 = "  UPDATE vedic_profiles
									SET created_by='$currentUser',
										modified_user_id ='$currentUser',
										assigned_user_id = '$currentUser'
									WHERE id = '$document_id'";
				$db->query($update_query2);
			}
		}
	}
}