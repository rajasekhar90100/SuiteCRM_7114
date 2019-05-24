<?php 
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set('display_errors',0);
require_once('include/entryPoint.php');
// print_r($_REQUEST);die();

$ID = $_REQUEST['parent_id'];

global $db;

$select_query = "SELECT vedic_immigration_audit.date_created as AuditDateCreated, vedic_candidates.last_name as Candidate, vedic_immigration_audit.field_name as Field, vedic_immigration_audit.before_value_string as Value, vedic_immigration_audit.after_value_string as AValue, vedic_immigration_audit.after_value_text as afterValue, users.user_name as ModifiedBy, vedic_immigration_audit.date_created as ModifiedDate FROM vedic_immigration INNER JOIN vedic_immigration_cstm ON vedic_immigration.id = vedic_immigration_cstm.id_c INNER JOIN vedic_immigration_audit ON vedic_immigration.id = vedic_immigration_audit.parent_id INNER JOIN vedic_candidates_vedic_immigration_1_c ON vedic_candidates_vedic_immigration_1_c.vedic_candidates_vedic_immigration_1vedic_immigration_idb = vedic_immigration.id AND vedic_candidates_vedic_immigration_1_c.deleted = '0' INNER JOIN vedic_candidates ON vedic_candidates.id = vedic_candidates_vedic_immigration_1_c.vedic_candidates_vedic_immigration_1vedic_candidates_ida AND vedic_candidates_vedic_immigration_1_c.deleted = '0' AND vedic_immigration.id = '$ID' INNER JOIN users ON vedic_immigration_audit.created_by = users.id WHERE (vedic_immigration_cstm.stage_c != '' OR vedic_immigration_cstm.status_c != '') AND (vedic_immigration_audit.field_name IN ('stage_c','status_c', 'reason_to_change_c','start_date_c','end_date_c')) ORDER BY vedic_immigration_audit.date_created DESC;
";

$select_result = $db->query($select_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
-->	
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>

<h4 class="sub-header">Status Change Log</h4>

<table class="table table-striped">
  <thead>
	<tr>
	  <th>Candidate</th>
	  <th>ModifiedDate</th>
	  <th>Field</th>
	  <th>BValue</th>
	  <th>AValue</th>
	  <th>ModifiedBy</th>
	  <th>Reason to Change</th>	 	  
	</tr>
  </thead>

<?php 
$data = array();

while($select_row = $db->fetchByAssoc($select_result))
{
$candidate = $select_row['Candidate'];
$field = $select_row['Field']; // Field Name
$fValue = $select_row['Value']; //Field Before Value(enum)
$AValue = $select_row['AValue']; // Field After Value(enum)
$modifiedBy = $select_row['ModifiedBy'];
$modifiedDate = $select_row['ModifiedDate'];
$AuditDateCreated = $select_row['AuditDateCreated'];

$select_A = "SELECT vedic_immigration_audit.after_value_text as fAValue FROM vedic_immigration_audit where vedic_immigration_audit.date_created = '$AuditDateCreated'  AND vedic_immigration_audit.after_value_text IS NOT NULL";
$select_AQ = $db->query($select_A);
$select_ARow = $db->fetchByAssoc($select_AQ);

if($field == "reason_to_change_c")
{
	$fAValue = $select_ARow['fAValue'];
}

$data = array($candidate,$field,$fValue,$AValue,$modifiedBy,$modifiedDate,$fAValue);
if($field == "reason_to_change_c")
{
	continue;
}

$module_name = 'vedic_Immigration';
$bean = BeanFactory::getBean($module_name);
// $field_defs[$module_name] = $bean->getFieldDefinitions();
$field_defs = $bean->field_name_map;
$field_defs = $field_defs[$field];

?>
  <tbody>
	<tr>	  
	  <td><?php echo $data[0];?></td>
	  <td><?php echo $data[5];?></td>	  
	  <td><?php echo $field_defs['labelValue'];?></td>	  
	  <td><?php echo $data[2];?></td>	  
	  <td><?php echo $data[3];?></td> 
	   <td><?php echo $data[4];?></td>
	   <td><?php echo $data[6];?></td>
	</tr>
  </tbody>
<?php
// }
}
?>
</table>
</body>
</html>                                		

