<?php
/**
  * FileName => addProjectData.php
  * Created By => Udaykiran (Created On Apr-04-2018)
  * Modified By => Maneesha (Modified On May-08-2018)
  * COMMENT => Code to update the Project data in Profiles
  */
  error_reporting(-1);
  
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class AddProject{
	/**
	  * Function => addProject()
	  * Created By => Udaykiran (Created On Apr-04-2018)
      * Modified By => Maneesha (Modified On May-08-2018)
      * COMMENT => Code to update the Project data in Profiles
	  */
	function addProject(&$bean, $event, $arguments) {
		global $db, $current_user;
		$profilePOEndDate = $bean->po_end_date_c;
		$profileEndDate = date_format(date_create($profilePOEndDate),'Y-m-d');
		if($arguments['related_module'] == 'Project'){
			$beanID = $bean->id;
			$project = $arguments['related_bean']->id;
			$pStartDate = $arguments['related_bean']->estimated_start_date;
			$pStartDate = date_format(date_create($pStartDate),'Y-m-d');
			$pEndDate = $arguments['related_bean']->estimated_end_date;
			$pEndDate = date_format(date_create($pEndDate),'Y-m-d');
			$poEndDate = $arguments['related_bean']->po_enddate;
			$poEndDate = date_format(date_create($poEndDate),'Y-m-d');
			$pChannelClint = $arguments['related_bean']->account_id_c;
			$query = $db->query("Select name from accounts where id ='$pChannelClint' and deleted = '0'");
			$result = $db->fetchByAssoc($query);
			$pChannelClintName = $result['name'];
			$bean->project_start_date_c = $pStartDate;
			$bean->project_end_date_c = $pEndDate;
			$bean->account_id1_c = $pChannelClint;
			$bean->channel_client_c = $pChannelClintName;
			$bean->rolloff_date = $pEndDate;
			if($profileEndDate != 	$poEndDate){
			    $bean->po_end_date_c = $poEndDate;
			}
		}
	}
	/**
	  * Function => deleteProject()
	  * Created By => Udaykiran (Created On Apr-04-2018)
	  * Modified By => Udaykiran (Modified On Apr-04-2018)
	  * COMMENT => Function to delete the data of projects from profile when the relation ship is deleted between the project and profile
	  */
	function deleteProject(&$bean, $event, $arguments) {
		global $db, $current_user;
		if($arguments['related_module'] == 'Project'){
			$beanID = $bean->id;
			$bean->account_id1_c = '';
			$bean->project_start_date_c = '';
			$bean->project_end_date_c = '';
			$bean->rolloff_date = '';
			$bean->po_end_date_c = '';
			$query="UPDATE vedic_profiles_cstm vpc JOIN vedic_profiles vp ON vp.id = vpc.id_c SET vpc.project_start_date_c   =NULL ,vpc.account_id1_c = NULL ,vp.rolloff_date=NULL,vpc.po_end_date_c=NULL WHERE vp.deleted='0' AND  id='$beanID'";
			$result = $db->query($query);
		}
	}
}