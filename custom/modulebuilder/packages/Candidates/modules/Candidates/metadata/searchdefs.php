<?php
$module_name = 'vedic_Candidates';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
      ),
      'current_location' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CURRENT_LOCATION',
        'width' => '10%',
        'default' => true,
        'name' => 'current_location',
      ),
      'work_experience_years' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WORK_EXPERIENCE_YEARS',
        'width' => '10%',
        'default' => true,
        'name' => 'work_experience_years',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
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
      'email' => 
      array (
        'type' => 'email',
        'studio' => 
        array (
          'visible' => false,
          'searchview' => true,
        ),
        'label' => 'LBL_ANY_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'reason_for_rejection' => 
      array (
        'type' => 'multienum',
        'default' => true,
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
        'default' => true,
        'name' => 'description',
      ),
      'current_location' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CURRENT_LOCATION',
        'width' => '10%',
        'default' => true,
        'name' => 'current_location',
      ),
      'preferred_location' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PREFERRED_LOCATION',
        'width' => '10%',
        'default' => true,
        'name' => 'preferred_location',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'created_by_name' => 
      array (
        'name' => 'created_by_name',
        'default' => true,
        'width' => '10%',
      ),
      'work_experience_years' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WORK_EXPERIENCE_YEARS',
        'width' => '10%',
        'default' => true,
        'name' => 'work_experience_years',
      ),
      'work_experience_months' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WORK_EXPERIENCE_MONTHS',
        'width' => '10%',
        'default' => true,
        'name' => 'work_experience_months',
      ),
      'recruitment_agency' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_RECRUITMENT_AGENCY',
        'id' => 'VEDIC_RECRUITMENT_AGENCY_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'recruitment_agency',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'functional_area' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FUNCTIONAL_AREA',
        'width' => '10%',
        'default' => true,
        'name' => 'functional_area',
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
?>
