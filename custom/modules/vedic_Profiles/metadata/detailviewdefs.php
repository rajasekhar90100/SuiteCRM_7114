<?php
$module_name = 'vedic_Profiles';
$viewdefs [$module_name] =  array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					3 => 'FIND_DUPLICATES',
					4 => array (
						'customCode' => '{$ProfileHistory}',
					),
					5 => array (
						'customCode' => '{$MultipleCallrecords}',
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
		'panels' =>  array (
			'lbl_contact_information' => array (
				0 => array (
					0 => 'full_name',
					1 =>  array (
						'name' => 'vedic_candidates_vedic_profiles_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_PROFILES_1_FROM_VEDIC_CANDIDATES_TITLE',
					),
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
					0 => 'phase_c',
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
					1 =>
					array (
						'name' => 'technology_c',
						'studio' => 'visible',
						'label' => 'LBL_TECHNOLOGY',
					),
				),        
				5 => array (
					0 =>'acl_c',
					1 => 'sell_rate_hr_c', 
				),
				6 => array (
					0 => 'po_status_c',
					1 => 'po_end_date_c',   
				),
				7 => array (
					0 => 'vedic_profiles_project_1_name',
					1 => 'end_client_c',
				),
				8 => array (
					0 => array (
						'name' => 'hl_c',
						'studio' => 'visible',
						'label' => 'LBL_HL',
					),
					1 => 'role_c',      
				),
				9 => array (
					0 => array (
						'name' => 'notes_bench_c',
						'studio' => 'visible',
						'label' => 'LBL_NOTES_BENCH',
					),
					1 => array (
						'name' => 'notes_employee_c',
						'studio' => 'visible',
						'label' => 'LBL_NOTES_EMPLOYEE',
					),
				),
				10 => array (						
					0 => array (
						'name' => 'date_entered',
						'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					),
					1 => array (
						'name' => 'date_modified',
						'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
					),
				),
				11 => array(
					0 => 'assigned_user_name',
					1 => '',
				),
			),
			'lbl_address_information' => array (
				0 => array (
					0 => array (
						'name' => 'location_c',
					),
					1 => array (
						'name' => 'relocation_c',
						'label' => 'LBL_RELOCATION',
					),
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
					),
					1 => array (
						'name' => 'secondary_marketer_c',
						'studio' => 'visible',
						'label' => 'LBL_SECONDARY_MARKETER',
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
					),
					1 => array (
						'name' => 'ml_2_c',
						'studio' => 'visible',
						'label' => 'LBL_ML_2',
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