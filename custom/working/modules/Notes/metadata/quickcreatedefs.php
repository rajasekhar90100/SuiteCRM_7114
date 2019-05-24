<?php
$viewdefs ['Notes'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
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
      'javascript' => '{sugar_getscript file="include/javascript/dashlets.js"}
<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'useTabs' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'contact_name',
          1 => 'parent_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_SUBJECT',
            'displayParams' => 
            array (
              'size' => 50,
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 'filename',
          1 => array(
			'name' => 'ammount_c',
			'customCode' => '<div style = "color: #00529B;background-color: #BDE5F8;text-align: -webkit-center;font-family:Arial, Helvetica, sans-serif; width:-webkit-fill-available;float:right;border: 1px solid; background-repeat: no-repeat;background-position: 10px center;">Select Type as "Audio" while uploading audio files<br> Supported audio format is ".mp3"</div>',
					
			),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_NOTE_STATUS',
            'displayParams' => 
            array (
              'rows' => 6,
              'cols' => 75,
            ),
          ),
        ),
		4 => array(
			0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
		  1 =>'',
		),
      ),
    ),
  ),
);
?>
