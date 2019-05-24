<?php
$viewdefs ['Notes'] =  array (
	'EditView' => array (
		'templateMeta' => array (
			'form' => array (
				'enctype' => 'multipart/form-data',
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
			'javascript' => '{sugar_getscript file="include/javascript/dashlets.js"}
			<script>
			function deleteAttachmentCallBack(text)
				{literal} { {/literal}
				if(text == \'true\') {literal} { {/literal}
					document.getElementById(\'new_attachment\').style.display = \'\';
					ajaxStatus.hideStatus();
					document.getElementById(\'old_attachment\').innerHTML = \'\';
				{literal} } {/literal} else {literal} { {/literal}
					document.getElementById(\'new_attachment\').style.display = \'none\';
					ajaxStatus.flashStatus(SUGAR.language.get(\'Notes\', \'ERR_REMOVING_ATTACHMENT\'), 2000);
				{literal} } {/literal}
			{literal} } {/literal}
			</script>
			<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
		),
		'panels' => array (
			'lbl_note_information' => array (
				0 => array (
					0 => 'contact_name',
					1 => 'parent_name',
				),
				1 => array (
					0 => array (
						'name' => 'name',
						'displayParams' => array (
							'size' => 60,
						),
					),
					1 => 'type_c',
				),
				2 => array (
					0 => 'filename',
					1 => array (
						'name' => 'ammount_c',
						'customCode' => '<div style = "color: #00529B;background-color: #BDE5F8;text-align: -webkit-center;font-family:Arial, Helvetica, sans-serif; width:-webkit-fill-available;float:right;border: 1px solid; background-repeat: no-repeat;background-position: 10px center;">Select Type as "ER Audio" while uploading audio files related to ERT Team<br>Select Type as "GC Audio" while uploading audio files related to GC Team<br> Supported audio formats are ".mp3,.wav"</div>',
					),
				),
				3 => array (
					0 => array(
						'name' => 'from_date',
						'displayParams' => array (
							'field' => array (
								'onChange' => 'validate_date()',
							),
						),
					),
					1 => array(
						'name' => 'to_date',
						'displayParams' => array (
							'field' => array (
							    'onChange' => 'validate_date()',
					        ),
					    ),
					),
					1 => 'to_date',
				),
				4 => array (
					0 => array (
						'name' => 'description',
						'label' => 'LBL_NOTE_STATUS',
					),
				),
				5 => array (
					0 => array (
						'name' => 'assigned_user_name',
						'label' => 'LBL_ASSIGNED_TO',
					),
					1 => array (
						'name' => 'vedic_gc_activities_1_notes_name',
					),
				),
			),
		),
	),
);
?>