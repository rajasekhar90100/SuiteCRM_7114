<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2016-07-11 12:28:48
$layout_defs["Documents"]["subpanel_setup"]['aos_products_documents_1'] = array (
  'order' => 100,
  'module' => 'AOS_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_PRODUCTS_DOCUMENTS_1_FROM_AOS_PRODUCTS_TITLE',
  'get_subpanel_data' => 'aos_products_documents_1',
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


 // created: 2017-11-04 07:38:00
$layout_defs["Documents"]["subpanel_setup"]['documents_vedic_submissions_1'] = array (
  'order' => 100,
  'module' => 'vedic_Submissions',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
  'get_subpanel_data' => 'documents_vedic_submissions_1',
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



$layout_defs['Documents']['subpanel_setup']['securitygroups'] = array(
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
$layout_defs['Documents']['subpanel_setup']['documents_vedic_submissions_1']['override_subpanel_name'] = 'Document_subpanel_documents_vedic_submissions_1';

?>