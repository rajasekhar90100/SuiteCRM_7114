<?php
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;

$oldSSN = $_REQUEST['oldSSN'];//Need to decrypt
$newSSN = $_REQUEST['newSSN'];
$parentID = $_REQUEST['parentID'];
$currentUser = $_REQUEST['currentUser'];

$SSNID_1 = substr($newSSN, 0, -4);
$SSNID_4 = substr($newSSN, -4);
$SSNID = $SSNID_1;
$encryptionMethod = "aes-256-cbc";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = $GLOBALS['sugar_config']['secretHash'];
//To encrypt
$encryptedSSN = openssl_encrypt($SSNID, $encryptionMethod, $secretHash);

$SSNID_4_old = substr($oldSSN, -4);
$SSNID_1_old = substr($oldSSN, 0, -4);		
$decryptedSSN_old = openssl_decrypt($SSNID_1_old, $encryptionMethod, $secretHash);

$decryptedSSN_old = $decryptedSSN_old.$SSNID_4_old;
$newSSN = $encryptedSSN.$SSNID_4;
$newSSNID_4 = substr($newSSN, -4);

if($oldSSN != $newSSN)
{
	$ssnAuditID = create_guid();
	$insertSSNAudit = "INSERT INTO `vedic_employees_audit` (`id`, `parent_id`, `date_created`, `created_by`, `field_name`, `data_type`, `before_value_string`, `after_value_string`, `before_value_text`, `after_value_text`) VALUES ('$ssnAuditID', '$parentID', UTC_TIMESTAMP(), '$currentUser', 'audit_ssn_c', 'varchar', 'Changed from: <$SSNID_4_old>', 'Changed to: <$newSSNID_4>', 'SSN got changed', 'SSN got changed');";
	$insert_result = $db->query($insertSSNAudit);
	
	$update_query = "update vedic_employees set num_secu = '$newSSN' where id = '$id' ";
			$db->query($update_query);
}
	echo $newSSN;
?>