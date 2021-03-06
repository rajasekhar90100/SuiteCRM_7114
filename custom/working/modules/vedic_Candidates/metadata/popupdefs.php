<?php
$popupMeta = array (
	'moduleMain' => 'vedic_Candidates',
	'varName' => 'vedic_Candidates',
	'orderBy' => 'vedic_candidates.first_name, vedic_candidates.last_name',
	'whereClauses' => array (
		'date_entered' => 'vedic_candidates.date_entered',
		'recruitment_agency' => 'vedic_candidates.recruitment_agency',
		'phone_mobile' => 'vedic_candidates.phone_mobile',
		'assigned_user_name' => 'vedic_candidates.assigned_user_name',
		'keyskill_list' => 'vedic_candidates.keyskill_list',
		'name' => 'vedic_candidates.name',
		'functional_area' => 'vedic_candidates.functional_area',
		'role_c' => 'vedic_candidates_cstm.role_c',
	),
    'searchInputs' => array (
		7 => 'date_entered',
		10 => 'recruitment_agency',
		11 => 'phone_mobile',
		14 => 'assigned_user_name',
		15 => 'keyskill_list',
		18 => 'name',
		20 => 'functional_area',
		22 => 'role_c',
	),
    'searchdefs' => array (
		'name' => array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '10%',
			'name' => 'name',
		),
		'keyskill_list' => array (
			'type' => 'multienum',
			'studio' => 'visible',
			'label' => 'LBL_KEYSKILL_LIST',
			'width' => '10%',
			'name' => 'keyskill_list',
		),
		'phone_mobile' => array (
			'type' => 'phone',
			'label' => 'LBL_MOBILE_PHONE',
			'width' => '10%',
			'name' => 'phone_mobile',
		),
		'role_c' => array (
			'type' => 'enum',
			'studio' => 'visible',
			'label' => 'LBL_ROLE',
			'width' => '10%',
			'name' => 'role_c',
		),
		'functional_area' => array (
			'type' => 'varchar',
			'label' => 'LBL_FUNCTIONAL_AREA',
			'width' => '10%',
			'name' => 'functional_area',
		),
		'date_entered' => array (
			'type' => 'datetime',
			'label' => 'LBL_DATE_ENTERED',
			'width' => '10%',
			'name' => 'date_entered',
		),
		'recruitment_agency' => array (
			'type' => 'relate',
			'studio' => 'visible',
			'label' => 'LBL_RECRUITMENT_AGENCY',
			'id' => 'VEDIC_RECRUITMENT_AGENCY_ID_C',
			'link' => true,
			'width' => '10%',
			'name' => 'recruitment_agency',
		),
		'assigned_user_name' => array (
			'link' => true,
			'type' => 'relate',
			'label' => 'LBL_ASSIGNED_TO_NAME',
			'id' => 'ASSIGNED_USER_ID',
			'width' => '10%',
			'name' => 'assigned_user_name',
		),
	),
    'listviewdefs' => array (
		'NAME' => array (
			'type' => 'name',
			'link' => true,
			'label' => 'LBL_NAME',
			'width' => '10%',
			'default' => true,
			'name' => 'name',
		),
		'TYPE_HIRING' => array (		
			'type' => 'enum',			
			'studio' => 'visible',		
			'label' => 'Type',		
			'id' => 'type_hiring',		
			'default' => true,		
			'width' => '10%',		
			'name' => 'type_hiring',
		),			
		'KEYSKILL_LIST' => array (
			'type' => 'multienum',
			'default' => true,
			'studio' => 'visible',
			'label' => 'LBL_KEYSKILL_LIST',
			'width' => '10%',
			'name' => 'keyskill_list',
		),
		'EMAIL1' =>  array (
			'type' => 'varchar',
			'studio' =>  array (
				'editview' => true,
				'editField' => true,
				'searchview' => false,
				'popupsearch' => false,
			),
			'label' => 'LBL_EMAIL_ADDRESS',
			'width' => '10%',
			'default' => true,
			'name' => 'email1',
		),
		'PHONE_MOBILE' => array (
			'type' => 'phone',
			'label' => 'LBL_MOBILE_PHONE',
			'width' => '10%',
			'default' => true,
			'name' => 'phone_mobile',
		),
		'DATE_ENTERED' => array (
			'type' => 'datetime',
			'label' => 'LBL_DATE_ENTERED',
			'width' => '10%',
			'default' => true,
		),
	),
);