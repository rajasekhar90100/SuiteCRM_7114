<?php
// created: 2018-08-13 06:41:30
$dictionary["vedic_gc_documents_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_gc_documents_1' => 
    array (
      'lhs_module' => 'vedic_GC',
      'lhs_table' => 'vedic_gc',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_gc_documents_1_c',
      'join_key_lhs' => 'vedic_gc_documents_1vedic_gc_ida',
      'join_key_rhs' => 'vedic_gc_documents_1documents_idb',
    ),
  ),
  'table' => 'vedic_gc_documents_1_c',
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
      'name' => 'vedic_gc_documents_1vedic_gc_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_gc_documents_1documents_idb',
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
      'name' => 'vedic_gc_documents_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_gc_documents_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_gc_documents_1vedic_gc_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_gc_documents_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_gc_documents_1documents_idb',
      ),
    ),
  ),
);