<?php
//require_once("custom/library/sendMail.php");
class JobId{
	function Dynamicid(&$bean, $event, $arguments){
	
		// city capital
		$bean->job_location_c = ucwords($bean->job_location_c); 
		//echo "".$bean->id;		
		if(empty($bean->job_listing_c)){
			$bean->job_listing_c =  htmlentities(nl2br($bean->description));
		}
	
		if(empty($bean->fetched_row['id'])){
			
			$current_date = date("mdy");
			
				$d = date("d");
				$m = date("m");
				$y = date("y");
				$str = str_split($m.$d.$y);
				$jumbledate = $str[0]."".$str[2]."".$str[4]."".$str[5]."".$str[3]."".$str[1];
			
			$poster = $bean->vendor_c;
			//echo "<pre>";
			//print_r($bean);
			//die;
			
			switch ($poster) {
				case "teksystems.com":
					$sql_tek = "SELECT count(*) as count FROM vedic_job inner join vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c 
					WHERE DATE_FORMAT( `date_entered` , '%m%d%y' ) = '".$current_date."' and vendor_c ='".$poster."' and deleted=0";
					$res_tek = $GLOBALS['db']->query($sql_tek);
					$res_tek = $GLOBALS['db']->fetchByAssoc($res_tek);
					$noofjobs = $res_tek['count'];
					if($noofjobs ==0){
						$bean->job_id_c = "TKS-".$jumbledate."-001";
					}else{
						$sl = $noofjobs+1;
						$bean->job_id_c = "TKS-".$jumbledate."-".str_pad($sl, 3, '0', STR_PAD_LEFT);												
					}					
					break;
				case "nttdata.com":
					$sql_nttdata = "SELECT count(*) as count FROM vedic_job inner join vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c 
					WHERE DATE_FORMAT( `date_entered` , '%m%d%y' ) = '".$current_date."' and vendor_c ='".$poster."' and deleted=0";
					$res_nttdata = $GLOBALS['db']->query($sql_nttdata);
					$res_nttdata = $GLOBALS['db']->fetchByAssoc($res_nttdata);
					$noofjobs = $res_nttdata['count'];
					if($noofjobs ==0){
						$bean->job_id_c = "NTD-".$jumbledate."-001";
					}else{
						$sl = $noofjobs+1;
						$bean->job_id_c = "NTD-".$jumbledate."-".str_pad($sl, 3, '0', STR_PAD_LEFT);												
					}					
					break;
				case "experis.com":
					$sql_experis = "SELECT count(*) as count FROM vedic_job inner join vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c 
					WHERE DATE_FORMAT( `date_entered` , '%m%d%y' ) = '".$current_date."' and vendor_c ='".$poster."' and deleted=0";
					$res_experis = $GLOBALS['db']->query($sql_experis);
					$res_experis = $GLOBALS['db']->fetchByAssoc($res_experis);
					$noofjobs = $res_experis['count'];
					if($noofjobs ==0){
						$bean->job_id_c = "EXS-".$jumbledate."-001";
					}else{
						$sl = $noofjobs+1;
						$bean->job_id_c = "EXS-".$jumbledate."-".str_pad($sl, 3, '0', STR_PAD_LEFT);												
					}					
					break;
				case "vedicsoft.com":
					$sql_vedicsoft = "SELECT count(*) as count FROM vedic_job inner join vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c 
					WHERE DATE_FORMAT( `date_entered` , '%m%d%y' ) = '".$current_date."' and vendor_c ='".$poster."' and deleted=0";
					$res_vedicsoft = $GLOBALS['db']->query($sql_vedicsoft);
					$res_vedicsoft = $GLOBALS['db']->fetchByAssoc($res_vedicsoft);
					$noofjobs = $res_vedicsoft['count'];
					if($noofjobs ==0){
						$bean->job_id_c = "VSF-".$jumbledate."-001";
					}else{
						$sl = $noofjobs+1;
						$bean->job_id_c = "VSF-".$jumbledate."-".str_pad($sl, 3, '0', STR_PAD_LEFT);												
					}					
					break;
				default:	
					$sql_jobs = "SELECT count(*) as count FROM vedic_job inner join vedic_job_cstm ON vedic_job.id = vedic_job_cstm.id_c 
					WHERE DATE_FORMAT( `date_entered` , '%m%d%y' ) = '".$current_date."' and (vendor_c NOT IN('vedicsoft.com','teksystems.com','nttdata.com','experis.com') || vendor_c IS NULL || vendor_c = '') and deleted=0";
					
					$res_jobs = $GLOBALS['db']->query($sql_jobs);
					$res_jobs = $GLOBALS['db']->fetchByAssoc($res_jobs);
					$noofjobs = $res_jobs['count'];
					if($noofjobs == 0){
						$bean->job_id_c = "JSG-".$jumbledate."-001";
					}else{
						$sl = $noofjobs+1;
						$bean->job_id_c = "JSG-".$jumbledate."-".str_pad($sl, 3, '0', STR_PAD_LEFT);
					}					
					break;
			}
			
			
			
			//echo "<br>name :".$bean->name;
			//echo "<br>job id :".$bean->job_id_c;
		}
		//die;
	}
}
//SELECT DATE_FORMAT( `date_entered` , '%m-%d-%Y' ) FROM `vedic_job` WHERE DATE_FORMAT( `date_entered` , '%m%d%Y' ) = "04062015"
?>