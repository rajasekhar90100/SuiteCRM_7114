<?php
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
