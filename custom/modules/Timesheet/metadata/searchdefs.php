<?php
$searchdefs ['Timesheet'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'project_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROJECT',
        'link' => true,
        'width' => '10%',
        'id' => 'PROJECT_ID_C',
        'name' => 'project_c',
      ),
      'vedic_candidates_timesheet_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'VEDIC_CANDIDATES_TIMESHEET_1VEDIC_CANDIDATES_IDA',
        'name' => 'vedic_candidates_timesheet_1_name',
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
      'vedic_candidates_timesheet_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
        'id' => 'VEDIC_CANDIDATES_TIMESHEET_1VEDIC_CANDIDATES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vedic_candidates_timesheet_1_name',
      ),
      'customer_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CUSTOMER',
        'id' => 'ACCOUNT_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'customer_c',
      ),
      'start_pay_period_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_START_PAY_PERIOD',
        'width' => '10%',
        'name' => 'start_pay_period_c',
      ),
      'project_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROJECT',
        'id' => 'PROJECT_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'project_c',
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
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'width' => '10%',
        'default' => true,
        'name' => 'current_user_only',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
