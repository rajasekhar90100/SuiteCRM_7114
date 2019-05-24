<?php
// created: 2017-11-04 07:38:00
$dictionary["documents_vedic_submissions_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'documents_vedic_submissions_1' => 
    array (
      'lhs_module' => 'Documents',
      'lhs_table' => 'documents',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Submissions',
      'rhs_table' => 'vedic_submissions',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'documents_vedic_submissions_1_c',
      'join_key_lhs' => 'documents_vedic_submissions_1documents_ida',
      'join_key_rhs' => 'documents_vedic_submissions_1vedic_submissions_idb',
    ),
  ),
  'table' => 'documents_vedic_submissions_1_c',
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
      'name' => 'documents_vedic_submissions_1documents_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'documents_vedic_submissions_1vedic_submissions_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 => 
    array (
      'name' => 'document_revision_id',
      'type' => 'varchar',
      'len' => '36',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'documents_vedic_submissions_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'documents_vedic_submissions_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'documents_vedic_submissions_1documents_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'documents_vedic_submissions_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'documents_vedic_submissions_1vedic_submissions_idb',
      ),
    ),
  ),
);