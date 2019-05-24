<?php
// created: 2017-03-14 07:42:35
$searchFields['Timesheet'] = array (
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'parent_type' => 
  array (
    'query_type' => 'default',
    'operator' => '=',
    'options' => 'record_type_display_timesheet',
    'options_add_blank' => true,
    'template_var' => 'PARENT_TYPE_OPTIONS',
  ),
  'project_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.project',
    ),
  ),
  'project_task_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.project_task',
    ),
  ),
  'case_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'parent.cases',
    ),
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
);