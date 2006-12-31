<?php header('Content-type: application/rss+xml'); ?>
<?php include "bits/func.inc" ; ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<rss version="2.0" xml:base="http://www.thousandparsec.net/tp/" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
    <title>Thousand Parsec News</title>
    <link>http://www.thousandparsec.net/tp/</link>
    <description>News about Thousand Parsec!</description>
    <language>en-us</language>
<?php

$news = "news/";
$files = get_files($news);

$i = 0;
foreach($files as $file) {
	$fshort = substr($file, 0, -5);
	$url = "http://{$_SERVER['SERVER_NAME']}/tp/news.php/$fshort";

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
	$title_url=urlencode($title[1][0]);

	# Extract the author
	preg_match_all("|<p>by (.*?)</p>|i", $haystack, $author);

	$haystack = str_replace(array($title[0][0], $author[0][0]), "", $haystack);
	//leave full urls as they are
//	$haystack = preg_replace('!<a.*?href\s*=[\'"\s]*([a-z]+://.*?)[\'"\s]*>(.*?)</a>!', '\2 - \1', $haystack);
//	$haystack = str_replace(array("/tp//tp/", "/./"), array("/tp/", "/"), $haystack);
//	$haystack = preg_replace('!\s*\n\s*!', "\n", $haystack);
//	$haystack = strip_tags( $haystack );
//	$haystack = htmlspecialchars($haystack);
//	$haystack = preg_replace('!\n\n+!', "\n\n", $haystack);
	$body = $haystack;
?>
    <item>
      <title><?php echo $title[1][0] ?></title>
      <link><?php echo "$url" ?></link>
      <description>
<?php 
# Add "service links"
$haystack = "
<!-- google_ad_section_start -->
$body
<!-- google_ad_section_end -->
<div class='service-links'><div class='service-label'>Bookmark/Search this post with: </div>
- <a href='http://del.icio.us/post?url=$url&amp;title=$title_url' title='Bookmark this post on del.icio.us.' rel='nofollow'>
	<img src='/tp/img/service_links/delicious.png' alt='delicious' /> delicious</a>
- <a href='http://digg.com/submit?phase=2&amp;url=$url' title='Digg this post on digg.com.' rel='nofollow'>
	<img src='/tp/img/service_links/digg.png' alt='digg' /> digg</a>
- <a href='http://reddit.com/submit?url=$url&title=$title_url' title='Submit this post to reddit.com.' rel='nofollow'>
	<img src='/tp/img/service_links/reddit.png' alt='reddit.com' /> reddit</a>
<!--
- <a href='http://technorati.com/cosmos/search.html?url=http://www.thousandparsec.net/' title='Search Technorati for links to this post.' rel='nofollow'>
	<img src='/tp/img/service_links/technorati.png' alt='technorati' /> technorati</a></div> -->"; 

# Fix relative URLs
$haystack = preg_replace('!<a(.*?)href\s*=[\'"\s]*/(.*?)[\'"\s]*>!', "<a\\1href='http://{$_SERVER['SERVER_NAME']}/\\2'>", $haystack);
$haystack = preg_replace('!<img(.*?)src\s*=[\'"\s]*/(.*?)[\'"\s]*>!', "<img\\1src='http://{$_SERVER['SERVER_NAME']}/\\2'>", $haystack);

echo htmlentities($haystack);
?>
</description>
      <dc:creator><?php echo $author[1][0] ?></dc:creator>
      <dc:date><?php echo substr($file, 0, -10); ?>T<?php echo substr($file, -9, -7); ?>:<?php echo substr($file, -7, -5); ?>:00-00:00</dc:date>    
    </item>
<? } ?>
  </channel>
</rss>
