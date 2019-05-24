<?php 
 //WARNING: The contents of this file are auto-generated


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
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    // 1 => 
    // array (
      // 'widget_class' => 'SubPanelTopSelectButton',
      // 'mode' => 'MultiSelect',
    // ),
  ),
);


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
    //  'widget_class' => 'SubPanelTopButtonQuickCreate',
	  'widget_class' => 'SubPanelTopCreateButton',
    ),
   // 1 => 
   // array (
   //  'widget_class' => 'SubPanelTopSelectButton',
   //   'mode' => 'MultiSelect',
   // ),
   1 =>
	array (
		'widget_class' => 'SubPanelUploadButton',
	),
  ),
);


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


//auto-generated file DO NOT EDIT
$layout_defs['vedic_job']['subpanel_setup']['vedic_job_vedic_candidates_1']['override_subpanel_name'] = 'vedic_job_subpanel_vedic_job_vedic_candidates_1';


//auto-generated file DO NOT EDIT
$layout_defs['vedic_job']['subpanel_setup']['vedic_job_vedic_submissions_1']['override_subpanel_name'] = 'vedic_job_subpanel_vedic_job_vedic_submissions_1';

?>