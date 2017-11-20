<?php
	
ini_set("display_errors", true);
error_reporting(E_ALL);
     

$trimmedfiles = array(); 

$result = array();

$files = scan_dir('check');

foreach($files as $file)
{
	switch(ltrim(strstr($file, '.'), '.'))
	   {
	     case "jpg": case"jpeg": case"png" : case"gif": 
	     $pathtofile = "check/".$file; 
	       
	     $tagbox = json_decode(checkTagbox($pathtofile),true);
	     

		 $results[] = ["detail"=>array("tagbox"=>$tagbox,"thumbnail"=>$pathtofile)];
	   }
}

echo json_encode($results);

		        
function checkTagbox($a) {

	if (function_exists('curl_file_create')) { // php 5.5+
							  $cFile = curl_file_create($a);
							} else { // 
							  $cFile = '@' . realpath($a);
							}

	$body = ['file'=>$cFile];
	$ch = curl_init();
                             
          curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/tagbox/check");
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          
          $result = curl_exec($ch);
         
          curl_close($ch);
          return $result;

}		

function scan_dir($dir) {
	    $ignored = array('.', '..', '.svn', '.htaccess');

	    $files = array();    
	    foreach (scandir($dir) as $file) {
	        if (in_array($file, $ignored)) continue;
	        $files[$file] = filemtime($dir . '/' . $file);
	    }

	    arsort($files);
	    $files = array_keys($files);

	    return ($files) ? $files : false;
	}

?>