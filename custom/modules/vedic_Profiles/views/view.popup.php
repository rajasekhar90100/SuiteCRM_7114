<?php 
/**
  * FileName => view.popup.php
  * Created By => Udaykiran (Created On Mar-26-2018)
  * Modified By => Udaykiran (Modified On Mar-26-2018)
  * COMMENT => Custom popup view for profiles module
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

class vedic_ProfilesViewPopup  extends ViewPopup{
   
	function display(){
		global $db,$popupMeta, $mod_strings,$bean;
		$CanId= $_REQUEST['vedic_candidates_vedic_profiles_1vedic_candidates_ida_advanced'];
		if($CanId){
			//Query to get the count of marketing profiles for the selected candidate
			$query =$db->query("SELECT COUNT(*) AS COUNT
								FROM vedic_profiles
								JOIN vedic_profiles_cstm ON vedic_profiles.id = vedic_profiles_cstm.id_c
								JOIN `vedic_candidates_vedic_profiles_1_c` ON vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_profiles_idb` = vedic_profiles.id
								WHERE vedic_candidates_vedic_profiles_1_c.`vedic_candidates_vedic_profiles_1vedic_candidates_ida` = '$CanId'
								  AND vedic_profiles_cstm.stage_c = 'Marketing'
								  AND vedic_profiles_cstm.status_c IN('Start',
																	  'Active')
								  AND vedic_profiles.deleted ='0'
								  AND vedic_candidates_vedic_profiles_1_c.deleted='0'");
			$result = $db->fetchByAssoc($query);
			$count = $result['COUNT'];
			if($count == 0){				
				echo $js = <<<EOT
				<script>
					$(document).ready(function(){
						$( '<input type="button" class="button" id="create_profile" title="Create Marketing Profile" value="Create Marketing Profile" onclick="profile()"><div class="wait"><div id="wait"><img src="themes/Suite7/images/loading.gif" width="40" height="40" /><br>Loading Please Wait..</div></div>' ).insertAfter( "#search_form_clear" );
					});
					function profile()
					{
						$('.wait').show();
						var CanId = '$CanId';
						$.ajax({
							url:"index.php?entryPoint=createMarketingProf&CanId="+CanId,
							type: "POST",
							success: function(data){
								if(data)
								{
									location.reload();	
									$(".wait").fadeOut("slow");										
								}
							},
							error: function(){},        
						});
					}
				</script>
EOT;
				echo '<style> 
					input#create_profile{
						background-color: #ffffff;
						color: #e4820e !important;
						border-color: #e4820e !important;
						border-style: solid;
						border-width: 2px;
						margin-left: 4px;		
					}
					input#create_profile:hover{
						color: #fff !important;
						background-color: #e4820e !important;	
					}
					.wait {
						background:#eee;
						display: none;        
						position: fixed; 
						padding: 330px 300px 300px 330px;				
						top: 0;                 
						right: 0;                
						bottom: 0;
						left: 0;
						opacity: 0.5;
					}
				</style>';
			}		
		}
		parent::display();
	}
}
?>