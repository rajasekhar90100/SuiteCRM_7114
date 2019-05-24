<?php
$viewdefs ['Project'] = 
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
      'tabDefs' => 
      array (
        'DEFAULT' => 
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
          0 => 'name',
          1 => 'status',
        ),
        1 => 
        array (
          0 => 'estimated_start_date',
          1 => 'estimated_end_date',
        ),
        2 => 
        array (
          0 => 'priority',
          1 => 'assigned_user_name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'account_customer_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_CUSTOMER',
          ),
          1 => 
          array (
            'name' => 'w2ctc_c',
            'studio' => 'visible',
            'label' => 'LBL_W2CTC',
          ),
        ),
      ),
    ),
  ),
);
$viewdefs['Project']['QuickCreate']['templateMeta'] = array (
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
);
?>
