<?php 
/**
  * FileName => updateComments.php
  * Created By => Rajasekhar (Created On Jun-27-2018)
  * Modified By => Rajasekhar(Modified On Jun-29-2018)
  * COMMENT => Entry Point file to get values from candidates feedback table.
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/entryPoint.php');
global $db,$sugar_config;
$Userid = $_REQUEST['user'];
$candId = $_REQUEST['canId'];
$getUserDetails =  "SELECT communication_rating,
						   communication_comments,
						   evaluation_rating,
						   evaluation_comments,
						   functional_rating,
						   functional_comments,
						   technical_rating,
						   technical_comments
					FROM candidates_feedback
					WHERE user_id = '$Userid'
					  AND candidate_id = '$candId'";
$getUserResult = $db->query($getUserDetails);
$getUser = $db->fetchByAssoc($getUserResult);
$communicationRating = $getUser['communication_rating'];		   
$communicationComment = $getUser['communication_comments'];		   
$evalutionRating = $getUser['evaluation_rating'];		   
$evaluationComment = $getUser['evaluation_comments'];		   
$functionalRating = $getUser['functional_rating'];		   
$functionalComments = $getUser['functional_comments'];		   
$technicalRating = $getUser['technical_rating'];		   
$technicalComments = $getUser['technical_comments'];		   
print_r($communicationRating.'--'.$communicationComment.'--'.$evalutionRating.'--'.$evaluationComment.'--'.$functionalRating.'--'.$functionalComments.'--'.$technicalRating.'--'.$technicalComments);
?>

