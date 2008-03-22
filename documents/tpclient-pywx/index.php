<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en-us" />

<meta name="Author" content="Web Design Copyright (c) 2006 Donovan 'Riyonuk' Hernandez - http://riyonuk.no-ip.org/" />
<meta name="Copyright" content="" />
<meta name="Description" content="A free and opensource framework for developing turn-based space empire building games (4X strategy games)" />
<meta name="Keywords" content="strategy, strategies, games, game, gaming, 4x, turn-based, free, open source, stars!, galactic civilizations, space, linux, vga planets, reach for the stars, rfts" />
<meta name="Robots" content="All" />

<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/tp/js/pngfix.js"></script>
<style type="text/css">
   behavior:url("/tp/js/csshover.htc");
</style>
<![endif]-->

<link rel="shortcut icon" href="/tp/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="screen" href="/tp/style.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/tp/parsec.css" />
<link rel="alternate" type="application/rss+xml" title="Thousand Parsec News" href="http://www.thousandparsec.net/tp/rss.php" />

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-737789-1";
urchinTracker();
</script>

<title>Thousand Parsec wxPython Client Help Page</title>

</head>
<body style="margin: 50px;">

<?php 

$current_version = "0.3.1";

if (isset($_GET['version_git'])) {
	
	echo <<<EOF
<div class="box">
	<div class="box_top_left"></div>
	<div class="box_top_right"></div>
	<div class="box_top"></div>
	<div class="box_left">
		<div class="box_right">
			<div class="box_content">
<div style="text-align: center;">
<h1>Thanks for testing!</h1>
</div>
<p>
We have detected that you are running the client from a development environment
or using a nightly build. We thank you for testing code which is under
development!
</p><p>
This documentation might be out of date, we appreciate any help with
corrections or updates.  
</p>
			</div><!-- End box_content -->
		</div><!-- End box_right -->
	</div><!-- End box_left -->
	<div class="box_bottom_left"></div>
	<div class="box_bottom_right"></div>
	<div class="box_bottom"></div>
</div>
EOF;

} else if ($_GET['version'] != $current_version) {
	echo <<<EOF
<div class="box">
	<div class="box_top_left"></div>
	<div class="box_top_right"></div>
	<div class="box_top"></div>
	<div class="box_left">
		<div class="box_right">
			<div class="box_content">
<div style="text-align: center;">
<h1><span style="color: red;">Version out of date!</span></h1>
</div>
<p>
You are running version {$_GET['version_str']} which is not the currently
supported version (which is {$current_version}). This documentation might be
incorrect, it is highly recommened that you upgrade! 
</p><p>
You can always downloaded the latest version from the 
<a href="/tp/downloads.php#tpclient-pywx">download page</a>.
</p>
			</div><!-- End box_content -->
		</div><!-- End box_right -->
	</div><!-- End box_left -->
	<div class="box_bottom_left"></div>
	<div class="box_bottom_right"></div>
	<div class="box_bottom"></div>
</div>

EOF;
}
?>

<div class="box">
	<div class="box_top_left"></div>
	<div class="box_top_right"></div>
	<div class="box_top"></div>
	<div class="box_left">
		<div class="box_right">
			<div class="box_content">
<h1>Thousand Parsec wxPython Client Help page</h1>
<p>
	This page lists all the help resources for the Thousand Parsec wxPython client.
</p>

<h2>Help Videos</h2>
<ul>
	<li>Creating an Account and Logging In</li>
	<li>Tour around the main screen</li>
</ul>

			</div><!-- End box_content -->
		</div><!-- End box_right -->
	</div><!-- End box_left -->
	<div class="box_bottom_left"></div>
	<div class="box_bottom_right"></div>
	<div class="box_bottom"></div>
</div>

</body>
