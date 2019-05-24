<?php
 /**
	* FileName => postAcceptor.php
	* Created By => Udaykiran (Created On May-04-2017)
	* Modified By => Udaykiran (Modify On Jun-05-2017)
	* COMMENT => pasted images are saving in to the instance
    */
	if (!file_exists('upload/submissions/')) {
		    mkdir('upload/submissions/', 0775, true);
	}
	$imageFolder ="upload/submissions/";
	reset ($_FILES);
	$temp = current($_FILES);
	if (is_uploaded_file($temp['tmp_name'])){

		// Accept upload if there was no origin, or if it is an accepted origin
		$filetowrite = $imageFolder . $temp['name'];
		move_uploaded_file($temp['tmp_name'], $filetowrite);
		
		// Respond to the successful upload with JSON.
		// Use a location key to specify the path to the saved image resource.
		// $GLOBALS['log']->fatal($filetowrite);
		// echo $filetowrite;
		// echo json_encode(array('location' => $filetowrite));
	} else {
		
		// Notify editor that the upload failed
		header("HTTP/1.0 500 Server Error");
	}
	echo $filetowrite;
?>


