<?php
/**
  * FileName => view.edit.php
  * Created By => Ashwani (Created On Apr-03-2017)
  * Modified By => Udaykiran (Modified On Jul-15-2018)
  * COMMENT => edit view for candidates
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class vedic_CandidatesViewEdit extends ViewEdit
{
 	function vedic_CandidatesViewEdit()
	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 	}
 	
 	function display()
	{
		global $mod_strings,$db,$current_user,$app_list_strings,$sugar_config;
		$id = $this->bean->id;
		echo ' <link rel="stylesheet" href="'.$base_url.'themes/SuiteR/css/boot.css">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" style="color:black">Following are the details to access Consultant Portal.</h4>
						</div>
						<div class="modal-body">
							<p>
								<table width="100%" border="0" cellspacing="1" cellpadding="0" id="Default_Timesheet_Subpanel" class="yui3-skin-sam edit view panelContainer" name="qb_table">
									<tr style="color:#ffffff;background-color: #337ab7;">
										<td width="12.5%" scope="col">Username : </td><td width="37.5%"><span id="consultant_username"></span></td>
									</tr>
									<tr style="color:#ffffff;background-color: #337ab7;">
										<td width="12.5%" scope="col">Password : </td><td width="37.5%"><span id="consultant_password"></span></td>
									</tr>
									<!-- <tr style="color:#ffffff;background-color: #337ab7;">
										<td width="12.5%" scope="col">Department/Location:</td><td width="37.5%"><span id="qb_dept"></span></td>
										<td width="12.5%" scope="col">Billable:</td><td width="37.5%"><span id="qb_billabel"></span></td>
									</tr>
									<tr style="color:#ffffff;background-color: #337ab7;">
										<td width="12.5%" scope="col">Service Item</td><td width="37.5%"><span id="qb_service_item_name" ></span></td>
										<td width="12.5%" scope="col">Description:</td><td width="37.5%"><span id="qb_desc"></span></td>
										<td width="12.5%" scope="col" style="display:none"></td><td width="37.5%"><span id="qb_service_id" style="display:none"></span><span id="qb_dept_id" style="display:none"></span><span id="qb_service_item_id" style="display:none"></span></td>
									</tr>-->
								</table>
							</p>
							<!--                <span id="show_qb_update">
								<p>Do you want to create TimeActivity for above Employee in Quick Books ?</p>
								<p class="text-warning"><small>If you dont save, You will be redirected back to the portal .</small></p>
							</span>-->
						</div>
						<div class="modal-footer">
							<!--                    <button type="button" class="btns btns-default" data-dismiss="modal">Close</button>
							<button type="button" class="btns btns-primary" onclick="" id="" >Close</button>-->
							<button type="button" class="btns btns-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>';
		$id = $this->bean->id;
		$type = $this->bean->type_hiring;
		$userId = $current_user->id;
		$userType = $current_user->is_admin;
		$securityGroup = new SecurityGroup();
		$groups = $securityGroup->getUserSecurityGroups($GLOBALS['current_user']->id);
		$solutions = $securityGroup->retrieve_by_string_fields(array('name'=>'Solutions','deleted'=>0));
		$solutionsId = $solutions->id;
		$operations = $securityGroup->retrieve_by_string_fields(array('name'=>'Operations','deleted'=>0));
		$operationsId = $operations->id;
		$hiring = $securityGroup->retrieve_by_string_fields(array('name'=>'Hiring','deleted'=>0));
		$hiringId = $hiring->id;
		$communicationRating = $this->bean->communication_rating;
		$functionalRating = $this->bean->functional_rating;
		$evaluationRating = $this->bean->evaluation_rating;
		$technicalRating = $this->bean->technical_rating;
		$feedbackCount = "SELECT count(candidate_id) as count FROM candidates_feedback WHERE candidate_id ='$id'";
		$feedbackCountResult = $db->query($feedbackCount);
		$feedbackCountRes = $db->fetchByAssoc($feedbackCountResult);
		$count = $feedbackCountRes['count'];
		if((($id == '') && ($type != 'Us_staffing' )) || (($type != 'Us_staffing' ) &&($count == 0))) {
		    echo $js = <<<EOT
		        <script>
				    $(document).ready(function(){
					     $('div [data-label="LBL_COMMENTS_BY"]').parent().hide();
					});
				</script>				 
EOT;
		}
		if( $type != 'Us_staffing' && ($count > 0) && !empty($id) ) {
			$addFeedbackBy = '<input type="button" class = "feedback_button" value = "Add Your Feedback" id = "comments_by"/>';
			$this->ss->assign("ADDFEEDBACKBUTTON", $addFeedbackBy);
		}
		echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					$("#comments_by option[value='']").attr("readOnly", true);
					$(".feedback_button").on('click',function() {
						$('#stars li').removeClass('selected');
						$('#stars1 li').removeClass('selected');
						$('#stars2 li').removeClass('selected');
						$('#stars3 li').removeClass('selected');
						$('#communication_comments').val("");
						$('#technical_comments').val("");
						$('#functional_comments').val("");
						$('#evaluation_comments').val("");
						$("#comments_by").val("");
					}); 
					$("#comments_by").on('change',function() {
						$("#comments_by option[value='']").attr("readOnly", true);
						var user = $("#comments_by").val();
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
								var funcComments = feedback[5];
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
								$('#communication_comments').val(commComments);
								$('#technical_comments').val(techComments);
								$('#functional_comments').val(funcComments);
								$('#evaluation_comments').val(evalComments);
							},
						});
					});
				}); 
			</script>				 
EOT;
		//Code to enable/disable the options of type field based on SecurityGroups
		if($id != '' && $userType == 0)	{
			echo $js = <<<EOT
				<script>
					$(document).ready(function(){
						$("select option[value='Savantis_IN']").prop('disabled',true);
						$("select option[value='Savantis_US']").prop('disabled',true);
					}); 
				</script>				 
EOT;
		}
		else {
			if(in_array($operationsId, array_keys($groups)) && $userType == 0) {				
				if(in_array($hiringId, array_keys($groups)) && $userType == 0) {
					echo $js = <<<EOT
					<script>
						$(document).ready(function(){
							$("select option[value='Savantis_IN']").prop('disabled',true);
						}); 
					</script>
EOT;
				}
				else if(in_array($solutionsId, array_keys($groups)) && $userType == 0) {
				}
				else {
					echo $js = <<<EOT
					<script>
						$(document).ready(function(){
							$("select option[value='Savantis_IN']").prop('disabled',true);
							$("select option[value='Savantis_US']").prop('disabled',true);
						}); 
					</script>				 
EOT;
				}
			}
			else if(in_array($solutionsId, array_keys($groups)) && $userType == 0) {
				echo $js = <<<EOT
				<script>
				$(document).ready(function(){
					$("select option[value='Us_staffing']").prop('disabled',true);
					$("select option[value='Savantis_US']").prop('selected',true);
				}); 
				</script>
EOT;
			}
		}
		
		//Code to hide the fields for existing Candidates who's type is "US Staffing"  :: Added BY Udaykiran Mar-23-2018
		if((!empty($id) && ($type == 'Us_staffing' ))) {
			echo $js = <<<EOT
			<script>
			$(document).ready(function(){
				$('div [data-label="LBL_STAGE"]').parent().hide();
				$('div [data-label="LBL_STATUS"]').parent().hide();
				$('div [data-label="LBL_PRIMARY_MARKETER"]').parent().hide();
				$('div [data-label="LBL_SECONDARY_MARKETER"]').parent().hide();
				$('div [data-label="LBL_HIRER_1"]').parent().hide();
				$('div [data-label="LBL_HIRER_2"]').parent().hide();
				$('div [data-label="LBL_HL"]').parent().hide();
				$('div [data-label="LBL_SLEAD"]').parent().hide();
				$('div [data-label="LBL_SALES"]').parent().hide();
				$('div [data-label="LBL_ML_1"]').parent().hide();
				$('div [data-label="LBL_ML_2"]').parent().hide();
				$('div [data-label="LBL_RL"]').parent().hide();
				$('div [data-label="LBL_RECRUITER"]').parent().hide();
				removeFromValidate('EditView','stage_c');
				$('div [data-label="LBL_STAGE"]').html('{$mod_strings['LBL_STAGE']}:');
				removeFromValidate('EditView','status');
				$('div [data-label="LBL_STATUS"]').html('{$mod_strings['LBL_STATUS']}:');
				removeFromValidate('EditView','hl');
				$('div [data-label="LBL_HL"]').html('{$mod_strings['LBL_HL']}:');	
				removeFromValidate('EditView','hl_id');
				$('div [data-label="LBL_HL"]').html('{$mod_strings['LBL_HL']}:');
				$("a#tab7").hide();
				$('div [data-label="LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE"]').parent().hide();
			});
			</script>
EOT;
		}
		// End of Code to hide the fields for existing Candidates who's type is "US Staffing" :: Modified BY Udaykiran Jun-04-2018
		$keySkill = $this->bean->keyskill_list;
		$keyskill_new = explode(",",$keySkill);
		
		if($keyskill_new[0] == '^.Net^') {			
			$keyskill_upper = strtoupper($keyskill_new[0]);			
		}	
		//Start code for State and Country DD
		
		$stateList = array();
		
		if (isset($app_list_strings['state_list'])) {
			$stateList = $app_list_strings['state_list'];
		}
		$stateList = json_encode($stateList);		
		if($id) {
			// $beanCandCountry = $this->bean->candcurrent_address_country;
			$beanPrimCountry = $this->bean->primary_address_country;
			$beanAltCountry = $this->bean->alt_address_country;
			// $curState = $this->bean->candcurrent_address_state;
			$primState = $this->bean->primary_address_state;
			$altState = $this->bean->alt_address_state;
			
			//Code to show the Candidate History button for Existing Candidates
			$activity= '<script>
				function activitylog()
				{				
					newwindow = window.open("index.php?module=vedic_Candidates&action=Activitylog&record='.$parentID.'");
					if (window.focus) {newwindow.focus()}
					return false;
				}
			</script>
			<input type = "button" onclick=activitylog(); id="candidate_history" value="Candidate History"/>';
			$this->ss->assign('CandidateHistory', $activity);
			
			//Code to show the selected keyskills for existed candidates
			$keySkill = str_replace('^,^',',',$keySkill);
			$keySkill = str_replace('^','',$keySkill);
			echo $js ="
			<script>
				var keyList = '$keySkill';
					setTimeout(function(){
						$('.key').val(keyList);
					},1000);
			</script>";
			/* Code to update role field value -By Lakshmi */
			$role = $this->bean->role_c;
			echo $js ="
				<script>
					var roleList = '$role';
					setTimeout(function(){
						$('.role').val(roleList);
					},1000);
				</script>";
			/* End of Code to update role field value -By Lakshmi */
			//Code to append the users to Feedback Given By list
			$commentsBy = '<select id="comments_by" name="comments_by" title>';
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
			
			//Query to fetch the user of latest modified feedback 
			$userName = "SELECT user_id FROM candidates_feedback WHERE date_modified=(SELECT MAX(date_modified) FROM candidates_feedback WHERE candidate_id ='$id')";
			$userNameResult = $db->query($userName);
			$userNameRes = $db->fetchByAssoc($userNameResult);
			$userID = $userNameRes['user_id'];
			echo $js = <<<EOT
				<script>
				$(document).ready(function(){
					setTimeout(function(){
						var userId = "$userID";
						$("#comments_by").val(userId);
					},1000);
				});
				</script>				 
EOT;
		}
		else
		{
			// $beanCandCountry = "";
			$beanPrimCountry = "";
			$beanAltCountry = "";
			$curState = "";
			$primState = "";
			$altState = "";
		}
		//End code for State and Country DD
		
		//multiple documents upload for the particular candidate  Created By Udaykiran On Sep-23-2017
		$node = '<input type="hidden" id="nodoc"  value="">';
		$uploadDocuments = "<script>

			function documentsPopup(){
				if(($('#nodoc').prop('tagName'))=='DIV'){
					$('#nodoc').replaceWith('".$node."');
				}
				newwindow=window.open('index.php?module=vedic_Candidates&action=Upload_Files&candidateid=".$this->bean->id."','Upload Documents','height=800,width=1200');

				if (window.focus) {newwindow.focus()}
				return false;
			}

		</script>            
		<input type='button' class = 'r_preview' value = 'Upload Documents' id = 'resume_preview' onclick='documentsPopup()'/><br/><br/>			
		<input type='hidden' id='nodoc'  value=''/>	            
		<input type='hidden' name='document_upload' id='document_upload' value='".$this->bean->documents_u."' title=''>";
		$this->ss->assign('UPLOADDOCUMENTS', $uploadDocuments);  
		//End of Udaykiran Code
		
		//style code added by ashwani - Oct-04-2016		
		echo '<style> 
			a:link {
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
			}
			#detailpanel_1 {
				background-color: #F5F6CE;
			}
			#detailpanel_2 {
				background-color: #F5F6CE;
			}
			#detailpanel_3 {
				background-color: #F5F6CE;
			}
			#detailpanel_4 {
				background-color: #F5F6CE;
			}
			#detailpanel_5 {
				background-color: #F5F6CE;
			}
			#detailpanel_6 {
				background-color: #F5F6CE;
			}
			#detailpanel_7 {
				background-color: #F5F6CE;
			}
			#detailpanel_8 {
				background-color: #FA8258;
			}
			#detailpanel_9 {
				background-color: #FA8258;
			}
			input#candidate_history{
				background-color: #ffffff;
				color: #e4820e !important;
				border-color: #e4820e !important;
				border-style: solid;
				border-width: 2px;	
			}
			input#candidate_history:hover{
				color: #fff !important;
				background-color: #e4820e !important;
			}			
			input#btn_view_change_log{
				background-color: #ffffff;
				color: #e4820e !important;
				border-color: #e4820e !important;
				border-style: solid;
				border-width: 2px;	
			}
			input#btn_view_change_log:hover{
				color: #fff !important;
				background-color: #e4820e !important;
			}
			input#relocation_c {
				margin-left: 55px;
			}
			input#resumepath {
				width: 113%;
			}
			input#phone_mobile {
				color: #0066a4 !important;
			}
			input.feedback_button{
				margin-left: 119px !important;
            }
			fieldset {
				border: 0px !important;
			}
		</style>
		<link rel="stylesheet" href="custom/vats/vedic_Common/intl-tel-input-10.0.0/build/css/intlTelInput.css">';
 	/*<script src="custom/vats/vedic_Common/tinymce/tinymce.js"></script>*/
		echo $js = <<<EOT
			<script src="custom/vats/vedic_Common/intl-tel-input-10.0.0/build/js/intlTelInput.js"></script>
		
			<script type="text/javascript">
			/**
			  * Function =>  tinyMCE.init()
			  * Created By => Udaykiran(Created On May-23-2017)
			  * Modified By => Udaykiran (Modified On Jun-01-2017)
			  * COMMENT => tinymce initialization,Updated the toolbars for tinymce
			  */
			// tinyMCE.init({
				// selector: '#resume_summary_c',
				// height: 350,
				// width : 745,
				// theme: 'modern',
				// paste_data_images: true, 
				// powerpaste_allow_local_images: true,
				// powerpaste_word_import: 'merge',
				// powerpaste_html_import: 'merge',
				// plugins: [
				// 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				// 'searchreplace wordcount visualblocks visualchars code fullscreen',
				// 'insertdatetime media nonbreaking save table contextmenu directionality',
				// 'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
				// ],
				// toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				// toolbar2: 'print preview media | forecolor backcolor emoticons | codesample|sizeselect | | fontselect |  fontsizeselect',
			// });
			/**
			  * Function => document.ready()
			  * Created By => Ashwani Tiwari (Created On Apr-12-2016)
			  * Modified By => Maneesha(Modified On June-12-2018)
			  * COMMENT => This function for Mobile number,Home Phone,Office Phone,Other Phone validation with 
			    country codes and flags and validations for Date Of Birth ,Proactive Marketing,Marketable Date fields visible only when the Stage is Billing.
			  */
			$(document).ready(function() {
				var keyskill= $("#keyskill_list").val();
				var canID = '$id';
				var type =$("#type_hiring").val();
				if(type == 'Us_staffing')
				{
					$('div [data-label="LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE"]').parent().hide();
					$('div [data-label="LBL_ROLE"]').parent().hide();
					$("a#tab7").hide();
					if(canID == ''){
						$('div [data-label="LBL_PRIMARY_MARKETER"]').parent().show();
						$('div [data-label="LBL_SECONDARY_MARKETER"]').parent().show();
						$('div [data-label="LBL_HIRER_1"]').parent().show();
						$('div [data-label="LBL_HIRER_2"]').parent().show();
						$('div [data-label="LBL_SLEAD"]').parent().show();
						$('div [data-label="LBL_SALES"]').parent().show();
						$('div [data-label="LBL_ML_1"]').parent().show();
						$('div [data-label="LBL_ML_2"]').parent().show();
						$('div [data-label="LBL_RL"]').parent().show();
						$('div [data-label="LBL_RECRUITER"]').parent().show();
					}
				}
				else{
					$('div [data-label="LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE"]').parent().show();
					$('div [data-label="LBL_ROLE"]').parent().show();
					$('div [data-label="LBL_PRIMARY_MARKETER"]').parent().hide();
					$('div [data-label="LBL_SECONDARY_MARKETER"]').parent().hide();
					$('div [data-label="LBL_HIRER_1"]').parent().hide();
					$('div [data-label="LBL_HIRER_2"]').parent().hide();
					$('div [data-label="LBL_SLEAD"]').parent().hide();
					$('div [data-label="LBL_SALES"]').parent().hide();
					$('div [data-label="LBL_ML_1"]').parent().hide();
					$('div [data-label="LBL_ML_2"]').parent().hide();
					$('div [data-label="LBL_RL"]').parent().hide();
					$('div [data-label="LBL_RECRUITER"]').parent().hide();
					$("a#tab7").show();
				}
				
				$("#type_hiring").change(function () {
					var type =$("#type_hiring").val();
					if(type == 'Us_staffing')
					{
						$('div [data-label="LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE"]').parent().hide();
						$('div [data-label="LBL_ROLE"]').parent().hide();
						$("a#tab7").hide();
						if(canID == ''){
							$('div [data-label="LBL_PRIMARY_MARKETER"]').parent().show();
							$('div [data-label="LBL_SECONDARY_MARKETER"]').parent().show();
							$('div [data-label="LBL_HIRER_1"]').parent().show();
							$('div [data-label="LBL_HIRER_2"]').parent().show();
							$('div [data-label="LBL_SLEAD"]').parent().show();
							$('div [data-label="LBL_SALES"]').parent().show();
							$('div [data-label="LBL_ML_1"]').parent().show();
							$('div [data-label="LBL_ML_2"]').parent().show();
							$('div [data-label="LBL_RL"]').parent().show();
							$('div [data-label="LBL_RECRUITER"]').parent().show();
						}
					}
					else{
						$('div [data-label="LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE"]').parent().show();
						$('div [data-label="LBL_ROLE"]').parent().show();
						$('div [data-label="LBL_PRIMARY_MARKETER"]').parent().hide();
						$('div [data-label="LBL_SECONDARY_MARKETER"]').parent().hide();
						$('div [data-label="LBL_HIRER_1"]').parent().hide();
						$('div [data-label="LBL_HIRER_2"]').parent().hide();
						$('div [data-label="LBL_SLEAD"]').parent().hide();
						$('div [data-label="LBL_SALES"]').parent().hide();
						$('div [data-label="LBL_ML_1"]').parent().hide();
						$('div [data-label="LBL_ML_2"]').parent().hide();
						$('div [data-label="LBL_RL"]').parent().hide();
						$('div [data-label="LBL_RECRUITER"]').parent().hide();
						$("a#tab7").show();
					}
				});
				if(!canID){
					$("button#vedic_Candidates0_email_widget_add").attr("style","visibility: hidden");
				}
				$("#keyskill_list").attr("style","height:125px");
				$("#vedic_Candidates0emailAddress0").change(function () {
					var reset = function() {
						$("#vedic_Candidates0emailAddress0").nextAll("div[class='required validation-message']").html("");
					};
					reset();
					var email = $("#vedic_Candidates0emailAddress0").val();
					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					if (filter.test(email)) {
						
						if(email == '') {
							$("button#vedic_Candidates0_email_widget_add").attr("style","visibility: hidden");
						}
						else {
							$("button#vedic_Candidates0_email_widget_add").attr("style","visibility: visible");
						}
					}
					else {
						// $('#vedic_Candidates0emailAddress0').html('{$mod_strings['LBL_EMAIL_ADDRESS']} : <font color="red">*</font>');    
						add_error_style('EditView', 'vedic_Candidates0emailAddress0', 'Invalid Value: Please Enter Valid Email' );
						$("button#vedic_Candidates0_email_widget_add").attr("style","visibility: hidden");
						$("#vedic_Candidates0emailAddress0").attr("style","background-color: white");
					}
				});
			
				$("#training_batch_c").attr("style","width:248px");
				var keyskill = '<?php $keyskill_upper;?>';
						
				var keyskill_new = keyskill.substr(keyskill.indexOf('<')+7);
				
				var keyskill_new1 = keyskill_new.substring(0, keyskill_new.indexOf(">") - 3);
				
				$("#keyskill_list option[value='"+keyskill_new1+"']").prop("selected", true);
				
				//Custom code for dynamic dropdown - state and country
				$("#located_c").attr('readonly', true);
				
				// var curLoc = $beanCurrentLocation;
				// var curStreet = $("#candcurrent_address_street").val();
				// var curCity = $("#candcurrent_address_city").val();
				// var curState = $("#candcurrent_address_state").val();
				
				// if((curStreet.length <= 0) && (curCity.length <= 0) && (curState.length <= 0))
				// {
					// $("#candcurrent_address_street").val(curLoc);
				// }
				
				// var curCountry = '$beanCandCountry', curState = '$curState';
				var primCountry = '$beanPrimCountry', primState = '$primState';
				var altCountry = '$beanAltCountry', altState = '$altState';			
				
				// populateCurrentStates(curCountry, curState,"candcurrent_address_state","candcurrent_address_country");
				populateCurrentStates(primCountry, primState,"primary_address_state","primary_address_country");
				populateCurrentStates(altCountry, altState,"alt_address_state","alt_address_country");
				
				function populateCurrentStates(country,state,field,countryField)
				{
					var states = populateStates(country);
					if(state)
					{
						$("#"+field).empty().append(states);
						$("#"+field).val(state);
					}
					else
					{
						var country = $("#"+countryField).val();
						if(country)
						{
							var states = populateStates(country);
							$("#"+field).empty().append(states);
						}
						else
						{
							$("#"+field).empty();
						}
					}
				}
				
				// $("#candcurrent_address_country").on('change', function() {
					// var countryVal = this.value, stateList = populateStates(countryVal);
					
					// $("#candcurrent_address_state").empty().append(stateList);
				// });
				$("#primary_address_country").on('change', function() {
					var countryVal = this.value, stateList = populateStates(countryVal);
					
					$("#primary_address_state").empty().append(stateList);
					if(primState)
					{
						$("#primary_address_state").val(primState);
					}
					if(altState)
					{
						$("#alt_address_state").val(altState);
					}
				});
				$("#alt_address_country").on('change', function() {
					var countryVal = this.value, stateList = populateStates(countryVal);
					
					$("#alt_address_state").empty().append(stateList);
					if(primState)
					{
						$("#primary_address_state").val(primState);
					}
					if(altState)
					{
						$("#alt_address_state").val(altState);
					}
				});				
				
				function populateStates(country)
				{
					var countryIndex = country.split("_"), matchString = "^"+countryIndex[0]+"_", stateOptions = [], stateList = '$stateList', stateList = $.parseJSON(stateList);					
				
					stateOptions.push('<option label="" value=""> </option>');
					$.each(stateList, function(key,value) {
						if((key).match(matchString))
							stateOptions.push('<option label="'+value+'" value="'+key+'">'+value+'</option>');
					});
					
					return stateOptions;
				}
				//End Custom code for dynamic dropdown - state and country
			
				$("#phone_mobile").intlTelInput({
					utilsScript: "custom/vats/vedic_Common/intl-tel-input-10.0.0/build/js/utils.js",
					autoPlaceholder: true,
					autoHideDialCode: true,
					nationalMode: false,
					initialCountry: "us",
					preferredCountries: ['us', 'in']
				});


				$("#phone_mobile").change(function () {

					var telInput = $("#phone_mobile"),
					errorMsg = $("#error-msg"),
					validMsg = $("#valid-msg");

					// initialise plugin
					telInput.intlTelInput({
					utilsScript: "../../build/js/utils.js"
					});

					var reset = function() {
						telInput.removeClass("error");
						errorMsg.addClass("hide");
						validMsg.addClass("hide");
					};

					// on blur: validate
					telInput.blur(function() {
						reset();
						if ($.trim(telInput.val())) {
							if (telInput.intlTelInput("isValidNumber")) {
								validMsg.removeClass("hide");
								$("#phone_mobile").nextAll("div[class='required validation-message']").html("");
							} else {
								telInput.addClass("error");
								errorMsg.removeClass("hide");
								if($("#phone_mobile").next().hasClass("required validation-message")){
									$(".flag-container").attr("style","height:30px");
									$("#phone_mobile").attr("style","color:#146495");
									$("#phone_mobile").next("div[class='required validation-message']").html("Enter a valid Mobile Number!!");
								} else {
									$(".flag-container").attr("style","height:30px");
									$("#phone_mobile").attr("style","color:#146495");
									$('#phone_mobile').html('{$mod_strings['LBL_PHONE_MOBILE']} : <font color="red">*</font>');	
									add_error_style('EditView', 'phone_mobile', 'Enter a valid Mobile Number!!');
								}
								return false;
							}
						}
					});
					// on keyup / change flag: reset
					telInput.on("keyup change", reset);
				});

				/**
				  * Modified By => Rajasekhar  (Modified On Jun-19-2018)
				  * COMMENT =>To display rating for communicationRating field
				  */
				
				$('#stars li').on('click', function(){
					var onStar = parseInt($(this).data('value'), 10); // The star currently selected
					
					var stars = $(this).parent().children('li.star');
					if(stars.length == onStar) {
						if($(stars[onStar-1]).attr('class').indexOf("selected") != -1) {
							for (i = 0; i < stars.length; i++) {
							  $(stars[i]).removeClass('selected');
							}
						}
						else {
							for (i = 0; i < stars.length; i++) {
							  $(stars[i]).removeClass('selected');
							}
							for (i = 0; i < onStar; i++) {
							  $(stars[i]).addClass('selected');
							}
						}
						$("#communication_rating").val(onStar);
					}
					else {
						if($(stars[onStar]).attr('class').indexOf("selected") != -1 || $(stars[onStar-1]).attr('class').indexOf("selected") == -1) {
							for (i = 0; i < stars.length; i++) {
							  $(stars[i]).removeClass('selected');
							}
							for (i = 0; i < onStar; i++) {
							  $(stars[i]).addClass('selected');
							}
							$("#communication_rating").val(onStar);
						}
						else {
							for (i = 0; i < stars.length; i++) {
							  $(stars[i]).removeClass('selected');
							  $("#communication_rating").val("0");
							}
						}
					}
					
				});
				setTimeout(function(){
					var rating = "$communicationRating"; 
					if(rating != '') {
						$('#stars li').removeClass("selected");
						$('#stars li:lt('+rating+')').addClass("selected");
					}
				}, 30);
				
				/**
				  * Modified By => Rajasekhar  (Modified On Jun-19-2018)
				  * COMMENT =>To display rating for functionrating field
				  */					
				$('#stars1 li').on('click', function(){
					var onStar1 = parseInt($(this).data('value'), 10);
					 var stars1 = $(this).parent().children('li.star');
					if(stars1.length == onStar1) {
						if($(stars1[onStar1-1]).attr('class').indexOf("selected") != -1) {
							for (i = 0; i < stars1.length; i++) {
							  $(stars1[i]).removeClass('selected');
							}
						}
						else {
							for (i = 0; i < stars1.length; i++) {
							  $(stars1[i]).removeClass('selected');
							}
							for (i = 0; i < onStar1; i++) {
							  $(stars1[i]).addClass('selected');
							}
						}
						$("#functional_rating").val(onStar1);
					}
					else {
						if($(stars1[onStar1]).attr('class').indexOf("selected") != -1 || $(stars1[onStar1-1]).attr('class').indexOf("selected") == -1) {
							for (i = 0; i < stars1.length; i++) {
							  $(stars1[i]).removeClass('selected');
							}
							for (i = 0; i < onStar1; i++) {
							  $(stars1[i]).addClass('selected');
							}
							$("#functional_rating").val(onStar1);
						}
						else {
							for (i = 0; i < stars1.length; i++) {
							  $(stars1[i]).removeClass('selected');
							}
							$("#functional_rating").val("0");
						}
					}
				});
				setTimeout(function(){
					var rating = "$functionalRating"; 
				    if(rating != '') {
						$('#stars1 li').removeClass("selected");
						$('#stars1 li:lt('+rating+')').addClass("selected");
					}
				}, 30);
				
				/**
				  * Modified By => Rajasekhar  (Modified On Jun-19-2018)
				  * COMMENT =>To display rating for evaluationRating field
				  */
					  
				$('#stars2 li').on('click', function(){
					var onStar2 = parseInt($(this).data('value'), 10);
					var stars2 = $(this).parent().children('li.star');
					if(stars2.length == onStar2) {
						if($(stars2[onStar2-1]).attr('class').indexOf("selected") != -1) {
							for (i = 0; i < stars2.length; i++) {
							  $(stars2[i]).removeClass('selected');
							}
						}
						else {
							for (i = 0; i < stars2.length; i++) {
							  $(stars2[i]).removeClass('selected');
							}
							for (i = 0; i < onStar2; i++) {
							  $(stars2[i]).addClass('selected');
							}
						}
						$("#evaluation_rating").val(onStar2);
					}
					else {
						if($(stars2[onStar2]).attr('class').indexOf("selected") != -1 || $(stars2[onStar2-1]).attr('class').indexOf("selected") == -1) {
							for (i = 0; i < stars2.length; i++) {
							  $(stars2[i]).removeClass('selected');
							}
							for (i = 0; i < onStar2; i++) {
							  $(stars2[i]).addClass('selected');
							}
							$("#evaluation_rating").val(onStar2);
						}
						else {
							for (i = 0; i < stars2.length; i++) {
							  $(stars2[i]).removeClass('selected');
							}
							$("#evaluation_rating").val("0");
						}
					}
				});
				setTimeout(function(){
					var rating = "$evaluationRating"; 
					if(rating != '') {
						$('#stars2 li').removeClass("selected");
						$('#stars2 li:lt('+rating+')').addClass("selected");
					}
				}, 30);				
				
				/**
				  * Modified By => Rajasekhar  (Modified On Jun-19-2018)
				  * COMMENT =>To display rating for technicalRating field
				  */					  
				$('#stars3 li').on('click', function(){
					var onStar3 = parseInt($(this).data('value'), 10);
					var stars3 = $(this).parent().children('li.star');
					if(stars3.length == onStar3) {
						if($(stars3[onStar3-1]).attr('class').indexOf("selected") != -1) {
							for (i = 0; i < stars3.length; i++) {
							  $(stars3[i]).removeClass('selected');
							}
						}
						else {
							for (i = 0; i < stars3.length; i++) {
							  $(stars3[i]).removeClass('selected');
							}
							for (i = 0; i < onStar3; i++) {
							  $(stars3[i]).addClass('selected');
							}
						}
						$("#technical_rating").val(onStar3);
					}
					else {
						if($(stars3[onStar3]).attr('class').indexOf("selected") != -1 || $(stars3[onStar3-1]).attr('class').indexOf("selected") == -1) {
							for (i = 0; i < stars3.length; i++) {
							  $(stars3[i]).removeClass('selected');
							}
							for (i = 0; i < onStar3; i++) {
							  $(stars3[i]).addClass('selected');
							}
							$("#technical_rating").val(onStar3);
						}
						else {
							for (i = 0; i < stars3.length; i++) {
							  $(stars3[i]).removeClass('selected');
							}
							$("#technical_rating").val("0");
						}
					}
				});
				setTimeout(function(){
					var rating = "$technicalRating"; 
					if(rating != '') {
						$('#stars3 li').removeClass("selected");
						$('#stars3 li:lt('+rating+')').addClass("selected");
					}
				}, 30);				
			});
			
			//Below Code call from defaultresume.php, 
			//After resume parsed, it will strock a key hit on mbile num. field for validation:: added By Vaibhav :: Apr-13-2017
			//Modified By - Uday Apr-13-2017
			
			window.mobileNumberSet = function () {		
				$("#phone_mobile").keyup();	
				var mob=$('#phone_mobile').val();
				if(mob.includes('+')||(mob=='')){			

				}
				else{
					var mob1="+1 "+mob;
					$('#phone_mobile').val(mob1);
					$("#phone_mobile").keyup();	
				}
			}
			//Development Code ends for Rajasekhar Reddy   
			$("#resumepath").change(function() {
				
				var status = $("#resumepath").val();
				var file_data = $('#resumepath').prop('files')[0];
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				
				$.ajax({
				url: 'Candidate.php', // point to server-side PHP script 
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,                         
				type: 'post',
				success: function(data){
					 var divs = data.split('@@@');
					 $('#phone_mobile').replaceWith('<input type="text" name="phone_mobile" id="phone_mobile" size="30" maxlength="100" value="'+divs[2]+'" title="" tabindex="0" class="phone">');
					 
					 $('#vedic_Candidates0emailAddress0').replaceWith('<input type="text" name="vedic_Candidates0emailAddress0" id="vedic_Candidates0emailAddress0" tabindex="0" size="30"  value="'+divs[1]+'" title="primary email address">');
				 
					$('#description').replaceWith('<textarea id="description" name="description" rows="6" cols="80" title="" tabindex="0" >'+divs[0]+'</textarea>');
					 
					$('#last_name').replaceWith('<input type="text" name="last_name" id="last_name" size="30" maxlength="100" value="'+divs[4]+'" title="">');
					
					$('#first_name').replaceWith('<input accesskey="7" tabindex="0" name="first_name" id="first_name" size="25" maxlength="25" type="text" value="'+divs[3]+'">');
					}
				});
			});
			/**
			  * Function =>  check_form()
			  * Modified By => Maneesha(Modify On July-25-2017)
			  * COMMENT => adding the custom function to validate the marketable date once candidate available for 	 
			    marketing,date of birth,Mobile Number,Office Phone,Other Phone,Home Phone Displays all error messages at after header,footer cancel buttons
				and To check the duplicate candidates.
			  */
	
			function check_form(formname){
				var key=$(".key").val();
				$("#keyskill_list").val(key);
				var site_url = "$sugar_config[site_url]";
				var beanId = "$id";
				var duplicateUrl;
				var duplicate_url;
				var firstname = $("#first_name").val();
				var lastname = $("#last_name").val();
				var phone = $("#phone_mobile").val();
				var dob = $("#dob").val();
				var email1 = $("#vedic_Candidates0emailAddress0").val();
				var primarymail = $('input[name="vedic_Candidates0emailAddressPrimaryFlag"]:checked').val();
				$.ajax({
					type: "POST",
					dataType:"text",
					url: "index.php?entryPoint=checkduplicate",
					async: false,
					data: {beanId:beanId,firstname:firstname, lastname:lastname, phone:phone ,dob:dob,email1:email1 },
					success : function(data) {
						duplicateUrl = $.trim(data);
					},
				});
				
				if(duplicateUrl!='') {
					$(".message").remove();
					var duplicate_url = duplicateUrl.split("----");
					var duplicate_record = site_url+"/index.php?module=vedic_Candidates&action=DetailView&record="+duplicateUrl;
					$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>Candidate already Existed!! Here is the link to see the duplicate record <a href='"+duplicate_record+"' target='_blank'>Duplicate Record</a></div>");
					//$("#SAVE_FOOTER").before("<div class='message' id='valid_header' style='color:red'>Candidate already Existed!! Here is the link to see the duplicate record <a href='"+duplicate_record+"' target='_blank'>Duplicate Record</a></div>");
					
					return false;
				}
		
				setTimeout(function(){
					var i=0;
					$(".message").remove();
					var testdata1 = [];
					$('.validation-message').each(function() {
						testdata1[i++] = $(this).html();
					});
						errormessages = jQuery.unique( testdata1 );
						var j;
						for (j = 0; j < errormessages.length; ++j) {
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>"+errormessages[j]+"</div>");
						}
					if(!primarymail)
					{
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>Mark atleast one email address as primary</div>");
					}
							
				}, 30);
				
				/**  
				  * Modified By => Rajasekhar Reddy (Modified On Sep-22-2017)
				  * COMMENT => validation for DOB based on user prefarences
				  */
				
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var date=$("#dob").val();
				var date1 = date.includes("/");
				var date2 = date.includes("-");
				var date3 = date.includes(".");
				if(date1 == true) {
					var year=date.split("/");
					var dob;
					for(var i=0;i<year.length;i++) {
						if(year[i].length == 4)	{
							dob = year[i];
						}
					}
					if(date==0) {
						$("#dob").nextAll("div[class='required validation-message']").html("");
					}
					else {
						if((d.getFullYear()-dob)>=18) {
							$("#dob").nextAll("div[class='required validation-message']").html("");
						} else {	
							if($("#dob").next().next().hasClass("required validation-message")){
								$("#dob").next().next("div[class='required validation-message']").html("Date Of Birth Must be greater than 18 years!!");
							} else {
								$('#dob').html('{$mod_strings['LBL_DOB']} : <font color="red">*</font>');	
								add_error_style('EditView', 'dob', 'Date Of Birth Must be greater than 18 years!!');
							}
							return false;
						}
					}
				}
				else if(date2 == true) {
					var year=date.split("-");
					var dob;
					for(var i=0;i<year.length;i++) {
						if(year[i].length == 4)	{
							dob = year[i];
						}
					}
					if(date==0) {
						$("#dob").nextAll("div[class='required validation-message']").html("");
					}
					else{
						if((d.getFullYear()-dob)>=18){
							$("#dob").nextAll("div[class='required validation-message']").html("");
						} else {	
							if($("#dob").next().next().hasClass("required validation-message")) {
								$("#dob").next().next("div[class='required validation-message']").html("Date Of Birth Must be greater than 18 years!!");
							} else {
								$('#dob').html('{$mod_strings['LBL_DOB']} : <font color="red">*</font>');	
								add_error_style('EditView', 'dob', 'Date Of Birth Must be greater than 18 years!!');
							}
							return false;
						}
					}
				}
				else {
					var year=date.split(".");
					var dob;
					for(var i=0;i<year.length;i++) {
						if(year[i].length == 4) {
							dob = year[i];
						}
					}
					if(date==0) {
						$("#dob").nextAll("div[class='required validation-message']").html("");
					}
					else {
						if((d.getFullYear()-dob)>=18) {
							$("#dob").nextAll("div[class='required validation-message']").html("");
						} else {	
							if($("#dob").next().next().hasClass("required validation-message")){
								$("#dob").next().next("div[class='required validation-message']").html("Date Of Birth Must be greater than 18 years!!");
							} else {
								$('#dob').html('{$mod_strings['LBL_DOB']} : <font color="red">*</font>');	
								add_error_style('EditView', 'dob', 'Date Of Birth Must be greater than 18 years!!');
							}
							return false;
						}
					}
				}
				/* End of DOB based on user prefarences */
		
				var telInput = $("#phone_mobile"),
				errorMsg = $("#error-msg"),
				validMsg = $("#valid-msg");

				// initialise plugin
				telInput.intlTelInput({
					utilsScript: "../../build/js/utils.js"
				});

				var reset = function() {
					telInput.removeClass("error");
					errorMsg.addClass("hide");
					validMsg.addClass("hide");
				};

				// on blur: validate
				reset();
				if ($.trim(telInput.val())) {
					if ((telInput.intlTelInput("isValidNumber"))) {
						validMsg.removeClass("hide");
						$("#phone_mobile").nextAll("div[class='required validation-message']").html("");
					} else {
						telInput.addClass("error");
						errorMsg.removeClass("hide");
						if($("#phone_mobile").next().hasClass("required validation-message")){
							$(".flag-container").attr("style","height:30px");
							$("#phone_mobile").attr("style","color:#146495");
							$("#phone_mobile").next("div[class='required validation-message']").html("Enter a valid Mobile Number!!");
						} else {
							$(".flag-container").attr("style","height:30px");
							$("#phone_mobile").attr("style","color:#146495");
							$('#phone_mobile').html('{$mod_strings['LBL_PHONE_MOBILE']} : <font color="red">*</font>');	
							add_error_style('EditView', 'phone_mobile', 'Enter a valid Mobile Number!!');
						}
						return false;
					}
				}

				bValid = false;
				if(typeof(siw)!='undefined'&&siw&&typeof(siw.selectingSomething)!='undefined'&&siw.selectingSomething) return false;
				bValid = validate_form(formname,'');
				if(!bValid) return false;
				
				if($('#is_marketable_c').is(':checked')){
					if($('#marketable_date').val() == ""){
						alert('Marketable Date is required when enabling "Marketable" !!');
						return false;
					}
				}
				return true;    
			}
		</script>
EOT;
	
		// shows ssn
		$ssn = substr($this->bean->ssn_c, -4);
		$ss_n = '<input type="text" name="ssn_c" id="ssn_c" value="'.$ssn.'" title="">';
		$this->ss->assign("ss_n",$ss_n);
		
		//sell rate
		$sellrate = '$<input type="text" name="sell_rate_hr_c" id="sell_rate_hr_c" value="'.$this->bean->sell_rate_hr_c.'" min="1" max="1000" size=10 step="0.5" >/Hr';
		$this->ss->assign("sellrate",$sellrate);		
		
		$upload_button = '
			<script>
			function showPopup(){
				newwindow=window.open("index.php?entryPoint=parsing&candidateid='.$this->bean->id.'","Upload Resume","height=400,width=400");
				
				if (window.focus) {newwindow.focus()}
				return false;
			}
			</script>			
			<button type="button" id="uploadresume"  onclick="showPopup()" style="width:98px;height:18px">ChooseResume</button>		
			
			<input type="hidden" name="resumesearch" id="resumesearch" value="'.$this->bean->resumesearch.'" title="">			
			<input type="text" name="resumepath" id="resumepath" size="13" maxlength="255" value="'.$this->bean->resumepath.'" title="">';
			
		$this->ss->assign("UPLOADBUTTON",$upload_button);

		$is_consultant = false;
		if($_GET['is_consultant']!=''){
			$is_consultant = $_GET['is_consultant'];
		}
		//exit($is_consultant."xx");
		$isConsultant_field = '<input type="hidden" name="is_consultant_c" id="is_consultant_c" value="'.$is_consultant.'" title="">';
		$this->ss->assign('ISCONSULTANT', $isConsultant_field);

		/**
	      * FUNCTION =>check_form
	      * ARGUMENT => formname
	      * Modified By => LakshmiGayathri(Modified On Sep-11-2017)
	      * COMMENT => Alert message when candidate is converted to consultant
	      */
		if (isset($_GET['is_consultant'])) { 
			if($_GET['is_consultant'] == true) {
				$firstname = $this->bean->first_name;
				$lastname = $this->bean->last_name;
				$fullname= $firstname." ".$lastname;

				$qury= "SELECT email_addresses.email_address from vedic_candidates inner join email_addr_bean_rel on vedic_candidates.id= email_addr_bean_rel.bean_id inner join email_addresses on email_addr_bean_rel.email_address_id=email_addresses.id where vedic_candidates.id='".$this->bean->id."'";

				$rslt = $GLOBALS['db']->query($qury, false);
				while (($email=$GLOBALS['db']->fetchByAssoc($rslt)) != null) {    
					$emailaddress=implode($email);
				}
				echo $js = <<<EOT
				<script>
					function check_form(formname)
					{
						var email= $('#vedic_Candidates0emailAddress0').val();
						setTimeout(function(){
							var i=0;
							$(".message").remove();
							$('.validation-message').each(function() {
								testdata = $(this).html();
								$("#SAVE").before("<div class='message' id='valid_footer' style='color:red'>"+testdata+"</div>");
								//$("#SAVE_HEADER").before("<div class='message' id='valid_header' style='color:red'>"+testdata+"</div>");
							});
						}, 30);
						bValid = false;
						if(typeof(siw)!='undefined'&&siw&&typeof(siw.selectingSomething)!='undefined'&&siw.selectingSomething) return false;
						bValid = validate_form(formname,'');
						if(!bValid) return false;
						$("#consultant_username").text(email);		  
						$("#consultant_password").text("qwerty123");
						$("#myModal").modal();
						return true;
					}
				</script>
EOT;
			}
		}
		# end of the code for candidate is converted to consultant
?>
    <script  src="custom/vats/vedic_Common/RatingExample/js/index.js"></script>
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
		</div>
		<input type="hidden" name="communication_rating" id="communication_rating" value="'.$this->bean->communication_rating.'" title="">';
		$this->ss->assign('COMMUNICATIONRATING', $communication_rating);
?>
    <script  src="custom/vats/vedic_Common/RatingExample/js/index1.js"></script>
<?php		
		$functional_rating = '<div class="rating-stars text-center">
			<ul id="stars1">'.$stars.'</ul>
		</div>
		<input type="hidden" name="functional_rating" id="functional_rating" value="'.$this->bean->functional_rating.'" title="">';
		$this->ss->assign('FUNCTIONALRATING', $functional_rating);
?>
	<script  src="custom/vats/vedic_Common/RatingExample/js/index2.js"></script>
<?php		
		$evaluation_rating = '<div class="rating-stars text-center">
			<ul id="stars2">'.$stars.'</ul>
		</div>
		<input type="hidden" name="evaluation_rating" id="evaluation_rating" value="'.$this->bean->evaluation_rating.'" title="">';
		$this->ss->assign('EVALUATIONRATING', $evaluation_rating);
?>
	<script  src="custom/vats/vedic_Common/RatingExample/js/index3.js"></script>
<?php		
		$technical_rating = '<div class="rating-stars text-center">
			<ul id="stars3">'.$stars.'</ul>
		</div>
		<input type="hidden" name="technical_rating" id="technical_rating" value="'.$this->bean->technical_rating.'" title="">';
		$this->ss->assign('TECHNICALRATING', $technical_rating);
		echo '<link href="custom/vats/vedic_Common/jquery-flexdatalist-2.2.4/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
		<script src="custom/vats/vedic_Common/jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script>';
		$keySkills = $GLOBALS['app_list_strings']['keyskill_list'];
		$flexData = "<input type='text' placeholder='Enter Keyskills'
						class='flexdatalist key'
						data-min-length='0'
						multiple='multiple'
						data-toggle-selected='true'
						data-search-contain='true'
						list='keySkills'
						name='keyskill_list'
						id ='keyskill_list'>
						
						<datalist id='keySkills'>";
						foreach($keySkills as $k=>$v){
							$flexData .= "	<option value='".$v."' >".$v."</option>";
						}
						$flexData .= "</datalist>";
		$this->ss->assign('flexdata', $flexData);
	    /* Code for changing role field from dropdown to datalist - By Lakshmi */
		$role = $GLOBALS['app_list_strings']['SAP_consultant_level_list'];
		$roleType = "<input type='text' placeholder='Enter Role'
					class='flexdatalist role'
					data-min-length='0'
					data-toggle-selected='true'
					data-search-contain='true'
					list='role'
					name='role_c'
					id ='role_c'>
					<datalist id='role'>";
					foreach($role as $k=>$v) {
						$roleType.= "<option value='".$v."' >".$v."</option>";
					}
		$roleType .= "</datalist>";
		$this->ss->assign('role', $roleType);
		/* End of Code for changing role field from dropdown to datalist - By Lakshmi */
		echo $javascript = <<<EOT
		<script>
			$(document).ready(function() {
				var type =$("#type_hiring").val();
				keySkillChange(type);
				$("#type_hiring").change(function() {
					var type =$("#type_hiring").val();
					keySkillChange(type);
				});
			});
			function keySkillChange(type){
				$.ajax({
					type: "POST",
					dataType:"text",
					url: "index.php?entryPoint=keyskills_list",
					async: false,
					data: {type:type},
					success : function(data) {
						$('#keySkills').replaceWith(data);
					},
				});
			}
		    $('.key').flexdatalist({
				toggleSelected: true,
				searchContain:true,
				minLength: 0
			});	
			$('.role').flexdatalist({
				toggleSelected: true,
				searchContain:true,
				minLength: 0
			});
		</script>
EOT;
		parent::display();
 	}
}
?>