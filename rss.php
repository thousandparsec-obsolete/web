<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
    <title>Thousand Parsec News</title>
    <link>http://www.thousandparsec.net/tp/</link>
    <description>New about Thousand Parsec!</description>
    <language>en-us</language>
<?php

$news = "news/";
$files = get_files($news);

foreach($files as $file) {
	# Read in the file
	$haystack = file_get_contents($news . $file);

	# Extract the title
	preg_match_all("|<h2>(.*?)</h2>|i",$haystack,$title);

	# Extract the author
	preg_match_all("|<p>by (.*?)</p>|i",$haystack,$author);

	$body = strip_tags( $haystack );
?>
    <item>
      <title><?php echo $title ?></title>
      <link>http://www.thousandparsec.net/tp/</link>
      <description><?php echo $body ?></description>
      <dc:creator><?php echo $author ?></dc:creator>
      <dc:date><?php echo substr($file, 0, -5); ?></dc:date>    
    </item>
<? } ?>
  </channel>
</rss>
