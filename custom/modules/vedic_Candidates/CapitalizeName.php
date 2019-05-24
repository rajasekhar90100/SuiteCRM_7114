<?php
/**
  * FileName => CapitalizeName.php
  * Created By => Lakshmi (Created On May-14-2018)
  * Modified By => Udaykiran (Modified On Oct-16-2018)
  * COMMENT => To Capitalize the name of the candidate record 
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class CapitalizeName
{
    function cName(&$bean, $event, $arguments)
	{
		global $db, $current_user,$app_list_strings,$sugar_config;
		$canId = $bean->id;
		$first = $bean->first_name;
		$last = $bean->last_name;
		$firstName = ucwords(strtolower($first));
		$lastName = ucwords(strtolower($last));
		$db->query("UPDATE vedic_candidates
								SET first_name='$firstName',
									last_name ='$lastName'
									WHERE id = '$canId'");
		if(!empty($canId)) {
			$updateProfiles="SELECT vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb AS proid
								FROM vedic_candidates_vedic_profiles_1_c AS vcp
								JOIN vedic_profiles AS vp ON vp.id = vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb
								WHERE vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida='$canId'
								  AND vcp.deleted = '0'
								  AND vp.deleted='0'";
			$updateProfilesResult = $db->query($updateProfiles);
			while($row=$db->fetchByAssoc($updateProfilesResult)) {
				$id[] = $row['proid'];
			}	
			$pCount = count($id); 
			require_once("modules/vedic_Profiles/vedic_Profiles.php");
			for($i=0;$i<=$pCount-1;$i++) {
			    $profile = new vedic_Profiles();
				$profileId = $id[$i];
				$profile->retrieve($profileId);
				$profile->first_name = $firstName;
				$profile->last_name = $lastName;
				$profile->save();
			}			
		}
	}
}