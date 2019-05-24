<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-11 12:28:48
$dictionary["Document"]["fields"]["aos_products_documents_1"] = array (
  'name' => 'aos_products_documents_1',
  'type' => 'link',
  'relationship' => 'aos_products_documents_1',
  'source' => 'non-db',
  'module' => 'AOS_Products',
  'bean_name' => 'AOS_Products',
  'vname' => 'LBL_AOS_PRODUCTS_DOCUMENTS_1_FROM_AOS_PRODUCTS_TITLE',
);


$dictionary['Documents']['audited'] = true;  

// created: 2017-11-04 07:38:00
$dictionary["Document"]["fields"]["documents_vedic_submissions_1"] = array (
  'name' => 'documents_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'documents_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_Submissions',
  'bean_name' => 'vedic_Submissions',
  'side' => 'right',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);



$dictionary['Document']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_documents',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2019-05-06 17:28:11
$dictionary['Document']['fields']['account_c']['inline_edit']='1';
$dictionary['Document']['fields']['account_c']['labelValue']='Accounts';

 

 // created: 2019-05-06 17:28:12
$dictionary['Document']['fields']['account_id_c']['inline_edit']=1;

 

 // created: 2016-05-18 01:45:48
$dictionary['Document']['fields']['active_date']['inline_edit']=true;
$dictionary['Document']['fields']['active_date']['merge_filter']='disabled';
$dictionary['Document']['fields']['active_date']['enable_range_search']=false;

 

 // created: 2016-05-18 02:03:36
$dictionary['Document']['fields']['category_id']['inline_edit']=true;
$dictionary['Document']['fields']['category_id']['merge_filter']='disabled';
$dictionary['Document']['fields']['category_id']['required']=true;

 

 // created: 2019-05-06 17:28:13
$dictionary['Document']['fields']['download_audit_c']['inline_edit']=1;

 

 // created: 2018-03-08 02:39:50
$dictionary['Document']['fields']['exp_date']['inline_edit']=true;
$dictionary['Document']['fields']['exp_date']['merge_filter']='disabled';
$dictionary['Document']['fields']['exp_date']['enable_range_search']=false;

 

 // created: 2019-05-06 17:28:14
$dictionary['Document']['fields']['is_private_c']['inline_edit']='1';
$dictionary['Document']['fields']['is_private_c']['labelValue']='Is private?';

 

 // created: 2019-05-06 17:28:15
$dictionary['Document']['fields']['start_date_c']['inline_edit']='1';
$dictionary['Document']['fields']['start_date_c']['labelValue']='Start Date';

 

 // created: 2016-07-14 10:03:33
$dictionary['Document']['fields']['subcategory_id']['inline_edit']=true;
$dictionary['Document']['fields']['subcategory_id']['merge_filter']='disabled';

 

 // created: 2016-06-14 11:05:14
$dictionary['Document']['fields']['template_type']['inline_edit']=true;
$dictionary['Document']['fields']['template_type']['merge_filter']='disabled';
$dictionary['Document']['fields']['template_type']['reportable']=true;

 

// created: 2017-11-03 08:12:29
$dictionary["Document"]["fields"]["timesheet_documents_1"] = array (
  'name' => 'timesheet_documents_1',
  'type' => 'link',
  'relationship' => 'timesheet_documents_1',
  'source' => 'non-db',
  'module' => 'Timesheet',
  'bean_name' => 'Timesheet',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_TIMESHEET_TITLE',
  'id_name' => 'timesheet_documents_1timesheet_ida',
);
$dictionary["Document"]["fields"]["timesheet_documents_1_name"] = array (
  'name' => 'timesheet_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_TIMESHEET_TITLE',
  'save' => true,
  'id_name' => 'timesheet_documents_1timesheet_ida',
  'link' => 'timesheet_documents_1',
  'table' => 'timesheet',
  'module' => 'Timesheet',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["timesheet_documents_1timesheet_ida"] = array (
  'name' => 'timesheet_documents_1timesheet_ida',
  'type' => 'link',
  'relationship' => 'timesheet_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2017-07-02 05:58:22
$dictionary["Document"]["fields"]["users_documents_1"] = array (
  'name' => 'users_documents_1',
  'type' => 'link',
  'relationship' => 'users_documents_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_USERS_TITLE',
  'id_name' => 'users_documents_1users_ida',
);
$dictionary["Document"]["fields"]["users_documents_1_name"] = array (
  'name' => 'users_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_documents_1users_ida',
  'link' => 'users_documents_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["users_documents_1users_ida"] = array (
  'name' => 'users_documents_1users_ida',
  'type' => 'link',
  'relationship' => 'users_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
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
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
$dictionary['Document']['audited'] = true;
    



// created: 2016-06-14 11:21:30
$dictionary["Document"]["fields"]["vedic_candidates_documents_1"] = array (
  'name' => 'vedic_candidates_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_documents_1vedic_candidates_ida',
);
$dictionary["Document"]["fields"]["vedic_candidates_documents_1_name"] = array (
  'name' => 'vedic_candidates_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_documents_1vedic_candidates_ida',
  'link' => 'vedic_candidates_documents_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Document"]["fields"]["vedic_candidates_documents_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_documents_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2016-08-11 08:52:37
$dictionary["Document"]["fields"]["vedic_employees_documents_1"] = array (
  'name' => 'vedic_employees_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_employees_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Employees',
  'bean_name' => 'vedic_Employees',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'id_name' => 'vedic_employees_documents_1vedic_employees_ida',
);
$dictionary["Document"]["fields"]["vedic_employees_documents_1_name"] = array (
  'name' => 'vedic_employees_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'save' => true,
  'id_name' => 'vedic_employees_documents_1vedic_employees_ida',
  'link' => 'vedic_employees_documents_1',
  'table' => 'vedic_employees',
  'module' => 'vedic_Employees',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Document"]["fields"]["vedic_employees_documents_1vedic_employees_ida"] = array (
  'name' => 'vedic_employees_documents_1vedic_employees_ida',
  'type' => 'link',
  'relationship' => 'vedic_employees_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2018-08-13 06:41:30
$dictionary["Document"]["fields"]["vedic_gc_documents_1"] = array (
  'name' => 'vedic_gc_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_gc_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_GC',
  'bean_name' => 'vedic_GC',
  'vname' => 'LBL_VEDIC_GC_DOCUMENTS_1_FROM_VEDIC_GC_TITLE',
  'id_name' => 'vedic_gc_documents_1vedic_gc_ida',
);
$dictionary["Document"]["fields"]["vedic_gc_documents_1_name"] = array (
  'name' => 'vedic_gc_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_GC_DOCUMENTS_1_FROM_VEDIC_GC_TITLE',
  'save' => true,
  'id_name' => 'vedic_gc_documents_1vedic_gc_ida',
  'link' => 'vedic_gc_documents_1',
  'table' => 'vedic_gc',
  'module' => 'vedic_GC',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["vedic_gc_documents_1vedic_gc_ida"] = array (
  'name' => 'vedic_gc_documents_1vedic_gc_ida',
  'type' => 'link',
  'relationship' => 'vedic_gc_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_GC_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2017-07-02 05:54:38
$dictionary["Document"]["fields"]["vedic_holydays_documents_1"] = array (
  'name' => 'vedic_holydays_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_holydays_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Holydays',
  'bean_name' => 'vedic_Holydays',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_VEDIC_HOLYDAYS_TITLE',
  'id_name' => 'vedic_holydays_documents_1vedic_holydays_ida',
);
$dictionary["Document"]["fields"]["vedic_holydays_documents_1_name"] = array (
  'name' => 'vedic_holydays_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_VEDIC_HOLYDAYS_TITLE',
  'save' => true,
  'id_name' => 'vedic_holydays_documents_1vedic_holydays_ida',
  'link' => 'vedic_holydays_documents_1',
  'table' => 'vedic_holydays',
  'module' => 'vedic_Holydays',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["vedic_holydays_documents_1vedic_holydays_ida"] = array (
  'name' => 'vedic_holydays_documents_1vedic_holydays_ida',
  'type' => 'link',
  'relationship' => 'vedic_holydays_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2017-01-14 11:05:39
$dictionary["Document"]["fields"]["vedic_immigration_documents_1"] = array (
  'name' => 'vedic_immigration_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_immigration_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Immigration',
  'bean_name' => 'vedic_Immigration',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
  'id_name' => 'vedic_immigration_documents_1vedic_immigration_ida',
);
$dictionary["Document"]["fields"]["vedic_immigration_documents_1_name"] = array (
  'name' => 'vedic_immigration_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
  'save' => true,
  'id_name' => 'vedic_immigration_documents_1vedic_immigration_ida',
  'link' => 'vedic_immigration_documents_1',
  'table' => 'vedic_immigration',
  'module' => 'vedic_Immigration',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["vedic_immigration_documents_1vedic_immigration_ida"] = array (
  'name' => 'vedic_immigration_documents_1vedic_immigration_ida',
  'type' => 'link',
  'relationship' => 'vedic_immigration_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2018-04-25 07:19:10
$dictionary["Document"]["fields"]["vedic_profiles_documents_1"] = array (
  'name' => 'vedic_profiles_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_profiles_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'vname' => 'LBL_VEDIC_PROFILES_DOCUMENTS_1_FROM_VEDIC_PROFILES_TITLE',
  'id_name' => 'vedic_profiles_documents_1vedic_profiles_ida',
);
$dictionary["Document"]["fields"]["vedic_profiles_documents_1_name"] = array (
  'name' => 'vedic_profiles_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_PROFILES_DOCUMENTS_1_FROM_VEDIC_PROFILES_TITLE',
  'save' => true,
  'id_name' => 'vedic_profiles_documents_1vedic_profiles_ida',
  'link' => 'vedic_profiles_documents_1',
  'table' => 'vedic_profiles',
  'module' => 'vedic_Profiles',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Document"]["fields"]["vedic_profiles_documents_1vedic_profiles_ida"] = array (
  'name' => 'vedic_profiles_documents_1vedic_profiles_ida',
  'type' => 'link',
  'relationship' => 'vedic_profiles_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_PROFILES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);

?>