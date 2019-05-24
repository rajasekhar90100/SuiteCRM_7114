<?php
$searchdefs ['Project'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'favorites_only' => 
      array (
        'name' => 'favorites_only',
        'label' => 'LBL_FAVORITES_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'vedic_candidates_project_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
        'id' => 'VEDIC_CANDIDATES_PROJECT_1VEDIC_CANDIDATES_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vedic_candidates_project_1_name',
      ),
      'account_customer_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ACCOUNT_CUSTOMER',
        'id' => 'ACCOUNT_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'account_customer_c',
      ),
      'assigned_user_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ASSIGNED_USER_NAME',
        'id' => 'ASSIGNED_USER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
      'w2ctc_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_W2CTC',
        'width' => '10%',
        'name' => 'w2ctc_c',
      ),
      'income_accounts_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INCOME_ACCOUNTS',
        'width' => '10%',
        'name' => 'income_accounts_c',
      ),
      'epoc_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EPOC',
        'id' => 'USER_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'epoc_c',
      ),
      'mpoc_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MPOC',
        'id' => 'USER_ID1_C',
        'link' => true,
        'width' => '10%',
        'name' => 'mpoc_c',
      ),
      'midvendor1_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MIDVENDOR1',
        'id' => 'ACCOUNT_ID1_C',
        'link' => true,
        'width' => '10%',
        'name' => 'midvendor1_c',
      ),
      'midvendor2_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MIDVENDOR2',
        'id' => 'ACCOUNT_ID2_C',
        'link' => true,
        'width' => '10%',
        'name' => 'midvendor2_c',
      ),
      'estimated_start_date' => 
      array (
        'name' => 'estimated_start_date',
        'default' => true,
        'width' => '10%',
      ),
      'estimated_end_date' => 
      array (
        'name' => 'estimated_end_date',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
      ),
      'priority' => 
      array (
        'name' => 'priority',
        'default' => true,
        'width' => '10%',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED_BY',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
	   'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
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
;
?>
