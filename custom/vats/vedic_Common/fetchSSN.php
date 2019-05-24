<?php
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;

// print_r($_POST);
$pwd = $_REQUEST['ssn'];
$parentID = $_REQUEST['parentID'];
$currentUser = $_REQUEST['currentUser'];

$SSNID_4 = substr($pwd, -4);
$SSNID_1 = substr($pwd, 0, -4);
$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
		$secretHash = $GLOBALS['sugar_config']['secretHash'];

		
		$decryptedSSN = openssl_decrypt($SSNID_1, $encryptionMethod, $secretHash);
		$decryptedSSN = $decryptedSSN.$SSNID_4;
		
	if($parentID && $currentUser)
	{
		$ssnAuditID = create_guid();
	$insertSSNAudit = "INSERT INTO `vedic_employees_audit` (`id`, `parent_id`, `date_created`, `created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('$ssnAuditID', '$parentID', UTC_TIMESTAMP(), '$currentUser', 'audit_ssn_c', 'varchar', 'SSN viewed', 'SSN viewed', 'SSN viewed', 'SSN viewed');";
	$insert_result = $db->query($insertSSNAudit);
	}
	
echo $decryptedSSN;
// header("location:");
?>