<?php header('Content-type: application/rss+xml'); ?>
<?php include "bits/func.inc" ; ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<rss version="2.0" 
     xml:base="http://www.thousandparsec.net/tp/" 
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:atom="http://www.w3.org/2005/Atom"
>
  <channel>
    <atom:link href="http://www.thousandparsec.net/tp/rss.xml" rel="self" type="application/rss+xml" />
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
	$haystack = substr($haystack, 0, -1);

	# Extract the title
	preg_match_all("|<h2>(.*?)</h2>|i",$haystack,$title);
	$title_url=urlencode($title[1][0]);

	# Extract the author
	preg_match_all("|<p>by (.*?)</p>|i", $haystack, $author);

	$haystack = str_replace(array($title[0][0], $author[0][0]), "", $haystack);
	$body = $haystack;
?>
    <item>
      <title><?php echo strip_tags($title[1][0]); ?></title>
      <link><?php echo "$url" ?></link>
      <guid><?php echo "$url" ?></guid>
      <description>
<?php

$body = preg_replace('!<a(.*)href\s*=\s*([\'"])/(.*)\2!U', "<a\\1href='http://{$_SERVER['SERVER_NAME']}/\\3' ", $body);
$body = preg_replace('!<img(.*)src\s*=\s*([\'"])/(.*)\2!U', "<img\\1src='http://{$_SERVER['SERVER_NAME']}/\\3' ", $body);

# Convert the HTML input to markdown format.
require_once 'bits/markdownify.php';
$md = new Markdownify(True, 100, false);
$plaintext = htmlspecialchars(strip_tags($md->parseString($body)));

# Clean up some bad links
$plaintext = preg_replace("|!\[]\[[0-9]+\]|", "", $plaintext);
$plaintext = preg_replace("|\[\s*]\[[0-9]+\]|", "", $plaintext);
$plaintext = preg_replace("|^ \[\]:.*$|m", "", $plaintext);
$plaintext = preg_replace("|^\*  |m", " * ", $plaintext);
$plaintext = str_replace("[", " [", $plaintext);
$plaintext = str_replace("  [", " [", $plaintext);
$plaintext = str_replace("] [", "][", $plaintext);
$plaintext = str_replace("\n\n\n", "\n", $plaintext);
$plaintext = str_replace("\_", "_", $plaintext);

echo $plaintext;

?>
      
      </description>
<?php 
# Add "service links"
$haystack = "
$body
<div class='service-links'><div class='service-label'>Bookmark/Search this post with: </div>
- <a href='http://del.icio.us/post?url=$url&amp;title=$title_url' title='Bookmark this post on del.icio.us.' rel='nofollow'>
	<img src='/tp/img/service_links/delicious.png' alt='delicious' /> delicious</a>
- <a href='http://digg.com/submit?phase=2&amp;url=$url' title='Digg this post on digg.com.' rel='nofollow'>
	<img src='/tp/img/service_links/digg.png' alt='digg' /> digg</a>
- <a href='http://technorati.com/cosmos/search.html?url=http://www.thousandparsec.net/' title='Search Technorati for links to this post.' rel='nofollow'>
	<img src='/tp/img/service_links/technorati.png' alt='technorati' /> technorati</a></div>"; 

# Fix relative URLs
$haystack = preg_replace('!<a(.*)href\s*=\s*([\'"])/(.*)\2!U', "<a\\1href='http://{$_SERVER['SERVER_NAME']}/\\3' ", $haystack);
$haystack = preg_replace('!<img(.*)src\s*=\s*([\'"])/(.*)\2!U', "<img\\1src='http://{$_SERVER['SERVER_NAME']}/\\3' ", $haystack);

echo "<content:encoded><![CDATA[";
echo $haystack;
echo "]]></content:encoded>\n";
?>
      <dc:creator><?php echo $author[1][0] ?></dc:creator>
      <dc:date><?php echo substr($file, 0, -10); ?>T<?php echo substr($file, -9, -7); ?>:<?php echo substr($file, -7, -5); ?>:00-00:00</dc:date>    
    </item>
<? } ?>
  </channel>
</rss>
