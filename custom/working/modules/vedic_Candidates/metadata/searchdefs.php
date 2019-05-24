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
		'type_hiring' => 
      array (
        'type' => 'enum',
        'label' => 'Type',
        'width' => '10%',
        'default' => true,
        'name' => 'type_hiring',
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
      'stage_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAGE',
        'width' => '10%',
        'name' => 'stage_c',
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
      'located_c' => 
      array (
        'type' => 'text',
        'default' => true,
        'label' => 'LBL_LOCATED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'located_c',
      ),
      'available_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_AVAILABLE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'available_date',
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
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'joining_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_JOINING_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'joining_date',
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
;
?>
