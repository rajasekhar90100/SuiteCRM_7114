<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2016-08-11 08:52:37
$layout_defs["vedic_Employees"]["subpanel_setup"]['vedic_employees_documents_1'] = array (
	'order' => 100,
	'module' => 'Documents',
	'subpanel_name' => 'default',
	'sort_order' => 'asc',
	'sort_by' => 'id',
	'title_key' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
	'get_subpanel_data' => 'vedic_employees_documents_1',
	'top_buttons' => array (
		0 => array (
		  'widget_class' => 'SubPanelTopCreateButton',
		),
		1 => array (
			'widget_class' => 'CustomSubPanelTopSelectButton',
			'mode' => 'MultiSelect',
		),
		2 => array (
				'widget_class' => 'SubPanelUploadButton',
		),
	),
);


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


//auto-generated file DO NOT EDIT
$layout_defs['vedic_Employees']['subpanel_setup']['vedic_employees_documents_1']['override_subpanel_name'] = 'vedic_Employees_subpanel_vedic_employees_documents_1';

?>