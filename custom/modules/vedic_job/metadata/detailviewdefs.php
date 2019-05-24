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
		  4 => array (
				'customCode' => '{$CandidateFeedback}',
			),
		  5 => array (
				'customCode' => '{$SendEmail}',
		    ),
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
            'label' => 'Job Location(City, State)',
            'name' => 'job_location_c',
			'customCode' => '{$job_location}',
          ),
          1 => 
          array (
            'name' => 'no_of_vacancies_c',
            'label' => 'LBL_NO_OF_VACANCIES',
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
          0 => 
          array (
            'name' => 'share_job_description_c',
          ),
          1 => 
          array (
            'name' => 'targetdatetohire_c',
            'label' => 'LBL_TARGETDATETOHIRE',
          ),
        ),
		4 =>  array (
			0 => array (
				'name' => 'no_of_candidates_c',
				'label' => 'LBL_NO_OF_CANDIDATES',
			),
			1 => 
					  array (
						'name' => 'submitter_email_c',
						'label' => 'LBL_SUBMITTER_EMAIL',
					  ),
			
		),
		5 => array (
					0 => array (
						'name' => 'briefdescription_c',
						'label' => 'Shareable Job Description',
					),
					
				),
				6 => array (
					0 => array (
						'name' => 'job_listing_c',
						'label' => 'LBL_JOB_LISTING',
					),
				),
				7 => array (
					0 =>'job_note_c',
				),
				8 => array (
					
					0 => 'assigned_user_name',
					1 => array (
						'name' => 'created_by_name',
						'label' => 'LBL_CREATED',
					),
				),
				
				9 => array (
					
					0 => array (
						'name' => 'date_entered',
						'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					),
					1 => array( 
						'name' => 'date_modified',
						'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',	
					),	
				),
      ),
      'lbl_detailview_panel1' => 
      array (
		0 => array (
				0 => array (
					'name' => 'job_category_c',
					'studio' => 'visible',
					'label' => 'LBL_JOB_CATEGORY',
				),
				1 => array (
					'name' => 'jobrole_c',
				),
			),
			1 => array (
				
				0 => 'vendors_c',
				1 => 'client_c',
			),
			2 => array (
				0 => 'vendor_cpname',
				1 => array (
					'name' => 'client_cpname_c',
				),
			),
			3 =>  array (
				0 => 'vendor_cpphone',
				1 => array (
					'name' => 'client_cpphone_c',
				),
			),
			
      ),
    ),
  ),
);
?>
