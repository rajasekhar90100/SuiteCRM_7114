<?php
ini_set('display_errors',0);
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once ('include/entryPoint.php');

// print_r($_POST);
$pwd = $_REQUEST['pwd'];
echo $pwd;
// header("location:");
?>