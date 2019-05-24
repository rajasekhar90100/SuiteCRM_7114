<?php
// created: 2019-01-11 14:32:05
$viewdefs = array (
  'Leads' => 
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
            3 => 
            array (
              'customCode' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">{/if}',
              'sugar_html' => 
              array (
                'type' => 'button',
                'value' => '{$MOD.LBL_CONVERTLEAD}',
                'htmlOptions' => 
                array (
                  'title' => '{$MOD.LBL_CONVERTLEAD_TITLE}',
                  'accessKey' => '{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}',
                  'class' => 'button',
                  'onClick' => 'document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'',
                  'name' => 'convert',
                  'id' => 'convert_lead_button',
                ),
                'template' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}[CONTENT]{/if}',
              ),
            ),
            4 => 'FIND_DUPLICATES',
            5 => 
            array (
              'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
              'sugar_html' => 
              array (
                'type' => 'submit',
                'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'htmlOptions' => 
                array (
                  'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                  'class' => 'button',
                  'id' => 'manage_subscriptions_button',
                  'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';',
                  'name' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                ),
              ),
            ),
            'AOS_GENLET' => 
            array (
              'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_PRINT_AS_PDF}">',
            ),
          ),
          'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
        'includes' => 
        array (
          0 => 
          array (
            'file' => 'modules/Leads/Lead.js',
          ),
        ),
        'useTabs' => true,
        'tabDefs' => 
        array (
          'LBL_CONTACT_INFORMATION' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ADVANCED' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ASSIGNMENT' => 
          array (
            'newTab' => true,
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
          1 => 
          array (
            0 => 
            array (
              'name' => 'account_name',
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
              'label' => 'LBL_PRIMARY_ADDRESS',
              'type' => 'address',
              'displayParams' => 
              array (
                'key' => 'primary',
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
              'label' => 'LBL_ALTERNATE_ADDRESS',
              'type' => 'address',
              'displayParams' => 
              array (
                'key' => 'alt',
              ),
            ),
            1 => 
            array (
              'name' => 'campaign_name',
              'label' => 'LBL_CAMPAIGN',
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
            0 => 'status_description',
            1 => 'lead_source_description',
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
  ),
);