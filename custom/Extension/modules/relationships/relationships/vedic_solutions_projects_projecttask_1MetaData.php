<?php
// created: 2018-11-30 09:35:10
$dictionary["vedic_solutions_projects_projecttask_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_solutions_projects_projecttask_1' => 
    array (
      'lhs_module' => 'vedic_Solutions_Projects',
      'lhs_table' => 'vedic_solutions_projects',
      'lhs_key' => 'id',
      'rhs_module' => 'ProjectTask',
      'rhs_table' => 'project_task',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_solutions_projects_projecttask_1_c',
      'join_key_lhs' => 'vedic_solu5a91rojects_ida',
      'join_key_rhs' => 'vedic_solutions_projects_projecttask_1projecttask_idb',
    ),
  ),
  'table' => 'vedic_solutions_projects_projecttask_1_c',
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
      'name' => 'vedic_solu5a91rojects_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_solutions_projects_projecttask_1projecttask_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_solutions_projects_projecttask_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_solutions_projects_projecttask_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_solu5a91rojects_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_solutions_projects_projecttask_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_solutions_projects_projecttask_1projecttask_idb',
      ),
    ),
  ),
);