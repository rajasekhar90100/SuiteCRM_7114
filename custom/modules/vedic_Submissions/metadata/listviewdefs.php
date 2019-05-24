<?php
$module_name = 'vedic_Submissions';
$OBJECT_NAME = 'VEDIC_SUBMISSIONS';
$listViewDefs [$module_name] = 
array (
  'DOCUMENT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'link' => true,
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'SUBMISSION_RESUME_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUBMISSION_RESUME_TYPE_C',
    'width' => '10%',
  ),
  'VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
  ),
   'VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_PROFILES_TITLE',
    'id' => 'VEDIC_PROFILES_VEDIC_SUBMISSIONS_1VEDIC_PROFILES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'VEDIC_JOB_VEDIC_SUBMISSIONS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
    'id' => 'VEDIC_JOB_VEDIC_SUBMISSIONS_1VEDIC_JOB_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'JOB_POSTER_EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JOB_POSTER_EMAIL',
    'width' => '10%',
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '2%',
    'label' => 'LBL_LIST_LAST_REV_CREATOR',
    'default' => true,
    'sortable' => false,
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
  // 'CATEGORY_ID' => 
  // array (
    // 'width' => '40%',
    // 'label' => 'LBL_LIST_CATEGORY',
    // 'default' => false,
  // ),
  // 'SUBCATEGORY_ID' => 
  // array (
    // 'width' => '40%',
    // 'label' => 'LBL_LIST_SUBCATEGORY',
    // 'default' => false,
  // ),
  // 'ACTIVE_DATE' => 
  // array (
    // 'width' => '10%',
    // 'label' => 'LBL_LIST_ACTIVE_DATE',
    // 'default' => false,
  // ),
  // 'EXP_DATE' => 
  // array (
    // 'width' => '10%',
    // 'label' => 'LBL_LIST_EXP_DATE',
    // 'default' => false,
  // ),
  // 'MODIFIED_BY_NAME' => 
  // array (
    // 'width' => '10%',
    // 'label' => 'LBL_MODIFIED_USER',
    // 'module' => 'Users',
    // 'id' => 'USERS_ID',
    // 'default' => false,
    // 'sortable' => false,
    // 'related_fields' => 
    // array (
      // 0 => 'modified_user_id',
    // ),
  // ),
);
?>
