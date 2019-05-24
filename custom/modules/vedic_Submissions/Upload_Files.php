<?php
/**
  * FileName => Upload_Files.php
  * Created By => Udaykiran (Modified On Aug-09-2017)
  * Modified By => Lakshmi (Modified On Apr-29-2018)
  * COMMENT => Code to create the multiple Submissions from the jobs module detail view
  */
?>
<html>
<head>
<style>
#header,#copyright_data,#links,#responseTime {display:none;}
.content {
    padding: 20px 3% 40px 3%;
    width: 100%;
    margin-left: -226px;
}
.wait {background:#eee;display: none;position: fixed; top: 0; right: 0;  bottom: 0; left: 0; opacity: 0.5;}
#wait {width:169px;height:;	position:absolute;top:45%;left:48%;right:50%;bottom:50%;padding:2px}
th,td{padding: 3px !important;}
#submit {
    margin-right: 10px;
    background-color: #ffffff;
    color: #e4820e;
    border-color: #e4820e !important;
    border-style: solid;
    border-width: 2px; }	

#submit:hover{
	background-color: #e4820e;
	color: #fff; }
</style>
<link rel="stylesheet" type="text/css" href="custom/vats/vedic_Common/Flow/css/flow.css" /> 
<script src="custom/vats/vedic_Common/Flow/js/flow.js"></script>
<script type="text/javascript">

	$.urlParam = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (results==null){
		   return null;
		}
		else{
		   return results[1] || 0;
		}
	}
	$(window).load(function() {
		$("header").remove();
		$("#header").remove();
		$("#ajaxHeader").remove();
		$(".navbar").remove();
		$("#copyright_data").remove();	
		$(".companyLogo").remove();
		$("#links").remove();
		$(".serverstats").remove();
	});
	$(document).ready(function (e) {
		$("#submit").hide();
		$("header").remove();
		$("#header").remove();
		$("#ajaxHeader").remove();
		$(".navbar").remove();
		$("#copyright_data").remove();	
		$(".companyLogo").remove();
		$("#links").remove();
		$(".serverstats").remove();
		var get_var,get_var2;
		 
			
		$("#uploadForm").on("submit",(function(e) {
			e.preventDefault();
			var filename = [];
			var profName = [];
			var profID = [];
			var isPrivate = [];
			var c;
			
			var rowCount = $('#myTable tr').length;
			var counter = rowCount-1;
			if(rowCount != 0)
			{
				
				for(c=0;c<=counter;c++){
					var values;
					filename.push($("#filename_"+c).text());
					profName.push($("#dependent_profiles_c_"+c).val());		
					profID.push($("#vedic_profiles_id_c_"+c).val());
					isPrivate.push($("#is_private_c_"+c).prop("checked"));
					var candidate = $("#dependent_profiles_c_"+c).val();
					var prof_id = $("#vedic_profiles_id_c_"+c).val();
					if(candidate == '')
					{
						if($("#btn_clr1_"+c).next().hasClass("required validation-message")){
							$("#btn_clr1_"+c).next("div[class='required validation-message']").html("Missing required field: Profiles<br>Missing required field: No match for field: Profiles");
														
						} else {
							$("#btn_clr1_"+c).replaceWith('<button type="button" name="btn_clr1_'+c+'" id="btn_clr1_'+c+'" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, "dependent_profiles_c_'+c+'", "vedic_profiles_id_c_'+c+'");" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button><div class="required validation-message">Missing required field: Profiles<br>Missing required field: No match for field: Profiles</div>');
						}
					} else{
						$("#btn_clr1_"+c).nextAll("div[class='required validation-message']").html("");
					}
					// validation for the Marketing Active Profiles //			
					if(prof_id!=''){
						$.ajax({
							url:"index.php?entryPoint=onsavesubmission",
							type: "POST",
							data:{prof_id:prof_id},
							async: false,
							success: function(data){
								values = data;	
							},
							error: function(){},        
						});
						var v = values.split('---');
						var proactive = v[0];
						var stage = v[2];
						var status = v[1];
						if(status)
						{
							if((v[0] == 1))
							{
								$("#btn_clr1_"+c).nextAll("div[class='required validation-message']").html("");
							} 
							else{
								if($("#btn_clr1_"+c).next().hasClass("required validation-message")){
									$("#btn_clr1_"+c).next("div[class='required validation-message']").html("Invalid Profile to do Submission(Profile is not marketable)");
								} else {
									$("#btn_clr1_"+c).replaceWith('<button type="button" name="btn_clr1_'+c+'" id="btn_clr1_'+c+'" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, "dependent_profiles_c_'+c+'", "vedic_profiles_id_c_'+c+'");" value="Clear Selection"><img 	src="themes/default/images/id-ff-clear.png"></button><div class="required validation-message">Invalid Profile to do Submission(Profile is not marketable)</div>');
								}													
							}
						}
						else{
							if($("#btn_clr1_"+c).next().hasClass("required validation-message")){
									$("#btn_clr1_"+c).next("div[class='required validation-message']").html("Invalid Profile to do Submission(Profile is not marketable)");
																
							} else {
								$("#btn_clr1_"+c).replaceWith('<button type="button" name="btn_clr1_'+c+'" id="btn_clr1_'+c+'" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, "dependent_profiles_c_'+c+'", "vedic_profiles_id_c_'+c+'");" value="Clear Selection"><img 	src="themes/default/images/id-ff-clear.png"></button><div class="required validation-message">Invalid Profile to do Submission(Profile is not marketable)</div>');
							}
						}
					}
				}
				var to = $("#job_poster_email_c").val();
				var subject = $("#subject_c").val();
				var bcc = $("#bcc_c").val();
				var cc = $("#cc_c").val();
				var jobID = $.urlParam('jobID');
				var jobName = $.urlParam('jobName');
				var signature = tinyMCE.activeEditor.getContent();
				url="index.php?entryPoint=submissionMFile&profID="+profID;
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				
				//validation for to field//						
				if(to==''){
					if($("#job_poster_email_c").next().hasClass("required validation-message")){
						$("#job_poster_email_c").next("div[class='required validation-message']").html("Missing required field: To");
					} else {
						$('#job_poster_email_c').replaceWith('<input type="text" name="job_poster_email_c" id="job_poster_email_c" size="30" maxlength="255" value="'+to+'" title="">			<div class="required validation-message">Missing required field: To</div>');	
					}
				} else{
					if (filter.test(to)) {
						$("#job_poster_email_c").nextAll("div[class='required validation-message']").html("");
					} else {	
						if($("#job_poster_email_c").next().hasClass("required validation-message")){
						$("#job_poster_email_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
						} else {
							$('#job_poster_email_c').replaceWith('<input type="text" name="job_poster_email_c" id="job_poster_email_c" size="30" maxlength="255" value="'+to+'" title="">			<div class="required validation-message">Enter a valid Email Address!!</div>');	
						}
					}
				}
				
				//validation for bcc field//		
				bcc2=bcc.replace(/\s/g, '');
				$('#bcc_c').val(bcc2);
				var bcc1 =bcc2.split(',');
				for(var i=0;i<bcc1.length;i++)
				{
					if(bcc==''){
						$("#bcc_c").nextAll("div[class='required validation-message']").html("");
					} else{
						if (filter.test(bcc1[i])) {
							$("#bcc_c").nextAll("div[class='required validation-message']").html("");
								
						} else {	
							if($("#bcc_c").next().hasClass("required validation-message")){
								$("#bcc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
							} else {
								$('#bcc_c').replaceWith('<input type="text" name="bcc_c" id="bcc_c" size="30" maxlength="255" value="'+bcc1+'" title="">	<div class="required validation-message">Enter a valid Email Address!!</div>');	
							}
						}
					}
				}
				
				//validation for cc field//	
				cc2=cc.replace(/\s/g, '');
				$('#cc_c').val(cc2);
				var cc1 =cc2.split(',');
				for(var i=0;i<cc1.length;i++)
				{
					if(cc==''){
						$("#cc_c").nextAll("div[class='required validation-message']").html("");
					} else{
						if (filter.test(cc1[i])) {
							$("#cc_c").nextAll("div[class='required validation-message']").html("");
								
						} else {	
							if($("#cc_c").next().hasClass("required validation-message")){
									
									$("#cc_c").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
							} else {
								
								$('#cc_c').replaceWith('<input type="text" name="cc_c" id="cc_c" size="30" maxlength="255" value="'+cc1+'" title=""><div class="required validation-message">Enter a valid Email Address!!</div>');	
							}
							
						}
					}
				}
				
				var data = $('.validation-message').text();
				if(($('.validation-message').length==0)||(data == ''))
				{
					$('.wait').show();
					$.ajax({
						url: url,
						type: "POST",
						data: {filename:filename,jobID:jobID,cc:cc,bcc:bcc,signature:signature,subject:subject,to:to,isPrivate:isPrivate},
						success: function(data){
							if(data)
							{
								$(".wait").fadeOut("slow");
								if(data == 'undefined')
								{
									var filenameV = filename[c];
									filenameV = filenameV+"Invalid file extension. Try uploading valid file extensions (pdf, docx, doc, rtf)";
									$("#gallery").html(filenameV);
								}
								else
								{
									$("#gallery").html(data);
									window.opener.location.reload();
									window.close();
										 
								}
								
							}
						},
						error: function(){
							
						},        
					});
				}
			}
			else{
				
			}
			
		}));
	});
function openProductPopup(ln){

	lineno=ln;
	var popupRequestData = {
	"call_back_function" : "set_return",
	"form_name" : "uploadForm",
	"field_to_name_array" : {
		"id" : "vedic_job_id_c_0",
		"name" : "dependent_job_c_0",
	}
	};
	
	open_popup('vedic_Candidates', 800, 850, '', true, true, popupRequestData, "single", true);

	}
</script>
</head>
<body>

<h2>Attach Multiple Resumes and Select Multiple Profiles for  "
<?php
// Code to display the Job Name on load the multiple submissions page
echo $x = "<script>
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}
var jobName = $.urlParam('jobName');
	jobName = decodeURI(jobName);
	document.writeln(jobName);


</script>";
?> "
</h2>
<br/>
<div class="gallery-bg">

<form id="uploadForm" action="uploadMFile.php" method="post" enctype="multipart/form-data">
	<p id ="error">
	<div id="frame">
		<div class="flow-error">
			Your browser, unfortunately, does not support Bulk Documents Upload.
			</div>
			<div id="drop-area" class="flow-drop" ondragenter="$(this).addClass('flow-dragover');" ondragend="$(this).removeClass('flow-dragover');" ondrop="$(this).removeClass('flow-dragover');">
				<div class="flow-text">Drop Documents's here to Upload or Click the Drop Box Area</div>
				<div class="table-responsive"></div>
			</div>
		</div>
	</div>
	<div id="myModal" class="popup">
	<div class="popup-content">
		<div class="popup-header">
			<span class="popup-close">&times;</span>
			<h3>Resume Preview</h3>
		</div>
		<div class="popup-body">
		</div>
	</div>
</div>
<div id="gallery"></div>
	<button id="submit" value="Submit" class="pull-right button primary" />Submit</button>
	
</form>

<div class='wait'>
		<div id='wait'>
			<img src='themes/Suite7/images/loading.gif' width='40' height='40' /><br>Loading Please Wait..
		</div>
	</div>
</div>
<script type="text/javascript">

var self = this;
var file1= [];
var uniq= [];
var job = $.urlParam('jobName');
var r = new Flow({
	target: 'index.php?entryPoint=uploadMulFiles',
	testChunks: false
});

//Initializing Popup and the resume ids for creating candidate records
var modal = document.getElementById('myModal');
var closeModal = document.getElementsByClassName("popup-close")[0];
var resumeIds = [];
$('.processResumes').prop('disabled', true);


// Flow.js isn't supported
if (!r.support) {
	$('.flow-error').show();
	<!-- return ; -->
}
		
// Show a place for dropping/selecting files
$('.flow-drop').show();
r.assignDrop($('#drop-area'));
r.assignBrowse($('#drop-area'));

// Handle file add event
r.on('fileAdded', function(file){
	$(".flow-text").hide();
	$(".table-responsive").show();
	
	var fileName=file.name;
	var name = fileName.split('.').pop();
	if (['pdf', 'docx','doc', 'rtf'].indexOf(name) > -1) {
		$('.table-responsive').append(
			'<div class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
				'<span class="remove pull-right" title="Remove"><i class="fa fa-times-circle-o fa-red" aria-hidden="true"><img src="themes/Suite7/images/close_inline.gif"></i></span>' +
				'<span class="flow-file-name" name="fname"></span>' +
				'<div class="flow-file-progress"></div>' + 
				'<div class="preview"><div class="progress"><div class="progress-bar progress-bar-striped active"></div></div></div>' + 
			'</div>'
		);
	} else {
		// Unsupported file extensions
		$('.table-responsive').append(
			'<div class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
				'<span class="remove pull-right" title="Remove"><i class="fa fa-times-circle-o fa-red" aria-hidden="true"><img src="themes/Suite7/images/close_inline.gif"></i></span>' +
				'<span class="flow-file-name" name="fname"></span>' +
				'<div class="flow-file-progress"></div>' + 
				'<div class="preview"><div class="failure" style="color:white">Invalid</div></div>' + 
			'</div>'
		);
		$('#error').replaceWith(
		'<p><b>NOTE:</b> Try uploading valid file extensions (pdf, docx, doc, rtf)</p>'
		);
		
		
	}
	// Add the file to the list
	
	//Stopping invokig of upload action on the card view
	$(".flow-file").click(function(e) {
	   e.stopPropagation();
	});
	var $self = $('.flow-file-'+file.uniqueIdentifier);
	$self.find('.flow-file-name').text(file.name);
	$self.find('.flow-file-name').attr("title",file.name);
});

//Start uploading as soon the file is added to the drop-area 
r.on('filesSubmitted', function(file) {
	r.upload();
});

//Enables the create button after all files are uploaded
r.on('complete', function(){
	$('.processResumes').prop('disabled', false);
	
});
		
//If file was succssfully loaded creates the preview button and shows success
r.on('fileSuccess', function(file,message){
	$(".flow-file-" + file.uniqueIdentifier + " .remove").css("display","block").click(function(e) {
		e.stopPropagation();
		$('.flow-file-'+file.uniqueIdentifier).remove();
		r.removeFile(file);
	});
	var fileName=file.name;
	var name = fileName.split('.').pop();
	if (['pdf', 'docx', 'doc', 'rtf'].indexOf(name) > -1) {
		$('.flow-file-'+file.uniqueIdentifier+' .progress').html('<div class="progress-bar" style="width: 100%;"></div>');
		//Remove Button Click event registry and display
		
		$(".flow-file-" + file.uniqueIdentifier + " .remove").css("display","block").click(function(e) {
			e.stopPropagation();
			$('.flow-file-'+file.uniqueIdentifier).remove();
			r.removeFile(file);
			if($('.flow-file').length == 0) {
				$(".table-responsive").hide();
				$(".flow-text").show();	
			}
							
			
			var removeItem = file.file.name;
			
			file1 = $.grep(file1, function(value) {
			  return value != removeItem;
			});
			
			//Remove the row respective file
			var rowID = "row_"+removeItem;			
			var uniqID = file.uniqueIdentifier.split('-');
			$('#myTable tbody').find("#row_"+uniqID[0]).remove();
						
			//Rload the page after removing all files		
			if(file1.length == 0)
			{
				$('#gallery').remove();
				window.top.location.reload();
				
			}
				
		});
		file1.push(file.file.name);
		uniq.push(file.uniqueIdentifier);
		url="index.php?entryPoint=submissionMFiles";
		$.ajax({
			url: url,
			type: "POST",
			data:  {file1:file1,job:job,uniq:uniq},
			// contentType: false,
			// cache: false,
			// processData:false,
			success: function(data){
				if(data)
				{
					$("#gallery").html(data);
					$("#submit").show();
				}
			},
			error: function(){} 	        
		});
	// }
	}
	
});
		
//If file was not loaded will show failure
r.on('fileError', function(file, message){
	// Reflect that the file upload has resulted in error
	$('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress').html('<i class="fa fa-times-circle-o fa-red" aria-hidden="true"></i>');
});

//Updates the progress bar while uploading the file
r.on('fileProgress', function(file){
	// Handle progress for both the file and the overall upload
	$('.flow-file-'+file.uniqueIdentifier+' .progress-bar').css({width:Math.floor(file.progress()*100) + '%'});
});

//if files are added again for upload then disable the create button till all files are uploaded
r.on('uploadStart', function(){
	$('.processResumes').prop('disabled', true);
});
		
//Pop up definition
closeModal.onclick = function() {
	$(".popup-body").html('');
	modal.style.display = "none";
}
//if a click is detected outside the popup then close the popup
window.onclick = function(event) {
	if (event.target == modal) {
		$(".popup-body").html('');
		modal.style.display = "none";
	}
}

//Clear All Resume  click event register
$('.clearResumes').click(function() {
	
	$('.processResumes').prop('disabled', true);
	$('.flow-file').remove();
	$(".table-responsive").hide();
	
	for(var id in resumeIds) {
		self.remove(id,resumeIds[id]);
	}
	$(".flow-text").show();
	r.cancel();
	//show success message after creating all the records for candidate
	resumeIds = [];
});
	//Process All Resume click event register
$('.processResumes').click(function() {
	app.alert.show('message-id', {
		level: 'process',
		title: 'Processing resume(s) to create candidate(s)...'
	});
	$('.processResumes').prop('disabled', true);
	$('.flow-file-progress').html('');
	$('.remove').remove();
	for(var id in resumeIds) {
		self.process(id,resumeIds[id]);
	}
	//show success message after creating all the records for candidate
	$(document).ajaxStop(function () {
		app.alert.dismissAll();
		app.alert.show('message-id', {
			level: 'success',
			messages: 'Candidate(s) created successfully with resume(s)',
			autoClose: true
		});
		$(document).unbind('ajaxStop');
	});
	//clear the resumes id after the process executed
	resumeIds = [];
});
</script>
</body>
</html>