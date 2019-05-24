<?php
$module_name = 'vedic_Holydays';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'month' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_MONTH',
        'width' => '10%',
        'default' => true,
        'name' => 'month',
      ),
      'year' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_YEAR',
        'width' => '10%',
        'name' => 'year',
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
      'month' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_MONTH',
        'width' => '10%',
        'default' => true,
        'name' => 'month',
      ),
      'year' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_YEAR',
        'width' => '10%',
        'name' => 'year',
      ),
      'type' => 
      array (
        'type' => 'radioenum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
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
