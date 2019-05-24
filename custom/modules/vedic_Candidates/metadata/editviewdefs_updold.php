<?php
$module_name = 'vedic_Candidates';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
        'LBL_EDITVIEW_PANEL6' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EMAIL_ADDRESSES' => 
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
        'LBL_ADDRESS_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 'first_name',
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'Last Name',
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
            'name' => 'keyskill_list',
            'studio' => 'visible',
            'label' => 'LBL_KEYSKILL_LIST',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'dob',
            'label' => 'LBL_DOB',
          ),
          1 => 
          array (
            'name' => 'functional_area',
            'label' => 'LBL_FUNCTIONAL_AREA',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'located_c',
          ),
          1 => 
          array (
            'name' => 'relocation_c',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'vedic_employer_vedic_candidates_1_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'vedic_employer_vedic_candidates_1_name',
          ),
          1 => 'title',
        ),
        6 => 
        array (
          0 => 'department',
          1 => 'department',
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
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
        1 => 
        array (
          0 => 
          array (
            'name' => 'ugspecialization',
            'label' => 'LBL_UGSPECIALIZATION',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'pgspecialization',
            'label' => 'LBL_PGSPECIALIZATION',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'postpgspecialization',
            'label' => 'LBL_POSTPGSPECIALIZATION',
          ),
        ),
      ),
      'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 'email1',
          1 => 'email1',
        ),
        1 => 
        array (
          0 => 'phone_mobile',
          1 => 'phone_work',
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
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'work_experience_years',
            'label' => 'LBL_WORK_EXPERIENCE_YEARS',
          ),
          1 => 
          array (
            'name' => 'work_experience_months',
            'label' => 'LBL_WORK_EXPERIENCE_MONTHS',
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
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'comment',
            'label' => 'LBL_COMMENT',
          ),
          1 => 
          array (
            'name' => 'adp_file_no_c',
            'label' => 'ADP File #',
          ),
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'stage_c',
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
            'name' => 'marketable_date',
            'label' => 'LBL_MARKETABLE_DATE',
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
            'name' => 'available_date',
            'label' => 'LBL_AVAILABLE_DATE',
          ),
          1 => 
          array (
            'name' => 'vedic_employee_referer',
            'studio' => 'visible',
            'label' => 'LBL_VEDIC_EMPLOYEE_REFERER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'w2ctc_c',
            'label' => 'Visa Status',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
          1 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'recruitment_agency',
            'studio' => 'visible',
            'label' => 'LBL_RECRUITMENT_AGENCY',
          ),
          1 => 
          array (
            'name' => 'jobtype',
            'label' => 'LBL_JOBTYPE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ipp_c',
            'label' => 'Interview Participation',
          ),
          1 => 
          array (
            'name' => 'forum_moderator_c',
          ),
        ),
      ),
    ),
  ),
);
?>
