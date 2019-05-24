<?php
/**
  * FileName => popupCandidate.php
  * Created By => Udaykiran (Created On Oct-04-2017)
  * Modified By => Udaykiran (Modified On Apr-29-2018)
  * COMMENT => Code to Auto populate the candidate,profile while creating the submission from the documents subpanel 
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
	$docId = $_REQUEST['docID'];
	$profId = $_REQUEST['profID'];
	if($docId!='')
	{
		$query = $db->query("SELECT vedic_candidates.id,
								   concat(COALESCE(vedic_candidates.first_name,' '),' ', vedic_candidates.last_name) AS candidate_name
							FROM vedic_candidates
							JOIN vedic_candidates_documents_1_c ON vedic_candidates.id = vedic_candidates_documents_1_c.vedic_candidates_documents_1vedic_candidates_ida
							WHERE vedic_candidates_documents_1_c.vedic_candidates_documents_1documents_idb ='$docId'
							  AND vedic_candidates_documents_1_c.deleted=0
							  AND vedic_candidates.deleted=0");
		$result = $db->fetchByAssoc($query);
		$canID = $result['id'];
		$canName = $result['candidate_name'];
		$query = $db->query("SELECT vedic_profiles.id,
								   concat(COALESCE(vedic_profiles.first_name,' '),' ', vedic_profiles.last_name) AS profile_name
							FROM vedic_profiles
							JOIN vedic_profiles_documents_1_c ON vedic_profiles.id = vedic_profiles_documents_1_c.vedic_profiles_documents_1vedic_profiles_ida
							WHERE vedic_profiles_documents_1_c.vedic_profiles_documents_1documents_idb ='$docId'
							  AND vedic_profiles_documents_1_c.deleted=0
							  AND vedic_profiles.deleted=0");
		$result = $db->fetchByAssoc($query);
		$profID = $result['id'];
		$profName = $result['profile_name'];
		
		print_r($canID.'--'.$canName.'--'.$profID.'--'.$profName);
	}
	if($profId!='')
	{
		$query = $db->query("SELECT vedic_candidates.id,
								   concat(COALESCE(vedic_candidates.first_name,' '),' ', vedic_candidates.last_name) AS candidate_name
							FROM vedic_candidates
							JOIN vedic_candidates_vedic_profiles_1_c ON vedic_candidates.id = vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_candidates_ida
							WHERE vedic_candidates_vedic_profiles_1_c.vedic_candidates_vedic_profiles_1vedic_profiles_idb ='$profId'
							  AND vedic_candidates_vedic_profiles_1_c.deleted=0
							  AND vedic_candidates.deleted=0");
		$result = $db->fetchByAssoc($query);
		$canID = $result['id'];
		$canName = $result['candidate_name'];
		print_r($canID.'--'.$canName);
	}
	