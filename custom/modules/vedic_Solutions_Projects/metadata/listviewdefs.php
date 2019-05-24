<?php
$module_name = 'vedic_Solutions_Projects';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'BILLING_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BILLING_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'CHARGEABILITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CHARGEABILITY',
    'width' => '10%',
    'default' => true,
  ),
  'PROJECT_MANAGER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PROJECT_MANAGER',
    'id' => 'PROJECT_MANAGER_ID',
    'link' => true,
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
;
?>
