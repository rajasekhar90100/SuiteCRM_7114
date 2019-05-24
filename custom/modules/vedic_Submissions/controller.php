<?php
class vedic_SubmissionsController extends SugarController{
	function vedic_SubmissionsController(){
		parent::SugarController();
	}
	
	function action_reportsubmissions(){
		$this->view = 'reportsubmissions';
	}
}
?>