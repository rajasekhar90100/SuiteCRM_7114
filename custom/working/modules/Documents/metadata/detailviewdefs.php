<?php
$viewdefs ['Documents'] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'maxColumns' => '2',
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					'hidden' => array (
						0 => '<input type="hidden" name="old_id" value="{$fields.document_revision_id.value}">',
					),
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
			'tabDefs' => array (
				'LBL_DOCUMENT_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_DETAILVIEW_PANEL2' => array (
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
							'link' => 'filename',
							'id' => 'document_revision_id',
						),
					),
					1 => array (
						'name' => 'document_name',
						'label' => 'LBL_DOC_NAME',
					),
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
					1 =>'',
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
						'label' => 'LBL_DOC_VERSION',
					),
					1 => 'active_date',
				),
				6 => array (
					0 => array (
						'name' => 'vedic_candidates_documents_1_name',
						'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
					),
					1 => array (
						'name' => 'vedic_profiles_documents_1_name',
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
						'label' => 'LBL_DOC_DESCRIPTION',
					),
				),
			),
			'lbl_detailview_panel2' => array (
				0 => array (
					0 => array (
						'name' => 'date_entered',
						'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					),
					1 => array (
						'name' => 'date_modified',
						'label' => 'LBL_DATE_MODIFIED',
						'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
					),
				),
			),
		),
	),
);
?>