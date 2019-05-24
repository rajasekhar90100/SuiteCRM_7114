<?php
$module_name = 'vedic_Candidates';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'full_name' => 
      array (
        'type' => 'fullname',
        'studio' => 
        array (
          'listview' => false,
        ),
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'full_name',
      ),
      'resumesearch' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RESUMESEARCH',
        'width' => '10%',
        'height' => '3%',
        'default' => true,
        'name' => 'resumesearch',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'stage_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAGE',
        'width' => '10%',
        'name' => 'stage_c',
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
      'keyskill_list' => 
      array (
        'type' => 'multienum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_KEYSKILL_LIST',
        'width' => '10%',
        'name' => 'keyskill_list',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'name',
      ),
      'stage_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAGE',
        'width' => '10%',
        'name' => 'stage_c',
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
      'resumesearch' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RESUMESEARCH',
        'width' => '10%',
        'default' => true,
        'name' => 'resumesearch',
      ),
      'keyskill_list' => 
      array (
        'type' => 'multienum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_KEYSKILL_LIST',
        'width' => '10%',
        'name' => 'keyskill_list',
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
      'work_experience_years' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WORK_EXPERIENCE_YEARS',
        'width' => '10%',
        'default' => true,
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
      'created_by_name' => 
      array (
        'name' => 'created_by_name',
        'default' => true,
        'width' => '10%',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'dob' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DOB',
        'width' => '10%',
        'default' => true,
        'name' => 'dob',
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
      'candidatefillter' => 
      array (
        'label' => 'LBL_CANDIDATEFILTER',
        'type' => 'enum',
        'width' => '10%',
        'default' => true,
        'name' => 'candidatefillter',
      ),
	   'w2ctc_c' => 
      array (
        'type' => 'enum',
        'label' => 'Visa Status',
        'width' => '10%',
        'default' => true,
        'name' => 'w2ctc_c',
      ),
	  
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
