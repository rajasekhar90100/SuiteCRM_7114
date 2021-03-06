<?php
$module_name = 'vedic_Profiles';
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
				'LBL_CONTACT_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_ADDRESS_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL1' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
		),
		'panels' => array (
			'lbl_contact_information' => array (
				0 => array(
					0 => array (
						'name' => 'vedic_candidates_vedic_profiles_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_PROFILES_1_FROM_VEDIC_CANDIDATES_TITLE',
					),
					1 =>'',
				),
				1 => array (
					0 => array (
						'name' => 'stage_c',
						'studio' => 'visible',
						'label' => 'LBL_STAGE',
					),
					1 => array (
						'name' => 'status_c',
						'studio' => 'visible',
						'label' => 'LBL_STATUS',
					),
				),
				2 => array(
					0 => 'phone_mobile',
					1 => 'email_c',
				),
				3 => array (
					0 => array (
						'name' => 'phase_c',
						'studio' => 'visible',
						'label' => 'LBL_PHASE',
					),
					1 => array (
						'name' => 'h1b_stage_c',
						'studio' => 'visible',
						'label' => 'LBL_H1B_STAGE',
					),
				),
				4 => array (
					0 => array (
						'name' => 'employee_type_c',
						'studio' => 'visible',
						'label' => 'LBL_EMPLOYEE_TYPE',
					),
					1 => array (
						'name' => 'technology_c',
						'studio' => 'visible',
						'label' => 'LBL_TECHNOLOGY',
						'customCode' => '{$technology}',
					),
				),
				5 => array (
					0 => array (
						'name' => 'acl_c',
						'label' => 'LBL_ACL',
					),
					1 => 'role_c',
				),
				6 => array (
					0 => array (
						'name' => 'vedic_profiles_project_1_name',
						 'displayParams' => array (
						  'initial_filter' => '&vedic_candidates_project_1_name_advanced=" + document.getElementById("vedic_candidates_vedic_profiles_1_name").value + "&vedic_candidates_project_1vedic_candidates_ida_advanced=" + document.getElementById("vedic_candidates_vedic_profiles_1vedic_candidates_ida").value +"',
							
						),
						// 'displayParams' => array (
							// 'field' => array (
								// 'onblur' => 'getProject()',
							// ),
							// 'javascript' => array (
								// 'btn' => ' onblur="getProject()" ',
							// ),
						// ),
					),
					1 => array (
						'name' => 'end_client_c',
						'studio' => 'visible',
						'label' => 'LBL_END_CLIENT',
						'displayParams' => array (
							'initial_filter' => '&account_type_advanced=EndClient',
						),
					),
				),
				7 => array (
					0 => array (
						'name' => 'po_status_c',
					),
					1 => array (
						'name' => 'po_end_date_c',
					),
				),
				8 => array (
					0 => array (
						'name' => 'u_documents_button',
						'label' => 'Upload Documents',
						'customCode' => '{$UPLOADDOCUMENTS}',
					),
					1 => array (
						'name' => 'sell_rate_hr_c',
						'label' => 'LBL_SELL_RATE_HR',
					),
				),
				9 => array (
					0 => 'assigned_user_name',
					1 => array (
						'name' => 'hl_c',
						'studio' => 'visible',
						'label' => 'LBL_HL',
					),
				),
				10 => array (
					0 => array (
						'name' => 'notes_employee_c',
						'studio' => 'visible',
						'label' => 'LBL_NOTES_EMPLOYEE',
					),
					1 => array (
						'name' => 'notes_bench_c',
						'studio' => 'visible',
						'label' => 'LBL_NOTES_BENCH',
					),
				),
			),
			'lbl_address_information' => array (
				0 => array (
					0 => array (
						'name' => 'primary_address_street',
						'hideLabel' => true,
						'type' => 'address',
						'displayParams' => array (
							'key' => 'primary',
							'rows' => 2,
							'cols' => 30,
							'maxlength' => 150,
						),
					),
					1 => array (
						'name' => 'alt_address_street',
						'hideLabel' => true,
						'type' => 'address',
						'displayParams' => array (
							'key' => 'alt',
							'rows' => 2,
							'cols' => 30,
							'maxlength' => 150,
						),
					),
				),
				1 => array (
					0 => array (
						'name' => 'relocation_c',
						'label' => 'LBL_RELOCATION',
					),
					1 => '',
				),
			),
			'lbl_editview_panel1' => array (
				0 => array (
					0 => array (
						'name' => 'm_start_c',
						'label' => 'LBL_M_START',
					),
					1 => array (
						'name' => 'm_end_c',
						'label' => 'LBL_M_END',
					),
				),
				1 => array (
					0 => array (
						'name' => 'primary_marketer_c',
						'studio' => 'visible',
						'label' => 'LBL_PRIMARY_MARKETER',
                         'displayParams' => array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
					1 => array (
						'name' => 'secondary_marketer_c',
						'studio' => 'visible',
						'label' => 'LBL_SECONDARY_MARKETER',
                        'displayParams' => array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
				),
				2 => array (
					0 => array (
						'name' => 'hirer_1_c',
						'studio' => 'visible',
						'label' => 'LBL_HIRER_1',
					),
					1 => array (
						'name' => 'hirer_2_c',
						'studio' => 'visible',
						'label' => 'LBL_HIRER_2',
					),
				),
				3 => array (
					0 => array (
						'name' => 'ml_1_c',
						'studio' => 'visible',
						'label' => 'LBL_ML_1',
                        'displayParams' => array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
					1 => array (
						'name' => 'ml_2_c',
						'studio' => 'visible',
						'label' => 'LBL_ML_2',
                        'displayParams' => array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
				),
				4 => array (
					0 => array (
						'name' => 'slead_c',
						'label' => 'LBL_SLEAD',
					),
					1 => array (
						'name' => 'sales_c',
						'studio' => 'visible',
						'label' => 'LBL_SALES',
					),
				),
				5 => array (
					0 => array (
						'name' => 'recruiter_c',
						'studio' => 'visible',
						'label' => 'LBL_RECRUITER',
					),
					1 => array (
						'name' => 'rl_c',
						'studio' => 'visible',
						'label' => 'LBL_RL',
					),
				),
			),
		),
	),
);
?>