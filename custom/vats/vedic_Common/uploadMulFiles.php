<?php
/**
  * FileName => uploadMulFiles.php
  * Modified By => Udaykiran (Modified On Jun-15-2017)
  * COMMENT => Code to upload the multiple files 
  */
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');

require_once('custom/vats/vedic_Common/Flow/ConfigInterface.php');
require_once('custom/vats/vedic_Common/Flow/Config.php');
require_once('custom/vats/vedic_Common/Flow/RequestInterface.php');
require_once('custom/vats/vedic_Common/Flow/Request.php');
require_once('custom/vats/vedic_Common/Flow/File.php');
require_once('custom/vats/vedic_Common/Flow/Basic.php');

$config = new \Flow\Config();
$config->setTempDir('upload');
$request = new \Flow\Request();
if (\Flow\Basic::save('upload/libreDocs/' . $request->getFileName(), $config, $request)) {
	return "Success";
}
return "Failed";
?>
