<?php
$viewdefs ['Leads'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
          1 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
          2 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
          3 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
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
          ),
          1 => 
          array (
            'name' => 'last_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
          ),
          1 => 
          array (
            'name' => 'website',
            'comment' => 'URL of website for the company',
            'label' => 'LBL_WEBSITE',
          ),
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
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'title',
          ),
          1 => 
          array (
            'name' => 'department',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'phone_work',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'phone_fax',
          ),
          1 => 
          array (
            'name' => 'email1',
          ),
        ),
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
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
          1 => 
          array (
            'name' => 'status',
          ),
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
            'comment' => 'Description of the status of the lead',
            'label' => 'LBL_STATUS_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'lead_source_description',
            'comment' => 'Description of the lead source',
            'label' => 'LBL_LEAD_SOURCE_DESCRIPTION',
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
          ),
        ),
      ),
    ),
  ),
);
?>
