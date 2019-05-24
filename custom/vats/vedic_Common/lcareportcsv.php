<?php
/**   
  * FileName => lcareportcsv.php
  * Created By => Maneesha(Created On May-17-2017)
  * Modified By => Maneesha (Modified On Jun-06-2017)
  * COMMENT => Export the Lca report to CSV
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

ini_set('zlib.output_compression', 'Off');
error_reporting(E_ALL);
ob_start();
require_once('include/export_utils.php');

global $sugar_config,$db,$locale,$current_user,$app_list_strings;

$the_module = clean_string($_REQUEST['module']);
$count=1;
$fdate = $_REQUEST['fdate'];
$tdate = $_REQUEST['tdate'];
if($sugar_config['disable_export'] 	|| (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($the_module)  && ACLAction::getUserAccessLevel($current_user->id,$the_module, 'access') == ACL_ALLOW_ENABLED &&
    (ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN ||
     ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV)))))
{
	die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
}
//check to see if this is a request for a sample or for a regular export
$filename = $_REQUEST['module'];
//use label if one is defined
if(!empty($app_list_strings['moduleList'][$_REQUEST['module']])){
    $filename = $app_list_strings['moduleList'][$_REQUEST['module']];
}
$content ='"S.No","Immigration","LCA Location","Current Stage","Status';
$content.= "\"\r\n";
$query =   "SELECT vi.id AS Id,
				   vi.name AS CandidateName,
				   vic.lca_location_c AS LCALocation,
				   via.before_value_string AS BeforeStage,
				   vic.stage_c AS CurrentStage,
				   vic.status_c AS Status
			FROM vedic_immigration AS vi
			LEFT JOIN
			  (SELECT *
			   FROM vedic_immigration_audit
			   WHERE field_name = 'stage_c') AS via ON via.parent_id = vi.id
			LEFT JOIN vedic_immigration_cstm AS vic ON vic.id_c = vi.id
			WHERE vi.deleted = 0
			  AND (via.before_value_string = 'LCA'
				   OR vic.stage_c = 'LCA')
			  AND DATE(vi.date_modified) <= '".$tdate."'
			  AND DATE(vi.date_modified) >= '".$fdate."'
			GROUP BY vi.id
			ORDER BY vi.name ASC";
$result = $db->query($query);
	while($row=$db->fetchByAssoc($result)){
		$sno = $count++;
		$candidatename=$row['CandidateName'];
		$lcalocation=$row['LCALocation'];
		$currentstage=$row['CurrentStage'];
		$status= str_replace("_", " ", $row['Status']);
		$records[] = array($sno,$candidatename,$lcalocation,$currentstage,$status);
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
header("Content-Disposition: attachment; filename=LCAReport.csv");
header("Content-transfer-encoding: binary");
header("Cache-Control: post-check=0, pre-check=0", false );
header("Content-Length: ".mb_strlen($transContent, '8bit'));
if (!empty($sugar_config['export_excel_compatible'])) {
    $transContent=chr(255) . chr(254) . mb_convert_encoding($transContent, 'UTF-16LE', 'UTF-8');
}
print $transContent;
sugar_cleanup(true);



?>
