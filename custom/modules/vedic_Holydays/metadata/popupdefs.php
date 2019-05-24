<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Holydays',
    'varName' => 'vedic_Holydays',
    'orderBy' => 'vedic_holydays.name',
    'whereClauses' => array (
  'name' => 'vedic_holydays.name',
  'start_date_c' => 'vedic_holydays_cstm.start_date_c',
  'end_date_c' => 'vedic_holydays_cstm.end_date_c',
  'type_of_vacation_c' => 'vedic_holydays_cstm.type_of_vacation_c',
  'vacation_category_c' => 'vedic_holydays_cstm.vacation_category_c',
),
    'searchInputs' => array (
  7 => 'name',
  8 => 'start_date_c',
  9 => 'end_date_c',
  10 => 'type_of_vacation_c',
  11 => 'vacation_category_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'start_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'name' => 'start_date_c',
  ),
  'end_date_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'name' => 'end_date_c',
  ),
  'type_of_vacation_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_VACATION',
    'width' => '10%',
    'name' => 'type_of_vacation_c',
  ),
  'vacation_category_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VACATION_CATEGORY',
    'width' => '10%',
    'name' => 'vacation_category_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'name',
  ),
  'START_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_START_DATE',
    'width' => '10%',
  ),
  'END_DATE_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_END_DATE',
    'width' => '10%',
  ),
  'TYPE_OF_VACATION_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE_OF_VACATION',
    'width' => '10%',
  ),
  'VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1_FROM_VEDIC_EMPLOYEES_TITLE',
    'id' => 'VEDIC_EMPLOYEES_VEDIC_HOLYDAYS_1VEDIC_EMPLOYEES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
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
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
),
);
