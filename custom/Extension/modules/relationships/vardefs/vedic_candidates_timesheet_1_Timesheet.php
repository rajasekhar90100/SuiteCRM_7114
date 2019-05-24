<?php
// created: 2017-01-19 00:05:38
$dictionary["Timesheet"]["fields"]["vedic_candidates_timesheet_1"] = array (
  'name' => 'vedic_candidates_timesheet_1',
  'type' => 'link',
  'relationship' => 'vedic_candidates_timesheet_1',
  'source' => 'non-db',
  'module' => 'vedic_Candidates',
  'bean_name' => 'vedic_Candidates',
  'vname' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
  'id_name' => 'vedic_candidates_timesheet_1vedic_candidates_ida',
);
$dictionary["Timesheet"]["fields"]["vedic_candidates_timesheet_1_name"] = array (
  'name' => 'vedic_candidates_timesheet_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_VEDIC_CANDIDATES_TITLE',
  'save' => true,
  'id_name' => 'vedic_candidates_timesheet_1vedic_candidates_ida',
  'link' => 'vedic_candidates_timesheet_1',
  'table' => 'vedic_candidates',
  'module' => 'vedic_Candidates',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Timesheet"]["fields"]["vedic_candidates_timesheet_1vedic_candidates_ida"] = array (
  'name' => 'vedic_candidates_timesheet_1vedic_candidates_ida',
  'type' => 'link',
  'relationship' => 'vedic_candidates_timesheet_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_TIMESHEET_TITLE',
);
