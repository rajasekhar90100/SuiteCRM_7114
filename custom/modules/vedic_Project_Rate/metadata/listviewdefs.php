<?php
$module_name = 'vedic_Project_Rate';
$listViewDefs [$module_name] = 
array (
  'PAY_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PAY_TYPE',
    'width' => '10%',
  ),
  'VALUE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_VALUE_C',
    'currency_format' => true,
    'width' => '10%',
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
  'PROJECT_VEDIC_PROJECT_RATE_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_PROJECT_TITLE',
    'id' => 'PROJECT_VEDIC_PROJECT_RATE_1PROJECT_IDA',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
