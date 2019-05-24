<?php
 // created: 2017-11-03 08:12:29
$layout_defs["Timesheet"]["subpanel_setup"]['timesheet_documents_1'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TIMESHEET_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'timesheet_documents_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
	2 =>
	array (
		'widget_class' => 'SubPanelUploadButton',
	),
  ),
);
