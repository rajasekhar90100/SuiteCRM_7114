<?php
/**
  * FileName => SubmitTimesheet.php
  * Created By => Udaykiran (Created On Nov-21-2018)
  * Modified By => Udaykiran (Modified on Mar-19-2019)
  * COMMENT => Code to fetch the project managers mails and send the notification to them,added the PM Approval,RM Approval fields
  */
global $db, $current_user,$timedate,$sugar_config;
require_once("custom/modules/vedic_Solutions_Timesheet/views/view.edit.php");
require_once("custom/modules/vedic_Solutions_Timesheet/views/view.detail.php");
$timeDate = new TimeDate();
$CurrentDateTime = $timedate->getInstance()->nowDb();
//$projectId = $_REQUEST['projectId'];
$timesheetId = $_REQUEST['timesheetId'];
$approvedby = $_REQUEST['approvedby'];
$approvedManager = $_REQUEST['approvedManager'];
$submit = $_REQUEST['submit'];
$selectedprojId = $_REQUEST['projectId'];
$notZdefaultProjectsCount = $_REQUEST['notZdefaultProjectsCount'];
if(count($selectedprojId)>1){
	$selectedProject = implode("','",$selectedprojId);
}
else{
	$selectedProject = implode(" ",$selectedprojId);
}
$HoursCount = 0;
$DefaultHoursCount = 0;
$projectIdsquery = $db->query("SELECT solution_project AS projectId,vsp.practice as Practice,stc.total_hours as Hours,
									   vsp.project_manager_id as ProjectManager
								FROM vedic_solutions_timesheet AS vst
								JOIN solution_timesheet_cycle AS stc ON stc.id_c = vst.id
								JOIN vedic_solutions_projects AS vsp ON vsp.id = stc.solution_project
								WHERE vst.id ='$timesheetId'
								  AND vsp.deleted=0");
while($row = $db->fetchByAssoc($projectIdsquery)) {
	$ProjectId = $row['projectId'];
	$projectId[] = trim($ProjectId);
	$Practice[] = $row['Practice'];
	$Hours = $row['Hours'];
	if(in_array('ZDefault',$Practice)) {
		$DefaultHoursCount = $DefaultHoursCount + $Hours;
	}
	else {
		$HoursCount = $HoursCount + $Hours;
	}
}
$projectManagerEmail = array();
$projectManagerName = array();
$approval_status;
/*Code to send a notification to the projectmanagers when consultant submits his/her timesheet :: added by Udaykiran :: Nov-21-2018*/
if($submit == 'submit') {
	for($i=0;$i<count($projectId);$i++) {
		require_once("modules/vedic_Solutions_Projects/vedic_Solutions_Projects.php");
		$project = new vedic_Solutions_Projects();
		$project->retrieve($projectId[$i]);
		$projectManager = $project->project_manager_id;

		require_once("modules/vedic_Solutions_Timesheet/vedic_Solutions_Timesheet.php");
		$timesheet = new vedic_Solutions_Timesheet();
		$timesheet->retrieve($timesheetId);
		$timesheetStartDate = $timesheet->startdate;
		$timesheetEndDate = $timesheet->enddate;
		$timesheetName = $timesheet->name;
		$pmApprovalStatus = $timesheet->pm_approval_status;
		$rmApprovalStatus = $timesheet->rm_approval_status;
		$timesheetUserID = $timesheet->users_vedic_solutions_timesheet_1users_ida;
		$user = new User();
		$user->retrieve($timesheetUserID);
		$reportID = $user->reports_to_id;
		$userReport = new User();
		$userReport->retrieve($reportID);
		$reportsToUsername = $userReport->first_name ." ". $userReport->last_name;
		$reportsToEmail = $userReport->email1;
		/* Start of code to get the total hours of the candidate recorded in the respective timesheet-By Maneesha(Jan-08-2019)  */
		$totalHours = $db->query('select total_hours,approval_status from solution_timesheet_cycle where id_c="'.$timesheetId.'" AND solution_project ="'.$projectId[$i].'" ');
		$totalHoursActive = $db->fetchByAssoc($totalHours);
		$totalActiveHours = $totalHoursActive['total_hours'];
		$approval_status = $totalHoursActive['approval_status'];
		/* End of code to get the total hours of the candidate recorded in the respective timesheet-By Maneesha(Jan-08-2019)  */
		
		if($pmApprovalStatus == 'Pending_Approval') {
			$pmApprovalStatus = 'Pending Approval';
		}
		if($rmApprovalStatus == 'Pending_Approval') {
			$rmApprovalStatus = 'Pending Approval';
		}
		if(($totalActiveHours > 0) && ($approval_status == "Rejected" ||  $approval_status == "Draft" )) {
			// if($rmApprovalStatus == 'Pending Approval') {
				$db->query("UPDATE solution_timesheet_cycle SET approval_status = 'Pending Approval' WHERE id_c = '$timesheetId' AND solution_project ='".$projectId[$i]."' AND approval_status IN ('Draft','Rejected')"); 
				require_once("modules/Users/User.php");
				$user = new User();
				$user->retrieve($projectManager);
				$projectManagerEmail[$i] = $user->email1;
				$projectManagerName[$i] = $user->first_name ." ". $user->last_name;
			// }
		}
		if( ($totalActiveHours > 0) && ($rmApprovalStatus == 'Rejected')) {
			$db->query("UPDATE vedic_solutions_timesheet set rm_reason_for_rejection='' where id='$timesheetId'"); 
			require_once("modules/Users/User.php");
			$user = new User();
			$user->retrieve($reportID);
			$projectManagerEmail[$i] = $reportsToEmail;
			$projectManagerName[$i] = $reportsToUsername;
		}

		$current_user_email = $current_user->email1;
		$current_user_name = $current_user->user_name;
		$current_userid = $current_user->id;
		$emailObj = new Email();
		$defaults = $emailObj->getSystemDefaultEmail();
		$site_url = $GLOBALS['sugar_config']['site_url'];
	}
	$query = $db->query("UPDATE vedic_solutions_timesheet 
								SET pm_approval_status = 'Pending_Approval',
									rm_approval_status = 'Pending_Approval',
									modified_user_id = '$current_userid',
									date_modified = '$CurrentDateTime'
								WHERE id = '$timesheetId'");
	$id = create_guid();
	$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
	VALUES ('".$id."',
			'".$timesheetId."',
			'".$CurrentDateTime."',
			'".$current_userid."',
			'rm_approval_status',
			'".$type."',
			'".$rmApprovalStatus."',
			'Pending Approval',
			'',
			'')";
	$update_result = $db->query($auditTimesheet);
	
	$projectManagerName = array_unique($projectManagerName);
	$projectManagerName = array_values($projectManagerName);
	$projectManagerEmail = array_unique($projectManagerEmail);
	$projectManagerEmail = array_values($projectManagerEmail);
	
	/* Added the condition to trigger the mails for the Reporting Managers only when the default projects are submitted in the respective week -By Lakshmi(Jan-22-2019) */
	if($timesheetUserID == $current_userid) {
		if($HoursCount == 0 && $DefaultHoursCount > 0) {
			$subject = " Request for Timesheet Approval";
			$body  = "<p>Hi ". $reportsToUsername.",</p>";
			$body .= "<div>I have submitted my timesheet for the week (".$timesheetStartDate."--".$timesheetEndDate."). Kindly, review the <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a>.</div><br/><br/>";
			$body .= "<div> With Regards,</div>";
			$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
			$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
			$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
			$mail = new SugarPHPMailer();
			$mail->setMailerForSystem();
			$mail->From = $current_user_email;
			$mail->FromName = $current_user->first_name." ".$current_user->last_name;
			$mail->ClearAllRecipients();
			$mail->ClearReplyTos();
			$mail->Subject= $subject;
			$mail->Body_html= $body;
			$mail->Body = $body;
			$mail->isHTML(true); //Set true if the body has any HTML content
			$mail->prepForOutbound();
			$mail->AddAddress($reportsToEmail); 
			if (!$mail->Send()) {
				$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
			}
			echo "success";
			$updateQuery = "UPDATE vedic_solutions_timesheet SET default_projects_status = 'yes' WHERE id = '$timesheetId'";
			$update_result = $db->query($updateQuery);
		}/* End of code to send a notification to the Reporting Manager when consultant submits only default project related his/her timesheet  :: added by Lakshmi ::Jan-22-2019*/
		else {
			for($i=0;$i<count($projectManagerEmail);$i++) {
				/* Added the condition to trigger the mails for the Project Managers only when the total hours recored in the respective week -By Maneesha(Jan-08-2019) */
				if(!empty($projectManagerEmail[$i]) && $Practice[$i]!='ZDefault') {
					$subject = " Request for Timesheet Approval";
					$body  = "<p>Hi ".$projectManagerName[$i].",</p>";
					$body .= "<div>I have submitted my timesheet for the week (".$timesheetStartDate."--".$timesheetEndDate."). Kindly, review the <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a>.</div><br/><br/>";
					$body .= "<div> With Regards,</div>";
					$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
					$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
					$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
					$mail = new SugarPHPMailer();
					$mail->setMailerForSystem();
					$mail->From = $current_user_email;
					$mail->FromName = $current_user->first_name." ".$current_user->last_name;
					$mail->ClearAllRecipients();
					$mail->ClearReplyTos();
					$mail->Subject= $subject;
					$mail->Body_html= $body;
					$mail->Body = $body;
					$mail->isHTML(true); //Set true if the body has any HTML content
					$mail->prepForOutbound();
					$mail->AddAddress($projectManagerEmail[$i]); 
					if (!$mail->Send()) {
						$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
					}
					echo "success";
				}
			}
		}
	}
}
/* End of code to send a notification to the projectmanagers when consultant submits his/her timesheet :: added by Udaykiran :: Nov-21-2018*/
/* Start of code to send an Email notification for 1st and 2nd approval of timesheet -By Maneesha(Nov-27-2018) */
if($_REQUEST['reportstoId']!='') {
	
	$reportstoId=$_REQUEST['reportstoId'];
	$toEmailaddress=$_REQUEST['toEmailaddress'];
	$timesheetId=$_REQUEST['timesheetId'];
	
	$timesheet = new vedic_Solutions_Timesheet();
	$timesheet->retrieve($timesheetId);
	$timesheetStartDate = $timesheet->startdate;
	$timesheetEndDate = $timesheet->enddate;
	
	$userId= $_REQUEST['userId'];
	$users = new User();
	$users->retrieve($userId);
	$userName = $users->first_name ." ". $users->last_name;
	$userEmail = $users->email1;
	$current_userid = $current_user->id;
	$site_url = $GLOBALS['sugar_config']['site_url'];
	$emailObj = new Email();
	$defaults = $emailObj->getSystemDefaultEmail();
	$user = new User();
	$user->retrieve($reportstoId);
	$reportstoManager=$user->first_name ." ". $user->last_name;
	$currentuserName = $current_user->first_name." ".$current_user->last_name;
	$current_user_email = $current_user->email1;
	$pmApprovalStatus = $timesheet->pm_approval_status;
	$rmApprovalStatus = $timesheet->rm_approval_status;
	if($pmApprovalStatus == 'Pending_Approval') {
		$pmApprovalStatus = 'Pending Approval';
	}
	if($rmApprovalStatus == 'Pending_Approval') {
		$rmApprovalStatus = 'Pending Approval';
	}

	if($approvedby == 'PM') {/* Added condition to differentiate 1st and 2nd approval stages of Timesheet PM=Project Manager*/
		$query = $db->query("select name from vedic_solutions_projects as vsp
								inner join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
								WHERE stc.id_c = '$timesheetId'
								AND stc.solution_project IN('$selectedProject')
								AND vsp.deleted=0");
		while($pro = $db->fetchByAssoc($query)){
			$Solutions[] = $pro['name'];
		}
		if(count($Solutions>1)){
			$solProject = implode("','",$Solutions);
		}
		else{
			$solProject = implode(" ",$Solutions);
		}
		
		$Practice = $row['Practice'];
		$query = $db->query("UPDATE solution_timesheet_cycle stc 
								SET approval_status='Approved'
								WHERE stc.id_c = '$timesheetId'
								AND stc.solution_project IN('$selectedProject')");
		for($i=0;$i<count($Solutions);$i++) {
			$id = create_guid();
			$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
			VALUES ('".$id."',
					'".$timesheetId."',
					'".$CurrentDateTime."',
					'".$current_userid."',
					'".$Solutions[$i]."',
					'".$type."',
					'Pending Approval',
					'Approved',
					'',
					'')";
			$update_result = $db->query($auditTimesheet);
		}
		$currentuserName = $current_user->first_name." ".$current_user->last_name;
		/* Added condition to differentiate 1st and 2nd approval stages of Timesheet PM=Project Manager*/
		$countofApprovadStatusrecordsQuery = $db->query("select count(*) as RowCount from  solution_timesheet_cycle 
															where approval_status = 'Approved'
															AND id_c ='$timesheetId' AND total_hours > 0");
		$countofApprovadStatusrecordsResult= $db->fetchByAssoc($countofApprovadStatusrecordsQuery);
		$countofapprovals = $countofApprovadStatusrecordsResult['RowCount'];
		if($countofapprovals == $notZdefaultProjectsCount) {
			if(($userId =='37830313-d578-195b-1114-58d907cd0525')|| ($userId == 'd8c05b24-8688-a97b-7010-5b8fe84bb056')) {
				$query = $db->query("UPDATE vedic_solutions_timesheet 
				SET rm_approval_status = 'Approved',
					modified_user_id = '$current_userid',
					date_modified = '$CurrentDateTime'
				WHERE id = '$timesheetId'");
			}			
			$subject = "Regarding Timesheet Approval for ".$userName." ";
			$body  = "<p>Hi ".$reportstoManager.",</p>";
			$body .= "<div>I have Approved the timesheet of <a href= $site_url/index.php?module=Users&return_module=Users&action=DetailView&record=$userId>$userName </a> in the week  (".$timesheetStartDate."--".$timesheetEndDate.") . Kindly, review the <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a>.</div><br/><br/>";
			$body .= "<div> With Regards,</div>";
			$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
			$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
			$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";

			$mail = new SugarPHPMailer();
			$mail->setMailerForSystem();
			$mail->From = $current_user_email;
			$mail->FromName = $current_user->first_name." ".$current_user->last_name;
			$mail->ClearAllRecipients();
			$mail->ClearReplyTos();
			$mail->Subject= $subject;
			$mail->Body_html= $body;
			$mail->Body = $body;
			$mail->isHTML(true); //Set true if the body has any HTML content
			$mail->prepForOutbound();
			$mail->AddAddress($toEmailaddress);
			$mail->AddCC($userEmail);
			if($toEmailaddress!= 'nick.sharma@savantis.com') {
				if (!$mail->Send()) {
					$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
				}
			}			
		}
		else {
			$subject = "Regarding Timesheet Approval for ".$userName." ";
			$body  = "<p>Hi ".$userName.",</p>";
			$body .= "<div>Your <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a> has been Approved in the week  (".$timesheetStartDate."--".$timesheetEndDate.") for the Project(s) '$solProject'.</div><br/><br/>";
			$body .= "<div> With Regards,</div>";
			$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
			$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
			$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";

			$mail = new SugarPHPMailer();
			$mail->setMailerForSystem();
			$mail->From = $current_user_email;
			$mail->FromName = $current_user->first_name." ".$current_user->last_name;
			$mail->ClearAllRecipients();
			$mail->ClearReplyTos();
			$mail->Subject= $subject;
			$mail->Body_html= $body;
			$mail->Body = $body;
			$mail->isHTML(true); //Set true if the body has any HTML content
			$mail->prepForOutbound();
			$mail->AddAddress($userEmail);
			if($toEmailaddress!= 'nick.sharma@savantis.com') {
				if (!$mail->Send()) {
					$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
				}
			}
		}
		echo "success";
	}
	if($approvedby == 'RM') { /* Added condition to differentiate 1st and 2nd approval stages of Timesheet RM=Reports To Manager*/
		$countofApprovadStatusrecordsQuery = $db->query("select count(*) as RowCount from  solution_timesheet_cycle 
															where approval_status = 'Approved'
															AND id_c ='$timesheetId'
															AND total_hours > 0");
		$countofApprovadStatusrecordsResult= $db->fetchByAssoc($countofApprovadStatusrecordsQuery);
		$countofapprovals = $countofApprovadStatusrecordsResult['RowCount'];
		$query = $db->query("select name from vedic_solutions_projects as vsp
								inner join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
								WHERE stc.id_c = '$timesheetId'
								AND stc.solution_project IN('$selectedProject')
								AND vsp.deleted=0");
		while($pro = $db->fetchByAssoc($query)){
			$Solutions[] = $pro['name'];
		}
		if(count($Solutions>1)){
			$solProject = implode("','",$Solutions);
		}
		else{
			$solProject = implode(" ",$Solutions);
		}
		if($approvedManager == 'different') {
			if($countofapprovals==$notZdefaultProjectsCount) {
				$query = $db->query("UPDATE vedic_solutions_timesheet 
										SET rm_approval_status = 'Approved',
										modified_user_id = '$current_userid',
										date_modified = '$CurrentDateTime'
										WHERE id = '$timesheetId'");
				$query = $db->query("UPDATE solution_timesheet_cycle as stc
										INNER JOIN vedic_solutions_timesheet as vst on vst.id = stc.id_c
										INNER JOIN vedic_solutions_projects as vsp on vsp.id = stc.solution_project
										SET approval_status = 'Approved'
										WHERE stc.id_c = '$timesheetId' 
										AND vsp.practice='ZDefault' AND  stc.total_hours > 0");	
				$id = create_guid();
				$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
				VALUES ('".$id."',
						'".$timesheetId."',
						'".$CurrentDateTime."',
						'".$current_userid."',
						'rm_approval_status',
						'".$type."',
						'Pending Approval',
						'Approved',
						'',
						'')";
				$update_result = $db->query($auditTimesheet);
				$query = $db->query("select name from vedic_solutions_projects as vsp inner join solution_timesheet_cycle as stc on stc.solution_project = vsp.id 
										where vsp.practice='ZDefault' and stc.id_c='$timesheetId' and stc.total_hours > 0 ");
				while($default = $db->fetchByAssoc($query)){
					$defaultprojects[] = $default['name'];
				}
				for($i=0;$i<count($defaultprojects);$i++){
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'".$defaultprojects[$i]."',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);
				}
				$subject = "Regarding Timesheet Approval for ".$userName." ";
				$body  = "<p>Hi ".$userName.",</p>";
				$body .= "<div>I have Approved your <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a> in the week  (".$timesheetStartDate."--".$timesheetEndDate.").</div><br/><br/>";
				$body .= "<div> With Regards,</div>";
				$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
				$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
				$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
				$mail = new SugarPHPMailer();
				$mail->setMailerForSystem();
				$mail->From = $current_user_email;
				$mail->FromName = $current_user->first_name." ".$current_user->last_name;
				$mail->ClearAllRecipients();
				$mail->ClearReplyTos();
				$mail->Subject= $subject;
				$mail->Body_html= $body;
				$mail->Body = $body;
				$mail->isHTML(true); //Set true if the body has any HTML content
				$mail->prepForOutbound();
				$mail->AddAddress($userEmail);
				if (!$mail->Send()) {
					$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
				}
			}
		}
		if($approvedManager == 'same') {
			$query = $db->query("select approval_status from solution_timesheet_cycle as stc 
										inner join vedic_solutions_projects as vsp on vsp.id = stc.solution_project 
										where vsp.project_manager_id='".$current_userid."' 
										and stc.id_c='".$timesheetId."' and vsp.deleted=0 and vsp.practice!='ZDefault'");
			while($row = $db->fetchByAssoc($query))	{
				$approvalstatus[] = $row['approval_status'];
			}
			if(empty($selectedprojId)) {     //when RM approves at last i.e total timesheet.
				$query = $db->query("UPDATE solution_timesheet_cycle stc 
								SET approval_status='Approved'
								WHERE stc.id_c = '$timesheetId'
								AND stc.solution_project IN('$selectedProject')");
				$query = $db->query("UPDATE solution_timesheet_cycle as stc
										INNER JOIN vedic_solutions_timesheet as vst on vst.id = stc.id_c
										INNER JOIN vedic_solutions_projects as vsp on vsp.id = stc.solution_project
										SET approval_status = 'Approved'
										WHERE stc.id_c = '$timesheetId' 
										AND vsp.practice='ZDefault' AND stc.total_hours > 0");
				
				for($i=0;$i<count($Solutions);$i++) {
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'".$Solutions[$i]."',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);
				}
				$query = $db->query("select name from vedic_solutions_projects as vsp inner join solution_timesheet_cycle as stc on stc.solution_project = vsp.id 
										where vsp.practice='ZDefault' and stc.id_c='$timesheetId' AND stc.total_hours > 0 ");
				while($default = $db->fetchByAssoc($query)){
					$defaultprojects[] = $default['name'];
				}
				for($i=0;$i<count($defaultprojects);$i++) {
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'".$defaultprojects[$i]."',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);
				}				
				$Projectsquery = $db->query("SELECT count(*) AS COUNT
											FROM solution_timesheet_cycle
											WHERE id_c ='$timesheetId'
											  AND total_hours > 0");
				$ProjectsCount = $db->fetchByAssoc($Projectsquery);
				$ProjectsCount = $ProjectsCount ['COUNT'];
				$Projectsapprovedquery = $db->query("SELECT count(*) AS COUNT
													FROM solution_timesheet_cycle
													WHERE id_c ='$timesheetId'
													  AND total_hours > 0
													  AND approval_status='Approved'");
				$ProjectsapprovedCount = $db->fetchByAssoc($Projectsapprovedquery);
				$ProjectsapprovedCount = $ProjectsapprovedCount ['COUNT'];				
				if($ProjectsapprovedCount == $ProjectsCount) {
					$query = $db->query("UPDATE vedic_solutions_timesheet 
										SET rm_approval_status = 'Approved',
										modified_user_id = '$current_userid',
										date_modified = '$CurrentDateTime'
										WHERE id = '$timesheetId'");
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'rm_approval_status',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);						
					$subject = "Regarding Timesheet Approval for ".$userName." ";
					$body  = "<p>Hi ".$userName.",</p>";
					$body .= "<div>I have Approved your <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a> in the week  (".$timesheetStartDate."--".$timesheetEndDate.").</div><br/><br/>";
					$body .= "<div> With Regards,</div>";
					$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
					$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
					$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
					$mail = new SugarPHPMailer();
					$mail->setMailerForSystem();
					$mail->From = $current_user_email;
					$mail->FromName = $current_user->first_name." ".$current_user->last_name;
					$mail->ClearAllRecipients();
					$mail->ClearReplyTos();
					$mail->Subject= $subject;
					$mail->Body_html= $body;
					$mail->Body = $body;
					$mail->isHTML(true); //Set true if the body has any HTML content
					$mail->prepForOutbound();
					$mail->AddAddress($userEmail);
					if (!$mail->Send()) {
						$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
					}
				}
			}
			else {
				$subject = "Regarding Timesheet Approval for ".$userName." ";
				$body  = "<p>Hi ".$userName.",</p>";
				$body .= "<div>Your <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$timesheetId>Timesheet</a> has been Approved in the week  (".$timesheetStartDate."--".$timesheetEndDate.") for the Project(s) '$solProject'.</div><br/><br/>";
				$body .= "<div> With Regards,</div>";
				$body .= "<div><b>$current_user->first_name $current_user->last_name</b></div>";
				$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
				$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";

				$mail = new SugarPHPMailer();
				$mail->setMailerForSystem();
				$mail->From = $current_user_email;
				$mail->FromName = $current_user->first_name." ".$current_user->last_name;
				$mail->ClearAllRecipients();
				$mail->ClearReplyTos();
				$mail->Subject= $subject;
				$mail->Body_html= $body;
				$mail->Body = $body;
				$mail->isHTML(true); //Set true if the body has any HTML content
				$mail->prepForOutbound();
				$mail->AddAddress($userEmail);
				if($toEmailaddress!= 'nick.sharma@savantis.com') {
					if (!$mail->Send()) {
						$GLOBALS['log']->fatal("ERROR:Mail sending failed!");
					}
				}				
				
				//when rm approves the project in the middle  and approves the timesheet at last.
				$query = $db->query("UPDATE solution_timesheet_cycle stc 
									SET approval_status='Approved'
									WHERE stc.id_c = '$timesheetId'
									AND stc.solution_project IN('$selectedProject') AND stc.total_hours > 0");
				for($i=0;$i<count($Solutions);$i++) {
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'".$Solutions[$i]."',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);
				}
				$projectcount = $db->query("select count(vsp.id) as count from vedic_solutions_projects as vsp 
											join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
											join vedic_solutions_timesheet as vst on vst.id= stc.id_c
											where vsp.practice NOT LIKE 'ZDefault'  
											and vsp.deleted=0 
											and vst.deleted=0
											and stc.id_c='$timesheetId'");
				$rmprojectcount = $db->fetchByAssoc($projectcount);
				$rmprojects = $rmprojectcount['count'];
				$rmapprovedprojectcount = $db->query("select count(vsp.id) as count from vedic_solutions_projects as vsp 
														join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
														join vedic_solutions_timesheet as vst on vst.id =stc.id_c
														where vsp.deleted = 0
														and stc.approval_status  ='Approved' 
														and vsp.practice NOT LIKE 'ZDefault' 
														and vst.deleted=0
														and stc.id_c='$timesheetId'");
				$rmapprvedprojectcount = $db->fetchByAssoc($rmapprovedprojectcount);
				$rmapprvedcount = $rmapprvedprojectcount['count'];
				if($rmprojects==$rmapprvedcount) {
					$query = $db->query("UPDATE vedic_solutions_timesheet 
											SET rm_approval_status = 'Approved',
											modified_user_id = '$current_userid',
											date_modified = '$CurrentDateTime'
											WHERE id = '$timesheetId'");
					$query = $db->query("UPDATE solution_timesheet_cycle as stc
											INNER JOIN vedic_solutions_timesheet as vst on vst.id = stc.id_c
											INNER JOIN vedic_solutions_projects as vsp on vsp.id = stc.solution_project
											SET approval_status = 'Approved'
											WHERE stc.id_c = '$timesheetId' 
											AND vsp.practice='ZDefault' AND stc.total_hours > 0");
				   $query = $db->query("select name from vedic_solutions_projects as vsp inner join solution_timesheet_cycle as stc on stc.solution_project = vsp.id 
											where vsp.practice='ZDefault' and stc.id_c='$timesheetId' AND stc.total_hours > 0");
					while($default = $db->fetchByAssoc($query)){
						$defaultprojects[] = $default['name'];
					}
					for($i=0;$i<count($defaultprojects);$i++) {
						$id = create_guid();
						$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
						VALUES ('".$id."',
								'".$timesheetId."',
								'".$CurrentDateTime."',
								'".$current_userid."',
								'".$defaultprojects[$i]."',
								'".$type."',
								'Pending Approval',
								'Approved',
								'',
								'')";
						$update_result = $db->query($auditTimesheet);
					}
					$id = create_guid();
					$auditTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`)
					VALUES ('".$id."',
							'".$timesheetId."',
							'".$CurrentDateTime."',
							'".$current_userid."',
							'rm_approval_status',
							'".$type."',
							'Pending Approval',
							'Approved',
							'',
							'')";
					$update_result = $db->query($auditTimesheet);	
				}
			}
		}
		echo "success";
	}
}
/* End of code to send an Email notification for 1st and 2nd approval of timesheet -By Maneesha(Dec-12-2018) */
?>	