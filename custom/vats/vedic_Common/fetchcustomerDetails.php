<?php 
/**
	* FileName => fetchcustomerDetails.php
	* Modified By => Maneesha (Modified On Apr-29-2018)
	* COMMENT => changed select query to get the customer details from Profiles module.
	*/


ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('modules/vedic_Immigration/vedic_Immigration.php');
header("Content-type:application/json");

global $db,$timedate,$current_user;

$projectID = $_REQUEST['projectID'];
$candidateID = $_REQUEST['candidateID'];

$select_query2 ="select vedic_profiles_project_1project_idb as projectID from vedic_profiles_project_1_c
where vedic_profiles_project_1vedic_profiles_ida = '$candidateID' and vedic_profiles_project_1_c.deleted = '0'";

$select_result2 = $db->query($select_query2);
while($select_row2 = $db->fetchByAssoc($select_result2))
{
	$projectData[] = $select_row2['projectID'];
}

//$GLOBALS['log']->fatal($projectData);
	if(in_array($projectID,$projectData))
	{
		$select_query = "select project.name as projectName, project.id as projectID, project.estimated_start_date as startDate, project.estimated_end_date as endDate from project
			WHERE project.id = '$projectID'";
			
			$select_account = "select accounts.name as customerName, accounts.id as customerID, 
			accounts.billing_address_city as billingCity,accounts.billing_address_state as billingState from accounts INNER JOIN project_cstm
			ON accounts.id = project_cstm.account_id_c
			INNER JOIN project ON
			project.id = project_cstm.id_c
			WHERE project.id = '$projectID'";
			$result_account = $db->query($select_account);
			$row_account = $db->fetchByAssoc($result_account);

			$select_result = $db->query($select_query);
			$select_row =  $db->fetchByAssoc($select_result);
			//$GLOBALS['log']->fatal($select_row);

			if(!empty($select_result))
			{
				$customerName = $row_account['customerName'];
				$customerID = $row_account['customerID'];
				$billingCity = $row_account['billingCity'];
				$billingState = $row_account['billingState'];
				$projectName = $select_row['projectName'];
				$projectID = $select_row['projectID'];
				$startDate = $select_row['startDate'];				
				$endDate = $select_row['endDate'];
				
				$dateFormat = $current_user->getPreference("datef");
					if($dateFormat == 'Y-m-d'){
					
					$startDate = date('Y-m-d',strtotime($startDate));
					$endDate = date('Y-m-d',strtotime($endDate));
				}
				if($dateFormat == 'd-m-Y'){
					
					$startDate = date('d-m-Y',strtotime($startDate));
					$endDate = date('d-m-Y',strtotime($endDate));
				}
				if($dateFormat == 'm-d-Y'){
					
					$startDate = date('m-d-Y',strtotime($startDate));
					$endDate = date('m-d-Y',strtotime($endDate));
				}
				if($dateFormat == 'm/d/Y'){
					
					$startDate = date('m/d/Y',strtotime($startDate));
					$endDate = date('m/d/Y',strtotime($endDate));
				}
				if($dateFormat == 'd/m/Y'){
					
					$startDate = date('d/m/Y',strtotime($startDate));
					$endDate = date('d/m/Y',strtotime($endDate));
				}
				if($dateFormat == 'Y/m/d'){
					
					$startDate = date('Y/m/d',strtotime($startDate));
					$endDate = date('Y/m/d',strtotime($endDate));
				}
				if($dateFormat == 'd.m.Y'){
					
					$startDate = date('d.m.Y',strtotime($startDate));
					$endDate = date('d.m.Y',strtotime($endDate));
				}
				if($dateFormat == 'm.d.Y'){
					
					$startDate = date('m.d.Y',strtotime($startDate));
					$endDate = date('m.d.Y',strtotime($endDate));
				}
				
				if($dateFormat == 'Y.m.d'){
					
					$startDate = date('Y.m.d',strtotime($startDate));
					$endDate = date('Y.m.d',strtotime($endDate));
				}	
				
				// if(strtotime($startDate))
				// {
					// $startDate = date('m/d/Y',strtotime($startDate));					
				// }
				// else
				// {
					// $startDate = '';
				// }
				
				// if(strtotime($endDate))
				// {
					// $endDate = date('m/d/Y',strtotime($endDate));
				// }
				// else
				// {
					// $endDate = '';
				// }
				
				if(empty($billingCity) || is_null($billingCity))
				{
					$billingCity = '';
				}
				if(empty($customerName) || is_null($customerName))
				{
					$customerName = '';
				}
				if(empty($customerID) || is_null($customerID))
				{
					$customerID = '';
				}
				if(empty($projectName) || is_null($projectName))
				{
					$projectName = '';
				}
				if(empty($projectID) || is_null($projectID))
				{
					$projectID = '';
				}
				if(empty($billingState) || is_null($billingState))
				{
					$billingState = '';
				}

				if(empty($billingCity))
				{
					$billingLocation = $billingState;
				}
				else if(empty($billingState))
				{
					$billingLocation = $billingCity;
				}
				else if(empty($billingCity) && empty($billingState))
				{
					$billingLocation = '';
				}
				else
				{
				$billingLocation = $billingCity.', '.$billingState;
				}

				$data = array($customerName,$customerID,$billingLocation,$projectName,$projectID,$startDate,$endDate);
			
			}
	}
	else
	{
		$varN = "NotMatched";
		$GLOBALS['log']->fatal("NotMatched");
		$data = array($varN);
	}
$projectData = json_encode($data);
echo $projectData;

?>