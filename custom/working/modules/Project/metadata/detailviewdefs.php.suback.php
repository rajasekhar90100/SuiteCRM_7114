<?php
$viewdefs ['Project'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Project/Project.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/Project/js/custom_project.js',
        ),
      ),
      'form' => 
      array (
        'buttons' => 
        array (
			0 => 'EDIT',
			1 => 'DUPLICATE',
			2 => 'DELETE',
          3 => 
          array (
            'customCode' => '<input title="{$APP.LBL_VIEW_GANTT_TITLE}" class="button" type="button" name="view_gantt" id="view_gantt" value="{$APP.LBL_GANTT_BUTTON_LABEL}" onclick="javascript:window.location.href=\'index.php?module=Project&action=view_GanttChart&project_id={$id}\'"/>',
          ),
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_PROJECT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_project_information' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'status',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'estimated_start_date',
            'label' => 'LBL_DATE_START',
          ),
          1 => 
          array (
            'name' => 'estimated_end_date',
            'label' => 'LBL_DATE_END',
          ),
        ),
        2 => 
        array (
          0 => 'priority',
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
         3 => 
        array (
          0 => 
          array (
            'name' => 'vedic_candidates_project_1_name',
          ),
          1 => 
          array (
            'name' => 'w2ctc_c',
            'studio' => 'visible',
            'label' => 'LBL_W2CTC',
          ),
        ),
         4 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'value_c',
            'label' => 'LBL_VALUE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'account_customer_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_CUSTOMER',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'am_projecttemplates_project_1_name',
          ),
        ),
        1 => 
        array (
         0 => 
          array (
             'name' => 'date_entered',
			'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
          1 => 
          array (
            'name' => 'date_modified',
			 'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',	
          ),
        ),
      ),
    ),
  ),
);
?>
