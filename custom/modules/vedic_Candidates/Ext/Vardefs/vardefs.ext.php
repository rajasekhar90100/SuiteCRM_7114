<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2017-01-24 23:23:18
$dictionary["vedic_Candidates"]["fields"]["meetings_vedic_candidates_1"] = array (
  'name' => 'meetings_vedic_candidates_1',
  'type' => 'link',
  'relationship' => 'meetings_vedic_candidates_1',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_MEETINGS_VEDIC_CANDIDATES_1_FROM_MEETINGS_TITLE',
);


// created: 2016-05-10 09:11:27
$dictionary["vedic_Candidates"]["fields"]["securitygroups_vedic_candidates_1"] = array (
  'name' => 'securitygroups_vedic_candidates_1',
  'type' => 'link',
  'relationship' => 'securitygroups_vedic_candidates_1',
  'source' => 'non-db',
  'module' => 'SecurityGroups',
  'bean_name' => 'SecurityGroup',
  'vname' => 'LBL_SECURITYGROUPS_VEDIC_CANDIDATES_1_FROM_SECURITYGROUPS_TITLE',
);


 // created: 2019-05-06 17:29:22
$dictionary['vedic_Candidates']['fields']['account_id_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:23
$dictionary['vedic_Candidates']['fields']['acl_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['acl_c']['labelValue']='ACL';

 

 // created: 2019-05-06 17:29:24
$dictionary['vedic_Candidates']['fields']['adp_file_no_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['adp_file_no_c']['labelValue']='ADP file no';

 

 // created: 2019-05-06 17:29:24
$dictionary['vedic_Candidates']['fields']['alternate_city_state_zip_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['alternate_city_state_zip_c']['labelValue']='Alternate City State Zip';

 

$dictionary['vedic_Candidates']['fields']['alt_address_country']['type']='enum';
$dictionary['vedic_Candidates']['fields']['alt_address_country']['options']='country_list';

 


$dictionary['vedic_Candidates']['fields']['alt_address_state']['type']='enum';
$dictionary['vedic_Candidates']['fields']['alt_address_state']['options']='state_list';

 


 // created: 2015-09-28 07:27:40
$dictionary['vedic_Candidates']['fields']['annual_salary']['audited']=true;

 

 // created: 2017-02-22 13:12:11
$dictionary['vedic_Candidates']['fields']['any_other']['audited']=true;
$dictionary['vedic_Candidates']['fields']['any_other']['inline_edit']=true;

 

 // created: 2015-09-28 07:27:13
$dictionary['vedic_Candidates']['fields']['assistant']['audited']=true;
$dictionary['vedic_Candidates']['fields']['assistant']['comments']='Name of the assistant of the contact';
$dictionary['vedic_Candidates']['fields']['assistant']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['assistant']['unified_search']=false;

 

 // created: 2015-09-28 07:27:24
$dictionary['vedic_Candidates']['fields']['assistant_phone']['audited']=true;
$dictionary['vedic_Candidates']['fields']['assistant_phone']['comments']='Phone number of the assistant of the contact';
$dictionary['vedic_Candidates']['fields']['assistant_phone']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['assistant_phone']['unified_search']=false;

 

 // created: 2019-05-06 17:29:25
$dictionary['vedic_Candidates']['fields']['auto_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['auto_hr_c']['labelValue']='Auto/hr';

 

 // created: 2019-05-06 17:29:26
$dictionary['vedic_Candidates']['fields']['auto_rate_3_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['auto_rate_3_c']['labelValue']='Auto Rate 3';

 

 // created: 2015-09-28 08:01:41
$dictionary['vedic_Candidates']['fields']['available_date']['audited']=true;

 

 // created: 2019-05-06 17:29:26
$dictionary['vedic_Candidates']['fields']['batch_date_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['batch_date_c']['labelValue']='Batch Date';

 

 // created: 2019-05-06 17:29:27
$dictionary['vedic_Candidates']['fields']['bd_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['bd_hr_c']['labelValue']='BD/hr';

 

 // created: 2019-05-06 17:29:29
$dictionary['vedic_Candidates']['fields']['bill_rate_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['bill_rate_hr_c']['labelValue']='Bill Rate/Hr';

 

/**
* File => sugarfield_candcurrent_address_city.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_city'] = array (
	'name' => 'candcurrent_address_city',
	'vname' => 'Candidate Current City',
	'type' => 'varchar',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);




/**
* File => sugarfield_candcurrent_address_country.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_country'] = array (
	'name' => 'candcurrent_address_country',
	'vname' => 'Candidate Current Country',
	'options' => 'country_list',
	'type' => 'enum',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);




/**
* File => candcurrent_address_postalcode.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_postalcode'] = array (
	'name' => 'candcurrent_address_postalcode',
	'vname' => 'Candidate Current Postal Code',
	'type' => 'varchar',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);




/**
* File => candcurrent_address_state.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_state'] = array (
	'name' => 'candcurrent_address_state',
	'vname' => 'Candidate Current State',
	'type' => 'enum',
	'options' => 'state_list',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);




/**
* File => candcurrent_address_street.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_street'] = array (
	'name' => 'candcurrent_address_street',
	'vname' => 'Candidate Current Street',
	'type' => 'varchar',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);




 // created: 2019-05-06 17:29:30
$dictionary['vedic_Candidates']['fields']['channel_client_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['channel_client_c']['labelValue']='Channel Client';

 

 // created: 2019-05-06 17:29:32
$dictionary['vedic_Candidates']['fields']['childrens_names_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['childrens_names_c']['labelValue']='Children\'s Names';

 

 // created: 2019-05-06 17:29:33
$dictionary['vedic_Candidates']['fields']['client_industry_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['client_industry_c']['labelValue']='Client Industry';

 

 // created: 2015-09-28 07:27:59
$dictionary['vedic_Candidates']['fields']['comment']['audited']=true;

 

 // created: 2016-07-05 15:15:10
$dictionary['vedic_Candidates']['fields']['comments_by']['name']='comments_by';
$dictionary['vedic_Candidates']['fields']['comments_by']['vname']='LBL_COMMENTS_BY';
$dictionary['vedic_Candidates']['fields']['comments_by']['type']='enum';
$dictionary['vedic_Candidates']['fields']['comments_by']['link']='Users';
$dictionary['vedic_Candidates']['fields']['comments_by']['comment']='The template that the users was created from.';
$dictionary['vedic_Candidates']['fields']['comments_by']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['comments_by']['options']='';
$dictionary['vedic_Candidates']['fields']['comments_by']['comments']='The template that the users was created from.';
$dictionary['vedic_Candidates']['fields']['comments_by']['merge_filter']='disabled';



$dictionary['vedic_Candidates']['fields']['communication_comments']['name']='communication_comments';
$dictionary['vedic_Candidates']['fields']['communication_comments']['vname']='Comments';
$dictionary['vedic_Candidates']['fields']['communication_comments']['type']='text';
$dictionary['vedic_Candidates']['fields']['communication_comments']['importable']=true;
$dictionary['vedic_Candidates']['fields']['communication_comments']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['communication_comments']['audited']=true;
$dictionary['vedic_Candidates']['fields']['communication_comments']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['communication_comments']['rows']='4';
$dictionary['vedic_Candidates']['fields']['communication_comments']['cols']='20';
$dictionary['vedic_Candidates']['fields']['communication_comments']['merge_filter']='disabled';


$dictionary['vedic_Candidates']['fields']['communication_rating']['name']='communication_rating';
$dictionary['vedic_Candidates']['fields']['communication_rating']['vname']='Communication Rating';
$dictionary['vedic_Candidates']['fields']['communication_rating']['type']='enum';
$dictionary['vedic_Candidates']['fields']['communication_rating']['options']='functional_experience_rating_list';
$dictionary['vedic_Candidates']['fields']['communication_rating']['importable']=true;
$dictionary['vedic_Candidates']['fields']['communication_rating']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['communication_rating']['audited']=true;
$dictionary['vedic_Candidates']['fields']['communication_rating']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['communication_rating']['merge_filter']='disabled';


 // created: 2019-05-06 17:29:34
$dictionary['vedic_Candidates']['fields']['consulate_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['consulate_c']['labelValue']='Consulate';

 

 // created: 2019-05-06 17:29:35
$dictionary['vedic_Candidates']['fields']['consultant_user_id_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['consultant_user_id_c']['labelValue']='consultant user id';

 

 // created: 2019-05-06 17:29:35
$dictionary['vedic_Candidates']['fields']['cos_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['cos_c']['labelValue']='COS';

 

 // created: 2019-05-06 17:29:36
$dictionary['vedic_Candidates']['fields']['country_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['country_c']['labelValue']='Country';

 

 // created: 2019-05-06 17:29:37
$dictionary['vedic_Candidates']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2015-09-28 07:28:10
$dictionary['vedic_Candidates']['fields']['current_designation']['audited']=true;

 

 // created: 2015-07-22 11:15:05

 

 // created: 2015-02-19 12:23:08
$dictionary['vedic_Candidates']['fields']['date_entered']['audited']=false;
$dictionary['vedic_Candidates']['fields']['date_entered']['comments']='Date record created';
$dictionary['vedic_Candidates']['fields']['date_entered']['merge_filter']='disabled';

 

 // created: 2015-02-19 12:23:16
$dictionary['vedic_Candidates']['fields']['date_modified']['audited']=false;
$dictionary['vedic_Candidates']['fields']['date_modified']['comments']='Date record last modified';
$dictionary['vedic_Candidates']['fields']['date_modified']['merge_filter']='disabled';

 


 // created: 2015-02-19 12:24:03
$dictionary['vedic_Candidates']['fields']['department']['audited']=true;
$dictionary['vedic_Candidates']['fields']['department']['comments']='The department of the contact';
$dictionary['vedic_Candidates']['fields']['department']['merge_filter']='disabled';

 

 // created: 2015-03-12 07:44:38
$dictionary['vedic_Candidates']['fields']['description']['comments']='Full text of the note';
$dictionary['vedic_Candidates']['fields']['description']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['description']['audited']=true;

 

 // created: 2015-09-28 07:29:00
$dictionary['vedic_Candidates']['fields']['dob']['audited']=true;
$dictionary['vedic_Candidates']['fields']['dob']['required']=true;

 

 // created: 2019-05-06 17:29:37
$dictionary['vedic_Candidates']['fields']['document_type_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['document_type_c']['labelValue']='Document Type';

 

/**
  * FileName => sugarfield_document_upload.php
  * Created By => Udaykiran (Created On Aug-04-2017)
  * Modified By => Udaykiran(Modified On Aug-04-2017)
  * COMMENT => To create the Documents Upload field in Candidates module
  */
$dictionary['vedic_Candidates']['fields']['document_upload']['name'] = 'document_upload';
$dictionary['vedic_Candidates']['fields']['document_upload']['type'] = 'varchar';
$dictionary['vedic_Candidates']['fields']['document_upload']['vname'] = 'Last Login';
$dictionary['vedic_Candidates']['fields']['document_upload']['len'] =  '1000';



 // created: 2015-02-19 12:24:46
$dictionary['vedic_Candidates']['fields']['email1']['audited']=true;
$dictionary['vedic_Candidates']['fields']['email1']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['email1']['required']=true;

 

 // created: 2019-05-06 17:29:38
$dictionary['vedic_Candidates']['fields']['email_vedic_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['email_vedic_c']['labelValue']='Email Vedic';

 

 // created: 2019-05-06 17:29:39
$dictionary['vedic_Candidates']['fields']['employee_type_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['employee_type_c']['labelValue']='Employee Type';

 

 // created: 2019-05-06 17:29:40
$dictionary['vedic_Candidates']['fields']['employment_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['employment_c']['labelValue']='Employment';

 

 // created: 2019-05-06 17:29:41
$dictionary['vedic_Candidates']['fields']['end_client_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['end_client_c']['labelValue']='End Client';

 

 // created: 2019-05-06 17:29:41
$dictionary['vedic_Candidates']['fields']['end_customer_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['end_customer_c']['labelValue']='End Client';

 

$dictionary['vedic_Candidates']['fields']['evaluation_comments']['name']='evaluation_comments';
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['vname']='Comments';
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['type']='text';
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['importable']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['audited']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['rows']='4';
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['cols']='20';
$dictionary['vedic_Candidates']['fields']['evaluation_comments']['merge_filter']='disabled';


$dictionary['vedic_Candidates']['fields']['evaluation_rating']['name']='evaluation_rating';
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['vname']='Evaluation Rating';
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['type']='enum';
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['options']='functional_experience_rating_list';
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['importable']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['audited']=true;
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['evaluation_rating']['merge_filter']='disabled';


 // created: 2015-09-28 07:28:18
$dictionary['vedic_Candidates']['fields']['expected_ctc']['audited']=true;

 

 // created: 2019-05-06 17:29:42
$dictionary['vedic_Candidates']['fields']['extension_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['extension_c']['labelValue']='Extension';

 

 // created: 2015-09-28 07:28:28
$dictionary['vedic_Candidates']['fields']['final_ctc']['audited']=true;

 

 // created: 2015-02-19 12:23:38
$dictionary['vedic_Candidates']['fields']['first_name']['audited']=true;
$dictionary['vedic_Candidates']['fields']['first_name']['comments']='First name of the contact';
$dictionary['vedic_Candidates']['fields']['first_name']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['first_name']['unified_search']=false;
 


 // created: 2019-05-06 17:29:42
$dictionary['vedic_Candidates']['fields']['forum_moderator_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['forum_moderator_c']['labelValue']='Forum Moderator';

 

 // created: 2019-05-06 17:29:43
$dictionary['vedic_Candidates']['fields']['ft_client_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['ft_client_c']['labelValue']='FT-Client';

 

 // created: 2015-09-28 07:28:36
$dictionary['vedic_Candidates']['fields']['functional_area']['audited']=true;

 

$dictionary['vedic_Candidates']['fields']['functional_comments']['name']='functional_comments';
$dictionary['vedic_Candidates']['fields']['functional_comments']['vname']='Comments';
$dictionary['vedic_Candidates']['fields']['functional_comments']['type']='text';
$dictionary['vedic_Candidates']['fields']['functional_comments']['importable']=true;
$dictionary['vedic_Candidates']['fields']['functional_comments']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['functional_comments']['audited']=true;
$dictionary['vedic_Candidates']['fields']['functional_comments']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['functional_comments']['rows']='4';
$dictionary['vedic_Candidates']['fields']['functional_comments']['cols']='20';
$dictionary['vedic_Candidates']['fields']['functional_comments']['merge_filter']='disabled';


$dictionary['vedic_Candidates']['fields']['functional_rating']['name']='functional_rating';
$dictionary['vedic_Candidates']['fields']['functional_rating']['vname']='Functional Experience Rating';
$dictionary['vedic_Candidates']['fields']['functional_rating']['type']='enum';
$dictionary['vedic_Candidates']['fields']['functional_rating']['options']='functional_experience_rating_list';
$dictionary['vedic_Candidates']['fields']['functional_rating']['importable']=true;
$dictionary['vedic_Candidates']['fields']['functional_rating']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['functional_rating']['audited']=true;
$dictionary['vedic_Candidates']['fields']['functional_rating']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['functional_rating']['merge_filter']='disabled';


 // created: 2019-05-06 17:29:44
$dictionary['vedic_Candidates']['fields']['gc_attorney_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_attorney_c']['labelValue']='GC Attorney';

 

 // created: 2019-05-06 17:29:44
$dictionary['vedic_Candidates']['fields']['gc_initiated_by_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_initiated_by_c']['labelValue']='GC Initiated By';

 

 // created: 2019-05-06 17:29:45
$dictionary['vedic_Candidates']['fields']['gc_init_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_init_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['gc_init_date_c']['labelValue']='GC Init Date';
$dictionary['vedic_Candidates']['fields']['gc_init_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:46
$dictionary['vedic_Candidates']['fields']['gc_job_title_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_job_title_c']['labelValue']='GC Job Title';

 

 // created: 2019-05-06 17:29:47
$dictionary['vedic_Candidates']['fields']['gc_lca_wage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_lca_wage_c']['labelValue']='GC LCA Wage';

 

 // created: 2019-05-06 17:29:48
$dictionary['vedic_Candidates']['fields']['gc_stage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['gc_stage_c']['labelValue']='GC Stage';

 

 // created: 2019-05-06 17:29:49
$dictionary['vedic_Candidates']['fields']['graduationdate_pg_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['graduationdate_pg_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['graduationdate_pg_c']['labelValue']='Graduation Date P.G';
$dictionary['vedic_Candidates']['fields']['graduationdate_pg_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:49
$dictionary['vedic_Candidates']['fields']['graduationdate_ppg_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['graduationdate_ppg_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['graduationdate_ppg_c']['labelValue']='Graduation Date Post P.G';
$dictionary['vedic_Candidates']['fields']['graduationdate_ppg_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:50
$dictionary['vedic_Candidates']['fields']['graduationdate_ug_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['graduationdate_ug_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['graduationdate_ug_c']['labelValue']='Graduation Date U.G';
$dictionary['vedic_Candidates']['fields']['graduationdate_ug_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:52
$dictionary['vedic_Candidates']['fields']['guest_house_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['guest_house_c']['labelValue']='Guest House';

 

 // created: 2015-03-10 03:33:51
$dictionary['vedic_Candidates']['fields']['h1b']['default']='';
$dictionary['vedic_Candidates']['fields']['h1b']['massupdate']='1';

 

 // created: 2019-05-06 17:29:53
$dictionary['vedic_Candidates']['fields']['h1b_person_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1b_person_c']['labelValue']='H1B Person';

 

 // created: 2019-05-06 17:29:54
$dictionary['vedic_Candidates']['fields']['h1b_req_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1b_req_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['h1b_req_date_c']['labelValue']='H1B Req Date';
$dictionary['vedic_Candidates']['fields']['h1b_req_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:55
$dictionary['vedic_Candidates']['fields']['h1b_type_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1b_type_c']['labelValue']='H1B Type';

 

 // created: 2019-05-06 17:29:55
$dictionary['vedic_Candidates']['fields']['h1_cancelled_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_cancelled_c']['labelValue']='H1 Cancelled';

 

 // created: 2019-05-06 17:29:56
$dictionary['vedic_Candidates']['fields']['h1_end_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_end_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['h1_end_date_c']['labelValue']='H1 End Date';
$dictionary['vedic_Candidates']['fields']['h1_end_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:57
$dictionary['vedic_Candidates']['fields']['h1_job_title_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_job_title_c']['labelValue']='H1 Job Title';

 

 // created: 2019-05-06 17:29:57
$dictionary['vedic_Candidates']['fields']['h1_start_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_start_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['h1_start_date_c']['labelValue']='H1 Start Date';
$dictionary['vedic_Candidates']['fields']['h1_start_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:29:58
$dictionary['vedic_Candidates']['fields']['h1_wage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_wage_c']['labelValue']='H1 Wage';

 

 // created: 2019-05-06 17:29:59
$dictionary['vedic_Candidates']['fields']['h1_wage_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['h1_wage_hr_c']['labelValue']='H1 Wage/Hr';

 

 // created: 2019-05-06 17:29:59
$dictionary['vedic_Candidates']['fields']['hirer_1_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['hirer_1_c']['labelValue']='Hirer-1';

 

 // created: 2019-05-06 17:30:00
$dictionary['vedic_Candidates']['fields']['hirer_2_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['hirer_2_c']['labelValue']='Hirer-2';

 

 // created: 2019-05-06 17:30:00
$dictionary['vedic_Candidates']['fields']['hire_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['hire_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['hire_date_c']['labelValue']='Hire Date';
$dictionary['vedic_Candidates']['fields']['hire_date_c']['enable_range_search']='1';

 

 // created: 2017-11-21 06:55:53
$dictionary['vedic_Candidates']['fields']['hl']['required']=true;
$dictionary['vedic_Candidates']['fields']['hl']['source']='non-db';
$dictionary['vedic_Candidates']['fields']['hl']['name']='hl';
$dictionary['vedic_Candidates']['fields']['hl']['vname']='LBL_HL';
$dictionary['vedic_Candidates']['fields']['hl']['type']='relate';
$dictionary['vedic_Candidates']['fields']['hl']['massupdate']=0;
$dictionary['vedic_Candidates']['fields']['hl']['no_default']=false;
$dictionary['vedic_Candidates']['fields']['hl']['comments']='';
$dictionary['vedic_Candidates']['fields']['hl']['help']='';
$dictionary['vedic_Candidates']['fields']['hl']['importable']='true';
$dictionary['vedic_Candidates']['fields']['hl']['duplicate_merge']='disabled';
$dictionary['vedic_Candidates']['fields']['hl']['duplicate_merge_dom_value']='0';
$dictionary['vedic_Candidates']['fields']['hl']['audited']=true;
$dictionary['vedic_Candidates']['fields']['hl']['reportable']=true;
$dictionary['vedic_Candidates']['fields']['hl']['unified_search']=false;
$dictionary['vedic_Candidates']['fields']['hl']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['hl']['len']='255';
$dictionary['vedic_Candidates']['fields']['hl']['size']='30';
$dictionary['vedic_Candidates']['fields']['hl']['id_name']='hl_id';
$dictionary['vedic_Candidates']['fields']['hl']['ext2']='Users';
$dictionary['vedic_Candidates']['fields']['hl']['module']='Users';
$dictionary['vedic_Candidates']['fields']['hl']['rname']='name';
$dictionary['vedic_Candidates']['fields']['hl']['quicksearch']='enabled';
$dictionary['vedic_Candidates']['fields']['hl']['studio']='visible';
$dictionary['vedic_Candidates']['fields']['hl']['inline_edit']=true;

 

 // created: 2015-09-28 07:27:13

	$dictionary["vedic_Candidates"]["fields"]['hl_id']['required'] = false;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['name'] = 'hl_id';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['vname'] = 'LBL_HL_ID';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['type'] = 'id';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['massupdate'] = 1;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['no_default'] = false;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['comments'] = '';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['help'] = '';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['importable'] = 'true';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['duplicate_merge'] = 'disabled';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['duplicate_merge_dom_value'] = 0;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['audited'] = false;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['reportable'] = false;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['unified_search'] = false;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['merge_filter'] = 'disabled';
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['len'] = 36;
	$dictionary["vedic_Candidates"]["fields"]['hl_id']['size'] = '20';
	 


 

 // created: 2019-05-06 17:30:01
$dictionary['vedic_Candidates']['fields']['insurance_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['insurance_c']['labelValue']='Insurance';

 

 // created: 2019-05-06 17:30:02
$dictionary['vedic_Candidates']['fields']['interviews_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['interviews_c']['labelValue']='Interviews';

 

 // created: 2019-05-06 17:30:03
$dictionary['vedic_Candidates']['fields']['interview_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['interview_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['interview_date_c']['labelValue']='Interview Date';
$dictionary['vedic_Candidates']['fields']['interview_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:04
$dictionary['vedic_Candidates']['fields']['interviwed_by_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['interviwed_by_c']['labelValue']='Interviwed By';

 

 // created: 2019-05-06 17:30:05
$dictionary['vedic_Candidates']['fields']['ipp_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['ipp_c']['labelValue']='IPP';

 

 // created: 2019-05-06 17:30:05
$dictionary['vedic_Candidates']['fields']['is_consultant_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['is_consultant_c']['labelValue']='is consultant';

 

 // created: 2019-05-06 17:30:07
$dictionary['vedic_Candidates']['fields']['is_marketable_c']['inline_edit']='1';

 

 // created: 2019-05-06 17:30:08
$dictionary['vedic_Candidates']['fields']['item_type_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['item_type_c']['labelValue']='Item Type';

 

 // created: 2019-05-06 17:30:09
$dictionary['vedic_Candidates']['fields']['i_140_cert_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_140_cert_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['i_140_cert_dt_c']['labelValue']='I-140 Cert# DT';
$dictionary['vedic_Candidates']['fields']['i_140_cert_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:09
$dictionary['vedic_Candidates']['fields']['i_140_filed_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_140_filed_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['i_140_filed_dt_c']['labelValue']='I-140 Filed DT';
$dictionary['vedic_Candidates']['fields']['i_140_filed_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:10
$dictionary['vedic_Candidates']['fields']['i_140_receipt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_140_receipt_c']['labelValue']='I-140 Receipt #';

 

 // created: 2019-05-06 17:30:11
$dictionary['vedic_Candidates']['fields']['i_140_status_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['i_140_status_c']['labelValue']='I-140 Status';

 

 // created: 2019-05-06 17:30:11
$dictionary['vedic_Candidates']['fields']['i_485_cert_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_485_cert_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['i_485_cert_dt_c']['labelValue']='I-485 Cert# DT';
$dictionary['vedic_Candidates']['fields']['i_485_cert_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:12
$dictionary['vedic_Candidates']['fields']['i_485_filed_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_485_filed_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['i_485_filed_dt_c']['labelValue']='I-485 Filed DT';
$dictionary['vedic_Candidates']['fields']['i_485_filed_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:13
$dictionary['vedic_Candidates']['fields']['i_485_receipt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_485_receipt_c']['labelValue']='I-485 Receipt #';

 

 // created: 2019-05-06 17:30:14
$dictionary['vedic_Candidates']['fields']['i_797_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['i_797_c']['labelValue']='I-797 #';

 

 // created: 2015-09-28 07:33:31
$dictionary['vedic_Candidates']['fields']['jobtype']['audited']=true;

 

 // created: 2015-09-28 07:28:46
$dictionary['vedic_Candidates']['fields']['joining_date']['audited']=true;

 

 // created: 2017-03-11 07:53:41
$dictionary['vedic_Candidates']['fields']['keyskill_list']['default']='';
$dictionary['vedic_Candidates']['fields']['keyskill_list']['audited']=false;
$dictionary['vedic_Candidates']['fields']['keyskill_list']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['keyskill_list']['options']='keyskill_list';

 

 // created: 2015-02-19 12:23:48
$dictionary['vedic_Candidates']['fields']['last_name']['comments']='Last name of the contact';
$dictionary['vedic_Candidates']['fields']['last_name']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['last_name']['unified_search']=false;
$dictionary['vedic_Candidates']['fields']['last_name']['audited']=true;

 

 // created: 2019-05-06 17:30:16
$dictionary['vedic_Candidates']['fields']['lca_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_c']['labelValue']='LCA #';

 

 // created: 2019-05-06 17:30:17
$dictionary['vedic_Candidates']['fields']['lca_cert_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_cert_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['lca_cert_date_c']['labelValue']='LCA Cert Date';
$dictionary['vedic_Candidates']['fields']['lca_cert_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:17
$dictionary['vedic_Candidates']['fields']['lca_filed_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_filed_c']['labelValue']='LCA Filed';

 

 // created: 2019-05-06 17:30:18
$dictionary['vedic_Candidates']['fields']['lca_filed_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_filed_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['lca_filed_date_c']['labelValue']='LCA Filed Date';
$dictionary['vedic_Candidates']['fields']['lca_filed_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:18
$dictionary['vedic_Candidates']['fields']['lca_rates_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_rates_c']['labelValue']='LCA Rates';

 

 // created: 2019-05-06 17:30:19
$dictionary['vedic_Candidates']['fields']['lca_rate_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['lca_rate_c']['labelValue']='LCA Wage';

 

 // created: 2019-05-06 17:30:19
$dictionary['vedic_Candidates']['fields']['lca_wage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_wage_c']['labelValue']='LCA Wage';

 

 // created: 2019-05-06 17:30:20
$dictionary['vedic_Candidates']['fields']['lca_wage_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_wage_hr_c']['labelValue']='LCA Wage/Hr';

 

 // created: 2019-05-06 17:30:21
$dictionary['vedic_Candidates']['fields']['lca_withdrawn_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['lca_withdrawn_c']['labelValue']='LCA # (Withdrawn)';

 

 // created: 2019-05-06 17:30:21
$dictionary['vedic_Candidates']['fields']['located_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['located_c']['labelValue']='Current Location';

 

 // created: 2019-05-06 17:30:23
$dictionary['vedic_Candidates']['fields']['manager_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['manager_c']['labelValue']='Manager';

 

 // created: 2015-09-28 08:03:46
$dictionary['vedic_Candidates']['fields']['marketable_date']['audited']=true;

 

 // created: 2019-05-06 17:30:24
$dictionary['vedic_Candidates']['fields']['mdcl_paystub_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['mdcl_paystub_c']['labelValue']='MDCL/paystub';

 

 // created: 2019-05-06 17:30:24
$dictionary['vedic_Candidates']['fields']['ml_1_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['ml_1_c']['labelValue']='Lead ML';

 

 // created: 2019-05-06 17:30:24
$dictionary['vedic_Candidates']['fields']['ml_2_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['ml_2_c']['labelValue']='ML';

 

 // created: 2019-05-06 17:30:25
$dictionary['vedic_Candidates']['fields']['m_end_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['m_end_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['m_end_c']['labelValue']='M-End';
$dictionary['vedic_Candidates']['fields']['m_end_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:25
$dictionary['vedic_Candidates']['fields']['m_start_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['m_start_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['m_start_c']['labelValue']='M-Start';
$dictionary['vedic_Candidates']['fields']['m_start_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:26
$dictionary['vedic_Candidates']['fields']['notes_auto_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['notes_auto_c']['labelValue']='Notes - Auto';

 

 // created: 2019-05-06 17:30:27
$dictionary['vedic_Candidates']['fields']['notes_bench_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['notes_bench_c']['labelValue']='Notes-Bench';

 

 // created: 2019-05-06 17:30:28
$dictionary['vedic_Candidates']['fields']['notes_employee_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['notes_employee_c']['labelValue']='Notes-Employee';

 

 // created: 2019-05-06 17:30:28
$dictionary['vedic_Candidates']['fields']['notes_payroll_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['notes_payroll_c']['labelValue']='Notes-Payroll';

 

 // created: 2019-05-06 17:30:29
$dictionary['vedic_Candidates']['fields']['notes_sales_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['notes_sales_c']['labelValue']='Notes-Sales';

 

$dictionary['vedic_Candidates']['fields']['notice_period']['name']='notice_period';
$dictionary['vedic_Candidates']['fields']['notice_period']['vname']='Notice Period';
$dictionary['vedic_Candidates']['fields']['notice_period']['type']='varchar';
$dictionary['vedic_Candidates']['fields']['notice_period']['importable']=true;
$dictionary['vedic_Candidates']['fields']['notice_period']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['notice_period']['audited']=true;
$dictionary['vedic_Candidates']['fields']['notice_period']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['notice_period']['merge_filter']='disabled';



 // created: 2015-09-28 07:29:12
$dictionary['vedic_Candidates']['fields']['offered_ctc']['audited']=true;

 

 // created: 2019-05-06 17:30:30
$dictionary['vedic_Candidates']['fields']['offer_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['offer_c']['labelValue']='Offer';

 

 // created: 2019-05-06 17:30:31
$dictionary['vedic_Candidates']['fields']['ot_2nd_project_rate_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['ot_2nd_project_rate_c']['labelValue']='OT / 2nd Project Rate';

 

 // created: 2019-05-06 17:30:32
$dictionary['vedic_Candidates']['fields']['ot_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['ot_hr_c']['labelValue']='OT/hr';

 

 // created: 2019-05-06 17:30:34
$dictionary['vedic_Candidates']['fields']['paid_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['paid_c']['labelValue']='Paid';

 

 // created: 2019-05-06 17:30:35
$dictionary['vedic_Candidates']['fields']['parent_id']['inline_edit']=1;

 

 // created: 2019-05-06 17:30:35
$dictionary['vedic_Candidates']['fields']['parent_name']['inline_edit']=1;

 

 // created: 2019-05-06 17:30:37
$dictionary['vedic_Candidates']['fields']['parent_type']['inline_edit']=1;

 

 // created: 2019-05-06 17:30:38
$dictionary['vedic_Candidates']['fields']['path_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['path_c']['labelValue']='Path';

 

 // created: 2019-05-06 17:30:40
$dictionary['vedic_Candidates']['fields']['payrate_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['payrate_c']['labelValue']='Payrate';

 

 // created: 2019-05-06 17:30:41
$dictionary['vedic_Candidates']['fields']['pay_year_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['pay_year_c']['labelValue']='Pay/Year';

 

 // created: 2019-05-06 17:30:42
$dictionary['vedic_Candidates']['fields']['percentage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['percentage_c']['labelValue']='Percentage';

 

 // created: 2019-05-06 17:30:43
$dictionary['vedic_Candidates']['fields']['perm_audit_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['perm_audit_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['perm_audit_dt_c']['labelValue']='PERM Audit DT';
$dictionary['vedic_Candidates']['fields']['perm_audit_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:44
$dictionary['vedic_Candidates']['fields']['perm_case_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['perm_case_c']['labelValue']='PERM Case#';

 

 // created: 2019-05-06 17:30:44
$dictionary['vedic_Candidates']['fields']['perm_cert_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['perm_cert_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['perm_cert_dt_c']['labelValue']='PERM Cert# DT';
$dictionary['vedic_Candidates']['fields']['perm_cert_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:46
$dictionary['vedic_Candidates']['fields']['perm_denied_dt_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['perm_denied_dt_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['perm_denied_dt_c']['labelValue']='PERM Denied DT';
$dictionary['vedic_Candidates']['fields']['perm_denied_dt_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:47
$dictionary['vedic_Candidates']['fields']['perm_status_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['perm_status_c']['labelValue']='PERM Status';

 

 // created: 2014-12-30 00:59:06

 

 // created: 2014-12-30 00:59:33

 

 // created: 2014-12-30 00:59:51

 

 // created: 2019-05-06 17:30:48
$dictionary['vedic_Candidates']['fields']['phase_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['phase_c']['labelValue']='Phase';

 

 // created: 2015-02-19 12:24:15
$dictionary['vedic_Candidates']['fields']['phone_home']['audited']=true;
$dictionary['vedic_Candidates']['fields']['phone_home']['comments']='Home phone number of the contact';
$dictionary['vedic_Candidates']['fields']['phone_home']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['phone_home']['unified_search']=false;

 

 // created: 2015-02-19 12:24:28
$dictionary['vedic_Candidates']['fields']['phone_mobile']['audited']=true;
$dictionary['vedic_Candidates']['fields']['phone_mobile']['comments']='Mobile phone number of the contact';
$dictionary['vedic_Candidates']['fields']['phone_mobile']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['phone_mobile']['unified_search']=false;

 

 // created: 2015-02-19 12:24:38
$dictionary['vedic_Candidates']['fields']['phone_other']['audited']=true;
$dictionary['vedic_Candidates']['fields']['phone_other']['comments']='Other phone number for the contact';
$dictionary['vedic_Candidates']['fields']['phone_other']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['phone_other']['unified_search']=false;

 

 // created: 2019-05-06 17:30:48
$dictionary['vedic_Candidates']['fields']['poc_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['poc_c']['labelValue']='POC';

 

 // created: 2014-12-30 01:00:34

 

 // created: 2014-12-30 01:00:53

 

 // created: 2014-12-30 01:01:15

 

 // created: 2019-05-06 17:30:49
$dictionary['vedic_Candidates']['fields']['po_end_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['po_end_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['po_end_date_c']['labelValue']='PO End Date';
$dictionary['vedic_Candidates']['fields']['po_end_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:51
$dictionary['vedic_Candidates']['fields']['practice_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['practice_c']['labelValue']='Practice';

 

 // created: 2015-07-22 11:18:24

 

$dictionary['vedic_Candidates']['fields']['primary_address_country']['type']='enum';
$dictionary['vedic_Candidates']['fields']['primary_address_country']['options']='country_list';

 


$dictionary['vedic_Candidates']['fields']['primary_address_state']['type']='enum';
$dictionary['vedic_Candidates']['fields']['primary_address_state']['options']='state_list';

 


 // created: 2019-05-06 17:30:52
$dictionary['vedic_Candidates']['fields']['primary_city_state_zip_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['primary_city_state_zip_c']['labelValue']='Primary City State Zip';

 

 // created: 2019-05-06 17:30:52
$dictionary['vedic_Candidates']['fields']['primary_key_skill_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['primary_key_skill_c']['labelValue']='Primary KeySkill';

 

 // created: 2019-05-06 17:30:53
$dictionary['vedic_Candidates']['fields']['primary_marketer_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['primary_marketer_c']['labelValue']='Primary Marketer';

 

 // created: 2019-05-06 17:30:54
$dictionary['vedic_Candidates']['fields']['primary_skill_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['primary_skill_c']['labelValue']='Primary KeySkill';

 

 // created: 2019-05-06 17:30:55
$dictionary['vedic_Candidates']['fields']['priority_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['priority_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['priority_date_c']['labelValue']='Priority Date';
$dictionary['vedic_Candidates']['fields']['priority_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:56
$dictionary['vedic_Candidates']['fields']['project_end_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['project_end_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['project_end_date_c']['labelValue']='Project End Date';
$dictionary['vedic_Candidates']['fields']['project_end_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:56
$dictionary['vedic_Candidates']['fields']['project_start_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['project_start_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['project_start_date_c']['labelValue']='Project Start Date';
$dictionary['vedic_Candidates']['fields']['project_start_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:30:57
$dictionary['vedic_Candidates']['fields']['rate_lca_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['rate_lca_c']['labelValue']='LCA Ratea';

 

 // created: 2019-05-06 17:30:58
$dictionary['vedic_Candidates']['fields']['reason_complete_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['reason_complete_c']['labelValue']='Reason for complete';

 

 // created: 2015-09-28 07:30:55
$dictionary['vedic_Candidates']['fields']['reason_for_rejection']['default']='';
$dictionary['vedic_Candidates']['fields']['reason_for_rejection']['audited']=true;

 

 // created: 2019-05-06 17:30:58
$dictionary['vedic_Candidates']['fields']['recruiter_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['recruiter_c']['labelValue']='Recruiter';

 

 // created: 2015-09-28 07:32:30
$dictionary['vedic_Candidates']['fields']['recruitment_agency']['audited']=true;

 

 // created: 2015-12-03 14:11:59
$dictionary['vedic_Candidates']['fields']['referred_by']['help']='Use either Passport number or Drivers license';

 

 // created: 2019-05-06 17:30:59
$dictionary['vedic_Candidates']['fields']['relocation_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['relocation_c']['labelValue']='Candidate Relocation';

 

 // created: 2015-09-28 08:04:37
$dictionary['vedic_Candidates']['fields']['resumepath']['audited']=true;

 

 // created: 2015-02-06 09:08:13
$dictionary['vedic_Candidates']['fields']['resumesearch']['comments']='Search in Resume';
$dictionary['vedic_Candidates']['fields']['resumesearch']['rows']='4';
$dictionary['vedic_Candidates']['fields']['resumesearch']['cols']='20';
$dictionary['vedic_Candidates']['fields']['resumesearch']['audited']=false;

 

 // created: 2015-12-24 06:18:35
 $dictionary['vedic_Candidates']['fields']['resume_id']['required']=true;

 

 // created: 2016-08-15 09:00:20
$dictionary['vedic_Candidates']['fields']['resume_sumary_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['resume_sumary_c']['labelValue']='Resume Sumary';

 

 // created: 2019-05-06 17:30:59
$dictionary['vedic_Candidates']['fields']['resume_summary_c']['labelValue']='Resume Summary';

 

 // created: 2019-05-06 17:31:00
$dictionary['vedic_Candidates']['fields']['revision_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['revision_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['revision_date_c']['labelValue']='Revision Date';
$dictionary['vedic_Candidates']['fields']['revision_date_c']['enable_range_search']='1';

 

 // created: 2017-11-21 06:55:53
$dictionary['vedic_Candidates']['fields']['rl']['required']=false;
$dictionary['vedic_Candidates']['fields']['rl']['source']='non-db';
$dictionary['vedic_Candidates']['fields']['rl']['name']='rl';
$dictionary['vedic_Candidates']['fields']['rl']['vname']='LBL_RL';
$dictionary['vedic_Candidates']['fields']['rl']['type']='relate';
$dictionary['vedic_Candidates']['fields']['rl']['massupdate']=0;
$dictionary['vedic_Candidates']['fields']['rl']['no_default']=false;
$dictionary['vedic_Candidates']['fields']['rl']['comments']='';
$dictionary['vedic_Candidates']['fields']['rl']['help']='';
$dictionary['vedic_Candidates']['fields']['rl']['importable']='true';
$dictionary['vedic_Candidates']['fields']['rl']['duplicate_merge']='disabled';
$dictionary['vedic_Candidates']['fields']['rl']['duplicate_merge_dom_value']='0';
$dictionary['vedic_Candidates']['fields']['rl']['audited']=true;
$dictionary['vedic_Candidates']['fields']['rl']['reportable']=true;
$dictionary['vedic_Candidates']['fields']['rl']['unified_search']=false;
$dictionary['vedic_Candidates']['fields']['rl']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['rl']['len']='255';
$dictionary['vedic_Candidates']['fields']['rl']['size']='30';
$dictionary['vedic_Candidates']['fields']['rl']['id_name']='rl_id';
$dictionary['vedic_Candidates']['fields']['rl']['ext2']='Users';
$dictionary['vedic_Candidates']['fields']['rl']['module']='Users';
$dictionary['vedic_Candidates']['fields']['rl']['rname']='name';
$dictionary['vedic_Candidates']['fields']['rl']['quicksearch']='enabled';
$dictionary['vedic_Candidates']['fields']['rl']['studio']='visible';
$dictionary['vedic_Candidates']['fields']['rl']['inline_edit']=true;

 


 // created: 2019-05-06 17:31:01
$dictionary['vedic_Candidates']['fields']['rl_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['rl_c']['labelValue']='RL';

 

	$dictionary["vedic_Candidates"]["fields"]['rl_id']['required'] = false;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['name'] = 'rl_id';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['vname'] = 'LBL_RL_ID';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['type'] = 'id';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['massupdate'] = 1;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['no_default'] = false;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['comments'] = '';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['help'] = '';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['importable'] = 'true';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['duplicate_merge'] = 'disabled';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['duplicate_merge_dom_value'] = 0;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['audited'] = false;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['reportable'] = false;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['unified_search'] = false;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['merge_filter'] = 'disabled';
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['len'] = 36;
	$dictionary["vedic_Candidates"]["fields"]['rl_id']['size'] = '20';
 

 // created: 2019-05-06 17:31:01
$dictionary['vedic_Candidates']['fields']['role_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['role_c']['labelValue']='Role';

 

 // created: 2019-05-06 17:31:01
$dictionary['vedic_Candidates']['fields']['sales_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['sales_c']['labelValue']='Sales';

 

 // created: 2015-02-19 12:23:31
$dictionary['vedic_Candidates']['fields']['salutation']['len']=100;
$dictionary['vedic_Candidates']['fields']['salutation']['audited']=true;
$dictionary['vedic_Candidates']['fields']['salutation']['comments']='Contact salutation (e.g., Mr, Ms)';
$dictionary['vedic_Candidates']['fields']['salutation']['merge_filter']='disabled';

 

 // created: 2019-05-06 17:31:02
$dictionary['vedic_Candidates']['fields']['secondary_marketer_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['secondary_marketer_c']['labelValue']='Secondary Marketer';

 

 // created: 2019-05-06 17:31:03
$dictionary['vedic_Candidates']['fields']['sell_rate_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['sell_rate_hr_c']['labelValue']='Sell Rate/hr';

 

 // created: 2019-05-06 17:31:04
$dictionary['vedic_Candidates']['fields']['service_center_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['service_center_c']['labelValue']='Service Center';

 

 // created: 2019-05-06 17:31:05
$dictionary['vedic_Candidates']['fields']['show_in_report_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['show_in_report_c']['labelValue']='Show In Report';

 

 // created: 2019-05-06 17:31:06
$dictionary['vedic_Candidates']['fields']['slead_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['slead_c']['labelValue']='SLead';

 

 // created: 2019-05-06 17:31:06
$dictionary['vedic_Candidates']['fields']['spouse_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['spouse_c']['labelValue']='Spouse';

 

 // created: 2019-05-06 17:31:07
$dictionary['vedic_Candidates']['fields']['ssn_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:08
$dictionary['vedic_Candidates']['fields']['stage_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['stage_c']['labelValue']='Stage';

 

 // created: 2019-05-06 17:31:09
$dictionary['vedic_Candidates']['fields']['state_payroll_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['state_payroll_c']['labelValue']='State-Payroll';

 

 // created: 2016-06-08 11:08:28
$dictionary['vedic_Candidates']['fields']['status']['default']='';
$dictionary['vedic_Candidates']['fields']['status']['audited']=true;
$dictionary['vedic_Candidates']['fields']['status']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['status']['massupdate']='1';

 

 // created: 2016-08-11 06:15:55
$dictionary['vedic_Candidates']['fields']['summary_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['summary_c']['labelValue']='Summary';

 

 // created: 2019-05-06 17:31:09
$dictionary['vedic_Candidates']['fields']['supplier_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['supplier_c']['labelValue']='Supplier';

 

$dictionary['vedic_Candidates']['fields']['technical_comments']['name']='technical_comments';
$dictionary['vedic_Candidates']['fields']['technical_comments']['vname']='Comments';
$dictionary['vedic_Candidates']['fields']['technical_comments']['type']='text';
$dictionary['vedic_Candidates']['fields']['technical_comments']['importable']=true;
$dictionary['vedic_Candidates']['fields']['technical_comments']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['technical_comments']['audited']=true;
$dictionary['vedic_Candidates']['fields']['technical_comments']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['technical_comments']['rows']='4';
$dictionary['vedic_Candidates']['fields']['technical_comments']['cols']='20';
$dictionary['vedic_Candidates']['fields']['technical_comments']['merge_filter']='disabled';


$dictionary['vedic_Candidates']['fields']['technical_rating']['name']='technical_rating';
$dictionary['vedic_Candidates']['fields']['technical_rating']['vname']='Technical Rating';
$dictionary['vedic_Candidates']['fields']['technical_rating']['type']='enum';
$dictionary['vedic_Candidates']['fields']['technical_rating']['options']='functional_experience_rating_list';
$dictionary['vedic_Candidates']['fields']['technical_rating']['importable']=true;
$dictionary['vedic_Candidates']['fields']['technical_rating']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['technical_rating']['audited']=true;
$dictionary['vedic_Candidates']['fields']['technical_rating']['inline_edit']=false;
$dictionary['vedic_Candidates']['fields']['technical_rating']['merge_filter']='disabled';



 // created: 2019-05-06 16:18:36
$dictionary['vedic_Candidates']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['test_c']['labelValue']='test';

 

 // created: 2015-02-19 12:23:55
$dictionary['vedic_Candidates']['fields']['title']['comments']='The title of the contact';
$dictionary['vedic_Candidates']['fields']['title']['merge_filter']='disabled';
$dictionary['vedic_Candidates']['fields']['title']['audited']=true;

 

 // created: 2019-05-06 17:31:11
$dictionary['vedic_Candidates']['fields']['total_hr_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['total_hr_c']['labelValue']='Total/Hr';

 

 // created: 2019-05-06 17:31:12
$dictionary['vedic_Candidates']['fields']['training_batch_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['training_batch_c']['labelValue']='Training Batch';

 

 // created: 2019-05-06 17:31:13
$dictionary['vedic_Candidates']['fields']['training_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['training_c']['labelValue']='Training';

 

$dictionary['vedic_Candidates']['fields']['type_hiring']['name']='type_hiring';
$dictionary['vedic_Candidates']['fields']['type_hiring']['vname']='Type';
$dictionary['vedic_Candidates']['fields']['type_hiring']['type']='enum';
$dictionary['vedic_Candidates']['fields']['type_hiring']['options']='type_hiring_list';
$dictionary['vedic_Candidates']['fields']['type_hiring']['importable']=true;
$dictionary['vedic_Candidates']['fields']['type_hiring']['mass_update']=true;
$dictionary['vedic_Candidates']['fields']['type_hiring']['audited']=true;
$dictionary['vedic_Candidates']['fields']['type_hiring']['inline_edit']=true;
$dictionary['vedic_Candidates']['fields']['type_hiring']['required']=true;
$dictionary['vedic_Candidates']['fields']['type_hiring']['merge_filter']='disabled';


 // created: 2014-12-30 00:56:58

 

 // created: 2014-12-30 00:57:37

 

 // created: 2014-12-30 00:58:46

 

 // created: 2019-05-06 17:31:14
$dictionary['vedic_Candidates']['fields']['user_id1_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:14
$dictionary['vedic_Candidates']['fields']['user_id2_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:15
$dictionary['vedic_Candidates']['fields']['user_id3_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:16
$dictionary['vedic_Candidates']['fields']['user_id4_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:16
$dictionary['vedic_Candidates']['fields']['user_id5_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:17
$dictionary['vedic_Candidates']['fields']['user_id6_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:18
$dictionary['vedic_Candidates']['fields']['user_id7_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:19
$dictionary['vedic_Candidates']['fields']['user_id8_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:20
$dictionary['vedic_Candidates']['fields']['user_id9_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:21
$dictionary['vedic_Candidates']['fields']['user_id_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:31:21
$dictionary['vedic_Candidates']['fields']['vedic_employees_id_c']['inline_edit']=1;

 

 // created: 2016-02-17 09:16:02
$dictionary['vedic_Candidates']['fields']['vedic_employee_referer']['audited']=true;

 

 // created: 2019-05-06 17:31:22
$dictionary['vedic_Candidates']['fields']['vedic_employee_referer_n_c']['inline_edit']='1';
$dictionary['vedic_Candidates']['fields']['vedic_employee_referer_n_c']['labelValue']='Vedic Employee (Referer)';

 

 // created: 2019-05-06 17:31:22
$dictionary['vedic_Candidates']['fields']['vedic_job_title_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['vedic_job_title_c']['labelValue']='Vedic Job Title';

 

 // created: 2019-05-06 17:31:25
$dictionary['vedic_Candidates']['fields']['w2ctc_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['w2ctc_c']['labelValue']='Visa Status';

 

 // created: 2019-05-06 17:31:26
$dictionary['vedic_Candidates']['fields']['wedding_date_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['wedding_date_c']['options']='date_range_search_dom';
$dictionary['vedic_Candidates']['fields']['wedding_date_c']['labelValue']='Wedding Date';
$dictionary['vedic_Candidates']['fields']['wedding_date_c']['enable_range_search']='1';

 

 // created: 2019-05-06 17:31:27
$dictionary['vedic_Candidates']['fields']['willing_to_train_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['willing_to_train_c']['labelValue']='Willing to Train';

 

 // created: 2019-05-06 17:31:28
$dictionary['vedic_Candidates']['fields']['work_city_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['work_city_c']['labelValue']='Work City';

 

 // created: 2015-09-28 07:31:45
$dictionary['vedic_Candidates']['fields']['work_experience_months']['audited']=true;

 

 // created: 2015-09-28 07:32:19
$dictionary['vedic_Candidates']['fields']['work_experience_years']['audited']=true;

 

 // created: 2019-05-06 17:31:29
$dictionary['vedic_Candidates']['fields']['work_state_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['work_state_c']['labelValue']='Work State';

 

 // created: 2019-05-06 17:31:29
$dictionary['vedic_Candidates']['fields']['zip_code_c']['inline_edit']=1;
$dictionary['vedic_Candidates']['fields']['zip_code_c']['labelValue']='ZIP Code';

 

// created: 2014-12-04 08:51:23
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_activities_1_meetings"] = array (
  'name' => 'vedic_candidates_activities_1_meetings',
  'type' => 'link',
  'relationship' => 'vedic_candidates_activities_1_meetings',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_VEDIC_CANDIDATES_ACTIVITIES_1_MEETINGS_FROM_MEETINGS_TITLE',
);


// created: 2014-12-04 08:51:23
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_activities_1_notes"] = array (
  'name' => 'vedic_candidates_activities_1_notes',
  'type' => 'link',
  'relationship' => 'vedic_candidates_activities_1_notes',
  'source' => 'non-db',
  'module' => 'Notes',
  'bean_name' => 'Note',
  'vname' => 'LBL_VEDIC_CANDIDATES_ACTIVITIES_1_NOTES_FROM_NOTES_TITLE',
);


// created: 2014-12-04 08:51:23
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_activities_1_tasks"] = array (
  'name' => 'vedic_candidates_activities_1_tasks',
  'type' => 'link',
  'relationship' => 'vedic_candidates_activities_1_tasks',
  'source' => 'non-db',
  'module' => 'Tasks',
  'bean_name' => 'Task',
  'vname' => 'LBL_VEDIC_CANDIDATES_ACTIVITIES_1_TASKS_FROM_TASKS_TITLE',
);


// created: 2016-06-14 11:21:30
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_documents_1"] = array (
  'name' => 'vedic_candidates_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2017-01-14 13:15:32
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_project_1"] = array (
  'name' => 'vedic_candidates_project_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_project_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_PROJECT_TITLE',
);


// created: 2017-01-19 00:05:38
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_timesheet_1"] = array (
  'name' => 'vedic_candidates_timesheet_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_timesheet_1',
  'source' => 'non-db',
  'module' => 'Timesheet',
  'bean_name' => 'Timesheet',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_TIMESHEET_TITLE',
);


// created: 2014-12-03 01:51:49
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_vedic_employees_1"] = array (
  'name' => 'vedic_candidates_vedic_employees_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_employees_1',
  'source' => 'non-db',
  'module' => 'vedic_Employees',
  'bean_name' => 'vedic_Employees',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_EMPLOYEES_TITLE',
);


// created: 2017-01-14 11:07:08
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_vedic_immigration_1"] = array (
  'name' => 'vedic_candidates_vedic_immigration_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_immigration_1',
  'source' => 'non-db',
  'module' => 'vedic_Immigration',
  'bean_name' => 'vedic_Immigration',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_IMMIGRATION_TITLE',
);


// created: 2018-04-24 06:14:49
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_vedic_profiles_1"] = array (
  'name' => 'vedic_candidates_vedic_profiles_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_profiles_1',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_PROFILES_1_FROM_VEDIC_PROFILES_TITLE',
);


// created: 2015-01-06 05:42:23
$dictionary["vedic_Candidates"]["fields"]["vedic_candidates_vedic_submissions_1"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_Submissions',
  'bean_name' => 'vedic_Submissions',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);


// created: 2018-05-30 12:09:30
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1"] = array (
  'name' => 'vedic_job_vedic_candidates_1',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_candidates_1',
  'source' => 'non-db',
  'module' => 'vedic_job',
  'bean_name' => 'vedic_job',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE',
  'id_name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
);
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1_name"] = array (
  'name' => 'vedic_job_vedic_candidates_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE',
  'save' => true,
  'id_name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
  'link' => 'vedic_job_vedic_candidates_1',
  'table' => 'vedic_job',
  'module' => 'vedic_job',
  'rname' => 'name',
);
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1vedic_job_ida"] = array (
  'name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_candidates_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_CANDIDATES_TITLE',
);

?>