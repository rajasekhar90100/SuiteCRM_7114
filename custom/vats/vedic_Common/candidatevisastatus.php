<?php 
/**
  * FileName => candidatevisastatus.php
  * Created By => Maneesha (Created On Oct-04-2017)
  * Modified By => Maneesha(Modified On Apr-29-2018)
  * COMMENT =>Entry Point file to get the visa status of a candidate to the projects module.
  */

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');

global $db,$sugar_config;

$can_name = $_REQUEST['can_name'];

$query = $db->query("SELECT vedic_candidates.id AS id,
						   CONCAT(COALESCE(vedic_candidates.first_name,' '),' ', vedic_candidates.last_name) AS candidate_name, vedic_profiles_cstm.employee_type_c AS visa
					FROM vedic_candidates
					JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates.id = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida
					INNER JOIN vedic_profiles_cstm ON vedic_profiles_cstm.id_c =  vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb	
					WHERE vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb ='$can_name'
					  AND vedic_candidates_vedic_profiles_1_c.deleted=0
					  AND vedic_candidates.deleted=0");
		
$result = $db->fetchByAssoc($query);

$proid= $result['id'];
$proname = $result['candidate_name'];
$visa = $result['visa'];
print_r($proid.'---'.$proname.'---'.$visa);
?>	