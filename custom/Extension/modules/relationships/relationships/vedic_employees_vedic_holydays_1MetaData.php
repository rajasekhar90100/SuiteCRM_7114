<?php
// created: 2014-11-19 12:16:23
$dictionary["vedic_employees_vedic_holydays_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vedic_employees_vedic_holydays_1' => 
    array (
      'lhs_module' => 'vedic_Employees',
      'lhs_table' => 'vedic_employees',
      'lhs_key' => 'id',
      'rhs_module' => 'vedic_Holydays',
      'rhs_table' => 'vedic_holydays',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vedic_employees_vedic_holydays_1_c',
      'join_key_lhs' => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
      'join_key_rhs' => 'vedic_employees_vedic_holydays_1vedic_holydays_idb',
    ),
  ),
  'table' => 'vedic_employees_vedic_holydays_1_c',
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
      'name' => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vedic_employees_vedic_holydays_1vedic_holydays_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vedic_employees_vedic_holydays_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vedic_employees_vedic_holydays_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vedic_employees_vedic_holydays_1vedic_employees_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vedic_employees_vedic_holydays_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vedic_employees_vedic_holydays_1vedic_holydays_idb',
      ),
    ),
  ),
);