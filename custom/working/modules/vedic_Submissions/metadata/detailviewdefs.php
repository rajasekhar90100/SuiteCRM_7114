<?php
$module_name = 'vedic_Submissions';
$_object_name = 'vedic_submissions';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
      ),
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => true,
          'panelDefault' => 'collapsed',
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
            'name' => 'submission_resume_type_c',
            'label' => 'LBL_SUBMISSION_RESUME_TYPE_C',
          ),
          1 => 'document_name',
        ),
        1 => 
        array (
          0 => 'uploadfile',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'vedic_candidates_vedic_submissions_1_name',
            'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
          ),
          1 => 'vedic_profiles_vedic_submissions_1_name',
		  ),
		3 => 
        array ( 
		  
		  0 =>  'documents_vedic_submissions_1_name',
		  1 => '',
        ),
        4 => 
        array (
          0 => 'status',
          1 => 
          array (
            'name' => 'is_add_job_c',
            'label' => 'LBL_IS_ADD_JOB',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'vedic_job_vedic_submissions_1_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'subject_c',
            'label' => 'LBL_SUBJECT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'signature_c',
            'label' => 'LBL_SIGNATURE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'job_poster_email_c',
            'label' => 'LBL_JOB_POSTER_EMAIL',
          ),
          1 => 'assigned_user_name',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'cc_c',
            'label' => 'LBL_CC',
          ),
          1 => 
          array (
            'name' => 'bcc_c',
            'label' => 'LBL_BCC',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
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