<?php
/**
	* FileName => logic_hooks.php
	* CreatedBy => Udaykiran(Created on Oct-05-2017)
	* Modified By => Udaykiran(Modified on Oct-05-2017)
	* Comment => Logichook file that executes at each action over a Submission module.
*/

// // Do not store anything in this file that is not part of the array or the hook version.  This file will	
// // be automatically rebuilt in the future. 
 // $hook_version = 1; 
// $hook_array = Array(); 
// // position, file, function 
// $hook_array['after_retrieve'] = Array(); 
// $hook_array['after_retrieve'][] = Array(1, 'clean_pictures', 'custom/OffshorePhoto/OffshorePhoto.php','OffshorePhotoClass', 'clean_pictures'); 
// $hook_array['before_save'] = Array(); 
// $hook_array['before_save'][] = Array(1, 'clean_pictures', 'custom/OffshorePhoto/OffshorePhoto.php','OffshorePhotoClass', 'clean_pictures'); 
// $hook_array['before_delete'] = Array(); 
// $hook_array['before_delete'][] = Array(1, 'clean_pictures', 'custom/OffshorePhoto/OffshorePhoto.php','OffshorePhotoClass', 'clean_pictures'); 
// /* Logichook to create a document after saving the submission if resume uploaded manually ::Added By Udaykiran Oct-02-2017*/


$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Job created mail aert ','custom/modules/vedic_Submissions/submissionnotification.php', 'submissionnotification', 'subnotification');
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Submission process', 'custom/modules/vedic_Submissions/Submit.php','ProcessSubmit', 'Submit'); 
$hook_array['after_save'][] = Array(2, 'Create the documents ','custom/modules/vedic_Submissions/CreateDocument.php', 'MultipleDoc', 'mulDoc');
?>