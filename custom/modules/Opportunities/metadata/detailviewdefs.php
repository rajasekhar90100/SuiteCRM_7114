<?php
// created: 2019-01-11 14:31:38
$viewdefs = array (
  'Opportunities' => 
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
          'LBL_PANEL_ASSIGNMENT' => 
          array (
            'newTab' => true,
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
            1 => 'date_closed',
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
              'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'assigned_user_name',
              'label' => 'LBL_ASSIGNED_TO',
            ),
            1 => 
            array (
              'name' => 'expected_revenue_c',
              'label' => 'LBL_EXPECTED_REVENUE',
            ),
          ),
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          0 => 
          array (
            0 => 'lead_source',
            1 => 'next_step',
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'description',
              'nl2br' => true,
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'date_modified',
              'label' => 'LBL_DATE_MODIFIED',
              'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            ),
            1 => 
            array (
              'name' => 'date_entered',
              'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            ),
          ),
        ),
      ),
    ),
  ),
);