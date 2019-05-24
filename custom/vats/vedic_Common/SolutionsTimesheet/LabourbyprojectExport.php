<?php
	/**
	  * File Name => LabourbyprojectExport.php
	  * Created By => Rajasekhar (Created On Feb-21-2019)
	  * Modified By => Rajasekhar (Modify On Feb-21-2019)
	  * COMMENT => GenerateLabour by project EXCEL Report on click on Button
	  */

	error_reporting(E_ALL & ~E_STRICT & ~E_WARNING & ~E_NOTICE);
	if(!defined('sugarEntry'))define('sugarEntry', true);
	chdir(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	require_once('include/entryPoint.php');
	require_once ('custom/include/javascript/PHPExcel/Classes/PHPExcel/IOFactory.php');
	require_once('include/TimeDate.php');

	global $db, $current_user,$sugar_config,$timedate;
	$objPHPExcel = new PHPExcel();
	$userType = $current_user->is_admin;
	$currentUser = $current_user->id;
	$startDate = $_REQUEST['sdate'];	  
	$endDate = $_REQUEST['edate'];
	$filter = $_REQUEST['filter'];
	if($filter == 0) {
		$filter_id = 'EmployeeName';
	}
	else if($filter == 2) {
		$filter_id = 'projectname';
	}
	else if($filter == 3) {
		$filter_id = 'client';
	}
	else if($filter == 4) {
		$filter_id = 'practice';
	}
	else {
		$filter_id = 'EmployeeName';
	}
	$baseRow = 1;
	$sheet_index =0;
	$styleArray = array(
	  'borders' => array(
		'allborders' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array('rgb' => '000000'),
		),
	  ),
	);
	$objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex($sheet_index);
	$row = $baseRow;
	//PRINT HEADER OF TABLE
	$Vendor_header = array(' Employee ',' Reporting Manager ',' Project ',' Customer ',' Practice ',' Total Hours ( Hrs )');
	$objPHPExcel_sheet = $objPHPExcel->getActiveSheet();
	array_walk($Vendor_header, 'utf8_encode');
	//write the entire row to the current worksheet
	$objPHPExcel_sheet->fromArray($Vendor_header, NULL, 'A' . $row);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->getFill()
								  ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
								  ->getStartColor()->setRGB('3860a0');
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->getFont()->getColor()->setRGB('FFFFFF');
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->applyFromArray($styleArray);
	$row =$row+1;
	if(!empty($startDate)&& !empty($endDate)) {
		$startDate = date("Y-m-d",strtotime($startDate));
		$endDate = date("Y-m-d",strtotime($endDate));
		$dateQuery = "vedic_solutions_timesheet.startdate >= '".$startDate."' AND vedic_solutions_timesheet.enddate <= '".$endDate."' AND";
	}
	else {
		$stQuery = "vedic_solutions_timesheet.deleted ='0'";
	}
	$user = new User();
	$user->retrieve($currentUser);
	$ReportstoUser = $user->reports_to_id;

	$reportstoManagersQuery = "SELECT count(id) from users where reports_to_id='".$currentUser."' AND users.deleted=0";
	$reportstoManagerresult = $db->query($reportstoManagersQuery);
	$reportstoManager = $db->fetchByAssoc($reportstoManagerresult);

	$projectManagersQuery = "SELECT vsp.project_manager_id AS ProjectManager
										FROM vedic_solutions_timesheet AS vst
										JOIN solution_timesheet_cycle AS stc ON stc.id_c = vst.id
										JOIN vedic_solutions_projects AS vsp ON vsp.id = stc.solution_project
										WHERE vsp.deleted=0";
	$projectManagerresult = $db->query($projectManagersQuery);
	while($projectManagerrow=$db->fetchByAssoc($projectManagerresult)){
		$projectManagerId[] = $projectManagerrow['ProjectManager'];
	}
	if(in_array($currentUser,$projectManagerId) && $reportstoManager == 0 && $userType == 0) {
		$filterQuery = "vedic_solutions_projects.project_manager_id = '".$currentUser."' AND ";
	}
	else if(!in_array($currentUser,$projectManagerId) && $reportstoManager > 0 && $userType == 0) {
		$filterQuery = "users.reports_to_id ='".$currentUser."' AND "; 
	}
	else if(in_array($currentUser,$projectManagerId) && $reportstoManager > 0 && $userType == 0) {
		$filterQuery = "vedic_solutions_projects.project_manager_id = '".$currentUser."' OR users.reports_to_id ='".$currentUser."' AND ";
	}
	else {
		$filterQuery = " ";
	}
	
	$stage= "SELECT sum(solution_timesheet_cycle.total_hours) as `totalhours`,
			vedic_solutions_projects.name as `projectname`,
			vedic_solutions_projects.practice as `practice`,
			accounts.name AS client,
			users.reports_to_id as `userid`,
			CONCAT(
			COALESCE(users.first_name, ' '),
			' ',
			users.last_name
			) AS `EmployeeName` FROM vedic_solutions_timesheet
			JOIN solution_timesheet_cycle ON solution_timesheet_cycle.id_c = vedic_solutions_timesheet.id
			JOIN vedic_solutions_projects ON vedic_solutions_projects.id = solution_timesheet_cycle.solution_project 
			JOIN users_vedic_solutions_timesheet_1_c 
			ON users_vedic_solutions_timesheet_1_c.users_vedic_solutions_timesheet_1vedic_solutions_timesheet_idb = vedic_solutions_timesheet.id 
			JOIN users ON users.id = users_vedic_solutions_timesheet_1_c.users_vedic_solutions_timesheet_1users_ida
			LEFT JOIN accounts ON accounts.id = vedic_solutions_projects.client_id
			WHERE ".$dateQuery."
				".$filterQuery."
			vedic_solutions_timesheet.deleted='0' 
			AND accounts.deleted='0' 
			AND solution_timesheet_cycle.total_hours > 0
			group by users.id,vedic_solutions_projects.id
			ORDER BY ".$filter_id." ";
	$result1 = $db->query($stage);
	$CotractArray = Array();
	$CotractTotalArray = Array();
	$cnt = 0;
	while ($GetContarctRES = $db->fetchByAssoc($result1)){
		if(!array_key_exists ($GetContarctRES[$filter_id],$CotractArray)){
			$CotractArray[$GetContarctRES[$filter_id]]['name'] = $GetContarctRES[$filter_id];
		}
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['EmployeeName'];
		$userId = $GetContarctRES['userid'];
			$user = new User();
			$user->retrieve($userId);
			$userFirstName = $user->first_name;
			$userLastName = $user->last_name;
			$FullName = $userFirstName. " ". $userLastName;
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $FullName;
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['projectname'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['client'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['practice'];
		
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = number_format((float)$GetContarctRES['totalhours'], 2, '.', '');
		//Calculate Summary
		$CotractArray[$GetContarctRES[$filter_id]]['total'] += $GetContarctRES['totalhours'];
		++$cnt;
	}
	foreach($CotractArray as $contractID => $contractDetails){
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':F'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$contractDetails['name']);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->getFill()
									  ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
									  ->getStartColor()->setRGB('d2dff1');
		
		$row =$row+1;
		
		foreach($contractDetails['items'] as $items => $ItemsDetails){
			array_walk($ItemsDetails, 'utf8_encode');
			$objPHPExcel_sheet->fromArray($ItemsDetails, NULL, 'A' . $row);
			$row =$row+1;
		}
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':E'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,"Total for ".$contractDetails['name']);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$contractDetails['total']);
		
		$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getFill()
										->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
										->getStartColor()->setRGB('1fc029');
		
		$row =$row+1;
		
	}
	
	//Setting Print area
	$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:G'.$row);
	
	foreach (range('A', 'F') as $col) {
		$objPHPExcel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(true);
	} 
	
	$sheet_index = $sheet_index+1;
	
	//REMOVE EMPTY WORKSHEET
	$objPHPExcel->removeSheetByIndex($sheet_index);
	$objPHPExcel->getActiveSheet()->setTitle("Labor by Project Report");


	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

	$dateSeperators = array("/", "-", ".");
	$startDate = str_replace($dateSeperators, "", $startDate);
	$endDate = str_replace($dateSeperators, "", $endDate);
	if($startDate!= '' && $endDate!= '' ) {
		$fileName = "Labor by Project Report_".$startDate."-".$endDate.".xlsx";
	}
	else {
		$fileName = "Labor by Project Report.xlsx";
	}
	$path_1 = "custom/vats/vedic_Common/templates/".$fileName;
	 if(file_exists($path_1)){
		unlink($path_1);  // not working
	}
	$objWriter->save($path_1);
	echo $savePath = "$path_1";
	header("Location: ".$path_1);
	
?>
