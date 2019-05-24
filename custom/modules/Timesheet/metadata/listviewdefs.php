<?php
$listViewDefs ['Timesheet'] = 
array (
'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'SHOW_PAY_PERIOD_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'link' => true,
    'label' => 'LBL_SHOW_PAY_PERIOD',
    'width' => '10%',
  ),
  'SHOW_BILL_PERIOD_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_SHOW_BILL_PERIOD',
    'width' => '10%',
  ),
  'VEDIC_CANDIDATES_TIMESHEET_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_TIMESHEET_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'PROJECT_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROJECT',
    'id' => 'PROJECT_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'CUSTOMER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CUSTOMER',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'BILLABLE' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_BILLABLE',
    'default' => true,
    'link' => true,
  ),
  'DATE_BOOKED' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_DATE_BOOKED',
    'default' => true,
  ),
  'TOTAL_HOURS_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TOTAL_HOURS',
    'width' => '10%',
  ),
  'TOTAL_AMOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ACTUAL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ACTUAL',
    'align' => 'left',
    'default' => false,
  ),
  'BILL_RATE_C' => 
  array (
    'type' => 'currency',
    'default' => false,
    'label' => 'LBL_BILL_RATE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'START_PAY_PERIOD_C' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_START_PAY_PERIOD',
    'width' => '10%',
    'link' => true,
  ),
  'REVIEWED_BY_C' => 
  array (
    'type' => 'relate',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_REVIEWED_BY',
    'id' => 'USER_ID1_C',
    'link' => true,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_EMPLOYEE',
    'link' => true,
    'default' => false,
  ),
  'GROSS_PAYMENT_AMOUNT_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_GROSS_PAYMENT_AMOUNT',
    'width' => '10%',
  ),
  'PARENT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'link' => true,
    'default' => false,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
  ),
);
?>
