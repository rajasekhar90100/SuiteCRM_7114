<?php
$searchdefs ['Documents'] = array (
	'layout' => array (
		'basic_search' => array (
			0 => 'document_name',
			1 => array (
				'name' => 'favorites_only',
				'label' => 'LBL_FAVORITES_FILTER',
				'type' => 'bool',
			),
		),
		'advanced_search' => array (
			'document_name' => array (
				'name' => 'document_name',
				'default' => true,
				'width' => '10%',
			),
			'category_id' => array (
				'name' => 'category_id',
				'default' => true,
				'width' => '10%',
			),
			'status_id' => array (
				'type' => 'enum',
				'label' => 'LBL_DOC_STATUS',
				'width' => '10%',
				'default' => true,
				'name' => 'status_id',
			),
			'subcategory_id' => array (
				'name' => 'subcategory_id',
				'default' => true,
				'width' => '10%',
			),
			'template_type' => array (
				'type' => 'enum',
				'label' => 'LBL_TEMPLATE_TYPE',
				'width' => '10%',
				'default' => true,
				'name' => 'template_type',
			),
			'assigned_user_id' => array (
				'name' => 'assigned_user_id',
				'type' => 'enum',
				'label' => 'LBL_ASSIGNED_TO',
				'function' => array (
					'name' => 'get_user_array',
					'params' => array (
						0 => false,
					),
				),
				'default' => true,
				'width' => '10%',
			),
			'active_date' => array (
				'name' => 'active_date',
				'default' => true,
				'width' => '10%',
			),
			'vedic_candidates_documents_1_name' => array (
				'type' => 'relate',
				'link' => true,
				'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
				'id' => 'VEDIC_CANDIDATES_DOCUMENTS_1VEDIC_CANDIDATES_IDA',
				'width' => '10%',
				'default' => true,
				'name' => 'vedic_candidates_documents_1_name',
			),
			'vedic_immigration_documents_1_name' => array (
				'type' => 'relate',
				'link' => true,
				'label' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
				'id' => 'VEDIC_IMMIGRATION_DOCUMENTS_1VEDIC_IMMIGRATION_IDA',
				'width' => '10%',
				'default' => true,
				'name' => 'vedic_immigration_documents_1_name',
			),
			'account_c' => array (
				'type' => 'relate',
				'default' => true,
				'studio' => 'visible',
				'label' => 'LBL_ACCOUNT',
				'id' => 'ACCOUNT_ID_C',
				'link' => true,
				'width' => '10%',
				'name' => 'account_c',
			),
			'vedic_employees_documents_1_name' => array (
				'type' => 'relate',
				'link' => true,
				'label' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_VEDIC_EMPLOYEES_TITLE',
				'id' => 'VEDIC_EMPLOYEES_DOCUMENTS_1VEDIC_EMPLOYEES_IDA',
				'width' => '10%',
				'default' => true,
				'name' => 'vedic_employees_documents_1_name',
			),
			'vedic_holydays_documents_1_name' => array (
				'type' => 'relate',
				'link' => true,
				'label' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_VEDIC_HOLYDAYS_TITLE',
				'id' => 'VEDIC_HOLYDAYS_DOCUMENTS_1VEDIC_HOLYDAYS_IDA',
				'width' => '10%',
				'default' => true,
				'name' => 'vedic_holydays_documents_1_name',
			),
		),
	),
	'templateMeta' => array (
		'maxColumns' => '3',
		'maxColumnsBasic' => '4',
		'widths' => array (
			'label' => '10',
			'field' => '30',
		),
	),
);
?>