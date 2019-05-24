<?php
$viewdefs ['Project'] = array (
	'DetailView' => array (
		'templateMeta' => array (
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
			'includes' => array (
				0 => array (
					'file' => 'modules/Project/Project.js',
				),
				1 => array (
					'file' => 'modules/Project/js/custom_project.js',
				),
			),
			'form' => array (
				'buttons' => array (
					0 => array (
						'customCode' => '<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button" type="submit" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}"onclick="{if $IS_TEMPLATE}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'ProjectTemplatesDetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'ProjectTemplatesEditView\';{else}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'EditView\'; {/if}"/>',
						'sugar_html' => array (
							'type' => 'submit',
							'value' => ' {$APP.LBL_EDIT_BUTTON_LABEL} ',
							'htmlOptions' => array (
								'id' => 'edit_button',
								'class' => 'button',
								'accessKey' => '{$APP.LBL_EDIT_BUTTON_KEY}',
								'name' => 'Edit',
								'onclick' => '{if $IS_TEMPLATE}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'ProjectTemplatesDetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'ProjectTemplatesEditView\';{else}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$id}\'; this.form.action.value=\'EditView\'; {/if}',
							),
						),
					),
					1 => array (
						'customCode' => '<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" type="button" name="Delete" id="delete_button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" onclick="project_delete(this);"/>',
						'sugar_html' => array (
							'type' => 'button',
							'id' => 'delete_button',
							'value' => '{$APP.LBL_DELETE_BUTTON_LABEL}',
							'htmlOptions' => array (
								'title' => '{$APP.LBL_DELETE_BUTTON_TITLE}',
								'accessKey' => '{$APP.LBL_DELETE_BUTTON_KEY}',
								'id' => 'delete_button',
								'class' => 'button',
								'onclick' => 'project_delete(this);',
							),
						),
					),
					2 => array (
						'customCode' => '<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" type="submit" name="Duplicate" id="duplicate_button" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}"onclick="{if $IS_TEMPLATE}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'ProjectTemplatesDetailView\'; this.form.isDuplicate.value=true; this.form.action.value=\'projecttemplateseditview\'; this.form.return_id.value=\'{$id}\';{else}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'DetailView\'; this.form.isDuplicate.value=true; this.form.action.value=\'EditView\'; this.form.return_id.value=\'{$id}\';{/if}""/>',
						'sugar_html' => array (
							'type' => 'submit',
							'value' => '{$APP.LBL_DUPLICATE_BUTTON_LABEL}',
							'htmlOptions' => array (
								'title' => '{$APP.LBL_DUPLICATE_BUTTON_TITLE}',
								'accessKey' => '{$APP.LBL_DUPLICATE_BUTTON_KEY}',
								'class' => 'button',
								'name' => 'Duplicate',
								'id' => 'duplicate_button',
								'onclick' => '{if $IS_TEMPLATE}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'ProjectTemplatesDetailView\'; this.form.isDuplicate.value=true; this.form.action.value=\'projecttemplateseditview\'; this.form.return_id.value=\'{$id}\';{else}this.form.return_module.value=\'Project\'; this.form.return_action.value=\'DetailView\'; this.form.isDuplicate.value=true; this.form.action.value=\'EditView\'; this.form.return_id.value=\'{$id}\';{/if}',
							),
						),
					),
				  // 3 => 
				  // array (
					// 'customCode' => '<input title="{$APP.LBL_VIEW_GANTT_TITLE}" class="button" type="button" name="view_gantt" id="view_gantt" value="{$APP.LBL_GANTT_BUTTON_LABEL}" onclick="javascript:window.location.href=\'index.php?module=Project&action=view_GanttChart&record={$id}\'"/>',
				  // ),
				  // 4 => 
				  // array (
					// 'customCode' => '<input title="{$APP.LBL_VIEW_DETAIL}" class="button" type="button" name="view_detail" id="view_detail" value="{$APP.LBL_DETAIL_BUTTON_LABEL}" onclick="javascript:window.location.href=\'index.php?module=Project&action=DetailView&record={$id}\'"/>',
				  // ),
				),
			),
			'useTabs' => true,
			'tabDefs' => array (
				'LBL_PROJECT_INFORMATION' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
				'LBL_PANEL_ASSIGNMENT' => array (
					'newTab' => true,
					'panelDefault' => 'expanded',
				),
			),
			'syncDetailEditViews' => true,
		),
		'panels' => array (
			'lbl_project_information' => array (
				0 => array (
					0 => 'name',
					1 => 'status',
				),
				1 => array (
					0 => array (
						'name' => 'estimated_start_date',
						'label' => 'LBL_DATE_START',
					),
					1 => array (
						'name' => 'estimated_end_date',
						'label' => 'LBL_DATE_END',
					),
				),
				2 => array (
					0 => array (
						'name' => 'po_enddate',
						'label' => 'LBL_PO_ENDDATE',
					),
					1 => '',
				),
				3 => array (
					0 => 'priority',
					1 => array (
						'name' => 'w2ctc_c',
						'studio' => 'visible',
						'label' => 'LBL_W2CTC',
					),
				),
				4 => array (
					0 => array (
						'name' => 'income_accounts_c',
						'studio' => 'visible',
						'label' => 'LBL_INCOME_ACCOUNTS',
					),
					1 => array (
						'name' => 'account_customer_c',
						'studio' => 'visible',
						'label' => 'LBL_ACCOUNT_CUSTOMER',
					),
				),
				5 => array (
					0 => array (
						'name' => 'vedic_candidates_project_1_name',
					),
					1 => array (
						'name' => 'vedic_profiles_project_1_name',
					),
				),
				6 => array (
					0 => array (
						'name' => 'epoc_c',
						'studio' => 'visible',
						'label' => 'LBL_EPOC',
					),
					1 => array (
						'name' => 'mpoc_c',
						'studio' => 'visible',
						'label' => 'LBL_MPOC',
					),
				),
				7 => array (
					0 => array (
						'name' => 'midvendor1_c',
						'studio' => 'visible',
						'label' => 'LBL_MIDVENDOR1',
					),
					1 => array (
						'name' => 'midvendor2_c',
						'studio' => 'visible',
						'label' => 'LBL_MIDVENDOR2',
					),
				),
				8 => array (
					0 => array (
						'name' => 'assigned_user_name',
						'label' => 'LBL_ASSIGNED_TO',
					),
					1 => array (
						'name' => 'endclient',
						'label' => 'LBL_ENDCLIENT',
						'customCode' => '{$endclient_value}',
					),
				),
				9 => array (
					0 => array (
						'name' => 'billrate',
						'label' => 'LBL_BILLRATE',
						'customCode' => '{$bill_value}',
					),
					1 => array (
						'name' => 'payrate',
						'label' => 'LBL_PAYRATE',
						'customCode' => '{$pay_value}',
					),
				),
				10 => array (
					0 => 'description',
				),
			),
			'LBL_PANEL_ASSIGNMENT' => array (
				0 => array (
					0 => array (
						'name' => 'date_entered',
						'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
					),
					1 => array (
						'name' => 'date_modified',
						'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
					),
				),
			),
		),
	),
);
?>