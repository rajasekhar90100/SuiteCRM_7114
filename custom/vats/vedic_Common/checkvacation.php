<?php
/**
	FileName => checkvacation.php
	Created By => Maneesha(Nov-03-2017)
	Modified By => Maneesha(Apr-29-2018)
	Comment => Logic hook file check for Vacation
**/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once ('include/entryPoint.php');
	require_once('custom/modules/vedic_Holydays/views/view.edit.php');
	
global $db,$sugar_config;
$employee = $_REQUEST['employee'];
$startdate = $_REQUEST['startdate'];



if($startdate == ''){
	
	$vacationstart ='';
}
else{
	$vdate = date_create($startdate);
	$vacationstart = date_format($vdate,'Y-m-d');
}

$beanId = $_REQUEST['beanId'];

		$query = "select pro.id as Id,
			pro.name as Name, 
			concat(COALESCE(vc.first_name,' '),' ', vc.last_name) AS Candidatename, 
			pro.estimated_start_date, pro.estimated_end_date 
			FROM vedic_employees as ve 
			LEFT JOIN vedic_candidates_vedic_employees_1_c AS vce 
				ON vce.vedic_candidates_vedic_employees_1vedic_employees_idb = ve.id 
			LEFT JOIN vedic_candidates AS vc 
				ON vce.vedic_candidates_vedic_employees_1vedic_candidates_ida = vc.id 
			LEFT JOIN vedic_candidates_project_1_c as vcp 
				ON vcp.vedic_candidates_project_1vedic_candidates_ida = vc.id 
			LEFT join project as pro 
				ON pro.id = vcp.vedic_candidates_project_1project_idb 
			where '".$vacationstart."' between pro.estimated_start_date and pro.estimated_end_date and pro.deleted=0 AND concat(COALESCE(vc.first_name,' '),' ', vc.last_name)=LTRIM('".$employee."') group by pro.id";

			$result = $GLOBALS['db']->query($query, false);
			$pro = '<select id="project_type" name="project_type[]" multiple="true" size="6" style="width:150" title="" tabindex="0">';
	 
			while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
			   
				$name = $row['Name'];
				$id = $row['Id'];
				$pro .= '<option value="'.$id.'" Seleted>'.$name.'</option >';
				
			}	
				
		$pro .= '</select>';
print_r($pro);