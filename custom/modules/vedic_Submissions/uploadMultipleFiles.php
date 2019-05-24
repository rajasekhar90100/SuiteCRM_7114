<?php
/**
  * FileName => uploadMultipleFiles.php
  * Created By => Udaykiran (Modified On Aug-09-2017)
  * Modified By => Udaykiran (Modified On Jan-27-2018)
  * COMMENT => Code to display the Submissions Edit view after files loaded
  */
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('include/QuickSearchDefaults.php');
$qsd = new QuickSearchDefaults();
$parentName = $qsd->getQSParent("vedic_Immigration");
global $app_list_strings;

$c = 0;
$ename;
$gname = $_REQUEST['file1'];
$job = $_REQUEST['job'];
$uniq = $_REQUEST['uniq'];

if(!empty($gname)){
	// $gname = explode(",",$getVar3);
	// $uniq = explode(",",$uniq);


?>
	<head>
	<script src="custom/vats/vedic_Common/tinymce/tinymce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			selector: '#signature_c',
			height: 400,
			width : 610,
			theme: 'modern',
			paste_data_images: true,
			powerpaste_allow_local_images: true,
			formats: {forecolor: { styles : {color : 'red'}},},
			powerpaste_word_import: 'merge',
			powerpaste_html_import: 'merge',
			font_formats: 'Calibri=calibri,sans-serif; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
			plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
			],
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
		setInterval(function(){
			tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img'), {'font-family':'Calibri','color':'#104e8b','margin':'2px'});
			
		}, 100);
		
	function openProductPopup(ln){
		var popupRequestData = {
			"call_back_function" : "set_return",
			"form_name" : "multipleFiles",
			
			"field_to_name_array" : {
				"id" : "vedic_profiles_id_c_"+ln,
				"name" : "dependent_profiles_c_"+ln,
			}
		};
	
		open_popup('vedic_Profiles', 1200, 800, '&stage_c_advanced=Marketing&status_c_advanced[0]=Active&status_c_advanced[1]=Start', true, true, popupRequestData, "single", true);
	}
	var c = $('#myTable tr').length;
	for(var i=0;i<=(c-2);i++)
	{
		if(typeof sqs_objects == 'undefined'){
			var sqs_objects = new Array;
		}
		sqs_objects['multipleFiles_dependent_profiles_c_'+i]={
			"form":"multipleFiles",
			"method":"query",
			"modules": ["vedic_Profiles"],
			"field_list":["name","id"],
			"populate_list":["dependent_profiles_c_"+i,"vedic_profiles_id_c_"+i],
			"required_list":["vedic_profiles_id_c_"+i],
			"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
			"limit":"30",
			"no_match_text":"No Match"};
		SUGAR.util.doWhen(
				"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['multipleFiles_dependent_profiles_c_"+i+"']) != 'undefined'",
				enableQS
		);
		
	}
	</script>
	<style>	
		#myTable, th, td {border: 1px;}
	</style>
	</head>
	<form id="multipleFiles" name="multipleFiles" method="POST">
		<table id ="myTable"  width="100%" cellspacing="100">
			<tbody><?php
				for($i=0;$i<count($gname);$i++){
					$unique = explode("-",$uniq[$i]);
				?>
				<tr id="row_<?php echo $unique[0];?>" class ="candidates">
					<td>FileName:</td>
					<td><p id="filename_<?php echo $c?>"><?php echo $gname[$i]; ?></p></td>
					<td valign="top" id="profiles_label" width="12.5%" scope="col">
						Profiles:
						<span class="required">*</span>
					</td>
					<td>
						<input type="text" name= "dependent_profiles_c_<?php echo $c?>" id="dependent_profiles_c_<?php echo $c?>" value="<?php echo $getVar2?>" class ="sqsEnabled yui-ac-input"/><input type="hidden" name="vedic_profiles_id_c_<?php echo $c?>" id="vedic_profiles_id_c_<?php echo $c?>" value="<?php echo $getVar?>"><button title="Select" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" accesskey="T" type="button" tabindex="116" class="button" value="Select" name="btn1" onclick="openProductPopup(<?php echo $c?>);"><img src="themes/default/images/id-ff-select.png" alt="Select"></button><button type="button" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" name="btn_clr1_<?php echo $c?>" id="btn_clr1_<?php echo $c?>" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'dependent_profiles_c_<?php echo $c?>', 'vedic_profiles_id_c_<?php echo $c?>');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
					</td>
					<td valign="top" id="is_private_c_label" width="12.5%" scope="col">
					Is Private?:
					</td>
					<td>
					<input type="hidden" name="is_private_c_<?php echo $c?>" value="0"> 
					<input type="checkbox" id="is_private_c_<?php echo $c?>" name="is_private_c_<?php echo $c?>"  value="1" title="" tabindex="0">
					</td>
				</tr>
				<?php
				$c++;
				}
				?>
				<tr>
					<td valign="top" id="subject_c_label" width="12.5%" scope="col">Subject:</td>
					<td valign="top" width="37.5%" colspan="3">
						<input type="text" name="subject_c" id="subject_c" size="30" maxlength="150" value="<?php echo urldecode($job); ?>" title="">
					</td>
				</tr>
				<tr>	
					<td>Signature:</td>
					<td colspan="3">
						<span>
							<textarea id ="signature_c"></textarea>
						</span>
					</td>
				</tr><br>
				<tr>
					<td valign="top" id="job_poster_email_c_label" width="12.5%" scope="col">
						To:
						<span class="required">*</span>
					</td>
					<td valign="top" width="37.5%">
						<input type="text" name="job_poster_email_c" id="job_poster_email_c" size="30" maxlength="255" value="" title="">
					</td>
					<td valign="top" id="cc_c_label" width="12.5%" scope="col">Cc:</td>
					<td valign="top" width="37.5%">
						<input type="text" name="cc_c" id="cc_c" size="30" maxlength="255" value="" title="">
					</td>
				</tr>
				<tr>
					<td valign="top" id="bcc_c_label" width="12.5%" scope="col">Bcc:</td>
					<td valign="top" width="37.5%">
						<input type="text" name="bcc_c" id="bcc_c" size="30" maxlength="255" value="" title="">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
<?php
}