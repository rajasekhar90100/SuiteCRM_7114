<?php
/*   
    * FileName => logic_hooks.php
	* Created By =>Maneesha (Created On Feb-21-2018)
	* Modified By => Maneesha (Modified On Feb-26-2018)
	* COMMENT => after_save logic hook file to link Projects and candidate 
    */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Profileprojectrelation{

	function Profileprojectrelation(&$bean, $event, $arguments){
	
		global $db;
		
		$id = $bean->id;
		
		$Projectid = $bean->vedic_profiles_project_1project_idb;
		
		$candidateisd= "Select vedic_candidates_vedic_profiles_1vedic_candidates_ida as CanId from vedic_candidates_vedic_profiles_1_c where 		   vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb= '".$id."' and deleted=0";
		
		$result = $db->query($candidateisd);
		
		$row =  $db->fetchByAssoc($result);
		
		$canId = $row['CanId'];
		
		$project_id = "select vedic_candidates_project_1project_idb as Proid from vedic_candidates_project_1_c where vedic_candidates_project_1vedic_candidates_ida='".$canId."' and deleted=0";
		$pro_id =  $db->query($project_id);
		while($row1 =$db->fetchByAssoc($pro_id)){
			$proid[] = $row1['Proid'];
		}
		    
		if(in_array($Projectid,$proid)){
			// $GLOBALS['log']->fatal("project id:".$project_id);
		}
		else{
			$id_new = create_guid();
			$date_modified =  date("Y-m-d");
			$update_query = "Insert into vedic_candidates_project_1_c (id,date_modified,deleted,vedic_candidates_project_1vedic_candidates_ida,vedic_candidates_project_1project_idb)
								values('$id_new','$date_modified','0','$canId','$Projectid')";
		
			$insert_query = $db->query($update_query);
		}
		
	}
	
}