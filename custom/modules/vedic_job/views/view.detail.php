<?php
/** 
  * FileName => view.detail.php
  * Modified By => udaykiran (Modified On July-18-2018)
  * COMMENT => custom code for Detailview of jobs module,Added the Link for Candidates Feedback Report
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

class vedic_jobViewDetail extends ViewDetail 
{
 	function vedic_jobViewDetail()
	{
 		parent::ViewDetail();
 	}
	/**  
      * Function => display()
      * Modified By => Udaykiran (Modified On Jul-18-2018)
      * COMMENT => increment/decrement of no of canidates,Removed(Commented) the unwanted code for the error logs,Added the Link for Candidates Feedback Report
      */
 	function display() 
	{
		global $current_user,$db;
		$id = $this->bean->id;
		$jobstatus=$this->bean->job_status_c;
		$jobdes = html_entity_decode($this->bean->briefdescription_c);
		
		//Code to display the feedback button,subpanels based on Operations,Solutions Team :: added by Udaykiran :: 05-Jun-2018
		$usertype = $current_user->is_admin;
		$securitygroup = new SecurityGroup();
		$groups = $securitygroup->getUserSecurityGroups($GLOBALS['current_user']->id);
		$Solutions = $securitygroup->retrieve_by_string_fields(array('name'=>'Solutions','deleted'=>0));
		$SolutionsID = $Solutions->id;
		$Operations = $securitygroup->retrieve_by_string_fields(array('name'=>'Operations','deleted'=>0));
		$OperationsID = $Operations->id;
		$Hiring = $securitygroup->retrieve_by_string_fields(array('name'=>'Hiring','deleted'=>0));	
		$HiringID = $Hiring->id;
		//Link for Candidates Feedback Report
		$feedback = <<<EOT
		<script>
			$(document).ready(function() {
				$("#tab-actions").after("<li id='consolid' class='ex'  style=float:right;'><a class ='unconverted' href=\'index.php?module=vedic_job&action=Candidatefeedback&record=$id\' style='background-position: right 6px top 10px;	background-color: #fff;	color: #0065a4;		cursor: pointer;	font-size: 13px !important;	padding: 8px 20px 6px 6px;	line-height: 13px;		background-repeat: no-repeat;	background-origin: border-box;	border-color: #0065a4 !important;			border-style: solid;		border-width: 2px;		border-radius: 0px;' target='_blank' >Candidates Feedback</a></li>");
			});
		</script>
EOT;
		//End of Code Link for Candidates Feedback Report
		if($jobstatus =='Closed') {		
			$this->dv->ss->assign('SendEmail', '<input type = "button" class="button"  id="send_email" onclick=SendEmail(); value="Send Email"/>');		
	    }
		if(in_array($OperationsID, array_keys($groups)) && $usertype==0) {
			if(in_array($HiringID, array_keys($groups)) || in_array($SolutionsID, array_keys($groups))) {
				$this->dv->ss->assign('CandidateFeedback', '<input type = "button" class="button" id="candidate_feedback" onclick=feedback(); value="Candidates Feedback"/>');
				echo $feedback;
			}
			else {
				echo $js = <<<EOT
					<script>
						$(document).ready(function(){
							setTimeout(function(){
								$('#whole_subpanel_vedic_job_vedic_candidates_1').css('display','none');
							}, 700);
						}); 
					</script>							  
EOT;
			}
		}
		else if(in_array($SolutionsID, array_keys($groups)) && $usertype==0) {
			$this->dv->ss->assign('CandidateFeedback', '<input type = "button" class="button" id="candidate_feedback" onclick=feedback(); value="Candidates Feedback"/>');
			echo $feedback;
			echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					setTimeout(function(){
						$('#whole_subpanel_vedic_job_vedic_submissions_1').css('display','none');
					}, 700);
				}); 
			 </script>							  
EOT;
		}
		if($usertype==1) {
			echo $feedback;
			$this->dv->ss->assign('CandidateFeedback', '<input type = "button" class="button" id="candidate_feedback" onclick=feedback(); value="Candidates Feedback"/>');
		}
		//End of code to display the feedback button,subpanels based on Operations,Solutions Team :: added by Udaykiran :: 05-Jun-2018
		echo $js = <<<EOT
		<script>
		function feedback(){
			window.open("index.php?module=vedic_job&action=Candidatefeedback&record=$id");
		}
		</script>
EOT;
		//Code to Display the compose mail popup added by Udaykiran :: 15-Jun-2018
		//echo ' <link rel="stylesheet" href="'.$base_url.'themes/SuiteR/css/boot.css">
		echo '<div id="EditView_tabs" class="modal fade in " style="margin: 100px 150px 5px 150px;">
            <div class="tab-content" style="background-color:white;padding: 0; border: 0;">
                <div class="modal-header" style ="padding:10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Close"><span class="glyphicon glyphicon-remove"></button>
                    <h4 class="modal-title" style="color:black">Compose Email</h4>
                </div>
                <div class="modal-body row">
					<div class="col-xs-12 col-sm-6 edit-view-row-item">
						<div class="col-xs-12 col-sm-4 label" data-label="to_addrs_names">
							To:
							<span class="required" style="float: none;  margin-top: 0px;  margin-left: 0px;">*</span>
						</div>
						<div class="col-xs-12 col-sm-8 edit-view-field " type="readonly" field="to_addrs_names">
							<input type="text" name="to_addrs_names" id="to_addrs_names" size="30" value="" title="">
						</div>
						<!-- [/hide] -->
					</div>
					<div class="col-xs-12 col-sm-6 edit-view-row-item">
						<div class="col-xs-12 col-sm-4 label" data-label="cc_addrs_names">
							Cc:
						</div>
						<div class="col-xs-12 col-sm-8 edit-view-field " type="readonly" field="cc_addrs_names">
							<input type="text" name="cc_addrs_names" id="cc_addrs_names" size="30" value="" title="">
						</div>
						<!-- [/hide] -->
					</div>
					<div class="clear"></div>
   					<div class="clear"></div>
					<div class="col-xs-12 col-sm-6 edit-view-row-item">
						<div class="col-xs-12 col-sm-4 label" data-label="LBL_SUBJECT">
							Subject:
							<span class="required" style="float: none;  margin-top: 0px;  margin-left: 0px;">*</span>
						</div>
						<div class="col-xs-12 col-sm-8 edit-view-field " type="readonly" field="subject">
							<input type="text" name="subject" id="subject" size="30" maxlength="255" value="" title="">
						</div>
						<!-- [/hide] -->
					</div>
					<div class="col-xs-12 col-sm-6 edit-view-row-item">
						<div class="col-xs-12 col-sm-4 label" data-label="bcc_addrs_names">
							Bcc:
						</div>
						<div class="col-xs-12 col-sm-8 edit-view-field " type="readonly" field="bcc_addrs_names">
							<input type="text" name="bcc_addrs_names" id="bcc_addrs_names" size="30" value="" title="">
						</div>
						<!-- [/hide] -->
					</div>	
					<div class="clear"></div>
   					<div class="clear"></div>					
					<div class="col-xs-12 col-sm-12 edit-view-row-item">
						<div class="col-xs-12 col-sm-2 label" data-label="LBL_BRIEFDESCRIPTION">
							Body:
						</div>
						<div class="col-xs-12 col-sm-8 edit-view-field " type="wysiwyg" field="briefdescription_c" colspan="3">
							<textarea id ="signature_c">'.$jobdes.'</textarea>
						</div>
						<!-- [/hide] -->
					</div>
                </div>
                <div class="modal-footer" style ="padding:7px;">
                    <button type="button" class="btns btns-primary" data-dismiss="modal" title="Close"><span class="glyphicon glyphicon-remove"></button>
                    <button type="button" class="btns btns-primary" onclick="email()" id="send" title="Send"><span class="glyphicon glyphicon-send"></span></button>
                </div>
				</div>
				<div class="wait" style ="background:#eee;display: none;position: fixed; top: 0; right: 0;  bottom: 0; left: 0; opacity: 0.5;">
					<div id="wait" style="width:139px;height:;	position:absolute;top:50%;left:50%;right:50%;bottom:50%;padding:2px;">
						<img src="themes/SuiteP/images/loading.gif" width="40" height="40" /><br>Loading Please Wait..
					</div>
				</div>
			</div>
		</div>';
		
		echo $js = <<<EOT
		<script src='custom/vats/vedic_Common/tinymce/tinymce.js'></script>
		<script type='text/javascript'>
		function SendEmail()
		{
			$('#EditView_tabs').modal();
			$("#to_addrs_names").val('');
			$("#cc_addrs_names").val('');
			$("#bcc_addrs_names").val('');
			$("#subject").val('');
			tinyMCE.init({
				selector: '#signature_c',
				height: 180,
				width : 790,
				theme: 'modern',
				paste_data_images: true,
				content_css : 'custom/vats/vedic_Common/tinymce/skins/lightgray/submissions/mycontent.css',				
				powerpaste_allow_local_images: true,
				powerpaste_word_import: 'merge',
				powerpaste_html_import: 'merge',
				font_formats: 'Calibri=calibri,sans-serif; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
				plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template  textcolor colorpicker textpattern powerpaste imagetools'
				],
				toolbar1: 'print preview media | forecolor backcolor emoticons | codesample|sizeselect | | fontselect |  fontsizeselect',
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
						url: 'index.php?entryPoint=powerpaste',
						type: 'POST',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							success('upload/submissions/' + filename);
						},
						error: function() {
							console.log('error');
						}
					});
					
				 }
			});
			setInterval(function(){
				tinyMCE.activeEditor.dom.setStyles(tinyMCE.activeEditor.dom.select('p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img'), {'font-family':'Calibri','color':'#104e8b','margin':'2px'});
			}, 100);
		}
		function email()
		{
			var body = tinyMCE.get('signature_c').getContent();
			var to = $("#to_addrs_names").val();
			var cc = $("#cc_addrs_names").val();
			var bcc = $("#bcc_addrs_names").val();
			var subject = $("#subject").val();
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			
				//validation for subject field//						
				if(subject ==''){
					if($("#subject").next().hasClass("required validation-message")){
						$("#subject").next("div[class='required validation-message']").html("Missing required field: Subject");
					} else {
						$('#subject').replaceWith('<input type="text" name="subject" id="subject" size="30" maxlength="255" value="'+subject+'" title=""><div class="required validation-message">Missing required field: Subject</div>');	
					}
				} else{
					$("#subject").nextAll("div[class='required validation-message']").html("");
				}
				//validation for to field//						
				if(to==''){
					if($("#to_addrs_names").next().hasClass("required validation-message")){
						$("#to_addrs_names").next("div[class='required validation-message']").html("Missing required field: To");
					} else {
						$('#to_addrs_names').replaceWith('<input type="text" name="to_addrs_names" id="to_addrs_names" size="30" value="'+to+'" title=""><div class="required validation-message">Missing required field: To</div>');	
					}
				} else{
					if (filter.test(to)) {
						$("#to_addrs_names").nextAll("div[class='required validation-message']").html("");
					} else {	
						if($("#to_addrs_names").next().hasClass("required validation-message")){
						$("#to_addrs_names").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
						} else {
							$('#to_addrs_names').replaceWith('<input type="text" name="to_addrs_names" id="to_addrs_names" size="30" maxlength="255" value="'+to+'" title="">			<div class="required validation-message">Enter a valid Email Address!!</div>');	
						}
					}
				}
				
				//validation for bcc field//		
				bcc2=bcc.replace(/\s/g, '');
				$('#bcc_addrs_names').val(bcc2);
				var bcc1 =bcc2.split(',');
				for(var i=0;i<bcc1.length;i++)
				{
					if(bcc==''){
						$("#bcc_addrs_names").nextAll("div[class='required validation-message']").html("");
					} else{
						if (filter.test(bcc1[i])) {
							$("#bcc_addrs_names").nextAll("div[class='required validation-message']").html("");
								
						} else {	
							if($("#bcc_addrs_names").next().hasClass("required validation-message")){
								$("#bcc_addrs_names").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
							} else {
								$('#bcc_addrs_names').replaceWith('<input type="text" name="bcc_addrs_names" id="bcc_addrs_names" size="30" maxlength="255" value="'+bcc1+'" title="">	<div class="required validation-message">Enter a valid Email Address!!</div>');	
							}
						}
					}
				}
				
				//validation for cc field//	
				cc2=cc.replace(/\s/g, '');
				$('#cc_addrs_names').val(cc2);
				var cc1 =cc2.split(',');
				for(var i=0;i<cc1.length;i++)
				{
					if(cc==''){
						$("#cc_addrs_names").nextAll("div[class='required validation-message']").html("");
					} else{
						if (filter.test(cc1[i])) {
							$("#cc_addrs_names").nextAll("div[class='required validation-message']").html("");
								
						} else {	
							if($("#cc_addrs_names").next().hasClass("required validation-message")){
									
									$("#cc_addrs_names").next("div[class='required validation-message']").html("Enter a valid Email Address!!");
							} else {
								
								$('#cc_addrs_names').replaceWith('<input type="text" name="cc_addrs_names" id="cc_addrs_names" size="30" maxlength="255" value="'+cc1+'" title=""><div class="required validation-message">Enter a valid Email Address!!</div>');	
							}
							
						}
					}
				}
				
			var data = $('.validation-message').text();
			if(($('.validation-message').length==0)||(data == '')) {
				$('.wait').show();
				$.ajax({
					url: 'index.php?entryPoint=SendEmails',
					type: 'POST',
					data: {body:body,to:to,cc:cc,bcc:bcc,subject:subject},
					success: function(data) {
						$(".wait").fadeOut("slow");
						$(".close").click();
					},
					error: function() {
						console.log('error');
					}
				});
			}			
		}		
		</script>
EOT;
		//End of code to Display the compose mail popup added by Udaykiran :: 18-Jun-2018
		
		if((strlen($this->bean->job_state_c) == 2) && !empty($this->bean->job_location_c)) {
			$job_location = $this->bean->job_location_c.", ".$this->bean->job_state_c;	
			$this->ss->assign('job_location', $job_location);
		}
		else if((strlen($this->bean->job_state_c) > 2) && !empty($this->bean->job_location_c)) {
			$job_location = $this->bean->job_location_c;	
			$this->ss->assign('job_location', $job_location);
		}
		else if(empty($this->bean->job_location_c) && (strlen($this->bean->job_state_c) == 2)) {
			$job_location = $this->bean->job_state_c;	
			$this->ss->assign('job_location', $job_location);
		}
		$job_id=$this->bean->id;
		$query="SELECT count(vedic_job_vedic_submissions_1vedic_submissions_idb) as count FROM vedic_job_vedic_submissions_1_c INNER JOIN vedic_submissions where vedic_submissions.id=vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_submissions_idb AND vedic_job_vedic_submissions_1_c.vedic_job_vedic_submissions_1vedic_job_ida='$job_id' AND vedic_job_vedic_submissions_1_c.deleted=0 and vedic_submissions.deleted=0";
		$updateQuery=$db->query($query);
		$result=$db->fetchByAssoc($updateQuery);
		$no_of_candidates = $result['count'];
		$update_job="UPDATE `vedic_job_cstm` SET `no_of_candidates_c`=$no_of_candidates WHERE id_c='$job_id'";
		$db->query($update_job);
		parent::display();
		echo '<style>
		input[id="candidate_feedback"].button:hover{
		color: #e4820e!important;
		background-color: #fff!important;	
		}
		input[id="send_email"].button:hover{
			color: #e4820e!important;
			background-color: #fff!important;
		}
		div#list_subpanel_vedic_job_vedic_submissions_1 {
			overflow: scroll;
		}
		[field="job_note_c"] {
			width: 78% !important;
		}
		span.ex {
			float: right;
			background-color: #ffffff;
			border-color: #0066a4;
			border-style: solid;
			border-width: 2px;	
			height: 30px;
			padding: 4px 10px 6px 10px;
			margin: 5em 74em 4em 5em;
		}
		a.unconverted:hover {
			color: #fff !important;
			background-color: #0066a4 !important;	
			height: 30px;
			cursor: pointer;
		}
		</style>';
 	}
	protected function _displaySubPanels()
	{
		require_once ('include/SubPanel/SubPanelTiles.php');
		$subpanel = new SubPanelTiles($this->bean, $this->module);
		$GLOBALS['focus'] = $this->bean;
		$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_job_vedic_submissions_1']['order'] = 100;
        $subpanel->subpanel_definitions->layout_defs['subpanel_setup']['vedic_job_vedic_candidates_1']['order'] = 200;
		$subpanel->subpanel_definitions->layout_defs['subpanel_setup']['securitygroups_vedic_job_1']['order'] = 300;
        echo $subpanel->display();
    }
}
?>