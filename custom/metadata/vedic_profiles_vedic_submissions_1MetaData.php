<?php
// created: 2018-04-29 05:22:32
$dictionary["vedic_profiles_vedic_submissions_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_profiles_vedic_submissions_1' => 
    array (
      'lhs_module' => 'vedic_Profiles',
      'lhs_table' => 'vedic_profiles',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Submissions',
      'rhs_table' => 'vedic_submissions',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_profiles_vedic_submissions_1_c',
      'join_key_lhs' => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
      'join_key_rhs' => 'vedic_profiles_vedic_submissions_1vedic_submissions_idb',
    ),
  ),
  'table' => 'vedic_profiles_vedic_submissions_1_c',
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
      'name' => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_profiles_vedic_submissions_1vedic_submissions_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_profiles_vedic_submissions_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_profiles_vedic_submissions_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_profiles_vedic_submissions_1vedic_profiles_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_profiles_vedic_submissions_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_profiles_vedic_submissions_1vedic_submissions_idb',
      ),
    ),
  ),
);