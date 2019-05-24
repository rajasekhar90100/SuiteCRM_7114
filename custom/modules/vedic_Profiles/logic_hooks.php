 <?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'Profile name', 'custom/modules/vedic_Profiles/ProfileName.php','profileName', 'updateProfileName'); 
$hook_array['after_save'][] = Array(2, 'primary keyskill append', 'custom/modules/vedic_Profiles/ProfileName.php','profileName', 'Keyskill'); 
$hook_array['after_save'][] = Array(3, 'concatLocation', 'custom/modules/vedic_Profiles/concatLocation.php','concatProfLocation', 'concatProfileLocation'); 
$hook_array['after_save'][] = Array(4, 'Upload Documents','custom/modules/vedic_Profiles/profilesMfile.php', 'MulDocuments', 'mulDoc'); 

$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Profile History', 'custom/modules/vedic_Profiles/profilecreation.php','Createprofile', 'create_profile');

$hook_array['after_save'][] = Array(5,'Adding reationship for candidates and Projects', 'custom/modules/vedic_Profiles/Profileprojectrelation.php','Profileprojectrelation', 'Profileprojectrelation');
$hook_array['after_save'][] = Array(6, 'CandidateVisa status', 'custom/modules/vedic_Profiles/Projectvisa.php','Projectvisa', 'Projectvisa'); 
$hook_array['after_save'][] = Array(7, 'Append new technology', 'custom/modules/vedic_Profiles/appendtechnology.php','AppendTechnology', 'appendTechnology');
$hook_array['after_save'][] = Array(8, 'POEnddate', 'custom/modules/vedic_Profiles/POEnddate.php','POEnddate', 'poEnddate');
$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(1, 'ADD Project Data', 'custom/modules/vedic_Profiles/addProjectData.php','AddProject', 'addProject'); 
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(1, 'Delete Project Data', 'custom/modules/vedic_Profiles/addProjectData.php','AddProject', 'deleteProject'); 