<?php
/*   
    * FileName => financereportcsv.php
	* Created By => Rajasekhar Reddy(Created On Oct-31-2017)
	* Modified By => Rajasekhar Reddy(Created On Nov-01-2017)
	* COMMENT => Export the Finance report to CSV
    */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
ini_set('zlib.output_compression', 'Off');
error_reporting(E_ALL);
ob_start();
require_once('include/export_utils.php');
global $sugar_config,$db,$locale,$current_user,$app_list_strings;
$the_module = clean_string($_REQUEST['module']);
$count=1;

if($sugar_config['disable_export'] 	|| (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($the_module)  && ACLAction::getUserAccessLevel($current_user->id,$the_module, 'access') == ACL_ALLOW_ENABLED &&
    (ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN ||
     ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV))))){
	die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
}
//check to see if this is a request for a sample or for a regular export
$filename = $_REQUEST['module'];
//use label if one is defined
if(!empty($app_list_strings['moduleList'][$_REQUEST['module']])){
    $filename = $app_list_strings['moduleList'][$_REQUEST['module']];
}
$content ='"S.No","Project Name","Project Start Date","Project End Date","POC","W2CTC","Consultant Name","Consultant Email","Consultant Phone","Client Name","End Client","PLM","Bill Rate","OT Rate","Expenses Rate","Bonus","Location","End Billtime","Timesheet Schedule';
$content.= "\"\r\n";
$query = "select project.name as 'ProjectName',project.estimated_start_date as 'ProjectStartDate',
				project.estimated_end_date as 'ProjectEndDate',concat(users.first_name,' ', users.last_name) as POC,
				project_cstm.w2ctc_c as W2CTC,concat(vedic_candidates.first_name,' ', vedic_candidates.last_name) as 'ConsultantName',
				email_addresses.email_address as 'ConsultantEmail' ,vedic_candidates.phone_mobile as 'ConsultantPhone',
				acc.name as 'ClientName',accounts.name as 'EndClient',concat(u2.first_name,' ', u2.last_name) as PLM, 
				CONCAT('$',FORMAT(pr1.value_c,2)) as 'BillRate', CONCAT('$',FORMAT(pr2.value_c,2)) as 'OTRate', 
				CONCAT('$',FORMAT(pr3.value_c,2)) as 'ExpensesRate', CONCAT('$',FORMAT(pr4.value_c,2)) as Bonus,
				Concat(
				IF(accounts.shipping_address_street IS NULL OR accounts.shipping_address_street = '', '', concat(accounts.shipping_address_street, ', ')),
				IF(accounts.shipping_address_city IS NULL OR accounts.shipping_address_city = '', '', concat(accounts.shipping_address_city, ', ')),
				IF(accounts.shipping_address_state IS NULL OR accounts.shipping_address_state = '', '', concat(accounts.shipping_address_state, ', ')),
				IF(accounts.shipping_address_postalcode IS NULL OR accounts.shipping_address_postalcode = '', '', concat(accounts.shipping_address_postalcode, ', ')),
				IF(accounts.shipping_address_country IS NULL OR accounts.shipping_address_country = '', '', accounts.shipping_address_country)
				) AS Location,t.end_bill_period_c as 'EndBilltime',t.timesheetschedule_c as 'TimesheetSchedule' from project 
				LEFT JOIN vedic_candidates_project_1_c on project.id = vedic_candidates_project_1_c.vedic_candidates_project_1project_idb 
				 LEFT JOIN vedic_candidates ON vedic_candidates.id = vedic_candidates_project_1_c.vedic_candidates_project_1vedic_candidates_ida 
				LEFT join vedic_candidates_cstm on vedic_candidates_cstm.id_c = vedic_candidates.id
				LEFT JOIN users ON users.id=project.assigned_user_id 
				left join users u2 on u2.id = users.reports_to_id
				LEFT JOIN email_addr_bean_rel on vedic_candidates.id= email_addr_bean_rel.bean_id 
				LEFT join email_addresses on email_addr_bean_rel.email_address_id=email_addresses.id 
				 LEFT JOIN project_cstm on project.id = project_cstm.id_c 
				 LEFT JOIN accounts as acc on acc.id = project_cstm.account_id_c 
				left join accounts on accounts.id = vedic_candidates_cstm.account_id_c				

				left join (SELECT project_vedic_project_rate_1project_ida as id, value_c FROM vedic_project_rate_cstm
				LEFT join project_vedic_project_rate_1_c on id_c = project_vedic_project_rate_1vedic_project_rate_idb
				WHERE pay_type_c = 'pay_rate_c' and deleted = '0') pr1 on pr1.id = project.id
				left join (SELECT project_vedic_project_rate_1project_ida as id, value_c FROM vedic_project_rate_cstm
				LEFT join project_vedic_project_rate_1_c on id_c = project_vedic_project_rate_1vedic_project_rate_idb
				WHERE pay_type_c = 'Over_Time' and deleted = '0') pr2 on pr2.id = project.id
				left join (SELECT project_vedic_project_rate_1project_ida as id, value_c FROM vedic_project_rate_cstm
				LEFT join project_vedic_project_rate_1_c on id_c = project_vedic_project_rate_1vedic_project_rate_idb
				WHERE pay_type_c = 'Travel' and deleted = '0') pr3 on pr3.id = project.id
				left join (SELECT project_vedic_project_rate_1project_ida as id, value_c FROM vedic_project_rate_cstm
				LEFT join project_vedic_project_rate_1_c on id_c = project_vedic_project_rate_1vedic_project_rate_idb
				WHERE pay_type_c = 'Bonus' and deleted = '0') pr4 on pr4.id = project.id

				left join (select timesheet_cstm.*,vedic_candidates_timesheet_1vedic_candidates_ida  from timesheet
				join timesheet_cstm on id_c = id join vedic_candidates_timesheet_1_c on vedic_candidates_timesheet_1timesheet_idb = id_c 
				order by end_bill_period_c desc) t  ON vedic_candidates.id = t.vedic_candidates_timesheet_1vedic_candidates_ida 
				WHERE (CURDATE() BETWEEN project.estimated_start_date 
				AND project.estimated_end_date)
				AND project.deleted='0' and project.status='Active'
				AND vedic_candidates.deleted='0' group by project.name";
$result = $db->query($query);
	while($row=$db->fetchByAssoc($result)){
		$sno = $count++;
		$projectname=$row['ProjectName'];
		$projectstartdate=$row['ProjectStartDate'];
		$projectenddate=$row['ProjectEndDate'];
		$poc=$row['POC'];
		$w2ctc=$row['W2CTC'];
		$consultantname=$row['ConsultantName'];
		$consultantemail=$row['ConsultantEmail'];
		$consultantphone=$row['ConsultantPhone'];
		$calient=$row['ClientName'];
		$endclient=$row['EndClient'];
		$plm=$row['PLM'];
		$billrate=$row['BillRate'];
		$otrate=$row['OTRate'];
		$expressrate=$row['ExpensesRate'];
		$bonus=$row['Bonus'];
		$location=$row['Location'];
		$endbilldate=$row['EndBilltime'];
		$timesheetschedule=$row['TimesheetSchedule'];
		//$status= str_replace("_", " ", $row['Status']);
		$records[] = array($sno,$projectname,$projectstartdate,$projectenddate,$poc,$w2ctc,$consultantname,$consultantemail,$consultantphone,$calient,$endclient,$plm,$billrate,$otrate,$expressrate,$bonus,$location,$endbilldate,$timesheetschedule);
	}
	foreach($records as $record)
        {
			$line = implode("\"" . getDelimiter() . "\"", $record);
            $line = "\"" . $line;
            $line .= "\"\r\n";
            $content .= $line;
		}
//strip away any blank spaces
$filename = str_replace(' ','',$filename).$ext_name;

$transContent = $GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset());
$transContent2 = utf8_decode($transContent);
///////////////////////////////////////////////////////////////////////////////
////	BUILD THE EXPORT FILE
ob_clean();
header("Pragma: cache");
header("Content-type: application/octet-stream; charset=".$GLOBALS['locale']->getExportCharset());
header("Content-Disposition: attachment; filename=FinanceReport.csv");
header("Content-transfer-encoding: binary");
header("Cache-Control: post-check=0, pre-check=0", false );
header("Content-Length: ".mb_strlen($transContent, '8bit'));
if (!empty($sugar_config['export_excel_compatible'])) {
    $transContent=chr(255) . chr(254) . mb_convert_encoding($transContent, 'UTF-16LE', 'UTF-8');
	
	
}
print $transContent2;
sugar_cleanup(true);
