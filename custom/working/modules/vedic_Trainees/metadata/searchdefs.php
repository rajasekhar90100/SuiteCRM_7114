<?php
$module_name = 'vedic_Trainees';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'search_name' => 
      array (
        'name' => 'search_name',
        'label' => 'LBL_NAME',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
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
      'date_of_registration' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_OF_REGISTRATION',
        'width' => '10%',
        'default' => true,
        'name' => 'date_of_registration',
      ),
      'highest_degree_year_of_pass' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HIGHEST_DEGREE_YEAR_OF_PASS',
        'width' => '10%',
        'default' => true,
        'name' => 'highest_degree_year_of_pass',
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
      'first_name' => 
      array (
        'name' => 'first_name',
        'default' => true,
        'width' => '10%',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10%',
      ),
      'phone_mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE_PHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_mobile',
      ),
      'email' => 
      array (
        'name' => 'email',
        'default' => true,
        'width' => '10%',
      ),
      'highest_degree' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HIGHEST_DEGREE',
        'width' => '10%',
        'default' => true,
        'name' => 'highest_degree',
      ),
      'highest_degree_cgpa' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HIGHEST_DEGREE_CGPA',
        'width' => '10%',
        'default' => true,
        'name' => 'highest_degree_cgpa',
      ),
      'highest_degree_registation_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HIGHEST_DEGREE_REGISTATION_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'highest_degree_registation_number',
      ),
      'highest_degree_year_of_pass' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HIGHEST_DEGREE_YEAR_OF_PASS',
        'width' => '10%',
        'default' => true,
        'name' => 'highest_degree_year_of_pass',
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
