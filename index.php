<?php include "bits/start_page.inc" ; ?>


<?php

$d = dir('news');

while ($file = $this_dir->read()) {
	include "bits/start_section.inc";
	include $file;
	include "bits/end_section.inc";
}

?>

<?php include "bits/end_page.inc" ; ?>
