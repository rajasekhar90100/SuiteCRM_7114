<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2017-11-04 07:38:00
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1"] = array (
  'name' => 'documents_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'documents_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE',
  'id_name' => 'documents_vedic_submissions_1documents_ida',
);
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1_name"] = array (
  'name' => 'documents_vedic_submissions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE',
  'save' => true,
  'id_name' => 'documents_vedic_submissions_1documents_ida',
  'link' => 'documents_vedic_submissions_1',
  'table' => 'documents',
  'module' => 'Documents',
  'rname' => 'document_name',
);
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1documents_ida"] = array (
  'name' => 'documents_vedic_submissions_1documents_ida',
  'type' => 'link',
  'relationship' => 'documents_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);


// created: 2016-05-10 09:12:21
$dictionary["vedic_Submissions"]["fields"]["securitygroups_vedic_submissions_1"] = array (
  'name' => 'securitygroups_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'securitygroups_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'SecurityGroups',
  'bean_name' => 'SecurityGroup',
  'vname' => 'LBL_SECURITYGROUPS_VEDIC_SUBMISSIONS_1_FROM_SECURITYGROUPS_TITLE',
);


 // created: 2019-05-06 17:33:27
$dictionary['vedic_Submissions']['fields']['bcc_c']['inline_edit']=1;
$dictionary['vedic_Submissions']['fields']['bcc_c']['labelValue']='Bcc';

 

 // created: 2019-05-06 17:33:28
$dictionary['vedic_Submissions']['fields']['cc_c']['inline_edit']=1;
$dictionary['vedic_Submissions']['fields']['cc_c']['labelValue']='Cc';

 

 // created: 2015-01-09 14:34:18
$dictionary['vedic_Submissions']['fields']['description']['comments']='Full text of the note';
$dictionary['vedic_Submissions']['fields']['description']['merge_filter']='disabled';

 

 // created: 2019-05-06 17:33:30
$dictionary['vedic_Submissions']['fields']['is_add_job_c']['inline_edit']='1';
$dictionary['vedic_Submissions']['fields']['is_add_job_c']['labelValue']='Include Job Description';

 

 // created: 2019-05-06 17:33:30
$dictionary['vedic_Submissions']['fields']['job_poster_email_c']['inline_edit']=1;
$dictionary['vedic_Submissions']['fields']['job_poster_email_c']['labelValue']='To';

 

 // created: 2019-05-06 17:33:31
$dictionary['vedic_Submissions']['fields']['original_job_listing_c']['inline_edit']=1;
$dictionary['vedic_Submissions']['fields']['original_job_listing_c']['labelValue']='Original Job Listing';

 

 // created: 2019-05-06 17:33:32
$dictionary['vedic_Submissions']['fields']['proposal_rate_c']['inline_edit']=1;
$dictionary['vedic_Submissions']['fields']['proposal_rate_c']['labelValue']='Proposal Rate';

 

 // created: 2019-05-06 17:33:33
$dictionary['vedic_Submissions']['fields']['signature_c']['labelValue']='Signature';

 

 // created: 2015-05-26 07:27:46
$dictionary['vedic_Submissions']['fields']['status']['default']='submitted';
$dictionary['vedic_Submissions']['fields']['status']['audited']=true;

 

 // created: 2019-05-06 17:33:33
$dictionary['vedic_Submissions']['fields']['subject_c']['inline_edit']='1';
$dictionary['vedic_Submissions']['fields']['subject_c']['labelValue']='Subject';

 

 // created: 2019-05-06 17:33:34
$dictionary['vedic_Submissions']['fields']['submission_resume_type_c']['inline_edit']='1';
$dictionary['vedic_Submissions']['fields']['submission_resume_type_c']['labelValue']='Resume Type';

 

 // created: 2019-05-06 17:17:29
$dictionary['vedic_Submissions']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Submissions']['fields']['test_c']['labelValue']='test';

 

// created: 2015-01-06 05:42:23
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1_name"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1_name',
  'type' => 'relate',
  'required' => true,
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
  'link' => 'vedic_candidates_vedic_submissions_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);


// created: 2015-01-06 05:44:17
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1"] = array (
  'name' => 'vedic_job_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_job',
  'bean_name' => 'vedic_job',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
  'id_name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1_name"] = array (
  'name' => 'vedic_job_vedic_submissions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'required' => false,
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
  'save' => true,
  'id_name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
  'link' => 'vedic_job_vedic_submissions_1',
  'table' => 'vedic_job',
  'module' => 'vedic_job',
  'rname' => 'name',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1vedic_job_ida"] = array (
  'name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);


// created: 2018-04-29 05:22:32
$dictionary["vedic_Submissions"]["fields"]["vedic_profiles_vedic_submissions_1"] = array (
  'name' => 'vedic_profiles_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_profiles_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_PROFILES_TITLE',
  'id_name' => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_profiles_vedic_submissions_1_name"] = array (
  'name' => 'vedic_profiles_vedic_submissions_1_name',
  'type' => 'relate',
  'required' => true,
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_PROFILES_TITLE',
  'save' => true,
  'id_name' => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
  'link' => 'vedic_profiles_vedic_submissions_1',
  'table' => 'vedic_profiles',
  'module' => 'vedic_Profiles',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Submissions"]["fields"]["vedic_profiles_vedic_submissions_1vedic_profiles_ida"] = array (
  'name' => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
  'type' => 'link',
  'relationship' => 'vedic_profiles_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);


// created: 2015-01-09 10:12:51
$dictionary["vedic_Submissions"]["fields"]["vedic_submissions_activities_1_meetings"] = array (
  'name' => 'vedic_submissions_activities_1_meetings',
  'type' => 'link',
  'relationship' => 'vedic_submissions_activities_1_meetings',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_VEDIC_SUBMISSIONS_ACTIVITIES_1_MEETINGS_FROM_MEETINGS_TITLE',
);


// created: 2015-01-09 10:12:51
$dictionary["vedic_Submissions"]["fields"]["vedic_submissions_activities_1_notes"] = array (
  'name' => 'vedic_submissions_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_submissions_activities_1_notes',
  'source' => 'non-db',
  'module' => 'Notes',
  'bean_name' => 'Note',
  'vname' => 'LBL_VEDIC_SUBMISSIONS_ACTIVITIES_1_NOTES_FROM_NOTES_TITLE',
);


// created: 2015-01-09 10:12:51
$dictionary["vedic_Submissions"]["fields"]["vedic_submissions_activities_1_tasks"] = array (
  'name' => 'vedic_submissions_activities_1_tasks',
  'type' => 'link',
  'relationship' => 'vedic_submissions_activities_1_tasks',
  'source' => 'non-db',
  'module' => 'Tasks',
  'bean_name' => 'Task',
  'vname' => 'LBL_VEDIC_SUBMISSIONS_ACTIVITIES_1_TASKS_FROM_TASKS_TITLE',
);

?>