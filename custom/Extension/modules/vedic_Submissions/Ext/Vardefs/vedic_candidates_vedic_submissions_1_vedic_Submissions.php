<?php
// created: 2015-01-06 05:42:23
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1_name"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1_name',
  'type' => 'relate',
  'required' => true,
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
  'link' => 'vedic_candidates_vedic_submissions_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Submissions"]["fields"]["vedic_candidates_vedic_submissions_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_vedic_submissions_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);
