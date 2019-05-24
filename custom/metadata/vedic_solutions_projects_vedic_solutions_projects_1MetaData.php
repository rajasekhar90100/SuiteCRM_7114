<?php
// created: 2018-11-30 09:34:03
$dictionary["vedic_solutions_projects_vedic_solutions_projects_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_solutions_projects_vedic_solutions_projects_1' => 
    array (
      'lhs_module' => 'vedic_Solutions_Projects',
      'lhs_table' => 'vedic_solutions_projects',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Solutions_Projects',
      'rhs_table' => 'vedic_solutions_projects',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_solutions_projects_vedic_solutions_projects_1_c',
      'join_key_lhs' => 'vedic_solu8c77rojects_ida',
      'join_key_rhs' => 'vedic_solu131drojects_idb',
    ),
  ),
  'table' => 'vedic_solutions_projects_vedic_solutions_projects_1_c',
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
      'name' => 'vedic_solu8c77rojects_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_solu131drojects_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_solutions_projects_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_solutions_projects_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_solu8c77rojects_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_solutions_projects_vedic_solutions_projects_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_solu131drojects_idb',
      ),
    ),
  ),
);