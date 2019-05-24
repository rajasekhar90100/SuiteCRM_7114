<?php
/**
  * FileName => concatLocation.php
  * Created By => Sravanthi (Created On Aug-03-2017)
  * Modified By => Sravanthi (Modified On Aug-09-2017)
  * COMMENT => Concatenate the Candidate current address to Current location field on save of candidate recor
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class concatCandLocation {

    function concatCandidLocation(&$bean, $event, $arguments) {
		global $db, $app_list_strings;
		
		$id = $bean->id;
		$candCurrentLocation = $bean->located_c;
		
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

		$select_query = "SELECT COALESCE(c.candcurrent_address_street,'') as cStreet, COALESCE(c.candcurrent_address_city,'') as cCity, COALESCE(c.candcurrent_address_state,'') as cState, COALESCE(c.candcurrent_address_country,'') as cCountry, COALESCE(c.candcurrent_address_postalcode,'') as cPCode from vedic_candidates as c where id = '$id' and deleted = '0'";
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
			$update_query = "update vedic_candidates_cstm set located_c = '$cAddress' where id_c = '$id'";
			$db->query($update_query);
		// }
	}
}
