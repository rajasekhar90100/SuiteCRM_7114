<?php 
/**  
  * FileName => solutionprojectname.php
  * Modified By => Lakshmi (Created On Nov-14-2018)
  * Modified By => Maneesha (Modified On Dec-22-2018)
  * COMMENT => Code to fetch the solution project realted to respective project task.
  * COMMENT => Added the query to get the respective candidates related to solution projects.
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;
$projectTask = $_REQUEST['projectTaskID'];
$query = $db->query("SELECT vsp.name as NAME,
								   vsp.id as ID
							FROM vedic_solutions_projects vsp
							INNER JOIN vedic_solutions_projects_projecttask_1_c vspt ON vsp.id=vspt.vedic_solu5a91rojects_ida
							WHERE vspt.vedic_solutions_projects_projecttask_1projecttask_idb='$projectTask'
							  AND vspt.deleted=0
							  AND vsp.deleted=0");	
$result = $db->fetchByAssoc($query);
$solutionProjectID = $result['ID'];
$solutionProjectName = $result['NAME'];
if($solutionProjectID !=''){
	/* Start of to modified the query as to fetch the data from Users instead of Candidates module-By Maneesha(Dec-17-2018) */
	$query = "SELECT users.id AS Id,
				concat(COALESCE(users.first_name, ' '), ' ', users.last_name) AS UserName
				FROM users 
				LEFT JOIN vedic_solutions_projects_users_1_c AS vspu ON users.id = vspu.vedic_solutions_projects_users_1users_idb
				where vspu.vedic_solutions_projects_users_1vedic_solutions_projects_ida='$solutionProjectID'
				  AND vspu.deleted=0
				  AND users.deleted=0";
	/* End of to modified the query as to fetch the data from Users instead of Candidates module-By Maneesha(Dec-17-2018) */
		$result = $GLOBALS['db']->query($query, false);
		$candidatenames=array();
		$candiateId=array();
	while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
		$candidatenames[] = $row['UserName'];
		$candiateId[] = $row['Id'];
	}
}   
	$flexData ="<datalist id='candidatename'>";
	foreach (array_combine($candiateId, $candidatenames) as $k => $v) {
		$flexData .= "<option value='".$k."' >".$v."</option>";
	}
    $flexData .= "</datalist>";
print_r($solutionProjectID.'---'.$solutionProjectName.'---'.$flexData);
?>
