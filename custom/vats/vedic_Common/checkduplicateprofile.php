<?php
/**
	* FileName => chkduplicate.php
	* FunctionName => check_duplicate
	* CreatedBy => Maneesha(Created on Feb-07-2018)
	* Modified By => Udaykiran (Modified on Feb-12-2018)
	* Comment => EntryPoint file to check the duplicate profile with Stage and status.
*/
ini_set('display_errors',-1);

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once ('include/entryPoint.php');
	require_once('custom/modules/vedic_Profiles/views/view.edit.php');

	global $db,$sugar_config;
	$beanid = $_REQUEST['beanId'];
	$stage = $_REQUEST['stage'];
	$status = $_REQUEST['status'];
	$parent_id = $_REQUEST['parent_id'];
	
	//if(strlen($beanid) == 0){
	if(($stage =='Marketing' && ($status =='Active' || $status =='Start'))|| $stage == 'Billing' && ($status =='Active' || $status =='Start')){
		$profile_sql = "SELECT count(*) as ct, id_c ,
						vedic_profiles_cstm.status_c as Status
						FROM vedic_profiles_cstm 
						INNER join vedic_profiles 
							on vedic_profiles.id = vedic_profiles_cstm.id_c
						INNER join vedic_candidates_vedic_profiles_1_c as vcp 
							on vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb= vedic_profiles.id 
						WHERE vedic_profiles_cstm.stage_c = '".$stage."' 
						AND vedic_profiles_cstm.status_c IN('Active','Start') 
						AND vedic_profiles.deleted=0 
						AND vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida = '".$parent_id."'
						AND vcp.deleted=0 AND vedic_profiles.deleted=0";
		$profile_res = $db->query($profile_sql);
		$profile_row = $db->fetchByAssoc($profile_res);
	}
		
	if(!empty($profile_row['ct']))
	{
		$ProID = $profile_row['id_c'];	
		$status =  $profile_row['Status'];
		
		if($beanid!= $ProID){
			echo $ProID."---".$status;
		}
	}

?>