<?php
class vedic_CandidatesController extends SugarController{
	function vedic_CandidatesController(){
		parent::SugarController();
	}
	
	function action_reportcandidates(){
		$this->view = 'reportcandidates';
	}
	/**
      * Function => action_popup()
	  * Modified By => Udaykiran (Modified On Jul-28-2017)
      * COMMENT => controller for candidates when popview is loaded from the submissions module	
      */
	// function action_popup() {
		// require_once "custom/modules/vedic_Candidates/BillingPopupView.php";
		// $this->view = "popup";
		
		// if ($_REQUEST['submission'] == 'Marketing' && ($_GET['action'] != 'index')) {
			// $this->bean = new BillingPopupView();
		// }
	// }
	/* Start of code for adding custom controller 'finance' - By Maneesha(Dec-20-2018) */
	function action_finance(){
		$this->view = 'finance';
	}
	/* End of code for adding custom controller 'finance' - By Maneesha(Dec-20-2018) */
}
?>