<?php
$viewdefs ['Timesheet'] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					1 => 'DELETE',
					2 => array (
						'customCode' => '<input id="intuit" title="Intuit" class="button" type="button" name="JavaScriptButton" value="Integrate with QB" onclick="qb()">',
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
				0 => array(
						0 => array(
							'name'=>'name',
						),
						1 => array (
							'name' => 'timesheetschedule_c',
							'label' => 'LBL_TIMESHEETSCHEDULE',
						),					
				),			
				1 => array (
					0 => array (
						'name' => 'vedic_candidates_timesheet_1_name',
					),
					1 => 'status',
				),
				2 => array (
					0 => array (
						'name' => 'project_c',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT',
					),
					1 => array (
						'name' => 'customer_c',
						'studio' => 'visible',
						'label' => 'LBL_CUSTOMER',
					),
				),
				3 => array (
					0 => array (
						'name' => 'start_pay_period_c',
						'label' => 'LBL_START_PAY_PERIOD',
						'customCode' => '{$start_end}',
					),
					1 => array (
						'name' => 'show_bill_period_c',
						'label' => 'LBL_SHOW_BILL_PERIOD',
					),
				),
				4 => array (
					0 => array (
						'name' => 'add_timesheet_c',
						'label' => 'LBL_ADD_TIMESHEET',
						'customCode' => '{$showtimesheet}',
					),
				),
				5 => array (
					0 => array (
						'name' => 'pay_rate_c',
						'label' => 'LBL_PAY_RATE',
					),
					1 => array (
						'name' => 'total_amount_c',
						'label' => 'LBL_TOTAL_AMOUNT',
					),
				),
				6 => array (
					0 => array (
						'name' => 'reviewed_by_c',
						'studio' => 'visible',
						'label' => 'LBL_REVIEWED_BY',
					),
					1 => array (
						'name' => 'date_booked',
					),
				),
				7 => array (
					0 => 'description',
				),
				8 => array (
					0 => 'created_by_name',
					1 => 'modified_by_name',
				),
				9 => array (
					0 => array (
						'name' => 'vacation_start_date_c',
					),
					1 => array (
						'name' => 'vacation_end_date_c',
					),
				),
				10 => array (
					0 => 'project_description_c',
				),
			),
		),
	),
);
?>
