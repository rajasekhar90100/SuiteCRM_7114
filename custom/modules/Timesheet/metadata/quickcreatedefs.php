<?php
$viewdefs ['Timesheet'] = 
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/Timesheet/js/custom.js',
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
            'name' => 'vedic_candidates_timesheet_1_name',
            'label' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
          ),
          1 => 
          array (
            'name' => 'status',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'project_c',
            'studio' => 'visible',
            'label' => 'LBL_PROJECT',
            'customCode' => '{$project}',
          ),
          1 => 
          array (
            'name' => 'customer_c',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMER',
            'customCode' => '{$customer}',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'start_pay_period_c',
            'label' => 'LBL_START_PAY_PERIOD',
            'customCode' => '{$js}',
          ),
          1 => 
          array (
            'name' => 'bill_period_c',
            'label' => 'LBL_BILL_PERIOD',
            'customCode' => '{$bill_js}',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'add_timesheet_c',
            'label' => 'LBL_ADD_TIMESHEET',
            'customCode' => '{$TIMESHEETNUMBERS}',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'bill_rate_c',
            'label' => 'LBL_BILL_RATE',
            'customCode' => '{$bill_rate}',
          ),
          1 => 
          array (
            'name' => 'total_amount_c',
            'label' => 'LBL_TOTAL_AMOUNT',
            'customCode' => '{$total_amount}',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reviewed_by_c',
            'studio' => 'visible',
            'label' => 'LBL_REVIEWED_BY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'timesheet_doc_c',
            'label' => 'LBL_TIMESHEET_DOC',
            'customCode' => '{$upload_button}',
          ),
          1 => 
          array (
            'name' => 'date_booked',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'displayParams' => 
            array (
              'rows' => '8',
              'cols' => '80',
            ),
            'nl2br' => true,
          ),
        ),
      ),
    ),
  ),
);
?>
