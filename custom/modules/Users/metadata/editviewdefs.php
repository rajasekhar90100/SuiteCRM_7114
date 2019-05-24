<?php
// created: 2018-01-27 06:45:08
$viewdefs['Users']['EditView'] = array (
	'templateMeta' => array (
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
		'form' => array (
			'headerTpl' => 'modules/Users/tpls/EditViewHeader.tpl',
			'footerTpl' => 'modules/Users/tpls/EditViewFooter.tpl',
		),
		'useTabs' => false,
		'tabDefs' => array (
			'LBL_USER_INFORMATION' => array (
				'newTab' => false,
				'panelDefault' => 'expanded',
			),
			'LBL_EMPLOYEE_INFORMATION' => array (
				'newTab' => false,
				'panelDefault' => 'expanded',
			),
		),
	),
	'panels' => array (
		'LBL_USER_INFORMATION' => array (
			0 => array (
				0 => array (
					'name' => 'user_name',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => array(
					'name' => 'first_name',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			1 => array (
				0 => array (
					'name' => 'status',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$STATUS_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => 'last_name',
			),
			2 => array (
				0 => array (
					'name' => 'UserType',
					'customCode' => '{if $IS_ADMIN}{$USER_TYPE_DROPDOWN}{else}{$USER_TYPE_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => array (
					'name' => 'gender',
					'label' => 'LBL_GENDER',
				    'displayParams' => array (
						'required' => true,
					),
				),
			),
			3 => array (
				0 => array (
					'name' => 'users_vedic_secured_passwords_1_name',
				),
				1 => array (
					'name' => 'timesheetaccess',
					'label' => 'LBL_TIMESHEETACCESS',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$TIMESHEETACCESS_READONLY}{/if}',
				),
			),
		),
		'LBL_EMPLOYEE_INFORMATION' => array (
			0 => array (
				0 => array (
					'name' => 'employee_id',
					'label' => 'LBL_EMPLOYEE_ID',
					'type'=>'readonly',
				),
				1 => array (
					'name' => 'employment_type',
					'label' => 'LBL_EMPLOYMENT_TYPE',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$EMPLOYEE_TYPE_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			1 => array (
				0 => array (
					'name' => 'employee_status',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$EMPLOYEE_STATUS_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => array(
					'name' => 'show_on_employees',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			2 => array (
				0 => array (
					'name' => 'title',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$TITLE_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => 'phone_work',
			),
			3 => array (
				0 => array(
					'name' => 'division',
					'label' => 'LBL_DIVISION',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$DIVISION_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 => array (
					'name' => 'department',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$DEPARTMENT_READONLY}{/if}',
					'label' => 'LBL_DEPARTMENT',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			4 => array (
				0 => array (
					'name' => 'reports_to_name',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$REPORTS_TO_READONLY}{/if}',
					'displayParams' => array (
						'required' => true,
					),
				),
				1 =>  array (
					'name' => 'office_location',
					'label' =>  'LBL_OFFICE_LOCATION',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			5 => array (
				0 => array(
				    'name' => 'startdate',
					'label' => 'LBL_STARTDATE',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$START_DATE_READONLY}{/if}',
					'displayParams' => array (
						'field' => array (
							'onChange' => 'startdate_change()',
							'onblur' => 'startdate_change()',
						),
						'required' => true,
					),
				),
				1 => array(
					'name' => 'enddate',
					'label' =>  'LBL_ENDDATE',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$END_DATE_READONLY}{/if}',
				),
			),
			6 => array (
				0 => 'contract',
				1 => array(
					'name' => 'other_email',
					'label' =>  'LBL_OTHER_EMAIL',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$END_DATE_READONLY}{/if}',
				),
			),
			7 => array (
				0 => 'phone_fax',
				1 => array(
					'name' => 'phone_home',
					'displayParams' => array (
						'required' => true,
					),
				),
			),
			8 => array (
				0 => 'messenger_type',
				1 => 'messenger_id',
			),
			9 => array (
			    0 => array(
					'name' => 'current_address_street',
					'label' =>  'LBL_CURRENT_ADDRESS_STREET',
				),
				1 => array (
					'name' => 'address_street',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$ADDRESS_STREET_READONLY}{/if}',
				),
			),
			10 => array (
			    0 => array(
					'name' => 'current_address_city',
					'label' =>'LBL_CURRENT_ADDRESS_CITY',
				),
				1 => array (
					'name' => 'address_city',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$ADDRESS_CITY_READONLY}{/if}',
				),
			),
			11 => array (
			    0 => array(
					'name' => 'current_address_state',
					'label' =>'LBL_CURRENT_ADDRESS_STATE',
				),
				1 => array (
					'name' => 'address_state',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$ADDRESS_STATE_READONLY}{/if}',
				),
			),
			12 => array (
				0 => array(
					'name' => 'current_address_country',
					'label' =>  'LBL_CURRENT_ADDRESS_COUNTRY',
				),
				1 => array (
					'name' => 'address_country',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$ADDRESS_COUNTRY_READONLY}{/if}',
				),
			),
			13 => array (
			    0 => array(
					'name' => 'current_address_postalcode',
					'label' => 'LBL_CURRENT_ADDRESS_POSTAL_CODE',
				),
				1 => array (
					'name' => 'address_postalcode',
					'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$ADDRESS_POSTALCODE_READONLY}{/if}',
				),
			),
			14 => array (
				0 => 'photo',
				1 => '',
			),
			15 => array (
				0 => 'description',
			),
		),
	),
);