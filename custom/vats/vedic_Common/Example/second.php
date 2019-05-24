<?php
/**
  * FileName => second.php
  * Created By => Rajasekhar (Created On Jul-11-2018)
  * Modified By => Rajasekhar (Modified On Aug-03-2018)
  * COMMENT => API for to create trainees data
  */
if  (isset($_POST['submit']))  {  
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$faterName = $_POST['father_name'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$alternavivePhone = $_POST['alternativephone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$sscMarks = $_POST['ssc_score'];
$sscYear = $_POST['ssc_year'];
$interScore = $_POST['inter_score'];
$interYear = $_POST['inter_year'];
$ugScore = $_POST['ug_score'];
$ugYear = $_POST['ug_year'];
$ugDegree = $_POST['ug_degree'];
$ugSpecialization = $_POST['ug_specialization'];
$ugCollegeName = $_POST['ug_collegename'];
$ugUniversity = $_POST['ug_university'];
$pgMarks = $_POST['pg_score'];
$pgYear = $_POST['pg_year'];
$pgCollege = $_POST['pg_college'];
$pgUniversity = $_POST['pg_university'];
$highestDegree = $_POST['highest_degree'];
$highestDegreeRegNumber = $_POST['highest_degree_regnumber'];
$provreq = $_POST['provreq'];
$pgDegree = $_POST['pg_degree'];
$pgSpecialization = $_POST['pg_specialization'];
$highestDegreeScore = $_POST['highest_degree_score'];
$highestDegreeYear = $_POST['highest_degree_year'];

$date_of_registration = date('Y-m-d');


$secretKey = '6LekJCcUAAAAAH-FhSyzRGJTbuPzZBXle0hykfHQ';
$captcha = $_POST['g-recaptcha-response'];
 if(!$captcha){
          echo '<h3 class="alert alert-danger" style="text-align:center;">Please check the the captcha form.</h3>';
		  include "first.php";
		  exit;
        }
		$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
		if (intval($responseKeys["success"]) != 1) {         
        }
		else {
			echo '<h3 class="alert alert-warning" style="text-align:center;">Please revalidate the captcha and try again.</h3>';
			include "first.php";
        }
}
    $url = "https://vats.vedicsoft.com/service/v4_1/rest.php";
    $username = "vatsadmin";
    $password = "Vedic123";

    //function to make cURL request
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
    //login ---------------------------------------------------- 
    $login_parameters = array(
         "user_auth" => array(
              "user_name" => 'vatsadmin',
              "password" => 'Vedic123',
              "version" => "1"
         ),
         "application_name" => "RestTest",
         "name_value_list" => array(),
    );
    $login_result = call("login", $login_parameters, $url);
    //get session id
    $session_id = $login_result->id;
    //create note ----------------------------------------------- 
	if ( (!empty($firstName)) || (!empty($lastName)) ) { 
	//session id
		$get_entry_list_parameters = array(

		//session id

		 'session' => $session_id,

		 //The name of the module from which to retrieve records

		 'module_name' => 'vedic_Trainees',

		 //The SQL WHERE clause without the word "where".

			  'query' => "vedic_trainees.highest_degree_registation_number='$highestDegreeRegNumber' 
			  AND (vedic_trainees.date_of_registration BETWEEN NOW() - INTERVAL 180 DAY AND NOW())",
		//          'query'=>'',

		 //The SQL ORDER BY clause without the phrase "order by".

		 'order_by' => "",

		 //The record offset from which to start.

		 'offset' => 0,

		 //A list of fields to include in the results.

		 'select_fields' => array(
			  'id',
			  'name',

		 ),
		 //A list of link names and the fields to be returned for each link name.

		 'link_name_to_fields_array' => array(),

		 //The maximum number of results to return.

		 'max_results' => 10,

		 //If deleted records should be included in results.

		 'deleted' => 0,

		 //If only records marked as favorites should be returned.

		 'favorites' => false,
		);

		$get_entry_list_result = call('get_entry_list', $get_entry_list_parameters, $url);
		
		$traineesCount = $get_entry_list_result->result_count;
		
		if($traineesCount < 1) {
			
			$fName = $_FILES['data']['name'];
			$set_entry_parameters = array(
				 //session id
				 "session" => $session_id,
				 //The name of the module
				 "module_name" => "vedic_Trainees",
				 //Record attributes
				 "name_value_list" => array(
					  //to update a record, you will nee to pass in a record id as commented below
					  //array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
					array('name' => 'first_name', 'value' => "$firstName"), 
					array('name' => 'last_name', 'value' => "$lastName"),
					array('name' => 'father_name', 'value' => "$faterName"),
					array('name' => 'dob', 'value' => "$dob"),
					array('name' => 'phone_mobile', 'value' => "$phone"),
					array('name' => 'phone_other', 'value' => "$alternavivePhone"),
					array('name' => 'email1', 'value' => "$email"),
					array('name' => 'gender', 'value' => "$gender"),
					array('name' => 'x_cgpa', 'value' => "$sscMarks"),
					array('name' => 'x_year_of_pass', 'value' => "$sscYear"),
					array('name' => 'xii_cgpa', 'value' => "$interScore"),
					array('name' => 'xii_year_of_pass', 'value' => "$interYear"),
					array('name' => 'ug_cgpa', 'value' => "$ugScore"),
					array('name' => 'ug_year_of_pass', 'value' => "$ugYear"),
					array('name' => 'ug_degree', 'value' => "$ugDegree"),
					array('name' => 'ug_specialization', 'value' => "$ugSpecialization"),
					array('name' => 'ug_college_name', 'value' => "$ugCollegeName"),
					array('name' => 'ug_university', 'value' => "$ugUniversity"),
					array('name' => 'pg_cgpa', 'value' => "$pgMarks"),
					array('name' => 'pg_year_of_pass', 'value' => "$pgYear"),
					array('name' => 'pg_college', 'value' => "$pgCollege"),
					array('name' => 'pg_university', 'value' => "$pgUniversity"),
					array('name' => 'highest_degree', 'value' => "$highestDegree"),
					array('name' => 'highest_degree_registation_number', 'value' => "$highestDegreeRegNumber"),
					array('name' => 'provisional_availability', 'value' => "$provreq"),
					array('name' => 'date_of_registration', 'value' => "$date_of_registration"),
					array('name' => 'pg_degree', 'value' => "$pgDegree"),
					array('name' => 'pg_specialization', 'value' => "$pgSpecialization"),
					array('name' => 'highest_degree_cgpa', 'value' => "$highestDegreeScore"),
					array('name' => 'highest_degree_year_of_pass', 'value' => "$highestDegreeYear"),
					array('name' => 'resume', 'value' => "$fName")
				 ),
			);
			$set_entry_result = call("set_entry", $set_entry_parameters, $url);
			$note_id = $set_entry_result->id;
			if  ($_FILES['data']['size']  ==  0)  {
			die("ERROR:  Zero  byte  file  upload");
			}
			if  (!is_uploaded_file($_FILES['data']['tmp_name']))   {
				die("ERROR:  Not  a  valid  file  upload"); 
			} //  set  the  name  of  the  target  directory
			if(!is_dir('/var/www/html/vats/upload/TraineeResumes/'.$note_id.'/')) {
				mkdir('/var/www/html/vats/upload/TraineeResumes/'.$note_id.'/',0755,true);
			}
			$uploadDir  =  '/var/www/html/vats/upload/TraineeResumes/'.$note_id.'/'; //  copy  the  uploaded  file  to  the  directory
			move_uploaded_file($_FILES['data']['tmp_name'], $uploadDir  .  $_FILES['data']['name'])  or  die("Cannot  copy  uploaded  file");
		?>
			<h2 style="text-align: -webkit-center;color: blue;display: flex; height: 100px;justify-content: center;flex-direction: column;">You have Registered Successfully !!!</h2><br/>
			<div style="text-align: -webkit-center;"><a href="first.php">Click to Registration Page</a></div>  
		<?php
		} else {
		?>
			<h2 style="text-align: -webkit-center;color: blue;display: flex; height: 100px;justify-content: center;flex-direction: column;">You have already Registered !!!</h2><br/>
			<div style="text-align: -webkit-center;"><a href="first.php">Click to Registration Page</a></div>
		<?php
		}
	}
?>