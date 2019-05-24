<?php
/**
  * FileName => POEnddate.php
  * Created By => Lakshmi (Created On Jan-08-2019)
  * Modified By => Lakshmi (Modified On Jan-08-2019)
  * COMMENT => Code to update the Profiles PO Enddate data in Project
  */
class POEnddate{
	function poEnddate(&$bean, $event, $arguments){
		global $db;
		$id = $bean->id;
		$poEndQuery= "select po_end_date_c as POEnddate,vpp.vedic_profiles_project_1project_idb as ProjectId from vedic_profiles_cstm as vpc 
							inner join vedic_profiles as vp on vp.id = vpc.id_c
							inner join vedic_profiles_project_1_c as vpp on vpp.vedic_profiles_project_1vedic_profiles_ida= vp.id 
							where vpp.vedic_profiles_project_1vedic_profiles_ida= '".$id."' and vpp.deleted=0 and vp.deleted=0" ;
		$poEndResult= $db->query($poEndQuery);
		$profilePOEndResult = $db->fetchByAssoc($poEndResult);
		$poEnddate = $profilePOEndResult['POEnddate'];
	    $proid = $profilePOEndResult['ProjectId'];
		$updatePOEnddate = "update project  set po_enddate='$poEnddate' where id='".$proid."'";
		$updatePOEnddate= $db->query($updatePOEnddate);
	}
}		
