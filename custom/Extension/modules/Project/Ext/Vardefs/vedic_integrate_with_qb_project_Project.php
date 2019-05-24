<?php
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
