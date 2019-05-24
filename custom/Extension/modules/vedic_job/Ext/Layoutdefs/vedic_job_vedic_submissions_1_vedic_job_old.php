<?php
 // created: 2015-01-06 05:44:17
$layout_defs["vedic_job"]["subpanel_setup"]['vedic_job_vedic_submissions_1'] = array (
  'order' => 100,
  'module' => 'vedic_Submissions',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
  'get_subpanel_data' => 'vedic_job_vedic_submissions_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
	   'widget_class' => 'SubPanelTopCreateButton',
    ),
  //  1 => 
 //   array (
     // 'widget_class' => 'SubPanelTopSelectButton',
     // 'mode' => 'MultiSelect',
    //),
	1 =>
	array (
		'widget_class' => 'SubPanelUploadButton',
	),
  ),
);
