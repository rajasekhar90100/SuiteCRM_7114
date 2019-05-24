<?php
/**		
  * FileName => view.edit.php		
  * Modified By => Lakshmi (Modified On May-02-2018)		
  * COMMENT => Custom code for edit view of Jobs		
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
// ini_set('display_errors','on');
// error_reporting(-1);
class vedic_jobViewEdit extends ViewEdit {

 	function vedic_jobViewEdit(){
 		parent::ViewEdit();
 	}
 	
	/**		
	  * Function => display()		
	  * Modified By => Udaykiran (Modified On Jun-05-2017)		
	  * COMMENT => Updated the toolbars for tinymce		
	  */
 	function display() {
		echo '<style>
			input#btn_view_change_log {
				color: #e4820e !important;
				background-color: white !important;
				border-color: #e4820e !important;
				border: 2px solid !important;
			}
			input#btn_view_change_log:hover {
				color: white !important;
				background-color: #e4820e !important;
			}
			textarea#job_note_c {
				width: 114% !important;
			}
			[field="no_of_candidates_c"] {
				margin-top: 12px;
			}
			</style>';
			
			$job_location = '<input type="text" name="job_location_c" id="job_location_c" size="15" maxlength="255" value="'.$this->bean->job_location_c.'" title="">';
			$job_location .= '&nbsp; <select name="job_state_c" id="job_state_c" >';
			$job_location .= '<option value="null"></option>';
			$job_loc = $GLOBALS['app_list_strings']['job_state_list'];
			foreach($job_loc as $key=>$value) {
				if($this->bean->job_state_c == $key){
					$selected = 'selected="selected"';
				}else{
					$selected = "";
				}
				$job_location .= '<option '.$selected.' value="'.$key.'">'.$value.'</option>  ';
			}
			$job_location .= '</select>';
			$this->ss->assign('job_location', $job_location);
		
	   	//Job title validation
		 echo $js_validation = <<<jscript
		<script src="custom/vats/vedic_Common/tinymce/tinymce.js"></script>	
        <script type="text/javascript">		
            tinyMCE.init({		
                selector: '#briefdescription_c',
                height: 350,
                width : 745,		
                theme: 'modern',
				paste_data_images: true,
				content_css : 'custom/vats/vedic_Common/tinymce/skins/lightgray/submissions/mycontent.css',
				powerpaste_allow_local_images: true,
				powerpaste_word_import: 'merge',
				powerpaste_html_import: 'merge',
				font_formats: ' Andale Mono=andale mono,times;Calibri=calibri,sans-serif; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
				plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
				],
				toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
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
            tinyMCE.init({		
                selector: '#job_listing_c',		
                height: 350,		
                width : 745,		
                theme: 'modern',
				paste_data_images: true,
				content_css : 'custom/vats/vedic_Common/tinymce/skins/lightgray/submissions/mycontent.css',				
				powerpaste_allow_local_images: true,
				powerpaste_word_import: 'merge',
				powerpaste_html_import: 'merge',
				font_formats: ' Andale Mono=andale mono,times;Calibri=calibri,sans-serif; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
				plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
				],
				toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
				toolbar2: 'print preview media | forecolor backcolor emoticons | codesample|sizeselect | | fontselect |  fontsizeselect',

				setup : function(ed)
				{
					ed.on('init', function() 
					{
						this.getDoc().body.style.fontSize = '12pt';
						this.getDoc().body.style.fontFamily = 'calibri';
					});
				},
            });
			$(document).ready(function(){
				$('#name').change(function(){
					var title=$('#name').val();
					var required=/^(?=.*?[a-zA-Z])/;
					if(title.match(required)){
						$("#name").nextAll("div[class='required validation-message']").html("");
					}else{
						if($("#name").next().hasClass("required validation-message")){
							$("#name").next("div[class='required validation-message']").html("Enter atleast one Alphabet!!");
						} else {
							$('#name').html('{$mod_strings['LBL_NAME']} : <font color="red">*</font>');	
							add_error_style('EditView', 'name', 'Enter atleast one Alphabet!!');
						}
						return false;
					}
				});
			});
			function check_form(formname){
				bValid = false;
				if(typeof(siw)!='undefined'&&siw&&typeof(siw.selectingSomething)!='undefined'&&siw.selectingSomething) return false;
				bValid = validate_form(formname,'');
				if(!bValid) return false;

				var title=$('#name').val();
				var required=/^(?=.*?[a-zA-Z])/;
				if(title.match(required)){
					$("#name").nextAll("div[class='required validation-message']").html("");
				}else{
					if($("#name").next().hasClass("required validation-message")){
						$("#name").next("div[class='required validation-message']").html("Enter atleast one Alphabet!!");
					} else {
						$('#name').html('{$mod_strings['LBL_NAME']} : <font color="red">*</font>');	
						add_error_style('EditView', 'name', 'Enter atleast one Alphabet!!');
					}
					return false;
				}
				return true;
			}
		</script>
jscript;
		// For Assigned To 
			$teammembers_sql = "SELECT users.id, users.first_name, users.last_name 
			FROM users 
			INNER JOIN acl_roles_users ON users.id = acl_roles_users.user_id 
			INNER JOIN acl_roles ON acl_roles.id = acl_roles_users.role_id 
			AND acl_roles.name = 'Team Member' AND users.deleted =0
			AND acl_roles.deleted =0 
			AND acl_roles_users.deleted =0 order by first_name";
			$teammembers_res = $GLOBALS['db']->query($teammembers_sql);
		
			$teammembers_dropdown = "<select name='assigned_user_id' id='assigned_user_id'   >";
			$teammembers_dropdown .= '<option value="null"></option>';
			while($teammembers_row = $GLOBALS['db']->fetchByAssoc($teammembers_res) ){
			
				$key_id = $teammembers_row['id'];
				$val_name = $teammembers_row['first_name'].' '.$teammembers_row['last_name'];
				if($this->bean->assigned_user_id == $key_id){
					$selected = 'selected="selected"';
				}else{
					$selected = "";
				}
				$teammembers_dropdown .= '<option '.$selected.' value="'.$key_id.'">'.$val_name.'</option>  ';
			}
			$teammembers_dropdown .= "</select>";	
			$this->ss->assign('teammembers_dropdown', $teammembers_dropdown);
		
 		parent::display();
 	}
}
?>
