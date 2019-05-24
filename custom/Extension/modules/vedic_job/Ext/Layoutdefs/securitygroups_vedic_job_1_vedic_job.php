<?php
 // created: 2016-05-10 09:11:55
$layout_defs["vedic_job"]["subpanel_setup"]['securitygroups_vedic_job_1'] = array (
  'order' => 100,
  'module' => 'SecurityGroups',
  'subpanel_name' => 'admin',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SECURITYGROUPS_VEDIC_JOB_1_FROM_SECURITYGROUPS_TITLE',
  'get_subpanel_data' => 'securitygroups_vedic_job_1',
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
