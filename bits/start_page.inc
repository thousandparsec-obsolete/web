<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>

<title>
	Thousand Parsec: <?php echo $title ?> 
</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="StyleSheet" href="/tp/style.css" type="text/css" />

<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/tp/js/pngfix.js"></script>
<style type="text/css">
		behavior:url("/tp/js/csshover.htc");
</style>
<![endif]-->

</head>
<body>

<div class="header"><img src="/tp/graphics/logo.png" alt="Thousand Parsec Logo" /></div>
<table class="menu">
	<tr> 
		<td <?php echo $title == 'Getting Started' ? ' class="active"' : ''; ?>>
			<a href="/tp/gettingstarted.php"><b>Getting Started</b></a>
		</td><td<?php echo $title == 'News' ? ' class="active"' : ''; ?>>
			<a href="/tp/index.php">News</a>
			<a href="/tp/rss.php"><img src="/tp/graphics/rss.gif" style="width: 18px; height: 7px;" alt="[XML]" /></a>
		</td><td<?php echo $title == 'Screenshots' ? ' class="active"' : ''; ?>>
			<a href="/tp/screenshots.php">Screenshots</a>
		</td><td<?php echo $title == 'Documents' ? ' class="active"' : ''; ?>>
			<a href="/tp/documents.php">Documents</a>
		</td><td<?php echo $title == 'Downloads' ? ' class="active"' : ''; ?>>
			<a href="/tp/downloads.php">Downloads</a>
		</td><td<?php echo $developer_section ? ' class="active"' : ''; ?>>
			<a href="/tp/dev/index.php">Developers</a>
		</td><td<?php echo $title == 'FAQ' ? ' class="active"' : ''; ?>>
			<a href="/tp/faq.php">FAQ</a>
		</td><td<?php echo $title == 'Lists' ? ' class="active"' : ''; ?>>
			<a href="/tp/mailman.php/listinfo/">Lists</a>
<!--	</td><td<?php echo $title == 'Forums' ? ' class="active"' : ''; ?>>
			<a href="http://www.thousandparsec.net/forums/">Forums</a> -->
		</td><td<?php echo $title == 'Links' ? ' class="active"' : ''; ?>>
			<a href="/tp/links.php">Links</a>
		</td>
	</tr>
</table>
