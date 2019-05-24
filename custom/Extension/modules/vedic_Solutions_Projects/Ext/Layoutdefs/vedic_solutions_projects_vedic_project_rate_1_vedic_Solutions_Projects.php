<?php
 // created: 2018-11-30 09:34:39
$layout_defs["vedic_Solutions_Projects"]["subpanel_setup"]['vedic_solutions_projects_vedic_project_rate_1'] = array (
  'order' => 100,
  'module' => 'vedic_Project_Rate',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
  'get_subpanel_data' => 'vedic_solutions_projects_vedic_project_rate_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      //'widget_class' => 'SubPanelTopButtonQuickCreate',
	    'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
