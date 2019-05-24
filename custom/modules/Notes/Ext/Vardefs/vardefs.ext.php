<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['Note']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_notes',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2018-04-25 06:55:22
$dictionary['Note']['fields']['description']['inline_edit']=true;
$dictionary['Note']['fields']['description']['comments']='Full text of the note';
$dictionary['Note']['fields']['description']['merge_filter']='disabled';
$dictionary['Note']['fields']['description']['rows']='10';
$dictionary['Note']['fields']['description']['cols']='20';

 

 // created: 2018-10-30 19:02:45
$dictionary['Note']['fields']['filename']['inline_edit']='';
$dictionary['Note']['fields']['filename']['comments']='File name associated with the note (attachment)';
$dictionary['Note']['fields']['filename']['importable']='true';
$dictionary['Note']['fields']['filename']['merge_filter']='disabled';

 

$dictionary['Note']['fields']['from_date']['type']='date';
$dictionary['Note']['fields']['from_date']['vname']='LBL_FROM_DATE';
$dictionary['Note']['fields']['from_date']['importable']=true;
$dictionary['Note']['fields']['from_date']['name']='from_date';
$dictionary['Note']['fields']['from_date']['mass_update']=true;
$dictionary['Note']['fields']['from_date']['audited']=true;
$dictionary['Note']['fields']['from_date']['inline_edit']=false;
$dictionary['Note']['fields']['from_date']['merge_filter']='disabled';



$dictionary['Note']['fields']['to_date']['type']='date';
$dictionary['Note']['fields']['to_date']['vname']='LBL_TO_DATE';
$dictionary['Note']['fields']['to_date']['importable']=true;
$dictionary['Note']['fields']['to_date']['name']='to_date';
$dictionary['Note']['fields']['to_date']['mass_update']=true;
$dictionary['Note']['fields']['to_date']['audited']=true;
$dictionary['Note']['fields']['to_date']['inline_edit']=false;
$dictionary['Note']['fields']['to_date']['merge_filter']='disabled';



 // created: 2019-05-06 17:28:52
$dictionary['Note']['fields']['type_c']['inline_edit']='1';
$dictionary['Note']['fields']['type_c']['labelValue']='Type';

 

// created: 2014-12-04 08:51:23
$dictionary["Note"]["fields"]["vedic_candidates_activities_1_notes"] = array (
  'name' => 'vedic_candidates_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_candidates_activities_1_notes',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_ACTIVITIES_1_NOTES_FROM_VEDIC_CANDIDATES_TITLE',
);


// created: 2018-09-10 10:14:10
$dictionary["Note"]["fields"]["vedic_gc_activities_1_notes"] = array (
  'name' => 'vedic_gc_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_gc_activities_1_notes',
  'source' => 'non-db',
  'module' => 'vedic_GC',
  'bean_name' => 'vedic_GC',
  'vname' => 'LBL_VEDIC_GC_ACTIVITIES_1_NOTES_FROM_VEDIC_GC_TITLE',
);


// created: 2018-04-24 07:38:15
$dictionary["Note"]["fields"]["vedic_profiles_activities_1_notes"] = array (
  'name' => 'vedic_profiles_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_profiles_activities_1_notes',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'vname' => 'LBL_VEDIC_PROFILES_ACTIVITIES_1_NOTES_FROM_VEDIC_PROFILES_TITLE',
);


// created: 2015-01-09 10:12:51
$dictionary["Note"]["fields"]["vedic_submissions_activities_1_notes"] = array (
  'name' => 'vedic_submissions_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_submissions_activities_1_notes',
  'source' => 'non-db',
  'module' => 'vedic_Submissions',
  'bean_name' => 'vedic_Submissions',
  'vname' => 'LBL_VEDIC_SUBMISSIONS_ACTIVITIES_1_NOTES_FROM_VEDIC_SUBMISSIONS_TITLE',
);

?>