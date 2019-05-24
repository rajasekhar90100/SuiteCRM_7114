<?php
$listViewDefs ['Notes'] = 
array (
  'NAME' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
  ),
  'TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'PARENT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_RELATED_TO',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'link' => true,
    'default' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
  ),
  'FILENAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_FILENAME',
    'default' => true,
    'type' => 'file',
    'related_fields' => 
    array (
      0 => 'file_url',
      1 => 'id',
    ),
    'displayParams' => 
    array (
      'module' => 'Notes',
    ),
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'label' => 'LBL_CREATED_BY',
    'width' => '10%',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'created_by',
    ),
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'width' => '20%',
    'label' => 'LBL_DATE_MODIFIED',
    'link' => false,
    'default' => false,
  ),
  'CONTACT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CONTACT',
    'link' => true,
    'id' => 'CONTACT_ID',
    'module' => 'Contacts',
    'default' => false,
    'ACLTag' => 'CONTACT',
    'related_fields' => 
    array (
      0 => 'contact_id',
    ),
  ),
);
;
?>
