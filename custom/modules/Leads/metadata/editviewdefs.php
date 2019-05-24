<?php
$viewdefs ['Leads'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
          1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
          2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
          3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
        ),
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
      'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 'last_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'type' => 'varchar',
            'validateDependency' => false,
            'customCode' => '<input name="account_name" id="EditView_account_name" {if ($fields.converted.value == 1)}disabled="true"{/if} size="30" maxlength="255" type="text" value="{$fields.account_name.value}">',
          ),
          1 => 'website',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'parent_company_name_c',
            'label' => 'LBL_PARENT_COMPANY_NAME_C',
          ),
          1 => 
          array (
            'name' => 'parent_website_c',
            'label' => 'LBL_PARENT_WEBSITE_C',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'parent_phone_c',
            'label' => 'LBL_PARENT_PHONE_C',
          ),
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        4 => 
        array (
          0 => 'title',
          1 => 'department',
        ),
        5 => 
        array (
          0 => 'phone_work',
          1 => 'phone_mobile',
        ),
        6 => 
        array (
          0 => 'phone_fax',
          1 => 'email1',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'c_level_c',
            'label' => 'LBL_C_LEVEL',
          ),
          1 => 'lead_source',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'sap_customer_c',
            'label' => 'LBL_SAP_CUSTOMER',
          ),
          1 => 
          array (
            'name' => 'savant_student_c',
            'label' => 'LBL_SAVANT_STUDENT',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'capability_c',
            'label' => 'LBL_CAPABILITY',
          ),
          1 => 
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
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'primary_category_c',
            'label' => 'LBL_PRIMARY_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'vedicsoft_hospitality_c',
            'label' => 'LBL_VEDICSOFT_HOSPITALITY',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'biography_c',
            'studio' => 'visible',
            'label' => 'LBL_BIOGRAPHY',
          ),
          1 => 
          array (
            'name' => 'industry_c',
            'studio' => 'visible',
            'label' => 'LBL_INDUSTRY',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'job_function_c',
            'label' => 'LBL_JOB_FUNCTION',
          ),
          1 => 
          array (
            'name' => 'job_level_s_c',
            'label' => 'LBL_JOB_LEVEL_S',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'account_revenue_usd_c',
            'label' => 'LBL_ACCOUNT_REVENUE_USD',
          ),
          1 => 
          array (
            'name' => 'account_description',
            'comment' => 'Description of lead account',
            'label' => 'LBL_ACCOUNT_DESCRIPTION',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'account_ownership_c',
            'label' => 'LBL_ACCOUNT_OWNERSHIP',
          ),
          1 => 
          array (
            'name' => 'account_status_c',
            'label' => 'LBL_ACCOUNT_STATUS',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'account_sic_us_c',
            'label' => 'LBL_ACCOUNT_SIC_US',
          ),
          1 => 
          array (
            'name' => 'account_ticker_symbol_c',
            'label' => 'LBL_ACCOUNT_TICKER_SYMBOL',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'accountemployee_c',
            'label' => 'LBL_ACCOUNTEMPLOYEE',
          ),
          1 => 'description',
        ),
        17 => 
        array (
          0 => 
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
          1 => 'campaign_name',
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'annual_revenue_c',
            'label' => 'LBL_ANNUAL_REVENUE_C',
          ),
          1 => 
          array (
            'name' => 'number_employees_c',
            'label' => 'LBL_NUMBER_EMPLOYEES_C',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source_c',
            'label' => 'LBL_SOURCE_C',
          ),
          1 => 'status',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'number_of_room_c',
            'label' => 'LBL_NUMBER_OF_ROOM_C',
          ),
          1 => 
          array (
            'name' => 'wifi_rating_c',
            'label' => 'LBL_WIFI_RATING_C',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'general_notes_c',
            'studio' => 'visible',
            'label' => 'LBL_GENERAL_NOTES_C',
          ),
          1 => 
          array (
            'name' => 'linkedin_connect_c',
            'label' => 'LBL_LINKEDIN_CONNECT_C',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'extreme_notes_c',
            'studio' => 'visible',
            'label' => 'LBL_EXTREME_NOTES_C',
          ),
          1 => 
          array (
            'name' => 'qlik_notes_c',
            'studio' => 'visible',
            'label' => 'LBL_QLIK_NOTES_C',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status_description',
          ),
          1 => 
          array (
            'name' => 'lead_source_description',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
$viewdefs['Leads']['EditView']['templateMeta'] = array (
  'form' => 
  array (
    'hidden' => 
    array (
      0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
      1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
      2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
      3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
    ),
    'buttons' => 
    array (
      0 => 'SAVE',
      1 => 'CANCEL',
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
  'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>',
  'useTabs' => false,
  'tabDefs' => 
  array (
    'LBL_CONTACT_INFORMATION' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
    'LBL_PANEL_ADVANCED' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      'newTab' => false,
      'panelDefault' => 'expanded',
    ),
  ),
);
?>
