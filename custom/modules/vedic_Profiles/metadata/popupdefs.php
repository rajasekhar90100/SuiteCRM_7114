<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Profiles',
    'varName' => 'vedic_Profiles',
    'orderBy' => 'vedic_profiles.first_name, vedic_profiles.last_name',
    'whereClauses' => array (
  'first_name' => 'vedic_profiles.first_name',
  'last_name' => 'vedic_profiles.last_name',
  'stage_c' => 'vedic_profiles_cstm.stage_c',
  'status_c' => 'vedic_profiles_cstm.status_c',
  'vedic_candidates_vedic_profiles_1_name' => 'vedic_profiles.vedic_candidates_vedic_profiles_1_name',
  'created_by_name' => 'vedic_profiles.created_by_name',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'stage_c',
  3 => 'status_c',
  4 => 'vedic_candidates_vedic_profiles_1_name',
  5 => 'created_by_name',
),
    'searchdefs' => array (
  'first_name' => 
  array (
    'name' => 'first_name',
    'width' => '10%',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'stage_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STAGE',
    'width' => '10%',
    'name' => 'stage_c',
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'vedic_candidates_vedic_profiles_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_PROFILES_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_VEDIC_PROFILES_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'name' => 'vedic_candidates_vedic_profiles_1_name',
  ),
  'created_by_name' => 
  array (
    'name' => 'created_by_name',
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
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
    'name' => 'name',
  ),
  'STAGE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAGE',
    'width' => '10%',
    'name' => 'stage_c',
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'VEDIC_CANDIDATES_VEDIC_PROFILES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_PROFILES_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_VEDIC_PROFILES_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
),
);
