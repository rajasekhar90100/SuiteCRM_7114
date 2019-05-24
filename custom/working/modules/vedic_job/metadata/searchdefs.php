<?php
$module_name = 'vedic_job';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'job_id_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_JOB_ID',
        'width' => '10%',
        'name' => 'job_id_c',
      ),
      'vendor_cpname' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_VENDOR_CPNAME',
        'width' => '10%',
        'default' => true,
        'name' => 'vendor_cpname',
      ),
      'submitter_email_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SUBMITTER_EMAIL',
        'width' => '10%',
        'name' => 'submitter_email_c',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'job_status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_JOB_STATUS',
        'width' => '10%',
        'name' => 'job_status_c',
      ),
      'vendors_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VENDORS',
        'id' => 'VEDIC_VENDOR_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'vendors_c',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'job_id_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_JOB_ID',
        'width' => '10%',
        'name' => 'job_id_c',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'submitter_email_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_SUBMITTER_EMAIL',
        'width' => '10%',
        'name' => 'submitter_email_c',
      ),
      'job_status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_JOB_STATUS',
        'width' => '10%',
        'name' => 'job_status_c',
      ),
      'jobrole_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_JOBROLE',
        'width' => '10%',
        'name' => 'jobrole_c',
      ),
      'job_category_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_JOB_CATEGORY',
        'width' => '10%',
        'name' => 'job_category_c',
      ),
	  'created_by_name' => 		
      array (		
        'name' => 'created_by_name',		
        'default' => true,		
        'width' => '10%',		
      ),		
      'date_entered' => 		
      array (		
        'type' => 'datetime',		
        'label' => 'LBL_DATE_ENTERED',		
        'width' => '10%',		
        'default' => true,		
        'name' => 'date_entered',		
      ),
      'client_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CLIENT',
        'id' => 'VEDIC_CLIENT_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'client_c',
      ),
      'client_cpname_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CLIENT_CPNAME',
        'width' => '10%',
        'name' => 'client_cpname_c',
      ),
      'client_cpphone_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CLIENT_CPPHONE',
        'width' => '10%',
        'name' => 'client_cpphone_c',
      ),
      'vendors_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VENDORS',
        'link' => true,
        'width' => '10%',
        'id' => 'VEDIC_VENDOR_ID_C',
        'name' => 'vendors_c',
      ),
      'vendor_cpname' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_VENDOR_CPNAME',
        'width' => '10%',
        'default' => true,
        'name' => 'vendor_cpname',
      ),
      'vendor_cpphone' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_VENDOR_CPPHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'vendor_cpphone',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
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
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
