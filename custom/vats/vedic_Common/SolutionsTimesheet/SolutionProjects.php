<?php
/**
  * FileName => SolutionProjects.php
  * Created By => Rajasekhar (Created On Oct-26-2018)
  * Modified By => Maneesha (Modified On Apr-05-2019)
  * COMMENT => Code to fetch the project related data
  * COMMENT => Modified the query to select the Projects in the selected startdate and End date.
  * COMMENT => Modified the relation to users from candidate.
  */
global $db,$timedate;
$userId = $_REQUEST['userId'];
$proId = $_REQUEST['proId'];
$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];
if(!empty($_REQUEST['submit'])) {
	$startdate = $timedate->to_db_date($startdate,false);
	$enddate = $timedate->to_db_date($enddate,false);
}
else {
	$startdate = date("Y-m-d", strtotime($startdate));
	$enddate = date("Y-m-d", strtotime($enddate));
}
$notZdefaultprojects = 'SELECT id,
							   project_name,practice,
							   DATE_FORMAT(start_date, "%m/%d/%Y") AS estimated_start_date,
							   DATE_FORMAT(end_date, "%m/%d/%Y") AS estimated_end_date
						FROM `vedic_solutions_projects`
						WHERE id IN
							(SELECT `vedic_solutions_projects_users_1vedic_solutions_projects_ida`
							 FROM `vedic_solutions_projects_users_1_c`
							 WHERE `vedic_solutions_projects_users_1users_idb`="'.$userId.'"
							   AND deleted=0
							   AND vedic_solutions_projects.status="Active" )
						  AND deleted=0 
						   AND ((start_date >= "'.$startdate.'"
							AND end_date <= "'.$enddate.'")
						   OR (start_date <= "'.$enddate.'"
							   AND end_date >= "'.$startdate.'"))
						  AND (practice NOT LIKE "ZDefault" OR practice IS NULL)
						  ORDER BY project_name ASC';
		$getnotZdefaultprojects = $db->query($notZdefaultprojects);
		while($rownotZdefaultprojects = $db->fetchByAssoc($getnotZdefaultprojects)) {
			$notZdefaultProjectIds[] = $rownotZdefaultprojects['id'];
			$notZdefaultProjectNames[] = $rownotZdefaultprojects['project_name'];
			$notZdefaultProjectPractice[] = $rownotZdefaultprojects['practice'];
		}
		$Zdefaultprojects = 'SELECT id,
							   project_name,practice,
							   DATE_FORMAT(start_date, "%m/%d/%Y") AS estimated_start_date,
							   DATE_FORMAT(end_date, "%m/%d/%Y") AS estimated_end_date
						FROM `vedic_solutions_projects`
						WHERE id IN
							(SELECT `vedic_solutions_projects_users_1vedic_solutions_projects_ida`
							 FROM `vedic_solutions_projects_users_1_c`
							 WHERE `vedic_solutions_projects_users_1users_idb`="'.$userId.'"
							   AND deleted=0
							   AND vedic_solutions_projects.status="Active" )
						  AND deleted=0 
						   AND ((start_date >= "'.$startdate.'"
							AND end_date <= "'.$enddate.'")
						   OR (start_date <= "'.$enddate.'"
							   AND end_date >= "'.$startdate.'"))
						  AND practice ="ZDefault"
						  ORDER BY project_name ASC';
		$getZdefaultprojects = $db->query($Zdefaultprojects);
		while($rowZdefaultprojects = $db->fetchByAssoc($getZdefaultprojects)) {
			$ZdefaultProjectNames[] = $rowZdefaultprojects['project_name'];
			$ZdefaultProjectIds[] = $rowZdefaultprojects['id'];
			$ZdefaultProjectPractice[] = $rowZdefaultprojects['practice'];
		}
		$projectNames = array_merge((array)$notZdefaultProjectNames,(array)$ZdefaultProjectNames);
		$projectIds = array_merge((array)$notZdefaultProjectIds,(array)$ZdefaultProjectIds);
		$projectPractice = array_merge((array)$notZdefaultProjectPractice,(array)$ZdefaultProjectPractice);

// $getProject = $db->query($getProjectSql) or die("get solutions project query error in edit view: " . mysql_error());
$i=0;
// while($row = $db->fetchByAssoc($getProject)) {
	for($i=0;$i<count($projectIds);$i++) {
		$getProject = $db->query("SELECT project_name,practice
									FROM `vedic_solutions_projects`
									WHERE id = '$projectIds[$i]' AND deleted=0 ") or die("get solutions project query error in edit view: " . mysql_error());
		$projectresult = $db->fetchByAssoc($getProject);
		$solPro = new vedic_Solutions_Projects();
		$solPro->retrieve($projectIds[$i]);
		$mainProject = $solPro->vedic_solu8c77rojects_ida;
		$mainProjectName = $solPro->vedic_solutions_projects_vedic_solutions_projects_1_name;
		// if(!empty($mainProject)) {
			// $project[$i] = $mainProjectName." => ".$projectNames[$i];
		// }
		// else {
			$project[$i] = $projectNames[$i];
		//}
		$practice[$i] = $projectresult['practice'];
			
	}	
$ProName = json_encode($project);
$ProId = json_encode($projectIds);
$Practice = json_encode($practice);
print_r($ProName."~".$ProId."~".$Practice);
?>