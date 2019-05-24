<?php
/**
	FileName => checkvacation.php
	Created By => Maneesha(Nov-03-2017)
	Modified By => Maneesha(Nov-03-2017)
	Comment => Logic hook file check for Duplicate vacation
**/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once ('include/entryPoint.php');
	require_once('custom/modules/vedic_Holydays/views/view.edit.php');

global $db,$sugar_config;

$employee = $_REQUEST['employee'];
$project_type = $_REQUEST['projecttype'];

$vacation_start = $_REQUEST['vacation_start'];

$vstart = date_create($vacation_start);
$vacationstart = date_format($vstart,'Y-m-d');


if (strpos($project_type, ',') != false) {
	$projectsNew = explode(',',$project_type);

	for($i=0;$i<count($projectsNew);$i++)
	{
		if($i == 0){
			$proType = "FIND_IN_SET('^".$projectsNew[0]."^',vh.project_type)";
		}
		else{
			$proType .= " AND FIND_IN_SET('^".$projectsNew[$i]."^',vh.project_type)";		   
		}
	}
} 
else{
	$proType = "FIND_IN_SET('^".$project_type."^',vh.project_type)";
} 
	$query = "SELECT pro.id as ProjectId,	
			count(pro.id) as Projectcount,
			pro.name,pro.estimated_start_date,
			pro.estimated_end_date,
			vh.id as vacationId,vh.name,
			vhc.start_date_c,
			vhc.end_date_c 
		from vedic_holydays as vh 
		  join project_vedic_holydays_1_c as pvh 
			on pvh.project_vedic_holydays_1vedic_holydays_idb=vh.id 
		   JOIN vedic_holydays_cstm as vhc 
			on vhc.id_c = vh.id 
		   JOIN project as pro 
			on pvh.project_vedic_holydays_1project_ida = pro.id 
		  where '".$vacationstart."' between vhc.start_date_c and vhc.end_date_c
		  AND ".$proType." 
		  and vh.deleted=0 and pvh.deleted=0
		  group by vh.id";		  

			$project_result = $db->query($query);

            $row = $db->fetchByAssoc($project_result);			

			$project_count = $row['Projectcount'];

			$vacation_id = $row['vacationId'];

		if($project_count > 0){			
			echo $vacation_id;
		}