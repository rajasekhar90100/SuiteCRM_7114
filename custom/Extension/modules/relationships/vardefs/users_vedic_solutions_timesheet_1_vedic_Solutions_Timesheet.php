<?php
// created: 2018-12-22 06:00:28
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1"] = array (
  'name' => 'users_vedic_solutions_timesheet_1',
  'type' => 'link',
  'relationship' => 'users_vedic_solutions_timesheet_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_USERS_TITLE',
  'id_name' => 'users_vedic_solutions_timesheet_1users_ida',
);
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1_name"] = array (
  'name' => 'users_vedic_solutions_timesheet_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_vedic_solutions_timesheet_1users_ida',
  'link' => 'users_vedic_solutions_timesheet_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["vedic_Solutions_Timesheet"]["fields"]["users_vedic_solutions_timesheet_1users_ida"] = array (
  'name' => 'users_vedic_solutions_timesheet_1users_ida',
  'type' => 'link',
  'relationship' => 'users_vedic_solutions_timesheet_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_VEDIC_SOLUTIONS_TIMESHEET_TITLE',
);
