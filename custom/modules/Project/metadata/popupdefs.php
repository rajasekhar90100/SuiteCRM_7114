<?php
$popupMeta = array (
    'moduleMain' => 'Project',
    'varName' => 'PROJECT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'project.name',
  'vedic_candidates_project_1_name' => 'project.vedic_candidates_project_1_name',
  'account_customer_c' => 'project.account_customer_c',
  'assigned_user_name' => 'project.assigned_user_name',
  'estimated_start_date' => 'project.estimated_start_date',
  'estimated_end_date' => 'project.estimated_end_date',
  'status' => 'project.status',
  'priority' => 'project.priority',
  'date_entered' => 'project.date_entered',
  'w2ctc_c' => 'project_cstm.w2ctc_c',
  'vedic_profiles_project_1_name' => 'project.vedic_profiles_project_1_name',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'vedic_candidates_project_1_name',
  2 => 'account_customer_c',
  3 => 'assigned_user_name',
  4 => 'estimated_start_date',
  5 => 'estimated_end_date',
  6 => 'status',
  7 => 'priority',
  9 => 'date_entered',
  10 => 'w2ctc_c',
  11 => 'vedic_profiles_project_1_name',
),
'create' => array (
        'formBase' => 'ProjectFormBase.php',
        'formBaseClass' => 'ProjectFormBase',
        'getFormBodyParams' => array (
            0 => '',
            1 => '',
            2 => 'ProjectSave',
        ),
        'createButton' => 'LNK_NEW_RECORD',
    ),


    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'vedic_candidates_project_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_PROJECT_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'name' => 'vedic_candidates_project_1_name',
  ),
  'vedic_profiles_project_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_VEDIC_PROFILES_TITLE',
    'id' => 'VEDIC_PROFILES_PROJECT_1VEDIC_PROFILES_IDA',
    'width' => '10%',
    'name' => 'vedic_profiles_project_1_name',
  ),
  'account_customer_c' => 
  array (
    'type' => 'relate',
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
    'name' => 'assigned_user_name',
  ),
  'w2ctc_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_W2CTC',
    'width' => '10%',
    'name' => 'w2ctc_c',
  ),
  'estimated_start_date' => 
  array (
    'name' => 'estimated_start_date',
    'width' => '10%',
  ),
  'estimated_end_date' => 
  array (
    'name' => 'estimated_end_date',
    'width' => '10%',
  ),
  'status' => 
  array (
    'name' => 'status',
    'width' => '10%',
  ),
  'priority' => 
  array (
    'name' => 'priority',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
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
    'name' => 'account_customer_c',
  ),
  'VEDIC_CANDIDATES_PROJECT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_PROJECT_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'vedic_candidates_project_1_name',
  ),
  'VEDIC_PROFILES_PROJECT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_VEDIC_PROFILES_TITLE',
    'id' => 'VEDIC_PROFILES_PROJECT_1VEDIC_PROFILES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'vedic_profiles_project_1_name',
  ),
  'PRIORITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
    'default' => true,
    'name' => 'priority',
  ),
  'W2CTC_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_W2CTC',
    'width' => '10%',
    'name' => 'w2ctc_c',
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_STATUS',
    'link' => false,
    'default' => true,
    'name' => 'status',
  ),
  'ESTIMATED_START_DATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_START',
    'link' => false,
    'default' => true,
    'name' => 'estimated_start_date',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER_ID',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'ESTIMATED_END_DATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_END',
    'link' => false,
    'default' => true,
    'name' => 'estimated_end_date',
  ),
),
);
