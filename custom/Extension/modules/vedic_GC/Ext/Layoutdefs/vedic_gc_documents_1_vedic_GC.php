<?php
 // created: 2018-08-13 06:41:30
$layout_defs["vedic_GC"]["subpanel_setup"]['vedic_gc_documents_1'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_GC_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'vedic_gc_documents_1',
  'top_buttons' => 
  array (
    0 => 
    array (
     'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'CustomSubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
	2 => array (
		'widget_class' => 'SubPanelUploadButton',
	),
  ),
);
