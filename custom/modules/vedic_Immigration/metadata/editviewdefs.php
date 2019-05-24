<?php
$module_name = 'vedic_Immigration';
$viewdefs [$module_name] = array (
	'EditView' => array (
		'templateMeta' => array (
			'maxColumns' => '2',
			'form' => array (
				'buttons' => array (
					0 => 'SAVE',
					1 => 'CANCEL',

				),
			),
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
				'LBL_EDITVIEW_PANEL2' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL3' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL4' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
		),
		'panels' => array (
			'default' => array (
				0 => array (
					0 => array (
						'name' => 'vedic_candidates_vedic_immigration_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_CANDIDATES_TITLE',
					),
					1 => array (
						'name' => 'vedic_profiles_vedic_immigration_1_name',
						'label'=>'LBL_VEDIC_PROFILES_VEDIC_IMMIGRATION_1_FROM_VEDIC_PROFILES_TITLE',
						'displayParams' => array (
							'initial_filter' => '&vedic_candidates_vedic_profiles_1_name_advanced=" + document.getElementById("vedic_candidates_vedic_immigration_1_name").value + "&vedic_candidates_vedic_profiles_1vedic_candidates_ida_advanced=" + document.getElementById("vedic_candidates_vedic_immigration_1vedic_candidates_ida").value + "',
							'field' => array (
								'onChange' => 'profile_change()',
								'onblur' => 'profile_change()',
							),
							'javascript' => array (
							'btn' => 'onblur="profile_change()" ',
							),
						),
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
				2 => array (
					0 => array (
						'name' => 'reason_to_change_c',
						'studio' => 'visible',
						'label' => 'LBL_REASON_TO_CHANGE_C',
					),
					1=>'',
				),
				3 => array (
					0 => array (
						'name' => 'candidate_location_c',
						'label' => 'LBL_CANDIDATE_LOCATION',
					),
					1 => array (
						'name' => 'date_of_filing_c',
						'label' => 'LBL_DATE_OF_FILING',
					),
				),
				4 => array (
					0 => array (
						'name' => 'start_date_c',
						'label' => 'LBL_START_DATE',
					),
					1 => array (
						'name' => 'end_date_c',
						'label' => 'LBL_END_DATE',
					),
				),
				5 => array (
					0 => array (
						'name' => 'approved_date_c',
						'label' => 'LBL_APPROVED_DATE',
					),
					1 => array (
						'name' => 'expiry_date_c',
						'label' => 'LBL_EXPIRY_DATE',
					),
				),
			    6 => array (
					0 => array (
						'name' => 'immigration_users_c',
						'studio' => 'visible',
						'label' => 'LBL_IMMIGRATION_USERS',
					),
					1 => array (
						'name' => 'vedic_attorney_vedic_immigration_1_name',
					),
				),
			),
			'lbl_editview_panel2' => array (
				0 => array (
					0 => array (
						'name' => 'client_name_c',
						'studio' => 'visible',
						'label' => 'LBL_CLIENT_NAME_C',
					),
					1 => array (
						'name' => 'project_name_c',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'validate_att()',
								'onblur' => 'validate_att()',
							),
							'javascript' => array (
								'btn' => 'onblur="validate_att()" ',
							),
							'initial_filter' => 

								'&vedic_candidates_project_1_name_advanced="+document.getElementById("vedic_candidates_vedic_immigration_1_name").value + "&vedic_candidates_project_1vedic_candidates_ida_advanced="+document.getElementById("vedic_candidates_vedic_immigration_1vedic_candidates_ida").value + "&vedic_profiles_project_1_name_advanced=" +document.getElementById("vedic_profiles_vedic_immigration_1_name").value + "&vedic_profiles_project_1vedic_profiles_ida_advanced=" + document.getElementById("vedic_profiles_vedic_immigration_1vedic_profiles_ida").value+ "',
						),
						'studio' => 'visible',
						'label' => 'LBL_PROJECT_NAME_C',
					),
				),
				1 => array (
					0 => array (
						'name' => 'lca_wage_c',
						'label' => 'LBL_LCA_WAGE',
					),
					1 => array (
						'name' => 'lca_location_c',
						'label' => 'LBL_LCA_LOCATION',
					),
				),
				2 => array (
					0 => array (
						'name' => 'lca_case_no_c',
						'label' => 'LBL_LCA_CASE_NO',
					),
					1 => array (
						'name' => 'designation_c',
						'label' => 'LBL_DESIGNATION',
					),
				),
				3 => array (
					0 => array (
						'name' => 'project_start_date_c',
						'label' => 'LBL_PROJECT_START_DATE',
					),
					1 => array (
						'name' => 'project_end_date_c',
						'label' => 'LBL_PROJECT_END_DATE',
					),
				),
				4 => array (
					0 => array (
						'name' => 'reason_denial_c',
						'studio' => 'visible',
						'label' => 'LBL_REASON_DENIAL',
					),
				),
			),
			'lbl_editview_panel3' => array (
				0 => array (
					0 => array (
						'name' => 'type_of_filing_c',
						'studio' => 'visible',
						'label' => 'LBL_TYPE_OF_FILING',
					),
					1 => array (
						'name' => 'initiated_date_c',
						'label' => 'LBL_INITIATED_DATE_C',
						'displayParams' => array (
							'rows' => '8',
							'cols' => '80',
						),
					),
				),
				1 => array (
					0 => array (
						'name' => 'rfe_received_date_c',
						'label' => 'LBL_RFE_RECEIVED_DATE',
					),
					1 => array (
						'name' => 'rfe_replied_date_c',
						'label' => 'LBL_RFE_REPLIED_DATE',
					),
				),
				2 => array (
					0 => array (
						'name' => 'comments_by_executive_c',
						'studio' => 'visible',
						'label' => 'LBL_COMMENTS_BY_EXECUTIVE',
					),
					1 => array (
						'name' => 'comment_log_c',
						'studio' => 'visible',
						'label' => 'LBL_COMMENT_LOG',
					),
				),
			),
			'lbl_editview_panel4' => array (
				0 => array (
					0 => array (
						'name' => 'mtr_replied_date_c',
						'label' => 'LBL_MTR_REPLIED_DATE',
					),
					1 => array (
						'name' => 'mtr_received_date_c',
						'label' => 'LBL_MTR_RECEIVED_DATE',
					),
				),
				1 => array (
					0 => array (
						'name' => 'filing_fee_c',
						'label' => 'LBL_FILING_FEE',
					),
					1 => array (
						'name' => 'mtr_log_c',
						'studio' => 'visible',
						'label' => 'LBL_MTR_LOG',
					),
				),
			),
		),
	),
);

?>
