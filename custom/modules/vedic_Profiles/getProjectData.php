<?php
/**
  * FileName => getProjectData.php
  * Created By => Udaykiran (Created On Feb-12-2018)
  * Modified By => Lakshmi (Modified On Jan-01-2019)
  * COMMENT => Code to Auto populate the Project Start date and Project End Date in the Profiles edit view
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
$projectId = $_REQUEST['project_id'];
if($projectId!='') {
	$query = $db->query("SELECT project.estimated_start_date,project.estimated_end_date,project.po_enddate As POEnd,acc.name 
						 FROM project 
						 LEFT JOIN project_cstm AS pc ON pc.id_c=project.id 
						 LEFT JOIN accounts AS acc ON acc.id=pc.account_id_c 
						 WHERE project.id='$projectId' 
						   AND project.deleted=0 
						   AND acc.deleted=0;");
	$result = $db->fetchByAssoc($query);
	$proStart = $result['estimated_start_date'];
	$proEnd = $result['estimated_end_date'];
	$chName = $result['name'];
	$poEnd = $result['POEnd'];
	print_r($proStart.'---'.$proEnd.'---'.$chName.'---'.$poEnd);
}