<?php
 // created: 2017-01-14 11:05:39
$layout_defs["vedic_Immigration"]["subpanel_setup"]['vedic_immigration_documents_1'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEDIC_IMMIGRATION_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'vedic_immigration_documents_1',
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
   2 =>
     array (
        'widget_class' => 'SubPanelUploadButton',
   ),
  ),
);
