<?php $title = "Developers section" ?>

<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<?php 

$my_url = "/tp/dev/viewcvs.php";
$viewcvs_short = "/cgi-bin/viewcvs.cgi";
$viewcvs_url = "http://www.thousandparsec.net/$viewcvs_short";


// Include an rewrite the viewcvs stuff
$url = $_SERVER['REQUEST_URI'];
$url = str_replace($my_url, '', $url);

echo "<!-- real url = $url -->";

$handle = fopen($viewcvs_url . $url, 'r');

while (! feof($handle) ) {
	$data = $data . fread($handle, 1024);
}

$data = str_replace($viewcvs_url, $my_url, $data);
$data = str_replace($viewcvs_short, $my_url, $data);
$data = str_replace('"//', '"/', $data);

// Put back any special stuff
$data = str_replace("$my_url/cvs_root.tar.gz", "$viewcvs_short/cvs_root.tar.gz", $data);
$data = str_replace("$my_url/*checkout*", "$viewcvs_short/*checkout*", $data);
$data = str_replace("images/logo.png", "$viewcvs_short/*docroot*/images/logo.png", $data);

echo $data;
?>


<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

