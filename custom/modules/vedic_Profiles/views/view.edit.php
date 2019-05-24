<?php
/**
  * FileName => view.edit.php
  * Created By => Udaykiran (Created On Feb-05-2018)
  * Modified By => Udaykiran (Modified On May-24-2018)
  * COMMENT =>custom edit view for profiles add css for viewchangelog
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class vedic_ProfilesViewEdit extends ViewEdit
{
 	function vedic_ProfilesViewEdit()
	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 	}
 	
 	function display()
	{
		//Start code for State and Country DD Feb-07-2018::By Maneesha
		global $db,$sugar_config,$app_list_strings,$mod_strings;
		
		$beanID = $this->bean->id;
		/* Code to update technology field value -By Maneesha */
		if($beanID) {
			$keySkill = $this->bean->technology_c;
			echo $js ="
				<script>
					var keyList = '$keySkill';
					setTimeout(function(){
						$('.flexdatalist').val(keyList);
					},1000);
				</script>";
		}
		/* End of Code to update technology field value -By Maneesha */
		
		//Code for auto populate the Mobile Phone,Email from Candidates :: Added by Udaykiran 23-May-2018
		$candidateID = $this->bean->vedic_candidates_vedic_profiles_1vedic_candidates_ida;
		if(empty($candidateID))
		$candidateID = $_REQUEST['vedic_candidates_id'];
		if(empty($candidateID))
		$candidateID = $_REQUEST['vedic_candidates_vedic_profiles_1vedic_candidates_ida'];		
		if($candidateID!='' && $beanID =='') {
			require_once('include/utils.php');
			require_once('modules/vedic_Candidates/vedic_Candidates.php');
			$candObj = new vedic_Candidates();
			$candObj->retrieve($candidateID);
			$this->bean->phone_mobile = $candObj->phone_mobile;
			$this->bean->email_c = $candObj->email1;
		}
		if($candidateID!='' && $beanID !='') {
			require_once('include/utils.php');
			require_once('modules/vedic_Candidates/vedic_Candidates.php');
			$candObj = new vedic_Candidates();
			$candObj->retrieve($candidateID);

			if($this->bean->phone_mobile == '')
				$this->bean->phone_mobile = $candObj->phone_mobile;
			if($this->bean->email_c == '')
				$this->bean->email_c = $candObj->email1;
		}
		//End of Udaykiran code
		//Start code for State and Country DD Feb-07-2018::By Maneesha
		$beanCurrentLocation = json_encode($this->bean->location_c);
		
		$stateList = array();
		
		if (isset($app_list_strings['state_list'])) {
			$stateList = $app_list_strings['state_list'];
		}
		$stateList = json_encode($stateList);
		
		if($beanID) {
			$beanPrimCountry = $this->bean->primary_address_country;
			$beanAltCountry = $this->bean->alt_address_country;
			$curState = $this->bean->candcurrent_address_state;
			$primState = $this->bean->primary_address_state;
			$altState = $this->bean->alt_address_state;
		}
		else {
			$beanPrimCountry = "";
			$beanAltCountry = "";
			$curState = "";
			$primState = "";
			$altState = "";
		}
		//End code for State and Country DD Feb-07-2018::By Maneesha
		$canID = $_REQUEST['vedic_candidates_id'];
		if($canID=='') {
			$canID = $this->bean->vedic_candidates_vedic_profiles_1vedic_candidates_ida;
		}
		$query = $db->query("SELECT count(*) as ct, id_c ,
							vedic_profiles_cstm.status_c as Status
							FROM vedic_profiles_cstm 
							INNER join vedic_profiles 
								on vedic_profiles.id = vedic_profiles_cstm.id_c
							INNER join vedic_candidates_vedic_profiles_1_c as vcp 
								on vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb= vedic_profiles.id 
							WHERE vedic_profiles.deleted=0 
							AND vedic_profiles_cstm.stage_c='Billing' 
							AND vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida ='".$canID."'
							AND vcp.deleted=0 group by status_c");
		
		$result = $db->fetchByAssoc($query);
		
		$count= $result['ct'];
		$status= $result['Status'];
		if (!empty($_REQUEST['vedic_candidates_id'])) {
			$query = $db->query("SELECT first_name,last_name FROM vedic_candidates WHERE id ='$canID' AND deleted=0 ");
			$result = $db->fetchByAssoc($query);
			$canFNAME = trim($result['first_name']);
			$canLNAME = trim($result['last_name']);
		}
		
		//multiple documents upload for the particular profiles  Created By Udaykiran On Feb-15-2018
		$node = '<input type="hidden" id="nodoc"  value="">';
		$uploadDocuments = "<script>
			
			function documentsPopup(){
				if(($('#nodoc').prop('tagName'))=='DIV'){
					$('#nodoc').replaceWith('".$node."');
				}
				newwindow=window.open('index.php?module=vedic_Profiles&action=Upload_Files','Upload Documents','height=800,width=1200');

				if (window.focus) {newwindow.focus()}
				return false;
			}

		</script>            
		<input type='button' class = 'r_preview' value = 'Upload Documents' id = 'resume_preview' onclick='documentsPopup()'/><br/><br/>			
		<input type='hidden' id='nodoc'  value=''/>	            
		<input type='hidden' name='document_upload' id='document_upload' value='".$this->bean->documents_u."' title=''>";
		$this->ss->assign('UPLOADDOCUMENTS', $uploadDocuments);  
		// End of Udaykiran Code
		echo '<style></style><link rel="stylesheet" href="custom/vats/vedic_Common/intl-tel-input-10.0.0/build/css/intlTelInput.css">';
		echo $js = <<<EOT
		<script src="custom/vats/vedic_Common/intl-tel-input-10.0.0/build/js/intlTelInput.js"></script>
		<script>
			$(document).ready(function() {
				    var stage = $('#stage_c').val();
					var status = $('#status_c').val();
					if((stage == 'Billing') && ((status == 'Active')|| (status == 'Active/Project2' ))){
						addToValidate('EditView','vedic_profiles_project_1_name','varchar',true,'{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']}');
			            $('div [data-label="LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE"]').html('{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']} : <br/><span class="required">*</span>');
					}
					else {
						removeFromValidate('EditView','vedic_profiles_project_1_name');
						$('div [data-label="LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE"]').html('{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']}: ');
					} 
				//Code to Make the candidates field is readonly Feb-07-2018::By Udaykiran
				if(stage == 'Billing' && status == 'Active') {
					$("select option[value*='Billing']").prop('disabled',false);
					$("select option[value*='Hiring']").prop('disabled',true);
					$("select option[value*='Hired']").prop('disabled',true);
					$("select option[value*='Marketing']").prop('disabled',true);
					$("select option[value*='H1B1']").prop('disabled',true);
					$("select option[value*='Training']").prop('disabled',true);
					$("select option[value*='Premarketing']").prop('disabled',true);
				}
				
				$("#vedic_candidates_vedic_profiles_1_name").attr('readonly', true);
				$("#btn_vedic_candidates_vedic_profiles_1_name,#btn_clr_vedic_candidates_vedic_profiles_1_name").prop('disabled',true);
				//Custom code for dynamic dropdown - state and country Feb-07-2018::By Maneesha
				
				// $("#location_c").attr('readonly', true);

				$("#status_c option[value='Active/Project2']").prop('disabled',true);
				var count = "$count";
				var status = "$status";
				if(count >0){
					if(status =='Active'){
						$("#status_c option[value='Active/Project2']").prop('disabled',false);
					}
					if(status =='Active/Project2'){
						$("#status_c option[value='Active/Project2']").prop('disabled',true);
					}
				}

				var primCountry = '$beanPrimCountry', primState = '$primState';
				var altCountry = '$beanAltCountry', altState = '$altState';			
				
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
				$("#stage_c,#status_c").on('change',function(){
					var stage = $('#stage_c').val();
					var status = $('#status_c').val();
					if((stage == 'Billing') && ((status == 'Active')|| (status == 'Active/Project2' ))){
						addToValidate('EditView','vedic_profiles_project_1_name','varchar',true,'{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']}');
			            $('div [data-label="LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE"]').html('{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']} : <br/><span class="required">*</span>');
					}
					else {
						removeFromValidate('EditView','vedic_profiles_project_1_name');
						$('div [data-label="LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE"]').html('{$mod_strings['LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE']}: ');
					} 
				});	
				
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
				//End Custom code for dynamic dropdown - state and country Feb-07-2018::By Maneesha
				
				//Mobile Phone Validation Code May-17-2018::By Udaykiran
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
				//End of Mobile Phone Validation Code May-17-2018::By Udaykiran
				//Email Address validation code May-17-2018::By Udaykiran
				$('#email_c').change(function() {
					var to = $('#email_c').val();
					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
						
					if(to==''){
						$("#email_c").nextAll("div[class='required validation-message']").html("");
					} else{
						if (filter.test(to)) {
							$("#email_c").nextAll("div[class='required validation-message']").html("");
								
						} else {	
							if($("#email_c").next().hasClass("required validation-message")){
								$("#email_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
							} else {
								$('#email_c').html('{$mod_strings["LBL_EMAIL"]} : <font color="red">*</font>');	
								add_error_style('EditView', 'email_c', 'Enter a valid Email Address!!');
							}
							return false;
						}
					}
				});
				//End of Email Address validation code May-17-2018::By Udaykiran
			});
			function getProject(){
				var values;
				var project_id = $("#vedic_profiles_project_1project_idb").val();
				if(project_id!='')
				{
					$.ajax({
						type: "POST",
						url: "index.php?entryPoint=getProjectData",
						async: false,
						data: {project_id:project_id},
						success : function(data) {
							values = data;
							var v = values.split('---');
							var startDate = v[0];
							var endDate =v[1];
							var chName = v[2];
							var poEnd = v[3];
							var eDate = endDate.split('-');
							var sDate = startDate.split('-');
							var poDate = poEnd.split('-');
							$("#project_start_date_c").val(sDate[1]+"/"+sDate[2]+"/"+sDate[0]);
							$("#project_end_date_c").val(eDate[1]+"/"+eDate[2]+"/"+eDate[0]);
							$("#po_end_date_c").val(poDate[1]+"/"+poDate[2]+"/"+poDate[0]);
							$("#channel_client_c").val(chName);
							$("#project_start_date_c").prop('readOnly',true);
							$("#project_end_date_c").prop('readOnly',true);
							$("#channel_client_c").prop('readOnly',true);
						},
					});
				}
			}
			function check_form(formname){
				var parent_id = "$canID";
				var site_url = "$sugar_config[site_url]";
				var beanId = $('[name="record"]').val();
				var duplicateUrl;
				var duplicate_url;
				var stage = $("#stage_c").val();
				var status = $("#status_c").val();
				var parent_id = $("#vedic_candidates_vedic_profiles_1vedic_candidates_ida").val();
				$.ajax({
					type: "POST",
					dataType:"text",
					url: "index.php?entryPoint=checkduplicateprofile",
					async: false,
					data: {beanId:beanId,stage:stage, status:status,parent_id:parent_id},
					success : function(data) {
						duplicateUrl = $.trim(data);
					},
				});
				if(duplicateUrl!='') {
					var values = duplicateUrl.split('---');
					var proId = values[0];
					var status_new = values[1];
					if(stage=='Marketing' && status!=status_new) {
						$(".message").remove();
						var duplicate_record = site_url+"/index.php?module=vedic_Profiles&action=DetailView&record="+proId;
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>Profile already Existed with stage='Marketing' and Status='"+status_new+"'.Cannot create the profile with stage='Marketing' and Status='"+status+"'<a href='"+duplicate_record+"' target='_blank'>Review Profile</a></div>");
						return false;
					}
					if(stage=='Billing' && status!=status_new) {
						$(".message").remove();
						var duplicate_record = site_url+"/index.php?module=vedic_Profiles&action=DetailView&record="+proId;
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>Profile already Existed with stage='Billing' and Status='"+status_new+"'.Cannot create the profile with stage='Billing' and Status='"+status+"'<a href='"+duplicate_record+"' target='_blank'>Review Profile</a></div>");
						return false;
					}
					if(beanId=='') {
						$(".message").remove();
						var duplicate_record = site_url+"/index.php?module=vedic_Profiles&action=DetailView&record="+proId;
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>Profile already Existed with this stage and status!! Here is the link to see the duplicate record <a href='"+duplicate_record+"' target='_blank'>Duplicate Profile</a></div>");
						return false;
					}
				}
				
				setTimeout(function(){
					var i=0;
					$(".message").remove();
					$('.validation-message').each(function() {
						testdata = $(this).html();
						
						$("#SAVE").before("<div class='message' id='valid_header' style='color:red'>"+testdata+"</div>");
					});
				}, 30);
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
				var to = $('#email_c').val();
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					
				if(to==''){
					$("#email_c").nextAll("div[class='required validation-message']").html("");
				} else{
					if (filter.test(to)) {
						$("#email_c").nextAll("div[class='required validation-message']").html("");
							
					} else {	
						if($("#email_c").next().hasClass("required validation-message")){
								
								$("#email_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
						} else {
							$('#email_c').html('{$mod_strings["LBL_EMAIL"]} : <font color="red">*</font>');	
							add_error_style('EditView', 'email_c', 'Enter a valid Email Address!!');
						}
						return false;
					}
				}
				
				bValid = false;
				if(typeof(siw)!='undefined'&&siw&&typeof(siw.selectingSomething)!='undefined'&&siw.selectingSomething) return false;
				bValid = validate_form(formname,'');
				if(!bValid) return false;
				
				return true;
			}
		</script>
EOT;
 echo '<style> 
			input#btn_view_change_log{
			background-color: #ffffff;
			color: #e4820e !important;
			border-color: #e4820e !important;
			border-style: solid;
			border-width: 2px;	}
			input#btn_view_change_log:hover{
			color: #fff !important;
			background-color: #e4820e !important;	}
			.email-address-input-group .email-address-remove-button {
				padding: 6px 9px 6px 9px;
				margin-right: 56px !important;
			}
			[data-label="LBL_VEDIC_PROFILES_PROJECT_1_FROM_PROJECT_TITLE"] {		
				margin-top: 17px;		
			}
		</style>';
		/* Code for changing technology filed from dropdown to datalist - By Maneesha */
		echo '<link href="custom/vats/vedic_Common/jquery-flexdatalist-2.2.4/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
		<script src="custom/vats/vedic_Common/jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script>'; 
		$keySkills = $GLOBALS['app_list_strings']['keyskill_list'];
		$technology = "<input type='text' placeholder='Enter Technology'
					class='flexdatalist'
					data-min-length='0'
					data-toggle-selected='true'
					data-search-contain='true'
					list='keyskills'
					name='technology_c'
					id ='technology_c'>
					<datalist id='keyskills'>";
					foreach($keySkills as $k=>$v) {
						$technology .= "<option value='".$v."' >".$v."</option>";
					}
		$technology .= "</datalist>";
		$this->ss->assign('technology', $technology);
		echo $javaScript = <<<EOT
		<script>
			$('.flexdatalist').flexdatalist({
				toggleSelected: true,
				searchContain:true,
				minLength: 0
			});	
		</script>
EOT;
	/* End of Code for changing technology filed from dropdown to datalist - By Maneesha */
		parent::display();
 	}
}