<?php
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
