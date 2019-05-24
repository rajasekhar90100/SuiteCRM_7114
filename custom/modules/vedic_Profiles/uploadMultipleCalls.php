<?php
/**
  * FileName => uploadMultipleCalls.php
  * Created By => Udaykiran (Modified On Ocr-19-2018)
  * Modified By => Udaykiran (Modified On Ocr-19-2018)
  * COMMENT => Code to display the from,to date fields of notes module after files loaded. 
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
$uniq = $_REQUEST['uniq'];

if(!empty($gname)){
?>
	<head>
	<style>	
		#myTable, th, td {border: 1px;    padding: 9px;}
	</style>
	<script>
	$(document).ready(function() {
		var c = $('#myTable tr').length;
		for(var i=0;i<=c;i++)
		{
			$("#from_date_"+i).datepicker({
				todayHighlight: true,
				format: 'mm/dd/yyyy'
			});
			$("#to_date_"+i).datepicker({
				todayHighlight: true,
				format: 'mm/dd/yyyy'
			});
		}
	});
	</script>
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
					
					<td>
						From Date:
						<span class="required">*</span>
					</td>
					<td>
						<input class="date_input" autocomplete="off" type="text" name="from_date_<?php echo $c?>" id="from_date_<?php echo $c?>" value="" title=""  tabindex="0" size="11" maxlength="10">
					</td>
					<td>
						To Date:
						<span class="required">*</span>
					</td>
					<td>
						<input class="date_input" autocomplete="off" type="text" name="to_date_<?php echo $c?>" id="to_date_<?php echo $c?>" value="" title="" tabindex="0" size="11" maxlength="10">
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
