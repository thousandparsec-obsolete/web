<?php $title = "News" ?>
<?php include "bits/start_page.inc" ; ?>
<?php include "bits/func.inc" ; ?>

<div id="boxes">
<?php include(dirname(__FILE__) . "/tmp/fm-stats.inc"); ?>
<?php include(dirname(__FILE__) . "/tmp/sf-stats.inc"); ?>
<div style="
	background-repeat: no-repeat;
	background-image: url(/tp/tmp/fm-stats-small.png);
	background-position: right center;">
	<b class="small"><a href="http://freshmeat.net/project-stats/view/43366/">Freshmeat Stats:</a></b><br>
	<span class="small">Rating:</span>     <?php echo $fm_rating; ?>/10.00<br>
	<span class="small">Vitality:</span>   <?php echo $fm_vitality_percent; ?>%,
	<span class="small">Rank</span>        <?php echo $fm_vitality_rank; ?><br>
	<span class="small">Popularity:</span> <?php echo $fm_popularity_percent; ?>%, 
	<span class="small">Rank</span>        <?php echo $fm_popularity_rank; ?><br>
</div><div>
	<b class="small"><a href="http://sourceforge.net/project/stats/?group_id=132078&ugn=thousandparsec">SourceForge Stats:</a></b><br>
	<span class="small">Bugs:</span> <?php echo $sf_bugs_open . "/" . $sf_bugs_closed; ?><br>
	<span class="small">Todo:</span> <?php echo $sf_todo_open . "/" . $sf_todo_closed; ?><br>
	<span class="small">Devs:</span> <?php echo $sf_devs; ?><br>
<!--
</div><div>
	<b class="small">New Posts to ML:</b><br>
	<br>
</div><div>
	<b class="small">Latest Developments:</b><br>
	<br>
-->
</div>
</div>

<div style="padding-right: 220px;">
<?php

$news = "news/";
$files = get_files($news);

$i = 0;
foreach($files as $file) {
	if ($i == 2) echo "</div>\n";

	if ($i > 10)
		break;
	else
		$i++;

	include "bits/start_section.inc";
	include($news . $file);
?>
	<p class="small">Posted: <?php echo substr($file, 0, -5); ?></p>
<?php
	include "bits/end_section.inc";
}

?>

<?php include "bits/end_page.inc" ; ?>
