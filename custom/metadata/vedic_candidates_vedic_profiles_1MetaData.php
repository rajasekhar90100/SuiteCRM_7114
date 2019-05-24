<?php
// created: 2018-04-24 06:14:49
$dictionary["vedic_candidates_vedic_profiles_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_candidates_vedic_profiles_1' => 
    array (
      'lhs_module' => 'vedic_Candidates',
      'lhs_table' => 'vedic_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Profiles',
      'rhs_table' => 'vedic_profiles',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_candidates_vedic_profiles_1_c',
      'join_key_lhs' => 'vedic_candidates_vedic_profiles_1vedic_candidates_ida',
      'join_key_rhs' => 'vedic_candidates_vedic_profiles_1vedic_profiles_idb',
    ),
  ),
  'table' => 'vedic_candidates_vedic_profiles_1_c',
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
      'name' => 'vedic_candidates_vedic_profiles_1vedic_candidates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_candidates_vedic_profiles_1vedic_profiles_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_candidates_vedic_profiles_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_candidates_vedic_profiles_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_candidates_vedic_profiles_1vedic_candidates_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_candidates_vedic_profiles_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_candidates_vedic_profiles_1vedic_profiles_idb',
      ),
    ),
  ),
);