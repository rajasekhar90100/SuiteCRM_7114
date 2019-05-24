<?php
/**
  * FileName => view.popup.php
  * Created By => Rajasekhar (Created On Apr-23-2018)
  * Modified By => Lakshmi (Modified On May-02-2018)
  * COMMENT => Custom code for popup view of Jobs
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

class vedic_jobViewPopup extends ViewPopup{
	
	function display(){
		 echo $js = <<<EOT
		<script src="custom/vats/vedic_Common/tinymce/tinymce.js"></script>
        <script type="text/javascript">
		$(document).ready(function(){
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
            });
		 });
		 </script>
EOT;
		  parent::display();
		  
	}
}
?>
