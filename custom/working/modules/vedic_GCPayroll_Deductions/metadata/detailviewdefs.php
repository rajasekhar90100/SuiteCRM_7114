<?php
$module_name = 'vedic_GCPayroll_Deductions';
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
            'name' => 'first_name',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'pay_date',
            'label' => 'LBL_PAY_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'memo',
            'label' => 'LBL_MEMO',
          ),
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'vedic_gc_vedic_gcpayroll_deductions_1_name',
          ),
        ),
        4 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
      ),
    ),
  ),
);

?>
