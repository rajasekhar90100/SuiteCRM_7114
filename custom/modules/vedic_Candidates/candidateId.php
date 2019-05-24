<?php

class Candidateid{
	function candidateId(&$bean, $event, $arguments){
		
		global $current_user,$db;
		
		$rid=$_REQUEST['record'];
			
		if(strlen($_REQUEST['assigned_user_id'])==0 || !isset($_REQUEST['assigned_user_id']))
		{
			$bean->assigned_user_id=$current_user->id;
			$qu= "update vedic_candidates set assigned_user_id='".$current_user->id."' where id='".$rid."'";
			$rs= $db->query($qu);
			
			
		}
	
		if(strlen($bean->resume_id)==0){
			
			$resume_id = "CND-".time();
			$qu= "update vedic_candidates set resume_id='".$resume_id ."' where id='".$rid."'";
			$rs= $db->query($qu);
		}
		
		
	    
		
	}
}


?>