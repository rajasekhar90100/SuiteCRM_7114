<?php
$module_name = 'vedic_Submissions';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'vedic_candidates_vedic_submissions_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
        'id' => 'VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1VEDIC_CANDIDATES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vedic_candidates_vedic_submissions_1_name',
      ),
      'job_poster_email_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_JOB_POSTER_EMAIL',
        'width' => '10%',
        'name' => 'job_poster_email_c',
      ),
      'document_name' => 
      array (
        'name' => 'document_name',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'vedic_job_vedic_submissions_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
        'id' => 'VEDIC_JOB_VEDIC_SUBMISSIONS_1VEDIC_JOB_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vedic_job_vedic_submissions_1_name',
      ),
    ),
    'advanced_search' => 
    array (
      'vedic_candidates_vedic_submissions_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1VEDIC_CANDIDATES_IDA',
        'name' => 'vedic_candidates_vedic_submissions_1_name',
      ),
      'vedic_job_vedic_submissions_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'VEDIC_JOB_VEDIC_SUBMISSIONS_1VEDIC_JOB_IDA',
        'name' => 'vedic_job_vedic_submissions_1_name',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'document_name' => 
      array (
        'name' => 'document_name',
        'default' => true,
        'width' => '10%',
      ),
      'job_poster_email_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_JOB_POSTER_EMAIL',
        'width' => '10%',
        'name' => 'job_poster_email_c',
      ),
      'assigned_user_name' => 
      array (
        'link' => true,
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'id' => 'ASSIGNED_USER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
	  'created_by_name' => 
      array (
        // 'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by_name',
      ),
	  'submission_resume_type_c' => 		
	      array (		
	        'type' => 'enum',		
	        'default' => true,		
	        'studio' => 'visible',		
	        'label' => 'LBL_SUBMISSION_RESUME_TYPE_C',		
	        'width' => '10%',		
	        'name' => 'submission_resume_type_c',		
	      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
