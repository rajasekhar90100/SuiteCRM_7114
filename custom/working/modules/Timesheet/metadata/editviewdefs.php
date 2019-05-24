<?php
$viewdefs ['Timesheet'] = array (
	'EditView' => array (
		'templateMeta' =>  array (
			'form' => array (
				'buttons' => array (
					0 => 'Save',
					1=> 'CANCEL',
					2=> array (
						'customCode' => '<input id="intuit" title="Intuit" class="button" type="button" name="intuit" value="Integrate with QB" onclick="qbs();">',
					),
				),
			),
			'maxColumns' => '2',
			'widths' => array (
				0 => array (
					'label' => '10',
					'field' => '30',
				),
				1 => array (
					'label' => '10',
					'field' => '30',
				),
			),
			'includes' => array (
				0 =>  array (
					'file' => 'custom/modules/Timesheet/js/custom.js',
				),
			),
			'useTabs' => true,
			'tabDefs' => array (
				'DEFAULT' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
		),
		'panels' => array (
			'default' => array (
				0 => array (
					0 => array (
						'name' => 'name',
						'label' => 'LBL_NAME',
					),
					1 => array (
					   'name' => 'timesheetschedule_c',
					   'label' => 'LBL_TIMESHEETSCHEDULE',
					   'displayParams' => array (
							'javascript' => 'onchange="getTimesheet()" ',
						),
					),
					
				),
				1 => array (
					0 => array (
						'name' => 'vedic_candidates_timesheet_1_name',
						'displayParams' => array (
							'field' => array (
								'onblur' => 'GetCandidate()' 
							),
							'javascript' => array (
								'btn' => ' onblur="GetCandidate()" ',
							) 
						),
					),
					1 => array (
						'name' => 'status',
						'displayParams' => array (
							'required' => true,
						),
					),
				),
				2 => array (
					0 => array (
						'name' => 'project_c',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT',
						'customCode' => '{$project}',
					),
					1 => array (
						'name' => 'customer_c',
						'studio' => 'visible',
						'label' => 'LBL_CUSTOMER',
						'customCode' => '{$customer}',
					),
				),
				3 => array (
					0 => array (
						'name' => 'start_pay_period_c',
						'label' => 'LBL_START_PAY_PERIOD',
						'customCode' => '{$js}',
					),
					1 => array (
						'name' => 'bill_period_c',
						'label' => 'LBL_BILL_PERIOD',
						'customCode' => '{$bill_js}',
					),
				),
				4 => array (
					0 => array (
						'name' => 'add_timesheet_c',
						'label' => 'LBL_ADD_TIMESHEET',
						'customCode' => '{$TIMESHEETNUMBERS}',
					),
				),
				5 => array (
					0 => array (
						'name' => 'bill_rate_c',
						//'label' => 'LBL_BILL_RATE',
						'label' => 'Pay Rate',
						'customCode' => '{$bill_rate}',
					),
					1 => array (
						'name' => 'total_amount_c',
						'label' => 'Revenue Amount',
						'customCode' => '{$total_amount}',
					),
				),
				6 => array (
					0 => array (
						'name' => 'reviewed_by_c',
						'studio' => 'visible',
						'label' => 'LBL_REVIEWED_BY',
					),
				),
				7 => array (
					0 => array (
						'name' => 'u_documents_button',
						'label' => 'Upload Documents',
						'customCode' => '{$UPLOADDOCUMENTS}',
					),
					1 => array (
					'name' => 'date_booked',
						'displayParams' => array (
							'required' => true,
							'readonly' => true,
						),
					),
				),
				8 =>  array (
					0 => array (
						'name' => 'description',
						'displayParams' =>  array (
							'rows' => '8',
							'cols' => '80',
						),
						'nl2br' => true,
					),
				),
				9 => array(
					0=> array(
						'name' => 'vacation_start_date_c',
					   'customCode' => '{$VACATION}',
					),
					

				),
				10 => array(
					'name' => 'project_description_c',
				),
			),
		),
	),
);
?>
