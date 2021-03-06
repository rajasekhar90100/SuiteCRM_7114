<?php
// created: 2018-04-29 07:05:24
$dictionary["vedic_Immigration"]["fields"]["vedic_profiles_vedic_immigration_1"] = array (
  'name' => 'vedic_profiles_vedic_immigration_1',
  'type' => 'link',
  'relationship' => 'vedic_profiles_vedic_immigration_1',
  'source' => 'non-db',
  'module' => 'vedic_Profiles',
  'bean_name' => 'vedic_Profiles',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_IMMIGRATION_1_FROM_VEDIC_PROFILES_TITLE',
  'id_name' => 'vedic_profiles_vedic_immigration_1vedic_profiles_ida',
);
$dictionary["vedic_Immigration"]["fields"]["vedic_profiles_vedic_immigration_1_name"] = array (
  'name' => 'vedic_profiles_vedic_immigration_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_IMMIGRATION_1_FROM_VEDIC_PROFILES_TITLE',
  'save' => true,
  'id_name' => 'vedic_profiles_vedic_immigration_1vedic_profiles_ida',
  'link' => 'vedic_profiles_vedic_immigration_1',
  'table' => 'vedic_profiles',
  'module' => 'vedic_Profiles',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["vedic_Immigration"]["fields"]["vedic_profiles_vedic_immigration_1vedic_profiles_ida"] = array (
  'name' => 'vedic_profiles_vedic_immigration_1vedic_profiles_ida',
  'type' => 'link',
  'relationship' => 'vedic_profiles_vedic_immigration_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_PROFILES_VEDIC_IMMIGRATION_1_FROM_VEDIC_IMMIGRATION_TITLE',
);
