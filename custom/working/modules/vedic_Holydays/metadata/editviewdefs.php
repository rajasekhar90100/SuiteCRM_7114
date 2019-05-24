<?php
$module_name = 'vedic_Holydays';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
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
            'displayParams' => 
            array (
              'field' => 
              array (
                'onChange' => 'startdate_change()',
                'onblur' => 'startdate_change()',
              ),
            ),
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
            'displayParams' => 
            array (
              'field' => 
              array (
                'onChange' => 'employee_change()',
                'onblur' => 'employee_change()',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'hours_impact_c',
            'label' => 'LBL_HOURS_IMPACT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'letter_submitted_c',
            'studio' => 'visible',
            'label' => 'LBL_LETTER_SUBMITTED',
          ),
          1 => 
          array (
            'name' => 'vacation_status_c',
            'studio' => 'visible',
            'label' => 'LBL_VACATION_STATUS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'project_type',
            'label' => 'Projects',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
      ),
    ),
  ),
);
$viewdefs['vedic_Holydays']['EditView']['templateMeta'] = array (
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
  'useTabs' => true,
  'tabDefs' => 
  array (
    'DEFAULT' => 
    array (
      'newTab' => true,
      'panelDefault' => 'expanded',
    ),
  ),
  'syncDetailEditViews' => false,
);
?>
