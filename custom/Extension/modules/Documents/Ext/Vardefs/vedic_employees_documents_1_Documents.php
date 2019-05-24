<?php
// created: 2016-08-11 08:52:37
$dictionary["Document"]["fields"]["vedic_employees_documents_1"] = array (
  'name' => 'vedic_employees_documents_1',
  'type' => 'link',
  'relationship' => 'vedic_employees_documents_1',
  'source' => 'non-db',
  'module' => 'vedic_Employees',
  'bean_name' => 'vedic_Employees',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'id_name' => 'vedic_employees_documents_1vedic_employees_ida',
);
$dictionary["Document"]["fields"]["vedic_employees_documents_1_name"] = array (
  'name' => 'vedic_employees_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_VEDIC_EMPLOYEES_TITLE',
  'save' => true,
  'id_name' => 'vedic_employees_documents_1vedic_employees_ida',
  'link' => 'vedic_employees_documents_1',
  'table' => 'vedic_employees',
  'module' => 'vedic_Employees',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Document"]["fields"]["vedic_employees_documents_1vedic_employees_ida"] = array (
  'name' => 'vedic_employees_documents_1vedic_employees_ida',
  'type' => 'link',
  'relationship' => 'vedic_employees_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_EMPLOYEES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
