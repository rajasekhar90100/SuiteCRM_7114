<?php
// created: 2018-05-30 12:09:29
$dictionary["vedic_job_vedic_candidates_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_job_vedic_candidates_1' => 
    array (
      'lhs_module' => 'vedic_job',
      'lhs_table' => 'vedic_job',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Candidates',
      'rhs_table' => 'vedic_candidates',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_job_vedic_candidates_1_c',
      'join_key_lhs' => 'vedic_job_vedic_candidates_1vedic_job_ida',
      'join_key_rhs' => 'vedic_job_vedic_candidates_1vedic_candidates_idb',
    ),
  ),
  'table' => 'vedic_job_vedic_candidates_1_c',
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
      'name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_job_vedic_candidates_1vedic_candidates_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_job_vedic_candidates_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_job_vedic_candidates_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_job_vedic_candidates_1vedic_job_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_job_vedic_candidates_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_job_vedic_candidates_1vedic_candidates_idb',
      ),
    ),
  ),
);