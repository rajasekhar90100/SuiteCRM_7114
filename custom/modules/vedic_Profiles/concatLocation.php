<?php
/**
  * FileName => concatLocation.php
  * Created By => Udaykiran (Created On Feb-08-2018)
  * Modified By => Udaykiran (Modified On Feb-08-2018)
  * COMMENT => Concatenate the Primary address to Current location field on save of profile record
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class concatProfLocation {

    function concatProfileLocation(&$bean, $event, $arguments) {
		global $db, $app_list_strings;
		
		$id = $bean->id;
		$profPrimaryLocation = $bean->location_c;
		
		$stateList = array();
		$countryList = array();
		if (isset($app_list_strings['state_list']))
		{
			$stateList = $app_list_strings['state_list'];
		}
		if (isset($app_list_strings['country_list']))
		{
			$countryList = $app_list_strings['country_list'];
		}

		$select_query = "SELECT COALESCE(vp.primary_address_street,'') AS cStreet, COALESCE(vp.primary_address_city,'') AS cCity, COALESCE(vp.primary_address_state,'') AS cState, COALESCE(vp.primary_address_country,'') AS cCountry, COALESCE(vp.primary_address_postalcode,'') AS cPCode FROM vedic_profiles AS vp WHERE id = '$id' AND deleted = '0'";
		$select_result = $db->query($select_query);
		$select_row = $db->fetchByAssoc($select_result);
		$cStreet = $select_row['cStreet'];
		$cCity = $select_row['cCity'];
		$cState = $select_row['cState'];
		$cCountry = $select_row['cCountry'];
		$cPCode = $select_row['cPCode'];
		
		$cState = $stateList[$cState];
		$cCountry = $countryList[$cCountry];
		
		$cAddress = $cStreet."\n".$cCity." ".$cState." ".$cPCode."\n".$cCountry;
		
		// if(empty($candCurrentLocation))
		// {
			$update_query = "update vedic_profiles_cstm set location_c = '$cAddress' where id_c = '$id'";
			$db->query($update_query);
		// }
	}
}