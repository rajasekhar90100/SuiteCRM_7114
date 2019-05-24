<?php
/**
  * FileName => RelatedDocumentsAlert.php
  * Created By => Udaykiran (Created On Sep-06-2017)
  * Modified By => Udaykiran (Modified On Apr-29-2018)
  * COMMENT => Code to verify the candidate and documents relation ship,profile document relationship while doing the submission
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
	
	if(!empty($_REQUEST['can_id'])){
		
		$canId = $_REQUEST['can_id'];
		$docId = $_REQUEST['doc_id'];
		$profId = $_REQUEST['prof_id'];

		$query = $db->query("SELECT deleted FROM `vedic_candidates_documents_1_c` where vedic_candidates_documents_1vedic_candidates_ida='".$canId."' and vedic_candidates_documents_1documents_idb ='".$docId."' and deleted = 0");
		$result_can = $db->fetchByAssoc($query);
		$query = $db->query("SELECT deleted FROM `vedic_profiles_documents_1_c` where vedic_profiles_documents_1vedic_profiles_ida='".$profId."' and vedic_profiles_documents_1documents_idb ='".$docId."' and deleted = 0");
		$result_prof = $db->fetchByAssoc($query);
				
	}
	if (!empty($result_can)){
		print_r(($result_can['deleted']).'--'.($result_prof['deleted']));
	}
	else{
		print_r("1");
	}