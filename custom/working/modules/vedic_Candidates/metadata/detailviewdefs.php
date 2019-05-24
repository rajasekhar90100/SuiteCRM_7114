<?php
$module_name = 'vedic_Candidates';
$viewdefs [$module_name] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					3 => 'FIND_DUPLICATES',
					4 => array (
						'customCode' => '{$HISTORY}',
					),
					5 => array (
						'customCode' => '{$CandidateHistory}',
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
				'LBL_CANDIDATE_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_RESUME_PANEL' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_DETAILVIEW_PANEL6' => array (
					'newTab' => true,
					'panelDefault' => 'collapsed',
				),
				'LBL_EMAIL_ADDRESSES' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_ADDRESS_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL4' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL5' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL7' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
			'syncDetailEditViews' => false,
		),
		'panels' => array (
			'LBL_CANDIDATE_INFORMATION' => array (
				0 => array (
					0 => 'first_name',
					1 => array (
						'name' => 'last_name',
						'comment' => 'Last name of the contact',
						'label' => 'Last Name',
					),
				),
				1 => array (
					0 => 'type_hiring',
					1 => 'role_c',
				),
				2 => array (
					0 => array (
						'name' => 'keyskill_list',
						'label' => 'LBL_KEYSKILL_LIST',
						'customCode' => '{$keyskilllist}',
					),
				),
				3 => array (
					0 => array (
						'name' => 'resume_id',
						'label' => 'LBL_RESUME_ID',
					),
					1 => array (
						'name' => 'dob',
						'label' => 'LBL_DOB',
					),
				),
				4 => array (
					0 => array (
						'name' => 'functional_area',
						'label' => 'LBL_FUNCTIONAL_AREA',
					),
					1 => array (
						'name' => 'department',
					),
				),
				5 => array (
					0 => 'email1',
					1 => array (
						'name' => 'vedic_job_vedic_candidates_1_name',
					),
				),
				6 => array (
					0 => array (
						'name' => 'vedic_employer_vedic_candidates_1_name',
					),
					1 => array (
						'name' => 'assigned_user_name',
					),
				),
				7 => array (
					0 =>'stage_c',
					1 =>'status',
				),
			),
			'lbl_editview_resume_panel' => array (
				0 => array (
					0 => array (
						'name' => 'resumepath',
						'label' => 'Resume',
						'customCode' => '<a href="{$resumepath}">{$resumename}</a>',
					),
					1 => 'title',
				),
				1 => array (
					0 => array (
						'name' => 'r_preview_button',
						'label' => 'Resume Preview',
						'customCode' => '{$PREVIEWBUTTON}',
					),
					1 => '',
				),
				2 => array (
					0 => array (
						'name' => 'resume_summary_c',
						'label' => 'Resume Summary',
					),
				),
				3 => array (
					0 => array (
						'name' => 'work_experience_years',
						'label' => 'LBL_WORK_EXPERIENCE_YEARS',
					),
					1 => array (
						'name' => 'work_experience_months',
						'label' => 'LBL_WORK_EXPERIENCE_MONTHS',
					),
				),
			),
			'lbl_detailview_panel6' => array (
				0 => array (
					0 => array (
						'name' => 'ugcourse',
						'label' => 'LBL_UGCOURSE',
					),
					1 => array (
						'name' => 'uginstitute',
						'label' => 'LBL_UGINSTITUTE',
					),
				),
				1 => array (
					0 => array (
						'name' => 'ugspecialization',
						'label' => 'LBL_UGSPECIALIZATION',
					),
					1 => array (
						'name' => 'graduationdate_ug_c',
					),
				),
				2 => array (
					0 => array (
						'name' => 'pgcourse',
						'label' => 'LBL_PGCOURSE',
					),
					1 => array (
						'name' => 'pginstitute',
						'label' => 'LBL_PGINSTITUTE',
					),
				),
				3 => array (
					0 => array (
						'name' => 'pgspecialization',
						'label' => 'LBL_PGSPECIALIZATION',
					),
					1 => array (
						'name' => 'graduationdate_pg_c',
					),
					),
				4 => array (
					0 => array (
						'name' => 'postpgcourse',
						'label' => 'LBL_POSTPGCOURSE',
					),
					1 => array (
						'name' => 'postpginsitute',
						'label' => 'LBL_POSTPGINSITUTE',
					),
				),
				5 => array (
					0 => array (
						'name' => 'postpgspecialization',
						'label' => 'LBL_POSTPGSPECIALIZATION',
					),
					1 => array (
						'name' => 'graduationdate_ppg_c',
					),
				),
			),
			'lbl_email_addresses' => array (
				0 => array (
					0 => array (
						'name' => 'ssn_c',
						'label' => 'LBL_SSN_C',
					),
					1 => '',
				),
				1 => array (
					0 => 'phone_mobile',
					1 => 'phone_work',
				),
				2 => array (
					0 => array (
						'name' => 'phone_home',
						'comment' => 'Home phone number of the contact',
						'label' => 'LBL_HOME_PHONE',
					),
					1 => array (
						'name' => 'phone_other',
						'comment' => 'Other phone number for the contact',
						'label' => 'LBL_OTHER_PHONE',
					),
				),
			),
			'lbl_address_information' => array (
				0 => array (
					0 => 'primary_address_street',
					1 => 'alt_address_street',
				),
				1 => array (
					0 => array (
						'name' => 'primary_address_city',
						'comment' => 'City for primary address',
						'label' => 'LBL_PRIMARY_ADDRESS_CITY',
					),
					1 => array (
						'name' => 'alt_address_city',
						'comment' => 'City for alternate address',
						'label' => 'LBL_ALT_ADDRESS_CITY',
					),
				),
				2 => array (
					0 => array (
						'name' => 'primary_address_state',
						'comment' => 'State for primary address',
						'label' => 'LBL_PRIMARY_ADDRESS_STATE',
					),
					1 => array (
						'name' => 'alt_address_state',
						'comment' => 'State for alternate address',
						'label' => 'LBL_ALT_ADDRESS_STATE',
					),
				),
				3 => array (
					0 => array (
						'name' => 'primary_address_postalcode',
						'comment' => 'Postal code for primary address',
						'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
					),
					1 => array (
						'name' => 'alt_address_postalcode',
						'comment' => 'Postal code for alternate address',
						'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
					),
				),
				4 => array (
					0 => array (
						'name' => 'primary_address_country',
						'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
					),
					1 => array (
						'name' => 'alt_address_country',
						'label' => 'LBL_ALT_ADDRESS_COUNTRY',
					),
				),
			),
			'lbl_editview_panel4' => array (
				0 => array (
					0 => array (
						'name' => 'annual_salary',
						'label' => 'LBL_ANNUAL_SALARY',
					),
					1 => array (
						'name' => 'expected_ctc',
						'label' => 'LBL_EXPECTED_CTC',
					),
				),
				1 => array (
					0 => array (
						'name' => 'offered_ctc',
						'label' => 'LBL_OFFERED_CTC',
					),
					1 => array (
						'name' => 'final_ctc',
						'label' => 'LBL_FINAL_CTC',
					),
				),
				2 => array (
					0 => array (
						'name' => 'comment',
						'label' => 'LBL_COMMENT',
					),
					1 => array (
						'name' => 'adp_file_no_c',
						'label' => 'ADP File #',
					),
				),
				3 => array (
					0 => array (
						'name' => 'auto_rate_3_c',
						'label' => 'LBL_AUTO_RATE_3',
					),
					1 =>'',
				),
			),
			'lbl_editview_panel5' => array (
				0 => array (
					0 => array (
						'name' => 'joining_date',
						'label' => 'LBL_JOINING_DATE',
					),
					1 => array (
						'name' => 'available_date',
						'label' => 'LBL_AVAILABLE_DATE',
					),
				),
				1 => array (
					0 => 'h1_end_date_c',
					1 => 'notice_period',
				),
				2 => array (
					0 => array (
						'name' => 'w2ctc_c',
						'label' => 'Visa Status',
					),
					1 => array (
						'name' => 'ipp_c',
						'label' => 'Interview Participation',
					),
				),
				3 => array (
					0 => array (
						'name' => 'vedic_employee_referer_n_c',
						'studio' => 'visible',
						'label' => 'LBL_VEDIC_EMPLOYEE_REFERER_N',
					),
					1 => array (
						'name' => 'recruitment_agency',
						'studio' => 'visible',
						'label' => 'LBL_RECRUITMENT_AGENCY',
					),
				),
			),
			'lbl_editview_panel7' => array (			
				0 => array(
					0 => array (
						'name' => 'comments_by',
						'label' => 'LBL_COMMENTS_BY',
						'customCode' => '{$COMMENTSBY}',
					),
					1 => '',
				),				
				1 => array(
					0 => array (
						'name' => 'communication_rating',
						'label' => 'LBL_COMMUNICATION_RATING',
						'customCode' => '{$COMMUNICATIONRATING}',
					),
					1 => array (
							'name' => 'communication_comments',
							'label' => 'LBL_COMMUNICATION_COMMENTS',
						  ),
			
				),
				2 => array (
					0 => array (
						'name' => 'technical_rating',
						'label' => 'LBL_TECHNICAL_RATING',
						'customCode' => '{$TECHNICALRATING}',
					),
                    1=>  'technical_comments',
				),
				3 => array (
					0 => array (
						'name' => 'functional_rating',
						'label' => 'LBL_FUNCTIONAL_RATING',
						'customCode' => '{$FUNCTIONALRATING}',
					),
                    1=>  'functional_comments',
				),
				4 => array (
					0 => array (
						'name' => 'evaluation_rating',
						'label' => 'LBL_EVALUATION_RATING',
						'customCode' => '{$EVALUATIONRATING}',
					),
                    1=>  'evaluation_comments',
				),
			),
		),
	),
);
?>