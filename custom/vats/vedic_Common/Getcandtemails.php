<?php
/** 
  * FileName=> Getcandtemails.php
  * Created By => Rajasekhar Reddy(Created On Apr-24-2018)
  * Modified By => Rajasekhar Reddy (Modified On Apr-24-2018)
  * Comment =>Get all the candidate emails based on profile.
  */
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	global $db,$sugar_config;
	$parenttype = $_REQUEST['parenttype'];
	$parentid = $_REQUEST['parentid'];
	
	$query = "select vedic_candidates.first_name,vedic_candidates.last_name,vedic_candidates.id as 'CndID',vedic_profiles.id from vedic_candidates INNER JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates.id=vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida INNER JOIN vedic_profiles ON vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb=vedic_profiles.id WHERE vedic_candidates.deleted='0' AND vedic_profiles.deleted='0' AND vedic_candidates_vedic_profiles_1_c.deleted='0' AND vedic_profiles.id='$parentid'";
	$result = $db->query($query);
	$Candidateidresult = $db->fetchByAssoc($result);
	$Candidateid = $Candidateidresult['CndID'];
	
	$query1 = "select email_addresses.email_address as EmailID from email_addr_bean_rel INNER JOIN email_addresses ON email_addr_bean_rel.email_address_id = email_addresses.id where email_addr_bean_rel.bean_id = '$Candidateid' and email_addr_bean_rel.bean_module = 'vedic_Candidates' and email_addr_bean_rel.primary_address IN(0,1) and email_addr_bean_rel.deleted = '0' and email_addresses.deleted = '0' ORDER BY email_addr_bean_rel.primary_address DESC";
		$result_calls1 = $db->query($query1);
		$CndMail = '<select id="Candidate_emails" name="Candidate_emails[]" multiple="true" size="6" style="width:150" title="" tabindex="0">';
		while($row_calls1 = $db->fetchByAssoc($result_calls1)) {
			$Mail = $row_calls1['EmailID'];
			$CndMail .= '<option value="'.$Mail.'" Seleted>'.$Mail.'</option >';
		}
		$CndMail .= '</select>';
print_r($CndMail);
?>