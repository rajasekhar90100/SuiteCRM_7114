<?php
session_start();
$reload = $_POST['reload'];

if(empty($_SESSION["tab_num"])){
	$_SESSION["tab_num"] = 0;
}

if(in_array($reload,$_SESSION["reload_check"])){
	echo "<script>
		window.location.href = 'http://vats.vedicsoft.com/index.php?module=vedic_Candidates&action=reportcandidates';
	</script>";
	die("");
}else{
	$_SESSION["reload_check"][$_SESSION["tab_num"]] = $reload;
	$_SESSION["tab_num"]++;
}
//	echo "<pre>";

	
	
	
	echo " ";
	 $valid_from_c = $_POST['from_c'];  //mmddyyy
	 $valid_to_c = $_POST['to_c'];
	
	$from = explode('/',$valid_from_c);
	$fdate = $from[1].'-'.$from[0].'-'.$from[2];  	//dd-mm-yyyy
	//$fdateddmy = $from[1].'/'.$from[0].'/'.$from[2];  	//dd/mm/yyyy
	$to = explode('/',$valid_to_c);
	$tdate = $to[1].'-'.$to[0].'-'.$to[2];  	//dd-mm-yyyy
	$yyyymmdd = $from[2].'-'.$from[0].'-'.$from[1]; 
	
	
	echo "<br> ";
	 $week = date('W', strtotime($yyyymmdd));
	$year = date('Y', strtotime($yyyymmdd));
	$week = str_pad($week, 2, "0", STR_PAD_LEFT);
	$date1 = date( "d-m-Y", strtotime($year."W".$week."1") ); // First day of week
	$date2 = date( "d-m-Y", strtotime($year."W".$week."7") ); // Last day of week
	$date3 = date('01-m-Y', strtotime($yyyymmdd)); // First day of the month.
	$date4 = date('t-m-Y', strtotime($yyyymmdd)); // Last day of the month.
	$date5 = date('01-01-Y', strtotime($yyyymmdd)); // First day of the year.
	$date6 = date('31-12-Y', strtotime($yyyymmdd)); // Last day of the year.
	
	//echo "<br><br> ".
	$date1."-".$date2." -- ".$date3."-".$date4."--".$date5."-".$date6;
	
	
	// Default/Week Report 	
	//echo "<br><br> ";
	//echo "  Report for the ";
	
	$date_from = date("Y-m-d", strtotime($fdate));
	$date_to = date("Y-m-d", strtotime($tdate));
	
	$showmonth = 0;  $weekdesc = ""; $weekperiod = "Selected period";
	if(empty($valid_to_c)){
		$date_from = date("Y-m-d", strtotime($date1));
		$date_to = date("Y-m-d", strtotime($date2));
		$showmonth = 1;		
		$weekdesc = "(Week $week)"; $weekperiod = "Week";
	}
	$datefrom = "'".$date_from." 00:00:00'";
	$dateto = "'".$date_to." 23:59:59'";
	$date = "(date_modified BETWEEN $datefrom AND $dateto)";
	
	 $candidates_sql = "SELECT stage_c, status, first_name, last_name FROM vedic_candidates inner join vedic_candidates_cstm on vedic_candidates.id = vedic_candidates_cstm.id_c WHERE deleted=0 and ".$date." ";
	//echo "<br>Below Stats lies date_modified in between ".date("m/d/Y",strtotime($date_from))." and ".date("m/d/Y",strtotime($date_to));
	
	$billing_active=0; $billing_starts=0;  $billing_rolloffs=0;   $billing_rollouts=0; $marketing_active=0;
	//Active  Start Rolloff
	$candidates_res = $GLOBALS['db']->query($candidates_sql);
	while($row = $GLOBALS['db']->fetchByAssoc($candidates_res))	{
		if($row['stage_c'] == "Billing"  && $row['status'] == "Active"){
			$billing_active = $billing_active +1;
		}else if($row['stage_c'] == "Billing"  && $row['status'] == "Start"){
			$billing_starts = $billing_starts +1;
		}else if($row['stage_c'] == "Billing"  && $row['status'] == "Rolloff"){
			$billing_rolloffs = $billing_rolloffs +1;
		}else if($row['stage_c'] == "Billing"  && $row['status'] == "Rollout"){
			$billing_rollouts = $billing_rollouts +1;
		}else if($row['stage_c'] == "Marketing"  && $row['status'] == "Active"){
			$marketing_active = $marketing_active+1;
		}
	}
	/*
		echo "<br><br> Total No.of Billing and Actives are ".$billing_active;
		echo "<br> Total No.of Billing and Starts are ".$billing_starts;
		echo "<br> Total No.of Billing and Rolloffs are ".$billing_rolloffs;
		echo "<br> Total No.of Billing and Rollouts are ".$billing_rollouts;
		echo "<br> Total No.of Marketing and Actives are ".$marketing_active;
	*/	
	//if($showmonth){
		// Month Report 
		//echo "<br><br> ";	
		//echo " Month Report ";
		
		$month_from = date("Y-m-d", strtotime($date3));
		$monthfrom = "'".$month_from." 00:00:00'";
		
		$month_to = date("Y-m-d", strtotime($date4));
		$monthto = "'".$month_to." 23:59:59'";
		$monthdate = "(date_modified BETWEEN $monthfrom AND $monthto)";
		
		$candidates_sql2 = "SELECT stage_c, status, first_name, last_name FROM vedic_candidates inner join vedic_candidates_cstm on vedic_candidates.id = vedic_candidates_cstm.id_c WHERE deleted=0 and ".$monthdate." ";
		//echo "<br>Below Stats lies date_modified in between ".date("m/d/Y",strtotime($month_from))." and ".date("m/d/Y",strtotime($month_to));
		
		$mbilling_active=0; $mbilling_starts=0;  $mbilling_rolloffs=0;   $mbilling_rollouts=0; $mmarketing_active=0;
		//Active  Start Rolloff
		$candidates_res2 = $GLOBALS['db']->query($candidates_sql2);
		while($row2 = $GLOBALS['db']->fetchByAssoc($candidates_res2))	{
			if($row2['stage_c'] == "Billing"  && $row2['status'] == "Active"){
				$mbilling_active = $mbilling_active +1;
			}else if($row2['stage_c'] == "Billing"  && $row2['status'] == "Start"){
				$mbilling_starts = $mbilling_starts +1;
			}else if($row2['stage_c'] == "Billing"  && $row2['status'] == "Rolloff"){
				$mbilling_rolloffs = $mbilling_rolloffs +1;
			}else if($row2['stage_c'] == "Billing"  && $row2['status'] == "Rollout"){
				$mbilling_rollouts = $mbilling_rollouts +1;
			}else if($row2['stage_c'] == "Marketing"  && $row2['status'] == "Active"){
				$mmarketing_active = $mmarketing_active+1;
			}
		}
		/*
			echo "<br><br> Total No.of Billing and Actives are ".$mbilling_active;
			echo "<br> Total No.of Billing and Starts are ".$mbilling_starts;
			echo "<br> Total No.of Billing and Rolloffs are ".$mbilling_rolloffs;
			echo "<br> Total No.of Billing and Rollouts are ".$mbilling_rollouts;
			echo "<br> Total No.of Marketing and Actives are ".$mmarketing_active;
		*/
	//}
	
	// Year Report 
	//echo "<br><br> ";
	//echo " Year Report ";
	
	$year_from = date("Y-m-d", strtotime($date5));
	$yearfrom = "'".$year_from." 00:00:00'";
	
	$year_to = date("Y-m-d", strtotime($date6));
	$yearto = "'".$year_to." 23:59:59'";
	$yeardate = "(date_modified BETWEEN $yearfrom AND $yearto)";
	
	 $candidates_sql3 = "SELECT stage_c, status, first_name, last_name FROM vedic_candidates inner join vedic_candidates_cstm on vedic_candidates.id = vedic_candidates_cstm.id_c WHERE deleted=0 and ".$yeardate." ";
	//echo "<br>Below Stats lies date_modified in between ".date("m/d/Y",strtotime($year_from))." and ".date("m/d/Y",strtotime($year_to));
	
	$ybilling_active=0; $ybilling_starts=0;  $ybilling_rolloffs=0;   $ybilling_rollouts=0; $ymarketing_active=0;
	//Active  Start Rolloff
	$candidates_res3 = $GLOBALS['db']->query($candidates_sql3);
	while($row3 = $GLOBALS['db']->fetchByAssoc($candidates_res3))	{
		if($row3['stage_c'] == "Billing"  && $row3['status'] == "Active"){
			$ybilling_active = $ybilling_active +1;
		}else if($row3['stage_c'] == "Billing"  && $row3['status'] == "Start"){
			$ybilling_starts = $ybilling_starts +1;
		}else if($row3['stage_c'] == "Billing"  && $row3['status'] == "Rolloff"){
			$ybilling_rolloffs = $ybilling_rolloffs +1;
		}else if($row3['stage_c'] == "Billing"  && $row3['status'] == "Rollout"){
			$ybilling_rollouts = $ybilling_rollouts +1;
		}else if($row3['stage_c'] == "Marketing"  && $row3['status'] == "Active"){
			$ymarketing_active = $ymarketing_active+1;
		}
	}
	/*
		echo "<br><br> Total No.of Billing and Actives are ".$ybilling_active;
		echo "<br> Total No.of Billing and Starts are ".$ybilling_starts;
		echo "<br> Total No.of Billing and Rolloffs are ".$ybilling_rolloffs;
		echo "<br> Total No.of Billing and Rollouts are ".$ybilling_rollouts;
		echo "<br> Total No.of Marketing and Actives are ".$ymarketing_active;
	*/
	$ybiillactivrolloffs = $ybilling_active+$ybilling_rolloffs;
	echo "	<style type='text/css'>
			.myTable { background-color:#eee;border-collapse:collapse;  margin: auto;}
			.myTable th { background-color:#eee;color:black; }
			.myTable td, .myTable th { padding:5px;border:1px solid #111; }
			</style>";
	
	
	//round(5.045, 2); 
		$billingstartavg = round($ybilling_starts/$week, 2);
		$billingrolloutsavg = round($ybilling_rollouts/$week,2);
		
		$targettotal = 361;
		$totalfrompreviousyear = 301;		
		$targetperyear = $ybiillactivrolloffs-$totalfrompreviousyear;
		$targetnet = $targettotal-$totalfrompreviousyear;
		
		echo "<table  class='myTable'> 	
						<tr > <th colspan=6> Consultants summary between ".date("m/d/Y",strtotime($date_from))." and ".date("m/d/Y",strtotime($date_to))."   </th>  </tr>
						<tr ><th >  ".date("m/d/Y",strtotime($date_from))." <br />
								".date("m/d/Y",strtotime($date_to))." <br>
								$weekdesc  </th>
						<th >  	$weekperiod </th>
						<th >  	Month to date </th>
						<th >  	Year to date</th>
						<th >	Current run rate/week </th>
						<th >	Net for year </th> </tr>";
		echo "<tr >		<td>Billing/Starts </td> 
						<td> $billing_starts </td> 
						<td> $mbilling_starts</td> 
						<td> $ybilling_starts</td>
						<td> $billingstartavg</td>
						<td rowspan=5> ".$targetperyear." </td> <tr />";
		echo "<tr >		<td>Billing/Rollouts</td> 
						<td> $billing_rollouts</td> 
						<td> $mbilling_rollouts</td> 
						<td> $ybilling_rollouts</td>
						<td> $billingrolloutsavg</td>
						 <tr />";
		echo "<tr >		<td>Billing/Active+Rolloffs</td> 
						<td colspan=3> $ybiillactivrolloffs</td> 
						 <td> </td>
						 <tr />";
		echo "<tr >		<td>Marketing/Active </td> 
						<td colspan=3> $ymarketing_active </td> 
						<th align='left'> Previous Year: $totalfrompreviousyear   Target Total: $targettotal 								
						</th>
						<th> Target Net: $targetnet</th>
						 </tr> <table /> ";				
						
						
						
	
	
	
	
	
//	print_r($_POST);
	die;