<?php

function get_files($dir) {

	$d = dir($dir);

	$files = array();

	while ( false !== ($file = $d->read()) ) {
	    if ( is_file($dir . $file) ) {
	        $files[] = $file;
	    }
	}

	sort($files);
	$files = array_reverse($files);

	return $files;
}

function get_files_by_date($dir) {

	$d = dir($dir);

	$files = array();

	while ( false !== ($file = $d->read()) ) {
	    if ( is_file($dir . $file) ) {
	        $files[] = "".filemtime($dir.$file).'#'.$file;
	    }
	}

	sort($files);
	$files = array_reverse($files);

	$sfiles = array();
	foreach ($files as $file) {
		list($trash, $sfiles[]) = split('#', $file, 2);
	}

	return $sfiles;
}

?>
