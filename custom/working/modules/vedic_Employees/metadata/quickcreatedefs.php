<?php
$module_name = 'vedic_Employees';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL6' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL7' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'middle_name_c',
            'label' => 'LBL_MIDDLE_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'last_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'vedic_candidates_vedic_employees_1_name',
            'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_EMPLOYEES_1_FROM_VEDIC_CANDIDATES_TITLE',
          ),
          1 => 'title',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'birth_date',
            'label' => 'LBL_BIRTH_DATE',
          ),
          1 => 
          array (
            'name' => 'birth_place',
            'label' => 'LBL_BIRTH_PLACE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'employee_nationality',
            'label' => 'LBL_EMPLOYEE_NATIONALITY',
          ),
          1 => 
          array (
            'name' => 'num_secu',
            'label' => 'LBL_NUM_SECU',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'i9_reminder_date_c',
            'label' => 'LBL_I9_REMINDER_DATE_C',
          ),
          1 => 
          array (
            'name' => 'marital_situation',
            'label' => 'LBL_MARITAL_SITUATION',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 'email1',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'comment' => 'Work phone number of the contact',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'comment' => 'Mobile phone number of the contact',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'phone_home',
            'comment' => 'Home phone number of the contact',
            'label' => 'LBL_HOME_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'comment' => 'Street address for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_STREET',
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'comment' => 'Street address for alternate address',
            'label' => 'LBL_ALT_ADDRESS_STREET',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hire_date',
            'label' => 'LBL_HIRE_DATE',
          ),
          1 => 
          array (
            'name' => 'quiting_date',
            'label' => 'LBL_QUITING_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'actual_employee',
            'label' => 'LBL_ACTUAL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'employee_number',
            'label' => 'LBL_EMPLOYEE_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gross_incomes',
            'label' => 'LBL_GROSS_INCOMES',
          ),
          1 => 
          array (
            'name' => 'billable',
            'label' => 'LBL_BILLABLE',
          ),
        ),
      ),
      'lbl_editview_panel7' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'rib_banq_number',
            'label' => 'LBL_RIB_BANQ_NUMBER',
          ),
          1 => 
          array (
            'name' => 'rib_account',
            'label' => 'LBL_RIB_ACCOUNT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rib_bank_location',
            'label' => 'LBL_RIB_BANK_LOCATION',
          ),
          1 => 
          array (
            'name' => 'rib_guichet_number',
            'label' => 'LBL_RIB_GUICHET_NUMBER',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
