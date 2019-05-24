<?php 
/**
  * FileName => projectPOEnddate.php
  * Created By => Maneesha (Created On June-08-2018)
  * Modified By => Lakshmi (Modified On Jan-08-2019)
  * COMMENT => code for update poenddate in project for respective profile
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;

$profileId = $_REQUEST['profileid'];
$query = $db->query("SELECT vedic_candidates.id as id,
								   concat(COALESCE(vedic_candidates.first_name,' '),' ', vedic_candidates.last_name) AS candidate_name,vedic_profiles_cstm.po_end_date_c AS poEnddate
							FROM vedic_candidates
							JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates.id = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida
							INNER JOIN vedic_profiles_cstm ON vedic_profiles_cstm.id_c =  vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb
							WHERE vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb ='$profileId'
							  AND vedic_candidates_vedic_profiles_1_c.deleted=0
							  AND vedic_candidates.deleted=0");
$result = $db->fetchByAssoc($query);
$proID = $result['id'];
$proName = $result['candidate_name'];
$poEnddate = $result['poEnddate'];
$poEnddate = date_format(date_create($poEnddate),"m/d/Y");
print_r($proID.'---'.$proName.'---'.$poEnddate);
?>