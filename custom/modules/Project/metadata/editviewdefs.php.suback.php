<?php
$viewdefs ['Project'] = 
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
      'form' => 
      array (
        'hidden' => '<input type="hidden" name="is_template" value="{$is_template}" />',
		'headerTpl' => 'modules/Project/tpls/header.tpl',
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
          2 => 
          array (
//            'customCode' => '<input id="myModal" title="Intuit" class="button" type="button" name="JavaScriptButton" value="Integrate with QB" onclick="qbs()" data-toggle="modal">',
          ),
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_PROJECT_INFORMATION' => 
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
    ),
    'panels' => 
    array (
      'lbl_project_information' => 
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
				'name' => 'vedic_candidates_project_1_name',
				'displayParams' => 
				array (
					'field' => 
						array (
							'onChange' => 'visa_change()',
							'onblur' => 'visa_change()',
						),
					'javascript' => 
					array (
						'btn' => 'onblur="visa_change()" ',
					),
				),
			),
			1 => 
			array (
				'name' => 'w2ctc_c',
				'studio' => 'visible',
				'label' => 'LBL_W2CTC',
			),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'account_customer_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_CUSTOMER',
          ),
          1 => 
          array (
            'name' => 'vedic_integrate_with_qb_project_name',
          ),
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'am_projecttemplates_project_1_name',
          ),
        ),
        1 => 
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
      ),
    ),
  ),
);
?>
