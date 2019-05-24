<?php
$viewdefs ['Documents'] = array (
	'EditView' => array (
		'templateMeta' => array (
			'form' => array (
				'enctype' => 'multipart/form-data',
				'hidden' => array (
					0 => '<input type="hidden" name="old_id" value="{$fields.document_revision_id.value}">',
					1 => '<input type="hidden" name="contract_id" value="{$smarty.request.contract_id}">',
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
			'tabDefs' => array (
				'LBL_DOCUMENT_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
			'useTabs' => true,
		),
		'panels' => array (
			'lbl_document_information' => array (
				0 => array (
					0 => array (
						'name' => 'filename',
						'displayParams' => array (
							'onchangeSetFileNameTo' => 'document_name',
						),
					),
					1 => 'document_name',
				),
				1 => array (
					0 => array (
						'name' => 'status_id',
						'label' => 'LBL_DOC_STATUS',
					),
					1 => array (
						'name' => 'template_type',
						'label' => 'LBL_DET_TEMPLATE_TYPE',
					),
				),
				2 => array (
					0 => array (
						'name' => 'is_private_c',
						'label' => 'LBL_IS_PRIVATE',
					),
				),
				3 => array (
					0 => 'category_id',
					1 => 'subcategory_id',
				),
				4 => array (
					0 => array (
						'name' => 'start_date_c',
						'label' => 'LBL_START_DATE_C',
					),
					1 => 'exp_date',
				),
				5 => array (
					0 => array (
						'name' => 'revision',
						'customCode' => '<input name="revision" type="text" value="{$fields.revision.value}" {$DISABLED}>',
					),
					1 => array (
						'name' => 'active_date',
					),
				),
				6 => array (
					0 => array (
						'name' => 'vedic_candidates_documents_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
						'displayParams' => array (
							'field' => array (
								'onblur' => 'reloadProfile()',
							),
							'javascript' => array (
								'btn' => ' onblur="reloadProfile()" ',
							),
						),
					),
					1 => array (
						'name' => 'vedic_profiles_documents_1_name',
						'displayParams' => array (
							'initial_filter' => '&vedic_candidates_vedic_profiles_1_name_advanced=" + document.getElementById("vedic_candidates_documents_1_name").value + "&vedic_candidates_vedic_profiles_1vedic_candidates_ida_advanced=" + document.getElementById("vedic_candidates_documents_1vedic_candidates_ida").value + "',
						),
					),
				),
				7 => array (
					0 => array (
						'name' => 'vedic_immigration_documents_1_name',
						'label' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
					),
					1 => array (
						'name' => 'account_c',
						'studio' => 'visible',
						'label' => 'LBL_ACCOUNT',
					),
				),
				8 => array (
					0 => array (
						'name' => 'vedic_employees_documents_1_name',
					),
					1 => array (
						'name' => 'vedic_holydays_documents_1_name',
					),
				),
				9 => array (
					0 => array (
						'name' => 'timesheet_documents_1_name',
					),
					1 => array (
						'name' => 'vedic_gc_documents_1_name',
					),
				),
				10 => array (
					0 => array (
						'name' => 'users_documents_1_name',
						'label' => 'LBL_USERS_DOCUMENTS_1_FROM_USERS_TITLE',
					),
					1 => array (
						'name' => 'assigned_user_name',
						'label' => 'LBL_ASSIGNED_TO_NAME',
					),
				),
				11 => array (
					0 => array (
						'name' => 'description',
					),
				),
			),
		),
	),
);
?>