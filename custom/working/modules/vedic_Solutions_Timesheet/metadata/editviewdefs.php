<?php
$module_name = 'vedic_Solutions_Timesheet';
$viewdefs [$module_name] = array (
	'EditView' => array (
		'templateMeta' => array (
		 'form' => array (
			 'buttons' =>  array (
				  0 => 'SAVE',
				  1 => 'CANCEL',
				  2 =>  array (
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
					0 => array (
						'name' => 'users_vedic_solutions_timesheet_1_name',
						'label' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_NAME',
						'displayParams' => 
						array (
						  'field' => 
						  array (
							'onblur' => 'GetTimesheet()',
						  ),
						  'javascript' => 
						  array (
							'btn' => ' onblur="GetTimesheet()" ',
						  ),
						),
					),
					1 => array (
						'name' => 'timesheet_week',
						'label' => 'LBL_TIMESHEET_WEEK',
						'customCode' => '{$WEEK_NUMBER}',
					),
				),
				1 => array (
					0 => array (
						'name' => 'startdate',
						'label' => 'LBL_STARTDATE',
					),
					1 => array (
						'name' => 'enddate',
						'label' => 'LBL_ENDDATE',
					),
				),
				2 => array (
					0 => array (
						'name' => 'add_timesheet',
						'label' => 'LBL_ADD_TIMESHEET',
						'customCode' => '{$TIMESHEET}',
					),
				),
			),
		),
	),
);
?>