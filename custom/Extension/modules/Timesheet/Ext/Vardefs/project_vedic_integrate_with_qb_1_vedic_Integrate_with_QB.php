<?php
// created: 2016-09-19 13:24:42
$dictionary["vedic_Integrate_with_QB"]["fields"]["project_vedic_integrate_with_qb_1"] = array (
  'name' => 'project_vedic_integrate_with_qb_1',
  'type' => 'link',
  'relationship' => 'project_vedic_integrate_with_qb_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_PROJECT_VEDIC_INTEGRATE_WITH_QB_1_FROM_PROJECT_TITLE',
  'id_name' => 'project_vedic_integrate_with_qb_1project_ida',
);
$dictionary["vedic_Integrate_with_QB"]["fields"]["project_vedic_integrate_with_qb_1_name"] = array (
  'name' => 'project_vedic_integrate_with_qb_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECT_VEDIC_INTEGRATE_WITH_QB_1_FROM_PROJECT_TITLE',
  'save' => true,
  'id_name' => 'project_vedic_integrate_with_qb_1project_ida',
  'link' => 'project_vedic_integrate_with_qb_1',
  'table' => 'project',
  'module' => 'Project',
  'rname' => 'name',
);
$dictionary["vedic_Integrate_with_QB"]["fields"]["project_vedic_integrate_with_qb_1project_ida"] = array (
  'name' => 'project_vedic_integrate_with_qb_1project_ida',
  'type' => 'link',
  'relationship' => 'project_vedic_integrate_with_qb_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROJECT_VEDIC_INTEGRATE_WITH_QB_1_FROM_VEDIC_INTEGRATE_WITH_QB_TITLE',
);
