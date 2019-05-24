<?php
/**		
  * FileName => uploadMultipleFiles.php		
  * Modified By => Maneesha (Modified On Dec-28-2018)		
  * COMMENT => Code to display the filename,category,subcategory and immigration,employees,vacations relationship field after files loaded		
  */
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');
require_once('include/QuickSearchDefaults.php');
$qsd = new QuickSearchDefaults();
$parentName = $qsd->getQSParent("vedic_Immigration");
global $app_list_strings;

$list = array();
$documentSubcategory = array();
$documentType = array();
if (isset($app_list_strings['document_category_dom']))
{
    $list = $app_list_strings['document_category_dom'];
}
if (isset($app_list_strings['document_subcategory_dom']))
{
    $documentSubcategory = $app_list_strings['document_subcategory_dom'];
}
if (isset($app_list_strings['document_template_type_dom']))
{
    $documentType = $app_list_strings['document_template_type_dom'];
}
// if(is_array($_FILES)) {
	$c = 0;
	$ename;
	$getVar = $_GET['get_var'];
	$empVar = $_GET['emp_var'];
	$holyVar = $_GET['holy_var'];
	$gcVar = $_GET['gc_var'];
	if($getVar!=''){	
		$getVar2 = $_GET['get_var2'];
		$gname = $_REQUEST['file1'];
	?>
	<head>
	<script type="text/javascript">

	
	function openProductPopup(ln){

	//lineno=ln;
	
	var popupRequestData = {
	"call_back_function" : "set_return",
	"form_name" : "multipleFiles",
	"field_to_name_array" : {
		"id" : "vedic_immigration_id_c_"+ln,
		"name" : "dependent_immigration_c_"+ln,
	}
	};
	
	open_popup('vedic_Immigration', 1200, 800, '', true, true, popupRequestData, "single", true);

	}

	var c = $('#myTable tr').length;
	
	for(var i=0;i<=(c-2);i++)
	{
		console.log(i);
	if(typeof sqs_objects == 'undefined'){
			var sqs_objects = new Array;
		}
		sqs_objects['multipleFiles_dependent_immigration_c_'+i]={
			"form":"multipleFiles",
			"method":"query",
			"modules": ["vedic_Immigration"],
			"field_list":["name","id"],
			"populate_list":["dependent_immigration_c_"+i,"vedic_immigration_id_c_"+i],
			"required_list":["vedic_immigration_id_c_"+i],
			"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
			"limit":"30",
			"no_match_text":"No Match"};
		SUGAR.util.doWhen(
				"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['multipleFiles_dependent_immigration_c_"+i+"']) != 'undefined'",
				enableQS
		);
		
	}
	</script>
	</head>
	<form id="multipleFiles" name="multipleFiles" method="POST">
<table id ="myTable" border="0" width="100%">
<thead>
	<tr>
		<td width="20%"><b>FileName</b></td>
		<td width="10%"><b>Sub Category</b></td>
		<td width="20%"><b>Immigration</b></td>
	</tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($gname);$i++){
?>

<tr>
	<td><p id="filename_<?php echo $c?>"><?php echo $gname[$i]; ?></p></td>
	<td>
	<select name="subcategory_id_<?php echo $c?>" id="subcategory_id_<?php echo $c?>">
		<?php foreach($documentSubcategory as $key => $value) { ?>
		<option label="<?php echo $value?>" value="<?php echo $key?>"><?php echo $key?></option>
		<?php }?>
		</select>
	</td>
	<td>
	<input type="text" name= "dependent_immigration_c_<?php echo $c?>" id="dependent_immigration_c_<?php echo $c?>" value="<?php echo $getVar2?>" class ="sqsEnabled yui-ac-input"/><input type="hidden" name="vedic_immigration_id_c_<?php echo $c?>" id="vedic_immigration_id_c_<?php echo $c?>" value="<?php echo $getVar?>"><button title="Select" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" accesskey="T" type="button" tabindex="116" class="button" value="Select" name="btn1" onclick="openProductPopup(<?php echo $c?>);"><img src="themes/default/images/id-ff-select.png" alt="Select"></button><button type="button" name="btn_clr1" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" id="btn_clr1" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'dependent_immigration_c_<?php echo $c?>', 'vedic_immigration_id_c_<?php echo $c?>');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
	</td>
</tr>


<?php
$c++;
}

?>
</tbody>
</table>
</form>
<?php
		}
		/* Start of code to get the variables for the GC documents uploads-By Maneesha(Dec-28-2018) */
	if($gcVar!=''){
		$getVar = $_GET['gc_var'];
		$getVar2 = $_GET['gc_var2'];
		$gname = $_REQUEST['file1'];
		// $gname = explode(",",$getVar3);
	?>
	<head>
	<script type="text/javascript">

	
	function openProductPopup(ln){

	//lineno=ln;
	
	var popupRequestData = {
	"call_back_function" : "set_return",
	"form_name" : "multipleFiles",
	"field_to_name_array" : {
		"id" : "vedic_gc_id_c_"+ln,
		"name" : "dependent_gc_c_"+ln,
	}
	};
	
	open_popup('vedic_GC', 1200, 800, '', true, true, popupRequestData, "single", true);

	}

	var c = $('#myTable tr').length;
	
	for(var i=0;i<=(c-2);i++)
	{
		console.log(i);
	if(typeof sqs_objects == 'undefined'){
			var sqs_objects = new Array;
		}
		sqs_objects['multipleFiles_dependent_gc_c_'+i]={
			"form":"multipleFiles",
			"method":"query",
			"modules": ["vedic_GC"],
			"field_list":["name","id"],
			"populate_list":["dependent_gc_c_"+i,"vedic_gc_id_c_"+i],
			"required_list":["vedic_gc_id_c_"+i],
			"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
			"limit":"30",
			"no_match_text":"No Match"};
		SUGAR.util.doWhen(
				"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['multipleFiles_dependent_gc_c_"+i+"']) != 'undefined'",
				enableQS
		);
		
	}
	</script>
	</head>
	<form id="multipleFiles" name="multipleFiles" method="POST">
<table id ="myTable" border="0" width="100%">
<thead>
	<tr>
		<td width="20%"><b>FileName</b></td>
		<td width="5%"><b>Document Type</b></td>
		<td width="20%"><b>Gc</b></td>
	</tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($gname);$i++){
?>


<tr>
	<td><p id="filename_<?php echo $c?>"><?php echo $gname[$i]; ?></p></td>
	<td>
		<select name="template_type_<?php echo $c?>" id="template_type_<?php echo $c?>">
			<?php foreach($documentType as $key => $value) { ?>
			<option label="<?php echo $value?>" value="<?php echo $key?>"><?php echo $key?></option>
			<?php }?>
		</select>
	</td>
	<td>
	<input type="text" name= "dependent_gc_c_<?php echo $c?>" id="dependent_gc_c_<?php echo $c?>" value="<?php echo $getVar2?>" class ="sqsEnabled yui-ac-input"/><input type="hidden" name="vedic_gc_id_c_<?php echo $c?>" id="vedic_gc_id_c_<?php echo $c?>" value="<?php echo $getVar?>"><button title="Select" accesskey="T" type="button" tabindex="116" class="button" value="Select" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" name="btn1" onclick="openProductPopup(<?php echo $c?>);"><img src="themes/default/images/id-ff-select.png" alt="Select"></button><button type="button" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" name="btn_clr1" id="btn_clr1" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'dependent_gc_c_<?php echo $c?>', 'vedic_gc_id_c_<?php echo $c?>');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
	</td>
</tr>


<?php
$c++;
}

?>
</tbody>
</table>
</form>
	<?php
	}
	/* End of code to get the variables for the GC documents uploads-By Maneesha(Dec-28-2018) */
		
		
		if($empVar!=''){
			$getVar = $_GET['emp_var'];
			$getVar2 = $_GET['emp_var2'];
			$gname = $_REQUEST['file1'];
			// $gname = explode(",",$getVar3);
		?>
		<head>
		<script type="text/javascript">
	
		
		function openProductPopup(ln){
	
		//lineno=ln;
		
		var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "multipleFiles",
		"field_to_name_array" : {
			"id" : "vedic_employees_id_c_"+ln,
			"name" : "dependent_employees_c_"+ln,
		}
		};
		
		open_popup('vedic_Employees', 1200, 800, '', true, true, popupRequestData, "single", true);
	
		}
	
		var c = $('#myTable tr').length;
		
		for(var i=0;i<=(c-2);i++)
		{
			console.log(i);
		if(typeof sqs_objects == 'undefined'){
				var sqs_objects = new Array;
			}
			sqs_objects['multipleFiles_dependent_employees_c_'+i]={
				"form":"multipleFiles",
				"method":"query",
				"modules": ["vedic_Employees"],
				"field_list":["name","id"],
				"populate_list":["dependent_employees_c_"+i,"vedic_employees_id_c_"+i],
				"required_list":["vedic_employees_id_c_"+i],
				"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
				"limit":"30",
				"no_match_text":"No Match"};
			SUGAR.util.doWhen(
					"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['multipleFiles_dependent_employees_c_"+i+"']) != 'undefined'",
					enableQS
			);
			
		}
		</script>
		</head>
		<form id="multipleFiles" name="multipleFiles" method="POST">
	<table id ="myTable" border="0" width="100%">
	<thead>
		<tr>
			<td width="20%"><b>FileName</b></td>
			<td width="5%"><b>Sub Category</b></td>
			<td width="5%"><b>Document Type</b></td>
			<td width="20%"><b>Employees</b></td>
		</tr>
	</thead>
	<tbody>
	<?php
	for($i=0;$i<count($gname);$i++){
	?>
	
	
	<tr>
		<td><p id="filename_<?php echo $c?>"><?php echo $gname[$i]; ?></p></td>
		<td>
		<select name="subcategory_id_<?php echo $c?>" id="subcategory_id_<?php echo $c?>">
			<?php foreach($documentSubcategory as $key => $value) { ?>
			<option label="<?php echo $value?>" value="<?php echo $key?>"><?php echo $key?></option>
			<?php }?>
			</select>
		</td>
		<td>
		<select name="template_type_<?php echo $c?>" id="template_type_<?php echo $c?>">
			<?php foreach($documentType as $key => $value) { ?>
			<option label="<?php echo $value?>" value="<?php echo $key?>"><?php echo $key?></option>
			<?php }?>
			</select>
		</td>
		<td>
		<input type="text" name= "dependent_employees_c_<?php echo $c?>" id="dependent_employees_c_<?php echo $c?>" value="<?php echo $getVar2?>" class ="sqsEnabled yui-ac-input"/><input type="hidden" name="vedic_employees_id_c_<?php echo $c?>" id="vedic_employees_id_c_<?php echo $c?>" value="<?php echo $getVar?>"><button title="Select" accesskey="T" type="button" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" tabindex="116" class="button" value="Select" name="btn1" onclick="openProductPopup(<?php echo $c?>);"><img src="themes/default/images/id-ff-select.png" alt="Select"></button><button type="button" name="btn_clr1" id="btn_clr1" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'dependent_employees_c_<?php echo $c?>', 'vedic_employees_id_c_<?php echo $c?>');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
		</td>
	</tr>
	
	
	<?php
	$c++;
	}
	
	?>
	</tbody>
	</table>
	</form>
		<?php
		}if($holyVar!=''){
			$getVar = $_GET['holy_var'];
			$getVar2 = $_GET['holy_var2'];
			$gname = $_REQUEST['file1'];
			// $gname = explode(",",$getVar3);
		?>
		<head>
		<script type="text/javascript">
	
		
		function openProductPopup(ln){
	
		//lineno=ln;
		
		var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "multipleFiles",
		"field_to_name_array" : {
			"id" : "vedic_holydays_id_c_"+ln,
			"name" : "dependent_holydays_c_"+ln,
		}
		};
		
		open_popup('vedic_Holydays', 1200, 800, '', true, true, popupRequestData, "single", true);
	
		}
	
		var c = $('#myTable tr').length;
		
		for(var i=0;i<=(c-2);i++)
		{
			console.log(i);
		if(typeof sqs_objects == 'undefined'){
				var sqs_objects = new Array;
			}
			sqs_objects['multipleFiles_dependent_holydays_c_'+i]={
				"form":"multipleFiles",
				"method":"query",
				"modules": ["vedic_Holydays"],
				"field_list":["name","id"],
				"populate_list":["dependent_holydays_c_"+i,"vedic_holydays_id_c_"+i],
				"required_list":["vedic_holydays_id_c_"+i],
				"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
				"limit":"30",
				"no_match_text":"No Match"};
			SUGAR.util.doWhen(
					"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['multipleFiles_dependent_holydays_c_"+i+"']) != 'undefined'",
					enableQS
			);
			
		}
		</script>
		</head>
		<form id="multipleFiles" name="multipleFiles" method="POST">
	<table id ="myTable" border="0" width="100%">
	<thead>
		<tr>
			<td width="20%"><b>FileName</b></td>
			<td width="20%"><b>Vacations</b></td>
		</tr>
	</thead>
	<tbody>
	<?php
	for($i=0;$i<count($gname);$i++){
	?>
	
	
	<tr>
		<td><p id="filename_<?php echo $c?>"><?php echo $gname[$i]; ?></p></td>
		<td>
		<input type="text" name= "dependent_holydays_c_<?php echo $c?>" id="dependent_holydays_c_<?php echo $c?>" value="<?php echo $getVar2?>" class ="sqsEnabled yui-ac-input"/><input type="hidden" name="vedic_holydays_id_c_<?php echo $c?>" id="vedic_holydays_id_c_<?php echo $c?>" value="<?php echo $getVar?>"><button title="Select" accesskey="T" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" type="button" tabindex="116" class="button" value="Select" name="btn1" onclick="openProductPopup(<?php echo $c?>);"><img src="themes/default/images/id-ff-select.png" alt="Select"></button><button type="button" style = "padding: 0 10px 0 10px; margin: 5px 5px 5px 0;height: 32px;" name="btn_clr1" id="btn_clr1" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'dependent_holydays_c_<?php echo $c?>', 'vedic_holydays_id_c_<?php echo $c?>');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
		</td>
	</tr>
	
	
	<?php
	$c++;
	}
	
	?>
	</tbody>
	</table>
	</form>
		<?php
		}