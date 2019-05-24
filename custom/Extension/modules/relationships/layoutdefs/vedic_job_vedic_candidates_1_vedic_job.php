<?php
 // created: 2018-05-30 12:09:29
$layout_defs["vedic_job"]["subpanel_setup"]['vedic_job_vedic_candidates_1'] = array (
  'order' => 100,
  'module' => 'vedic_Candidates',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_CANDIDATES_TITLE',
  'get_subpanel_data' => 'vedic_job_vedic_candidates_1',
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
