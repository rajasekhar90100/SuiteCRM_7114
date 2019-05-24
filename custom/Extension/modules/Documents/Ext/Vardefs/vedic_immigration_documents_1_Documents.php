<?php
// created: 2017-01-14 11:05:39
$dictionary["Document"]["fields"]["vedic_immigration_documents_1"] = array (
  'name' => 'vedic_immigration_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_immigration_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Immigration',
  'bean_name' => 'vedic_Immigration',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
  'id_name' => 'vedic_immigration_documents_1vedic_immigration_ida',
);
$dictionary["Document"]["fields"]["vedic_immigration_documents_1_name"] = array (
  'name' => 'vedic_immigration_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_VEDIC_IMMIGRATION_TITLE',
  'save' => true,
  'id_name' => 'vedic_immigration_documents_1vedic_immigration_ida',
  'link' => 'vedic_immigration_documents_1',
  'table' => 'vedic_immigration',
  'module' => 'vedic_Immigration',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["vedic_immigration_documents_1vedic_immigration_ida"] = array (
  'name' => 'vedic_immigration_documents_1vedic_immigration_ida',
  'type' => 'link',
  'relationship' => 'vedic_immigration_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
