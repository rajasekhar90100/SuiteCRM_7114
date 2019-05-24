<?php
/**  
  * FileName => Candidatefeedback.php
  * Created By => Rajasekhar (Created On Jun-01-2018)
  * Modified By => Rajasekhar (Modified On July-06-2018)
  * COMMENT => Report to display all candidates feedback related to particular job
  */
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
global $db,$dictionary,$mod_strings,$app_list_strings;
$count=1;
$site_url = $GLOBALS['sugar_config']['site_url'];
$id = $_REQUEST['record'];
	$query = "SELECT CONCAT(COALESCE(vedic_candidates.first_name, ' '), ' ', vedic_candidates.last_name) AS 'CandidateName',
					candidates_feedback.username AS 'UserName',
				   candidates_feedback.communication_rating AS 'CommunicationRating',
				   candidates_feedback.communication_comments AS 'CommunicationComments',
				   candidates_feedback.technical_rating AS 'TechnicalRating',
				   candidates_feedback.technical_comments AS 'TechnicalComments',
				   candidates_feedback.functional_rating AS 'FunctionalRating',
				   candidates_feedback.functional_comments AS 'FunctionalComments', 
				   candidates_feedback.evaluation_rating AS 'EvaluationRating',
				   candidates_feedback.evaluation_comments AS 'EvaluationComments',
				   vedic_candidates.id AS 'cid'
				FROM vedic_candidates
				INNER JOIN vedic_job_vedic_candidates_1_c ON vedic_job_vedic_candidates_1_c.vedic_job_vedic_candidates_1vedic_candidates_idb=vedic_candidates.id
				INNER JOIN vedic_job ON vedic_job_vedic_candidates_1_c.vedic_job_vedic_candidates_1vedic_job_ida=vedic_job.id
				INNER JOIN candidates_feedback ON candidates_feedback.candidate_id=vedic_candidates.id
				WHERE vedic_candidates.deleted='0'
				  AND vedic_job.id='$id'
				  AND vedic_job.deleted='0'";
	$result = $db->query($query);
	$result2 = $db->query($query);
?>
<html>
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
	<h2 style="text-align:center;font-size: 20px;"><b>Candidates Feedback Report</b></h2>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th></th>
				<th></th>
				<th></th>
				<th colspan="2"> Communication</th>
				<th colspan="2"> Technical</th>
				<th colspan="2"> Functional</th>
				<th colspan="2"> Evaluation</th>
				</tr>
			<tr>
				<th>S.No</th>
				<th>Candidate Name</th>
				<th>Feedback Given By</th>
				<th>Rating</th>
				<th>Comments</th>
				<th>Rating</th>
				<th>Comments</th>
				<th>Rating</th>
				<th>Comments</th>
				<th>Rating</th>
				<th>Comments</th>
			</tr>
		</thead>
		<tbody>
<?php		
		while($row[]=$db->fetchByAssoc($result)){}
		
		array_pop($row);

		$data2 = array();
		foreach($row as $value) {
			
			$key = $value['CandidateName'];
			if(!isset($data2[$key])) {
				$data2[$key] = array(
					'Id'=> $value['cid'],
					'CandidateName'=> $value['CandidateName'],
					'UserName'=>array(),
					'CommunicationRating'=>array(),
					'CommunicationComments'=>array(),
					'TechnicalRating'=>array(),
					'TechnicalComments'=>array(),
					'FunctionalRating'=>array(),
					'FunctionalComments'=>array(),
					'EvaluationRating'=>array(),
					'EvaluationComments'=>array()
				);
			}
			$data2[$key]['UserName'][] = $value['UserName'];
			$data2[$key]['CommunicationRating'][] = $value['CommunicationRating'];
			$data2[$key]['CommunicationComments'][] = $value['CommunicationComments'];
			$data2[$key]['TechnicalRating'][] = $value['TechnicalRating'];
			$data2[$key]['TechnicalComments'][] = $value['TechnicalComments'];
			$data2[$key]['FunctionalRating'][] = $value['FunctionalRating'];
			$data2[$key]['FunctionalComments'][] = $value['FunctionalComments'];
			$data2[$key]['EvaluationRating'][] = $value['EvaluationRating'];
			$data2[$key]['EvaluationComments'][] = $value['EvaluationComments'];
		}

		$i=0;
		foreach($data2 as $report) {

			$rowCount = count($report['UserName']);
			$userName = $report['UserName'];
			$CandName = $report['CandidateName'];
			$candId = $report['Id'];
			$commRating = $report['CommunicationRating'];
			$commComments = $report['CommunicationComments'];
			$techRating= $report['TechnicalRating'];
			$techComments= $report['TechnicalComments'];
			$functRating= $report['FunctionalRating'];
			$functComments= $report['FunctionalComments'];
			$evalRating= $report['EvaluationRating'];
			$evalComments= $report['EvaluationComments'];	
	
			$t.= "<tr>";
			$t.="<td  style='vertical-align:middle;'>".$count++."</td>";
			$t.="<td  style='vertical-align:middle;'>".
			"<a href=$site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$candId>".
			$CandName."</a>"."</td>";
			for($i=0;$i<$rowCount;$i++)	{
				if($i==0) {	
					$uName="<p>".$userName[$i]."</p><br/>";	
				}
				else {
					$uName.="<p>".$userName[$i]."</p><br/>";
				}
			}
			$t.="<td>".$uName."</td>";
			for($i=0;$i<$rowCount;$i++)	{
				if($i==0) {	
					$comRating="<p>".$commRating[$i]."</p><br/>";
				}
				else {
					$comRating.="<p>".$commRating[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$comRating."</td>";
			for($i=0;$i<$rowCount;$i++)	{
				if($i==0) {	
					$comComments="<p>".$commComments[$i]."</p><br/>";	
				}
				else {
					$comComments.="<p>".$commComments[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$comComments."</td>";
			for($i=0;$i<$rowCount;$i++) {
				if($i==0) {	
					$tecRating="<p>".$techRating[$i]."</p><br/>";
				}
				else {
					$tecRating.="<p>".$techRating[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$tecRating."</td>";
			for($i=0;$i<$rowCount;$i++)	{
				if($i==0) {	
					$tecComments="<p>".$techComments[$i]."</p><br/>";
				}
				else {
					$tecComments.="<p>".$techComments[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$tecComments."</td>";
			for($i=0;$i<$rowCount;$i++) {
				if($i==0) {	
					$funRating="<p>".$functRating[$i]."</p><br/>";		
				}
				else {
					$funRating.="<p>".$functRating[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$funRating."</td>";
			for($i=0;$i<$rowCount;$i++) {
				if($i==0) {	
					$funComments="<p>".$functComments[$i]."</p><br/>";
				}
				else {
					$funComments.="<p>".$functComments[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$funComments."</td>";
			for($i=0;$i<$rowCount;$i++) {
				if($i==0) {	
					$evRating="<p>".$evalRating[$i]."</p><br/>";
				}
				else {
					$evRating.="<p>".$evalRating[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$evRating."</td>";
			for($i=0;$i<$rowCount;$i++)	{
				if($i==0) {	
					$evRating="<p>".$evalComments[$i]."</p><br/>";			
				}
				else {
					$evRating.="<p>".$evalComments[$i]."</p><br/>";	
				}
			}
			$t.="<td>".$evRating."</td>";		
		}	
		echo $t;
		?>
        </tbody>
	</table>
</html>