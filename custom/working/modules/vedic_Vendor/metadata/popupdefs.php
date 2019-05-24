<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Vendor',
    'varName' => 'vedic_Vendor',
    'orderBy' => 'vedic_vendor.name',
    'whereClauses' => array (
  'name' => 'vedic_vendor.name',
  'contact_details_c' => 'vedic_vendor.contact_details_c',
  'phone' => 'vedic_vendor.phone',
  'address_city' => 'vedic_vendor.address_city',
  'email' => 'vedic_vendor.email',
  'industry' => 'vedic_vendor.industry',
  'vedic_vendor_type' => 'vedic_vendor.vedic_vendor_type',
  'assigned_user_id' => 'vedic_vendor.assigned_user_id',
),
    'searchInputs' => array (
  0 => 'name',
  3 => 'industry',
  4 => 'contact_details_c',
  5 => 'phone',
  6 => 'address_city',
  7 => 'email',
  8 => 'vedic_vendor_type',
  9 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'contact_details_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_DETAILS',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'contact_details_c',
  ),
  'phone' => 
  array (
    'name' => 'phone',
    'label' => 'LBL_ANY_PHONE',
    'type' => 'name',
    'width' => '10%',
  ),
  'address_city' => 
  array (
    'name' => 'address_city',
    'label' => 'LBL_CITY',
    'type' => 'name',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'label' => 'LBL_ANY_EMAIL',
    'type' => 'name',
    'width' => '10%',
  ),
  'industry' => 
  array (
    'name' => 'industry',
    'width' => '10%',
  ),
  'vedic_vendor_type' => 
  array (
    'name' => 'vedic_vendor_type',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
$popupMeta['create'] = 
array(
	'formBase' => 'vedic_VendorFormBase.php',
	'formBaseClass' => 'vedic_VendorFormBase',
	'getFormBodyParams' => array('','','vedic_Vendorsave'),
	'createButton' => $mod_strings['LNK_NEW_RECORD'] 
);