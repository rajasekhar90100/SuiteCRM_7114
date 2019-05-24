<?php
/**
  * FileName => getUsers.php
  * Modified By => Udaykiran (Modified On Nov-30-2017)
  * COMMENT => Code to get the users data from the database
  */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

//ini_set('display_errors',1);
error_reporting(E_ALL);
//define('sugarEntry', true);
/* require_once('/var/www/html/vats/include/entryPoint.php');
require_once('/var/www/html/vats/modules/ModuleBuilder/MB/ModuleBuilder.php');
require_once('/var/www/html/vats/modules/ModuleBuilder/parsers/parser.dropdown.php'); */

global $sugar_config,$db;
$url = $GLOBALS['sugar_config']['site_url'];
$url = $url."/service/v4_1/rest.php";
$username = "vatsadmin";
$password = "Vedic123";
//exit($url);
date_default_timezone_set('UTC');

$userarray=array();
$cn=1;
$ownername='';

/* //query to get the username
$query="select id,first_name,last_name,reports_to_id from users where deleted=0 and id!=1 ";

$result=$db->query($query);

$managers=array();


while($row=$db->fetchByAssoc($result)){

    if($row['first_name']=='Nick' && $row['last_name']=='Sharma' && $row['id']=='741fb764-ec4e-cc25-96ab-5506b58957a3'){
            $userarray[0]=$row;
        }

        else{

                        $userarray[$cn]=$row;



                        if(!in_array($row['reports_to_id'],$managers)){
                                        $managers[]=$row['reports_to_id'];
                        }

          $cn++;
        }

}
//return $userarray;
//echo "<pre>";
echo '{"status":"ok","data":'.json_encode($userarray).'}';exit;

echo('{"status":"ok","data":'.json_encode($userarray).'}');exit;
echo "</pre>"; */



function call($method, $parameters, $url)
    {
        ob_start();
        $curl_request = curl_init();
        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();
        return $response;
    }
			
	
			$login_parameters = array(
				"user_auth" => array(
				"user_name" => $username,
				"password" => md5($password),
				"version" => "1"
				),
				"application_name" => "RestTest",
				"name_value_list" => array(),
			);
			$login_result = call("login", $login_parameters, $url);
			 //get session id
    $session_id = $login_result->id;

    //get list of records --------------------------------
    $get_entry_list_parameters = array(

         //session id
         'session' => $session_id,

         //The name of the module from which to retrieve records
         'module_name' => 'Users',

         //The SQL WHERE clause without the word "where".
        'query' => "users.status = 'Active' AND ((users.title IS NULL) OR users.title NOT LIKE '%Consultant%') AND users.user_name  NOT LIKE '%test%' AND users.user_name  NOT LIKE '%vats%' AND users.user_name  NOT LIKE '%generic%'  AND users.user_name  NOT LIKE '%admin%' AND users.user_name  NOT LIKE '%user%'",

         //The SQL ORDER BY clause without the phrase "order by".
         'order_by' => "",

         //The record offset from which to start.
         'offset' => '0',

         //Optional. A list of fields to include in the results.
         'select_fields' => array(
               'id',
			   'name',
              'first_name',
			  'last_name',
			  'reports_to_id',
              'title',
			  'email1'
         ),

         /*
         A list of link names and the fields to be returned for each link name.
         Example: 'link_name_to_fields_array' => array(array('name' => 'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address')))
         */
         'link_name_to_fields_array' => array(
		 
         ),

         //The maximum number of results to return.
         'max_results' => '1000',

         //To exclude deleted records
         'deleted' => '0',

         //If only records marked as favorites should be returned.
         'Favorites' => false,
    );

    $get_entry_list_result = call('get_entry_list', $get_entry_list_parameters, $url);
	
	// loop over result and format as per chart
	$empty_array = array();
	$format_data = array();
	$x = 0;
	foreach($get_entry_list_result->entry_list as $key=>$val){
		//if($key == "entry_list"){
			//echo "<pre>";
			//print_r($val->name_value_list->id->value);exit;
			$empty_array = array(
				"Id"=>$val->name_value_list->id->value,
				"Name"=>$val->name_value_list->name->value,
				$val->name_value_list->first_name->name=>$val->name_value_list->first_name->value,
				$val->name_value_list->last_name->name=>$val->name_value_list->last_name->value,
				$val->name_value_list->title->name=>$val->name_value_list->title->value,
				"Title"=>$val->name_value_list->title->value,
				$val->name_value_list->email1->name=>$val->name_value_list->email1->value,
				"ReportsToId"=>$val->name_value_list->reports_to_id->value,
				"Account"=>json_encode("{}")
				//$val->name_value_list->Account->name=>$val->array()
				
			);
			
			$x++;
			array_push($format_data,$empty_array);
			//exit(json_encode($format_data));
			//echo "<pre>";
			//print_r($empty_array);exit;
		//}
	}
	//exit(json_encode($format_data));

echo('{
    "status": "ok",
    "data": {
"contactdata": '.json_encode($format_data).'}}');
exit;
    echo '<pre>';
    print_r($get_entry_list_result);
    echo '</pre>';

			
