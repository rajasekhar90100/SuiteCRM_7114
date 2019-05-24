<?php
$module_name = 'vedic_Employees';
$listViewDefs [$module_name] = 
array (
  'TRIGRAM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRIGRAM',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'link' => true,
    'orderBy' => 'last_name',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
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
    'width' => '10%',
    'label' => 'LBL_WORK_PHONE',
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
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
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
  'DO_NOT_CALL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DO_NOT_CALL',
    'default' => false,
  ),
  'PHONE_HOME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HOME_PHONE',
    'default' => false,
  ),
  'ADDRESS_CITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'default' => false,
  ),
  'PHONE_FAX' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FAX_PHONE',
    'default' => false,
  ),
  'ADDRESS_STREET' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_STREET',
    'default' => false,
  ),
  'TITLE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TITLE',
    'default' => false,
  ),
  'PHONE_WORK' => 
  array (
    'width' => '15%',
    'label' => 'LBL_OFFICE_PHONE',
    'default' => false,
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => false,
  ),
  'ADDRESS_STATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_STATE',
    'default' => false,
  ),
  'ADDRESS_POSTALCODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
);
?>
