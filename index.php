<?php $title = "News" ?>
<?php include "bits/start_page.inc" ; ?>
<?php include "bits/func.inc" ; ?>

<?php

$news = "news/";
$files = get_files($news);

$i = 0;
foreach($files as $file) {
	if ($i > 10)
		break;
	else
		$i++;

	include "bits/start_section.inc";
	include($news . $file);
?>
	<p class="small">Posted: <?php echo substr($file, 0, -5); ?></p>
<?
	include "bits/end_section.inc";
}

?>

<?php include "bits/end_page.inc" ; ?>
