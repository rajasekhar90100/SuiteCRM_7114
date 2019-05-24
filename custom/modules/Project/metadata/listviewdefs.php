<?php
$listViewDefs ['Project'] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_STATUS',
    'link' => false,
    'default' => true,
  ),
  'VEDIC_CANDIDATES_PROJECT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_PROJECT_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'W2CTC_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_W2CTC',
    'width' => '10%',
  ),
  'ACCOUNT_CUSTOMER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ACCOUNT_CUSTOMER',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'INCOME_ACCOUNTS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INCOME_ACCOUNTS',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER_ID',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
    'default' => true,
  ),
  'EPOC_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EPOC',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'MPOC_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MPOC',
    'id' => 'USER_ID1_C',
    'link' => true,
    'width' => '10%',
  ),
  'ESTIMATED_START_DATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_START',
    'link' => false,
    'default' => true,
  ),
  'ESTIMATED_END_DATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_END',
    'link' => false,
    'default' => true,
  ),
  'BILLRATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLRATE',
    'link' => false,
    'default' => true,
  ),
  'PAYRATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PAYRATE',
    'link' => false,
    'default' => true,
  ),
  'ENDCLIENT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ENDCLIENT',
    'link' => false,
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
