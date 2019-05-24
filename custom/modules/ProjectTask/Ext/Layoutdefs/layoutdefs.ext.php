<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2018-11-30 09:38:16
$layout_defs["ProjectTask"]["subpanel_setup"]['projecttask_projecttask_1projecttask_ida'] = array (
  'order' => 100,
  'module' => 'ProjectTask',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_R_TITLE',
  'get_subpanel_data' => 'projecttask_projecttask_1projecttask_ida',
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


 // created: 2018-11-30 09:37:18
$layout_defs["ProjectTask"]["subpanel_setup"]['projecttask_vedic_project_rate_1'] = array (
  'order' => 100,
  'module' => 'vedic_Project_Rate',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECTTASK_VEDIC_PROJECT_RATE_1_FROM_VEDIC_PROJECT_RATE_TITLE',
  'get_subpanel_data' => 'projecttask_vedic_project_rate_1',
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



$layout_defs['ProjectTask']['subpanel_setup']['securitygroups'] = array(
	'top_buttons' => array(array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'SecurityGroups', 'mode' => 'MultiSelect'),),
	'order' => 900,
	'sort_by' => 'name',
	'sort_order' => 'asc',
	'module' => 'SecurityGroups',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'SecurityGroups',
	'add_subpanel_data' => 'securitygroup_id',
	'title_key' => 'LBL_SECURITYGROUPS_SUBPANEL_TITLE',
);






//auto-generated file DO NOT EDIT
$layout_defs['ProjectTask']['subpanel_setup']['projecttask_projecttask_1projecttask_ida']['override_subpanel_name'] = 'ProjectTask_subpanel_projecttask_projecttask_1projecttask_ida';


//auto-generated file DO NOT EDIT
$layout_defs['ProjectTask']['subpanel_setup']['projecttask_vedic_project_rate_1']['override_subpanel_name'] = 'ProjectTask_subpanel_projecttask_vedic_project_rate_1';

?>