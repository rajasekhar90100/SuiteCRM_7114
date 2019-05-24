<?php
$module_name = 'vedic_Candidates';
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
        'LBL_ADDRESS_INFORMATION' => 
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
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EMAIL_ADDRESSES' => 
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
          0 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
          1 => 
          array (
            'name' => 'current_designation',
            'label' => 'LBL_CURRENT_DESIGNATION',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'resume_id',
            'label' => 'LBL_RESUME_ID',
          ),
          1 => 
          array (
            'name' => 'dob',
            'label' => 'LBL_DOB',
          ),
        ),
        2 => 
        array (
          0 => 'phone_work',
          1 => 'phone_mobile',
        ),
        3 => 
        array (
          0 => 'title',
          1 => 'description',
        ),
        4 => 
        array (
          0 => 'department',
          1 => 
          array (
            'name' => 'functional_area',
            'label' => 'LBL_FUNCTIONAL_AREA',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'current_location',
            'label' => 'LBL_CURRENT_LOCATION',
          ),
          1 => 
          array (
            'name' => 'preferred_location',
            'label' => 'LBL_PREFERRED_LOCATION',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ugcourse',
            'label' => 'LBL_UGCOURSE',
          ),
          1 => 
          array (
            'name' => 'uginstitute',
            'label' => 'LBL_UGINSTITUTE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ugspecialization',
            'label' => 'LBL_UGSPECIALIZATION',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'pgcourse',
            'label' => 'LBL_PGCOURSE',
          ),
          1 => 
          array (
            'name' => 'pginstitute',
            'label' => 'LBL_PGINSTITUTE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'pgspecialization',
            'label' => 'LBL_PGSPECIALIZATION',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'postpgcourse',
            'label' => 'LBL_POSTPGCOURSE',
          ),
          1 => 
          array (
            'name' => 'postpginsitute',
            'label' => 'LBL_POSTPGINSITUTE',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'postpgspecialization',
            'label' => 'LBL_POSTPGSPECIALIZATION',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 'assigned_user_name',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
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
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'c',
            'label' => 'LBL_C',
          ),
          1 => 
          array (
            'name' => 'css',
            'label' => 'LBL_CSS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'php4',
            'label' => 'LBL_PHP4',
          ),
          1 => 
          array (
            'name' => 'php5',
            'label' => 'LBL_PHP5',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'mysql',
            'label' => 'LBL_MYSQL',
          ),
          1 => 
          array (
            'name' => 'oops',
            'label' => 'LBL_OOPS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cakephp',
            'label' => 'LBL_CAKEPHP',
          ),
          1 => 
          array (
            'name' => 'zend_framework',
            'label' => 'LBL_ZEND_FRAMEWORK',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'xcart',
            'label' => 'LBL_XCART',
          ),
          1 => 
          array (
            'name' => 'symfony_framework',
            'label' => 'LBL_SYMFONY_FRAMEWORK',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'drupal',
            'label' => 'LBL_DRUPAL',
          ),
          1 => 
          array (
            'name' => 'joomla',
            'label' => 'LBL_JOOMLA',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'linux',
            'label' => 'LBL_LINUX',
          ),
          1 => 
          array (
            'name' => 'sugarcrm',
            'label' => 'LBL_SUGARCRM',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'java',
            'label' => 'LBL_JAVA',
          ),
          1 => 
          array (
            'name' => 'javascript',
            'label' => 'LBL_JAVASCRIPT',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'work_experience_months',
            'label' => 'LBL_WORK_EXPERIENCE_MONTHS',
          ),
          1 => 
          array (
            'name' => 'work_experience_years',
            'label' => 'LBL_WORK_EXPERIENCE_YEARS',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'annual_salary',
            'label' => 'LBL_ANNUAL_SALARY',
          ),
          1 => 
          array (
            'name' => 'expected_ctc',
            'label' => 'LBL_EXPECTED_CTC',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'offered_ctc',
            'label' => 'LBL_OFFERED_CTC',
          ),
          1 => 
          array (
            'name' => 'final_ctc',
            'label' => 'LBL_FINAL_CTC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'comment',
            'label' => 'LBL_COMMENT',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'h1b',
            'studio' => 'visible',
            'label' => 'LBL_H1B',
          ),
          1 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'reason_for_rejection',
            'studio' => 'visible',
            'label' => 'LBL_REASON_FOR_REJECTION',
          ),
          1 => 
          array (
            'name' => 'joining_date',
            'label' => 'LBL_JOINING_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'vedic_employee_referer',
            'studio' => 'visible',
            'label' => 'LBL_VEDIC_EMPLOYEE_REFERER',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'referred_by',
            'studio' => 'visible',
            'label' => 'LBL_REFERRED_BY',
          ),
        ),
      ),
      'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 'email1',
        ),
      ),
    ),
  ),
);
?>
