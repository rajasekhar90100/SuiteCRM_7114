<?php
$module_name = 'vedic_Solutions_Projects';
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
					),
					1 => array (
						'name' => 'end_date',
						'label' => 'LBL_END_DATE',
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
					0 => 'hours_to_date',
					1 => 'hours_available',
				),
				6 => array (
					0 => array (
						'name' => 'project_manager',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT_MANAGER',
					),
				    1 => 'client',
				),
				7 => array (
					0 => array (
						'name' => 'vedic_solutions_projects_vedic_solutions_projects_1_name',
					),
					1 => 'assigned_user_name',
				),
				8 => array (
					0 => array (
						'name' => 'notes',
						'label' => 'LBL_NOTES',
					),
			    ),
				9 => array (
					0 => array (
						'name' => 'date_entered',
						'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					),
					1 => array (
						'name' => 'date_modified',
						'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
					),
				),
			),
		),
	),
);
?>