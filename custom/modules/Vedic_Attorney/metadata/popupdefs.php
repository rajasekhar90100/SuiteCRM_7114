<?php
$popupMeta = array (
    'moduleMain' => 'Vedic_Attorney',
    'varName' => 'Vedic_Attorney',
    'orderBy' => 'vedic_attorney.first_name, vedic_attorney.last_name',
    'whereClauses' => array (
  'first_name' => 'vedic_attorney.first_name',
  'last_name' => 'vedic_attorney.last_name',
  'address_city' => 'vedic_attorney.address_city',
  'created_by_name' => 'vedic_attorney.created_by_name',
  'do_not_call' => 'vedic_attorney.do_not_call',
  'email' => 'vedic_attorney.email',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'address_city',
  3 => 'created_by_name',
  4 => 'do_not_call',
  5 => 'email',
),
'create' => array (
  'formBase' => 'Vedic_AttorneyFormBase.php',
 'formBaseClass' => 'Vedic_AttorneyFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'Vedic_AttorneySave',
  ),
  'createButton' => 'Create Attorney',
),
    'searchdefs' => array (
  'first_name' => 
  array (
    'name' => 'first_name',
    'width' => '10%',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'address_city' => 
  array (
    'name' => 'address_city',
    'width' => '10%',
  ),
  'created_by_name' => 
  array (
    'name' => 'created_by_name',
    'width' => '10%',
  ),
  'do_not_call' => 
  array (
    'name' => 'do_not_call',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'link' => true,
    'orderBy' => 'last_name',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'TITLE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TITLE',
    'default' => true,
    'name' => 'title',
  ),
  'PHONE_WORK' => 
  array (
    'width' => '15%',
    'label' => 'LBL_OFFICE_PHONE',
    'default' => true,
    'name' => 'phone_work',
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
    'name' => 'email1',
  ),
),
);
