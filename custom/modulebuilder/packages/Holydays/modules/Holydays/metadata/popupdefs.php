<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Holydays',
    'varName' => 'vedic_Holydays',
    'orderBy' => 'vedic_holydays.name',
    'whereClauses' => array (
  'month' => 'vedic_holydays.month',
  'year' => 'vedic_holydays.year',
  'type' => 'vedic_holydays.type',
),
    'searchInputs' => array (
  4 => 'month',
  5 => 'year',
  6 => 'type',
),
    'searchdefs' => array (
  'month' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MONTH',
    'width' => '10%',
    'name' => 'month',
  ),
  'year' => 
  array (
    'type' => 'int',
    'label' => 'LBL_YEAR',
    'width' => '10%',
    'name' => 'year',
  ),
  'type' => 
  array (
    'type' => 'radioenum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
),
    'listviewdefs' => array (
  'MONTH' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MONTH',
    'width' => '10%',
    'default' => true,
  ),
  'YEAR' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_YEAR',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'radioenum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'QUANTITY' => 
  array (
    'type' => 'float',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
),
);
