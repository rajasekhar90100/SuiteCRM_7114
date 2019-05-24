<?php
/**
  * FileName => view.finance.php
  * Created By =>Maneesha(Created On Dec-20-2018)
  * Modified By =>Maneesha(Modified On Dec-20-2018)
  * COMMENT => custom controller for Finance listview by extending ListView.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class vedic_CandidatesViewFinance extends ViewList
{
	function vedic_CandidatesViewFinance()
	{		
		global $current_user,$db;
		$this->action = "finance";
		parent::ViewList();
 	}
	function listViewProcess()
	{
		/* Custom query to display only Candidates whose stage='Billing' and Status='Active' or status='Active/Project2' */
		$this->params['custom_from'] = ' JOIN  vedic_candidates_vedic_profiles_1_c on vedic_candidates_vedic_profiles_1_c .vedic_candidates_vedic_profiles_1vedic_candidates_ida = 	vedic_candidates.id 
			JOIN vedic_profiles ON vedic_profiles.id = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb
			JOIN vedic_profiles_cstm ON vedic_profiles.id = vedic_profiles_cstm.id_c';
		$where = $this->where;
		if($where=='') {
			$this->params['custom_where'] = ' AND vedic_candidates_vedic_profiles_1_c.deleted=0 AND vedic_profiles_cstm.stage_c="Billing" AND vedic_profiles_cstm.status_c IN( "Active" ,"Active/Project2")';
		}
		else {
			$this->params['custom_where'] = ' AND vedic_candidates_vedic_profiles_1_c.deleted=0 AND vedic_profiles_cstm.stage_c="Billing" AND vedic_profiles_cstm.status_c IN( "Active" ,"Active/Project2") AND '.$where.'';
		}
		parent::listViewProcess();
		/* To remove default action on clear search button and redirect to custom Finance view */
		echo $js = <<<EOT
			<script>		       
				$(".glyphicon-remove").removeAttr("onclick").attr("href", "index.php?action=finance&module=vedic_Candidates&searchFormTab=basic_search&query=true&clear_query=true");
		    </script>
EOT;
	}	
}
?>

