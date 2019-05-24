<?php
$module_name = 'vedic_job';
$listViewDefs [$module_name] = 
array (
  'JOB_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JOB_ID',
    'width' => '8%',
  ),
  'NAME' => 
  array (
    'width' => '12%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'JOB_LOCATION_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JOB_LOCATION',
    'width' => '8%',
  ),
  'NO_OF_VACANCIES_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_NO_OF_VACANCIES',
    'width' => '8%',
  ),
  'NO_OF_CANDIDATES_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_NO_OF_CANDIDATES',
    'width' => '8%',
  ),
  'JOB_STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_JOB_STATUS',
    'width' => '5%',
  ),
  'SUBMITTER_EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_SUBMITTER_EMAIL',
    'width' => '10%',
  ),
  // 'CLIENT_C' => 
  // array (
    // 'type' => 'relate',
    // 'default' => true,
    // 'studio' => 'visible',
    // 'label' => 'LBL_CLIENT',
    // 'id' => 'VEDIC_CLIENT_ID_C',
    // 'link' => true,
    // 'width' => '10%',
  // ),
  // 'VENDORS_C' => 
  // array (
    // 'type' => 'relate',
    // 'default' => true,
    // 'studio' => 'visible',
    // 'label' => 'LBL_VENDORS',
    // 'id' => 'VEDIC_VENDOR_ID_C',
    // 'link' => true,
    // 'width' => '10%',
  // ),
  // 'VENDOR_CPNAME' => 
  // array (
    // 'type' => 'varchar',
    // 'label' => 'LBL_VENDOR_CPNAME',
    // 'width' => '8%',
    // 'default' => true,
  // ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  // 'CREATED_BY_NAME' => 
  // array (
    // 'type' => 'relate',
    // 'link' => true,
    // 'label' => 'LBL_CREATED',
    // 'id' => 'CREATED_BY',
    // 'width' => '10%',
    // 'default' => true,
  // ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  // 'JOB_CATEGORY_C' => 
  // array (
    // 'type' => 'enum',
    // 'default' => false,
    // 'studio' => 'visible',
    // 'label' => 'LBL_JOB_CATEGORY',
    // 'width' => '10%',
  // ),
  // 'TARGETDATETOHIRE_C' => 
  // array (
    // 'type' => 'date',
    // 'default' => false,
    // 'label' => 'LBL_TARGETDATETOHIRE',
    // 'width' => '8%',
  // ),
  // 'SUBMITTER_C' => 
  // array (
    // 'type' => 'relate',
    // 'default' => false,
    // 'studio' => 'visible',
    // 'label' => 'LBL_SUBMITTER',
    // 'id' => 'USER_ID_C',
    // 'link' => true,
    // 'width' => '10%',
  // ),
  // 'PROJECT_C' => 
  // array (
    // 'type' => 'relate',
    // 'default' => false,
    // 'studio' => 'visible',
    // 'label' => 'LBL_PROJECT',
    // 'id' => 'PROJECT_ID_C',
    // 'link' => true,
    // 'width' => '10%',
  // ),
);
?>
