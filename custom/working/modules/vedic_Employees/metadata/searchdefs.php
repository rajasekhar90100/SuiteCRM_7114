<?php
$module_name = 'vedic_Employees';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
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
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
      ),
      'employee_number' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EMPLOYEE_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'employee_number',
      ),
      'billable' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_BILLABLE',
        'width' => '10%',
        'name' => 'billable',
      ),
      'actual_employee' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ACTUAL_EMPLOYEE',
        'width' => '10%',
        'name' => 'actual_employee',
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
      'first_name' => 
      array (
        'name' => 'first_name',
        'default' => true,
        'width' => '10%',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'billable' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_BILLABLE',
        'width' => '10%',
        'name' => 'billable',
      ),
      'hire_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_HIRE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'hire_date',
      ),
      'i9_reminder_date_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_I9_REMINDER_DATE_C',
        'width' => '10%',
        'name' => 'i9_reminder_date_c',
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
