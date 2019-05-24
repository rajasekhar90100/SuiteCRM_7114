<?php 
/**  
  * FileName => immigrationprofilename.php
  * Modified By => Udaykiran (Modified On Aug-07-2018)
  * COMMENT => Code to fetch the profile,candidate details 
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('modules/vedic_Profiles/vedic_Profiles.php');

global $db,$sugar_config;
$profileId = $_REQUEST['profileid'];
$query = $db->query("SELECT vedic_candidates.id AS id,
						   concat(COALESCE(vedic_candidates.first_name, ' '), ' ', vedic_candidates.last_name) AS candidate_name,vpc.stage_c,vpc.status_c
					FROM vedic_candidates
					JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates.id = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida
					JOIN vedic_profiles_cstm vpc on vpc.id_c = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb
					WHERE vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb ='$profileId'
					  AND vedic_candidates_vedic_profiles_1_c.deleted=0
					  AND vedic_candidates.deleted=0");	
$result = $db->fetchByAssoc($query);
$proID = $result['id'];
$proName = $result['candidate_name'];
$proStage = $result['stage_c'];
$proStatus = $result['status_c'];
$profileObj = new vedic_Profiles();
$profileObj->retrieve($profileId); 
$endClientID = $profileObj->account_id_c;
$endClientname = $profileObj->end_client_c;
$candLocation = $profileObj->location_c;
//Fetch End client shipping address
$select_query = "SELECT Concat(
	IF(accounts.shipping_address_street IS NULL OR accounts.shipping_address_street = '', '', concat(accounts.shipping_address_street, ', ')),
	IF(accounts.shipping_address_city IS NULL OR accounts.shipping_address_city = '', '', concat(accounts.shipping_address_city, ', ')),
	IF(accounts.shipping_address_state IS NULL OR accounts.shipping_address_state = '', '', concat(accounts.shipping_address_state, ', ')),
	IF(accounts.shipping_address_postalcode IS NULL OR accounts.shipping_address_postalcode = '', '', concat(accounts.shipping_address_postalcode, ', ')),
	IF(accounts.shipping_address_country IS NULL OR accounts.shipping_address_country = '', '', accounts.shipping_address_country)
	) AS shippingAddress
	FROM accounts WHERE accounts.id = '$endClientID'";
$select_result = $db->query($select_query);
$select_row = $db->fetchByAssoc($select_result);
$shippingAddress = $select_row['shippingAddress'];
if(substr($shippingAddress, 0,1)==',' ||substr($shippingAddress, -1)==','||substr($shippingAddress, -1)==' ') {
	$shippingAddress = rtrim(ltrim($shippingAddress,','),',');
	if(substr($shippingAddress, -1)==' ') {
		$shippingAddress = rtrim(ltrim($shippingAddress,','),', ');
	}
}
print_r($proID.'---'.$proName.'---'.$shippingAddress.'---'.$endClientID.'---'.$endClientname.'---'.$candLocation.'---'.$proStage.'---'.$proStatus);
?>