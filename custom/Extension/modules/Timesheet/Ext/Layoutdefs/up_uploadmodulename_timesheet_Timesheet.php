<?php
 // created: 2015-08-25 13:35:12
$layout_defs["Timesheet"]["subpanel_setup"]['up_uploadmodulename_timesheet'] = array (
  'order' => 100,
  'module' => 'UP_UploadModuleName',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_UP_UPLOADMODULENAME_TIMESHEET_FROM_UP_UPLOADMODULENAME_TITLE',
  'get_subpanel_data' => 'up_uploadmodulename_timesheet',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
