<?php $title = "News" ?>
<?php include "bits/start_page.inc" ; ?>

<?php

$news = "news/";

$d = dir($news);

while ( false !== ($file = $d->read()) ) {
    if ( is_file($news . $file) ) {
        include "bits/start_section.inc";
        include($news . $file);
        include "bits/end_section.inc";
    }
}

?>

<?php include "bits/end_page.inc" ; ?>
