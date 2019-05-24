<?php
$module_name = 'vedic_Candidates';
$viewdefs [$module_name] = array (
	'EditView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'SAVE',
					1 => 'CANCEL',
					2 => array (
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
					'panelDefault' => 'collapsed',
				),
				'LBL_EDITVIEW_PANEL6' => array (
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
			'lbl_candidate_information' => array (
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
					1 => array (
						'name' => 'role_c',
						'studio' => 'visible',
						'label' => 'LBL_ROLE',
						'customCode' => '{$role}',
					),
				),
				2 => array (
					0 => array (
						'name' => 'resume_id',
						'label' => 'LBL_RESUME_ID',
						'customCode' => '<input type="text" name="resume_id" id="resume_id" size="30" maxlength="255" value="{$fields.resume_id.value}" title=""><br/>
								<label><input type="radio" name="document_type_c" value="Passport" checked="checked" id="document_type_c" title="">Passport</label>
								<label><input type="radio" name="document_type_c" value="DriversLicense" id="document_type_c" title="">Driver\'s License</label>
								<label><input type="radio" name="document_type_c" value="EAD"  id="document_type_c" title="">EAD Copy</label><br/>
								<label><input type="radio" name="document_type_c" value="State_ID" id="document_type_c" title="">State ID</label>
								<label><input type="radio" name="document_type_c" value="Others" id="document_type_c" title="">Others</label>', 
						),
					1 => array (
						'name' => 'keyskill_list',
						'studio' => 'visible',
						'label' => 'LBL_KEYSKILL_LIST',
						'customCode' => '{$flexdata}',
					),
				),
				3 => array (
					0 => array (
						'name' => 'dob',
						'label' => 'LBL_DOB',
					),
					1 => array (
						'name' => 'functional_area',
						'label' => 'LBL_FUNCTIONAL_AREA',
					),
				),
				4 => array (
					0 => 'email1',
					1 => 'department',
				),
				5 => array (
					0 => array (
						'name' => 'stage_c',
					),
					1 => array (
						'name' => 'status',
						'studio' => 'visible',
						'label' => 'LBL_STATUS',
					),
				),
				6 => array (
					0 => 'vedic_employer_vedic_candidates_1_name',
					1 => 'assigned_user_name',
				),
				7 => array (
					0 => array (
						'name' => 'hl',
						'studio' => 'visible',
						'label' => 'LBL_HL',
					),
					1 => array (
						'name' => 'vedic_job_vedic_candidates_1_name',
					),
				),
			),
			'lbl_editview_resume_panel' => array (
				0 => array (
					0 => 'title',
					1 => array (
						'name' => 'u_documents_button',
						'label' => 'Upload Documents',
						'customCode' => '{$UPLOADDOCUMENTS}',
					),
				),
				1 => array (
					0 => array (
						'name' => 'upload_resume',
						'label' => 'Upload Resume',
						'customCode' => '{$UPLOADBUTTON}',
					),
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
			'lbl_editview_panel6' => array (
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
					0 => array (
						'name' => 'primary_address_street',
						'hideLabel' => true,
						'type' => 'address',
						'displayParams' => 
						array (
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
						'displayParams' => 
						array (
							'key' => 'alt',
							'copy' => 'primary',
							'rows' => 2,
							'cols' => 30,
							'maxlength' => 150,
						),
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
					1 => '',
				),
			),
			'lbl_editview_panel5' => array (
				0 => array (
					0 => array (
						'name' => 'primary_marketer_c',
						'studio' => 'visible',
						'label' => 'LBL_PRIMARY_MARKETER',
						'displayParams' => 
						array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
					1 => array (
						'name' => 'secondary_marketer_c',
						'studio' => 'visible',
						'label' => 'LBL_SECONDARY_MARKETER',
						'displayParams' => 
						array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
				),
				1 => array (
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
				2 => array (
					0 => array (
						'name' => 'slead_c',
						'studio' => 'visible',
						'label' => 'LBL_SLEAD',
					),
					1 => array (
						'name' => 'sales_c',
						'studio' => 'visible',
						'label' => 'LBL_SALES',
					),
				),
				3 => array (
					0 => array (
						'name' => 'ml_1_c',
						'studio' => 'visible',
						'label' => 'LBL_ML_1',
						'displayParams' => 
						array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
					1 => array (
						'name' => 'ml_2_c',
						'studio' => 'visible',
						'label' => 'LBL_ML_2',
						'displayParams' => 
						array (
							'initial_filter' => '&Security_group_advanced=233a3114-7ecb-0940-8085-567445f909d3',
						),
					),
				),
				4 => array (
					0 => array (
						'name' => 'recruiter_c',
						'studio' => 'visible',
						'label' => 'LBL_RECRUITER',
					),
					1 => array (
						'name' => 'rl',
						'studio' => 'visible',
						'label' => 'LBL_RL',
					),
				),
				5 => array (
					0 => array (
						'name' => 'joining_date',
						'label' => 'LBL_JOINING_DATE',
					),
					1 => array (
						'name' => 'available_date',
						'label' => 'LBL_AVAILABLE_DATE',
					),
				),
				6 => array (
					0 => 'h1_end_date_c',
					1 => 'notice_period',
				),
				7 => array (
					0 => array (
						'name' => 'w2ctc_c',
						'label' => 'Visa Status',
					),
					1 => array (
						'name' => 'ipp_c',
						'label' => 'Interview Participation',
					),
				),
				8 => array (
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
				9 => array (
					0 => array (),
					1 => array (
						'name' => ' ',
						'customCode' => '{$ISCONSULTANT}',
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
					1 => array(
						'name' => 'feedback_button',
						'customCode' => '{$ADDFEEDBACKBUTTON}',
					),
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