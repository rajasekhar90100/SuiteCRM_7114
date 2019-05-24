<?php
// created: 2017-11-03 08:12:29
$dictionary["Document"]["fields"]["timesheet_documents_1"] = array (
  'name' => 'timesheet_documents_1',
  'type' => 'link',
  'relationship' => 'timesheet_documents_1',
  'source' => 'non-db',
  'module' => 'Timesheet',
  'bean_name' => 'Timesheet',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_TIMESHEET_TITLE',
  'id_name' => 'timesheet_documents_1timesheet_ida',
);
$dictionary["Document"]["fields"]["timesheet_documents_1_name"] = array (
  'name' => 'timesheet_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_TIMESHEET_TITLE',
  'save' => true,
  'id_name' => 'timesheet_documents_1timesheet_ida',
  'link' => 'timesheet_documents_1',
  'table' => 'timesheet',
  'module' => 'Timesheet',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["timesheet_documents_1timesheet_ida"] = array (
  'name' => 'timesheet_documents_1timesheet_ida',
  'type' => 'link',
  'relationship' => 'timesheet_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
