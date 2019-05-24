<?php
 // created: 2014-11-19 12:16:23
$layout_defs["vedic_Employees"]["subpanel_setup"]['vedic_employees_vedic_holydays_1'] = array (
  'order' => 100,
  'module' => 'vedic_Holydays',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'Vacations',
  'get_subpanel_data' => 'vedic_employees_vedic_holydays_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
