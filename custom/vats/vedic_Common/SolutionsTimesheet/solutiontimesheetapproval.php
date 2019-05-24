<?php
/**
  * FileName => solutiontimesheetapproval.php
  * Created By => Lakshmi(Created on Nov-27-2018)
  * Modified By => Maneesha(Modified on Mar-05-2019)
  * Comment => EntryPoint to update the solution timesheet approval.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
require_once("custom/modules/vedic_Solutions_Timesheet/views/view.detail.php");
global $db,$current_user,$timedate; 
	$timeDate = new TimeDate();
	$CurrentDateTime = $timedate->getInstance()->nowDb();
	$user = $current_user->id; 
	$currentUserEmail = $current_user->email1;
	$currentUserName = $current_user->first_name." ".$current_user->last_name;
	$solutionTimesheetId = $_REQUEST['id'];
	$solutionApprovalStatus = $_REQUEST['approvalStatus'];
	$solutionReasonForRejection = $_REQUEST['reasonForRejection'];
	$solutionApprovedBy = $_REQUEST['approvedby'];
	$solutionTimesheet = new vedic_Solutions_Timesheet();
	$solutionTimesheet->retrieve($solutionTimesheetId);
	$solutionTimesheetStartDate = $solutionTimesheet->startdate;
	$solutionTimesheetEndDate = $solutionTimesheet->enddate;
	$userId= $_REQUEST['userId'];
	$projectIdRequest = $_REQUEST['projectId'];
	if(count($projectIdRequest)>1) {
		$selectedProject = implode("','",$projectIdRequest);
	}
	else {
		$selectedProject = implode(" ",$projectIdRequest);
	}
	$users = new User();
	$users->retrieve($userId);
	$userName = $users->first_name ." ". $users->last_name;
	$userEmail = $users->email1;
	$site_url = $GLOBALS['sugar_config']['site_url'];
	$emailObj = new Email();
	$defaults = $emailObj->getSystemDefaultEmail();
	/*Start of code to get the total hours of the consulatant recorded in the respective timesheet-By Lakshmi(Jan-23-2019) */
	$HoursCount = 0;
	$DefaultHoursCount = 0;
	$projectIdsquery = $db->query("SELECT solution_project AS projectId,vsp.practice as Practice,stc.total_hours as Hours,
										   vsp.project_manager_id as ProjectManager
									FROM vedic_solutions_timesheet AS vst
									JOIN solution_timesheet_cycle AS stc ON stc.id_c = vst.id
									JOIN vedic_solutions_projects AS vsp ON vsp.id = stc.solution_project
									WHERE vst.id ='$solutionTimesheetId'
									  AND vsp.deleted=0");
	while($row = $db->fetchByAssoc($projectIdsquery)) {
		$ProjectId = $row['projectId'];
		$projectId[] = trim($ProjectId);
		$Practice = $row['Practice'];
		$Hours = $row['Hours'];
		if($Practice == 'ZDefault') {
			$DefaultHoursCount = $DefaultHoursCount + $Hours;
		}
		else {
			$HoursCount = $HoursCount + $Hours;
		}
	}
	
	/*Start of code to get the total hours of the consulatant recorded in the respective timesheet-By Lakshmi(Jan-23-2019) */
	$solutionApprovalStatus = 'Rejected';
	if($solutionApprovedBy == 'PM') {
		$query = $db->query("UPDATE solution_timesheet_cycle stc 
								SET approval_status='Rejected',reason_rejection='$solutionReasonForRejection'
								WHERE stc.id_c = '$solutionTimesheetId'
								AND stc.solution_project IN('$selectedProject')");
		$query = $db->query("select name from vedic_solutions_projects as vsp
								inner join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
								WHERE stc.id_c = '$solutionTimesheetId'
								AND stc.solution_project IN('$selectedProject')
								AND vsp.deleted=0");
		while($pro = $db->fetchByAssoc($query)){
			$Solutions = $pro['name'];
		}
		$Id = create_guid();
		$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) 
		VALUES ('".$Id."',
		'".$solutionTimesheetId."',
		'".$CurrentDateTime."',
		'".$user."',
		'".$Solutions."',
		'".$type."',
		'Pending Approval',
		'Rejected',
		'Approval status got changed',
		'Approval status got changed')";
		$update_result = $db->query($auditSolutionTimesheet);
		
		$auditId = create_guid();
		$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) 
		VALUES ('".$auditId."',
		'".$solutionTimesheetId."',
		'".$CurrentDateTime."',
		'".$user."',
		'Reason for Rejection ($Solutions)',
		'text','',
		'".$solutionReasonForRejection."',
		'Reason for rejection got changed',
		'Reason for rejection got changed')";
		$update_result = $db->query($auditSolutionTimesheet);
	}
	if($solutionApprovedBy == 'RM') {
		$rmprojectcount	= $db->query("select count(vsp.id) as count from vedic_solutions_projects as vsp 
											join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
											join vedic_solutions_timesheet as vst on vst.id= stc.id_c
											where vsp.project_manager_id='$user'
											and vsp.practice NOT LIKE 'ZDefault'
											and vsp.deleted=0 
											and vst.deleted=0
											and stc.id_c='$solutionTimesheetId'
											and stc.approval_status='Pending Approval'");
		$rmcount = $db->fetchByAssoc($rmprojectcount);
		$count = $rmcount['count'];
		if($HoursCount == 0 && $DefaultHoursCount > 0) {
			$query = $db->query("UPDATE solution_timesheet_cycle as stc
									INNER JOIN vedic_solutions_timesheet as vst on vst.id = stc.id_c
									SET vst.rm_approval_status = 'Rejected',rm_reason_for_rejection='$solutionReasonForRejection'
									WHERE stc.id_c = '$solutionTimesheetId'");
			$id = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('".$id."','".$solutionTimesheetId."','".$CurrentDateTime."','".$user."','rm_approval_status','enum','Pending Approval','".$solutionApprovalStatus."','Approval Status got changed','Approval Status got changed')";
			$update_result = $db->query($auditSolutionTimesheet);

			$auditId = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('".$auditId."','".$solutionTimesheetId."','".$CurrentDateTime."','".$user."','rm_reason_for_rejection','text','','".$solutionReasonForRejection."','Reason for rejection got changed','Reason for rejection got changed')";
			$update_result = $db->query($auditSolutionTimesheet);
		}
		if($count>=1) {
			$query = $db->query("UPDATE solution_timesheet_cycle stc 
								SET approval_status='Rejected',reason_rejection='$solutionReasonForRejection'
								WHERE stc.id_c = '$solutionTimesheetId'
								AND stc.solution_project IN('$selectedProject')");
			$query = $db->query("select name from vedic_solutions_projects as vsp
									inner join solution_timesheet_cycle as stc on stc.solution_project=vsp.id
									WHERE stc.id_c = '$solutionTimesheetId'
									AND stc.solution_project IN('$selectedProject')
									AND vsp.deleted=0");
			while($pro = $db->fetchByAssoc($query)){
				$Solutions = $pro['name'];
			}
			$Id = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) 
			VALUES ('".$Id."',
			'".$solutionTimesheetId."',
			'".$CurrentDateTime."',
			'".$user."',
			'".$Solutions."',
			'".$type."',
			'Pending Approval',
			'Rejected',
			'Approval status got changed',
			'Approval status got changed')";
			$update_result = $db->query($auditSolutionTimesheet);
			
			$auditId = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) 
			VALUES ('".$auditId."',
			'".$solutionTimesheetId."',
			'".$CurrentDateTime."',
			'".$user."',
			'Reason for Rejection ($Solutions)',
			'text','',
			'".$solutionReasonForRejection."',
			'Reason for rejection got changed',
			'Reason for rejection got changed')";
			$update_result = $db->query($auditSolutionTimesheet);
		}
		else {
			$query = $db->query("UPDATE solution_timesheet_cycle as stc
									INNER JOIN vedic_solutions_timesheet as vst on vst.id = stc.id_c
									SET vst.rm_approval_status = 'Rejected',rm_reason_for_rejection='$solutionReasonForRejection'
									WHERE stc.id_c = '$solutionTimesheetId'");	
			$id = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('".$id."','".$solutionTimesheetId."','".$CurrentDateTime."','".$user."','rm_approval_status','enum','Pending Approval','".$solutionApprovalStatus."','Approval Status got changed','Approval Status got changed')";
			$update_result = $db->query($auditSolutionTimesheet);

			$auditId = create_guid();
			$auditSolutionTimesheet = "INSERT INTO `vedic_solutions_timesheet_audit`(`id`,`parent_id`,`date_created`,`created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('".$auditId."','".$solutionTimesheetId."','".$CurrentDateTime."','".$user."','rm_reason_for_rejection','text','','".$solutionReasonForRejection."','Reason for rejection got changed','Reason for rejection got changed')";
			$update_result = $db->query($auditSolutionTimesheet);
		}
	}
	$subject = "Timesheet Rejection";
	$body  = "<p>Hi ".$userName.",</p>";
	$body .= "<div>Your <a href= $site_url/index.php?module=vedic_Solutions_Timesheet&return_module=vedic_Solutions_Timesheet&action=DetailView&record=$solutionTimesheetId>Timesheet</a> has been rejected in the week  (".$solutionTimesheetStartDate."--".$solutionTimesheetEndDate.") by $currentUserName <br> Reason for Rejection	: ".$solutionReasonForRejection."</div><br/><br/>";
	$body .= "<div> With Regards,</div>";
	$body .= "<div><b>$currentUserName </b></div>";
	$body .= "<div>Tel : ".$current_user->phone_work." | <u>$current_user->email1</div>";
	$body .= "<div><img src='$site_url/custom/vats/vedic_Common/Savantis-logo.png'></div>";
	$mail = new SugarPHPMailer();
	$mail->setMailerForSystem();
	$mail->From = $currentUserEmail;
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
	echo "success";
?>