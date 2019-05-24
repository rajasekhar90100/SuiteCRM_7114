<?php
$module_name = 'vedic_Holydays';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
      'syncDetailEditViews' => true,
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
          ),
          1 => 'description',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
        ),
      ),
    ),
  ),
);
$viewdefs['vedic_Holydays']['DetailView']['templateMeta'] = array (
  'form' => 
  array (
    'buttons' => 
    array (
      0 => 'EDIT',
      1 => 'DUPLICATE',
      2 => 'DELETE',
      3 => 'FIND_DUPLICATES',
    ),
  ),
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
  'syncDetailEditViews' => true,
);
?>
