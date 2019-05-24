<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

$viewdefs['Users']['DetailView'] = array (
    'templateMeta' => array (
		'form' => array (
			/**
			 * Actions for users are configured in modules/Users/views/view.detail.php
			 * This is to control security access to the actions based on the user and system preferences.
			 * To customise in an upgrade safe way, You need to create custom view instead.
			 * Then override UsersViewDetail::preDisplay().
			 */
			'buttons' => array (),
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
			'LBL_USER_INFORMATION' => array (
				'newTab' => true,
				'panelDefault' => 'expanded',
			),
			'LBL_EMPLOYEE_INFORMATION' => array (
				'newTab' => true,
				'panelDefault' => 'collapsed',
			),
		),
	),
	'panels' => array (
		'LBL_USER_INFORMATION' => array (
			0 => array (
				0 => 'full_name',
				1 => 'user_name',
			),
			1 => array (
				0 => 'status',
				1 => array (
					'name' => 'UserType',
					'customCode' => '{$USER_TYPE_READONLY}',
				),
			),
			2 => array (
				0 => array (
					'name' => 'gender',
					'label' => 'LBL_GENDER',
				),				
				1 => array (
					'name' => 'users_vedic_secured_passwords_1_name',
				),
			),
			3 => array (
				0 => 'photo',
				1 => array (
					'name' =>'timesheetaccess',
					'label' => 'LBL_TIMESHEETACCESS',
				),
			),
		),
		'LBL_EMPLOYEE_INFORMATION' => array (
			0 => array (
				0  => array (
					'name' => 'employee_id',
					'label' => 'LBL_EMPLOYEE_ID',
				),
				1 => array (
					'name' =>'employment_type',
					'label' => 'LBL_EMPLOYMENT_TYPE',
				),
			),
			1 => array (
				0 => 'employee_status',
				1 => 'show_on_employees',
			),
			2 => array (
				0 => 'title',
				1 => 'phone_work',
			),
			3 => array (
			    0  => array (
					'name' => 'division',
					'label' => 'LBL_DIVISION',
				),
				1 => array (
					'name' =>'department',
				),
			),
			4 => array (
				0 => 'reports_to_name',
				1 =>  array (
					'name' => 'office_location',
					'label' =>  'LBL_OFFICE_LOCATION',
				),
			),
			5 => array (
			    0  => array (
					'name' => 'startdate',
					'label' => 'LBL_STARTDATE',
				),
				1 => array (
					'name' =>'enddate',
					'label' => 'LBL_ENDDATE',
				),
			),
			6 => array (
				0 => 'contract',
				1 => array (
					'name' =>'other_email',
					'label' => 'LBL_OTHER_EMAIL',
				),
			),
			7 => array (
				0 => 'phone_fax',
				1 => 'phone_home',
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
				1 => 'address_street',
			),
			10 => array (
			    0 => array(
					'name' => 'current_address_city',
					'label' =>'LBL_CURRENT_ADDRESS_CITY',
				),
				1 => 'address_city',
			),
			11 => array (
			    0 => array(
					'name' => 'current_address_state',
					'label' =>'LBL_CURRENT_ADDRESS_STATE',
				),
				1 => 'address_state',
			),
			12 => array (
				0 => array(
					'name' => 'current_address_country',
					'label' =>  'LBL_CURRENT_ADDRESS_COUNTRY',
				),
				1 => 'address_country',
				
			),
			13 => array (
			    0 => array(
					'name' => 'current_address_postalcode',
					'label' => 'LBL_CURRENT_ADDRESS_POSTAL_CODE',
				),
				1 => 'address_postalcode',
			),
			14 => array (
				0 => 'description',	
			),
		),
	),
);