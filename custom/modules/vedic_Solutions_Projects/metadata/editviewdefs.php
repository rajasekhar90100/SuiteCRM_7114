<?php
$module_name = 'vedic_Solutions_Projects';
$viewdefs [$module_name] = array (
	'EditView' => array (
		'templateMeta' => array (
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
				0 => array (    
					0 => 'name',
					1 => array (
							'name' => 'status',
							'label' => 'LBL_STATUS',
						),
			        ),
				1 => array (
					0 => array (
						'name' => 'start_date',
						'label' => 'LBL_START_DATE',
							'displayParams' => array (
							'field' => array (
								'onChange' => 'validate_date()',
							),
						),
					),
					1 => array (
						'name' => 'end_date',
						'label' => 'LBL_END_DATE',
							'displayParams' => array (
							'field' => array (
								'onChange' => 'validate_date()',
							),
						),
					),
		        ),
				2 => array (
					0 => array (
						'name' => 'billing_type',
						'label' => 'LBL_BILLING_TYPE',
					),
					1 => array (
						'name' => 'chargeability',
						'label' => 'LBL_CHARGEABILITY',
					),
				),
				3 => array (
					0 => 'practice',
					1 => '',
				),
				4 => array (
					0 => 'sow_hours',
					1 => 'sow_value',
				),
				5 => array (
					0 => array (
						'name' => 'project_manager',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT_MANAGER',
					),
					1 => 'client',
				),
				6 => array (
					0 => array (
						'name' => 'vedic_solutions_projects_vedic_solutions_projects_1_name',
					),
					1 => 'assigned_user_name',
				),
				7 => array (
					0 => array (
						'name' => 'notes',
						'label' => 'LBL_NOTES',
					),
			    ),
			),
		),
	),
);
?>