<?php
/**
  * FileName => view.list.php
  * Modified By =>Lakshmi Gayathri(Modified On July-14-2018)
  * COMMENT => Custom list view code
  */ 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class vedic_SubmissionsViewList extends ViewList{
	
	function vedic_SubmissionsViewList(){
		parent::ViewList();
	}
	/**
	   * FunctionName => listViewPrepare()
	   * Created By =>Lakshmi Gayathri (Created On May-07-2018)
	   * Modified By =>Lakshmi Gayathri(Modified On May-07-2018)
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
		
		//echo "".$_REQUEST['showdel_basic'];
		 if (!empty($_REQUEST['submittername'])) {

		$submitter = $_REQUEST['submittername'];
		$status = urldecode($submitter);
		$query = "select user_name,id from users where concat(COALESCE(first_name,' '),' ', last_name)='$status' AND deleted=0";
		$result = $db->query($query);
		$result = $db->fetchByAssoc($result);
		
		$user = $result['user_name'];
		$user_id = $result['id'];
		if(isset($_REQUEST['date'])){
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
		
		$this->params['custom_order_by'] = ' , date_entered DESC';
      
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
			// parent::listViewProcess();	
				
				

      
    }
}

?>