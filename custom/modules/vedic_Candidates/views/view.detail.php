<?php
/**
  * FileName => view.detail.php
  * Created By => Ashwani (Created On Apr-03-2016)
  * Modified By => Rajasekhar (Modified On Jun-29-2018)
  * COMMENT => custom code for Detailview of Candidates module
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
// require 'custom/vats/vedic_Common/aws/aws-autoloader.php';
// use Aws\S3\S3Client;
// use Aws\Exception\AwsException;
// use Aws\CommandInterface;
error_reporting(-1);
ini_set('display_errors','on');
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

class vedic_CandidatesViewDetail extends ViewDetail 
{
	function vedic_CandidatesViewDetail()
	{
		parent::ViewDetail();
	}
	/**
      * Function => displaySubPanels()
      * COMMENT => To hide the subpanels based on type of candidate
      */
	protected function _displaySubPanels()
	{
		if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
			$GLOBALS['focus'] = $this->bean;
			require_once ('include/SubPanel/SubPanelTiles.php');
			$subpanel = new SubPanelTiles($this->bean, $this->module);
			//Dependent logic
			$type = $this->bean->type_hiring;
			echo '<style type="text/css">
				#vedic_Submissions_create_button{
					display:none;
				}
				#vedic_Immigration_create_button{
					display:none;
				}
				#Project_create_button{
					display:none;
				}
			</style>';
		     //Code to hide the subpanels,panels and fields based on the type of candidate 
			if($type != 'Us_staffing') {
				echo $js = <<<EOT
				<script>
					$(document).ready(function(){
						setTimeout(function(){
							$('#whole_subpanel_vedic_candidates_vedic_profiles_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_payroll_summary_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_submissions_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_payrollitems_1').css('display','none');
							$('#whole_subpanel_vedic_adjustments_vedic_candidates_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_employees_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_immigration_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_timesheet_1').css('display','none');
							$('#whole_subpanel_vedic_references_vedic_candidates_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_project_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_skillset_1').css('display','none');
							$('#whole_subpanel_vedic_candidates_vedic_evaluations_1').css('display','none');
							$('#HR_sp_tab').css('display','none');
							$('#Other_sp_tab').css('display','none');
							$('#All_sp_tab').css('display','none')
						}, 700);
					 }); 
				</script>
EOT;
			}
			else {
				echo $js = <<<EOT
				<script>
					setTimeout(function(){
						$('div[field="stage_c"]').parent().hide();
						$('div[field="status"]').parent().hide();
						$('div[field="role_c"]').parent().hide();
						$('div[field="vedic_job_vedic_candidates_1_name"]').parent().hide();
						$('#whole_subpanel_vedic_candidates_vedic_solutions_timesheet_1').css('display','none');
						$('#whole_subpanel_vedic_solutions_projects_vedic_candidates_1').css('display','none');
						$('a#tab7').hide();
					}, 700);
				</script>
EOT;
			}
			//End of code to hide the subpanels,panels and fields based on the type of candidate
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_profiles_1']['order'] = 100;     
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['activities']['order'] = 200;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['history']['order'] = 300;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['securitygroups_vedic_candidates_1']['order'] = 400;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_adjustments_vedic_candidates_1']['order'] = 500;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_cases_1']['order'] = 600;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_documents_1']['order'] = 700;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_project_1']['order'] = 800;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_timesheet_1']['order'] = 900;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_employees_1']['order'] = 1000;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_evaluations_1']['order'] = 1100;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_immigration_1']['order'] = 1200;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_payrollitems_1']['order'] = 1300;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_payroll_summary_1']['order'] = 1400;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_skillset_1']['order'] = 1500;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_candidates_vedic_submissions_1']['order'] = 1600;
			$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_references_vedic_candidates_1']['order'] = 1700;
			
			echo $subpanel->display();
		}
	}
	/**  
	  * Function => display()
	  * Modified By => Lakshmi (Modified On Nov-01-2017)
	  * COMMENT =>  Removed(Commented) the unwanted code for the error logs,added the code to display the 
	   	primarykeyskill ,added the button convert to consultant,Proactive Marketing,Marketable Date fields visible only when the Stage is Billing ,
		Added RevertBack to candidate, Convert To Consultant
	  */ 	
 	function display() 
	{
		/******************Convert to consultant*************/
		global $current_user,$db,$sugar_config;
		$id = $this->bean->id;
		$this->bean->primary_skill_c = $this->bean->primary_key_skill_c;
		$objACLRole = new ACLRole();
		$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
		$userType = $current_user->is_admin;
		$communicationRating = $this->bean->communication_rating;
		$functionalRating = $this->bean->functional_rating;
		$evaluationRating = $this->bean->evaluation_rating;
		$technicalRating = $this->bean->technical_rating;
	?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="custom/vats/vedic_Common/RatingExample/css/style.css">
	<?php
		$stars = '<li class="star" title="Poor" data-value="1">
			<i class="fa fa-star fa-fw"></i>
		</li>
		<li class="star" title="Fair" data-value="2">
			<i class="fa fa-star fa-fw"></i>
		</li>
		<li class="star" title="Good" data-value="3">
			<i class="fa fa-star fa-fw"></i>
		</li>
		<li class="star" title="Excellent" data-value="4">
			<i class="fa fa-star fa-fw"></i>
		</li>
		<li class="star" title="WOW!!!" data-value="5">
			<i class="fa fa-star fa-fw"></i>
		</li>';
		$communication_rating = '<div class="rating-stars text-center">
			<ul id="stars">'.$stars.'</ul>
		</div>';
		$this->ss->assign('COMMUNICATIONRATING', $communication_rating);
		echo $rating = <<<EOT
			<script>
				$(document).ready(function() {
					setTimeout(function(){
						var rating = "$communicationRating"; 
						if(rating != '') {
							$('#stars li').removeClass("selected");
							$('#stars li:lt('+rating+')').addClass("selected");
							$("#stars").prop('disabled',true);
						}
					}, 30);
				});
			</script>
EOT;
		$functional_rating = '<div class="rating-stars text-center">
			<ul id="stars1">'.$stars.'</ul>
	    </div>';
	    $this->ss->assign('FUNCTIONALRATING', $functional_rating);
	    echo $funRating = <<<EOT
			<script>
				$(document).ready(function() {
					setTimeout(function(){
						var rating = "$functionalRating"; 
						if(rating != '') {
							$('#stars1 li').removeClass("selected");
							$('#stars1 li:lt('+rating+')').addClass("selected");
							$("#stars1").prop('disabled',true);
						}
					}, 30);
				});
			</script>
EOT;
		$evaluation_rating = '<div class="rating-stars text-center">
			<ul id="stars2">'.$stars.'</ul>
		</div>';
		 $this->ss->assign('EVALUATIONRATING', $evaluation_rating);
		 echo $evalRating = <<<EOT
			<script>
				$(document).ready(function() {
					setTimeout(function(){
						var rating = "$evaluationRating"; 
						if(rating != '') {
							$('#stars2 li').removeClass("selected");
							$('#stars2 li:lt('+rating+')').addClass("selected");
							$("#stars2").prop('disabled',true);
						}
					}, 30);
				});
			</script>
EOT;
		$technical_rating = '<div class="rating-stars text-center">
			<ul id="stars3">'.$stars.'</ul>
		</div>';
	    $this->ss->assign('TECHNICALRATING', $technical_rating);
        echo $techRating = <<<EOT
			<script>
				$(document).ready(function() {
					setTimeout(function(){
						var rating = "$technicalRating"; 
						if(rating != '') {
							$('#stars3 li').removeClass("selected");
							$('#stars3 li:lt('+rating+')').addClass("selected");
							$("#stars3").prop('disabled',true);
						}
					}, 30);
				});
			</script>
EOT;
		$commentsBy = '<select id="commentsby" name="commentsby" title>';
		$commentsBy .= '<option value=""></option >';
		$cndFeedbackQuery = 'select username,user_id from candidates_feedback where candidate_id ="'.$id.'"';
		$cndFeedbackResult = $db->query($cndFeedbackQuery);
		while($cndRes = $db->fetchByAssoc($cndFeedbackResult)) {
			$uName = $cndRes['username'];
			$uId = $cndRes['user_id'];
			$commentsBy .= '<option value="'.$uId.'">'.$uName.'</option >';			
		}
		$commentsBy .='</select>';
		$this->ss->assign('COMMENTSBY',$commentsBy);
		echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					$("#commentsby option[value='']").attr("disabled", true);
					$("#commentsby").on('change',function() {
						$("#commentsby option[value='']").attr("disabled", true);
						var user = $("#commentsby").val();
						var canId = "$id";
						$.ajax({
							type: "POST",
							dataType:"text",
							url: "index.php?entryPoint=updateComments",
							async: false,
							data: {user:user,canId:canId},
							success : function(data) {
								var res = data;
								var feedback = res.split("--");
								var commRating = feedback[0];
								var commComments = feedback[1];
								var evalRating = feedback[2];
								var evalComments = feedback[3];
								var funcRating = feedback[4];
								var funComments = feedback[5];
								var techRating = feedback[6];
								var techComments = feedback[7];
								if(commRating != '') {
									$('#stars li').removeClass("selected");
									$('#stars li:lt('+commRating+')').addClass("selected");
								}
								if(evalRating != '') {
									$('#stars2 li').removeClass("selected");
									$('#stars2 li:lt('+evalRating+')').addClass("selected");
								}
								if(funcRating != '') {
									$('#stars1 li').removeClass("selected");
									$('#stars1 li:lt('+funcRating+')').addClass("selected");
								}
								if(techRating != '') {
									$('#stars3 li').removeClass("selected");
									$('#stars3 li:lt('+techRating+')').addClass("selected");
								}
								$('#communication_comments').text(commComments);
								$('#technical_comments').text(techComments);
								$('#functional_comments').text(funComments);
								$('#evaluation_comments').text(evalComments);
							},
						});
					});
				}); 
			</script>				 
EOT;
		$userName = "SELECT user_id FROM candidates_feedback WHERE date_modified=(SELECT MAX(date_modified) FROM candidates_feedback WHERE candidate_id ='$id')";
		$userNameResult = $db->query($userName);
		$userNameRes = $db->fetchByAssoc($userNameResult);
		$userID = $userNameRes['user_id'];
		echo $js = <<<EOT
			<script>
			$(document).ready(function(){
				setTimeout(function(){
					var userid = "$userID";
					$("#commentsby").val(userid);
				},1000);
			});
			</script>				 
EOT;
		if(!in_array("Consultants", $roles)&&!in_array("SolutionsConsultant", $roles)) {
			$this->dv->ss->assign('CandidateHistory', '<input type = "button" id ="candidate_history" onclick=activitylog(); value="Candidate History"/>');
		} 
		$is_consultant = $current_user->title;
		
		if(!in_array("Consultants", $roles)&&!in_array("SolutionsConsultant", $roles)) {
			// $this->dv->ss->assign('ConvertToConsultant', '<input type="button" onclick="window.location.href=\'index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=EditView&record='.$id.'&is_consultant=true\'" id="ConvertToConsultant" value="Convert To Consultant"/>');
			// echo $js = <<<EOT
				// <script>
					// $(document).ready(function() {
						
					    // $("#create_link").before("<span id='consolid' class='ex' ><a class ='unconverted' href=\'index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=EditView&record=$id&is_consultant=true\' >Candidate</a></span>");
					// });
				// </script>
// EOT;
		}else{
			// is a consultant
			// is a consultant
			if(in_array("Consultants", $roles) || in_array("SolutionsConsultant", $roles)) {
				$this->dv->ss->assign('ConvertToConsultant', '');
				echo $js = <<<EOT
				<script>
					$(document).ready(function() {
						$("a#tab6").hide();
						$("a#tab7").hide();
						$("a#tab5").hide();
						$("#btn_view_change_log").hide();
						$("#tab-actions").hide();
					});
				</script>
EOT;
			}
		}
		if(!in_array("Consultants", $roles) && !in_array("SolutionsConsultant", $roles)) {
			if($this->bean->is_consultant_c == "true"){
				$this->dv->ss->assign('ConvertToConsultant', '<input type="hidden" value="Convert To Consultant"/>');
				$this->dv->ss->assign('RevertbacktoCandidate', '<input type = "button" value="Revertback To Candidate" id="revertback1"/>');
				echo $js = <<<EOT
				<script>
					$(document).ready(function() {						
						var value="Consultant";
						$("#consolid").hide();
						$("#create_link").before("<span id='revertback' class='ex' >"+value+"</span>");
						$('#revertback').on('click',function (){
							if (window.confirm('Do You Really Want To Revert back to Candidate')) {
								var id = '$id';
								$.ajax({
									type:'GET',
									dataType: 'json',
									url: "index.php?entryPoint=RevertbackToCandidate&id="+id+"&is_consultant=false",
									success: function(data){
										window.location.reload(true);
									}
								}); 
							}
							else {}
						});
					});
				</script>
EOT;
			}
		}
		echo $create_button  = <<<EOT
			<script>
				$(document).ready(function() {
					$('#revertback1').on('click',function (){
						if (window.confirm('Do You Really Want To Revert back to Candidate')) {
							var id = '$id';
							$.ajax({
								type:'GET',
								dataType: 'json',
								url: "index.php?entryPoint=RevertbackToCandidate&id="+id+"&is_consultant=false",
								success: function(data){
									window.location.reload(true);
								}
							}); 
						}
						else {}
					});
				});
			</script>
EOT;
		$objACLRole = new ACLRole();
		$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
		$usertype = $current_user->is_admin;
		if($usertype==0){
			if(in_array("Consultants", $roles)){
				echo '<style type="text/css"> 
				li.topnav.all{
                  visibility:hidden;
				  }
				.sidebar .actionMenuSidebar li a div {
					display:none;
				}
				.quickcreatetop .dropdown-toggle {
				display: none;
				}
				.navbar-search .searchbutton{
					display: none;
				}
				.navbar-inverse .nav > .topnav {
						padding: 0 0 0 0;
						display: inline-block;
						border-top: 4px solid #f78c03;
					}
				
				
				</style>'; 
				echo $create_button  = <<<EOT
				<script>
						$( "span:contains('Candidates')" ).replaceWith('Consultant');
                        $( "a:contains('Total Amount')" ).hide();
						$("#create_link").remove();
						$("#quick-nav").remove();			
						$('.breaker').hide();
						

				</script>
EOT;
			}
		}
		/****************END Convert to consultant*************/
	
		// Resume name/downloadble 
		$resumename = $this->bean->resumepath; 
		$candidate_id = $this->bean->id;
		//code to open  the activity log of a candidate :: added by Maneesha Sep-08-2017
		$objACLRole = new ACLRole();
        $roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
		$usertype = $current_user->is_admin;
		if(!in_array("Consultants", $roles)){
			$this->dv->ss->assign('CandidateHistory', '<input type = "button" id ="candidate_history" onclick=activitylog(); 
            value="Candidate History"/>');
		}
		//end of Maneesha Code
		$this->ss->assign('resumename', $resumename);
		if (strpos($resumename, "&#039;") !== false) {
			$resumename = str_replace("&#039;","'",$this->bean->resumepath);
		}
		
		/*********************S3 Download Start**********************/
		/*
		$bucket = $GLOBALS['sugar_config']['s3_bucket'];
		//CREATE A S3CLIENT
		$client = new S3Client([
			'version'     => 'latest',
			'region'      => 'us-east-1',
		]);
		$resumepath = $client->getObjectUrl($bucket,"VATS_DOCUMENTS/" . $candidate_id . "/" . $resumename);
		*/
		/*********************S3 Download End**********************/
		
		
		$this->ss->assign('resumepath', $resumepath);
		
		// shows ssn
		$ssn = substr($this->bean->ssn_c, -4);
		$this->ss->assign("ssn",$ssn);
		
		// shows rate
		$sell_rate = "$".$this->bean->sell_rate_hr_c."/Hr";
		$this->ss->assign("sell_rate",$sell_rate);
		
		
		// To display key skill list in comma separator instead of bullet format
		$keyskill = $this->bean->keyskill_list; 
		$keyskilllist = str_replace("^", " ", $keyskill);
		//echo "<br> L:62  ".$string;
		$this->ss->assign('keyskilllist', $keyskilllist);
		// End key skills  
		
		// To Forum Moderator
		$forummoderator = $this->bean->forum_moderator_c; 
		$forummoderatorlist = str_replace("^", " ", $forummoderator);
		//echo "<br> L:62  ".$string;
		$this->ss->assign('forummoderatorlist', $forummoderatorlist);
		// End key skills  
		
		// To display Back to top page link as fixed position
		echo "
		<style> p.pos_fixed {
					position: fixed;
					top: 98%;
					right: 5px;
					color: red;
				}
				span.ex {
					background-color: #ffffff;
					border-color: #0066a4;
					border-style: solid;
					border-width: 2px;	
					height: 30px;
					padding: 4px 10px 6px 10px;
					margin: 5em 74em 4em 5em;
				}
				span.ex:hover {
					color: #fff !important;
					background-color: #0066a4 !important;	
					height: 30px;
					cursor: pointer;
				}
				a.unconverted:hover {
					color: white !important;
				}
				.moduleTitle span.utils {
					display: block;
					float: right;
					margin-top: -11px;
				}
				li#tab-actions {
					margin: -7.6em 2em -7.4em 68em;
					float: right;
				}
				div#subpanel_vedic_candidates_vedic_payroll_summary_1 {
					overflow: scroll;
				}
				div#subpanel_vedic_candidates_documents_1 {
					overflow: scroll;
				}
				.list .SugarActionMenu .sugar_action_button > .subnav li:last-of-type a:last-of-type {
					width: auto !important;
					padding-left: 16px !important;
				}
				a.unconverted {
					color: inherit;
				}
				[field='keyskill_list'] {
					width: 78% !important;
				}
				div#list_subpanel_vedic_candidates_vedic_submissions_1 {
					overflow: scroll;
				}
		</style>";
		
		$js_disbale ='
			<script>
				document.getElementById("vedic_candidates_vedic_skillset_1_create_button").value = "Add Skill";
				document.getElementById("vedic_candidates_vedic_submissions_1_create_button").value = "Submit";
			</script>
		';
		$this->ss->assign('js_disbale', $js_disbale);
		$url = $sugar_config['site_url'];
		$id = $this->bean->id;	  
		$resumepath = $this->bean->resumepath;  
		if(!empty($resumepath) && $resumepath != ''){
			$previewButton = "<input type='button' class = 'r_preview' value = 'Resume Preview' id = 'resume_preview' onclick = 'resume_preview(this.id);')/>";
			$this->ss->assign('PREVIEWBUTTON', $previewButton);		
		}
		echo $jq = <<<EMAIL
        <script>
			function resume_preview(id)
			{
				//custom/library/phpFunction/resume_viewer.php
				var resumepath = $('#resumepath > a').attr('href');
				var resumename = $('#resumepath > a').text();
				if (resumepath.toLowerCase().indexOf(".pdf") >= 0){
					//var win = window.open(resumepath);
					var win = window.open( 'libreConverter.php?resumepath='+encodeURIComponent(resumepath)+'&resumename='+encodeURIComponent(resumename));
				}else{
					var win = window.open( 'libreConverter.php?resumepath='+encodeURIComponent(resumepath)+'&resumename='+encodeURIComponent(resumename));
				}
			}
			function generate_document(contact_id)
			{
				var base_url= '$url';
				var id='$id';
			
				// base_url = base_url+'/immigrationAudit.php?parent_id='+contact_id+'';	
				window.open('index.php?entryPoint=immigrationAudit& parent_id=' +contact_id);

				// window.open(base_url);
				
                // location.href=base_url;
					
			}
        </script>
EMAIL;
		echo $js = <<<EOT
		<script>
			function activitylog(){
				window.open("index.php?module=vedic_Candidates&action=Activitylog&record=$id");
			}
		</script>
EOT;
		parent::display();
 	}
}
?>