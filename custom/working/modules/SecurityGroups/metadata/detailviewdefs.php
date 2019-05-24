<?php
$viewdefs ['SecurityGroups'] = 
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
      'tabDefs' => 
      array (
        1 => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        2 => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        3 => 
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
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        2 => 
        array (
          0 => 'noninheritable',
        ),
        3 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'vedic_secured_passwords_securitygroups_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
