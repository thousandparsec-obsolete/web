<?php $title = "News" ?>
<?php include "bits/start_page.inc" ; ?>
<?php include "bits/func.inc" ; ?>

<?php

$news = "news/";
$files = get_files($news);

foreach($files as $file) {
	include "bits/start_section.inc";
	include($news . $file);
	include "bits/end_section.inc";
}

?>

<?php include "bits/end_page.inc" ; ?>
