<?php
/**
  * FileName => view.list.php
  * Modified By => Udaykiran(Modified On Jul-14-2018)
  * COMMENT => custom listview code for candidates
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');
class vedic_CandidatesViewList extends ViewList {

 	function vedic_CandidatesViewList(){
		global $current_user,$db;
		if($current_user->title == "Consultant"){
			//custom query
			$getid = "select id_c from vedic_candidates_cstm where consultant_user_id_c='".$current_user->id."'";
			$rs = $db->query($getid) or die('query not working candidate list view');
			$recordid='';
			while ($row = $db->fetchByAssoc($rs)) {
					$recordid = $row['id_c'];
			}
			if(strlen($recordid)==0){
				SugarApplication::redirect('index.php?module=Home');
			}else{			
				SugarApplication::redirect('index.php?module=vedic_Candidates&offset=1&action=DetailView&record='.$recordid);
			}
		}
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
		if(isset($_REQUEST['date'])){
			if($_REQUEST['date'] =='crmt'){
				 $query = $db->query("select DATE_FORMAT(min(date_entered),'%m/%d/%Y') as first_day from vedic_candidates");
				$result = $db->fetchByAssoc($query);
				$fDate =  $result['first_day'];
				$query = 	$query = $db->query("select DATE_FORMAT(LAST_DAY(NOW()),'%m/%d/%Y') AS last_day");
				$result = $db->fetchByAssoc($query);
				$tDate =  $result['last_day'];
			}
			if($_REQUEST['date'] =='lomt'){
				 $query = $db->query("select DATE_FORMAT(min(date_entered),'%m/%d/%Y') as first_day from vedic_candidates");
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
		}
		
 		if (!empty($_REQUEST['stage'])) {
			$stage = $_REQUEST['stage'];
			$status= $_REQUEST['status'];
		    echo <<<EOT
			    <script>
						$("#search_form_clear_advanced").click();
						$("#stage_c_advanced option[value='$stage']").prop('selected', true);
						$("#status_advanced option[value='$status']").prop('selected', true);
						$("#date_entered_advanced_range_choice option[value='between']").prop('selected',true);
						$("#date_entered_advanced_range_choice option[value='between']").change();
						$("#start_range_date_entered_advanced").val("$fDate");
						$("#end_range_date_entered_advanced").val("$tDate");
						$("#search_form_submit_advanced").click();
					
				</script>
EOT;
		}		
		if (!empty($_REQUEST['user_name'])) {
			$status = $_REQUEST['user_name'];
			$status =urldecode($status);
			$query = "select user_name,id from users where concat(COALESCE(first_name,' '),' ', last_name)='$status' AND deleted=0";
			$result = $db->query($query);
			$result = $db->fetchByAssoc($result);
			
			$user = $result['user_name'];
			$user_id = $result['id'];
			
			
		    echo <<<EOT
			    <script>
						$("#search_form_clear_advanced").click();
						$("#created_by_name_advanced").val("$user");
						$("#created_by_advanced").val("$user_id");
						$("#date_entered_advanced_range_choice option[value='between']").prop('selected',true);
						$("#date_entered_advanced_range_choice option[value='between']").change();
						$("#start_range_date_entered_advanced").val("$fDate");
						$("#end_range_date_entered_advanced").val("$tDate");
						$("#search_form_submit_advanced").click();
					
				</script>
EOT;
		}
		//Code to display the records based on security groups Solutions,Opeartions added by ::Udaykiran 22-May-2018
		$usertype = $current_user->is_admin;
		$securitygroup = new SecurityGroup();
		$groups = $securitygroup->getUserSecurityGroups($GLOBALS['current_user']->id);
		$Solutions = $securitygroup->retrieve_by_string_fields(array('name'=>'Solutions','deleted'=>0));
		$SolutionsID = $Solutions->id;
		$Operations = $securitygroup->retrieve_by_string_fields(array('name'=>'Operations','deleted'=>0));
		$OperationsID = $Operations->id;
		$Hiring = $securitygroup->retrieve_by_string_fields(array('name'=>'Hiring','deleted'=>0));	
		$HiringID = $Hiring->id;	
		if(in_array($SolutionsID, array_keys($groups)) && $usertype==0){
			if(in_array($OperationsID, array_keys($groups))){
				
			} else{
				$this->params['custom_where'] =	" AND type_hiring IN('Savantis_US','Savantis_IN')";
			}
		}
		if(in_array($OperationsID, array_keys($groups)) && $usertype==0){
			if(in_array($HiringID, array_keys($groups))){
				$this->params['custom_where'] =	" AND type_hiring IN('Us_staffing','Savantis_US')";
			}else if(in_array($SolutionsID, array_keys($groups))){
				
			}else{
				$this->params['custom_where'] =	" AND type_hiring IN('Us_staffing')";
			}
		}
		//End of Code to display the records based on security groups Solutions,Opeartions Modified by ::Udaykiran 04-Jun-2018
		
		if(empty($_REQUEST['candidatefillter_advanced'])){
		
		}else if(!empty($_REQUEST['candidatefillter_advanced'])){
			$this->params['custom_where'] = ' or vedic_candidates.deleted=1';
		}
		if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
			 // add myfilters condition in listview -Lakshmigayathri -May-30-2018
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