<?php $title = "Downloads" ?>

<?php

	$downloads = "downloads/"
	
?>

<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>C++ Server</h2>
<p>
	This is the main server for Thousand Parsec.
</p>
<p>
<?php 
$d = array_reverse(dir($downloads . "tpserv*"));

while ( false !== ($file = $d->read()) ) {
    if ( is_file($downloads . $file) ) {
	
	# tpserv-0.0.1.tar.gz
	list($trash, $goodness) = split("-", $file);
	list($major, $minor, $revision, $tar, $compression) = split(".", $goodness);
?>

<p>
	<a href="<?php echo $downloads . $file; ?>"> Version <?php echo $major . "." . $minor . "." . $revision ?></a> <?php echo $tar ?>/<?php echo $compression ?>, <?php echo filesize($downloads . $file)/1024 ?> KB
</p>

<?php
    }
}
?>
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python WxWindows client</h2>
<p>
	This client works with any computer which has wxPython and Python installed.<br>
	Binaries for windows may be avalible at a later date. It's not a colorful as
	the pygame client but it's more fully featured.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>
