<?php
$module_name = 'vedic_job';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
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
          0 => 'name',
          1 => 
          array (
            'name' => 'job_id_c',
            'label' => 'LBL_JOB_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'job_location_c',
          ),
          1 => 
          array (
            'name' => 'job_state_c',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'job_duration_c',
            'label' => 'LBL_JOB_DURATION',
          ),
          1 => 
          array (
            'name' => 'job_status_c',
            'studio' => 'visible',
            'label' => 'LBL_JOB_STATUS',
          ),
        ),
        3 => 
        array (
          0 => 'briefdescription_c',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'job_listing_c',
            'label' => 'LBL_JOB_LISTING',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'no_of_vacancies_c',
            'label' => 'LBL_NO_OF_VACANCIES',
          ),
          1 => 
          array (
            'name' => 'targetdatetohire_c',
            'label' => 'LBL_TARGETDATETOHIRE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'no_of_candidates_c',
            'label' => 'LBL_NO_OF_CANDIDATES',
          ),
          1 => 
          array (
            'name' => 'date_entered',
          ),
        ),
        7 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'modified_by_name',
          ),
        ),
        8 => 
        array (
          0 => 'job_note_c',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'job_category_c',
            'studio' => 'visible',
            'label' => 'LBL_JOB_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'jobrole_c',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'submitter_email_c',
            'label' => 'LBL_SUBMITTER_EMAIL',
          ),
          1 => 
          array (
          //  'name' => 'vendor_c',
          ),
        ),
        2 => 
        array (
          0 => 'vendors_c',
         
        ),
		
        3 => 
        array (
          0 => 'vendor_cpname',
          1 => 'vendor_cpphone',
        ),
		
		4 => 
        array (
           0 => 'client_c',
        ),
		
		5 => 
       array (
          0 => array (
            'name' => 'client_cpname_c',
          ),
		   1 => array (
            'name' => 'client_cpphone_c',
          ),
		)
      ),
    ),
  ),
);
?>
