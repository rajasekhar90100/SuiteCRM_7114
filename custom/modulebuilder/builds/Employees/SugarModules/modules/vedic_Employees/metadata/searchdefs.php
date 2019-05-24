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
      'primary_address_city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRIMARY_ADDRESS_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'primary_address_city',
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
      'primary_address_city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRIMARY_ADDRESS_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'primary_address_city',
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
      'num_secu' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NUM_SECU',
        'width' => '10%',
        'default' => true,
        'name' => 'num_secu',
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
