<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['vedic_Employees']['fields']['employee_nationality']['type']='enum';
$dictionary['vedic_Employees']['fields']['employee_nationality']['options']='nationality_list';
 


 // created: 2019-05-06 17:31:33
$dictionary['vedic_Employees']['fields']['i9_notify_c']['inline_edit']='1';
$dictionary['vedic_Employees']['fields']['i9_notify_c']['labelValue']='I9 Notify';

 

 // created: 2019-05-06 17:31:33
$dictionary['vedic_Employees']['fields']['i9_reminder_date_c']['inline_edit']='1';
$dictionary['vedic_Employees']['fields']['i9_reminder_date_c']['labelValue']='I9 Expiry Date';

 

 // created: 2019-05-06 17:31:34
$dictionary['vedic_Employees']['fields']['middle_name_c']['inline_edit']='1';
$dictionary['vedic_Employees']['fields']['middle_name_c']['labelValue']='Middle Name';

 

 // created: 2017-05-15 20:18:04
$dictionary['vedic_Employees']['fields']['quiting_date']['inline_edit']=true;

 

 // created: 2019-05-06 17:31:35
$dictionary['vedic_Employees']['fields']['rehire_date_c']['inline_edit']='1';
$dictionary['vedic_Employees']['fields']['rehire_date_c']['labelValue']='Rehire Date';

 

 // created: 2019-05-06 16:27:50
$dictionary['vedic_Employees']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Employees']['fields']['test_c']['labelValue']='test';

 

// created: 2014-12-03 01:51:49
$dictionary["vedic_Employees"]["fields"]["vedic_candidates_vedic_employees_1"] = array (
  'name' => 'vedic_candidates_vedic_employees_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_employees_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_vedic_employees_1vedic_candidates_ida',
);
$dictionary["vedic_Employees"]["fields"]["vedic_candidates_vedic_employees_1_name"] = array (
  'name' => 'vedic_candidates_vedic_employees_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_vedic_employees_1vedic_candidates_ida',
  'link' => 'vedic_candidates_vedic_employees_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Employees"]["fields"]["vedic_candidates_vedic_employees_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_vedic_employees_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_employees_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_EMPLOYEES_TITLE',
);


// created: 2016-08-11 08:52:37
$dictionary["vedic_Employees"]["fields"]["vedic_employees_documents_1"] = array (
  'name' => 'vedic_employees_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_employees_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2014-11-19 12:16:23
$dictionary["vedic_Employees"]["fields"]["vedic_employees_vedic_holydays_1"] = array (
  'name' => 'vedic_employees_vedic_holydays_1',
  'type' => 'link',
  'relationship' => 'vedic_employees_vedic_holydays_1',
  'source' => 'non-db',
  'module' => 'vedic_Holydays',
  'bean_name' => 'vedic_Holydays',
  'side' => 'right',
  'vname' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_HOLYDAYS_TITLE',
);

?>