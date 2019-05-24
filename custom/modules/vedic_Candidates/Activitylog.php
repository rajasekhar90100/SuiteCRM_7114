<?php
/*   
    * FileName => Activitylog.php
	* Created By => Lakshmi (created On Aug-09-2017)
	* Modified By => Rajasekhar (Modified On Mar-01-2018)
	* COMMENT => Report to display the profile history
    */
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
global $db,$dictionary,$mod_strings,$app_list_strings;
$count=1;
$site_url = $GLOBALS['sugar_config']['site_url'];
$id = $_REQUEST['record'];
	
	$query = "SELECT name as 'Candidate Name',name as 'Profile Name',stage_c as 'Stage',status_c as 'Status',primary_marketer_c as 'Primary Marketer',secondary_marketer_c as 'Secondary Marketer',hirer_1_c as 'Hirer-1',hirer_2_c as 'Hirer-2',hl_c as 'HL',ml_1_c as 'ML-1',ml_2_c as 'ML-2',slead_c as 'SLead',sales_c as 'Sales',recruiter_c as 'Recruiter',rl_c as 'RL',date_entered as 'Date Created',date_modified as 'Date Modified',modified_user_id as 'Modified By',created_by as 'Created By',candidateid,id  from vedic_Profiles_copy WHERE candidateid='$id'";
	$result = $db->query($query);
	$result2 = $db->query($query);

?>

<html>
<!--<link rel="stylesheet" type="text/css" href="custom/include/javascript/table_sort/css/bootstrapmin.css">-->
<link rel="stylesheet" type="text/css" href="custom/include/javascript/table_sort/css/datatables.css">
<script src="custom/include/javascript/table_sort/javascript/table.js"></script>
<script src="custom/include/javascript/table_sort/javascript/jquery_datatables.js"></script>
<script src="custom/include/javascript/table_sort/javascript/datatables_bootstrap.js"></script>
<style>
.Row
{
    display: table;
    width: 50%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 10px; /*Optional*/
}
.Column
{
    display: table-cell;
   
}
body {
   /* font-size: 12px; */
}
</style>

<br/>
<?php
$columns = array();

while ($row2 = $db->fetchByAssoc($result2)) {
    if (empty($columns)) {
        $columns = array_keys($row2);
    }
}?>
			<h2 style="text-align:center;font-size: 20px;"><b>Candidate History Report
			    </b>
			</h2>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>S.No</th>
	<?php
	$i = 1;
foreach($columns as $cols) {
	if($i <= 19) {
	?>
	
<th><?php echo $cols?></th>
<?php
	}
	$i++;
}
?>
			</tr>
		</thead>
		<tbody>
	    <?php
		
		$columns = array();
			while($row=$db->fetchByAssoc($result)){
				$CID = $row['candidateid'];
				$PID = $row['id'];
				$i = 1;
				$j = 1;
				if (empty($columns)) {
					$columns = array_keys($row);
				}
				$t="<tr>";
				$t.="<td>".$count++."</td>";
				foreach($columns as $cols) {
					if($j <=19) {
						if($i == 1) {
							$t.="<td>"."<a href= $site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$CID target='_blank'>".$row[$cols]."</a>"."</td>";
						}
						else if($i==2)
						{
							$t.="<td>"."<a href= $site_url/index.php?module=vedic_Profiles&return_module=vedic_Profiles&action=DetailView&record=$PID target='_blank'>".$row[$cols]."</a>"."</td>";
						}
						else 
						{
							$t.="<td>".$row[$cols]."</td>";
						}
						$i++;
						$j++;
					}
				}
				$t.="</tr>";
				echo $t;
			}
		?>
        </tbody>
	</table>
</html>  

