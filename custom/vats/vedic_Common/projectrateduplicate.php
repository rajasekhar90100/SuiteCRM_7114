<?php
/**
  * FileName => projectrateduplicate.php
  * CreatedBy => Lakshmi(Created on Aug-27-2018)
  * Modified By => Modified(Modified on Nov-14-2018)
  * Comment => EntryPoint file to check the duplicate project rate information with paytype,start date,end date,project relationship id.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
require_once('custom/modules/vedic_Project_Rate/views/view.edit.php');
require_once('modules/Project/Project.php');

global $db,$sugar_config;
$payType = $_REQUEST['payrate'];
$projectID = $_REQUEST['projectid'];
$solutionProjectID = $_REQUEST['solutionProjectid'];
$projectObj = new Project();
$projectObj->retrieve($projectID); 
$projectStartDate = $projectObj->estimated_start_date;
$projectEndDate = $projectObj->estimated_end_date;
$solutionProjectObj = new vedic_Solutions_Projects();
$solutionProjectObj->retrieve($solutionProjectID); 
$solutionProjectStartDate = $solutionProjectObj->start_date;
$solutionProjectEndDate = $solutionProjectObj->end_date;
$startDate = $_REQUEST['startdate'];
$startDateFormat = date("Y-m-d", strtotime($startDate));
$endDate = $_REQUEST['enddate'];
$endDateFormat = date("Y-m-d", strtotime($endDate));
if(!empty($projectID)) {
    $query=$db->query("SELECT vedic_project_rate.id AS id,
							   pay_type_c,
							   start_date_c,
							   end_date_c
						FROM vedic_project_rate_cstm
						INNER JOIN vedic_project_rate ON vedic_project_rate_cstm.id_c = vedic_project_rate.id
						INNER JOIN project_vedic_project_rate_1_c ON vedic_project_rate.id = project_vedic_project_rate_1_c.project_vedic_project_rate_1vedic_project_rate_idb
						WHERE vedic_project_rate.deleted = '0'
						  AND project_vedic_project_rate_1_c.deleted = '0'
						  AND pay_type_c = '$payType'
						  AND ((start_date_c >= '$startDateFormat'
								AND end_date_c <= '$endDateFormat')
							   OR (start_date_c <= '$endDateFormat'
								   AND end_date_c >= '$startDateFormat'))
						  AND project_vedic_project_rate_1_c.project_vedic_project_rate_1project_ida = '$projectID'");
	$result = $db->fetchByAssoc($query);
	print_r($result['id']."---".$projectStartDate."---".$projectEndDate);
}
if(!empty($solutionProjectID)) {
    $query=$db->query("SELECT vedic_project_rate.id AS pid,
							   pay_type_c,
							   start_date_c,
							   end_date_c
						FROM vedic_project_rate_cstm
						INNER JOIN vedic_project_rate ON vedic_project_rate_cstm.id_c = vedic_project_rate.id
						INNER JOIN vedic_solutions_projects_vedic_project_rate_1_c ON vedic_project_rate.id = vedic_solutions_projects_vedic_project_rate_1_c.vedic_solu12f3ct_rate_idb
						WHERE vedic_project_rate.deleted = '0'
						  AND vedic_solutions_projects_vedic_project_rate_1_c.deleted = '0'
						  AND pay_type_c = '$payType'
						  AND ((start_date_c >= '$startDateFormat'
								AND end_date_c <= '$endDateFormat')
							   OR (start_date_c <= '$endDateFormat'
								   AND end_date_c >= '$startDateFormat'))
						  AND vedic_solutions_projects_vedic_project_rate_1_c.vedic_solu30c2rojects_ida = '$solutionProjectID'");
	$result = $db->fetchByAssoc($query);
	print_r($solutionProjectStartDate."---".$solutionProjectEndDate);
}
?>
