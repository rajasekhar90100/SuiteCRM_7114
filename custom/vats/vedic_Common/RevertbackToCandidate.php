<?php
/**
  * FileName => RevertbackToCandidate.php
  * Created By => Rajasekhar Reddy (Created On Sep-22-2017)
  * Modified By => Rajasekhar Reddy(Modified On Sep-22-2017)
  * COMMENT => Entry point for revert back to candidate 
  */
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
global $db,$sugar_config;
$site_url = $GLOBALS['sugar_config']['site_url'];

$CandidateID = $_REQUEST['id'];
$is_consultant = $_REQUEST['is_consultant'];

$query1 = "select first_name as firstname,last_name as lastname from vedic_candidates where id = '$CandidateID'";
$rslt1 = $GLOBALS['db']->query($query1, false);
$Candidatedetails = $GLOBALS['db']->fetchByAssoc($rslt1);
$Candfirstname = $Candidatedetails['firstname'];
$Candlastname = $Candidatedetails['lastname'];

$is_consultant = "UPDATE `vedic_candidates_cstm` SET `is_consultant_c`='$is_consultant' WHERE id_c='$CandidateID' ";
            $result = $GLOBALS['db']->query($is_consultant) or die("Query have some issue assigning user to consultant logic hook :" . mysql_error()); 

 $query = "SELECT id from users where first_name LIKE '$Candfirstname' and last_name LIKE '$Candlastname' and title LIKE 'Consultant' and status LIKE 'Active'";
			$rslt = $GLOBALS['db']->query($query, false);
			while($UserID = $GLOBALS['db']->fetchByAssoc($rslt)) {
				$ID = $UserID['id'];		
			  $remove_user = "UPDATE `users` SET `status`='Inactive',`title`='',`deleted`='1'
                                    WHERE id='$ID' ";
            $result = $GLOBALS['db']->query($remove_user) or die("Query have some issue assigning user to consultant logic hook :" . mysql_error()); 
			}
			
	echo $result;
?>