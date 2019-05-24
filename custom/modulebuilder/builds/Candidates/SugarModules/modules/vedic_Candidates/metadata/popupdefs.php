<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Candidates',
    'varName' => 'vedic_Candidates',
    'orderBy' => 'vedic_candidates.first_name, vedic_candidates.last_name',
    'whereClauses' => array (
  'last_name' => 'vedic_candidates.last_name',
  'status' => 'vedic_candidates.status',
  'reason_for_rejection' => 'vedic_candidates.reason_for_rejection',
  'description' => 'vedic_candidates.description',
  'current_location' => 'vedic_candidates.current_location',
  'preferred_location' => 'vedic_candidates.preferred_location',
  'date_entered' => 'vedic_candidates.date_entered',
  'created_by_name' => 'vedic_candidates.created_by_name',
  'work_experience_years' => 'vedic_candidates.work_experience_years',
  'recruitment_agency' => 'vedic_candidates.recruitment_agency',
  'phone_mobile' => 'vedic_candidates.phone_mobile',
  'functional_area' => 'vedic_candidates.functional_area',
  'work_experience_months' => 'vedic_candidates.work_experience_months',
  'assigned_user_name' => 'vedic_candidates.assigned_user_name',
),
    'searchInputs' => array (
  1 => 'last_name',
  2 => 'status',
  3 => 'reason_for_rejection',
  4 => 'description',
  5 => 'current_location',
  6 => 'preferred_location',
  7 => 'date_entered',
  8 => 'created_by_name',
  9 => 'work_experience_years',
  10 => 'recruitment_agency',
  11 => 'phone_mobile',
  12 => 'functional_area',
  13 => 'work_experience_months',
  14 => 'assigned_user_name',
),
    'searchdefs' => array (
  'last_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'name' => 'last_name',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
  ),
  'reason_for_rejection' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_REASON_FOR_REJECTION',
    'width' => '10%',
    'name' => 'reason_for_rejection',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
  ),
  'current_location' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_LOCATION',
    'width' => '10%',
    'name' => 'current_location',
  ),
  'preferred_location' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PREFERRED_LOCATION',
    'width' => '10%',
    'name' => 'preferred_location',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'name' => 'date_entered',
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'name' => 'created_by_name',
  ),
  'work_experience_years' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORK_EXPERIENCE_YEARS',
    'width' => '10%',
    'name' => 'work_experience_years',
  ),
  'recruitment_agency' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_RECRUITMENT_AGENCY',
    'id' => 'VEDIC_RECRUITMENT_AGENCY_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'recruitment_agency',
  ),
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'name' => 'phone_mobile',
  ),
  'functional_area' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FUNCTIONAL_AREA',
    'width' => '10%',
    'name' => 'functional_area',
  ),
  'work_experience_months' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORK_EXPERIENCE_MONTHS',
    'width' => '10%',
    'name' => 'work_experience_months',
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
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
  'EMAIL1' => 
  array (
    'type' => 'varchar',
    'studio' => 
    array (
      'editview' => true,
      'editField' => true,
      'searchview' => false,
      'popupsearch' => false,
    ),
    'label' => 'LBL_EMAIL_ADDRESS',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'WORK_EXPERIENCE_YEARS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WORK_EXPERIENCE_YEARS',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'CURRENT_LOCATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'ANNUAL_SALARY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ANNUAL_SALARY',
    'width' => '10%',
    'default' => true,
  ),
),
);
