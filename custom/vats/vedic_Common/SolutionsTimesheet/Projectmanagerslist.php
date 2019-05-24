<?php
/**
  * FileName => Projectmanagerslist.php
  * Created By => Rajasekhar (Created On Feb-14-2019)
  * Modified By => Udaykiran (Modified On Apr-11-2019)
  * COMMENT => Code to send reminder notificaton from weekly timesheet report.
  */
global $db,$timedate;
$siteUrl = $GLOBALS['sugar_config']['site_url'];
$userId = $_REQUEST['user'];
$startDate = $_REQUEST['start'];
$endDate = $_REQUEST['end'];
$TID = $_REQUEST['id'];
$query = "SELECT solution_project AS projectId,vsp.project_name as projname,vsp.practice as Practice,stc.total_hours as Hours,stc.approval_status,
									   vsp.project_manager_id as ProjectManager
								FROM vedic_solutions_timesheet AS vst
								JOIN solution_timesheet_cycle AS stc ON stc.id_c = vst.id
								JOIN vedic_solutions_projects AS vsp ON vsp.id = stc.solution_project
								WHERE vst.id ='$TID'
								  AND vsp.deleted=0";
$queryResult =$db->query($query);
$timesheet_head = '<div id="projectmanagers_list" style="padding: 15px;background-color: white;"><table id="comments_add" style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;width:100%;">
			<thead>
				<tr class="tableHeader" style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;">
					<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><b>Project Name </b></td>
					<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><b>Project Manager</b></td>
					<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><b>Approval Status</b></td>
				</tr>
			</thead>';
$timesheet_head .= '<tbody>';
while($solutionsProjectrow=$db->fetchByAssoc($queryResult)) {
	$projName = $solutionsProjectrow['projname'];
	$ProjManager = $solutionsProjectrow['ProjectManager'];
	$totalHours = $solutionsProjectrow['Hours'];
	$approvalStatus = $solutionsProjectrow['approval_status'];
	if($totalHours > 0 ) {
		$user = new User();
		$user->retrieve($ProjManager);
		$userEmail = $user->email1;
		$userFirstName = $user->first_name;
		$userLastName = $user->last_name;
		$ManagerName = $userFirstName." ".$userLastName;
		
		/* Added approval status table -By Maneesha(Mar-11-2019) */
		$timesheet_head .= '<tr style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;">
								<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><span>'.$projName.'</span></td>
								<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><span>'.$ManagerName.'</span></td>
								<td style="border-collapse: collapse;border-spacing: 4px;border: 1px solid black;"><span>'.$approvalStatus.'</span></td>
							</tr>';
	}
}
	$timesheet_head .= '</tbody>';
	$timesheet_head .= '</table></div>';
echo $timesheet_head;
?>