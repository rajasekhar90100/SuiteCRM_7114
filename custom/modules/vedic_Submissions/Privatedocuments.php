<?php
/*   
    * FileName => Privatedocuments.php
	* Created By => Rajasekhar Reddy (Modified On Aug-31-2017)
	* Modified By => Udaykiran (Modified On Oct-25-2017)
	* COMMENT => Report for private documents submissions
    */
	 if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	global $db;
	$site_url = $GLOBALS['sugar_config']['site_url'];
	$count=1;
	
	$query = "  SELECT c.first_name,
					   c.last_name,
					   d.document_name,
					   users.first_name AS userfname,
					   users.last_name AS userlname,
					   s.date_entered,
					   d.id AS Documentid,
					   c.id AS Candidateid,
					   s.document_name AS SubmissionName,
					   s.id AS SubmissionId
				FROM `vedic_candidates` c
				JOIN vedic_candidates_vedic_submissions_1_c vs ON c.id = vs.vedic_candidates_vedic_submissions_1vedic_candidates_ida
				JOIN vedic_submissions s ON s.id=vs. vedic_candidates_vedic_submissions_1vedic_submissions_idb
				JOIN documents_vedic_submissions_1_c ds ON ds.documents_vedic_submissions_1vedic_submissions_idb=s.id
				JOIN documents d ON d.id = ds.documents_vedic_submissions_1documents_ida
				JOIN users ON users.id = s.created_by
				JOIN documents_cstm ON d.id=documents_cstm.id_c
				WHERE documents_cstm.is_private_c='1'
				  AND s.date_entered=s.date_modified
				  AND s.deleted='0'";
	 $result = $db->query($query);
	
?>
<!--- code for adding filters(From date and To Date) --->
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
    </style>
            <h2 style="text-align:center;font-size: 20px;"><b>Private Documents Submissions
			    </b>
			</h2>
	<br/>
    <p>
        <form method="post" action = "index.php">
            <input type="hidden" name="action" id="action" value="Loginreport"/>
            <input type="hidden" name="module" id="module" value="Users"/>
            <input type="hidden" name="return_module" id="return_module" value="Users"/>
		</form>
    </p>
    <!--- End of Maneesha's Code --->
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Submission</th>
				<th>Document</th>
                <th>Candidate</th>
                <th>Submitted By</th>
                <th>Date Created</th>
                
            </tr>
        </thead>
        <tbody>
	    <?php
			while($row = $db->fetchByAssoc($result)){
				$DocumentID = $row['Documentid'];
				$CandidateID = $row['Candidateid'];
				$SubmissionID = $row['SubmissionId'];
				$t="<tr>";
				$t.="<td>".$count++."</td>";
				$t.="<td>"."<a href= $site_url/index.php?module=vedic_Submissions&return_module=vedic_Submissions&action=DetailView&record=$SubmissionID>".$row['SubmissionName']."</a>"."</td>";
				$t.="<td>"."<a href= $site_url/index.php?module=Documents&return_module=Documents&action=DetailView&record=$DocumentID>".$row['document_name']."</a>"."</td>";
				$t.="<td>"."<a href= $site_url/index.php?module=vedic_Candidates&return_module=vedic_Candidates&action=DetailView&record=$CandidateID>".$row['first_name']." ".$row['last_name']."</a>"."</td>";
				$t.="<td>".$row['userfname']." ".$row['userlname']."</td>";
				$t.="<td>".$row['date_entered']."</td>";
				$t.="</tr>";
				echo $t;
			}
		?>
        </tbody>
		
    </table>
</html>
