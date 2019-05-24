<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-06-25 23:55:39
$layout_defs["Project"]["subpanel_setup"]['am_projectholidays_project'] = array (
  'order' => 100,
  'module' => 'AM_ProjectHolidays',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AM_PROJECTHOLIDAYS_PROJECT_FROM_AM_PROJECTHOLIDAYS_TITLE',
  'get_subpanel_data' => 'am_projectholidays_project',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
  ),
);


 // created: 2017-11-13 10:10:47
$layout_defs["Project"]["subpanel_setup"]['project_vedic_holydays_1'] = array (
  'order' => 100,
  'module' => 'vedic_Holydays',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROJECT_VEDIC_HOLYDAYS_1_FROM_VEDIC_HOLYDAYS_TITLE',
  'get_subpanel_data' => 'project_vedic_holydays_1',
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



$layout_defs['Project']['subpanel_setup']['securitygroups'] = array(
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





?>