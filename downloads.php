<?php $title = "Downloads" ; ?>

<?php $downloads = "downloads/"; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>
<?php 

function display($directory) {
	global $downloads;

	$dir = $downloads . $directory;
	$files = @get_files($dir);

	foreach ($files as $file) {
		if ( substr($file, -4) == '.rpm' || substr($file, -4) == ".deb" ) {
			$second = strrpos(substr($file, 0, strrpos($file, '-')-1), '-');
			$goodness = substr($file, $second+1);
		} else {
			$goodness = substr($file, strrpos($file, '-')+1);
		}
		
		list($major, $minor, $revision, $tar, $compression) = split("\.", $goodness, 5);
	
		$size = (int)(filesize($dir . $file)/1024);

		print "<p>\n";
		print "	<a href=\"$dir$file\"> Version $major.$minor.$revision </a> $tar/$compression, $size KB \n";
		print "</p>\n";
	}
}
?>

<h2>C++ Server</h2>
<p>
	This is the main server for Thousand Parsec.
</p>
<?php display("cpp-server/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python WxWindows client</h2>
<p>
	This client works with any computer which has wxPython and Python installed.<br>
	Binaries for windows may be avalible at a later date. It's not a colorful as
	the pygame client but it's more fully featured.
</p>
<?php display("pywx-client/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python Text client</h2>
<p>
	This client works with any computer which has Python and py-netlib installed.<br>
	Binaries for windows may be avalible at a later date. It doesn't have all the 
	pretty graphics but it is the first to get new features.
</p>
<?php display("pytext-client/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python TP Network Library</h2>
<p>
	This library is used by all the new python clients to connect to TP servers.<br>
	All new python clients require this library to function.
</p>
<?php display("py-netlib/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

