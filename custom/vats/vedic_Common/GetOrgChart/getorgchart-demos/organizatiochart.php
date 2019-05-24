<?php
/**
	FileName => organizatiochart.php
	Created By => Rajasekhar Reddy(Mar-06-2018)
	Modified By => Udaykiran(May-31-2018)
	Comment => Entrypoint for organisation chart
**/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once ('include/entryPoint.php');
	
global $db,$sugar_config;
$site_url = $sugar_config["site_url"];
$userarray=array();
$user =array();
$useremail=array();
$res=array();
$cn=1;
$ownername='';

$query="SELECT users.id,
			   COALESCE(CONCAT(users.first_name, ' ', users.last_name)) AS Name,
			   users.reports_to_id,
			  users.title,
			  users.division,
			   replace( replace(users.department, 'Management_', ''),'_',' ') AS department,
			   users.phone_work AS mobilephone
		FROM users
		WHERE deleted=0
		  AND users.status = 'Active'
		  AND ((users.title IS NULL)
			   OR users.title NOT LIKE '%Employee%')
		  AND users.user_name NOT LIKE '%test%'
		  AND users.user_name NOT LIKE '%vats%'
		  AND users.user_name NOT LIKE '%generic%'
		  AND users.user_name NOT LIKE '%admin%'
		  AND (users.reports_to_id != '')";
$result=$db->query($query);

$userquery = "SELECT users.id,
				   COALESCE(CONCAT(users.first_name, ' ', users.last_name)) AS Name,
				   users.reports_to_id,
				   users.title,
				   users.division,
				   replace( replace(users.department, 'Management_', ''),'_',' ') AS department,
				   users.phone_work AS mobilephone
			FROM users
			WHERE deleted=0
			  AND users.status = 'Active'
			  AND id='73cbf957-5291-c00e-2f3c-5c9a91ab8354'";
$userresult=$db->query($userquery);
$userrow=$db->fetchByAssoc($userresult);
$userarray[] = $userrow;
$emailResult = $db->query("SELECT email_addresses.email_address AS EmailID
				FROM email_addr_bean_rel
				INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id
				WHERE email_addr_bean_rel.bean_id = '73cbf957-5291-c00e-2f3c-5c9a91ab8354'
				  AND email_addr_bean_rel.bean_module = 'users'
				  AND email_addr_bean_rel.deleted = '0'
				  AND email_addresses.deleted = '0'");
$emailRow = $db->fetchByAssoc($emailResult);
$userarray[0]['EmailID'] = $emailRow['EmailID'];

$managers=array();

while($row=$db->fetchByAssoc($result)){
$Uid = $row['id'];
$query1 = "select email_addresses.email_address as EmailID from email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id where email_addr_bean_rel.bean_id ='$Uid' and email_addr_bean_rel.bean_module = 'users' and email_addr_bean_rel.deleted = '0' and email_addresses.deleted = '0'  ";
$result1=$db->query($query1);
$row1=$db->fetchByAssoc($result1);
    if($Uid == '741fb764-ec4e-cc25-96ab-5506b58957a3'){
	    // $userarray[]=$row;
		// $userarray[count($userarray) - 1]['EmailID'] = $row1['EmailID'];
		$user[] = $row;
		
	}

	else{
		// $GLOBALS['log']->fatal("Hello");
			$userarray[]=$row;
			$userarray[count($userarray) - 1]['EmailID'] = $row1['EmailID'];
			if(!in_array($row['reports_to_id'],$managers)){
					$managers[]=$row['reports_to_id'];
			}
	  $cn++;
	}
}
$Result = json_encode($userarray);
print_r($Result);
?>