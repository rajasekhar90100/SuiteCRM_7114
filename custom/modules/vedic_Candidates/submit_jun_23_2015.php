<?php
//if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class ProcessSubmit{
	function Submit(&$bean, $event, $arguments){
		if($arguments['related_module'] == 'vedic_Submissions'){
			/*
			if($event == 'after_relationship_add'){
			
		
			}
			*/
			
			if($event == 'after_relationship_delete'){
				
				// candidate-submission relate record
				echo "L:18  ".$arguments['related_bean']->id; 
				
				$sel_job_id = "SELECT vedic_job_vedic_submissions_1vedic_job_ida FROM vedic_job_vedic_submissions_1_c 
				WHERE vedic_job_vedic_submissions_1vedic_submissions_idb='".$arguments['related_bean']->id."' AND deleted =0  "; 
				$res_job_id = $GLOBALS['db']->query($sel_job_id);
				$res_job_id = $GLOBALS['db']->fetchByAssoc($res_job_id);
				$job_id = $res_job_id['vedic_job_vedic_submissions_1vedic_job_ida']; 
				
				if(!empty($job_id)){
				
				// update in job, as it was decrese
				$job_obj = new vedic_job();
				$job_obj->retrieve($job_id);
				$job_obj->no_of_candidates_c = $job_obj->no_of_candidates_c - 1;
				$job_obj->save();
				
				// remove submission and job-submission
				$update_vedic_submissions = "UPDATE vedic_submissions SET deleted =1 WHERE id ='".$arguments['related_bean']->id."' ";
				$GLOBALS['db']->query($update_vedic_submissions);
				
				// delete relate submissions from job-submission apart from candidate-submission   
				$update_vedic_job_vedic_submissions = "UPDATE vedic_job_vedic_submissions_1_c SET deleted =1
				WHERE vedic_job_vedic_submissions_1vedic_submissions_idb='".$arguments['related_bean']->id."' ";
				$GLOBALS['db']->query($update_vedic_job_vedic_submissions);
				
				}
				
				//die;
			}
			
		}
	}
}



?>