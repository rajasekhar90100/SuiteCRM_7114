<?php
	if(isset($_POST['submit_button']) &&  !empty($_POST['from_c'])   ){
		include("submissionsstatistics.php");
		//print_r($_POST);
	}else if(isset($_POST['submit_button'])){
		echo "<script>  alert('Please enter from date') </script>";
	}
	//	global $mod_strings;
	
		
		//$teammembers_sql = "SELECT users.id, users.first_name, users.last_name  FROM users WHERE users.deleted =0 order by first_name";
		$teammembers_sql = "SELECT DISTINCT (users.id), users.first_name, users.last_name FROM vedic_submissions
							LEFT JOIN vedic_submissions_cstm ON vedic_submissions.id = vedic_submissions_cstm.id_c
							LEFT JOIN users ON users.id = vedic_submissions.assigned_user_id
							WHERE users.deleted =0	UNION 
						SELECT users.id, users.first_name, users.last_name  FROM users  
							INNER JOIN acl_roles_users ON users.id = acl_roles_users.user_id 
							INNER JOIN acl_roles ON acl_roles.id = acl_roles_users.role_id 
							AND acl_roles.name = 'Team Member' AND users.deleted =0 
							AND acl_roles.deleted =0 AND acl_roles_users.deleted =0 order by first_name";
		$teammembers_res = $GLOBALS['db']->query($teammembers_sql);
			// For Assigned To 
			$teammembers_dropdown = "<select name='assigned_user_id[]' id='assigned_user_id' multiple='true' size='10'>"; //name="keyskill_list[]"
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
			//$this->ss->assign('teammembers_dropdown', $teammembers_dropdown);
	
?>

<script>
	function Clear(){
		document.getElementById("from_c").value = "";
		document.getElementById("to_c").value = "";
		document.getElementById("assigned_user_id").value = "";
	}
</script>

<h1>Submissions Statistics</h1>

<br><br>
	<form id="form1" name="form1" method="post" action="">
		<input type="hidden" name="reload" id="reload" value="<?php echo rand(100000,200000); ?>">
			<table>

				<tr>
					<td valign="top" id="valid_from_c_label" width="12.5%" scope="col"> 
						From: 	<span class="required">*</span>  				
					</td>
					<td valign="top" width="100%">  
						<span class="dateTime"> 
							<input class="date_input" autocomplete="off" type="text" name="from_c" id="from_c" value="" title="" tabindex="0" size="11" maxlength="10">
							<img src="themes/Sugar5/images/jscalendar.gif?v=DVHKHIeLg0xYC4cXKsYGtQ" alt="Enter Date" style="position:relative; top:6px" border="0" id="valid_from_c_trigger">
						</span>
						<script type="text/javascript">
						Calendar.setup ({
						inputField : "from_c",
						ifFormat : "%m/%d/%Y %I:%M%P",
						daFormat : "%m/%d/%Y %I:%M%P",
						button : "valid_from_c_trigger",
						singleClick : true,
						dateStr : "",
						startWeekday: 0,
						step : 1,
						weekNumbers:false
						}
						);
						</script>
					</td>
						
				</tr>
				<tr >
					<td valign="top" id="valid_to_c_label" width="12.5%" scope="col">
						To: <span class="required"></span>
					</td>
					<td valign="top" width="100%"> 
						<span class="dateTime"> 
							<input class="date_input" autocomplete="off" type="text" name="to_c" id="to_c" value="" title="" tabindex="0" size="11" maxlength="10">
							<img src="themes/Sugar5/images/jscalendar.gif?v=DVHKHIeLg0xYC4cXKsYGtQ" alt="Enter Date" style="position:relative; top:6px" border="0" id="valid_to_c_trigger">
						</span>
						<script type="text/javascript">
						Calendar.setup ({
						inputField : "to_c",
						ifFormat : "%m/%d/%Y %I:%M%P",
						daFormat : "%m/%d/%Y %I:%M%P",
						button : "valid_to_c_trigger",
						singleClick : true,
						dateStr : "",
						startWeekday: 0,
						step : 1,
						weekNumbers:false
						}
						);
						</script> 
					</td>
				</tr>
				<tr > <td > &nbsp;  </td>
				</tr>
				<tr >
					<td valign="top" id="user_name" width="12.5%" scope="col">
						Submitter: <span class="required"></span>
					</td>
					<td valign="top" width="100%"> 
						<?php echo "$teammembers_dropdown"; ?>						
					</td>
				</tr>
				<!--<tr>
						<td> UserName<span class="required">*</span> </td>
						<td>
						
							
							<input type="text" name="user_name" class="sqsEnabled yui-ac-input" tabindex="0" id="user_name" size="" value="" title="" autocomplete="off" accesskey="7">
							<div id="form_SubpanelQuickCreate_Users_user_name_results" class="yui-ac-container"><div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div>
<input type="hidden" name="Users_id" id="Users_id" value="">
<span class="id-ff multiple">
<button type="button" name="btn_user_name" id="btn_user_name" tabindex="0" title="Select" class="button firstChild" value="Select" onclick="open_popup(
&quot;Users&quot;, 
600, 
400, 
&quot;&amp;called_from=subpanl&quot;, 
true, 
false, 
{&quot;call_back_function&quot;:&quot;set_return&quot;,&quot;form_name&quot;:&quot;form1&quot;,&quot;field_to_name_array&quot;:{&quot;id&quot;:&quot;Users_id&quot;,&quot;name&quot;:&quot;user_name&quot;}}, 
&quot;single&quot;, 
true
);"><img src="themes/default/images/id-ff-select.png?v=DVHKHIeLg0xYC4cXKsYGtQ"></button><button type="button" name="btn_clr_user_name" id="btn_clr_user_name" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'user_name', 'Users_id');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png?v=DVHKHIeLg0xYC4cXKsYGtQ"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['EditView_user_name']) != 'undefined'",
		enableQS
);
</script>	
								
						</td>
						
						
						
					</tr> -->
				
				
				
			</table>

			<div class="form-container"> 
				<table border="0" width="100%" align="center"  style="bordercollapse " cellspacing="3" cellpadding="5">
					<tr>	 
						<td>
							<!-- 
								<input name="add_button" type="hidden" id="add_button" size="20" value="Add" />
								<input name="item_count" type="hidden" id="item_count" value="" /> 
							-->
							<input name="clear_button" type="button" id="clear_button"  size="20" value="Clear" onClick="Clear()"/>
							<input name="submit_button" type="submit" id="submit_button"  value="Submit" />
						</td>
					</tr>
				</table>
			</div> 
	</form>


