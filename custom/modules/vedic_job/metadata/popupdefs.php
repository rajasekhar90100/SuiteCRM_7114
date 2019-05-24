<?php
$popupMeta = array (
    'moduleMain' => 'vedic_job',
    'varName' => 'vedic_job',
    'orderBy' => 'vedic_job.name',
    'whereClauses' => array (
  'name' => 'vedic_job.name',
  'job_id_c' => 'vedic_job_cstm.job_id_c',
  'job_status_c' => 'vedic_job_cstm.job_status_c',
  'assigned_user_id' => 'vedic_job.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'job_id_c',
  5 => 'job_status_c',
  6 => 'assigned_user_id',
),
'create' => array (
		'formBase' => 'vedic_jobFormBase.php',
		'formBaseClass' => 'vedic_jobFormBase',
		'getFormBodyParams' => array (
			0 => '',
			1 => '',
			2 => 'vedic_jobSave',
		),
		'createButton' => 'LNK_NEW_RECORD',
	),
    'searchdefs' => array (
  'job_id_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_JOB_ID',
    'width' => '10%',
    'name' => 'job_id_c',
  ),
  'job_status_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_JOB_STATUS',
    'width' => '10%',
    'name' => 'job_status_c',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'JOB_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JOB_ID',
    'width' => '8%',
    'name' => 'job_id_c',
  ),
  'NAME' => 
  array (
    'width' => '12%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'JOB_LOCATION_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JOB_LOCATION',
    'width' => '8%',
    'name' => 'job_location_c',
  ),
  'TARGETDATETOHIRE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_TARGETDATETOHIRE',
    'width' => '8%',
    'name' => 'targetdatetohire_c',
  ),
  'NO_OF_VACANCIES_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_NO_OF_VACANCIES',
    'width' => '8%',
    'name' => 'no_of_vacancies_c',
  ),
  'NO_OF_CANDIDATES_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_NO_OF_CANDIDATES',
    'width' => '8%',
    'name' => 'no_of_candidates_c',
  ),
  'JOB_STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_JOB_STATUS',
    'width' => '5%',
    'name' => 'job_status_c',
  ),
  'JOB_CATEGORY_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_JOB_CATEGORY',
    'width' => '10%',
    'name' => 'job_category_c',
  ),
  'SUBMITTER_EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_SUBMITTER_EMAIL',
    'width' => '10%',
    'name' => 'submitter_email_c',
  ),
  'VENDOR_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VENDOR',
    'width' => '10%',
    'name' => 'vendor_c',
  ),
  'VENDOR_CPNAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VENDOR_CPNAME',
    'width' => '8%',
    'default' => true,
    'name' => 'vendor_cpname',
  ),
  'VENDOR_CPPHONE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VENDOR_CPPHONE',
    'width' => '8%',
    'default' => true,
    'name' => 'vendor_cpphone',
  ),
),
);
