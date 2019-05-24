<?php
$popupMeta = array (
    'moduleMain' => 'Documents',
    'varName' => 'DOCUMENTS',
    'orderBy' => 'name',
    'whereClauses' => array (
  'category_id' => 'documents.category_id',
  'subcategory_id' => 'documents.subcategory_id',
  'vedic_candidates_documents_1_name' => 'documents.vedic_candidates_documents_1_name',
  'created_by_name' => 'documents.created_by_name',
  'document_name' => 'documents.document_name',
  'vedic_profiles_documents_1_name' => 'documents.vedic_profiles_documents_1_name',
),
    'searchInputs' => array (
  1 => 'category_id',
  2 => 'subcategory_id',
  4 => 'vedic_candidates_documents_1_name',
  6 => 'created_by_name',
  8 => 'document_name',
  9 => 'vedic_profiles_documents_1_name',
),
    'searchdefs' => array (
  'document_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'document_name',
  ),
  'category_id' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SF_CATEGORY',
    'width' => '10%',
    'name' => 'category_id',
  ),
  'subcategory_id' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SF_SUBCATEGORY',
    'width' => '10%',
    'name' => 'subcategory_id',
  ),
  'vedic_candidates_documents_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_DOCUMENTS_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'name' => 'vedic_candidates_documents_1_name',
  ),
  'vedic_profiles_documents_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_PROFILES_DOCUMENTS_1_FROM_VEDIC_PROFILES_TITLE',
    'id' => 'VEDIC_PROFILES_DOCUMENTS_1VEDIC_PROFILES_IDA',
    'width' => '10%',
    'name' => 'vedic_profiles_documents_1_name',
  ),
  'created_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'name' => 'created_by_name',
  ),
),
    'listviewdefs' => array (
  'DOCUMENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'document_name',
    'sortable' => true,
  ),
  'REVISION' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DOC_VERSION',
    'width' => '10%',
    'name' => 'revision',
    'sortable' => true,
  ),
  'CATEGORY_ID' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SF_CATEGORY',
    'width' => '10%',
    'default' => true,
    'name' => 'category_id',
    'sortable' => true,
  ),
  'SUBCATEGORY_ID' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SF_SUBCATEGORY',
    'width' => '10%',
    'default' => true,
    'name' => 'subcategory_id',
    'sortable' => true,
  ),
  'FILENAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FILENAME',
    'width' => '10%',
    'link' => false,
    'default' => true,
    'name' => 'filename',
    'sortable' => false,
  ),
  'VEDIC_PROFILES_DOCUMENTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_PROFILES_DOCUMENTS_1_FROM_VEDIC_PROFILES_TITLE',
    'id' => 'VEDIC_PROFILES_DOCUMENTS_1VEDIC_PROFILES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'VEDIC_CANDIDATES_DOCUMENTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_DOCUMENTS_1_FROM_VEDIC_CANDIDATES_TITLE',
    'id' => 'VEDIC_CANDIDATES_DOCUMENTS_1VEDIC_CANDIDATES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'vedic_candidates_documents_1_name',
    'sortable' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
    'name' => 'created_by_name',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_entered',
  ),
),
);
