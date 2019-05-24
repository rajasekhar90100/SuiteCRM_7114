<?php
$listViewDefs ['Documents'] = array (
	'DOCUMENT_NAME' => array (
		'width' => '20%',
		'label' => 'LBL_NAME',
		'link' => true,
		'default' => true,
		'bold' => true,
	),
	'CATEGORY_ID' => array (
		'width' => '10%',
		'label' => 'LBL_LIST_CATEGORY',
		'default' => true,
	),
	'SUBCATEGORY_ID' => array (
		'width' => '15%',
		'label' => 'LBL_LIST_SUBCATEGORY',
		'default' => true,
	),
	'TEMPLATE_TYPE' => array (
		'type' => 'enum',
		'label' => 'LBL_TEMPLATE_TYPE',
		'width' => '10%',
		'default' => true,
	),
	'STATUS_ID' => array (
		'type' => 'enum',
		'label' => 'LBL_DOC_STATUS',
		'width' => '10%',
		'default' => true,
	),
	'ACTIVE_DATE' => array (
		'type' => 'date',
		'label' => 'LBL_DOC_ACTIVE_DATE',
		'width' => '10%',
		'default' => true,
	),
	'IS_PRIVATE_C' => array (
		'type' => 'bool',
		'default' => true,
		'label' => 'LBL_IS_PRIVATE',
		'width' => '10%',
	),
	'VEDIC_CANDIDATES_DOCUMENTS_1_NAME' => array (
		'type' => 'relate',
		'link' => true,
		'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
		'id' => 'VEDIC_CANDIDATES_DOCUMENTS_1VEDIC_CANDIDATES_IDA',
		'width' => '10%',
		'default' => true,
	),
	'VEDIC_IMMIGRATION_DOCUMENTS_1_NAME' => array (
		'type' => 'relate',
		'link' => true,
		'label' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
		'id' => 'VEDIC_IMMIGRATION_DOCUMENTS_1VEDIC_IMMIGRATION_IDA',
		'width' => '10%',
		'default' => true,
	),
	'ASSIGNED_USER_NAME' => array (
		'width' => '10%',
		'label' => 'LBL_LIST_ASSIGNED_USER',
		'module' => 'Employees',
		'id' => 'ASSIGNED_USER_ID',
		'default' => true,
	),
	'ACCOUNT_C' => array (
		'type' => 'relate',
		'default' => true,
		'studio' => 'visible',
		'label' => 'LBL_ACCOUNT',
		'id' => 'ACCOUNT_ID_C',
		'link' => true,
		'width' => '10%',
	),
	'DATE_ENTERED' => array (
		'width' => '10%',
		'label' => 'LBL_DATE_ENTERED',
		'default' => true,
	),
	'LAST_REV_CREATE_DATE' => array (
		'width' => '10%',
		'label' => 'LBL_LIST_LAST_REV_DATE',
		'default' => false,
		'sortable' => false,
		'related_fields' => array (
			0 => 'document_revision_id',
		),
	),
	'FILENAME' => array (
		'width' => '20%',
		'label' => 'LBL_FILENAME',
		'link' => true,
		'default' => false,
		'bold' => false,
		'displayParams' => array (
			'module' => 'Documents',
		),
		'sortable' => false,
		'related_fields' => array (
			0 => 'document_revision_id',
			1 => 'doc_id',
			2 => 'doc_type',
			3 => 'doc_url',
		),
	),
	'MODIFIED_BY_NAME' => array (
		'width' => '10%',
		'label' => 'LBL_MODIFIED_USER',
		'module' => 'Users',
		'id' => 'USERS_ID',
		'default' => false,
		'sortable' => false,
		'related_fields' => array (
			0 => 'modified_user_id',
		),
	),
);
?>