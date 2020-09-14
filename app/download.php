<?php

if(isset($_POST["modal"])) {
	// Get parameters
	$file = basename($_POST["img-src"]);
	$file = $_SERVER['DOCUMENT_ROOT'].'/pairdp/dps/'.$file;
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	
	// Process download
	clearstatcache();
	if(file_exists($file)){ // file does not exist
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Content-Type: image/"'.$ext.'"');
		// header("Content-Transfer-Encoding: binary");

		// read the file from disk
		readfile(BASE_URL."dps/".basename($file));
	} else {
		die('file not found');
	}
}

?>