<?php 
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set('display_errors', 1);
chdir(dirname(dirname(dirname(dirname(__FILE__)))));
require_once('include/entryPoint.php');
// include_once 'custom/include/docx.php';
// include_once 'custom/include/PdfParser.php';
// require_once 'custom/include/rtflex/RTFLexer.php';
require_once 'custom/include/language/en_us.lang.php';

$candidateid = $_REQUEST['candidateid'];

?>
<!DOCTYPE html>
<html>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script langauge="javascript">

function post_value(){
	
	var path = document.frm.fileToUpload.value;
	var filename = path.replace(/^.*\\/, "");
	opener.document.EditView.resumepath.value = filename;
	var name = filename.split('.').pop();
	if (['doc', 'docx', 'pdf','rtf'].indexOf(name) > -1) {
		opener.document.EditView.resumepath.value = filename;
	} else {
			opener.document.EditView.resumepath.value = '';
	}
}
function closepop(element){
	// if (window.confirm('do you really want to change the candidate information')) {
	 //var content = document.frm.hdn.value;
	var content = document.getElementById("hdn").value;
	var email = document.getElementById("emailval").value;
	//opener.document.EditView.vedic_Candidates0emailAddress0.value = email;
	
	var phone = document.getElementById("phoneval").value;
	//opener.document.EditView.phone_mobile.value = phone;
	
	var keyskill = document.getElementById("keyskillval").value;
	
	// $.each(keyskill.split(","), function(i,e){

		// opener.$("#keyskill_list option[value='" + e + "']").prop("selected", true);
	// });
	opener.$('.key').val(keyskill);

	
	var email1 = opener.document.getElementById("vedic_Candidates0emailAddress0").value;
	if((email1.length) > 0) {
	opener.document.EditView.vedic_Candidates0emailAddress0.value = email1;
	}
	else {
	opener.document.EditView.vedic_Candidates0emailAddress0.value = email;
	}
	
	var phone1 = opener.document.getElementById("phone_mobile").value;
	if((phone1.length) > 0) {
	opener.document.EditView.phone_mobile.value = phone1;
	}
	else {
	opener.document.EditView.phone_mobile.value = phone;
	}
	
	
	var firstname = document.getElementById("fnameval").value;
	var lastname = document.getElementById("lnameval").value;
	
	var firstname1 = opener.document.getElementById("first_name").value;
	
	if((firstname1.length) > 0) {
		opener.document.EditView.first_name.value = firstname1;	
	} else {
		opener.document.EditView.first_name.value = firstname;
	}
	
	var lastname1 = opener.document.getElementById("last_name").value;
	
	if((lastname1.length) > 0) {
		opener.document.EditView.last_name.value = lastname1;	
	} else {
		opener.document.EditView.last_name.value = lastname;
	}
	
		
	var summary = document.getElementById("summaryval").value;
	var a = document.getElementById("path").value; 
	var title = a.split('/');
	opener.document.EditView.title.value = title[2];
		
	opener.tinyMCE.activeEditor.setContent(summary);   
	opener.tinyMCE.activeEditor.execCommand('InsertUnorderedList');		
	opener.document.EditView.resumesearch.value = content;
	opener.mobileNumberSet();		//To call function mobileNumberSet() in parent view by :: Vaibhav on Apr-13-2017
	window.close();
}
</script>
 
<form action="#" name="frm" method="post" enctype="multipart/form-data">

<?php
	
	$email="";
	$phone="";
	$firstname="";
	$lastname="";
	$target_file1="";
	$sum=array();
	$name="";
	$cnt="";
	$s="";
	
	if(isset($_POST["submit"])) {
		
		$target_dir = "upload/libreDocs/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$resumepath = str_replace('&','\&',$_FILES["fileToUpload"]["name"]);
		$resumepath = str_replace('(','\(',$resumepath);
		$resumepath = str_replace(')','\)',$resumepath);
		$resumepath = str_replace("'","\'",$resumepath);
		$file = str_replace(' ','\ ',$resumepath);//die;
		$uploadOk = 1;
		$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		// Check file size
			//$GLOBALS['log']->fatal($_FILES["fileToUpload"]["size"]);
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
			//echo "Your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		else if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf" && $FileType != "rtf") {
			?><div style="color:red">Invalid file type.Only doc, docx , pdf & rtf files are allowed.</div><br>
			Select Resume to upload:
			
			<br>
			<input type="file" name="fileToUpload" id="fileToUpload" value="">
			
			<br><br>	
			<input type="submit" value="Upload Resume" id="uploadresume" name="submit" onclick="post_value();">			

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script langauge="javascript">
			$(function(){
				document.getElementById('uploadresume').style.visibility = 'hidden';
				document.getElementById('fileToUpload').onchange = function () {
					if(this.value == '') {
						document.getElementById('uploadresume').style.visibility = 'hidden';
					}
					else {
						document.getElementById('uploadresume').style.visibility = 'visible';
					}
				// alert('Selected file: ' + this.value);
				};
			});
			</script>					
		<?php
			$email="";
			$phone="";
			$fname="";
			$lname="";
			$target_file1="";
			
		} else {
			
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'upload/libreDocs/' . $_FILES['fileToUpload']['name'])) {
				$target_file1 = "upload/libreDocs/".$_FILES['fileToUpload']['name'];
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				?><div id="dis"> <?php echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";?> </div>			
				<?php

				$dir = __DIR__;
				//echo "<br>".$ter = $target_file;
				$ret ="Hello Currecting";
				
				//makes non spaces in target 
				$target_file = str_replace(" ", "\ ", "$target_file1");
				
				
				
				$content = '';
				$shell_exec = '';
				if($FileType == 'pdf') {
					$content = shell_exec("export HOME=".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs && pdftotext ".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs/".$file." -");
				}
				else {
					$shell_exec = shell_exec("export HOME=".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs && libreoffice6.0 --headless --convert-to html ".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs/".$file." --outdir  ".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs/");
					$htmlfile = str_replace($FileType,"html",$_FILES["fileToUpload"]["name"]);
					$content = file_get_contents('./upload/libreDocs/'.$htmlfile);
					
					$content = preg_replace("/<img[^>]+\>/i", "", $content); 
					$content = str_replace('header','',$content);
					file_put_contents('upload/libreDocs/'.$htmlfile,$content);
					
					$file = str_replace($FileType,'html',$file);
					$shell_exec = shell_exec("export HOME=".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs && libreoffice6.0 --headless --convert-to txt:Text ".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs/".$file." --outdir  ".$_SERVER['DOCUMENT_ROOT']."/upload/libreDocs/");
					$htmlfile = str_replace($FileType,"txt",$_FILES["fileToUpload"]["name"]);
					$content = file_get_contents('./upload/libreDocs/'.$htmlfile);

					//unlink('./upload/libreDocs/'.$htmlfile);
				}
	
				//START :: Remove 1 hr old files from libreDocs
				$path = "upload/libreDocs/";
				$interval = strtotime('-1 hour');//files older than 24hours
				foreach (glob($path."*") as $file) 
				//delete if older
				if (filemtime($file) <= $interval ) {
					unlink($file);
				}
				//END :: Remove 1 hr old files from libreDocs
				//$resumecontent = $content;
				$resumecontent = preg_replace('~["\'\|]~', ' ', $content); //REMOVE ' and " quotes from resume content
				$resume = $content;
				$type = gettype($content);				
				if ($type != string) {
					?>			
					<div style="color:red">Invalid file.</div><br>
						Select Resume to upload:
						
					<br>
					<br>
					<input type="file" name="fileToUpload" id="fileToUpload" value="">
					
					<br><br>	
					<input type="submit" value="Upload Resume" id="uploadresume" name="submit" onclick="post_value();">			

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
					<script langauge="javascript">
						$(function(){
							document.getElementById('uploadresume').style.visibility = 'hidden';
							document.getElementById('fileToUpload').onchange = function () {
								if(this.value == '') {
								document.getElementById('uploadresume').style.visibility = 'hidden';			
								} else {
								document.getElementById('uploadresume').style.visibility = 'visible';			
								}
							// alert('Selected file: ' + this.value);
							};
						});
					</script>
					<?php
					// break;
				}						
                $fileInfo = explode(PHP_EOL, $content);	
                $records = [];
				$phone = '';
				$email = '';
                foreach ($fileInfo as $row) {
					$parts = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $row);
					foreach ($parts as $part){
						if ($part == '') {
							continue;
						}                    
						$part = strtolower($part);			
						//  ***************  EMAIL  **************
						if (strpos($part, '@') || strpos($part, 'mail')) {
							
							$pattern = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}/';	
							//$pattern = '^[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,}$';	
							
							preg_match_all($pattern, $part, $matches);
							foreach ($matches[0] as $match) {
								if(empty($email)){
									$email = LTRIM($match,'0123456789');
								}
							}
						
						}
						// ************ Keyskills ***************
						
						global $app_list_strings;
						$list = array();
						if (isset($app_list_strings['skillname_list']))	{
							$list = $app_list_strings['skillname_list'];
						}
						// $GLOBALS['log']->fatal($content);
						foreach ($list as $skill) {
							/* if (stristr($content, $skill) !== FALSE) { // Yoshi version
								$res[] = $skill;
							} */
							if($skill == 'C++')continue;
							
							if(preg_match("/\b".$skill."\b/i", $resumecontent, $matches, PREG_OFFSET_CAPTURE)){
								$res[] = $skill;
							}
							if(strpos($skill, 'C#')){
								$res[] = 'C ash';
							}
							//$GLOBALS['log']->fatal($res);
						}			
				
						$keyskills = array_unique($res);
						$skills = implode(",",$keyskills);
						
						//  ***************  MOBILE  **************
														
						preg_match_all('/(\+|\.*?)(\d{0,2}|\.*?)(\-|\.*?)\d{10}/', $part, $matches);
						if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
								 if(empty($phone)){
									$phone = $mob;
								}
							 }
						}

						preg_match_all('/\d{12}/', $part, $matches);
						if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
								if(empty($phone)){
									$phone = $mob;
								}
							}
						}

						preg_match_all('/(\d{5}) (\d{5})/', $part, $matches);
							if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
							if(empty($phone)){
									$phone = $mob;
								}
							}
						}
						 preg_match_all('/(\+|\.*?)(\d{0,2}|\.*?)(\d{3})(\-|\ )(\d{3})(\-|\ )(\d{4})/', $part, $matches);
							if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
							if(empty($phone)){
									$phone = $mob;
								}
							}
						}
						preg_match_all('/(\+|\.*?)(\d{0,2}|\.*?)\((.*?)\)(\-|\ |\.*? )(\d{3})(\-|\ )(\d{4})/', $part, $matches);
							if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
							if(empty($phone)){
									$phone = $mob;
								}
							}
						}
						preg_match_all('/((?:\d{3}[.-]|\(\d{3}\)\s+)\d{3}[.-]\d{4})(?:\s+Ext\.\s+(\d+)|\s+\(.*?\))?/i', $part, $matches);
							if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
							if(empty($phone)){
									$phone = $mob;
								}
							}
						}
						preg_match_all('/(\+|\.*?)(\d{0,2}|\.*?)\((.*?)\)(\d{3})(\-|\ )(\d{4})/', $part, $matches);
							if (count($matches[0])) {
							foreach ($matches[0] as $mob) {
							if(empty($phone)){
									$phone = $mob;
								}
							}
						}
						
						$phone = preg_replace('/\s+/', '', $phone);
						//************** Summary *********************//
										
						$flag = 0;
						$counter_flag = 0;
						$summary = "";
						$content = explode(PHP_EOL,$resume); 
						//$content = explode('<br />',$resume); 
						//$GLOBALS['log']->fatal($content);
						foreach($content as $line){
							
							if($flag == 1) {
								$count = count(explode(" ",trim($line)));
								if($count < 4){
									$counter_flag += 1;
									if(preg_match('/(work experience|professional experience|experience|professional swift)/i',$keyword)){
										if(!preg_match('/^((role|responsibilities|enivronment|design|development|reference|tasks performed|project description)(|\W+))/i', trim($line))){
											if(preg_match('/^([A-Z\s]+.[A-Z\s]+(|\W))$/',trim($line))){
								//$GLOBALS['log']->fatal("found a possible tag in experience");
												//echo "found a possible tag in experience";
												break;
											}
											if(strpos($line,":") !== false || is_numeric(trim($line)) || !empty(trim($summary)) && $counter_flag > 1) {
								//$GLOBALS['log']->fatal("experience break called directly");
												//echo "experience break called directly<br>";
												break;
											}
										}
									}
									else if(preg_match('/(summary|professional summary|career summary)/i',$keyword)){
										
										if(preg_match('/^([A-Z\s]+.[A-Z\s]+(|\W))$/',trim($line))){
								//$GLOBALS['log']->fatal("found a possible tag in summarry");
											//echo "found a possible tag in summarry";
											break;
										}
										if(strpos($line,":") !== false || !empty(trim($summary)) && $counter_flag > 1){
								//$GLOBALS['log']->fatal("summary break called directly");
											//echo "summary break called directly<br>";
											break;
										}
									}
								}
								else {
									$counter_flag = 0;
								}
								$summary .= $line."\n";
							}
						  //$GLOBALS['log']->fatal($summary);
							if(preg_match('/^((summary|professional summary|work experience|professional experience|professional swift|experience|career summary)(|\W+))$/i', trim($line)) && $flag == 0) {
								//$GLOBALS['log']->fatal("found tag");
								$keyword = trim($line);
								$flag = 1;
							}
						}
						$flag = 0;
						$counter_flag = 0;
						//Extracting summary from content when no available match found
						if(empty($summary)) {
							foreach($content as $line){
								if($flag == 1) {
									$count = count(explode(" ",trim($line)));
									if($count < 4){
										$counter_flag += 1;
										if(preg_match('/(work experience|professional experience|experience|professional swift)/i',$keyword)){
											if(!preg_match('/^((role|responsibilities|enivronment|design|development|reference|tasks performed|project description)(|\W+))/i', trim($line))){
												if(preg_match('/^([A-Z\s]+.[A-Z\s]+(|\W))$/',trim($line))){
													//echo "found a possible tag in experience after it could not find resume";
													break;
												}
												if(strpos($line,":") !== false || is_numeric(trim($line)) || !empty(trim($summary)) && $counter_flag > 1) {
													//echo "experience break called from where resume not found<br>";
													break;
												}
											}
										}
										else if(preg_match('/(summary|professional summary|career summary)/i',$keyword)) {
											if(preg_match('/^([A-Z\s]+.[A-Z\s]+(|\W))$/',trim($line))){
												//echo "found a possible tag in experience after it could not find resume";
												break;
											}
											if(!empty(trim($summary)) && $counter_flag > 0){
												//echo "summary break called from where resume not found<br>";
												break;
											}
										}
									}
									else {
										$counter_flag = 0;
									}
									$summary .= $line."\n";
									  //$GLOBALS['log']->fatal($summary);
								}
								if(preg_match('/(SUMMARY|PROFESSIONAL SUMMARY|WORK EXPERIENCE|PROFESSIONAL EXPERIENCE|PROFESSIONAL SWIFT|EXPERIENCE|CAREER SUMMARY)/i', trim($line), $matches) && $flag == 0) {
									$keyword = $matches[0];
									$flag = 1;
								}
							}
							if(!empty($summary)) {
								//$GLOBALS['log']->fatal($summary);
								$s = $summary;
								//echo '<p>Summarry:</p><br>'.nl2br($summary).'</p><br><br><p>End of Summarry</p>';
							}
							else {
								//$GLOBALS['log']->fatal("No Summary Found");
								//echo "No Summary Found";
							}
						}
						else {
							//echo '<p>Summarry:</p><br>'.nl2br($summary).'</p><br><br><p>End of Summarry</p>';
							$s = $summary;
							//$GLOBALS['log']->fatal($s);
						}
						
						//************ Firstname and Lastname *******************//
						
						$pattern=array("resume","curriculum","professional","experience","vitae","name","summary","confidential","page","lead","of","technical skills","tester","developer");
						$content = trim(str_replace($pattern,"",$resume)); 
						$limit_content = explode(PHP_EOL,$content);
						
						$name = $limit_content[0];
						$Limit = explode(' ',$name);
						$fname=ucwords(strtolower($Limit[0]));
						$fname=RTRIM($fname,'0123456789-(){}.,');
						$fname=preg_replace('/[^a-zA-Z0-9_.]/', '', $fname);
						$name = str_replace($Limit[0]." ","",$name);
						$lname=ucwords(strtolower($name));
						$lname=RTRIM($lname,'0123456789-(){}.,');
						$lname=preg_replace('/[^a-zA-Z0-9_.]/', '', $lname);
						$lname=preg_replace('/(phone|email)/i', '', $lname);
						
						if ($lname == ''){
							$lname = $fname;
							$fname = '';
						}
					}
				}
			}

			if($s == '') {
			?>
					
				<div style="color:red">Summary Not found !!</div><br>
					Select Resume to upload:
					
				<br>
				<br>
				<input type="file" name="fileToUpload" id="fileToUpload" value="">
				
				<br><br>	
				<input type="submit" value="Upload Resume" id="uploadresume" name="submit" onclick="post_value();">			

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				<script langauge="javascript">
					$(function(){
						document.getElementById('uploadresume').style.visibility = 'hidden';
						document.getElementById('fileToUpload').onchange = function () {
							if(this.value == '') {
							document.getElementById('uploadresume').style.visibility = 'hidden';			
							} else {
							document.getElementById('uploadresume').style.visibility = 'visible';			
							}
						// alert('Selected file: ' + this.value);
						};
					});
				</script>		
				<?php
				die;
			}
			?>
				<br>
				<br>
				
				<!--<input type="hidden" value="<?php //echo htmlspecialchars($resumecontent); ?>" name="hdn" id="hdn" />-->
				<input type="hidden" value="<?php echo $resumecontent; ?>" name="hdn" id="hdn" />
				<input type="button" value="Click me to confirm" id="closeme" onclick="closepop(this);" />
				
				<input  type="hidden" name="emailval" id="emailval" value="<?php echo $email?>">
				<input  type="hidden" name="phoneval" id="phoneval" value="<?php echo $phone?>">
				<input  type="hidden" name="fnameval" id="fnameval" value="<?php echo $fname?>">
				<input  type="hidden" name="lnameval" id="lnameval" value="<?php echo $lname?>">
				
				<input  type="hidden" name="keyskillval" id="keyskillval" value="<?php echo $skills?>">
				
				
				 <!--textarea name="summaryval" id="summaryval"><?php// print_r($s)?></textarea!-->
				 <textarea name="summaryval" id="summaryval" style="display:none;"><?php echo $s?></textarea>
				<input  type="hidden" name="path" id="path" value="<?php echo $target_file1?>">
				
			<?php
		}
	} else {	
		?>
		Select Resume to upload:
		<br>
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload" value="">
		
		<br><br><br>	
		<input type="submit" value="Upload Resume" id="uploadresume" name="submit" onclick="post_value();">			

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script langauge="javascript">
			$(function(){
				document.getElementById('uploadresume').style.visibility = 'hidden';
				document.getElementById('fileToUpload').onchange = function () {
					if(this.value == '') {
					document.getElementById('uploadresume').style.visibility = 'hidden';			
					} else {
					document.getElementById('uploadresume').style.visibility = 'visible';			
					}
				// alert('Selected file: ' + this.value);
				};
			});
		</script>
		<?php
	}
?>
</form>
</body>
</html>