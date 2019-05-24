<?php
/**
  * File Path => UnbilledReportExport.php
  * Created By => Udaykiran (Created On Feb-22-2019)
  * Modified By => Udaykiran (Modify On Feb-22-2019)
  * COMMENT => Generate Unbilled Time EXCEL Report on click on Button
  */

	error_reporting(E_ALL & ~E_STRICT & ~E_WARNING & ~E_NOTICE);
	if(!defined('sugarEntry'))define('sugarEntry', true);
	chdir(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	require_once('include/entryPoint.php');
	require_once ('custom/include/javascript/PHPExcel/Classes/PHPExcel/IOFactory.php');
	require_once('include/TimeDate.php');

	global $db, $current_user,$sugar_config,$timedate;
	$objPHPExcel = new PHPExcel();

	$startDate = $_REQUEST['sdate'];
	$endDate = $_REQUEST['edate'];
	$filter = $_REQUEST['filter'];
	if($filter == 2) {
		$filter_id = 'Project';
	}
	else {
		$filter_id = 'Employee';
	}

	$sheet_index =0;
	$baseRow = 1; 
	$styleArray = array(
	  'borders' => array(
		'allborders' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array('rgb' => '000000'),
		),
	  ),
	);
	$BStyle = array(
	  'borders' => array(
		'outline' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN,
		  'color' => array('rgb' => '000000'),
		)
	  )
	);

	$objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex($sheet_index);
	$row = $baseRow;
	
	//PRINT HEADER OF TABLE
	$Vendor_header = array(' Employee Name ',' Reporting Manager ',' Project Name',' Practice ',' Type ',' Billed ? ',' Time in Hours ');
	$objPHPExcel_sheet = $objPHPExcel->getActiveSheet();
	array_walk($Vendor_header, 'utf8_encode');
	//write the entire row to the current worksheet
	$objPHPExcel_sheet->fromArray($Vendor_header, NULL, 'A' . $row);

	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->getFill()
								  ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
								  ->getStartColor()->setRGB('3860a0');
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->getFont()->getColor()->setRGB('FFFFFF');
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($styleArray);
	$row =$row+1;

	$this_week_sd = date("Y-m-d",strtotime($startDate));
	$this_week_ed = date("Y-m-d",strtotime($endDate));
	if($startDate =='' && $endDate == '') {
		$this_week_ed = '';
		$this_week_sd = '';
		$thisWeekSd = '';
		$thisWeekEd = '';
	}
	else {
		$thisWeekSd = date("m/d/Y",strtotime($this_week_sd));
		$thisWeekEd = date("m/d/Y",strtotime($this_week_ed));
	}	
	if($this_week_sd !='' && $this_week_ed != '') {
		$dateQuery = "vedic_solutions_timesheet.startdate >= '".$this_week_sd."' AND vedic_solutions_timesheet.enddate <= '".$this_week_ed."' AND";
	}
	$query =   "SELECT stc.id_c,
				   SUM(stc.total_hours) AS HOURS,
				   vsp.status,
				   vsp.id,
				   accounts.name AS CLIENT,
				   vsp.name AS Project,
				   vsp.practice AS practice,
				   vsp.chargeability,
				   CONCAT(COALESCE(us.first_name, ' '), ' ', us.last_name) AS Reportingmanager,
				   CONCAT(COALESCE(u.first_name, ' '), ' ', u.last_name) AS Employee
			FROM solution_timesheet_cycle stc
			JOIN vedic_solutions_projects vsp ON vsp.id=stc.solution_project
			JOIN users_vedic_solutions_timesheet_1_c uvst ON uvst.users_vedic_solutions_timesheet_1vedic_solutions_timesheet_idb= stc.id_c
			JOIN users u ON u.id = uvst.users_vedic_solutions_timesheet_1users_ida
			LEFT JOIN users us ON us.id = u.reports_to_id
			LEFT JOIN accounts ON accounts.id = vsp.client_id
			JOIN vedic_solutions_timesheet ON vedic_solutions_timesheet.id = stc.id_c
			WHERE ".$dateQuery." vsp.deleted='0'
			  AND vsp.chargeability != 'Billable'
			  AND total_hours > 0
			  AND vedic_solutions_timesheet.deleted = '0'
			GROUP BY u.id,
					 vsp.id";
	$GetContarctROW = $db->query($query);
	
	$CotractArray = Array();
	$CotractTotalArray = Array();
	$AgencyName = '';
	$cnt = 0;
	while ($GetContarctRES = $db->fetchByAssoc($GetContarctROW)) {
		$practice = $GetContarctRES['practice'];
		if($practice == 'ZDefault') {
			$practice = "Default";
		}
		if(!array_key_exists ($GetContarctRES[$filter_id],$CotractArray)) {
			$CotractArray[$GetContarctRES[$filter_id]]['name'] = $GetContarctRES[$filter_id];
		}
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['Employee'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['Reportingmanager'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['Project'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $practice;
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['billing_type'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['chargeability'];
		$CotractArray[$GetContarctRES[$filter_id]]['items'][$cnt][] = $GetContarctRES['HOURS'];
		//Calculate Summary
		$CotractArray[$GetContarctRES[$filter_id]]['total'] += $GetContarctRES['HOURS'];
		++$cnt;
	}
	
	foreach($CotractArray as $contractID => $contractDetails) {
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':G'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$contractDetails['name']);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->getFill()
									  ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
									  ->getStartColor()->setRGB('d2dff1');
		$row =$row+1;
		
		foreach($contractDetails['items'] as $items => $ItemsDetails) {
			array_walk($ItemsDetails, 'utf8_encode');
			$objPHPExcel_sheet->fromArray($ItemsDetails, NULL, 'A' . $row);
			$row =$row+1; 
		}
		
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':F'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,"Total for ".$contractDetails['name']);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$contractDetails['total']);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->getFill()
										->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
										->getStartColor()->setRGB('F2B454');
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row)->getFont()->setBold(true);
		
		$row =$row+1;
	}
	
	//Setting Print area
	$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:G'.$row);
	
	foreach (range('A', 'G') as $col) {
		$objPHPExcel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(true);
	}
	
	$sheet_index = $sheet_index+1;
	
	//REMOVE EMPTY WORKSHEET
	$objPHPExcel->removeSheetByIndex($sheet_index);
	$objPHPExcel->getActiveSheet()->setTitle("Unbilled Time Report");


	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	$dateSeperators = array("/", "-", ".");
	$startDate = str_replace($dateSeperators, "", $startDate);
	$endDate = str_replace($dateSeperators, "", $endDate);
	if($startDate!= '' && $endDate!= '' ) {
		$fileName = "Unbilled Time Report_".$startDate."-".$endDate.".xlsx";
	}
	else {
		$fileName = "Unbilled Time Report.xlsx";
	}
	$path_1 = "custom/vats/vedic_Common/templates/".$fileName;
	if(file_exists($path_1)) {
		unlink($path_1);  // not working
	}

	$objWriter->save($path_1);
	echo $savePath = "$path_1";
	header("Location: ".$path_1)
?>

