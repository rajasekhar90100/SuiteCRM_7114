<?php
$module_name = 'vedic_GC';
$viewdefs [$module_name] = array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
					3 => 'FIND_DUPLICATES',
				),
			),
			'maxColumns' => '2',
			'widths' => array (
				0 => array (
					'label' => '10',
					'field' => '30',
				),
				1 => array (
					'label' => '10',
					'field' => '30',
				),
			),
			'useTabs' => true,
			'tabDefs' => array (
				'LBL_EDITVIEW_PANEL1' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_EDITVIEW_PANEL2' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
		),
		'panels' => array (
			'lbl_editview_panel1' => array (
				0 => array (
					0 => 'name',
					1 => array (
						'name' => 'vedic_profiles_vedic_gc_1_name',
						'label' => 'LBL_VEDIC_PROFILES_VEDIC_GC_1_FROM_VEDIC_PROFILES_TITLE',
					),
				),
				1 => array(
					0 => 'status',
					1 => array (
						'name' => 'vedic_attorney_vedic_gc_1_name',
						'label' => 'LBL_VEDIC_ATTORNEY_VEDIC_GC_1_FROM_VEDIC_ATTORNEY_TITLE',
					),
				),
				2 => array (
					0 => array (
						'name' => 'gc_stage_c',
						'studio' => 'visible',
						'label' => 'LBL_GC_STAGE',
					),
					1 => array (
						'name' => 'gc_status_c',
						'studio' => 'visible',
						'label' => 'LBL_GC_STATUS',
					),
				),
				3 => array (
					0 => array (
						'name' => 'gc_initdate_c',
						'label' => 'LBL_GC_INITDATE',
					),
					1 => array (
						'name' => 'gc_initiated_by_c',
						'label' => 'LBL_GC_INITIATED_BY',
					),
				),
				4 => array (
					0 => array (
						'name' => 'gc_jobtitle_c',
						'label' => 'LBL_GC_JOBTITLE',
					),
					1 => array (
						'name' => 'gc_lca_wage_c',
						'label' => 'LBL_GC_LCA_WAGE',
					),
				),
				5 => array (
					0 => array (
						'name' => 'porting_c',
						'studio' => 'visible',
						'label' => 'LBL_PORTING',
					),
					1 => array (
						'name' => 'expiry_date_c',
						'label' => 'LBL_EXPIRY_DATE ',
					),
				),
				6 => array (
					0 => array (
						'name' => 'perm_filed_date',
						'label' => 'LBL_PERM_FILED_DATE',
					),
					1 => array (
						'name' => 'perm_case_no_c',
						'label' => 'LBL_PERM_CASE_NO',
					),
				),
				7 => array (
					0 => array(
						'name'=>'perm_certified',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'startdate_change()',
								'onblur' => 'startdate_change()',
							),
						),	
					),
					1 => 'perm_expiry',
				),
				8 => array (
					0 => array (
						'name' => 'i_140_filed_date',
						'label' => 'LBL_I_140_FILED_DATE',
					),
					1 => array (
						'name' => 'i_140_receipt_no_c',
						'label' => 'LBL_I_140_RECEIPT_NO',
					),
				),
				9 => array (
					0 => array (
						'name' => 'i_140_rfe_received_c',
						'label' => 'LBL_I_140_RFE_RECEIVED',
					),
					1 => array (
						'name' => 'i_140_rfe_responded_c',
						'label' => 'LBL_I_140_RFE_RESPONDED',
					),
				),
				10 => array (
					0 => array (
						'name' => 'i_140_cert_no_dt_c',
						'label' => 'LBL_I_140_CERT_NO_DT',
					),
					1 => array (
						'name' => 'i_485_filed_dt_c',
						'label' => 'LBL_I_485_FILED_DT',
					),
				),
				11 => array (
					0 => array (
						'name' => 'i_485_receipt_no_c',
						'label' => 'LBL_I_485_RECEIPT_NO',
					),
					1 => array (
						'name' => 'i_485_cert_no_dt_c',
						'label' => 'LBL_I_485_CERT_NO_DT',
					),
				),
				12 => array (
					0 => array (
						'name' => 'mobile_phone_c',
						'label' => 'LBL_MOBILE_PHONE',
					),
					1 => array (
						'name' => 'business_phone_c',
						'label' => 'LBL_BUSINESS_PHONE',
					),
					
				),
				13 => array (
					0 => array (
						'name' => 'email_home1_c',
						'label' => 'LBL_EMAIL_HOME1',
					),
					1 => array (
						'name' => 'email_work_c',
						'label' => 'LBL_EMAIL_WORK',
					),
				),
				14 => array(
					0 => 'job_preference',
					1 => 'eb1',
				),
				15 => array(
					0 => array (
						'name' => 'eb2_c',
						'studio' => 'visible',
						'label' => 'LBL_EB2',
					),
					1 => array (
						'name' => 'eb3_c',
						'studio' => 'visible',
						'label' => 'LBL_EB3',
					),
				),
				16 => array(
					0 => 'hired_date',
					1 => array (
						'name' => 'rehire_date',
						'label' => 'LBL_HIRED_DATE',
					),
				
				),
				17 => array(
					0 => array(
						'name' => 'project_start_date',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT_START_DATE',
						
					),
					1 => array(
						'name' => 'project_end_date',
						'studio' => 'visible',
						'label' => 'LBL_PROJECT_END_DATE',
					),
				),
			),
			'lbl_editview_panel2' => array (
				0 => array (
					0 => 'ads_type',
					1 => 'assigned_user_name',
				),
				 1 => array (
				    0 => array (
						'name' => 'swa',
						'label' => 'LBL_SWA',
					),
					1 => array (
						'name' => 'employer_ads',
						'label' => 'LBL_EMPLOYER_ADS',
					),
				),
				2 => array (
				    0 => array (
						'name' => 'nojp',
						'label' => 'LBL_NOJP',
					),
					1 => array (
						'name' => 'erp',
						'label' => 'LBL_ERP',
					),
				),
				3 => array (
					0 => array (
						'name' => 'sunday_news_paper',
						'label' => 'LBL_SUNDAY_NEWS_PAPER',
					),
					1 =>'',
				),
				4 => array (
					0 => array (
						'name' => 'date_perm_audit_received_c',
						'label' => 'LBL_DATE_PERM_AUDIT_RECEIVED',
					),
					1 => array (
						'name' => 'date_perm_audit_responded_c',
						'label' => 'LBL_DATE_PERM_AUDIT_RESPONDED',
					),
				),
				5 => array (
					0 => 'description',
				),
			),
		),
	),
);
?>