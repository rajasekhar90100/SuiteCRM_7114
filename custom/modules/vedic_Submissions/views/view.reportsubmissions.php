<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');

class vedic_SubmissionsViewreportsubmissions extends ViewDetail
{
 	/**
     * @see SugarView::process()
     */
   function vedic_SubmissionsViewreportsubmissions(){
		parent::ViewDetail();
	}
 	/**
     * @see SugarView::display()
     */
    public function display()
    {
        include("custom/modules/vedic_Submissions/submissionsreport.php");
 	}	
}