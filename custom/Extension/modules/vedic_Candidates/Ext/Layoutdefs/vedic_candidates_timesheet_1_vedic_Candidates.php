<?php
 // created: 2015-09-24 11:19:32
$layout_defs["vedic_Candidates"]["subpanel_setup"]['vedic_candidates_timesheet_1'] = array (
  'order' => 100,
  'module' => 'Timesheet',
  'subpanel_name' => 'default',
  'sort_order' => 'desc',
  'sort_by' => 'start_pay_period_c desc, start_bill_period_c',
  'title_key' => 'LBL_VEDIC_CANDIDATES_TIMESHEET_1_FROM_TIMESHEET_TITLE',
  'get_subpanel_data' => 'vedic_candidates_timesheet_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    // 1 => 
    // array (
      // 'widget_class' => 'SubPanelTopSelectButton',
      // 'mode' => 'MultiSelect',
    // ),
  ),
);
