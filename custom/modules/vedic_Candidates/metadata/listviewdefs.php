<?php
$module_name = 'vedic_Candidates';
$listViewDefs [$module_name] = 
array (
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
  ),
  'TYPE_HIRING' => 
  array (
    'type' => 'enum',
    'label' => 'Type',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL1' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
  ),
  'PHONE_MOBILE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'DO_NOT_CALL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DO_NOT_CALL',
    'default' => false,
  ),
  'PHONE_HOME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_HOME_PHONE',
    'default' => false,
  ),
  'PHONE_OTHER' => 
  array (
    'width' => '10%',
    'label' => 'LBL_WORK_PHONE',
    'default' => false,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => false,
  ),
 'KEYSKILL_LIST' => 
  array (
    'type' => 'multienum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_KEYSKILL_LIST',
    'width' => '10%',
  ),
  'STAGE_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAGE',
    'width' => '10%',
  ),
  'RECRUITMENT_AGENCY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_RECRUITMENT_AGENCY',
    'id' => 'VEDIC_RECRUITMENT_AGENCY_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
    'name' => 'recruitment_agency',
  ),
  'PRIMARY_MARKETER_C' => 
  array (
    'type' => 'relate',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PRIMARY_MARKETER',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'LOCATED_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_LOCATED',
    'width' => '10%',
  ),
  'PHONE_FAX' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FAX_PHONE',
    'default' => false,
  ),
  'TITLE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TITLE',
    'default' => false,
  ),
  'ADDRESS_STREET' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_STREET',
    'default' => false,
  ),
  'ANNUAL_SALARY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ANNUAL_SALARY',
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'ADDRESS_CITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'default' => false,
  ),
  'PHONE_WORK' => 
  array (
    'width' => '15%',
    'label' => 'LBL_OFFICE_PHONE',
    'default' => false,
  ),
  'W2CTC_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'label' => 'LBL_W2CTC',
    'width' => '10%',
  ),
);
;
?>
