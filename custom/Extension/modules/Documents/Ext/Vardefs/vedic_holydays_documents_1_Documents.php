<?php
// created: 2017-07-02 05:54:38
$dictionary["Document"]["fields"]["vedic_holydays_documents_1"] = array (
  'name' => 'vedic_holydays_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_holydays_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Holydays',
  'bean_name' => 'vedic_Holydays',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_VEDIC_HOLYDAYS_TITLE',
  'id_name' => 'vedic_holydays_documents_1vedic_holydays_ida',
);
$dictionary["Document"]["fields"]["vedic_holydays_documents_1_name"] = array (
  'name' => 'vedic_holydays_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_VEDIC_HOLYDAYS_TITLE',
  'save' => true,
  'id_name' => 'vedic_holydays_documents_1vedic_holydays_ida',
  'link' => 'vedic_holydays_documents_1',
  'table' => 'vedic_holydays',
  'module' => 'vedic_Holydays',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["vedic_holydays_documents_1vedic_holydays_ida"] = array (
  'name' => 'vedic_holydays_documents_1vedic_holydays_ida',
  'type' => 'link',
  'relationship' => 'vedic_holydays_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_HOLYDAYS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
