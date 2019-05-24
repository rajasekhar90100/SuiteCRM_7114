<?php
$dashletData['vedic_jobDashlet']['searchFields'] = array (
  'briefdescription_c' => 
  array (
    'default' => '',
  ),
  'searchfields' => 
  array (
    'default' => '',
  ),
  'job_status_c' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['vedic_jobDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'briefdescription_c' => 
  array (
    'type' => 'wysiwyg',
    'default' => false,
    'label' => 'LBL_BRIEFDESCRIPTION',
    'width' => '10%',
  ),
  'vendor_cpname' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VENDOR_CPNAME',
    'width' => '10%',
    'default' => false,
  ),
  'job_status_c' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_JOB_STATUS',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
