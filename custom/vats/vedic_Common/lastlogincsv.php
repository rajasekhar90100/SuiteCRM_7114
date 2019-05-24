<?php
/**  
  * FileName => lastlogincsv.php
  * Created By => UdayKiran(Created On Mar-22-2018)
  * Modified By => UdayKiran (Modified On Mar-22-2018)
  * COMMENT => Export the  USer Last Login Report to CSV
  */
	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	//Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
	ini_set('zlib.output_compression', 'Off');
	error_reporting(E_ALL);
	ob_start();
	require_once('include/export_utils.php');
	global $sugar_config,$db,$locale,$current_user,$app_list_strings;
	$the_module = clean_string($_REQUEST['module']);
	$count=1;
	if($sugar_config['disable_export'] 	|| (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($the_module)  && ACLAction::getUserAccessLevel($current_user->id,$the_module, 'access') == ACL_ALLOW_ENABLED &&
		(ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN ||
		 ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV))))){
		die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
	}
	//check to see if this is a request for a sample or for a regular export
	$filename = $_REQUEST['module'];
	//use label if one is defined
	if(!empty($app_list_strings['moduleList'][$_REQUEST['module']])){
		$filename = $app_list_strings['moduleList'][$_REQUEST['module']];
	}
	$content ='"S.No","First Name","Last Name","User Name","Action Time","#Days';
	$content.= "\"\r\n";
	$query =   "SELECT a.lastname AS last_name,
					   a.username user_name,
					   a.firstname AS first_name,
					   max(a.login_time) AS last_login,
					   floor(DATEDIFF(NOW(), max(a.login_time))) AS days
				FROM login_history a
				GROUP BY a.username
				ORDER BY days ASC";
	$result = $db->query($query);
	while($row=$db->fetchByAssoc($result)){
		$sno = $count++;
		$first_name=$row['first_name'];
		$last_name =$row['last_name'];
		$user_name =$row['user_name'];
		$last_login= $row['last_login'];
		$days= $row['days'];
		$records[] = array($sno,$first_name,$last_name,$user_name,$last_login,$days);
	}
	foreach($records as $record)
        {
			$line = implode("\"" . getDelimiter() . "\"", $record);
            $line = "\"" . $line;
            $line .= "\"\r\n";
            $content .= $line;
		}
	//strip away any blank spaces
	$filename = str_replace(' ','',$filename).$ext_name;

	$transContent = $GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset());
	///////////////////////////////////////////////////////////////////////////////
	////	BUILD THE EXPORT FILE
	ob_clean();
	header("Pragma: cache");
	header("Content-type: application/octet-stream; charset=".$GLOBALS['locale']->getExportCharset());
	header("Content-Disposition: attachment; filename=User Last Login.csv");
	header("Content-transfer-encoding: binary");
	header("Cache-Control: post-check=0, pre-check=0", false );
	header("Content-Length: ".mb_strlen($transContent, '8bit'));
	if (!empty($sugar_config['export_excel_compatible'])) {
		$transContent=chr(255) . chr(254) . mb_convert_encoding($transContent, 'UTF-16LE', 'UTF-8');
	}
	print $transContent;
	sugar_cleanup(true);