<?php
	if(isset($_POST['submit_button']) &&  !empty($_POST['from_c'])  ){
		include("candidatesstatistics.php");
		//print_r($_POST);
	}else if(isset($_POST['submit_button'])){
		echo "<script>  alert('Please enter from date') </script>";
	}
	//	global $mod_strings;
?>

<script>
	function Clear(){
		document.getElementById("from_c").value = "";
		document.getElementById("to_c").value = "";
	}
</script>
<style>		
	input#clear_button {		
		color: #f7971b;		
		background-color: white;		
		border-color: #f7971b;		
		border: 1px solid;		
	}		
	input#clear_button:hover{		
		color: white;		
		background-color: #f7971b;		
	}		
	input#submit_button {		
		color: #f7971b;		
		background-color: white;		
		border-color: #f7971b;		
		border: 1px solid;		
	}		
	input#submit_button:hover{		
		color: white;		
		background-color: #f7971b;		
	}		
	</style>

<h1>Consultants Statistics</h1>

<br><br>
	<form id="form1" name="form1" method="post" action="">
		<input type="hidden" name="reload" id="reload" value="<?php echo rand(100000,200000); ?>">
			<table>

				<tr>
					<td valign="top" id="valid_from_c_label" width="12.5%" scope="col"> 
						From : 	<span class="required">*</span>  				
					</td>
					<td valign="top" width="37.5%">  
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
						To: <!-- <span class="required">*</span> -->
					</td>
					<td valign="top" width="37.5%"> 
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


