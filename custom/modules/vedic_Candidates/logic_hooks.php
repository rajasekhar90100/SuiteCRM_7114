<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
// $hook_array['before_save'][] = Array(1, 'default path','custom/modules/vedic_Candidates/resumepath.php', 'Resumepath', 'defaultpath');

// $hook_array['before_save'][] = Array(2, 'get resume content when candiate created from dice/monstr/techfetch','custom/modules/vedic_Candidates/chkduplicate.php', 'Duplicate', 'check_duplicate');


$hook_array['after_save'] = Array(); 
//$hook_array['after_save'][] = Array(1, 'default path','custom/modules/vedic_Candidates/candidateId.php', 'Candidateid', 'candidateId');
//$hook_array['after_save'][] = Array(1, 'default path','custom/modules/vedic_Candidates/getResuemContent.php', 'GetResumeContent', 'parseResume');

// $hook_array['after_save'][] = Array(1, 'Manager Notifications','custom/modules/vedic_Candidates/managernotifications.php', 'Manageralerts', 'mNotifications');
// $hook_array['after_save'][] = Array(2, 'Upload Documents','custom/modules/vedic_Candidates/candidatesMfile.php', 'MultiDocuments', 'mulDoc');
// $hook_array['after_save'][] = Array(3, 'concatLocation', 'custom/modules/vedic_Candidates/concatLocation.php','concatCandLocation', 'concatCandidLocation');
// $hook_array['after_save'][] = Array(4, 'Check weather to convert consultant', 'custom/modules/vedic_Candidates/is_consultant.php','Is_consultant', 'check_consultant');  
// $hook_array['after_save'][] = Array(5, 'Show In Report', 'custom/modules/vedic_Candidates/ShowInReport.php','ShowInReport', 'showIn'); 
$hook_array['after_save'][] = Array(6, 'Create Profile', 'custom/modules/vedic_Candidates/CreateProfile.php','createProf', 'createProf'); 
$hook_array['after_save'][] = Array(7, 'Capital Names', 'custom/modules/vedic_Candidates/CapitalizeName.php','CapitalizeName', 'cName'); 
// $hook_array['after_save'][] = Array(8, 'keyskillappend', 'custom/modules/vedic_Candidates/appendskill.php','AppendSkill', 'appendSkill'); 
$hook_array['after_save'][] = Array(9,'Update feedback', 'custom/modules/vedic_Candidates/UpdateFeedback.php','UpdateFeedback', 'updateFeedback'); 
// $hook_array['after_save'][] = Array(10,'Append Role', 'custom/modules/vedic_Candidates/appendrole.php','AppendRole', 'roleAppend'); 
//$hook_array['before_relationship_add'] = Array();
//$hook_array['before_relationship_add'][] = Array(1, 'job status check up','custom/modules/vedic_job/jobs_status_check.php', 'StatusCheck', 'checkstatus');

$hook_array['after_relationship_add'] = Array();
//$hook_array['after_relationship_add'][] = Array(1, 'Submission process', 'custom/modules/vedic_Candidates/submit.php', 'ProcessSubmit', 'Submit');

$hook_array['after_relationship_delete'] = Array();
//$hook_array['after_relationship_delete'][] = Array(1, 'Submission process', 'custom/modules/vedic_Candidates/submit.php', 'ProcessSubmit', 'Submit');


/*#START ::  Adding Logic hook for compressing keyskills in listview of candidate  :: 2017Mar11
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'process_record example',  'custom/modules/vedic_Candidates/resumepath.php', 'Resumepath', 'process_record_listmethod');*/

?>
