<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-06-25 23:55:39
$dictionary["Project"]["fields"]["am_projectholidays_project"] = array (
  'name' => 'am_projectholidays_project',
  'type' => 'link',
  'relationship' => 'am_projectholidays_project',
  'source' => 'non-db',
  'module' => 'AM_ProjectHolidays',
  'bean_name' => 'AM_ProjectHolidays',
  'side' => 'right',
  'vname' => 'LBL_AM_PROJECTHOLIDAYS_PROJECT_FROM_AM_PROJECTHOLIDAYS_TITLE',
);


// created: 2017-11-13 10:10:47
$dictionary["Project"]["fields"]["project_vedic_holydays_1"] = array (
  'name' => 'project_vedic_holydays_1',
  'type' => 'link',
  'relationship' => 'project_vedic_holydays_1',
  'source' => 'non-db',
  'module' => 'vedic_Holydays',
  'bean_name' => 'vedic_Holydays',
  'vname' => 'LBL_PROJECT_VEDIC_HOLYDAYS_1_FROM_VEDIC_HOLYDAYS_TITLE',
);



$dictionary['Project']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_project',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2019-05-06 17:29:03
$dictionary['Project']['fields']['account_customer_c']['inline_edit']='1';
$dictionary['Project']['fields']['account_customer_c']['labelValue']='Customer';

 

 // created: 2019-05-06 17:29:04
$dictionary['Project']['fields']['account_id1_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:05
$dictionary['Project']['fields']['account_id2_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:06
$dictionary['Project']['fields']['account_id_c']['inline_edit']=1;

 

$dictionary['Project']['fields']['assigned_user_id']['massupdate']=false;




 // created: 2019-05-06 17:29:07
$dictionary['Project']['fields']['bill_rate_c']['inline_edit']='1';
$dictionary['Project']['fields']['bill_rate_c']['labelValue']='Bill Rate';

 

 // created: 2019-05-06 17:29:08
$dictionary['Project']['fields']['bonus_c']['inline_edit']='1';
$dictionary['Project']['fields']['bonus_c']['labelValue']='Bonus';

 

$dictionary['Project']['fields']['created_by_name']['massupdate']=false;




 // created: 2019-05-06 17:29:08
$dictionary['Project']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:09
$dictionary['Project']['fields']['department_c']['inline_edit']='1';
$dictionary['Project']['fields']['department_c']['labelValue']='QB Department (Location)';

 

 // created: 2019-05-06 17:29:09
$dictionary['Project']['fields']['epoc_c']['inline_edit']='1';
$dictionary['Project']['fields']['epoc_c']['labelValue']='EPOC';

 

$dictionary['Project']['fields']['estimated_end_date']['audited'] = true;



$dictionary['Project']['fields']['estimated_start_date']['audited'] = true;



 // created: 2019-05-06 17:29:11
$dictionary['Project']['fields']['income_accounts_c']['inline_edit']='1';
$dictionary['Project']['fields']['income_accounts_c']['labelValue']='Income Accounts';

 

 // created: 2019-05-06 17:29:11
$dictionary['Project']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:11
$dictionary['Project']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:11
$dictionary['Project']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:11
$dictionary['Project']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:12
$dictionary['Project']['fields']['location_c']['inline_edit']='1';
$dictionary['Project']['fields']['location_c']['labelValue']='QB Location';

 

 // created: 2019-05-06 17:29:12
$dictionary['Project']['fields']['midvendor1_c']['inline_edit']='1';
$dictionary['Project']['fields']['midvendor1_c']['labelValue']='Mid Vendor1';

 

 // created: 2019-05-06 17:29:12
$dictionary['Project']['fields']['midvendor2_c']['inline_edit']='1';
$dictionary['Project']['fields']['midvendor2_c']['labelValue']='Mid Vendor2';

 

 // created: 2019-05-06 17:29:13
$dictionary['Project']['fields']['mpoc_c']['inline_edit']='1';
$dictionary['Project']['fields']['mpoc_c']['labelValue']='MPOC';

 

 // created: 2016-12-08 07:21:07
$dictionary['Project']['fields']['name']['len']='150';
$dictionary['Project']['fields']['name']['inline_edit']=true;
$dictionary['Project']['fields']['name']['comments']='Project name';
$dictionary['Project']['fields']['name']['merge_filter']='disabled';
$dictionary['Project']['fields']['name']['unified_search']=false;
$dictionary['Project']['fields']['name']['full_text_search']=array (
);

 


$dictionary['Project']['fields']['override_business_hours']['massupdate']=false;





 // created: 2019-05-06 17:29:13
$dictionary['Project']['fields']['overtime_c']['inline_edit']='1';
$dictionary['Project']['fields']['overtime_c']['labelValue']='Overtime';

 

 // created: 2019-05-06 17:29:14
$dictionary['Project']['fields']['pay_rate_c']['inline_edit']='1';
$dictionary['Project']['fields']['pay_rate_c']['labelValue']='Pay Rate';

 

$dictionary['Project']['fields']['po_enddate']['name']='po_enddate';
$dictionary['Project']['fields']['po_enddate']['vname']='LBL_PO_ENDDATE';
$dictionary['Project']['fields']['po_enddate']['type']='date';
$dictionary['Project']['fields']['po_enddate']['importable']=true;
$dictionary['Project']['fields']['po_enddate']['mass_update']=true;
$dictionary['Project']['fields']['po_enddate']['audited']=true;
$dictionary['Project']['fields']['po_enddate']['inline_edit']=true;
$dictionary['Project']['fields']['po_enddate']['merge_filter']='disabled';



$dictionary['Project']['fields']['priority']['audited'] = true;



 // created: 2019-05-06 17:29:14
$dictionary['Project']['fields']['qb_income_account_c']['inline_edit']='1';
$dictionary['Project']['fields']['qb_income_account_c']['labelValue']='QB Income Account';

 

 // created: 2019-05-06 17:29:15
$dictionary['Project']['fields']['qb_service_item_c']['inline_edit']='1';
$dictionary['Project']['fields']['qb_service_item_c']['labelValue']='QB Service Item';

 

 // created: 2017-09-28 09:45:43
$dictionary['Project']['fields']['status']['inline_edit']=true;
$dictionary['Project']['fields']['status']['merge_filter']='disabled';
$dictionary['Project']['fields']['status']['audited'] = true;
 

 // created: 2019-05-06 17:29:16
$dictionary['Project']['fields']['travel_c']['inline_edit']='1';
$dictionary['Project']['fields']['travel_c']['labelValue']='Travel';

 

 // created: 2019-05-06 17:29:17
$dictionary['Project']['fields']['type_c']['inline_edit']='1';
$dictionary['Project']['fields']['type_c']['labelValue']='QB Type (SKU)';

 

 // created: 2019-05-06 17:29:17
$dictionary['Project']['fields']['user_id1_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:18
$dictionary['Project']['fields']['user_id_c']['inline_edit']=1;

 

 // created: 2019-05-06 17:29:18
$dictionary['Project']['fields']['value_c']['inline_edit']='1';
$dictionary['Project']['fields']['value_c']['labelValue']='Value';

 

 // created: 2019-05-06 17:29:19
$dictionary['Project']['fields']['w2ctc_c']['inline_edit']='1';
$dictionary['Project']['fields']['w2ctc_c']['labelValue']='W2/C2C';

 

  $dictionary['Project']['audited'] = true;



// created: 2017-01-14 13:15:32
$dictionary["Project"]["fields"]["vedic_candidates_project_1"] = array (
  'name' => 'vedic_candidates_project_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_project_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_project_1vedic_candidates_ida',
  'required' => true,
);
$dictionary["Project"]["fields"]["vedic_candidates_project_1_name"] = array (
  'name' => 'vedic_candidates_project_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_project_1vedic_candidates_ida',
  'link' => 'vedic_candidates_project_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'required' => true,
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Project"]["fields"]["vedic_candidates_project_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_project_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_project_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_PROJECT_1_FROM_PROJECT_TITLE',
);


// created: 2016-09-26 17:52:07
$dictionary["Project"]["fields"]["vedic_integrate_with_qb_project"] = array (
  'name' => 'vedic_integrate_with_qb_project',
  'type' => 'link',
  'relationship' => 'vedic_integrate_with_qb_project',
  'source' => 'non-db',
  'module' => 'vedic_Integrate_with_QB',
  'bean_name' => 'vedic_Integrate_with_QB',
  'vname' => 'LBL_VEDIC_INTEGRATE_WITH_QB_PROJECT_FROM_VEDIC_INTEGRATE_WITH_QB_TITLE',
  'id_name' => 'vedic_integrate_with_qb_projectvedic_integrate_with_qb_ida',
);
$dictionary["Project"]["fields"]["vedic_integrate_with_qb_project_name"] = array (
  'name' => 'vedic_integrate_with_qb_project_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_INTEGRATE_WITH_QB_PROJECT_FROM_VEDIC_INTEGRATE_WITH_QB_TITLE',
  'save' => true,
  'id_name' => 'vedic_integrate_with_qb_projectvedic_integrate_with_qb_ida',
  'link' => 'vedic_integrate_with_qb_project',
  'table' => 'vedic_integrate_with_qb',
  'module' => 'vedic_Integrate_with_QB',
  'rname' => 'name',
);
$dictionary["Project"]["fields"]["vedic_integrate_with_qb_projectvedic_integrate_with_qb_ida"] = array (
  'name' => 'vedic_integrate_with_qb_projectvedic_integrate_with_qb_ida',
  'type' => 'link',
  'relationship' => 'vedic_integrate_with_qb_project',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_INTEGRATE_WITH_QB_PROJECT_FROM_PROJECT_TITLE',
);


// created: 2018-04-29 09:21:21
$dictionary["Project"]["fields"]["vedic_profiles_project_1"] = array (
  'name' => 'vedic_profiles_project_1',
  'type' => 'link',
  'relationship' => 'vedic_profiles_project_1',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_VEDIC_PROFILES_TITLE',
  'id_name' => 'vedic_profiles_project_1vedic_profiles_ida',
);
$dictionary["Project"]["fields"]["vedic_profiles_project_1_name"] = array (
  'name' => 'vedic_profiles_project_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_VEDIC_PROFILES_TITLE',
  'required' => true,
  'save' => true,
  'id_name' => 'vedic_profiles_project_1vedic_profiles_ida',
  'link' => 'vedic_profiles_project_1',
  'table' => 'vedic_profiles',
  'module' => 'vedic_Profiles',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Project"]["fields"]["vedic_profiles_project_1vedic_profiles_ida"] = array (
  'name' => 'vedic_profiles_project_1vedic_profiles_ida',
  'type' => 'link',
  'relationship' => 'vedic_profiles_project_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_VEDIC_PROFILES_TITLE',
);

?>