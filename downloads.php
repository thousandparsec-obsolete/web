<?php $title = "Downloads" ; ?>

<?php $downloads = "downloads/"; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>C++ Server</h2>
<p>
	This is the main server for Thousand Parsec.
</p>
<p>
<?php 

$dir = $downloads . "cpp-server/";
$files = @get_files($dir);

foreach ($files as $file) {
	list($trash, $goodness) = split("-", $file, 2);
	list($major, $minor, $revision, $tar, $compression) = split("\.", $goodness, 5);
?>

<p>
	<a href="<?php echo $dir . $file; ?>"> Version <?php echo "$major.$minor.$revision"; ?></a> <?php echo "$tar/$compression"; ?>, <?php echo (int)(filesize($dir . $file)/1024) ?> KB
</p>

<?php
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
<?php 

$dir = $downloads . "pywx-client/";
$files = @get_files($dir);

foreach ($files as $file) {
	list($trash, $goodness) = split("-", $file, 2);
	list($major, $minor, $revision, $tar, $compression) = split("\.", $goodness, 5);
?>

<p>
	<a href="<?php echo $dir . $file; ?>"> Version <?php echo "$major.$minor.$revision"; ?></a> <?php echo "$tar/$compression"; ?>, <?php echo (int)(filesize($dir . $file)/1024) ?> KB
</p>

<?php
}
?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>
