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
		$size = (int)(filesize($dir . $file)/1024);

		print "<p>\n";
		print "	<a href=\"$dir$file\"> $file </a>, $size KB \n";
		print "</p>\n";
	}
}
?>

<h2>Screenshots</h2>
<p>
	There are some screenshots of the clients...
</p>
<?php display("screenshots/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

