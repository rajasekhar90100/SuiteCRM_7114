<?php
/**
  * FileName => BillingPopupView.php
  * Created By => Udaykiran (Created On Jul-12-2017)
  * Modified By => Udaykiran(Modified On Jul-13-2017)
  * COMMENT => custom controller for Candidates popupview while creating the submissions
  */
class BillingPopupView extends vedic_Candidates {
	/**
	  * Function Name => create_new_list_query
	  * Created By => Udaykiran (Created On Jul-12-2017)
	  * Modified By => Udaykiran(Modified On Jul-13-2017)
	  * COMMENT => Build a custom query for Candidates popupview
	  */
    function create_new_list_query($order_by, $where, $filter = array(), $params = array(), $show_deleted = 0, $join_type = '', $return_array = false, $parentbean = null, $singleSelect = false, $ifListForExport = false) {
	    $cstm_query = '';
		if ($_REQUEST['submission'] == 'Marketing' ) {
		    echo $js= <<<EOT
			    <script>
					$(document).ready(function() {
						$("#search_form_clear").prop("disabled",true);
						$("#stage_c_advanced option[value='Marketing']").prop("selected",true);
						$("#stage_c_advanced option[value='Billing']").prop("selected",true);
						$("#status_advanced option[value='Active']").prop("selected",true);
						$("#is_marketable_c_advanced option[value=1]").prop("selected",true);
						// $("#stage_c_advanced").prop("disabled","true"); //Don't disable, search result is not working, it should be only readonly
						// $("#status_advanced").prop("disabled","true"); //Don't disable, search result is not working, it should be only readonly
						$("#is_marketable_c_advanced").prop("disabled","true"); //Don't disable, search result is not working, it should be only readonly
						$("select option[value*='Hiring']").prop('disabled',true);
						$("select option[value*='H1B1']").prop('disabled',true);
						$("select option[value*='Training']").prop('disabled',true);
						$("select option[value*='Premarketing']").prop('disabled',true);
						$("select option[value*='Hired']").prop('disabled',true);
						
						$("select option[value*='Fired']").prop('disabled',true);
						$("select option[value*='Rejected']").prop('disabled',true);
						$("select option[value*='Resigned']").prop('disabled',true);
						$("select option[value*='Start']").prop('disabled',true);
						$("select option[value*='Vacation']").prop('disabled',true);
						$("select option[value*='Rolloff']").prop('disabled',true);
						$("select option[value*='No-Show']").prop('disabled',true);
						$("select option[value*='Fulltime']").prop('disabled',true);
						$("select option[value*='Prospect']").prop('disabled',true);
						$("select option[value*='Hold']").prop('disabled',true);
						$("select option[value*='Pool']").prop('disabled',true);
						$("select option[value*='Complete']").prop('disabled',true);
						$("select option[value*='H1B1 Cancelled']").prop('disabled',true);
						$("select option[value*='Temp']").prop('disabled',true);
				
						
					});
				</script>
EOT;
			$cstm_query['select'] = "SELECT vedic_candidates.id,
										   vedic_candidates_cstm.is_marketable_c,
										   vedic_candidates_cstm.stage_c,
										   LTRIM(RTRIM(CONCAT(IFNULL(vedic_candidates.first_name,''),' ',IFNULL(vedic_candidates.last_name,'')))) AS name,
										   vedic_candidates.status,
										   vedic_candidates.keyskill_list,
										   vedic_candidates.phone_mobile,
										   vedic_candidates.work_experience_years,
										   vedic_candidates.title,
										   vedic_candidates.current_location,
										   vedic_candidates.annual_salary,
										   vedic_candidates.first_name,
										   vedic_candidates.last_name,
										   vedic_candidates.assigned_user_id
									FROM vedic_candidates
									LEFT JOIN vedic_candidates_cstm ON vedic_candidates.id = vedic_candidates_cstm.id_c ";
									
			if(($_REQUEST['vedic_Candidates2_VEDIC_CANDIDATES_ORDER_BY'])&& ($_REQUEST['lvso']))
			{
				$order =$_REQUEST['vedic_Candidates2_VEDIC_CANDIDATES_ORDER_BY'];
				$lvso =$_REQUEST['lvso'];
				
				if(strpos($order, '_c') !== FALSE)
				{
					$order ="vedic_candidates_cstm.".$_REQUEST['vedic_Candidates2_VEDIC_CANDIDATES_ORDER_BY'];
				}
				else{
					if($order =='last_name')
					{
						$order ='name';
					}
					else{
						$order ="vedic_candidates.".$_REQUEST['vedic_Candidates2_VEDIC_CANDIDATES_ORDER_BY'];
					}
				}
				$cstm_query['where'] = "WHERE vedic_candidates.deleted=0
										  AND (vedic_candidates_cstm.stage_c = 'Billing'
											   AND vedic_candidates.status = 'Active'
											   AND vedic_candidates_cstm.is_marketable_c=1)
										  OR (vedic_candidates_cstm.stage_c = 'Marketing'
											  AND vedic_candidates.status = 'Active')
										ORDER BY $order $lvso";
			}
			else
			{
				$cstm_query['where'] = "WHERE vedic_candidates.deleted=0
										  AND (vedic_candidates_cstm.stage_c = 'Billing'
											   AND vedic_candidates.status = 'Active'
											   AND vedic_candidates_cstm.is_marketable_c=1)
										  OR (vedic_candidates_cstm.stage_c = 'Marketing'
											  AND vedic_candidates.status = 'Active')";
			}
			return $cstm_query;
		}
	}
}