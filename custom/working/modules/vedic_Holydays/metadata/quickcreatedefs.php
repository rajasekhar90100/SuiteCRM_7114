<?php
$module_name = 'vedic_Holydays';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'start_date_c',
            'label' => 'LBL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'end_date_c',
            'label' => 'LBL_END_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'type_of_vacation_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_VACATION',
          ),
          1 => 
          array (
            'name' => 'vacation_category_c',
            'studio' => 'visible',
            'label' => 'LBL_VACATION_CATEGORY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'vedic_employees_vedic_holydays_1_name',
            'label' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
