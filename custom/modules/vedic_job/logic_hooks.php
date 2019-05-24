<?php
/**  
  * FileName => logic_hooks.php
  * Modified By => Lakshmi (Modified On Jun-18-2018)
  * COMMENT => Updated the logic hooks file for solutions
  */
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Job City Uchar ','custom/modules/vedic_job/jobs_city.php', 'JobCity', 'Location');

$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(2, 'Make Job Id Dynamically','custom/modules/vedic_job/jobs_id.php', 'JobId', 'Dynamicid'); 

//$hook_array['before_relationship_add'] = Array();
//$hook_array['before_relationship_add'][] = Array(1, 'job status check up','custom/modules/vedic_job/jobs_status_check.php', 'StatusCheck', 'checkstatus');

// $hook_array['after_relationship_add'] = Array();
// $hook_array['after_relationship_add'][] = Array(1, 'Submission process', 'custom/modules/vedic_job/submit1.php', 'ProcessSubmit', 'Submit');

$hook_array['process_record'][] = Array();
$hook_array['process_record'][] = Array(1, 'list data', 'custom/modules/vedic_job/NoofCandidates.php','Noofcandidates', 'no_of_candidates');
// $hook_array['after_relationship_delete'] = Array();
// $hook_array['after_relationship_delete'][] = Array(1, 'Submission process', 'custom/modules/vedic_job/submit1.php', 'ProcessSubmit', 'Submit');
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Notifications for  Solutions sales team', 'custom/modules/vedic_job/Solutionscreationmails.php','SolutionsMails', 'Solutions_mails'); 


?>
