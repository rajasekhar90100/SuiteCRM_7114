<?php
/**
  * FileName => checkBillingActiveProfile.php.php
  * Created By => Udaykiran (Created On May-05-2018)
  * Modified By => Udaykiran (Modified On May-05-2018)
  * COMMENT => Code to Check the candidate is having any billing active profiles
  */

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');

global $db,$current_user,$app_list_strings,$sugar_config;
$ProfId = $_REQUEST['rowID'];


$query_can = $db->query("SELECT vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_candidates_ida` AS ID
						FROM vedic_profiles
						JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_profiles_idb` = vedic_profiles.id
						WHERE vedic_profiles.id = '$ProfId'
						  AND vedic_candidates_vedic_profiles_1_c.deleted='0'");
$result_can = $db->fetchByAssoc($query_can);
$Can_ID = $result_can['ID'];
$currentUser = $current_user->id;
$query_prof = $db->query("SELECT count(*) as ct, id_c ,
						vedic_profiles_cstm.status_c as Status
						FROM vedic_profiles_cstm 
						INNER join vedic_profiles 
							on vedic_profiles.id = vedic_profiles_cstm.id_c
						INNER join vedic_candidates_vedic_profiles_1_c as vcp 
							on vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb= vedic_profiles.id 
						WHERE vedic_profiles.deleted=0 
						AND vedic_profiles_cstm.stage_c='Billing'
						AND vedic_profiles_cstm.status_c ='Active' 							
						AND vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida ='".$Can_ID."'
						AND vcp.deleted=0 ");
$result_prof = $db->fetchByAssoc($query_prof);
echo $count= $result_prof['ct'];
$status= $result_prof['Status'];
