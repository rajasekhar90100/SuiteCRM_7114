<?php
$module_name = 'vedic_Solutions_Timesheet';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'startdate' => 
      array (
        'type' => 'date',
        'label' => 'LBL_STARTDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'startdate',
      ),
      'enddate' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ENDDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'enddate',
      ),
      'rm_approval_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RM_APPROVAL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'rm_approval_status',
      ),
      'pm_approval_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_PM_APPROVAL_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'pm_approval_status',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
