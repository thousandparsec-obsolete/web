<?php $title = "Screenshots" ; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>
<?php 

function display($directory) {
	$files = @get_files_by_date($directory);

	foreach ($files as $file) {
		$size = (int)(filesize($directory . $file)/1024);
		$time = date("Y-m-H h:i:s", filemtime ($directory.$file));

		print "<p>\n";
		print "	<a href=\"$directory$file\"> $file </a>, $size KB, <span class="small">last modified $time</span> \n";
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

