<?php

function sequentialImages($path, $sort=false) {
	$i = 75;
	$files = glob($path."/{*.gif,*.jpg,*.jpeg,*.png}",GLOB_BRACE|GLOB_NOSORT);
	
	if ( $sort !== false ) {
		usort($files, $sort);
	}
	
	$count = count($files);
	foreach ( $files as $file ) {
		$newname = str_pad($i, strlen($count)+1, '0', STR_PAD_LEFT);
		$ext = substr(strrchr($file, '.'), 1);
		$newname = $path.'/'.$newname.'.'.$ext;
		if ( $file != $newname ) {
			rename($file, $newname);  
		}
		$i++;
	}
}

function sort_by_mtime($file1, $file2) {
	$time1 = filemtime($file1);
	$time2 = filemtime($file2);
	if ( $time1 == $time2 ) {
		return 0;
	}
	return ($time1 < $time2) ? 1 : -1;
}

// sequentialImages('dps','sort_by_mtime');

?>