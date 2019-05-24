<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Immigration',
    'varName' => 'vedic_Immigration',
    'orderBy' => 'vedic_immigration.name',
    'whereClauses' => array (
  'name' => 'vedic_immigration.name',
  'stage_c' => 'vedic_immigration_cstm.stage_c',
  'status_c' => 'vedic_immigration_cstm.status_c',
  'type_of_filing_c' => 'vedic_immigration_cstm.type_of_filing_c',
  'start_date_c' => 'vedic_immigration_cstm.start_date_c',
  'documents_received_date_c' => 'vedic_immigration_cstm.documents_received_date_c',
  'approved_date_c' => 'vedic_immigration_cstm.approved_date_c',
  'expiry_date_c' => 'vedic_immigration_cstm.expiry_date_c',
  'vedic_candidates_vedic_immigration_1_name' => 'vedic_immigration.vedic_candidates_vedic_immigration_1_name',
  'assigned_user_id' => 'vedic_immigration.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'stage_c',
  5 => 'status_c',
  6 => 'type_of_filing_c',
  7 => 'start_date_c',
  8 => 'documents_received_date_c',
  9 => 'approved_date_c',
  10 => 'expiry_date_c',
  11 => 'vedic_candidates_vedic_immigration_1_name',
  12 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
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
  'type_of_filing_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_FILING',
    'width' => '10%',
    'name' => 'type_of_filing_c',
  ),
  'start_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'name' => 'start_date_c',
  ),
  'documents_received_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DOCUMENTS_RECEIVED_DATE',
    'width' => '10%',
    'name' => 'documents_received_date_c',
  ),
  'approved_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_APPROVED_DATE',
    'width' => '10%',
    'name' => 'approved_date_c',
  ),
  'expiry_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EXPIRY_DATE',
    'width' => '10%',
    'name' => 'expiry_date_c',
  ),
  'vedic_candidates_vedic_immigration_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'name' => 'vedic_candidates_vedic_immigration_1_name',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
