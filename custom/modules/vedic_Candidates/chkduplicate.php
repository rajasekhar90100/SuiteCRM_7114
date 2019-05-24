<?php
// Will Check the duplicate candidates with the same first_name and last_name, if exist die  
class Duplicate{
	function check_duplicate(&$bean, $event, $arguments){
		
		global $current_user;
		
		if(strlen($bean->assigned_user_id)==0)
		{
			$bean->assigned_user_id=$current_user->id;
			
		}
		
		if(strlen($bean->candidate_id)==0){
			
			$bean->candidate_id = "CND-".time();
		}
		
		
	
		
		$candidate_sql = "SELECT count(*) as ct,id FROM vedic_candidates WHERE first_name = '".$bean->first_name."' and last_name = '".$bean->last_name."' and phone_mobile = '".$bean->phone_mobile."' and deleted=0";
		$candidate_res = $GLOBALS['db']->query($candidate_sql);
		$candidate_row = $GLOBALS['db']->fetchByAssoc($candidate_res);
		if(!empty($candidate_row['ct']) && empty($bean->fetched_row['id']) )
		{
			$url = $GLOBALS['sugar_config']['site_url']."/index.php?module=vedic_Candidates&action=EditView&return_module=vedic_Candidates&return_action=DetailView";
			echo '<a href='.$url.'>Back </a><br>'; 
			die("Please check again, Candidate already Existed with this <a href='index.php?module=vedic_Candidates&action=DetailView&record=".$candidate_row['id'].">Click here </a> to see the record.");
		}
	}
}


?>