<?php
/**
  * FileName    => view.list.php
  * Created By  =>Lakshmi(Created On Mar-16-2018)
  * Modified By =>Lakshmi Gayathri(Modified On July-14-2018)
  * COMMENT     => custom listview code for profiles
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');
class vedic_ProfilesViewList extends ViewList {

 	function vedic_ProfilesViewList(){
 		parent::ViewList();
 	}
	/**
		* FunctionName => listViewPrepare()
		* Created By =>Lakshmi Gayathri (Created On May-07-2018)
		* Modified By =>Lakshmi Gayathri(Modified On May-16-2018)
		* COMMENT => To display the listview in descending order based on datemodified field
		*/	
	function listViewPrepare() {   
		if(empty($_REQUEST['orderBy'])) { 

 
			$_REQUEST['orderBy'] = strtoupper('date_modified');            

			$_REQUEST['sortOrder'] = 'desc'; 
        } 
        parent::listViewPrepare(); 
    }
      function listViewProcess() {
        global $current_user,$db;
        $this->processSearchForm();
		if($_REQUEST['date'] =='crmt'){
			 $query = $db->query("select DATE_FORMAT(min(date_entered),'%m/%d/%Y') as first_day from vedic_profiles");
			$result = $db->fetchByAssoc($query);
			$fDate =  $result['first_day'];
			$query = 	$query = $db->query("select DATE_FORMAT(LAST_DAY(NOW()),'%m/%d/%Y') AS last_day");
			$result = $db->fetchByAssoc($query);
			$tDate =  $result['last_day'];
		}
		if($_REQUEST['date'] =='psmt'){
			 $query = $db->query("select DATE_FORMAT(min(date_entered),'%m/%d/%Y') as first_day from vedic_profiles");
			$result = $db->fetchByAssoc($query);
			$fDate =  $result['first_day'];
			$query = $db->query("select DATE_FORMAT(date_add(LAST_DAY(NOW()),interval -1 MONTH),'%m/%d/%Y') AS last_day");
			$result = $db->fetchByAssoc($query);
			$tDate =  $result['last_day'];
		}
		if($_REQUEST['date'] =='crm'){
			$query = $db->query("SELECT DATE_FORMAT(date_add(date_add(LAST_DAY(NOW()),interval 1 DAY),interval -1 MONTH),'%m/%d/%Y') AS first_day");				

			$result = $db->fetchByAssoc($query);
			$fDate =  $result['first_day'];
			$query = $db->query("select DATE_FORMAT(LAST_DAY(NOW()),'%m/%d/%Y') AS last_day");
			$result = $db->fetchByAssoc($query);
			$tDate =  $result['last_day'];
		}
		if($_REQUEST['date'] =='lom'){
			$query = $db->query("SELECT DATE_FORMAT( date_add( date_add( LAST_DAY( NOW() ),interval 1 DAY ),interval -2 MONTH),'%m/%d/%Y') AS first_day");				

			$result = $db->fetchByAssoc($query);
			$fDate =  $result['first_day'];
			$query = $db->query("select DATE_FORMAT(date_add(LAST_DAY(NOW()),interval -1 MONTH),'%m/%d/%Y') AS last_day");
			$result = $db->fetchByAssoc($query);
			$tDate =  $result['last_day'];
		}
		if(($_REQUEST['date'] =='ltm')|| ($_REQUEST['date'] =='lsm') || ($_REQUEST['date'] =='loy')) {
			$query = $db->query("SELECT DATE_FORMAT(NOW(),'%m/%d/%Y') AS last_day");				

			$result = $db->fetchByAssoc($query);
			$tDate =  $result['last_day'];
			if($_REQUEST['date'] =='ltm'){
				$query = $db->query("select DATE_FORMAT(date_add(NOW(),interval -3 MONTH),'%m/%d/%Y') AS first_day");
			}
			if($_REQUEST['date'] =='lsm'){
				$query = $db->query("select DATE_FORMAT(date_add(NOW(),interval -6 MONTH),'%m/%d/%Y') AS first_day");
			}if($_REQUEST['date'] =='loy'){
				$query = $db->query("select DATE_FORMAT(date_add(NOW(),interval -1 YEAR),'%m/%d/%Y') AS first_day");
			}
			$result = $db->fetchByAssoc($query);
			$fDate =  $result['first_day'];
		}
				
 		if (!empty($_REQUEST['stage'])) {
			$stage = $_REQUEST['stage'];
			$status= $_REQUEST['status'];
			if($_REQUEST['mdate']){
				
					$tDate = date("Y-m-d", strtotime($tDate));
					$fDate = date("Y-m-d", strtotime($fDate));
					$mdate = date("m/d/Y", strtotime($result['modifieddate']));
					$this->params['custom_where']=" AND vedic_profiles_cstm.stage_c ='$stage'
									AND vedic_profiles_cstm.status_c = '$status'
									AND vedic_profiles.date_modified IN(select max(vedic_profiles.date_modified) from vedic_profiles as vedic_profiles inner 	join vedic_candidates_vedic_profiles_1_c on vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb=vedic_profiles.id inner join vedic_candidates on vedic_candidates.id =vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida where vedic_profiles.date_modified and vedic_candidates_vedic_profiles_1_c.deleted=0 and vedic_profiles.deleted=0 and vedic_candidates.deleted=0 group by vedic_candidates.id) AND vedic_profiles.date_entered BETWEEN '$fDate' AND '$tDate' ";
					
					echo $this->lv->display();
					
				
				
				
		    }
			else 
			{
		    echo <<<EOT
			    <script>
						$("#search_form_clear_advanced").click();
						$("#stage_c_advanced option[value='$stage']").prop('selected', true);
						$("#status_c_advanced option[value='$status']").prop('selected', true);
						$("#date_entered_advanced_range_choice option[value='between']").prop('selected',true);
						$("#date_entered_advanced_range_choice option[value='between']").change();
						$("#start_range_date_entered_advanced").val("$fDate");
						$("#end_range_date_entered_advanced").val("$tDate");
						$("#search_form_submit_advanced").click();
					
				</script>
EOT;
		   }
		
		}
	
		if (($_REQUEST['candidatestatus'] == "Active"))  {
			$stage = $_REQUEST['candidatestage'];
			$status = $_REQUEST['candidatestatus'];
			$employeetype= $_REQUEST['employeetype'];
		    echo <<<EOT
			    <script>
						$("#search_form_clear_advanced").click();
						$("#stage_c_advanced option[value='$stage']").prop('selected', true);
						$("#status_c_advanced option[value='$status']").prop('selected', true);
						// $("#employee_type_c_advanced option[value='$employeetype']").prop('selected', true);
						$("select[name='employee_type_c_advanced[]'] option[value ='$employeetype']").prop('selected', true);
						$("#date_entered_advanced_range_choice option[value='between']").prop('selected',true);
						$("#date_entered_advanced_range_choice option[value='between']").change();
						$("#start_range_date_entered_advanced").val("$fDate");
						$("#end_range_date_entered_advanced").val("$tDate");
						$("#search_form_submit_advanced").click();
						var candidatestage = "$stage";
						$.cookie("candidatestage", candidatestage);
				</script>
EOT;
		}
		
		if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
			// add myfilters condition in listview -Lakshmigayathri -July-14-2018
			$this->lv->ss->assign('savedSearchData', $this->searchForm->getSavedSearchData());
			 // add recurring_source field to filter to be able acl check to use it on row level
            $this->lv->mergeDisplayColumns = true;
            $filterFields = array('recurring_source' => 1);
			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }
	
}

?>
