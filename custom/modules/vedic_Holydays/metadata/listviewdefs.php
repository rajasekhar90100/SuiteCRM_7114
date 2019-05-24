<?php
$module_name = 'vedic_Holydays';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
    'id' => 'VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1VEDIC_EMPLOYEES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'START_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_START_DATE',
    'width' => '10%',
  ),
  'END_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_END_DATE',
    'width' => '10%',
  ),
  'TYPE_OF_VACATION_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_VACATION',
    'width' => '10%',
  ),
  'VACATION_CATEGORY_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VACATION_CATEGORY',
    'width' => '10%',
  ),
  'QUANTITY' => 
  array (
    'type' => 'float',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => true,
  ),
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
);
?>
