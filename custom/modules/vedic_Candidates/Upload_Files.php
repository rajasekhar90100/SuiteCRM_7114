<html>
<?php
/**  
   * FileName => Upload_Files.php
   * Modified By => Maneesha (Modified On Apr-25-2018) 
   * COMMENT => Code to upload the multiple files
   */
global $sugar_config,$db;
$js = $sugar_config[site_url];
						
?>
<head>
<style>
#header,#copyright_data,#links,#responseTime {display:none;}
.companyLogo {display:none;}

.btnUpload {background-color: #3FA849;padding:5px 20px;border: #3FA849 1px solid;color: #FFFFFF;border-radius:4px;}
.inputFile {padding: 4px;background-color: #FFFFFF;border-radius:4px;}
.txt-subtitle {font-size:1.2em;}
.content {
    padding: 20px 3% 40px 3%;
    width: 100%;
    margin-left: -220px !important;
	margin-top: -90px;
}
.wait {
    background:#eee;
	display: none;        
    position: fixed;   
    top: 0;                 
    right: 0;                
    bottom: 0;
    left: 0;
    opacity: 0.5;
}
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
#wait {
	width:169px;height:;
	position:absolute;
	top:45%;
	left:48%;
	right:50%;
	bottom:50%;
	padding:2px
}

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
var ImmigID = $.urlParam('immigID'); 
var immigName = $.urlParam('immigName');
var CanId = $.urlParam('candidateID');
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
		var rowCount,c;
		
		var url = '<?php echo $js;?>';
		
		var counter = $('.flow-file').length;
		var invalidCount = $('.failure').length;
		counter = counter-invalidCount;
			
		if(counter != 0)
		{
			$('.wait').show();
			for(c=0;c<=counter;c++){
				var file = $("#flowname_"+c).text();
				
				if(file.includes(','))
				{
					filename.push(file.replace(/,/g , "----"));
				}
				else{
					filename.push($("#flowname_"+c).text());
				}
			}
					
			if(CanId == null)
			{
				var invalidCount = $('.failure').length;
				counter = counter-invalidCount;
				if(counter > 0)
				{
					$('.wait').show();
					
					opener.document.EditView.document_upload.value = filename;
					if(counter == 1)
					{
						opener.document.EditView.nodoc.value = "Successfully Uploaded "+counter+" Document !!";
					}
					else{
						opener.document.EditView.nodoc.value = "Successfully Uploaded "+counter+" Documents !!";
					}
					opener.$("#nodoc").replaceWith(function() {
						return $("<div id ='nodoc' style='color:#29a329'>" + $(this).val() + "</div>");
					});
					window.close();
				}
				else{
					$('.wait').show();
						
					opener.document.EditView.nodoc.value = "No file is uploaded !!";
					opener.$("#nodoc").replaceWith(function() {
						return $("<div id ='nodoc' style='color:#29a329'>" + $(this).val() + "</div>");
					});
					window.close();
				}
			}
			else{
				$.ajax({
					url:"index.php?entryPoint=UploadMFile&CanId="+CanId,
					type: "POST",
					data:  {filename:filename},
					success: function(data){
						if(data)
						{
							 $(".wait").fadeOut("slow");
							if(data == 'undefined')
							{
								var filenameV = filename[c];
								filenameV = filenameV+"Invalid file extension. Try uploading valid file extensions (pdf, docx,doc,txt,jpg,jpeg,png,gif,xls,xlsx)";
								// $("#gallery").html(filenameV);
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
			$('.wait').show();
				
			opener.document.EditView.nodoc.value = "No file is uploaded !!";
			opener.$("#nodoc").replaceWith(function() {
				return $("<div id ='nodoc' style='color:#29a329'>" + $(this).val() + "</div>");
			});
			window.close();
		}
		
	}));
});
</script>
</head>
<body>

<h2>Multiple File Upload for Candidates Documents</h2>
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
		<input type="hidden"  name="hdn" id="hdn" />
		<button id="submit" value="Submit" class="pull-right button primary"  style=" margin-top: 15px;
		margin-bottom: 15px; height: 3em; font-size: 1em;"/>Submit Documents</button>
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
var c=0;
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
	name = name.toLowerCase();
	
	if (['pdf', 'docx','doc', 'txt', 'jpg', 'jpeg', 'png', 'gif'].indexOf(name) > -1) {
		$('.table-responsive').append(
			'<div class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
				'<span class="remove pull-right" title="Remove"><i class="fa fa-times-circle-o fa-red" aria-hidden="true"><img src="themes/Suite7/images/close_inline.gif"></i></span>' +
				'<span class="flow-file-name" name="fname"></span>' +
				'<span id="flowname_'+c+'">'+fileName+'</span>' +
				'<div class="flow-file-progress"></div>' + 
				'<div class="preview"><div class="progress"><div class="progress-bar progress-bar-striped active"></div></div></div>' + 
			'</div>'
		);
		c++;
	} else {
		//Display the invalid message in preview bar of a file
		$('.table-responsive').append(
			'<div class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
				'<span class="remove pull-right" title="Remove"><i class="fa fa-times-circle-o fa-red" aria-hidden="true"><img src="themes/Suite7/images/close_inline.gif"></i></span>' +
				'<span class="flow-file-name" name="fname"></span>' +
				'<div class="flow-file-progress"></div>' + 
				'<div class="preview"><div class="failure" style="color:white">Invalid</div></div>' + 
			'</div>'
		);
		$('#error').replaceWith(
		'<p><b>NOTE:</b> Try uploading valid file extensions (pdf, docx, doc, txt, jpg, jpeg, png, gif)</p>'
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
	$("#submit").show();
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
	name = name.toLowerCase();

	if (['pdf', 'docx', 'doc', 'txt', 'jpg', 'jpeg', 'png', 'gif'].indexOf(name) > -1) {
			
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
		
			if(file1.length == 0){
				$('#gallery').remove();
				window.top.location.reload();

			}
				
		});
		file1.push(file.file.name);
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