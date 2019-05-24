<?php
/**
	FileName => OrgChartData.php
	Created By => Vineet (Apr-08-2019)
	Modified By => Vineet (Apr-08-2019)
	Comment => Entrypoint for organisation chart
**/
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
global $db;
$data = array();
$CEOID = "73cbf957-5291-c00e-2f3c-5c9a91ab8354";

$result = $db->query("SELECT users.id,
			COALESCE(CONCAT(users.first_name, ' ', users.last_name)) AS name,
			users.title,
			users.division,
			replace( replace(users.department, 'Management_', ''),'_',' ') AS department,
			users.phone_work AS phone
			FROM users
			WHERE deleted=0
				AND users.status = 'Active'
				AND id='".$CEOID."'");
$row = $db->fetchByAssoc($result);
$data["name"] = $row["name"];
$data["title"] = (!empty($row["title"]))?$row["title"]:'';
$data["division"] = (!empty($row["division"]))?$row["division"]:'';
$data["department"] = (!empty($row["department"]))?$row["department"]:'';
$data["phone"] = (!empty($row["phone"]))?$row["phone"]:'';
$emailResult = $db->query("SELECT email_addresses.email_address AS email
				FROM email_addr_bean_rel
				INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id
				WHERE email_addr_bean_rel.bean_id = '".$CEOID."'
					AND email_addr_bean_rel.bean_module = 'users'
					AND email_addr_bean_rel.deleted = '0'
					AND email_addresses.deleted = '0'");
$emailRow = $db->fetchByAssoc($emailResult);
$data["email"] = (!empty($emailRow["email"]))?$emailRow["email"]:'';
$data["children"] = children($CEOID);

function children($id) {
	global $db;
	$data = array();
	$i = 0;
	$result = $db->query("SELECT users.id,
					COALESCE(CONCAT(users.first_name, ' ', users.last_name)) AS name,
					users.title,
					users.division,
					replace( replace(users.department, 'Management_', ''),'_',' ') AS department,
					users.phone_work AS phone
					FROM users
					WHERE deleted=0
						AND users.status = 'Active'
						AND ((users.title IS NULL)
						OR users.title NOT LIKE '%Employee%')
						AND users.user_name NOT LIKE '%test%'
						AND users.user_name NOT LIKE '%vats%'
						AND users.user_name NOT LIKE '%generic%'
						AND users.user_name NOT LIKE '%admin%'
						AND users.reports_to_id = '".$id."'"); 
	while($row = $db->fetchByAssoc($result)) {
		$data[$i]["name"] = $row["name"];
		$data[$i]["title"] = (!empty($row["title"]))?$row["title"]:'';
		$data[$i]["division"] = (!empty($row["division"]))?$row["division"]:'';
		$data[$i]["department"] = (!empty($row["department"]))?$row["department"]:'';
		$data[$i]["phone"] = (!empty($row["phone"]))?$row["phone"]:'';
		$emailResult = $db->query("SELECT email_addresses.email_address AS email
				FROM email_addr_bean_rel
				INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id
				WHERE email_addr_bean_rel.bean_id = '".$row["id"]."'
					AND email_addr_bean_rel.bean_module = 'users'
					AND email_addr_bean_rel.deleted = '0'
					AND email_addresses.deleted = '0'");
		$emailRow = $db->fetchByAssoc($emailResult);
		$data[$i]["email"] = (!empty($emailRow["email"]))?$emailRow["email"]:'';
		$childData = children($row["id"]);
		if(!empty($childData)) {
			$data[$i]["children"] = $childData;
		}
		$i++;
	}
	return $data;
}

$data = json_encode($data);
print_r($data);
?>