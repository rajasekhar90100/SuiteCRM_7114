<?php
$module_name = 'vedic_Project_Rate';
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
		),
		'panels' => array (
			'default' => array (
				0 => array (
					0 => array (
						'name' => 'pay_type_c',
						'studio' => 'visible',
						'label' => 'LBL_PAY_TYPE',
					),
					1 => array (
						'name' => 'value_c',
						'label' => 'LBL_VALUE_C',
					),
				),
				1 => array (
					0 => array (
						'name' => 'start_date_c',
						'label' => 'LBL_START_DATE',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'validate_date()',
							),
						),
					),
					1 => array (
						'name' => 'end_date_c',
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
						'name' => 'vedic_solutions_projects_vedic_project_rate_1_name',
					),
					1 => array (
						'name' => 'projecttask_vedic_project_rate_1_name',
						'displayParams' => array (
							'field' => array (
								'onblur' => 'GetProject()',
							),
							'javascript' => array (
							'btn' => 'onblur="GetProject()"',
							),
						),
					),
				),
				3 => array (
					0 => array (
						'name' => 'project_vedic_project_rate_1_name',
					),
					1 => array (
						'name' => 'assigned_user_name',
					),
				),
				4 => array (
					0 => array (
						'name' => 'candidate',
						'label' => 'LBL_CANDIDATE',
						'customCode' => '{$flexdata}',
					),
					1 =>'',
				),
			),
		),
	),
);
?>
