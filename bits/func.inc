<?php

function get_files($dir) {

	$d = dir($dir);

	$files = array();

	while ( false !== ($file = $d->read()) ) {
	    if ( is_file($dir . $file) ) {
	        $files[] = $file;
	    }
	}

#	$files = array_reverse($files);

	return $files;

}

?>
