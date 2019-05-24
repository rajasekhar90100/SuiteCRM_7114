<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['vedic_Solutions_Timesheet']['fields']['add_timesheet']['name'] = 'add_timesheet';
$dictionary['vedic_Solutions_Timesheet']['fields']['add_timesheet']['vname'] = 'LBL_ADD_TIMESHEET';
$dictionary['vedic_Solutions_Timesheet']['fields']['add_timesheet']['type'] = 'varchar';
$dictionary['vedic_Solutions_Timesheet']['fields']['add_timesheet']['inline_edit']=false;


$dictionary['vedic_Solutions_Timesheet']['fields']['default_projects_status']['name'] = 'default_projects_status';
$dictionary['vedic_Solutions_Timesheet']['fields']['default_projects_status']['vname'] = 'Default Projects Status';
$dictionary['vedic_Solutions_Timesheet']['fields']['default_projects_status']['type'] = 'varchar';
$dictionary['vedic_Solutions_Timesheet']['fields']['default_projects_status']['importable'] = 'true';



$dictionary['vedic_Solutions_Timesheet']['fields']['enddate']['name'] = 'enddate';
$dictionary['vedic_Solutions_Timesheet']['fields']['enddate']['vname'] = 'LBL_ENDDATE';
$dictionary['vedic_Solutions_Timesheet']['fields']['enddate']['type'] = 'date';


$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['name']='pm_approval_status';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['vname']='LBL_PM_APPROVAL_STATUS';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['type']='enum';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['options']='solutions_approval_status_list';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['importable']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['mass_update']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['audited']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['inline_edit']=false;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_approval_status']['merge_filter']='disabled';




$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['name']='pm_reason_for_rejection';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['vname']='LBL_PM_REJECTION_FOR_REJECTION';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['type']='text';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['importable']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['mass_update']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['audited']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['inline_edit']=false;
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['rows']='4';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['cols']='20';
$dictionary['vedic_Solutions_Timesheet']['fields']['pm_reason_for_rejection']['merge_filter']='disabled';




$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['name']='rm_approval_status';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['vname']='LBL_RM_APPROVAL_STATUS';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['type']='enum';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['options']='solutions_approval_status_list';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['importable']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['mass_update']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['audited']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['inline_edit']=false;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_approval_status']['merge_filter']='disabled';




$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['name']='rm_reason_for_rejection';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['vname']='LBL_RM_REJECTION_FOR_REJECTION';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['type']='text';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['importable']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['mass_update']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['audited']=true;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['inline_edit']=false;
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['rows']='4';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['cols']='20';
$dictionary['vedic_Solutions_Timesheet']['fields']['rm_reason_for_rejection']['merge_filter']='disabled';




$dictionary['vedic_Solutions_Timesheet']['fields']['startdate']['name'] = 'startdate';
$dictionary['vedic_Solutions_Timesheet']['fields']['startdate']['vname'] = 'LBL_STARTDATE';
$dictionary['vedic_Solutions_Timesheet']['fields']['startdate']['type'] = 'date';


 // created: 2019-05-06 17:14:40
$dictionary['vedic_Solutions_Timesheet']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Solutions_Timesheet']['fields']['test_c']['labelValue']='test';

 

 // created: 2016-05-16 11:46:26
$dictionary['vedic_Solutions_Timesheet']['fields']['timesheet_week'] = array (
	'name' => 'timesheet_week',
	'vname' => 'LBL_TIMESHEET_WEEK',
	'type' => 'text',
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



// created: 2018-12-22 06:00:28
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1"] = array (
  'name' => 'users_vedic_solutions_timesheet_1',
  'type' => 'link',
  'relationship' => 'users_vedic_solutions_timesheet_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_USERS_TITLE',
  'id_name' => 'users_vedic_solutions_timesheet_1users_ida',
);
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1_name"] = array (
  'name' => 'users_vedic_solutions_timesheet_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_vedic_solutions_timesheet_1users_ida',
  'link' => 'users_vedic_solutions_timesheet_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1users_ida"] = array (
  'name' => 'users_vedic_solutions_timesheet_1users_ida',
  'type' => 'link',
  'relationship' => 'users_vedic_solutions_timesheet_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_VEDIC_SOLUTIONS_TIMESHEET_TITLE',
);

?>