<?php
/**
  * FileName => Projectvisa.php
  * Created By => Maneesha( Created on Mar-02-2018)
  * Modified By => Maneesha(Modified on Mar-02-2018)
  * Comment => Logic hook update the visa status in project
  */

class Projectvisa{
	
	function Projectvisa(&$bean, $event, $arguments){
		global $db;
		$id = $bean->id;
		$w2ctc_query= "select employee_type_c as EmployeeType,vpp.vedic_profiles_project_1project_idb as ProjectId from vedic_profiles_cstm as vpc 
							inner join vedic_profiles as vp on vp.id = vpc.id_c
							inner join vedic_profiles_project_1_c as vpp on vpp.vedic_profiles_project_1vedic_profiles_ida= vp.id 
							where vpp.vedic_profiles_project_1vedic_profiles_ida= '".$id."' and vpp.deleted=0 and vp.deleted=0" ;
		$w2ctc_result= $db->query($w2ctc_query);
		$w2ctc_rslt = $db->fetchByAssoc($w2ctc_result);
		$w2ctc = $w2ctc_rslt['EmployeeType'];
		$proid = $w2ctc_rslt['ProjectId'];
		$update_visa = "update project_cstm  set w2ctc_c='$w2ctc' where id_c='".$proid."'";
		$update_visa_result= $db->query($update_visa);
	}
	
}