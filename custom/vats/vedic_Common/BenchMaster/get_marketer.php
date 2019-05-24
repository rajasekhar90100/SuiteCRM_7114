<?php
/**
  * FileName => get_marketer.php
  * Created By => Lakshmi (Created On Apr-09-2018)
  * Modified By => Lakshmi (Modified On Apr-11-2018)
  * COMMENT => Code to get the all marketers
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
global $db;
// $dir = dirname(__DIR__);
include_once('custom/include/language/en_us.lang.php');
$stack = array();
	
	$res = $db->query("select users.id as id, concat(COALESCE(users.first_name,' '),' ', users.last_name) AS name from  users INNER JOIN securitygroups_users ON users.id = securitygroups_users.user_id 
    WHERE securitygroup_id = '233a3114-7ecb-0940-8085-567445f909d3' AND securitygroups_users.deleted=0 AND users.deleted=0 order by users.first_name asc");
	
	while ($row = $db->fetchByAssoc($res)) {
    $name = $row['name'];
	$id = $row['id'];
    array_push($stack,array($name,$id));
  }
	
array_unshift($stack,array('',''));	
echo json_encode($stack);
