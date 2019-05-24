<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['ProjectTask']['fields']['billing_type']['name']='billing_type';
$dictionary['ProjectTask']['fields']['billing_type']['vname']='Billing Type';
$dictionary['ProjectTask']['fields']['billing_type']['type']='enum';
$dictionary['ProjectTask']['fields']['billing_type']['options']='solutions_billing_type';
$dictionary['ProjectTask']['fields']['billing_type']['audit']=true;





$dictionary['ProjectTask']['fields']['chargeability']['name']='chargeability';
$dictionary['ProjectTask']['fields']['chargeability']['vname']='Chargeability';
$dictionary['ProjectTask']['fields']['chargeability']['type']='enum';
$dictionary['ProjectTask']['fields']['chargeability']['options']='solutions_chargeability';
$dictionary['ProjectTask']['fields']['chargeability']['audit']=true;



// created: 2018-11-30 09:38:16
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1"]=array (
  'name' => 'projecttask_projecttask_1',
  'type' => 'link',
  'relationship' => 'projecttask_projecttask_1',
  'source' => 'non-db',
  'module' => 'ProjectTask',
  'bean_name' => 'ProjectTask',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_L_TITLE',
  'id_name' => 'projecttask_projecttask_1projecttask_ida',
  'side' => 'left',
);
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1_name"] = array (
  'name' => 'projecttask_projecttask_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_L_TITLE',
  'save' => true,
  'id_name' => 'projecttask_projecttask_1projecttask_ida',
  'link' => 'projecttask_projecttask_1',
  'table' => 'project_task',
  'module' => 'ProjectTask',
  'rname' => 'name',
);
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1projecttask_ida"] = array (
  'name' => 'projecttask_projecttask_1projecttask_ida',
  'type' => 'link',
  'relationship' => 'projecttask_projecttask_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_R_TITLE',
);


// created: 2018-11-30 09:37:18
$dictionary["ProjectTask"]["fields"]["projecttask_vedic_project_rate_1"] = array (
  'name' => 'projecttask_vedic_project_rate_1',
  'type' => 'link',
  'relationship' => 'projecttask_vedic_project_rate_1',
  'source' => 'non-db',
  'module' => 'vedic_Project_Rate',
  'bean_name' => 'vedic_Project_Rate',
  'side' => 'right',
  'vname' => 'LBL_PROJECTTASK_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
);



$dictionary['ProjectTask']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_project_task',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






// created: 2018-11-30 09:35:10
$dictionary["ProjectTask"]["fields"]["vedic_solutions_projects_projecttask_1"] = array (
  'name' => 'vedic_solutions_projects_projecttask_1',
  'type' => 'link',
  'relationship' => 'vedic_solutions_projects_projecttask_1',
  'source' => 'non-db',
  'module' => 'vedic_Solutions_Projects',
  'bean_name' => 'vedic_Solutions_Projects',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_PROJECTTASK_1_FROM_VEDIC_SOLUTIONS_PROJECTS_TITLE',
  'id_name' => 'vedic_solu5a91rojects_ida',
);
$dictionary["ProjectTask"]["fields"]["vedic_solutions_projects_projecttask_1_name"] = array (
  'name' => 'vedic_solutions_projects_projecttask_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_PROJECTTASK_1_FROM_VEDIC_SOLUTIONS_PROJECTS_TITLE',
  'save' => true,
  'id_name' => 'vedic_solu5a91rojects_ida',
  'link' => 'vedic_solutions_projects_projecttask_1',
  'table' => 'vedic_solutions_projects',
  'module' => 'vedic_Solutions_Projects',
  'rname' => 'name',
);
$dictionary["ProjectTask"]["fields"]["vedic_solu5a91rojects_ida"] = array (
  'name' => 'vedic_solu5a91rojects_ida',
  'type' => 'link',
  'relationship' => 'vedic_solutions_projects_projecttask_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_PROJECTTASK_1_FROM_PROJECTTASK_TITLE',
);

?>