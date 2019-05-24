<?php
#CLASS:: GetResumeContent
#Function:: parseResume(&$bean, $event, $arguments)

class GetResumeContent{
	function parseResume(&$bean, $event, $arguments){
		//if($bean->date_modified == $bean->date_created ){						// IF candidate newly creating via inbound
			if( (!empty($bean->any_other) || isset($bean->any_other))){		// IF candidate comes from dice|monster|techfetch
				global $db;
				$candidateID = $bean->id;
				if(!is_dir("/var/www/html/vats/upload/candidatesResumes/$candidateID/")) {
					mkdir('/var/www/html/vats/upload/candidatesResumes/'.$candidateID.'/',0755,true);
				}
				$source = "upload/resumes/".$bean->resumepath;
				$dest = "upload/candidatesResumes/$bean->id/".$bean->resumepath;
				copy($source, $dest);
				
				$path_libre = "/var/www/html/vats/upload/libreDocs";			//Static path for store converted file
				$path_resume = "/var/www/html/vats/upload/candidatesResumes/$candidateID/".$bean->resumepath;		//Static path for instance on server
				
				$content = '';
				
				$filename = explode('/',$path_resume);
				//$file = $filename[count($filename)-1];				//GET FILE NAME FRON RESUME PATH
				$file = $bean->resumepath;				//GET FILE NAME FRON RESUME PATH
				
				$FileType = pathinfo($file,PATHINFO_EXTENSION);		//GET FILE EXTENSION
				
				$resumepath = str_replace('&','\&',$path_resume);
				$resumepath = str_replace('(','\(',$resumepath);
				$resumepath = str_replace(')','\)',$resumepath);
				$resumepath = str_replace("'","\'",$resumepath);
				$resumepath = str_replace(' ','\ ',$resumepath);		//PREFIX SLASH(\),IF FILE NAME HAS &,(,),' and space
				
				file_put_contents('testparse.txt',$file.' '.$resumepath.' '.$file);	
				$shell_exec = '';
				if($FileType == 'pdf'){
					$content = shell_exec("export HOME=".$path_libre." && pdftotext ".$resumepath." -");
				}
				else{
					
					/* $shell_exec = shell_exec("export HOME=".$path_libre." && soffice --headless --convert-to html ".$resumepath." --outdir  ".$path_libre."/");
					$htmlfile = str_replace($FileType,"html",$file);
					$content = file_get_contents('upload/libreDocs/'.$htmlfile);		

					$content = preg_replace("/<img[^>]+\>/i", "", $content);
					$content = str_replace('header','',$content);
					//file_put_contents($path_libre.'/'.$htmlfile,$content);	
					file_put_contents('upload/libreDocs/'.$htmlfile,$content);	

					$htmlfile = str_replace($FileType,'html',$file);
					
					$shell_exec = shell_exec("export HOME=".$path_libre." && soffice --headless --convert-to txt:Text ".$path_libre."/".str_replace(' ','\ ',$htmlfile)." --outdir  ".$path_libre."/");
					
					$txtfile = str_replace($FileType,"txt",$file);
					$content = file_get_contents('upload/libreDocs/'.$txtfile); */
				} 
				if($content != ''){
					$replace_words = array("'",'"');
					$replace_with = array("","");

					$content = str_replace($replace_words,$replace_with,$content);
					
					$sql = "update vedic_candidates set resumesearch = '".$content."' where id = '".$bean->id."'";
					$res = $db->query($sql);
				}
				file_put_contents('testcontent.txt',$content);
			}
		//}
		return true;
	}
}

?>