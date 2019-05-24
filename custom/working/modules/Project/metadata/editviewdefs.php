<?php
$viewdefs ['Project'] = array (
	'EditView' => array (
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
			'form' => array (
				'hidden' => '<input type="hidden" name="is_template" value="{$is_template}" />',
				'headerTpl' => 'modules/Project/tpls/header.tpl',
				'footerTpl' => 'modules/Project/tpls/footer.tpl',
				'buttons' => array (
					0 => array (
						'customCode' => '<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" id ="SAVE_HEADER" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="SUGAR.projects.fill_invitees();document.EditView.action.value=\'Save\'; document.EditView.return_action.value=\'view_GanttChart\'; {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}document.EditView.return_id.value=\'\'; {/if} formSubmitCheck();"type="button" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">',
					),
					1 => array (
						'customCode' => '{if !empty($smarty.request.return_action) && $smarty.request.return_action == "ProjectTemplatesDetailView" && (!empty($fields.id.value) || !empty($smarty.request.return_id)) }<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="this.form.action.value=\'ProjectTemplatesDetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL{$place}"> {elseif !empty($smarty.request.return_action) && $smarty.request.return_action == "DetailView" && (!empty($fields.id.value) || !empty($smarty.request.return_id)) }<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL{$place}"> {elseif $is_template}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="this.form.action.value=\'ProjectTemplatesListView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL{$place}"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="this.form.action.value=\'index\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL{$place}"> {/if}',
					),
				),
			),
			'javascript' => '<script type="text/javascript">{$JSON_CONFIG_JAVASCRIPT}</script>
			{sugar_getscript file="cache/include/javascript/sugar_grp_project.js"}
			<script>toggle_portal_flag();function toggle_portal_flag()  {ldelim} {$TOGGLE_JS} {rdelim} 
			function formSubmitCheck(){ldelim}if(check_form(\'EditView\')){ldelim}document.EditView.submit();{rdelim}{rdelim}</script>',
			'useTabs' => true,
			'tabDefs' => array (
				'LBL_PROJECT_INFORMATION' => array (
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
					0 => 'estimated_start_date',
					1 => array (
						'name'=>'estimated_end_date',
						'label' => 'LBL_DATE_END',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'startdate_change()',
								'onblur' => 'startdate_change()',
							),
						),
					),
				),
				2 => array (
					0 => array (
						'name' => 'po_enddate',
						'label' => 'LBL_PO_ENDDATE',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'podate_change()',
								'onblur' => 'podate_change()',
							),
						),
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
						'displayParams' => array (
							'initial_filter' => '&account_type_advanced=ChannelClient',
						),
					),
				),
				5 => array (
					0 => array (
						'name' => 'vedic_profiles_project_1_name',
						'displayParams' => array (
							'field' => array (
								'onblur' => 'getProfile()',
							),
							'javascript' => array (
								'btn' => ' onblur="getProfile()" ',
							),
						),
					),
					1 => array (
						'name' => 'vedic_candidates_project_1_name',
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
						'name' => 'vedic_integrate_with_qb_project_name',
					),
					1 => 'assigned_user_name', 
				),
				9 => array (
					0 => array (
						'name' => 'description',
					),
				),
			),
		),
	),
);
?>