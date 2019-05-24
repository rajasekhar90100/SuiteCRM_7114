<?php
$module_name = 'vedic_Project_Rate';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '4',
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
        2 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        3 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/include/javascript/validate_date.js',
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
          0 => 
          array (
            'name' => 'pay_type_c',
            'studio' => 'visible',
            'label' => 'LBL_PAY_TYPE',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onChange' => 'check_previous_dates()',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'value_c',
            'label' => 'LBL_VALUE_C',
          ),
          2 => 
          array (
            'name' => 'start_date_c',
            'label' => 'LBL_START_DATE',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onChange' => 'check_previous_dates()',
              ),
            ),
          ),
          3 => 
          array (
            'name' => 'end_date_c',
            'label' => 'LBL_END_DATE',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onChange' => 'validate_date()',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'project_vedic_project_rate_1_name',
            'label' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_PROJECT_TITLE',
          ),
         1 => 
          array (
            'name' => 'assigned_user_name',
          ),
        ),
      ),
    ),
  ),
);
?>
