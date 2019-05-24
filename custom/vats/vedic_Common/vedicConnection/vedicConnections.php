<?php
global $current_user, $db ;
$instance_url = "http://vspa-dev.vedicsoft.com/rest/v10";
$username = "demo2";
$password = "Vedicsoft123";

//Login - POST /oauth2/token
$auth_url = $instance_url . "/oauth2/token";

$oauth2_token_arguments = array(
    "grant_type" => "password",
    //client id - default is sugar. 
    //It is recommended to create your own in Admin > OAuth Keys
    "client_id" => "sugar", 
    "client_secret" => "",
    "username" => $username,
    "password" => $password,
    //platform type - default is base.
    //It is recommend to change the platform to a custom name such as "custom_api" to avoid authentication conflicts.
    "platform" => "custom_api" 
);

$auth_request = curl_init($auth_url);
curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($auth_request, CURLOPT_HEADER, false);
curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
));

//convert arguments to json
$json_arguments = json_encode($oauth2_token_arguments);
curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_arguments);

//execute request
$oauth2_token_response = curl_exec($auth_request);
$json = json_decode($oauth2_token_response, true);
//echo ($oauth2_token_response);exit;
$access_token = $json['access_token'];
$cookie_name = "apiUserToken";
setcookie($cookie_name, $access_token, time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<!DOCTYPE html>
<html ng-app="vspachart" class="ng-scope"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="SHORTCUT ICON" href="themes/Suite7/images/sugar_icon.ico?v=JI5KhKz7BjN92TGwM5GoLw">
<title>Vedic Chart</title>
<meta name="description" content=""><meta name="viewport" content="width=device-width"><!-- Place favicon.ico and apple-touch-icon.png in the root directory --><link rel="stylesheet" href="custom/vats/vedic_Common/vedicConnection/css/vendor.css"><link rel="stylesheet" href="custom/vats/vedic_Common/vedicConnection/css/app.css">
</head>
<body><!--[if lt IE 10]>

      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]--><!-- ngInclude: 'header.html' -->
	<!--<header ng-include="'app/tree-chart/header.html'"></header>-->
	<!--<div ng-include="'app/tree-chart/treechart.html'"></div>-->
<header  class="ng-scope">
	<div class="main-header ng-scope ng-binding" ng-controller="TreeChartController as treechart">
		<div class="logo-cont"> 
			<img alt="logo" class="logo img-responsive" src=   "custom/vats/vedic_Common/vedicConnection/images/VSPA-Connections-blue.png">
		</div><span id="danger"> Loading...</span>
	</div>
	
</header>
	<div ng-view="" class="ng-scope">
		<div ng-controller="TreeChartController as treechart" class="ng-scope">
			
				<div class="tg-icon ng-scope" ng-if="!treechart.toggle" title="Expand suggested contacts">
					<!--<img src="custom/modules/vedic_common/vedicConnection/images/suggested.png" height="45px" width="45px" ng-click="treechart.toggleSuggest()"> <span class="mbadge ng-binding">7</span>-->
				</div>	
			
		</div>  
	</div>
	<!--<div ng-view="" class="ng-scope">
		<div ng-controller="TreeChartController as treechart" class="ng-scope">
			<div class="tg-icon ng-scope" ng-if="!treechart.toggle" title="Expand suggested contacts">
					<img src="custom/modules/vedic_common/vedicConnection/images/suggested.png" height="45px" width="45px" ng-click="treechart.toggleSuggest()"> <span class="mbadge ng-binding">7</span>
				</div>	
		</div>
	</div>-->

		<script src="custom/vats/vedic_Common/vedicConnection/js/vendor.js"></script><script src="custom/vats/vedic_Common/vedicConnection/js/app.js"></script>
		<script>
	
   /*  $(document).on("contextmenu",function(e){
		e.preventDefault();
    alert("xx");
       return false;
    });  */
		</script>
		</body>
<div class="d3-context-menu"></div>
		</html>
