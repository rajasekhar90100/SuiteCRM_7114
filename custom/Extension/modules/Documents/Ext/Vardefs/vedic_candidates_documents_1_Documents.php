<?php
// created: 2016-06-14 11:21:30
$dictionary["Document"]["fields"]["vedic_candidates_documents_1"] = array (
  'name' => 'vedic_candidates_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_documents_1vedic_candidates_ida',
);
$dictionary["Document"]["fields"]["vedic_candidates_documents_1_name"] = array (
  'name' => 'vedic_candidates_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_documents_1vedic_candidates_ida',
  'link' => 'vedic_candidates_documents_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Document"]["fields"]["vedic_candidates_documents_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_documents_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
