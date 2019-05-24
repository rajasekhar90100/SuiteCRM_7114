<?php
$viewdefs ['Opportunities'] = 
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
      'javascript' => '{$PROBABILITY_SCRIPT}',
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
          ),
          1 => 
          array (
            'name' => 'date_closed',
          ),
        ),
        1 => 
        array (
          0 => 'account_name',
          1 => 'sales_stage',
        ),
        2 => 
        array (
          0 => 'opportunity_type',
          1 => 'probability',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'category_c',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'amount',
          ),
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 'lead_source',
        ),
        1 => 
        array (
          0 => 'next_step',
        ),
        2 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
$viewdefs['Opportunities']['EditView']['templateMeta'] = array (
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
  'javascript' => '{$PROBABILITY_SCRIPT}',
  'tabDefs' => 
  array (
    'DEFAULT' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
  ),
);
?>
