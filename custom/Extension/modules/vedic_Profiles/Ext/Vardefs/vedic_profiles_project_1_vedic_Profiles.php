<?php
// created: 2018-04-29 09:21:21
$dictionary["vedic_Profiles"]["fields"]["vedic_profiles_project_1"] = array (
  'name' => 'vedic_profiles_project_1',
  'type' => 'link',
  'relationship' => 'vedic_profiles_project_1',
  'source' => 'non-db',
  'module' => 'Project',
  'bean_name' => 'Project',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE',
  'id_name' => 'vedic_profiles_project_1project_idb',
);
$dictionary["vedic_Profiles"]["fields"]["vedic_profiles_project_1_name"] = array (
  'name' => 'vedic_profiles_project_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE',
  'save' => true,
  'id_name' => 'vedic_profiles_project_1project_idb',
  'link' => 'vedic_profiles_project_1',
  'table' => 'project',
  'module' => 'Project',
  'rname' => 'name',
);
$dictionary["vedic_Profiles"]["fields"]["vedic_profiles_project_1project_idb"] = array (
  'name' => 'vedic_profiles_project_1project_idb',
  'type' => 'link',
  'relationship' => 'vedic_profiles_project_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE',
);
