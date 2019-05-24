<?php
/**
  * FileName => view.detail.php
  * Modified By => Udaykiran (Modified On Nov-04-2017)
  * COMMENT => Custom code for submissions detail view
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class vedic_SubmissionsViewDetail extends ViewDetail {
	function vedic_SubmissionsViewDetail(){
		parent::ViewDetail();
	}
	/**
	  * Function => display()
	  * Modified By => Udaykiran (Modified On Nov-04-2017)
	  * COMMENT => code to unset the resume file field when there is a relationship with documents
	  */
	function display(){
	
		global $db;
		$jobid = $this->bean->vedic_job_vedic_submissions_1vedic_job_ida; 
		
		$job_obj = new vedic_job();
		$job_obj->retrieve($jobid); // job_listing_c
		$this->ss->assign('job_listing', html_entity_decode($job_obj->job_listing_c));

		$id = $this->bean->id;
		$uploadType = $this->bean->submission_resume_type_c;
		$docName = $this->bean->documents_vedic_submissions_1documents_ida;
		if($uploadType =='Manual_Submission'){
			if($docName!='')
			{
			unset($this->dv->defs['panels']['default'][1]);
			}
		}
		if($docName!='')
		{
			
			$query = $db->query("SELECT document_revisions.id,
									   filename
								FROM document_revisions
								WHERE document_id ='".$docName."'");
			$result = $db->fetchByAssoc($query);
			$revId = $result['id'];
			$attchment_name = $result['filename'];
			echo $data = <<<EOT
			<script>
				$(document).ready(function(){				
					var revisionID = '$revId';
					var url ="index.php?module=DocumentRevisions&action=DetailView&record="+revisionID;
					$("#documents_vedic_submissions_1documents_ida").closest( 'a').attr("href",url);
				});
			</script>
EOT;
		}
		echo "
		<style> 
				[field='vedic_job_vedic_submissions_1_name'] {
					width: 78% !important;
				}
				[field='subject_c'] {
					width: 78% !important;
				}
		</style>";
		
		if($uploadType =='Candidate_Documents')
		{			
			unset($this->dv->defs['panels']['default'][1]);
		}
		parent::display();
	}
}

?>