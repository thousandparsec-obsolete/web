<?php $title = "Mail Archives" ?>

<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<?php 

$my_url = "/tp/pipermail.php";
$piper_short = "/pipermail";
$piper_url = "http://" . $_SERVER['SERVER_NAME'] . $piper_short;

// Include an rewrite the piper stuff
$url = $_SERVER['REQUEST_URI'];
$url = str_replace($my_url, '', $url);

echo "<!-- real url = $piper_url$url -->";

$handle = fopen($piper_url . $url, 'r');

while (! feof($handle) ) {
	$data = $data . fread($handle, 1024);
}

$data = preg_replace("-\"(.+)((\.mbox)|(\.txt))\"-", "/pipermail$url$1$2", $data);

// $data = str_replace($piper_url, $my_url, $data);
// $data = str_replace($piper_short, $my_url, $data);

// Replace the listinfo ones
$data = str_replace("/cgi-bin/mailman/", "/tp/mailman.php/", $data);

// Put the download/text stuff
$data = str_replace("$my_url/cvs_root.tar.gz", "$piper_short/cvs_root.tar.gz", $data);

echo $data;
?>


<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

