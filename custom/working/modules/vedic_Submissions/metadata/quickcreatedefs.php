<?php
$module_name = 'vedic_Submissions';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
        'hidden' => 
        array (
        ),
      ),
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
      'javascript' => '{sugar_getscript file="include/javascript/popup_parent_helper.js"}
	{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
	{sugar_getscript file="modules/Documents/documents.js"}',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'uploadfile',
            'customCode' => '{if $fields.id.value!=""}
            				{assign var="type" value="hidden"}
            		 		{else}
            		 		{assign var="type" value="file"}
            		  		{/if}
            		  		<input name="uploadfile" type = {$type} size="30" maxlength="" onchange="setvalue(this);" value="{$fields.filename.value}">{$fields.filename.value}',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 'document_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'vedic_job_vedic_submissions_1_name',
            'label' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
          ),
          1 => 
          array (
            'name' => 'vedic_candidates_vedic_submissions_1_name',
            'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
           1 => 
          array (
            'name' => 'description',
            'displayParams' => 
            array (
              'rows' => 6,
              'cols' => 80,
            ),
          ),
        ),
		 3 => 
        array (
		0 => 
          array (
			'name' => 'job_poster_email_c',
            'label' => 'LBL_JOB_POSTER_EMAIL',
          ),
		 1 => 
          array (
			'name' => 'cc_c',
            'label' => 'LBL_CC',
          ), 
		  
		   
        ),
        4 => 
        array (
          0 => 
          array (
			'name' => 'bcc_c',
            'label' => 'LBL_BCC',
          ),
          1 => 'assigned_user_name',
        ),
		
		
		
      ),
    ),
  ),
);
?>

