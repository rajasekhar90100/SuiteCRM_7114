<?php
$module_name = 'vedic_job';
$viewdefs [$module_name] = array (
	'QuickCreate' => array (
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
			'useTabs' => false,
			'tabDefs' => array (
				'DEFAULT' => array (
					'newTab' => false,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL1' => array (
					'newTab' => false,
					'panelDefault' => 'expanded',
				),
			),
		),
		'panels' => array (
			'default' => array (
				0 => array (
					0 => 'name',
					1 => array (
						'name' => 'job_id_c',
						'label' => 'LBL_JOB_ID',
					),
				),
				1=> array(
				
					0 => array (
						'name' => 'no_of_vacancies_c',
						'label' => 'LBL_NO_OF_VACANCIES',
					),

					1=> array(
						'name' => 'job_status_c',
						'studio' => 'visible',
						'label' => 'LBL_JOB_STATUS',

					),
				),
				
				2 => array(
					0 => array (
						'name' => 'targetdatetohire_c',
						'label' => 'LBL_TARGETDATETOHIRE',
					),
					1 => array(
						'name' => 'submitter_email_c',
						'label' => 'LBL_SUBMITTER_EMAIL',
					),
				
				),
				3 => array (
					0 => array (
						'name' => 'briefdescription_c',
						'label' => 'Shareable Job Description',
					),
				),				
				4 => array (
					'name' => 'assigned_user_name',
            
				),
			
			),
		),
	),

);
?>
