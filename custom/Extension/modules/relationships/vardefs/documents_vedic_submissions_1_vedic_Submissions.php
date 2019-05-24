<?php
// created: 2017-11-04 07:38:00
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1"] = array (
  'name' => 'documents_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'documents_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE',
  'id_name' => 'documents_vedic_submissions_1documents_ida',
);
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1_name"] = array (
  'name' => 'documents_vedic_submissions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE',
  'save' => true,
  'id_name' => 'documents_vedic_submissions_1documents_ida',
  'link' => 'documents_vedic_submissions_1',
  'table' => 'documents',
  'module' => 'Documents',
  'rname' => 'document_name',
);
$dictionary["vedic_Submissions"]["fields"]["documents_vedic_submissions_1documents_ida"] = array (
  'name' => 'documents_vedic_submissions_1documents_ida',
  'type' => 'link',
  'relationship' => 'documents_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);
