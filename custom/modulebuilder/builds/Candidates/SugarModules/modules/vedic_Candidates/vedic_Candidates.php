<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
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
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
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
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

require_once('include/SugarObjects/templates/person/Person.php');

class vedic_Candidates extends Person
{
    public $new_schema = true;
    public $module_dir = 'vedic_Candidates';
    public $object_name = 'vedic_Candidates';
    public $table_name = 'vedic_candidates';
    public $importable = true;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $SecurityGroups;
    public $salutation;
    public $first_name;
    public $last_name;
    public $full_name;
    public $title;
    public $photo;
    public $department;
    public $do_not_call;
    public $phone_home;
    public $email;
    public $phone_mobile;
    public $phone_work;
    public $phone_other;
    public $phone_fax;
    public $email1;
    public $email2;
    public $invalid_email;
    public $email_opt_out;
    public $lawful_basis;
    public $date_reviewed;
    public $lawful_basis_source;
    public $primary_address_street;
    public $primary_address_street_2;
    public $primary_address_street_3;
    public $primary_address_city;
    public $primary_address_state;
    public $primary_address_postalcode;
    public $primary_address_country;
    public $alt_address_street;
    public $alt_address_street_2;
    public $alt_address_street_3;
    public $alt_address_city;
    public $alt_address_state;
    public $alt_address_postalcode;
    public $alt_address_country;
    public $assistant;
    public $assistant_phone;
    public $email_addresses_primary;
    public $email_addresses;
    public $email_addresses_non_primary;
    public $h1b;
    public $annual_salary;
    public $any_other;
    public $cakephp;
    public $comment;
    public $c;
    public $css;
    public $current_designation;
    public $drupal;
    public $expected_ctc;
    public $final_ctc;
    public $functional_area;
    public $javascript;
    public $java;
    public $joining_date;
    public $joomla;
    public $dob;
    public $linux;
    public $mysql;
    public $offered_ctc;
    public $status;
    public $oops;
    public $pgcourse;
    public $pginstitute;
    public $pgspecialization;
    public $php4;
    public $php5;
    public $postpgcourse;
    public $postpginsitute;
    public $postpgspecialization;
    public $preferred_location;
    public $reason_for_rejection;
    public $referred_by;
    public $resume_id;
    public $sugarcrm;
    public $symfony_framework;
    public $ugcourse;
    public $uginstitute;
    public $ugspecialization;
    public $work_experience_months;
    public $work_experience_years;
    public $xcart;
    public $zend_framework;
    public $vedic_recruitment_agency_id_c;
    public $recruitment_agency;
    public $vedic_teammember_id_c;
    public $vedic_employee_referer;
    public $current_location;
	
    public function bean_implements($interface)
    {
        switch($interface)
        {
            case 'ACL':
                return true;
        }

        return false;
    }
	
}