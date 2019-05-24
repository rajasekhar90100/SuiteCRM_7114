<?php

ini_set("display_errors",0);
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Noofcandidates{

function no_of_candidates(&$bean, $event, $arguments){
		
		global $db;



		$job_id=$bean->id;
		$query="SELECT count(vedic_job_vedic_submissions_1vedic_submissions_idb) as count FROM vedic_job_vedic_submissions_1_c INNER JOIN vedic_submissions where vedic_submissions.id=vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_submissions_idb AND vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_job_ida='$job_id' AND vedic_job_vedic_submissions_1_c.deleted=0 and vedic_submissions.deleted=0";		
		$updateQuery=$db->query($query);
		$result=$db->fetchByAssoc($updateQuery);
		
		$no_of_candidates = $result['count'];
		
		$update_job="UPDATE vedic_job_cstm SET no_of_candidates_c=$no_of_candidates WHERE id_c='$job_id'";
		$db->query($update_job);
		}
}
?>
