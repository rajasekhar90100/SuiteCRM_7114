<?php
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
