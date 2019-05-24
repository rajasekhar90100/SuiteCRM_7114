<?php
$module_name = 'vedic_GC';
$searchdefs [$module_name] = array (
	'layout' => array (
		'basic_search' => array (
			0 => 'name',
			1 => array (
				'name' => 'current_user_only',
				'label' => 'LBL_CURRENT_USER_FILTER',
				'type' => 'bool',
			),
		),
		'advanced_search' => array (
			'name' => array (
				'name' => 'name',
				'default' => true,
				'width' => '10%',
			),
			'status' => array (
				'type' => 'enum',
				'label' => 'Status',
				'width' => '10%',
				'default' => true,
				'name' => 'status',
			),
			'gc_stage_c' => array (
				'type' => 'enum',
				'default' => true,
				'studio' => 'visible',
				'label' => 'LBL_GC_STAGE',
				'width' => '10%',
				'name' => 'gc_stage_c',
			),
			'gc_status_c' => array (
				'type' => 'enum',
				'default' => true,
				'studio' => 'visible',
				'label' => 'LBL_GC_STATUS',
				'width' => '10%',
				'name' => 'gc_status_c',
			),
			'perm_status_c' => array (
				'type' => 'enum',
				'default' => true,
				'studio' => 'visible',
				'label' => 'LBL_PERM_STATUS',
				'width' => '10%',
				'name' => 'perm_status_c',
			),
			'i_140_status_c' => array (
				'type' => 'enum',
				'default' => true,
				'label' => 'LBL_I_140_STATUS',
				'width' => '10%',
				'name' => 'i_140_status_c',
			),
			'ads_type' => array (
				'type' => 'multienum',
				'label' => 'Ads Type',
				'width' => '10%',
				'default' => true,
				'name' => 'ads_type',
			),
			'date_entered' => array (
				'type' => 'datetime',
				'label' => 'LBL_DATE_ENTERED',
				'width' => '10%',
				'default' => true,
				'name' => 'date_entered',
			),
			'assigned_user_id' => array (
				'name' => 'assigned_user_id',
				'label' => 'LBL_ASSIGNED_TO',
				'type' => 'enum',
				'function' => array (
				'name' => 'get_user_array',
				'params' => array (
					0 => false,
				),
			),
			'default' => true,
			'width' => '10%',
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