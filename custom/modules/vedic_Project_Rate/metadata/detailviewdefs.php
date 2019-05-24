<?php
$module_name = 'vedic_Project_Rate';
$viewdefs [$module_name] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					3 => 'FIND_DUPLICATES',
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
					),
					1 => array (
						'name' => 'end_date_c',
						'label' => 'LBL_END_DATE',
				    ),
				),
				2=> array (
					0 => array (
						'name' => 'vedic_solutions_projects_vedic_project_rate_1_name',
					),
					1 => array (
						'name' => 'projecttask_vedic_project_rate_1_name',
					),
				),
				3 => array (
					0 => array (
						'name' => 'project_vedic_project_rate_1_name',
					),
					1 => 'assigned_user_name',
				),
				4 => array (
					0 => array (
						'name' => 'candidate',
						'label' => 'LBL_CANDIDATE',
						'customCode' => '{$flexdata}',
					),
					
				),
				5 => array (
					0 => 'date_entered',
					1 => 'date_modified',
				),
			),
		),
	),
);
?>
