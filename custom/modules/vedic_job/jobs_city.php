<?php
//require_once("custom/library/sendMail.php");
class JobCity{
	function Location(&$bean, $event, $arguments){	
		$bean->job_location_c = ucfirst($bean->job_location_c); 
		if(empty($bean->job_listing_c)){
			$bean->job_listing_c = $bean->description;
		}
		
	}
}

?>