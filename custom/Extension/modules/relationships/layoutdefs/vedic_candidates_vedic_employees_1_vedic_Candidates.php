<?php
 // created: 2014-12-03 01:51:49
$layout_defs["vedic_Candidates"]["subpanel_setup"]['vedic_candidates_vedic_employees_1'] = array (
  'order' => 100,
  'module' => 'vedic_Employees',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'get_subpanel_data' => 'vedic_candidates_vedic_employees_1',
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
