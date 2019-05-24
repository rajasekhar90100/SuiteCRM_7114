<?php
session_start();
$reload = $_POST['reload'];

if(empty($_SESSION["tab_num"])){
	$_SESSION["tab_num"] = 0;
}

if(in_array($reload,$_SESSION["reload_check"])){
	echo "<script>
		window.location.href = 'http://vats.vedicsoft.com/index.php?module=vedic_Submissions&action=reportsubmissions';
	</script>";
	die("");
}else{
	$_SESSION["reload_check"][$_SESSION["tab_num"]] = $reload;
	$_SESSION["tab_num"]++;
}
//	
	$valid_from_c = $_POST['from_c'];
	$valid_to_c = $_POST['to_c'];
	//print_r($_POST['assigned_user_id']);
	$userlist = " 1=1";
	$showgrand =1;
	if(!empty($_POST['assigned_user_id'])  ){
		$users = implode("','",$_POST['assigned_user_id']);
		$userlist = " users.id IN ('".$users."')";
		$showgrand =0;
	}
	
	echo "<br>";
	$from = explode('/',$valid_from_c);
	$fdate = $from[1].'-'.$from[0].'-'.$from[2];   
	$yyyymmdd = $from[2].'-'.$from[0].'-'.$from[1]; 
	$to = explode('/',$valid_to_c);
	$tdate = $to[1].'-'.$to[0].'-'.$to[2]; 
	
	$week = date('W', strtotime($yyyymmdd));
	$year = date('Y', strtotime($yyyymmdd));
	$week = str_pad($week, 2, "0", STR_PAD_LEFT);
	$date1 = date( "d-m-Y", strtotime($year."W".$week."1") ); // First day of week
	$date2 = date( "d-m-Y", strtotime($year."W".$week."7") ); // Last day of week
	
	$date_from = date("Y-m-d", strtotime($fdate));
	$date_to = date("Y-m-d", strtotime($tdate));
	
	$showmonth = 0; $weekdesc = "";
	if(empty($valid_to_c)){
		$date_from = date("Y-m-d", strtotime($date1));
		$date_to = date("Y-m-d", strtotime($date2));
		$showmonth = 1;  $weekdesc = "(Week $week)";
	}
	$datefrom = "'".$date_from." 00:00:00'";
	$dateto = "'".$date_to." 23:59:59'";
	$date = "(date_modified BETWEEN $datefrom AND $dateto)";
	
	
/* 	$query = "";
	$date_from = date("Y-m-d", strtotime($date1));
	$datefrom = "'".$date_from." 00:00:00'";
	$query .= " and vedic_candidates.date_modified >= '$date_from' ";
	$date_to = date("Y-m-d", strtotime($date2));
	$dateto = "'".$date_to." 23:59:59'";
	$query .= " and vedic_candidates.date_modified <= '$date_to' "; */
	
	//$date = "(date_modified >= $datefrom date_modified <= $dateto)";
	$date = "(date_modified BETWEEN $datefrom AND $dateto)";
	
	/* $teammembers_sql = "SELECT users.id, users.first_name, users.last_name  FROM users  
			INNER JOIN acl_roles_users ON users.id = acl_roles_users.user_id 
			INNER JOIN acl_roles ON acl_roles.id = acl_roles_users.role_id 
			AND acl_roles.name = 'Team Member' AND users.deleted =0 
			AND acl_roles.deleted =0 AND acl_roles_users.deleted =0 order by first_name";
	*/
	
	$teammembers_sql = "SELECT DISTINCT (users.id), users.first_name, users.last_name FROM vedic_submissions
							LEFT JOIN vedic_submissions_cstm ON vedic_submissions.id = vedic_submissions_cstm.id_c
							LEFT JOIN users ON users.id = vedic_submissions.assigned_user_id
							WHERE users.deleted =0	and $userlist UNION 
						SELECT users.id, users.first_name, users.last_name  FROM users  
							INNER JOIN acl_roles_users ON users.id = acl_roles_users.user_id 
							INNER JOIN acl_roles ON acl_roles.id = acl_roles_users.role_id 
							AND acl_roles.name = 'Team Member' AND users.deleted =0 
							AND acl_roles.deleted =0 AND acl_roles_users.deleted =0 and $userlist order by first_name";
	//echo $teammembers_sql;
	$teammembers_res = $GLOBALS['db']->query($teammembers_sql);
		
	$i=1;
	
	
	echo "	<style type='text/css'>
			.myTable { background-color:#eee;border-collapse:collapse; margin: auto; }
			.myTable th { background-color:#eee;color:black; }
			.myTable td, .myTable th { padding:5px;border:1px solid #111; }
			</style>";
	
	echo "<table class='myTable' > <th colspan=5> Summary of Submissions between ".date("m/d/Y",strtotime($date_from))." and ".date("m/d/Y",strtotime($date_to))." $weekdesc</th>";
	echo "<tr > <th>Sl.No</th> <th>Submitter Name</th> <th>Assigned Candidates</th> <th>Assigned Jobs</th> <th>Submissions</th> </tr>";
	$totalcand = 0; $totaljobs = 0; $totalsubm = 0;
	while($row = $GLOBALS['db']->fetchByAssoc($teammembers_res)){
	
		// No of Candidates
		$candidates_sql ="SELECT count(*) as assignedcandidates from vedic_candidates where vedic_candidates.assigned_user_id= '".$row['id']."' and deleted =0 and ".$date;
		$candidates_res = $GLOBALS['db']->query($candidates_sql);
		$candidates_row = $GLOBALS['db']->fetchByAssoc($candidates_res);
		
		// No of Jobs	
		$jobs_sql ="SELECT count(*) as assignedjobs from vedic_job where vedic_job.assigned_user_id= '".$row['id']."' and deleted =0 and ".$date;
		$jobs_res = $GLOBALS['db']->query($jobs_sql);
		$jobs_row = $GLOBALS['db']->fetchByAssoc($jobs_res);
		
		// No of Submissions
		$submissions_sql ="SELECT count(*) as assignedsubmissions from vedic_submissions where vedic_submissions.assigned_user_id= '".$row['id']."' and deleted =0 and ".$date;
		$submissions_res = $GLOBALS['db']->query($submissions_sql);
		$submissions_row = $GLOBALS['db']->fetchByAssoc($submissions_res);

		echo "<tr> <td>".$i."</td> 	<td> ".$row['first_name']." ".$row['last_name']." </td> 
									<td>".$candidates_row['assignedcandidates']."</td> 
									<td>".$jobs_row['assignedjobs']."</td>
									<td>".$submissions_row['assignedsubmissions']." </td> 
				</tr>
				
				";
		
		
		$i++;  $totalcand = $totalcand+ $candidates_row['assignedcandidates']; 
		$totaljobs = $totaljobs+ $jobs_row['assignedjobs']; 
		$totalsubm = $totalsubm+ $submissions_row['assignedsubmissions']; 
		
		
	}
	
	$grand_sql = "SELECT (SELECT COUNT(*) FROM vedic_candidates_cstm LEFT JOIN vedic_candidates on vedic_candidates_cstm.id_c = vedic_candidates.id WHERE vedic_candidates.deleted=0) as candidatescount,
							(SELECT COUNT(*) FROM vedic_job_cstm LEFT JOIN vedic_job on vedic_job_cstm.id_c = vedic_job.id WHERE vedic_job.deleted=0) as jobscount,
							(SELECT COUNT(*) FROM vedic_submissions LEFT JOIN vedic_submissions_cstm ON vedic_submissions_cstm.id_c = vedic_submissions.id where deleted=0) as submissioncount";
							
 		$grand_res = $GLOBALS['db']->query($grand_sql);
		$grand_row = $GLOBALS['db']->fetchByAssoc($grand_res);
	
	
		$gtotalcand = $grand_row['candidatescount'];
		$gtotaljobs = $grand_row['jobscount'];
		$gtotalsubm = $grand_row['submissioncount'];
	echo "	<tr> <td colspan=2> Total </td> <td>".$totalcand."</td> <td>".$totaljobs."</td> <td>".$totalsubm."</td> </tr>
			<tr> <td colspan=2> Overall Totals </td> <td> $gtotalcand </td> <td> $gtotaljobs</td> <td> $gtotalsubm </td> </tr>
		</table>";
	
	
	
//	print_r($_POST);
	die;