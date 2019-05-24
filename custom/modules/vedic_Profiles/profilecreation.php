<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
	* FileName => projectname_format.php
	* Created By =>Rajasekhar Reddy (Created On JUNE-02-2017)
	* Modified By =>Rajasekhar Reddy(Modify On JUNE-02-2017)
	* COMMENT => after save Profile or change of stage,status insert record in vedic_Profiles_copy table
	*/
class Createprofile{
/**
	Function to update project name based on candidate name and startdate
	
**/
	function create_profile(&$bean, $event, $arguments){
		global $db;
		
		$profileid = $bean->id;
		$profile_createddate = $bean->date_entered;
		$profile_modifieddate = $bean->date_modified;
		$profile_createdbyname = $bean->created_by;
		$profile_modifiedbyname = $bean->modified_user_id;
		$profile_stage = $bean->stage_c;
		$profile_status = $bean->status_c;
		
		// $profile_firstname = $bean->fetched_row['first_name'];
		// $profile_lastname = $bean->fetched_row['last_name'];
		// $profilefullname = $profile_firstname." ".$profile_lastname;
		
		$old_profile_stage = $bean->fetched_row['stage_c'];
		$old_profile_status = $bean->fetched_row['status_c'];
		
		$Candidateid = "select vc.id as id,vc.first_name as Firstname,vc.last_name as Lastname from vedic_candidates as vc inner join vedic_candidates_vedic_profiles_1_c as vcp on vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida= vc.id where vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb= '".$profileid."' AND vcp.deleted=0 AND vc.deleted=0";
			$Candidate_res = $db->query($Candidateid);
			$Candidate_row = $db->fetchByAssoc($Candidate_res);
			$CndId = $Candidate_row['id'];
			$profile_firstname = $Candidate_row['Firstname'];
			$profile_lastname = $Candidate_row['Lastname'];
			$profilefullname = $profile_firstname." ".$profile_lastname;
		
		if (empty($bean->fetched_row['id'])) {
			
			
			$pm1 = $bean->user_id_c;
			$pm2 = $bean->user_id1_c;
			
			$hirer1 = $bean->user_id2_c;
			$hirer2 = $bean->user_id3_c;
			
			$hl = $bean->user_id8_c;
			
			$ml1 = $bean->user_id4_c;
			$ml2 = $bean->user_id5_c;
			
			$slead = $bean->slead_c;
			$sales = $bean->user_id9_c;
			
			$recruiter = $bean->user_id7_c;
			$rl = $bean->user_id6_c;	
			
			$primary_marketer_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$pm1' ";
			$primary_marketer_result = $db->query($primary_marketer_query);
			$primary_marketer = $db->fetchByAssoc($primary_marketer_result);
			$primarymarketer1 = $primary_marketer['Username'];
			
			$primary_marketer_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$pm2' ";
			$primary_marketer_result1 = $db->query($primary_marketer_query1);
			$primary_marketer1 = $db->fetchByAssoc($primary_marketer_result1);
			$primarymarketer2 = $primary_marketer1['Username'];
			
			$hirer1_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hirer1' ";
			$hirer1_result1 = $db->query($hirer1_query1);
			$hirer1 = $db->fetchByAssoc($hirer1_result1);
			$hirer1result = $hirer1['Username'];
			
			$hirer2_query2 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hirer2' ";
			$hirer2_result2 = $db->query($hirer2_query2);
			$hirer2 = $db->fetchByAssoc($hirer2_result2);
			$hirer2result = $hirer2['Username'];
			
			$hl_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hl' ";
			$hl_result1 = $db->query($hl_query1);
			$hl = $db->fetchByAssoc($hl_result1);
			$hlresult = $hl['Username'];
			
			$ml1_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$ml1' ";
			$ml1_result1 = $db->query($ml1_query1);
			$ml1 = $db->fetchByAssoc($ml1_result1);
			$ml1result = $ml1['Username'];
			
			$ml2_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$ml2' ";
			$ml2_result1 = $db->query($ml2_query1);
			$ml2 = $db->fetchByAssoc($ml2_result1);
			$ml2result = $ml2['Username'];
			
			$sales_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$sales' ";
			$sales_result1 = $db->query($sales_query1);
			$sales = $db->fetchByAssoc($sales_result1);
			$salesresult = $sales['Username'];
			
			$recruiter_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$recruiter' ";
			$recruiter_result1 = $db->query($recruiter_query1);
			$recruiter = $db->fetchByAssoc($recruiter_result1);
			$recruiterresult = $recruiter['Username'];
			
			$rl_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$rl' ";
			$rl_result1 = $db->query($rl_query1);
			$rl = $db->fetchByAssoc($rl_result1);
			$rlresult = $rl['Username'];
			
			$profile_modifiedby_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$profile_modifiedbyname' ";
			$profile_modifiedby_result = $db->query($profile_modifiedby_query);
			$profile_modifiedby = $db->fetchByAssoc($profile_modifiedby_result);
			$profile_modifiedby1 = $profile_modifiedby['Username'];
			
			$profile_createdbyname_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$profile_createdbyname' ";
			$profile_createdbyname_result = $db->query($profile_createdbyname_query);
			$profile_createdbyname = $db->fetchByAssoc($profile_createdbyname_result);
			$profile_createdbyname1 = $profile_createdbyname['Username'];
			
			$vedic_Profiles_copy ="INSERT INTO `vedic_Profiles_copy`(`primary_marketer_c`,`id`,candidateid,`name`,`secondary_marketer_c`,`hirer_1_c`,`hirer_2_c`,`hl_c`,
			`ml_1_c`,`ml_2_c`,`slead_c`,`stage_c`,`status_c`,`sales_c`,`recruiter_c`,`rl_c`,`date_entered`,`date_modified`,`modified_user_id`,`created_by`) 
			VALUES ('$primarymarketer1','$profileid','$CndId','$profilefullname','$primarymarketer2','$hirer1result','$hirer2result','$hlresult','$ml1result','$ml2result','$slead',
			'$profile_stage','$profile_status','$salesresult','$recruiterresult','$rlresult',' $profile_createddate','$profile_modifieddate','$profile_modifiedby1','$profile_createdbyname1')";
			$update_result = $db->query($vedic_Profiles_copy);
		}
		if(!empty($old_profile_stage) && !empty($old_profile_status)) {
			if( ($profile_stage != $old_profile_stage) || ($profile_status != $old_profile_status) ) {
				
				$pm1 = $bean->user_id_c;
				$pm2 = $bean->user_id1_c;
				
				$hirer1 = $bean->user_id2_c;
				$hirer2 = $bean->user_id3_c;
				
				$hl = $bean->user_id8_c;
				
				$ml1 = $bean->user_id4_c;
				$ml2 = $bean->user_id5_c;
				
				$slead = $bean->slead_c;
				$sales = $bean->user_id9_c;
				
				$recruiter = $bean->user_id7_c;
				$rl = $bean->user_id6_c;	
				
				$primary_marketer_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$pm1' ";
				$primary_marketer_result = $db->query($primary_marketer_query);
				$primary_marketer = $db->fetchByAssoc($primary_marketer_result);
				$primarymarketer1 = $primary_marketer['Username'];
				
				$primary_marketer_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$pm2' ";
				$primary_marketer_result1 = $db->query($primary_marketer_query1);
				$primary_marketer1 = $db->fetchByAssoc($primary_marketer_result1);
				$primarymarketer2 = $primary_marketer1['Username'];
				
				$hirer1_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hirer1' ";
				$hirer1_result1 = $db->query($hirer1_query1);
				$hirer1 = $db->fetchByAssoc($hirer1_result1);
				$hirer1result = $hirer1['Username'];
				
				$hirer2_query2 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hirer2' ";
				$hirer2_result2 = $db->query($hirer2_query2);
				$hirer2 = $db->fetchByAssoc($hirer2_result2);
				$hirer2result = $hirer2['Username'];
				
				$hl_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$hl' ";
				$hl_result1 = $db->query($hl_query1);
				$hl = $db->fetchByAssoc($hl_result1);
				$hlresult = $hl['Username'];
				
				$ml1_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$ml1' ";
				$ml1_result1 = $db->query($ml1_query1);
				$ml1 = $db->fetchByAssoc($ml1_result1);
				$ml1result = $ml1['Username'];
				
				$ml2_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$ml2' ";
				$ml2_result1 = $db->query($ml2_query1);
				$ml2 = $db->fetchByAssoc($ml2_result1);
				$ml2result = $ml2['Username'];
				
				$sales_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$sales' ";
				$sales_result1 = $db->query($sales_query1);
				$sales = $db->fetchByAssoc($sales_result1);
				$salesresult = $sales['Username'];
				
				$recruiter_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$recruiter' ";
				$recruiter_result1 = $db->query($recruiter_query1);
				$recruiter = $db->fetchByAssoc($recruiter_result1);
				$recruiterresult = $recruiter['Username'];
				
				$rl_query1 ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$rl' ";
				$rl_result1 = $db->query($rl_query1);
				$rl = $db->fetchByAssoc($rl_result1);
				$rlresult = $rl['Username'];
				
				$profile_modifiedby_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$profile_modifiedbyname' ";
				$profile_modifiedby_result = $db->query($profile_modifiedby_query);
				$profile_modifiedby = $db->fetchByAssoc($profile_modifiedby_result);
				$profile_modifiedby1 = $profile_modifiedby['Username'];
				
				$profile_createdbyname_query ="SELECT COALESCE(concat(first_name,' ' ,last_name)) as Username from users where id='$profile_createdbyname' ";
				$profile_createdbyname_result = $db->query($profile_createdbyname_query);
				$profile_createdbyname = $db->fetchByAssoc($profile_createdbyname_result);
				$profile_createdbyname1 = $profile_createdbyname['Username'];
				
				$vedic_Profiles_copy ="INSERT INTO `vedic_Profiles_copy`(`primary_marketer_c`,`id`,`candidateid`,`name`,`secondary_marketer_c`,`hirer_1_c`,`hirer_2_c`,`hl_c`,
				`ml_1_c`,`ml_2_c`,`slead_c`,`stage_c`,`status_c`,`sales_c`,`recruiter_c`,`rl_c`,`date_entered`,`date_modified`,`modified_user_id`,`created_by`) 
				VALUES ('$primarymarketer1','$profileid','$CndId','$profilefullname','$primarymarketer2','$hirer1result','$hirer2result','$hlresult','$ml1result','$ml2result','$slead',
				'$profile_stage','$profile_status','$salesresult','$recruiterresult','$rlresult',' $profile_createddate','$profile_modifieddate','$profile_modifiedby1','$profile_createdbyname1')";
				$update_result = $db->query($vedic_Profiles_copy);
			}
		}
	}
}