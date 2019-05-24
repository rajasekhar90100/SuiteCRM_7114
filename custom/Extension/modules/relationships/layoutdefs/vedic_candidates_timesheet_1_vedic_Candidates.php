<?php
 // created: 2017-01-19 00:05:38
$layout_defs["vedic_Candidates"]["subpanel_setup"]['vedic_candidates_timesheet_1'] = array (
  'order' => 100,
  'module' => 'Timesheet',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_TIMESHEET_TITLE',
  'get_subpanel_data' => 'vedic_candidates_timesheet_1',
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
