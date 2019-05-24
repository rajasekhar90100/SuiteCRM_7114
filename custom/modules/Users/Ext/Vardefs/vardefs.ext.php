<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['User']['fields']['address_country']['name']='address_country';
$dictionary['User']['fields']['address_country']['type']='enum';
$dictionary['User']['fields']['address_country']['options']='parent_country_list';
$dictionary['User']['fields']['address_country']['importable']=true;
$dictionary['User']['fields']['address_country']['mass_update']=true;
$dictionary['User']['fields']['address_country']['audited']=true;
$dictionary['User']['fields']['address_country']['inline_edit']=false;
$dictionary['User']['fields']['address_country']['merge_filter']='disabled';



$dictionary['User']['fields']['address_state']['name']='address_state';
$dictionary['User']['fields']['address_state']['dbType']='varchar';
$dictionary['User']['fields']['address_state']['type']='dynamicenum';
$dictionary['User']['fields']['address_state']['options']='state_list';
$dictionary['User']['fields']['address_state']['parentenum']='address_country';
$dictionary['User']['fields']['address_state']['importable']=true;
$dictionary['User']['fields']['address_state']['mass_update']=true;
$dictionary['User']['fields']['address_state']['audited']=true;
$dictionary['User']['fields']['address_state']['inline_edit']=false;
$dictionary['User']['fields']['address_state']['merge_filter']='disabled';
	


$dictionary['User']['fields']['contract']['required']=false;
$dictionary['User']['fields']['contract']['source']='non-db';
$dictionary['User']['fields']['contract']['name']='contract';
$dictionary['User']['fields']['contract']['vname']='LBL_CONTRACT';
$dictionary['User']['fields']['contract']['type']='relate';
$dictionary['User']['fields']['contract']['massupdate']=0;
$dictionary['User']['fields']['contract']['no_default']=false;
$dictionary['User']['fields']['contract']['comments']='';
$dictionary['User']['fields']['contract']['help']='';
$dictionary['User']['fields']['contract']['importable']='true';
$dictionary['User']['fields']['contract']['duplicate_merge']='disabled';
$dictionary['User']['fields']['contract']['duplicate_merge_dom_value']='0';
$dictionary['User']['fields']['contract']['audited']=true;
$dictionary['User']['fields']['contract']['reportable']=true;
$dictionary['User']['fields']['contract']['unified_search']=false;
$dictionary['User']['fields']['contract']['merge_filter']='disabled';
$dictionary['User']['fields']['contract']['len']='255';
$dictionary['User']['fields']['contract']['size']='30';
$dictionary['User']['fields']['contract']['id_name']='contract_id';
$dictionary['User']['fields']['contract']['ext2']='AOS_Contracts';
$dictionary['User']['fields']['contract']['module']='AOS_Contracts';
$dictionary['User']['fields']['contract']['rname']='name';
$dictionary['User']['fields']['contract']['quicksearch']='enabled';
$dictionary['User']['fields']['contract']['studio']='visible';
$dictionary['User']['fields']['contract']['inline_edit']=true;




$dictionary["User"]["fields"]['contract_id']['required'] = false;
$dictionary["User"]["fields"]['contract_id']['name'] = 'contract_id';
$dictionary["User"]["fields"]['contract_id']['vname'] = 'LBL_CONTRACT_ID';
$dictionary["User"]["fields"]['contract_id']['type'] = 'id';
$dictionary["User"]["fields"]['contract_id']['massupdate'] = 1;
$dictionary["User"]["fields"]['contract_id']['no_default'] = false;
$dictionary["User"]["fields"]['contract_id']['comments'] = '';
$dictionary["User"]["fields"]['contract_id']['help'] = '';
$dictionary["User"]["fields"]['contract_id']['importable'] = 'true';
$dictionary["User"]["fields"]['contract_id']['duplicate_merge'] = 'disabled';
$dictionary["User"]["fields"]['contract_id']['duplicate_merge_dom_value'] = 0;
$dictionary["User"]["fields"]['contract_id']['audited'] = false;
$dictionary["User"]["fields"]['contract_id']['reportable'] = false;
$dictionary["User"]["fields"]['contract_id']['unified_search'] = false;
$dictionary["User"]["fields"]['contract_id']['merge_filter'] = 'disabled';
$dictionary["User"]["fields"]['contract_id']['len'] = 36;
$dictionary["User"]["fields"]['contract_id']['size'] = '20';




$dictionary['User']['fields']['current_address_city']['name'] = 'current_address_city';
$dictionary['User']['fields']['current_address_city']['type'] = 'varchar';
$dictionary['User']['fields']['current_address_city']['vname'] = 'LBL_CURRENT_ADDRESS_CITY';
$dictionary['User']['fields']['current_address_city']['visible'] = 'studio';
$dictionary['User']['fields']['current_address_city']['len'] =  '255';
$dictionary['User']['fields']['current_address_city']['audit'] = true;
$dictionary['User']['fields']['current_address_city']['inline_edit'] = true;
$dictionary['User']['fields']['current_address_city']['sortable'] =true;



$dictionary['User']['fields']['current_address_country']['name']='current_address_country';
$dictionary['User']['fields']['current_address_country']['vname'] = 'LBL_CURRENT_ADDRESS_COUNTRY';
$dictionary['User']['fields']['current_address_country']['type']='enum';
$dictionary['User']['fields']['current_address_country']['options']='parent_country_list';
$dictionary['User']['fields']['current_address_country']['importable']=true;
$dictionary['User']['fields']['current_address_country']['mass_update']=true;
$dictionary['User']['fields']['current_address_country']['audited']=true;
$dictionary['User']['fields']['current_address_country']['inline_edit']=false;
$dictionary['User']['fields']['current_address_country']['merge_filter']='disabled';



$dictionary['User']['fields']['current_address_postalcode']['name'] = 'current_address_postalcode';
$dictionary['User']['fields']['current_address_postalcode']['type'] = 'varchar';
$dictionary['User']['fields']['current_address_postalcode']['vname'] = 'LBL_CURRENT_ADDRESS_POSTAL_CODE';
$dictionary['User']['fields']['current_address_postalcode']['visible'] = 'studio';
$dictionary['User']['fields']['current_address_postalcode']['len'] =  '255';
$dictionary['User']['fields']['current_address_postalcode']['audit'] = true;
$dictionary['User']['fields']['current_address_postalcode']['inline_edit'] = true;
$dictionary['User']['fields']['current_address_postalcode']['sortable'] =true;



$dictionary['User']['fields']['current_address_state']['name']='current_address_state';
$dictionary['User']['fields']['current_address_state']['vname'] = 'LBL_CURRENT_ADDRESS_STATE';
$dictionary['User']['fields']['current_address_state']['dbType']='varchar';
$dictionary['User']['fields']['current_address_state']['type']='dynamicenum';
$dictionary['User']['fields']['current_address_state']['options']='state_list';
$dictionary['User']['fields']['current_address_state']['parentenum']='current_address_country';
$dictionary['User']['fields']['current_address_state']['importable']=true;
$dictionary['User']['fields']['current_address_state']['mass_update']=true;
$dictionary['User']['fields']['current_address_state']['audited']=true;
$dictionary['User']['fields']['current_address_state']['inline_edit']=false;
$dictionary['User']['fields']['current_address_state']['merge_filter']='disabled';
	


$dictionary['User']['fields']['current_address_street']['name'] = 'current_address_street';
$dictionary['User']['fields']['current_address_street']['type'] = 'varchar';
$dictionary['User']['fields']['current_address_street']['vname'] = 'LBL_CURRENT_ADDRESS_STREET';
$dictionary['User']['fields']['current_address_street']['visible'] = 'studio';
$dictionary['User']['fields']['current_address_street']['len'] =  '255';
$dictionary['User']['fields']['current_address_street']['audit'] = true;
$dictionary['User']['fields']['current_address_street']['inline_edit'] = true;
$dictionary['User']['fields']['current_address_street']['sortable'] =true;



 // created: 2017-12-08 17:49:37
$dictionary['User']['fields']['department']['name']='department';
$dictionary['User']['fields']['department']['vname']='Department';
$dictionary['User']['fields']['department']['dbType']='varchar';
$dictionary['User']['fields']['department']['type']='dynamicenum';
$dictionary['User']['fields']['department']['options']='user_department';
$dictionary['User']['fields']['department']['parentenum']='division';
$dictionary['User']['fields']['department']['importable']=true;
$dictionary['User']['fields']['department']['mass_update']=true;
$dictionary['User']['fields']['department']['audited']=true;
$dictionary['User']['fields']['department']['inline_edit']=false;
$dictionary['User']['fields']['department']['merge_filter']='disabled';
 

$dictionary['User']['fields']['division']['name']='division';
$dictionary['User']['fields']['division']['vname']='LBL_DIVISION';
$dictionary['User']['fields']['division']['type']='enum';
$dictionary['User']['fields']['division']['options']='division';
$dictionary['User']['fields']['division']['importable']=true;
$dictionary['User']['fields']['division']['mass_update']=true;
$dictionary['User']['fields']['division']['audited']=true;
$dictionary['User']['fields']['division']['required']=true;
$dictionary['User']['fields']['division']['inline_edit']=false;
$dictionary['User']['fields']['division']['merge_filter']='disabled';




 // created: 2019-05-06 17:29:21
$dictionary['User']['fields']['division_department_c']['inline_edit']='';
$dictionary['User']['fields']['division_department_c']['labelValue']='Department';

 

$dictionary['User']['fields']['employee_id']['name'] = 'employee_id';
$dictionary['User']['fields']['employee_id']['vname'] = 'LBL_EMPLOYEE_ID';
$dictionary['User']['fields']['employee_id']['type'] = 'varchar';




$dictionary['User']['fields']['employment_type']['name']='employment_type';
$dictionary['User']['fields']['employment_type']['vname']='LBL_EMPLOYMENT_TYPE';
$dictionary['User']['fields']['employment_type']['type']='enum';
$dictionary['User']['fields']['employment_type']['options']='employment_type';
$dictionary['User']['fields']['employment_type']['importable']=true;
$dictionary['User']['fields']['employment_type']['mass_update']=true;
$dictionary['User']['fields']['employment_type']['audited']=true;
$dictionary['User']['fields']['employment_type']['required']=true;
$dictionary['User']['fields']['employment_type']['inline_edit']=false;
$dictionary['User']['fields']['employment_type']['merge_filter']='disabled';




$dictionary['User']['fields']['enddate']['name'] = 'enddate';
$dictionary['User']['fields']['enddate']['vname'] = 'LBL_ENDDATE';
$dictionary['User']['fields']['enddate']['type'] = 'date';
$dictionary['User']['fields']['enddate']['audited']=true;



$dictionary['User']['fields']['gender']['name']='gender';
$dictionary['User']['fields']['gender']['vname']='LBL_GENDER';
$dictionary['User']['fields']['gender']['type']='enum';
$dictionary['User']['fields']['gender']['options']='gender_list';
$dictionary['User']['fields']['gender']['importable']=true;
$dictionary['User']['fields']['gender']['mass_update']=true;
$dictionary['User']['fields']['gender']['audited']=true;
$dictionary['User']['fields']['gender']['required']=true;
$dictionary['User']['fields']['gender']['inline_edit']=false;
$dictionary['User']['fields']['gender']['merge_filter']='disabled';




/**
  * FileName => sugarfield_last_login.php
  * Created By => LakshmiGayathri (Created On May-25-2017)
  * Modified By =>LakshmiGayathri(Modify On Jun-06-2017)
  * COMMENT => To create the lastlogin field in users module
  */
$dictionary['User']['fields']['last_login']['name'] = 'last_login';
$dictionary['User']['fields']['last_login']['type'] = 'varchar';
$dictionary['User']['fields']['last_login']['vname'] = 'Last Login';
$dictionary['User']['fields']['last_login']['visible'] = 'studio';
$dictionary['User']['fields']['last_login']['len'] =  '255';
$dictionary['User']['fields']['last_login']['audit'] = true;
$dictionary['User']['fields']['last_login']['inline_edit'] = true;
$dictionary['User']['fields']['last_login']['sortable'] =true;


$dictionary['User']['fields']['office_location']['name']='office_location';
$dictionary['User']['fields']['office_location']['vname']='LBL_OFFICE_LOCATION';
$dictionary['User']['fields']['office_location']['type']='enum';
$dictionary['User']['fields']['office_location']['options']='office_location';
$dictionary['User']['fields']['office_location']['importable']=true;
$dictionary['User']['fields']['office_location']['mass_update']=true;
$dictionary['User']['fields']['office_location']['audited']=true;
$dictionary['User']['fields']['office_location']['required']=true;
$dictionary['User']['fields']['office_location']['inline_edit']=false;
$dictionary['User']['fields']['office_location']['merge_filter']='disabled';




 // created: 2017-11-20 10:41:09

$dictionary['User']['fields']['other_email']['name'] = 'other_email';
$dictionary['User']['fields']['other_email']['vname'] = 'LBL_OTHER_EMAIL';
$dictionary['User']['fields']['other_email']['type'] = 'varchar';
$dictionary['User']['fields']['other_email']['required'] = true;
    




 // created: 2017-11-30 13:12:19
$dictionary['User']['fields']['phone_work']['audited']=true;
$dictionary['User']['fields']['phone_work']['inline_edit']=true;
$dictionary['User']['fields']['phone_work']['merge_filter']='disabled';

 

// created: 2019-01-02 19:41:09
$dictionary['User']['fields']['reports_to_name']['rname'] = 'name';




$dictionary['User']['fields']['Security_group']['name']='Security_group';
$dictionary['User']['fields']['Security_group']['vname']='Security Group';
$dictionary['User']['fields']['Security_group']['type']='enum';
// $dictionary['User']['fields']['Security_group']['inline_edit']=true;
// $dictionary['User']['fields']['Security_group']['options']='';
// $dictionary['User']['fields']['Security_group']['merge_filter']='disabled';
$dictionary['User']['fields']['Security_group']['function']='get_User_Security_Groups';


$dictionary['User']['fields']['startdate']['name'] = 'startdate';
$dictionary['User']['fields']['startdate']['vname'] = 'LBL_STARTDATE';
$dictionary['User']['fields']['startdate']['type'] = 'date';
$dictionary['User']['fields']['startdate']['audited']=true;
$dictionary['User']['fields']['startdate']['required']=true;



 // created: 2017-11-30 13:12:30
$dictionary['User']['fields']['status']['audited']=true;
$dictionary['User']['fields']['status']['inline_edit']=true;
$dictionary['User']['fields']['status']['merge_filter']='disabled';

 

$dictionary['User']['fields']['timesheetaccess']['name']='timesheetaccess';
$dictionary['User']['fields']['timesheetaccess']['vname']='LBL_TIMESHEETACCESS';
$dictionary['User']['fields']['timesheetaccess']['type']='bool';
$dictionary['User']['fields']['timesheetaccess']['importable']=true;
$dictionary['User']['fields']['timesheetaccess']['mass_update']=true;
$dictionary['User']['fields']['timesheetaccess']['audited']=true;
$dictionary['User']['fields']['timesheetaccess']['inline_edit']=false;
$dictionary['User']['fields']['timesheetaccess']['merge_filter']='disabled';




 // created: 2017-12-08 18:49:42
$dictionary['User']['fields']['title']['audited']=true;
$dictionary['User']['fields']['title']['inline_edit']=true;
$dictionary['User']['fields']['title']['merge_filter']='disabled';

 

$dictionary['User']['fields']['acceptance_status']['name']='acceptance_status';
$dictionary['User']['fields']['acceptance_status']['vname']='Acceptance Status';
$dictionary['User']['fields']['acceptance_status']['type']='enum';
$dictionary['User']['fields']['acceptance_status']['options']='acceptance_status';
$dictionary['User']['fields']['acceptance_status']['importable']=true;
$dictionary['User']['fields']['acceptance_status']['mass_update']=true;
$dictionary['User']['fields']['acceptance_status']['audited']=true;
$dictionary['User']['fields']['acceptance_status']['inline_edit']=false;
$dictionary['User']['fields']['acceptance_status']['merge_filter']='disabled';




// created: 2017-07-02 05:58:22
$dictionary["User"]["fields"]["users_documents_1"] = array (
  'name' => 'users_documents_1',
  'type' => 'link',
  'relationship' => 'users_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'side' => 'right',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2018-12-22 06:00:28
$dictionary["User"]["fields"]["users_vedic_solutions_timesheet_1"] = array (
  'name' => 'users_vedic_solutions_timesheet_1',
  'type' => 'link',
  'relationship' => 'users_vedic_solutions_timesheet_1',
  'source' => 'non-db',
  'module' => 'vedic_Solutions_Timesheet',
  'bean_name' => 'vedic_Solutions_Timesheet',
  'side' => 'right',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_VEDIC_SOLUTIONS_TIMESHEET_TITLE',
);


/**
        *FileName=>vardefs.php
    *Created By => Lakshmi(Created On May-24-2017)
        *Modified By => Lakshmi (Modified On May-24-2017)
        *Comment => To create audit table in users enable audited
        */
$dictionary["User"]["audited"]=true;


// created: 2018-12-22 06:05:31
$dictionary["User"]["fields"]["vedic_solutions_projects_users_1"] = array (
  'name' => 'vedic_solutions_projects_users_1',
  'type' => 'link',
  'relationship' => 'vedic_solutions_projects_users_1',
  'source' => 'non-db',
  'module' => 'vedic_Solutions_Projects',
  'bean_name' => 'vedic_Solutions_Projects',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_USERS_1_FROM_VEDIC_SOLUTIONS_PROJECTS_TITLE',
);

?>