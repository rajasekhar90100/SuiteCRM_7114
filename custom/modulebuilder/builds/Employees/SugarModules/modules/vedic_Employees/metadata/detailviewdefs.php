<?php
$module_name = 'vedic_Employees';
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
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EMAIL_ADDRESSES' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_ADDRESS_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 'full_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'trigram',
            'label' => 'LBL_TRIGRAM',
          ),
          1 => 
          array (
            'name' => 'salutation',
            'comment' => 'Contact salutation (e.g., Mr, Ms)',
            'label' => 'LBL_SALUTATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'num_secu',
            'label' => 'LBL_NUM_SECU',
          ),
          1 => '',
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'birth_dept',
            'label' => 'LBL_BIRTH_DEPT',
          ),
          1 => 
          array (
            'name' => 'employee_nationality',
            'label' => 'LBL_EMPLOYEE_NATIONALITY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'marital_situation',
            'label' => 'LBL_MARITAL_SITUATION',
          ),
          1 => 'title',
        ),
        7 => 
        array (
          0 => '',
        ),
      ),
      'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 'email1',
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 'primary_address_street',
          1 => 'alt_address_street',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'last_hire_date',
            'label' => 'LBL_LAST_HIRE_DATE',
          ),
          1 => 
          array (
            'name' => 'hire_date',
            'label' => 'LBL_HIRE_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'quiting_date',
            'label' => 'LBL_QUITING_DATE',
          ),
          1 => 
          array (
            'name' => 'actual_employee',
            'label' => 'LBL_ACTUAL_EMPLOYEE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'employee_number',
            'label' => 'LBL_EMPLOYEE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'syntec',
            'label' => 'LBL_SYNTEC',
          ),
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_number_1',
            'label' => 'LBL_ASSET_NUMBER_1',
          ),
          1 => 
          array (
            'name' => 'pis_number_2',
            'label' => 'LBL_PIS_NUMBER_2',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
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
            'name' => 'rib_guichet_number',
            'label' => 'LBL_RIB_GUICHET_NUMBER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rib_account',
            'label' => 'LBL_RIB_ACCOUNT',
          ),
          1 => 
          array (
            'name' => 'rib_key',
            'label' => 'LBL_RIB_KEY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rib_bank_location',
            'label' => 'LBL_RIB_BANK_LOCATION',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'entire_rib_n',
            'label' => 'LBL_ENTIRE_RIB_N',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'holiday_reference',
            'label' => 'LBL_HOLIDAY_REFERENCE',
          ),
          1 => 
          array (
            'name' => 'rtt_reference',
            'label' => 'LBL_RTT_REFERENCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'holiday_balance',
            'label' => 'LBL_HOLIDAY_BALANCE',
          ),
          1 => 
          array (
            'name' => 'rtt_balance',
            'label' => 'LBL_RTT_BALANCE',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'flyingblue',
            'label' => 'LBL_FLYINGBLUE',
          ),
          1 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
