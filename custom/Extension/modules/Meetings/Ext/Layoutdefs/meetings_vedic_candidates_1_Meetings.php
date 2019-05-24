<?php
 // created: 2017-01-24 23:23:18
$layout_defs["Meetings"]["subpanel_setup"]['meetings_vedic_candidates_1'] = array (
  'order' => 100,
  'module' => 'vedic_Candidates',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MEETINGS_VEDIC_CANDIDATES_1_FROM_VEDIC_CANDIDATES_TITLE',
  'get_subpanel_data' => 'meetings_vedic_candidates_1',
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
