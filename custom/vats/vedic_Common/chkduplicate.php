<?php
/**
	* FileName => chkduplicate.php
	* FunctionName => check_duplicate
	* CreatedBy => Maneesha(Created on July-11-2017)
	* Modified By => Maneesha(Modified on Aug-04-2017)
	* Comment => EntryPoint file to check the duplicate candidates with Firstname,lastname ,Date of Birth,Emailaddress.
*/
ini_set('display_errors',-1);

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once ('include/entryPoint.php');
	require_once('custom/modules/vedic_Candidates/views/view.edit.php');

	global $db,$sugar_config;
	$beanid = $_REQUEST['beanId'];
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$phone = $_REQUEST['phone'];
	$dob = $_REQUEST['dob'];
	$canID = '';
	$email = $_REQUEST['email1'];	
	$date = date_create($dob);
	$dateofbirth = date_format($date, 'Y-m-d');
	$first_name = strtolower($firstname);
	$last_name = strtolower($lastname);
	
	if(strlen($beanid) == 0){
		$emailaddress = "
		SELECT COUNT(*) AS total,email_addresses.email_address,email_addr_bean_rel.bean_id 
							FROM vedic_candidates 
							INNER JOIN email_addr_bean_rel ON email_addr_bean_rel.bean_id = vedic_candidates.id
							INNER JOIN email_addresses
							ON email_addr_bean_rel.email_address_id = email_addresses.id 
							WHERE email_addresses.email_address='".trim($email)."' AND email_addr_bean_rel.deleted=0 AND email_addresses.deleted = '0'
							AND vedic_candidates.deleted = '0' GROUP BY email_addr_bean_rel.bean_id";

		
		$email_result = $db->query($emailaddress); 
		$email_row = $db->fetchByAssoc($email_result);
		if(!empty($email_row['total']))
		{
			$canID = $email_row['bean_id'];		
		}	
		
		else{
				
			$candidate_sql = "SELECT count(*) as ct, id 
								FROM vedic_candidates 
								WHERE first_name = '".trim($first_name)."' 
								AND last_name = '".trim($last_name)."' 
								AND dob= '".$dateofbirth."'
								AND  deleted=0 
								GROUP BY id";

			$candidate_res = $db->query($candidate_sql);

			$candidate_row = $db->fetchByAssoc($candidate_res);

			if(!empty($candidate_row['ct']))
			{
				$canID = $candidate_row['id'];		
			}
			else{
				$candidate_sql = "SELECT count(*) as ct, id 
									FROM vedic_candidates 
									WHERE first_name = '".trim($last_name)."' 
									AND last_name = '".trim($first_name)."'
									AND dob= '".$dateofbirth."' 
									AND  deleted=0 
									GROUP BY id";

				$candidate_res = $GLOBALS['db']->query($candidate_sql);

				$candidate_row = $GLOBALS['db']->fetchByAssoc($candidate_res);

				if(!empty($candidate_row['ct']) )
				{
					$canID = $candidate_row['id'];		
				}
			}
		}
		if(!empty($canID)) {
			if($beanid!= $canID) {
				echo $canID;
			}
		}
	}
	
?>