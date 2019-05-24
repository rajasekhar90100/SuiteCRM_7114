<?php
// created: 2018-08-13 06:45:09
$dictionary["vedic_GC"]["fields"]["vedic_attorney_vedic_gc_1"] = array (
  'name' => 'vedic_attorney_vedic_gc_1',
  'type' => 'link',
  'relationship' => 'vedic_attorney_vedic_gc_1',
  'source' => 'non-db',
  'module' => 'Vedic_Attorney',
  'bean_name' => 'Vedic_Attorney',
  'vname' => 'LBL_VEDIC_ATTORNEY_VEDIC_GC_1_FROM_VEDIC_ATTORNEY_TITLE',
  'id_name' => 'vedic_attorney_vedic_gc_1vedic_attorney_ida',
);
$dictionary["vedic_GC"]["fields"]["vedic_attorney_vedic_gc_1_name"] = array (
  'name' => 'vedic_attorney_vedic_gc_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_ATTORNEY_VEDIC_GC_1_FROM_VEDIC_ATTORNEY_TITLE',
  'save' => true,
  'id_name' => 'vedic_attorney_vedic_gc_1vedic_attorney_ida',
  'link' => 'vedic_attorney_vedic_gc_1',
  'table' => 'vedic_attorney',
  'module' => 'Vedic_Attorney',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_GC"]["fields"]["vedic_attorney_vedic_gc_1vedic_attorney_ida"] = array (
  'name' => 'vedic_attorney_vedic_gc_1vedic_attorney_ida',
  'type' => 'link',
  'relationship' => 'vedic_attorney_vedic_gc_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_ATTORNEY_VEDIC_GC_1_FROM_VEDIC_GC_TITLE',
);
