<?php
/**
  * FileName => projecttaskcheckduplicate.php
  * Created By => Maneesha(Created on Nov-14-2018)
  * Modified By => Maneesha(Modified on Nov-14-2018)
  * Comment => EntryPoint file to check the duplicate project task based on solution project.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
require_once('custom/modules/ProjectTask/views/view.edit.php');
require_once('modules/vedic_Solutions_Projects/vedic_Solutions_Projects.php');
global $db,$sugar_config;

$projectID=$_REQUEST['projectID'];
$projectObj = new vedic_Solutions_Projects();
$projectObj->retrieve($projectID); 
$projectStartDate = $projectObj->start_date;
$projectEndDate = $projectObj->end_date;
$startDate=$_REQUEST['startDate'];
$startDateFormat=date("Y-m-d", strtotime($startDate));
$endDate=$_REQUEST['endDate'];
$endDateFormat=date("Y-m-d", strtotime($endDate));
if(!empty($projectID)){
	$query=$db->query("SELECT project_task.id AS id,
								date_start as StartDate,
							  date_finish as EndDate,
							  vsp.name as projectName
							FROM project_task
					   INNER JOIN vedic_solutions_projects_projecttask_1_c as vsppt 
						ON vsppt .vedic_solutions_projects_projecttask_1projecttask_idb = project_task.id
						inner join vedic_solutions_projects as vsp on vsp.id = vsppt.vedic_solu5a91rojects_ida
					   WHERE project_task.deleted ='0'
					   AND vsppt.deleted=0
					   AND vsp.deleted=0
						  AND ((date_start >= '$startDateFormat'
								AND date_finish <= '$endDateFormat')
							   OR (date_start <= '$endDateFormat'
								   AND date_finish >= '$startDateFormat'))
						  AND vsppt.vedic_solu5a91rojects_ida = '$projectID'");
    $result = $db->fetchByAssoc($query);
print_r(
	$result['id']."---".$result['StartDate']."---".$result['EndDate']."---".$result['projectName']."---".$projectStartDate."---".$projectEndDate);
}
?>
