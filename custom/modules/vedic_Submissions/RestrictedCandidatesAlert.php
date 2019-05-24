<?php
/**
  * FileName => RestrictedCandidatesAlert.php
  * Created By => Udaykiran (Created On Jul-20-2017)
  * Modified By => Udaykiran (Modified On Apr-29-2018)
  * COMMENT => Code to get the stage and status of the profile while doing the submission
  */
if(!defined('sugarEntry')) define('sugarEntry', true);
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
require_once ('include/entryPoint.php');
global $sugar_config,$db;
	
	if(!empty($_REQUEST['prof_id'])){
		$profId = $_REQUEST['prof_id'];
		$canId = $_REQUEST['can_id'];
		if($canId != '')
		{
			$query = $db->query("SELECT vpc.status_c,
									   vpc.stage_c
								FROM vedic_profiles AS vp
								JOIN vedic_profiles_cstm AS vpc ON vp.id=vpc.id_c
								JOIN vedic_candidates_vedic_profiles_1_c AS vcp ON vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb = vpc.id_c
								WHERE vp.deleted=0
								  AND vp.id='$profId'
								  AND vcp.vedic_candidates_vedic_profiles_1vedic_candidates_ida ='$canId'");
		}else{
			//Code to verify the profile status and stage when we don't have the candidate id 
			$query = $db->query("SELECT vpc.status_c,
									   vpc.stage_c
								FROM vedic_profiles AS vp
								JOIN vedic_profiles_cstm AS vpc ON vp.id=vpc.id_c
								JOIN vedic_candidates_vedic_profiles_1_c AS vcp ON vcp.vedic_candidates_vedic_profiles_1vedic_profiles_idb = vpc.id_c
								WHERE vp.deleted=0
								  AND vp.id='$profId'");
		}
		$result = $db->fetchByAssoc($query);
		$stage = $result['stage_c'];
		$status = $result['status_c'];
	
		if($stage == 'Marketing')
		{
			if($status =='Active' || $status == 'Start'){
				$proactive = 1;	
			}else{	
				$proactive =0;
			}
		}
		else{
			$proactive = 0;	
		}
		print_r($proactive);
		print_r("---".$status);
		print_r("---".$stage);	
	}	