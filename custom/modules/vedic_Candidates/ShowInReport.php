<?php
/**
  * FileName => ShowInReport.php
  * Created By => Udaykiran (Created On Jan-31-2018)
  * Modified By => Udaykiran (Modified On Jan-31-2018)
  * COMMENT => Code to update the show in report value of the candidate based on stage and status
  */
if(!defined("sugarEntry") || !sugarEntry) die("Not A Valid Entry Point");

class ShowInReport {
    function showIn(&$bean, $event, $arguments) {
		global $db, $current_user,$app_list_strings,$sugar_config;
		$currentUser = $current_user->id;
		$canId=$bean->id;		
		$canName = $bean->name;
		$status = $bean->status;
		$stage = $bean->stage_c;
		$marketable = $bean->is_marketable_c;
		if($stage == 'Billing')
		{
			if($status == "Rolloff" || $status == "Start")
			{
				$showInReport = "^6^,^1^";
			}
			if($status == "Active" && $marketable == 0)
			{
				$showInReport = "^1^";
			}
			if($status == "Active" && $marketable == 1)
			{
				$showInReport = "^6^,^1^";
			}
		}	
		if($stage == 'Marketing')
		{
			if($status == "Start"||$status == "Active")
			{
				$showInReport = "^6^,^1^";
			}
		}
		$query = $db->query("update vedic_candidates_cstm set show_in_report_c = '$showInReport' where id_c = '$canId'");
		
	}
}
