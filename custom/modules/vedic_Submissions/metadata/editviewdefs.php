<?php
$module_name = 'vedic_Submissions';
$viewdefs [$module_name] = array (
	'EditView' => array (
		'templateMeta' => array (
			'form' => array (
				'enctype' => 'multipart/form-data',
				'hidden' => array (),
				'buttons'=> array(
					0 =>array(
					'customCode' =>'<input title="Save" accesskey="a" class="button primary" onclick="var _form = document.getElementById(\'EditView\'); _form.action.value=\'Save\'; if(check_form(\'EditView\'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="Submit" id="SAVE">'
					),
					1 => 'CANCEL',
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
			'javascript' => '{sugar_getscript file="include/javascript/popup_parent_helper.js"}
								{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
								{sugar_getscript file="modules/Documents/documents.js"}',
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
						'name' => 'submission_resume_type_c',
						'label' => 'LBL_SUBMISSION_RESUME_TYPE_C',
					),
					1 => 'document_name',
				),
				1 => array (
					0 => array (
						'name' => 'uploadfile',
						'displayParams' => array (
							'onchangeSetFileNameTo' => 'document_name',
						),
					),
				),
				2 => array (
					0 => array (
						'name' => 'vedic_candidates_vedic_submissions_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
						'displayParams' => array (
							'initial_filter' => '&submission=Marketing',
							'field' => array (
								'onblur' => 'GetCandidate()',
							),
							'javascript' => array (
								'btn' => ' onblur="GetCandidate()" ',
							),
						),
					),
					1 => array (
						'name' => 'vedic_profiles_vedic_submissions_1_name',
						'displayParams' => array (
							'initial_filter' => '&stage_c_advanced=Marketing&status_c_advanced[0]=Active&status_c_advanced[1]=Start&vedic_candidates_vedic_profiles_1_name_advanced=" + document.getElementById("vedic_candidates_vedic_submissions_1_name").value + "&vedic_candidates_vedic_profiles_1vedic_candidates_ida_advanced=" + document.getElementById("vedic_candidates_vedic_submissions_1vedic_candidates_ida").value + "',
							'field' => array (
								'onblur' => 'getProfile()',
							),
							'javascript' => array (
								'btn' => ' onblur="getProfile()" ',
							),
						),
					),
				),
				3 => array (
					0 => array (
						'name' => 'vedic_job_vedic_submissions_1_name',
						'displayParams' => array (
							'field' => array (
								'onblur' => 'GetJob()',
							),
							'javascript' => array (
								'btn' => ' onblur="GetJob()" ',
							),
						),
					),
					1 => array (
						'name' => 'documents_vedic_submissions_1_name',
						'displayParams' => array (
							'initial_filter' => '&category_id_advanced=Candidates&vedic_candidates_documents_1_name_advanced=" + document.getElementById("vedic_candidates_vedic_submissions_1_name").value + "&vedic_candidates_documents_1vedic_candidates_ida_advanced=" + document.getElementById("vedic_candidates_vedic_submissions_1vedic_candidates_ida").value + "&vedic_profiles_documents_1_name_advanced=" + document.getElementById("vedic_profiles_vedic_submissions_1_name").value + "&vedic_profiles_documents_1vedic_profiles_ida_advanced="+ document.getElementById("vedic_profiles_vedic_submissions_1vedic_profiles_ida").value + "',
							'field' => array (
								'onblur' => 'getDocument()',
							),
							'javascript' => array (
								'btn' => ' onblur="getDocument()" ',
							),
						),
					),
				),
				4 => array (
					0 => array (
						'name' => 'subject_c',
						'label' => 'LBL_SUBJECT',
					),
					1 => array (
						'name' => 'status',
						'studio' => 'visible',
						'label' => 'LBL_STATUS',
					),
				),
				5 => array (
					0 => array (
						'name' => 'is_add_job_c',
						'label' => 'LBL_IS_ADD_JOB',
					),
					1=>'',
				),
				6 => array (
					0 => array (
						'name' => 'signature_c',
						'label' => 'LBL_SIGNATURE',
					),
				),
				7 => array (
					0 => array (
						'name' => 'job_poster_email_c',
						'label' => 'LBL_JOB_POSTER_EMAIL',
					),
					1 => array (
						'name' => 'cc_c',
						'label' => 'LBL_CC',
					),
				),
				8 => array (
					0 => array (
						'name' => 'bcc_c',
						'label' => 'LBL_BCC',
					),
					1 => 'assigned_user_name',
				),
			),
		),
	),
);
?>