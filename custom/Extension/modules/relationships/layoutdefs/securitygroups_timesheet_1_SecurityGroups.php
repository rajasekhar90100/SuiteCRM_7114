<?php
 // created: 2017-03-09 06:48:07
$layout_defs["SecurityGroups"]["subpanel_setup"]['securitygroups_timesheet_1'] = array (
  'order' => 100,
  'module' => 'Timesheet',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SECURITYGROUPS_TIMESHEET_1_FROM_TIMESHEET_TITLE',
  'get_subpanel_data' => 'securitygroups_timesheet_1',
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
