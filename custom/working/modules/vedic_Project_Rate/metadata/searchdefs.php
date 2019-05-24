<?php
$module_name = 'vedic_Project_Rate';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'pay_type_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PAY_TYPE',
        'width' => '10%',
        'name' => 'pay_type_c',
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
      'pay_type_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PAY_TYPE',
        'width' => '10%',
        'name' => 'pay_type_c',
      ),
      'start_date_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_START_DATE',
        'width' => '10%',
        'name' => 'start_date_c',
      ),
      'end_date_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_END_DATE',
        'width' => '10%',
        'name' => 'end_date_c',
      ),
      'project_vedic_project_rate_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_PROJECT_TITLE',
        'id' => 'PROJECT_VEDIC_PROJECT_RATE_1PROJECT_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'project_vedic_project_rate_1_name',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
