<?php
// created: 2018-11-30 09:38:16
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1"]=array (
  'name' => 'projecttask_projecttask_1',
  'type' => 'link',
  'relationship' => 'projecttask_projecttask_1',
  'source' => 'non-db',
  'module' => 'ProjectTask',
  'bean_name' => 'ProjectTask',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_L_TITLE',
  'id_name' => 'projecttask_projecttask_1projecttask_ida',
  'side' => 'left',
);
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1_name"] = array (
  'name' => 'projecttask_projecttask_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_L_TITLE',
  'save' => true,
  'id_name' => 'projecttask_projecttask_1projecttask_ida',
  'link' => 'projecttask_projecttask_1',
  'table' => 'project_task',
  'module' => 'ProjectTask',
  'rname' => 'name',
);
$dictionary["ProjectTask"]["fields"]["projecttask_projecttask_1projecttask_ida"] = array (
  'name' => 'projecttask_projecttask_1projecttask_ida',
  'type' => 'link',
  'relationship' => 'projecttask_projecttask_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROJECTTASK_PROJECTTASK_1_FROM_PROJECTTASK_R_TITLE',
);
