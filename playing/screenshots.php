<?php $title = "Screenshots" ; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>

<style>
/* Thumbnails */
 
div.withtooltip{
    position:relative;
    z-index:24;
    float:left;
    width:320px; height:240px;
    padding:10px;
}
 
div.withtooltip:hover{z-index:25;}
 
div.withtooltip span{display: none}
 
div.withtooltip:hover span{
    display:block;
    position:absolute;
    border:1px solid #00ff99;
    background-color:#000000; color:#00ff99;
    text-align: center;
    padding:10px}
 
div.withtooltip:hover span:hover{display:none;}
</style>

<?php include "bits/start_section.inc" ?>
<?php 

function display($directory) {
	$files = @get_files_by_date($directory);
 
	print "<div>\n";
	print "	<div style=\"clear:both;\">&nbsp;</div>\n";
	foreach ($files as $file) {
		if (!strstr(".png.jpg.gif.bmp",substr($file, -4)))
			continue;
		$size = (int)(filesize($directory . $file)/1024);
		$time = date("Y-m-H h:i:s", filemtime ($directory.$file));
 
		print "		<div class=\"withtooltip\">\n";
		print "			<a href=\"$directory$file\">\n";
		print "				<img style=\"display:block;margin-left:auto;margin-right:auto;\" src=\"$directory" . "thumbs/" . substr($file,0,strrpos($file,".")) . ".jpeg\" alt=\"$file\" />\n";
		print "			</a>\n";
		print "			<span>\n";
		if (!@readfile($directory . substr($file,0,strrpos($file,".")) . ".desc"))
			print $file;
		print "				<div class=\"small\">\n";
		print "					$size kiB\n";
		print "					<br />Last modified $time\n";
		print "				</div>\n";
		print "			</span>\n";
		print "		</div>\n";
	}
	print "	<div style=\"clear:both;\">&nbsp;</div>\n";
	print "</div>\n";
}

?>

<h2>Screenshots</h2>
<p>
	There are some screenshots of the clients...
</p>
<?php display("screenshots/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>

