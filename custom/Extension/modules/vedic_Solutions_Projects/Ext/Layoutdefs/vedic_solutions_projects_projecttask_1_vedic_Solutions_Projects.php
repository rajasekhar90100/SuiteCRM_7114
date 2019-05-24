<?php
 // created: 2018-11-30 09:35:10
$layout_defs["vedic_Solutions_Projects"]["subpanel_setup"]['vedic_solutions_projects_projecttask_1'] = array (
  'order' => 100,
  'module' => 'ProjectTask',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_SOLUTIONS_PROJECTS_PROJECTTASK_1_FROM_PROJECTTASK_TITLE',
  'get_subpanel_data' => 'vedic_solutions_projects_projecttask_1',
  'top_buttons' => 
  array (
    0 => 
    array (
     // 'widget_class' => 'SubPanelTopButtonQuickCreate',
	   'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
