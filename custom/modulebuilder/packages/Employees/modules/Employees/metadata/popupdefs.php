<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Employees',
    'varName' => 'vedic_Employees',
    'orderBy' => 'vedic_employees.first_name, vedic_employees.last_name',
    'whereClauses' => array (
  'first_name' => 'vedic_employees.first_name',
  'last_name' => 'vedic_employees.last_name',
  'name' => 'vedic_employees.name',
  'primary_address_city' => 'vedic_employees.primary_address_city',
  'billable' => 'vedic_employees.billable',
  'hire_date' => 'vedic_employees.hire_date',
  'num_secu' => 'vedic_employees.num_secu',
  'assigned_user_name' => 'vedic_employees.assigned_user_name',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'name',
  3 => 'primary_address_city',
  4 => 'billable',
  5 => 'hire_date',
  6 => 'num_secu',
  7 => 'assigned_user_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'first_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'name' => 'first_name',
  ),
  'last_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'name' => 'last_name',
  ),
  'primary_address_city' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'width' => '10%',
    'name' => 'primary_address_city',
  ),
  'billable' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_BILLABLE',
    'width' => '10%',
    'name' => 'billable',
  ),
  'hire_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_HIRE_DATE',
    'width' => '10%',
    'name' => 'hire_date',
  ),
  'num_secu' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NUM_SECU',
    'width' => '10%',
    'name' => 'num_secu',
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
),
    'listviewdefs' => array (
  'TRIGRAM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRIGRAM',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'BILLABLE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_BILLABLE',
    'width' => '10%',
  ),
  'PHONE_OTHER' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_OTHER_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'PRIMARY_ADDRESS_CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'NUM_SECU' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NUM_SECU',
    'width' => '10%',
    'default' => true,
  ),
  'HOLIDAY_BALANCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HOLIDAY_BALANCE',
    'width' => '10%',
    'default' => true,
  ),
  'HOLIDAY_REFERENCE' => 
  array (
    'type' => 'float',
    'label' => 'LBL_HOLIDAY_REFERENCE',
    'width' => '10%',
    'default' => true,
  ),
  'RTT_BALANCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RTT_BALANCE',
    'width' => '10%',
    'default' => true,
  ),
  'RTT_REFERENCE' => 
  array (
    'type' => 'float',
    'label' => 'LBL_RTT_REFERENCE',
    'width' => '10%',
    'default' => true,
  ),
),
);
