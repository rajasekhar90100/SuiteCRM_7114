<?php
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
