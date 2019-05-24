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

$module_name = 'vedic_Trainees';
$viewdefs[$module_name]['DetailView'] = array(
    'templateMeta' => array(
        'form' => array(
            'buttons' => array(
                'EDIT',
                'DUPLICATE',
                'DELETE',
                'FIND_DUPLICATES',
            ),
        ),
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_PERSONAL_DETAILS' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDUCATION_DETAILS' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => array(
        'LBL_PERSONAL_DETAILS' => array(

            array(
                'trainee_id',
				'date_of_registration',
            ),
			array(
                'first_name',
				'last_name',
            ),
			array(
                'father_name',
                'dob',
            ),
            array(
                'phone_mobile',
                'phone_other',
            ), 
			array(
                'email1',
				'gender',
            ),
        ),
        'LBL_EDUCATION_DETAILS' => array(
            array(
                'x_cgpa',
				'x_year_of_pass',
            ),
			array(
                'xii_cgpa',
                'xii_year_of_pass',
            ),
            array(
                'ug_cgpa',
                'ug_year_of_pass',
            ), 
			array(
                'ug_degree',
				'ug_specialization',
            ),
			array(
                'ug_college_name',
				'ug_university',
            ),
			array(
                'pg_cgpa',
                'pg_year_of_pass',
            ),
			array(
                'pg_degree',
				'pg_specialization',
            ),
            array(
                'pg_college',
                'pg_university',
            ), 
			array(
                'highest_degree',
				'highest_degree_registation_number',
            ),
			array(
                'highest_degree_cgpa',
				'highest_degree_year_of_pass',
            ),
			array (
					0 => 'provisional_availability',
					1 => array (
						'name' => 'resume',
						'label' => 'Resume',
						'customCode' => '<a href="{$resume}">{$resumename}</a>',
					),
					
				),
        ),

    )

);

