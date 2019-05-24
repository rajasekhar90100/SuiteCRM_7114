<?php
// created: 2017-01-14 11:07:08
$dictionary["vedic_Immigration"]["fields"]["vedic_candidates_vedic_immigration_1"] = array (
  'name' => 'vedic_candidates_vedic_immigration_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_immigration_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_vedic_immigration_1vedic_candidates_ida',
);
$dictionary["vedic_Immigration"]["fields"]["vedic_candidates_vedic_immigration_1_name"] = array (
  'name' => 'vedic_candidates_vedic_immigration_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_vedic_immigration_1vedic_candidates_ida',
  'link' => 'vedic_candidates_vedic_immigration_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Immigration"]["fields"]["vedic_candidates_vedic_immigration_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_vedic_immigration_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_immigration_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_IMMIGRATION_1_FROM_VEDIC_IMMIGRATION_TITLE',
);
