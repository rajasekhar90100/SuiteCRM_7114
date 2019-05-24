<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2018-11-30 09:37:18
$dictionary["vedic_Project_Rate"]["fields"]["projecttask_vedic_project_rate_1"] = array (
  'name' => 'projecttask_vedic_project_rate_1',
  'type' => 'link',
  'relationship' => 'projecttask_vedic_project_rate_1',
  'source' => 'non-db',
  'module' => 'ProjectTask',
  'bean_name' => 'ProjectTask',
  'vname' => 'LBL_PROJECTTASK_VEDIC_PROJECT_RATE_1_FROM_PROJECTTASK_TITLE',
  'id_name' => 'projecttask_vedic_project_rate_1projecttask_ida',
);
$dictionary["vedic_Project_Rate"]["fields"]["projecttask_vedic_project_rate_1_name"] = array (
  'name' => 'projecttask_vedic_project_rate_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECTTASK_VEDIC_PROJECT_RATE_1_FROM_PROJECTTASK_TITLE',
  'save' => true,
  'id_name' => 'projecttask_vedic_project_rate_1projecttask_ida',
  'link' => 'projecttask_vedic_project_rate_1',
  'table' => 'project_task',
  'module' => 'ProjectTask',
  'rname' => 'name',
);
$dictionary["vedic_Project_Rate"]["fields"]["projecttask_vedic_project_rate_1projecttask_ida"] = array (
  'name' => 'projecttask_vedic_project_rate_1projecttask_ida',
  'type' => 'link',
  'relationship' => 'projecttask_vedic_project_rate_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROJECTTASK_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
);


// created: 2017-01-19 11:01:34
$dictionary["vedic_Project_Rate"]["fields"]["project_vedic_project_rate_1"] = array (
  'name' => 'project_vedic_project_rate_1',
  'type' => 'link',
  'relationship' => 'project_vedic_project_rate_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_PROJECT_TITLE',
  'id_name' => 'project_vedic_project_rate_1project_ida',
);
$dictionary["vedic_Project_Rate"]["fields"]["project_vedic_project_rate_1_name"] = array (
  'name' => 'project_vedic_project_rate_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_PROJECT_TITLE',
  'save' => true,
  'id_name' => 'project_vedic_project_rate_1project_ida',
  'link' => 'project_vedic_project_rate_1',
  'table' => 'project',
  'module' => 'Project',
  'rname' => 'name',
);
$dictionary["vedic_Project_Rate"]["fields"]["project_vedic_project_rate_1project_ida"] = array (
  'name' => 'project_vedic_project_rate_1project_ida',
  'type' => 'link',
  'relationship' => 'project_vedic_project_rate_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROJECT_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
);


 // created: 2016-07-05 15:15:10
$dictionary['vedic_Project_Rate']['fields']['candidate']['name']='candidate';
$dictionary['vedic_Project_Rate']['fields']['candidate']['vname']='LBL_CANDIDATE';
$dictionary['vedic_Project_Rate']['fields']['candidate']['type']='multienum';
$dictionary['vedic_Project_Rate']['fields']['candidate']['link']='vedic_Candidates';
$dictionary['vedic_Project_Rate']['fields']['candidate']['comment']='The template that the project type was created from.';
$dictionary['vedic_Project_Rate']['fields']['candidate']['inline_edit']=true;
$dictionary['vedic_Project_Rate']['fields']['candidate']['options']='';
$dictionary['vedic_Project_Rate']['fields']['candidate']['isMultiSelect']=true;
$dictionary['vedic_Project_Rate']['fields']['candidate']['comments']='The template that the project type was created from.';
$dictionary['vedic_Project_Rate']['fields']['candidate']['merge_filter']='disabled';


 // created: 2019-05-06 17:33:21
$dictionary['vedic_Project_Rate']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2019-05-06 17:33:22
$dictionary['vedic_Project_Rate']['fields']['end_date_c']['inline_edit']=1;
$dictionary['vedic_Project_Rate']['fields']['end_date_c']['labelValue']='End Date';

 

 // created: 2019-05-06 17:33:23
$dictionary['vedic_Project_Rate']['fields']['pay_type_c']['inline_edit']=1;
$dictionary['vedic_Project_Rate']['fields']['pay_type_c']['labelValue']='Pay Type';

 

 // created: 2019-05-06 17:33:23
$dictionary['vedic_Project_Rate']['fields']['start_date_c']['inline_edit']=1;
$dictionary['vedic_Project_Rate']['fields']['start_date_c']['labelValue']='Start Date';

 

 // created: 2019-05-06 17:09:01
$dictionary['vedic_Project_Rate']['fields']['test_c']['inline_edit']='1';
$dictionary['vedic_Project_Rate']['fields']['test_c']['labelValue']='test';

 

 // created: 2019-05-06 17:33:24
$dictionary['vedic_Project_Rate']['fields']['value_c']['inline_edit']='1';

 

// created: 2018-11-30 09:34:39
$dictionary["vedic_Project_Rate"]["fields"]["vedic_solutions_projects_vedic_project_rate_1"] = array (
  'name' => 'vedic_solutions_projects_vedic_project_rate_1',
  'type' => 'link',
  'relationship' => 'vedic_solutions_projects_vedic_project_rate_1',
  'source' => 'non-db',
  'module' => 'vedic_Solutions_Projects',
  'bean_name' => 'vedic_Solutions_Projects',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_VEDIC_PROJECT_RATE_1_FROM_VEDIC_SOLUTIONS_PROJECTS_TITLE',
  'id_name' => 'vedic_solu30c2rojects_ida',
);
$dictionary["vedic_Project_Rate"]["fields"]["vedic_solutions_projects_vedic_project_rate_1_name"] = array (
  'name' => 'vedic_solutions_projects_vedic_project_rate_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_VEDIC_PROJECT_RATE_1_FROM_VEDIC_SOLUTIONS_PROJECTS_TITLE',
  'save' => true,
  'id_name' => 'vedic_solu30c2rojects_ida',
  'link' => 'vedic_solutions_projects_vedic_project_rate_1',
  'table' => 'vedic_solutions_projects',
  'module' => 'vedic_Solutions_Projects',
  'rname' => 'name',
);
$dictionary["vedic_Project_Rate"]["fields"]["vedic_solu30c2rojects_ida"] = array (
  'name' => 'vedic_solu30c2rojects_ida',
  'type' => 'link',
  'relationship' => 'vedic_solutions_projects_vedic_project_rate_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
);

?>