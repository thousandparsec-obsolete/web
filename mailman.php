<?php 

include "bits/snoopy.inc";
$fetcher = new Snoopy;
		
$my_url = "/tp/mailman.php";
$real_short = "/cgi-bin/mailman";
$real_real = "http://www.thousandparsec.net$real_short";
$real_url = "http://" . $_SERVER['SERVER_NAME'] . $real_short;

// Include GET stuff
$url = $_SERVER['REQUEST_URI'];
$url = $real_real . str_replace($my_url, '', $url);

// Include COOKIES stuff
foreach ($_COOKIE as $key => $value) {
	$key = str_replace('_', '+', $key);
	$fetcher->cookies[$key] = $value;
}

// Include POST
$sfrom = array(".",     "+"     );
$sto   = array("#DOT#", "#PLUS#");

$post = array();
foreach ($_POST as $key => $value) {
	$post[] = array(str_replace($sto, $sfrom, substr($key,5)) => $value);
}
$fetcher->set_submit_multipart();
$fetcher->submit($url,$post);
$data = $fetcher->results;

// Rewrite any cookies
foreach ($fetcher->headers as $key => $value) {
	if (substr($value, 0, 11) == "Set-Cookie:") {
		header ( str_replace($real_short, $my_url, $value) );
	}	
}

?>

<!-- <?php echo $url; echo $real_url; ?> -->

<?php $title = "Mailing Lists" ?>

<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<?php

$data = str_replace($real_url, $my_url, $data);
$data = str_replace($real_short, $my_url, $data);

$real_colors = array('#dddddd', '#99ccff', '#FFF0D0', '#99CCFF');
$my_colors   = array('#444444', '#003355', '#666666', '#003355');

$data = str_replace($real_colors, $my_colors, $data);

preg_match_all ("/name=\"(.+?)\"/i", $data, $matches);

$i = 0;
foreach ($matches[1] as $key => $value) {
	$from = '!name="' . $value . '"!i';
	$to = 'name="' . sprintf("%05d", $i) . str_replace($sfrom, $sto, $value) . '"';

	$data = preg_replace($from, $to, $data, 1);

	$i += 1;
}

// Archives stuff
$data = str_replace("/pipermail", "/tp/pipermail.php", $data);

echo $data;
?>


<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

