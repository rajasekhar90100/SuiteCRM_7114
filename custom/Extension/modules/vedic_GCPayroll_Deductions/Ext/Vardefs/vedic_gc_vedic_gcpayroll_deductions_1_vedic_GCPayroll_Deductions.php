<?php
// created: 2018-08-13 06:43:09
$dictionary["vedic_GCPayroll_Deductions"]["fields"]["vedic_gc_vedic_gcpayroll_deductions_1"] = array (
  'name' => 'vedic_gc_vedic_gcpayroll_deductions_1',
  'type' => 'link',
  'relationship' => 'vedic_gc_vedic_gcpayroll_deductions_1',
  'source' => 'non-db',
  'module' => 'vedic_GC',
  'bean_name' => 'vedic_GC',
  'vname' => 'LBL_VEDIC_GC_VEDIC_GCPAYROLL_DEDUCTIONS_1_FROM_VEDIC_GC_TITLE',
  'id_name' => 'vedic_gc_vedic_gcpayroll_deductions_1vedic_gc_ida',
);
$dictionary["vedic_GCPayroll_Deductions"]["fields"]["vedic_gc_vedic_gcpayroll_deductions_1_name"] = array (
  'name' => 'vedic_gc_vedic_gcpayroll_deductions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_GC_VEDIC_GCPAYROLL_DEDUCTIONS_1_FROM_VEDIC_GC_TITLE',
  'save' => true,
  'id_name' => 'vedic_gc_vedic_gcpayroll_deductions_1vedic_gc_ida',
  'link' => 'vedic_gc_vedic_gcpayroll_deductions_1',
  'table' => 'vedic_gc',
  'module' => 'vedic_GC',
  'rname' => 'name',
);
$dictionary["vedic_GCPayroll_Deductions"]["fields"]["vedic_gc_vedic_gcpayroll_deductions_1vedic_gc_ida"] = array (
  'name' => 'vedic_gc_vedic_gcpayroll_deductions_1vedic_gc_ida',
  'type' => 'link',
  'relationship' => 'vedic_gc_vedic_gcpayroll_deductions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_GC_VEDIC_GCPAYROLL_DEDUCTIONS_1_FROM_VEDIC_GCPAYROLL_DEDUCTIONS_TITLE',
);
