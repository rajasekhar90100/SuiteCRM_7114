<?php
$module_name = 'vedic_Solutions_Timesheet';
$viewdefs [$module_name] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					3 => 'FIND_DUPLICATES',
					4 =>  array (
						'customCode' => '{$Submit}',
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
				0 => array (
					0 => 'name',
				),
				1 => array (
					0 => 'users_vedic_solutions_timesheet_1_name',
					1=>'',
				),
				2 => array(
					0 => 'rm_approval_status',
					1 => '',
				),
				3 => array(
					0 => 'rm_reason_for_rejection',
				),
				4 => array (
					0 => array (
						'name' => 'startdate',
						'label' => 'LBL_STARTDATE',
					),
					1 => array (
						'name' => 'enddate',
						'label' => 'LBL_ENDDATE',
					),
				),
				5 => array (
					0 => array (
						'name' => 'add_timesheet',
						'label' => 'LBL_ADD_TIMESHEET',
						'customCode' => '{$showtimesheet}',
					),
				),
				6 => array (
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