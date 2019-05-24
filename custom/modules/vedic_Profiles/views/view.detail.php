<?php
/**
  * FileName => view.detail.php
  * Created By => Rajasekhar (Created On Feb-12-2018)
  * Modified By =>Lakshmi (Modified On Mar-06-2018)
  * COMMENT => custom code for Detailview of Profiles module
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
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
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class vedic_ProfilesViewDetail extends ViewDetail {

 	function vedic_ProfilesViewDetail(){
 		parent::ViewDetail();
 	}
	
 	function display() {
		
		$id = $this->bean->id; 
		$fname=$this->bean->first_name;
		$lname=$this->bean->last_name;
		$ProfName=$fname." ".$lname;
		$ProfName=trim($ProfName);
		
		$this->dv->ss->assign('ProfileHistory', '<input type="button" class="button" onclick=activitylog();  value="Profile History" id ="profile_history"/>');
		
		echo $js = <<<EOT
		<script>
		function activitylog(){
			window.open("index.php?module=vedic_Profiles&action=Activitylog&record=$id");
		}
		</script>
EOT;
        $this->dv->ss->assign('MultipleCallrecords', '<input type="button" class="button" onclick=documentsPopup();  value="Multiple Call Recordings" id ="multiple_call_records"/>');
		echo $js ="
		<script>
		function documentsPopup(){
            var ProfName ='$ProfName';
			var profileid = '$id';
           newwindow=window.open('index.php?module=vedic_Profiles&action=Upload_Calls&ProfName='+ProfName+'&profileid='+profileid,'Upload Documents','height=800,width=1200');
				if (window.focus) {newwindow.focus()}
				return false;
		}
		</script>";
		 
		 
		$stage = $this->bean->stage_c;
		$status = $this->bean->status_c;
		$state = array('Active','Start');
		//code to disable the create option for the profiles who are not in "Marketing" stage and "Active" status 			
		if(($stage!= 'Marketing')||($stage == 'Marketing' && !in_array($status, $state)))
		{
			echo '<style type="text/css">#vedic_Submissions_create_button{
					display:none;
				}
			</style>';
		}
		echo '<style>
			input[id="profile_history"].button:hover{
				color: #e4820e !important;
				background-color: #fff !important;	
			}
			[id="multiple_call_records"].button:hover{
				color: #e4820e !important;
				background-color: #fff !important;	
			}
			div#list_subpanel_vedic_profiles_documents_1 {
				overflow: scroll;
			}
			</style>';
	    parent::display();
 	}
}
?>