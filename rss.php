<?php header('Content-type: application/rss+xml'); ?>
<?php include "bits/func.inc" ; ?>
<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>' ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
    <title>Thousand Parsec News</title>
    <link>http://www.thousandparsec.net/tp/</link>
    <description>New about Thousand Parsec!</description>
    <language>en-us</language>
<?php

$news = "news/";
$files = get_files($news);

$i = 0;
foreach($files as $file) {
	if ($i == 0) { ?>
    <lastBuildDate><?php echo substr($file, 0, -10); ?>T<?php echo substr($file, -9, -7); ?>:<?php echo substr($file, -7, -5); ?>:00-00:00</lastBuildDate>
<?php
	}

	if ($i > 10)
		break;
	else
		$i += 1;

	# Read in the file
	$haystack = file_get_contents($news . $file);

	# Extract the title
	preg_match_all("|<h2>(.*?)</h2>|i",$haystack,$title);

	# Extract the author
	preg_match_all("|<p>by (.*?)</p>|i",$haystack,$author);

	$haystack = str_replace(array($title[0][0], $author[0][0]), "", $haystack);
	//leave full urls as they are
	$haystack = preg_replace('!<a.*?href\s*=[\'"\s]*(http://.*?)[\'"\s]*>(.*?)</a>!', '\2 - \1', $haystack);
	$haystack = preg_replace('!<a.*?href\s*=[\'"\s]*(.*?)[\'"\s]*>(.*?)</a>!', '\2 - http://www.thousandparsec.net/tp/\1', $haystack);
	$haystack = str_replace(array("/tp//tp/", "/./"), array("/tp/", "/"), $haystack);
	$haystack = preg_replace('!\s*\n\s*!', "\n", $haystack);
	$haystack = strip_tags( $haystack );
	$haystack = htmlspecialchars($haystack);
	$haystack = preg_replace('!\n\n+!', "\n\n", $haystack);
	$body = $haystack;

#	print_r($title);
?>
    <item>
      <title><?php echo $title[1][0] ?></title>
      <link>http://www.thousandparsec.net/tp/</link>
      <description><?php echo $body ?></description>
      <dc:creator><?php echo $author[1][0] ?></dc:creator>
      <dc:date><?php echo substr($file, 0, -10); ?>T<?php echo substr($file, -9, -7); ?>:<?php echo substr($file, -7, -5); ?>:00-00:00</dc:date>    
    </item>
<? } ?>
  </channel>
</rss>
