<?php
/**		
  * FileName => view.edit.php		
  * Created By => Ashwani (Created On Apr-03-2017)		
  * Modified By =>  Udaykiran(Modified on Apr-29-2018)
  * COMMENT => Custom edit view code of submissions module	
  */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class vedic_SubmissionsViewEdit extends ViewEdit{
	function vedic_SubmissionsViewEdit(){
		parent::ViewEdit();
	}
	/**
	  * Function => display()
	  * Created By => Ashwani (Created On Apr-03-2017)
	  * Modified By => Udaykiran (Modified On Nov-04-2017)
	  * COMMENT => code for tinymce,email validations,auto populate data to tinymce from selected job,candidate
	  * COMMENT => added the default font and color
      * COMMENT => Added the conditions for the profiles module
	  */
	function display(){
		if (isset($this->bean->id)) {
			$this->ss->assign("FILE_OR_HIDDEN", "hidden");
			if (empty($_REQUEST['isDuplicate']) || $_REQUEST['isDuplicate'] == 'false') {
				$this->ss->assign("DISABLED", "disabled");
			}
		} else {
			$this->ss->assign("FILE_OR_HIDDEN", "file");
		}
	
		global $current_user,$app_list_strings,$mod_strings;
		$current_user_id = $current_user->id;
		$id = $this->bean->id;

		// Auto populate email and signature when submitting
		echo $js_validation = <<<jscript
		
		<script src="custom/vats/vedic_Common/tinymce/tinymce.js"></script>
		<script>
		tinyMCE.init({
			selector: '#signature_c',
			height: 400,
			width : 745,
			theme: 'modern',
			paste_data_images: true, 
			powerpaste_allow_local_images: true,
			powerpaste_word_import: 'merge',
			powerpaste_html_import: 'merge',
			plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
			],
			font_formats: 'Calibri=calibri,sans-serif; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
			toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist  | link image',
			toolbar2: 'print preview media | forecolor backcolor emoticons | codesample|sizeselect | | fontselect |  fontsizeselect',
			setup : function(ed)
				{
					ed.on('init', function() 
					{
						this.getDoc().body.style.fontSize = '12pt';
						this.getDoc().body.style.fontFamily = 'calibri';
					});
				},

			images_upload_handler: function (blobInfo, success, failure) {
				var formData = new FormData();
				var filename = 'vedic_subbmission-'+$.now();
				formData.append('file', blobInfo.blob(),filename);
				$.ajax({
					url: "index.php?entryPoint=powerpaste",
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						success("upload/submissions/" + filename);
					},
					error: function() {
						console.log("error");
					}
				});
				
			 }
		});
		$(document).ready(function() {
			document.getElementById("document_name").readOnly = 'true';
			$("#status").append("<p><input type='hidden' id='description' name='description' value ='single'></p>");
			
			$('#uploadfile_file').change(function() {
				var title=$('#uploadfile_file').val();
				var resume_name = title.split('\\\');
				$('#document_name').val(resume_name[2]);
				
			});
				var resumeType = $('#submission_resume_type_c').val();
				var candidateName = $('#vedic_candidates_vedic_submissions_1_name').val();
				var candidateID = $('#vedic_candidates_vedic_submissions_1vedic_candidates_ida').val();
				var docID = $('#documents_vedic_submissions_1documents_ida').val();
				var profID = $('#vedic_profiles_vedic_submissions_1vedic_profiles_ida').val();
				var id = '$id';
	
				if(resumeType == 'Manual_Submission')
				{ 
					$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',true);	
					$('#documents_vedic_submissions_1_name_label,#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').css("visibility","hidden");
					$('div [data-label="LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE"]').css("visibility","hidden");
						
				}
				if(resumeType == 'Candidate_Documents'){
					$('#uploadfile_label,#uploadfile_file').css("visibility","hidden");
					$('div [data-label="LBL_FILE_UPLOAD"]').css("visibility","hidden");
					if((candidateID!='')||(candidateName!='')){
						$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',true);
					}
					else{
						$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',true);
						$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',true);	
					}
				}
				//Code to autopopulate candidate,profile while creating the submission from the documents subpanel
				if((docID!='')&&(id =='')){
					var docval;
					$.ajax({
						url:"index.php?entryPoint=popupCandidate",
						type: "POST",
						data:{docID:docID},
						async: false,
						success: function(data){
							docval = data;	
						},
						error: function(){},        
					});
					var values = docval.split('--');
					var canId = values[0];
					var canName = values[1];
					var profId = values[2];
					var profName = values[3];
					$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',false);
					$('#vedic_candidates_vedic_submissions_1_name').val(canName);
					$('#vedic_candidates_vedic_submissions_1vedic_candidates_ida').val(canId);
					$('#vedic_profiles_vedic_submissions_1_name').val(profName);
					$('#vedic_profiles_vedic_submissions_1vedic_profiles_ida').val(profId);
				}
				//End of Code to autopopulate candidate,profile while creating the submission from the documents subpanel
				
				//Code to autopopulate candidate while creating the submission from the profiles subpanel
				if((profID!='')&&(id =='')){
					var docval;
					$.ajax({
						url:"index.php?entryPoint=popupCandidate",
						type: "POST",
						data:{profID:profID},
						async: false,
						success: function(data){
							docval = data;	
						},
						error: function(){},        
					});
					var values = docval.split('--');
					var canId = values[0];
					var canName = values[1];
					$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',false);
					$('#vedic_candidates_vedic_submissions_1_name').val(canName);
					$('#vedic_candidates_vedic_submissions_1vedic_candidates_ida').val(canId);
					
				}
				//End of Code to autopopulate candidate while creating the submission from the profiles subpanel
				
				$("#submission_resume_type_c").change(function(){
					var resumeType = $('#submission_resume_type_c').val();
					var candidateName = $('#vedic_candidates_vedic_submissions_1_name').val();
					var candidateID = $('#vedic_candidates_vedic_submissions_1vedic_candidates_ida').val();
					var profName = $('#vedic_profiles_vedic_submissions_1_name').val();		
					var profID = $('#vedic_profiles_vedic_submissions_1vedic_profiles_ida').val();
					if(resumeType == 'Manual_Submission')
					{
						$('#uploadfile_label,#uploadfile_file').css("visibility","visible");
						$('div [data-label="LBL_FILE_UPLOAD"]').css("visibility","visible");
						$('#documents_vedic_submissions_1_name_label,#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').css("visibility","hidden");
						$('div [data-label="LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE"]').css("visibility","hidden");
						$('#documents_vedic_submissions_1_name,#document_name').val('');
						$('#documents_vedic_submissions_1documents_ida').val('');
						
						if((candidateID!='')||(candidateName!='')){
							$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',false);	
						}
						
					}
					if(resumeType == 'Candidate_Documents'){
						$('#uploadfile_file,#document_name').val('');
						$('#documents_vedic_submissions_1_name_label,#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').css("visibility","visible");
						$('div [data-label="LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE"]').css("visibility","visible");
						$('#uploadfile_label,#uploadfile_file').css("visibility","hidden");
						$('div [data-label="LBL_FILE_UPLOAD"]').css("visibility","hidden");
						if((candidateID!='')||(candidateName!='')){
							if((profID!='')||(profName!='')){
								$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',false);
							}else{
								$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',true);
							}
							$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',false);	
						}
						else{
							$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',true);
							$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',true);	
						}
					}
					
				});
				
				$("#btn_clr_vedic_candidates_vedic_submissions_1_name").click(function(){	
					var resumeType = $('#submission_resume_type_c').val();				
					$("#vedic_candidates_vedic_submissions_1_name").nextAll("div[class='required validation-message']").html("");
					if(resumeType == 'Candidate_Documents'){						$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',true);		
					}					
				});
				$("#btn_clr_documents_vedic_submissions_1_name").click(function(){
					$("#documents_vedic_submissions_1_name").nextAll("div[class='required validation-message']").html("");
					$("#document_name").val('');
				});
		
			$('#job_poster_email_c').change(function() {		
				var to = $('#job_poster_email_c').val();		
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
							
				if(to==''){		
					$("#job_poster_email_c").nextAll("div[class='required validation-message']").html("");		
				} else{		
					if (filter.test(to)) {		
						$("#job_poster_email_c").nextAll("div[class='required validation-message']").html("");		
									
					} else {			
						if($("#job_poster_email_c").next().hasClass("required validation-message")){		
										
								$("#job_poster_email_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
						} else {		
							$('#job_poster_email_c').html('{$mod_strings['LBL_JOB_POSTER_EMAIL']} : <font color="red">*</font>');			
							add_error_style('EditView', 'job_poster_email_c', 'Enter a valid Email Address!!');		
						}		
						return false;		
					}		
				}		
			});
			$('#cc_c').change(function() {		
				var cc = $('#cc_c').val();		
				cc2=cc.replace(/\s/g, '');		
				$('#cc_c').val(cc2);		
						
				var cc1 =cc2.split(',');		
				for(var i=0;i<cc1.length;i++)		
				{		
					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
					if(cc==''){		
						$("#cc_c").nextAll("div[class='required validation-message']").html("");		
					} else{		
						if (filter.test(cc1[i])) {		
							$("#cc_c").nextAll("div[class='required validation-message']").html("");		
										
						} else {			
							if($("#cc_c").next().hasClass("required validation-message")){		
											
									$("#cc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
							} else {		
								$('#cc_c').html('{$mod_strings['LBL_CC']} : <font color="red">*</font>');			
								add_error_style('EditView', 'cc_c', 'Enter a valid Email Address!!');		
							}		
							return false;		
						}		
					}		
				}		
			});		
			$('#bcc_c').change(function() {		
				var bcc = $('#bcc_c').val();		
				bcc2=bcc.replace(/\s/g, '');		
				$('#bcc_c').val(bcc2);		
						
				var bcc1 =bcc2.split(',');		
				for(var i=0;i<bcc1.length;i++)		
				{		
					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
					if(bcc==''){		
						$("#bcc_c").nextAll("div[class='required validation-message']").html("");		
					} else{		
						if (filter.test(bcc1[i])) {		
							$("#bcc_c").nextAll("div[class='required validation-message']").html("");		
										
						} else {			
							if($("#bcc_c").next().hasClass("required validation-message")){		
											
									$("#bcc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
							} else {		
								$('#bcc_c').html('{$mod_strings['LBL_BCC']} : <font color="red">*</font>');			
								add_error_style('EditView', 'bcc_c', 'Enter a valid Email Address!!');		
							}		
							return false;		
						}		
					}		
				}		
			});
		});
		id="$id";
		if(id==''){
			setInterval(function(){
				signature()
			}, 100);

			setInterval(function(){
				email()
			}, 100);
		}else{
		
		
		}
		function getDocument(){
			setInterval(function(){
				docu()
			}, 100);
			
		}
		function GetCandidate()
		{
			setInterval(function(){
				signature()
			}, 100);
		}
		function getProfile(){
			setInterval(function(){
				profile()
			}, 100);
			
		}
		function GetJob()
		{
			setInterval(function(){
				email()
			}, 100);
		}


		var candidate_id = '';
		var profile_id = '';
		var job_id = '';
		function show_signature_values(data){
			if(data=="No"){
				return;
			}
			var json = $.parseJSON(data);
			var signature = json.signature;
			var signature_wys = json.signature_c;
			tinymce.activeEditor.setContent(signature_wys);
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img'), {'font-family':'Calibri','color':'#104e8b','margin':'2px'});
				tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('.submit'), {'font-family':'Calibri','color':'#104e8b','margin':'2px','margin-left': '1.5em'});
		}
		function show_profiles_values(data){
			if(data=="No"){
				return;
			}
			var json = $.parseJSON(data);
			var signature = json.signature;
			var signature_wys = json.signature_c;
			tinymce.activeEditor.setContent(signature_wys);
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img'), {'font-family':'Calibri','color':'#104e8b','margin':'2px'});
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('.submit'), {'font-family':'Calibri','color':'#104e8b','margin':'2px','margin-left': '1.5em'});
		}

		function show_job_poster_email(data) {
			if(data=="No"){
				return;
			}
			var json2 = $.parseJSON(data);
			var submitter_email_c = json2.submitter_email_c;
			//$("#job_poster_email_c").val(submitter_email_c);
			var to=$("#job_poster_email_c").val();
			if(to=='')
			{
			$("#job_poster_email_c").val(submitter_email_c);
			}

			var sub = json2.subject;
			$("#subject_c").val(sub);

			var sign = json2.signature;
			tinymce.activeEditor.setContent(sign);
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img'), {'font-family':'Calibri','color':'#104e8b','margin':'2px'});
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('.submit'), {'font-family':'Calibri','color':'#104e8b','margin':'2px','margin-left': '1.5em'});
		}

		function signature() {
			var resumeType = $('#submission_resume_type_c').val();
			var job = $.trim($("#vedic_job_vedic_submissions_1vedic_job_ida").val());
			var new_candidate_id = $.trim($("#vedic_candidates_vedic_submissions_1vedic_candidates_ida").val());
			var new_profile_id = $.trim($("#vedic_profiles_vedic_submissions_1vedic_profiles_ida").val());
			var user_id = "{$current_user_id}";
			//alert(user_id);
			if(new_candidate_id!=candidate_id){
				if((new_candidate_id !=''))
				{								
					$('#btn_clr_vedic_profiles_vedic_submissions_1_name,#btn_vedic_profiles_vedic_submissions_1_name,#vedic_profiles_vedic_submissions_1_name').prop('disabled',false);
				}
				// alert(new_candidate_id);
				$.post('index.php?entryPoint=submission_signature', {candidate_id : new_candidate_id,profile_id :new_profile_id, jobid : job,  user_id : user_id} , function(data) { //alert(data);
					show_signature_values(data);
				});
				candidate_id = new_candidate_id;
			}
		}

		function email() {

			var new_job_id = $.trim($("#vedic_job_vedic_submissions_1vedic_job_ida").val());
			var new_candidate_id = $.trim($("#vedic_candidates_vedic_submissions_1vedic_candidates_ida").val());
			var user_id = "{$current_user_id}";
			if(new_job_id!=job_id){
				// alert(new_job_id);
				$.post('index.php?entryPoint=job_signature', {job_id : new_job_id, candidate : new_candidate_id, user_id : user_id} , function(data) { //alert(data);
					show_job_poster_email(data);
				});
				job_id = new_job_id;
			}
		}
		function profile()
		{
			var resumeType = $('#submission_resume_type_c').val();
			var job = $.trim($("#vedic_job_vedic_submissions_1vedic_job_ida").val());
			var new_profile_id = $.trim($("#vedic_profiles_vedic_submissions_1vedic_profiles_ida").val());
			var new_candidate_id = $.trim($("#vedic_candidates_vedic_submissions_1vedic_candidates_ida").val());
			var user_id = "{$current_user_id}";
			//alert(user_id);
			if(new_profile_id!=profile_id){
				if( (resumeType == 'Candidate_Documents')&&(new_profile_id !=''))
				{								
					$('#btn_clr_documents_vedic_submissions_1_name,#btn_documents_vedic_submissions_1_name,#documents_vedic_submissions_1_name').prop('disabled',false);
				}
				$.post('index.php?entryPoint=profile_signature', {candidate_id : new_candidate_id, profile_id :new_profile_id,jobid : job,  user_id : user_id} , function(data) { //alert(data);
					show_profiles_values(data);
					
				});
				profile_id = new_profile_id;
			}
		}
		function docu()
		{
			var docu = $.trim($("#documents_vedic_submissions_1_name").val());
			var title = $('#uploadfile_file').val();
			if(docu != '')
			{
				$("#document_name").val(docu);
			}
			if(title !='')
			{
				var resume_name = title.split('\\\');
				$('#document_name').val(resume_name[2]);
			}
		}


		function check_form(formname){
			
			var to = $('#job_poster_email_c').val();		
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
						
			if(to==''){		
				$("#job_poster_email_c").nextAll("div[class='required validation-message']").html("");		
			} else{		
				if (filter.test(to)) {		
					$("#job_poster_email_c").nextAll("div[class='required validation-message']").html("");		
								
				} else {			
					if($("#job_poster_email_c").next().hasClass("required validation-message")){		
									
							$("#job_poster_email_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
					} else {		
						$('#job_poster_email_c').html('{$mod_strings['LBL_JOB_POSTER_EMAIL']} : <font color="red">*</font>');			
						add_error_style('EditView', 'job_poster_email_c', 'Enter a valid Email Address!!');		
					}		
					return false;		
				}		
			}		
							
			var cc = $('#cc_c').val();		
			cc2=cc.replace(/\s/g, '');		
			$('#cc_c').val(cc2);		
			var cc1 =cc2.split(',');		
			for(var i=0;i<cc1.length;i++)		
			{		
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
				if(cc==''){		
					$("#cc_c").nextAll("div[class='required validation-message']").html("");		
				} else{		
					if (filter.test(cc1[i])) {		
						$("#cc_c").nextAll("div[class='required validation-message']").html("");		
									
					} else {			
						if($("#cc_c").next().hasClass("required validation-message")){		
										
								$("#cc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
						} else {		
							$('#cc_c').html('{$mod_strings['LBL_CC']} : <font color="red">*</font>');			
							add_error_style('EditView', 'cc_c', 'Enter a valid Email Address!!');		
						}		
						return false;		
					}		
				}		
			}		
				
			var bcc = $('#bcc_c').val();		
			bcc2=bcc.replace(/\s/g, '');		
			$('#bcc_c').val(bcc2);		
					
			var bcc1 =bcc2.split(',');		
			for(var i=0;i<bcc1.length;i++)		
			{		
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;		
				if(bcc==''){		
					$("#bcc_c").nextAll("div[class='required validation-message']").html("");		
				} else{		
					if (filter.test(bcc1[i])) {		
						$("#bcc_c").nextAll("div[class='required validation-message']").html("");		
									
					} else {			
						if($("#bcc_c").next().hasClass("required validation-message")){		
										
								$("#bcc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");		
						} else {		
							$('#bcc_c').html('{$mod_strings['LBL_BCC']} : <font color="red">*</font>');			
							add_error_style('EditView', 'bcc_c', 'Enter a valid Email Address!!');		
						}		
						return false;		
					}		
				}		
			}
			//Code to validate the Marketing Active Candidates
				var can_id = $.trim($("#vedic_candidates_vedic_submissions_1vedic_candidates_ida").val());
				var doc_id = $.trim($("#documents_vedic_submissions_1documents_ida").val());
				var prof_id = $.trim($("#vedic_profiles_vedic_submissions_1vedic_profiles_ida").val());
				var values;
				if(prof_id!=''){
					$.ajax({
						url:"index.php?entryPoint=onsavesubmission",
						type: "POST",
						async: false,
						data:{prof_id:prof_id,can_id:can_id},
						success: function(data){
							values = data;	
						},
						error: function(){},        
					});
					console.log(values);
					var v = values.split('---');
					var proactive = v[0];
					var stage = v[2];
					var status = v[1];
					if(status)
					{
						if((v[0] == 1))
						{
							$("#vedic_profiles_vedic_submissions_1_name").nextAll("div[class='required validation-message']").html("");
						} 
						else{
							if($("#vedic_profiles_vedic_submissions_1_name").next().next().next().next().next().hasClass("required validation-message")){
								$("#vedic_profiles_vedic_submissions_1_name").next("div[class='required validation-message']").html('Invalid Profile to do Submission(Profile is not marketable)');
							} else {
								$('#vedic_profiles_vedic_submissions_1_name').html('{$mod_strings["LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_PROFILES_TITLE"]} : <font color="red">*</font>');	
								add_error_style('EditView', 'vedic_profiles_vedic_submissions_1_name', 'Invalid Profile to do Submission(Profile is not marketable)');
							}
							return false;
						}
					}
					else{
						if($("#vedic_profiles_vedic_submissions_1_name").next().next().next().next().next().hasClass("required validation-message")){
							$("#vedic_profiles_vedic_submissions_1_name").next("div[class='required validation-message']").html('Invalid Profile to do Submission(Profile is not marketable)');
						} else {
							$('#vedic_profiles_vedic_submissions_1_name').html('{$mod_strings["LBL_VEDIC_PROFILES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_PROFILES_TITLE"]} : <font color="red">*</font>');	
							add_error_style('EditView', 'vedic_profiles_vedic_submissions_1_name', 'Invalid Profile to do Submission(Profile is not marketable)');
						}
						return false;
						
					}
				}
				if(!(prof_id))
				{
					$("#vedic_profiles_vedic_submissions_1_name").nextAll("div[class='required validation-message']").html("");
				} 
				//End of Marketing Active Candidates code
				//Code to validate the documents and candidates Relationship
				var resumeType = $('#submission_resume_type_c').val();
				if(resumeType == 'Candidate_Documents')
				{
					var docvalues;
					if(can_id!=''){
						if(doc_id!=''){
							$.ajax({
								url:"index.php?entryPoint=candidatedocumentverification",
								type: "POST",
								data:{can_id:can_id,doc_id:doc_id,prof_id:prof_id},
								async: false,
								success: function(data){
									docvalues = data;	
								},
								error: function(){},        
							});
							var v = docvalues.split('--');
							var canVal = v[0];
							var profVal = v[1];
							if((profVal == 0) && (canVal == 0))
							{
								$("#documents_vedic_submissions_1_name").nextAll("div[class='required validation-message']").html("");
							} 
							else{
								if($("#documents_vedic_submissions_1_name").next().next().next().next().next().hasClass("required validation-message")){
									$("#documents_vedic_submissions_1_name").next("div[class='required validation-message']").html('Document is not related to selected candidate');
								} else {
									$('#documents_vedic_submissions_1_name').html('{$mod_strings["LBL_DOCUMENTS_VEDIC_SUBMISSIONS_1_FROM_DOCUMENTS_TITLE"]}				  : <font color="red">*</font>');			
									add_error_style('EditView', 'documents_vedic_submissions_1_name', 'Document is not related to selected candidate');
								}
								return false;
									
								
							}
												
						}
					}
				}
				//End of Documents and candidates relationship
								
				var recordid = document.getElementsByName("record")[0].value;
				
				if(resumeType == 'Manual_Submission')
				{
				
					if(typeof(recordid) == "undefined" || recordid.length == 0){
						
						var fileName = document.getElementById("uploadfile_file").value;
						var fileN = document.getElementById("uploadfile").value;
						
						if((fileName.length == 0 )&&(fileN.length ==0) ){
							alert("Add the Resume for the Submission!");
							return false;
						}
					}	
				}						
				
				if (typeof(siw) != 'undefined' && siw  && typeof(siw.selectingSomething) != 'undefined' && siw.selectingSomething)
					return false;
				return validate_form(formname, '');			

			}
		</script>
jscript;

	echo '<style> 
			input#btn_view_change_log,input#SAVE{
			background-color: #ffffff;
			color: #e4820e !important;
			border-color: #e4820e !important;
			border-style: solid;
			border-width: 2px;	}
			input#btn_view_change_log,input#SAVE:hover{
			color: #fff !important;
			background-color: #e4820e !important;	}
		</style>';

		parent::display();
	}
}

?>
