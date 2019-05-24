<?php
// created: 2018-11-30 09:34:39
$dictionary["vedic_solutions_projects_vedic_project_rate_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_solutions_projects_vedic_project_rate_1' => 
    array (
      'lhs_module' => 'vedic_Solutions_Projects',
      'lhs_table' => 'vedic_solutions_projects',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Project_Rate',
      'rhs_table' => 'vedic_project_rate',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_solutions_projects_vedic_project_rate_1_c',
      'join_key_lhs' => 'vedic_solu30c2rojects_ida',
      'join_key_rhs' => 'vedic_solu12f3ct_rate_idb',
    ),
  ),
  'table' => 'vedic_solutions_projects_vedic_project_rate_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'vedic_solu30c2rojects_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_solu12f3ct_rate_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_project_rate_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_project_rate_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_solu30c2rojects_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_project_rate_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_solu12f3ct_rate_idb',
      ),
    ),
  ),
);