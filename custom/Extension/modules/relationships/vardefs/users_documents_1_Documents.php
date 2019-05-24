<?php
// created: 2017-07-02 05:58:22
$dictionary["Document"]["fields"]["users_documents_1"] = array (
  'name' => 'users_documents_1',
  'type' => 'link',
  'relationship' => 'users_documents_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_USERS_TITLE',
  'id_name' => 'users_documents_1users_ida',
);
$dictionary["Document"]["fields"]["users_documents_1_name"] = array (
  'name' => 'users_documents_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_documents_1users_ida',
  'link' => 'users_documents_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["users_documents_1users_ida"] = array (
  'name' => 'users_documents_1users_ida',
  'type' => 'link',
  'relationship' => 'users_documents_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);
