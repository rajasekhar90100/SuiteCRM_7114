<?php
/**
  * FileName => UpdateFeedback.php
  * CreatedBy => Rajasekhar(Created on Jun-27-2018)
  * Modified By => Udaykiran(Modified on July-06-2018)
  * Comment => logic hook file to insert feedback information in candidatefeedback table.
  */
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}		
class UpdateFeedback 
{
	/**  
      * Function => updateFeedback()
	  * CreatedBy => Rajasekhar(Created on Jun-27-2018)
      * Modified By => Udaykiran (Modified On July-06-2018)
      * COMMENT => To insert/ipdate feedback information in candidatefeedback table.
      */
	function updateFeedback(&$bean, $event, $arguments) 
	{
		global $db, $current_user,$app_list_strings,$sugar_config,$timedate;
		$id = $bean->id;
		if(!empty($id)) {
			$communicationRating = $bean->communication_rating;
			$functionalRating = $bean->functional_rating;
			$evaluationRating = $bean->evaluation_rating;
			$technicalRating = $bean->technical_rating;	
			$technicalComments = $bean->technical_comments;	
			$evaluationComments = $bean->evaluation_comments;	
			$functionalComments = $bean->functional_comments;	
			$communicationComments = $bean->communication_comments;
			$userId = $current_user->id;
			$commentBy = $bean->comments_by;
			$userFName = $current_user->first_name;
			$userLName = $current_user->last_name;
			$fullName = $userFName." ".$userLName;
			$dateModified = $bean->date_modified;
			$timeDate = new TimeDate();
			$dateCreated = $timedate->getInstance()->nowDb();
			
			if($communicationRating != 0 || $functionalRating != 0 || $evaluationRating != 0 || $technicalRating != 0 || !empty($technicalComments) || !empty($evaluationComments) || !empty($functionalComments) || !empty($communicationComments)) {
				$query = $db->query("select count(*) as COUNT from candidates_feedback where user_id ='$userId' AND candidate_id ='$id'");
				$result = $db->fetchByAssoc($query);
				if($result['COUNT'] == 0 && empty($bean->comments_by)) {
					$db->query("INSERT into candidates_feedback (user_id,username,candidate_id,date_entered,date_modified,communication_comments,communication_rating,technical_comments,technical_rating,functional_comments,functional_rating,evaluation_comments,evaluation_rating) VALUES('$userId','$fullName','$id','$dateCreated','$dateModified','$communicationComments','$communicationRating','$technicalComments','$technicalRating','$functionalComments','$functionalRating','$evaluationComments','$evaluationRating')");
				} 
				else {
					if(($bean->comments_by == $userId) || ($result['COUNT'] > 0 && empty($bean->comments_by))) {
						$db->query("UPDATE candidates_feedback 
						SET date_modified='$dateModified',communication_comments='$communicationComments',communication_rating='$communicationRating',technical_comments='$technicalComments',technical_rating='$technicalRating',functional_comments='$functionalComments',functional_rating='$functionalRating',evaluation_comments='$evaluationComments',evaluation_rating='$evaluationRating',username='$fullName' where candidate_id='$id' and user_id='$userId'");
					}
				}
			}
		}
	}
}