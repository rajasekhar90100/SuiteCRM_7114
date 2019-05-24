<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2017-11-13 10:10:47
$dictionary["vedic_Holydays"]["fields"]["project_vedic_holydays_1"] = array (
  'name' => 'project_vedic_holydays_1',
  'type' => 'link',
  'relationship' => 'project_vedic_holydays_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_PROJECT_VEDIC_HOLYDAYS_1_FROM_PROJECT_TITLE',
);


 // created: 2019-05-06 17:32:03
$dictionary['vedic_Holydays']['fields']['end_date_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['end_date_c']['labelValue']='End Date';

 

 // created: 2019-05-06 17:32:04
$dictionary['vedic_Holydays']['fields']['hours_impact_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['hours_impact_c']['labelValue']='Hours Impact';

 

 // created: 2019-05-06 17:32:05
$dictionary['vedic_Holydays']['fields']['letter_submitted_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['letter_submitted_c']['labelValue']='Letter Submitted';

 

 // created: 2016-08-11 09:49:45
$dictionary['vedic_Holydays']['fields']['name']['inline_edit']=true;
$dictionary['vedic_Holydays']['fields']['name']['full_text_search']=array (
);

 

 // created: 2016-07-05 15:15:10
$dictionary['vedic_Holydays']['fields']['project_type']['name']='project_type';
$dictionary['vedic_Holydays']['fields']['project_type']['vname']='Projects';
$dictionary['vedic_Holydays']['fields']['project_type']['type']='multienum';
$dictionary['vedic_Holydays']['fields']['project_type']['link']='Project';
$dictionary['vedic_Holydays']['fields']['project_type']['comment']='The template that the project type was created from.';
$dictionary['vedic_Holydays']['fields']['project_type']['inline_edit']=true;
$dictionary['vedic_Holydays']['fields']['project_type']['options']='';
$dictionary['vedic_Holydays']['fields']['project_type']['comments']='The template that the project type was created from.';
$dictionary['vedic_Holydays']['fields']['project_type']['merge_filter']='disabled';


 // created: 2016-08-11 07:05:21
$dictionary['vedic_Holydays']['fields']['quantity']['required']=false;


 // created: 2019-05-06 17:32:06
$dictionary['vedic_Holydays']['fields']['start_date_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['start_date_c']['labelValue']='Start Date';

 

 // created: 2019-05-06 16:53:59
$dictionary['vedic_Holydays']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['test_c']['labelValue']='test';

 

 // created: 2019-05-06 17:32:07
$dictionary['vedic_Holydays']['fields']['type_of_vacation_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['type_of_vacation_c']['labelValue']='Type of vacation';

 

 // created: 2019-05-06 17:32:08
$dictionary['vedic_Holydays']['fields']['vacation_category_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['vacation_category_c']['labelValue']='Vacation Category';

 

 // created: 2019-05-06 17:32:09
$dictionary['vedic_Holydays']['fields']['vacation_status_c']['inline_edit']='1';
$dictionary['vedic_Holydays']['fields']['vacation_status_c']['labelValue']='Status';

 

// created: 2014-11-19 12:16:23
$dictionary["vedic_Holydays"]["fields"]["vedic_employees_vedic_holydays_1"] = array (
  'name' => 'vedic_employees_vedic_holydays_1',
  'type' => 'link',
  'relationship' => 'vedic_employees_vedic_holydays_1',
  'source' => 'non-db',
  'module' => 'vedic_Employees',
  'bean_name' => 'vedic_Employees',
  'vname' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'id_name' => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
  'required' => true,
);
$dictionary["vedic_Holydays"]["fields"]["vedic_employees_vedic_holydays_1_name"] = array (
  'name' => 'vedic_employees_vedic_holydays_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'save' => true,
  'id_name' => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
  'link' => 'vedic_employees_vedic_holydays_1',
  'table' => 'vedic_employees',
  'module' => 'vedic_Employees',
  'rname' => 'name',
  'required' => true,
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Holydays"]["fields"]["vedic_employees_vedic_holydays_1vedic_employees_ida"] = array (
  'name' => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
  'type' => 'link',
  'relationship' => 'vedic_employees_vedic_holydays_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_HOLYDAYS_TITLE',
);


// created: 2017-07-02 05:54:38
$dictionary["vedic_Holydays"]["fields"]["vedic_holydays_documents_1"] = array (
  'name' => 'vedic_holydays_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_holydays_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);

?>