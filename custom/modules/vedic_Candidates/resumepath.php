<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/vats/vedic_Common/aws/aws-autoloader.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CommandInterface;

class Resumepath {
	function defaultpath(&$bean, $event, $arguments) {
		$path1 = $bean->title;
		$candidate_id = $bean->id;
		$resumepath = '';
		$resumepath = $bean->resumepath;
		if($resumepath != ''){
			if(!is_dir("/var/www/html/vats/upload/candidatesResumes/")) {
				mkdir("/var/www/html/vats/upload/candidatesResumes/",0755,true);
			}
			if(!is_dir("/var/www/html/vats/upload/candidatesResumes/$candidate_id/")) {
				mkdir('/var/www/html/vats/upload/candidatesResumes/'.$candidate_id.'/',0755,true);
			}
			$source = "/var/www/html/vats/upload/libreDocs/$resumepath";
			$dest = "/var/www/html/vats/upload/candidatesResumes/$candidate_id/$resumepath";
			copy($source, $dest);
		}
		/*********************S3 Upload Start**********************/
		$bucket = $GLOBALS['sugar_config']['s3_bucket'];
		$pathToFile = "upload/candidatesResumes/$candidate_id/$resumepath";
		if(file_exists($pathToFile)) {
			//CREATE A S3CLIENT
			$client = new S3Client([
				'version'     => 'latest',
				'region'      => 'us-east-1',
			]);
			$fp = fopen($pathToFile, 'r+');
			//UPLOADIND THE FILE
			$client->putObject(array(
				'Bucket' => $bucket,
				'Key'    => "VATS_DOCUMENTS/". $candidate_id . "/" . $resumepath, //This should be unique for all the documents
				'Body'   => $fp,
				'ACL'    => 'public-read'
			));
			fclose($fp);
			// We can poll the object until it is accessible
			$client->waitUntil('ObjectExists', array(
				'Bucket' => $bucket,
				'Key'    => "VATS_DOCUMENTS/". $candidate_id . "/" . $resumepath
			));
		}
		//Unlink File from upload directory
		unlink($pathToFile);
		
		/*********************S3 Upload End**********************/
	}
	
#START ::  Adding Logic hook for compressing keyskills in listview of candidate  :: 2017Mar11

function process_record_listmethod($bean, $event, $arguments)
    {
		$keyskill = "";
		$keyskill_list = $bean->keyskill_list;
		$keyskill = explode(",",$bean->keyskill_list);
		
		$result="";
		
		if(count($keyskill) > 5) {
			$result = $keyskill[0].",".$keyskill[1].",".$keyskill[2].",".$keyskill[3].",".$keyskill[4];
			$bean->keyskill_list = $result;
		}
	}
#END ::  Adding Logic hook for compressing keyskills in listview of candidate  :: 2017Mar11
}

?>
