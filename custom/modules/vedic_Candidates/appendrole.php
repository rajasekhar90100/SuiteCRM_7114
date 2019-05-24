<?php
/**
  * FileName => roleappend.php
  * CreatedBy => Lakshmi(Created on July-17-2018)
  * Modified By => Lakshmi(Modified on July-18-2018)
  * Comment => logic hook file to append role when selecting in append to sap consultant dom.
  */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class AppendRole 
{
	/**  
      * Function => roleAppend()
	  * CreatedBy => Lakshmi(Created on July-17-2018)
      * Modified By => Lakshmi(Modified on July-18-2018)
      * COMMENT => Append  which are not present in role list DOM
      */
	function roleAppend(&$bean, $event, $arguments) 
	{
		global $db, $current_user,$app_list_strings,$sugar_config;
		$id = $bean->id;
		$type=$bean->type_hiring;
		if($id && $type != 'Us_staffing')	{
			$roleType = $bean->role_c;
			$totalroleType = $app_list_strings['SAP_consultant_level_list'];
			//Comparing roleType
			$roleList = strtoupper($roleType);
			$totalroleType= array_change_key_case($totalroleType,CASE_UPPER);
			$totalroleTypeKeys= array_keys($totalroleType);
			if(in_array($roleList,$totalroleTypeKeys))	{
				$roleType = $totalroleType[$roleList];				
			}
			else {
				require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
				require_once('custom/modules/ModuleBuilder/parsers/parser.dropdown.php'); //changed path from standard to custom
				require_once('modules/Studio/DropDowns/DropDownHelper.php');
				require_once('include/utils.php');  
				include_once('custom/include/language/en_us.lang.php');
				require_once('modules/Administration/Common.php');
				require_once('modules/Administration/QuickRepairAndRebuild.php');				
				$parser = new ParserDropDown();
				$params = array();
				$roleType = ucwords($roleType);
				$_REQUEST['view_package'] = 'studio'; //need this in parser.dropdown.php
				$params['view_package'] = 'studio';
				$params['dropdown_name'] = 'SAP_consultant_level_list'; //replace with the dropdown name
				$params['dropdown_lang'] = 'en_us';
				$params['use_push']=true;
				//create your list...substitute with db query as needed
				$properties['options'] = 'SAP_consultant_level_list'; 
				foreach (array_merge($app_list_strings['SAP_consultant_level_list'],(array)$roleType) as $k=>$v) { 
					//merge new and old values
					$dropList[] = array($v,$v);
				}
				$json = getJSONobj();
				$params['list_value'] = $json->encode($dropList);
				$parser->saveDropDown($params);	
			}
			//Query to update the role in the database
			$updateQuery = 'UPDATE vedic_candidates_cstm
								SET  role_c = "'.$roleType.'" 
								WHERE id_c = "'.$id.'"';
			$result = $db->query($updateQuery);
		}
	}
}
?>