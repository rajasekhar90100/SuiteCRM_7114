<?php
$module_name = 'vedic_Holydays';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
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
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),
      'type_of_vacation_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE_OF_VACATION',
        'width' => '10%',
        'name' => 'type_of_vacation_c',
      ),
      'vacation_category_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VACATION_CATEGORY',
        'width' => '10%',
        'name' => 'vacation_category_c',
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
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'vedic_employees_vedic_holydays_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
        'id' => 'VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1VEDIC_EMPLOYEES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vedic_employees_vedic_holydays_1_name',
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
