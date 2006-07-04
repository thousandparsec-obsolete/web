<?php $title = "News" ?>
<?php include "bits/start_page.inc" ; ?>
<?php include "bits/func.inc" ; ?>

<div class="section" style="padding-top: 0.1em; padding-bottom: 0.1em;">
<p style="text-align: center">Don't know what Thousand Parsec is or want more information? <a href="gettingstarted.php">Start Here</a>.</p>
</div>

<table class="borderless boxes">
	<tr>
		<td>
<?php
$news = "news/";
$files = get_files($news);

$i = 0;
foreach($files as $file) {
	if ($i == 2) { ?>

		</td><td class="boxes">

<?php include(dirname(__FILE__) . "/tmp/fm-stats.inc"); ?>
<?php include(dirname(__FILE__) . "/tmp/sf-stats.inc"); ?>
<?php include(dirname(__FILE__) . "/tmp/darcs.inc"); ?>
<?php include(dirname(__FILE__) . "/tmp/lists.inc"); ?>

<div class="box">
	<b class="small"><a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi">Latest Developments:</a></b><br />
	<span class="small">On: <?php echo strtr($darcs[0]['when'], array('T' => ' ', 'Z' => ' ')); ?></span><br /> 
	<span class="small">By: <?php echo preg_replace('/@[A-Za-z0-9.-]*/' , '@...', $darcs[0]['whom']); ?></span><br /> 
	<span class="small">To: <?php echo substr($darcs[0]['where'], strrpos($darcs[0]['where'], '/')+1, -3); ?></span><br />
	<span class="ultrasmall">Comment:</span><br /><span class="small"><?php echo $darcs[0]['title']; ?></span><br />
</div>

<div class="box">
	<b class="small"><a href="http://dir.gmane.org/search.php?match=gmane.comp.games.tp">Posts to ML:</a></b><br />
	<span class="small">On: <?php echo strtr($lists[0]['when'], array('T' => ' ', 'Z' => ' ')); ?></span><br /> 
	<span class="small">By: <?php echo preg_replace('/@[A-Za-z0-9.-]*/' , '@...', $lists[0]['whom']); ?></span><br /> 
	<span class="small">To: <?php echo substr($lists[0]['where'], strrpos($lists[0]['where'], '/')+1, -3); ?></span><br />
	<span class="ultrasmall">Topic:</span><br /><span class="small"><?php echo $lists[0]['title']; ?></span><br />
	<table class="small" style="margin-left: auto; margin-right: auto;">
		<tr>
			<th class="ultrasmall">
				<a href="http://dir.gmane.org/gmane.comp.games.tp.general">
					Users Posts</a>
			</th>
			<th class="ultrasmall">
				<a href="http://dir.gmane.org/gmane.comp.games.tp.devel">
					Dev Posts</a>
			</th>
		</tr><tr>
			<td style="padding-right: 2px;">
				<a href="http://gmane.org/details.php?group=gmane.comp.games.tp.general">
					<img src="/tp/tmp/lists/tp.general-small.png" alt="Posts to General List Graph" /></a>
			</td><td style="padding-left: 2px;">
				<a href="http://gmane.org/details.php?group=gmane.comp.games.tp.devel">
					<img src="/tp/tmp/lists/tp.devel-small.png" alt="Posts to Developer List Graph" /></a>
			</td>
		</tr>
	</table>
</div>

<div class="box" style="
	background-repeat: no-repeat;
	background-image: url(/tp/tmp/fm-stats-small.png);
	background-position: right center;
	padding-right: 28px;">
	<b class="small"><a href="http://freshmeat.net/project-stats/view/43366/">Freshmeat Stats:</a></b><br />
	<span class="small">Rating:</span>          <?php echo $fm_rating; ?>/10.00<br />
	<span class="small">Vitality Rank:</span>   <?php echo $fm_vitality_rank; ?><br />
	<span class="small">Popularity Rank:</span> <?php echo $fm_popularity_rank; ?><br />
<!--	<span class="small">Vitality:</span>   <?php echo $fm_vitality_percent; ?>%,
	<span class="small">Rank</span>        <?php echo $fm_vitality_rank; ?><br />
	<span class="small">Popularity:</span> <?php echo $fm_popularity_percent; ?>%, 
	<span class="small">Rank</span>        <?php echo $fm_popularity_rank; ?><br /> -->
</div>

<div class="box">
	<table class="small" style="width: 100%;">
		<tr>
			<td style="text-align: left;">
				<b class="small"><a href="http://sourceforge.net/project/stats/?group_id=132078&amp;ugn=thousandparsec">SourceForge Stats:</a></b></td>
			<td rowspan="4" style="text-align: right;">
				<a href="http://sourceforge.net/project/stats/detail.php?group_id=132078&amp;ugn=thousandparsec&amp;mode=week&amp;type=sfweb">
					<img src="/tp/tmp/sf-stats-small.png" alt="SF Page Hits Graph" /></a></td>
		</tr><tr>
			<td style="text-align: left; padding-right: 2em;">
				<span class="small">Bugs:</span> <?php echo $sf_bugs_open . "/" . $sf_bugs_closed; ?></td>
		</tr><tr>
			<td style="text-align: left"><span class="small">Todo:</span> <?php echo $sf_todo_open . "/" . $sf_todo_closed; ?></td>
		</tr><tr>
			<td style="text-align: left"><span class="small">Devs:</span> <?php echo $sf_devs; ?></td>
		</tr>
	</table>
</div>

		</td>
	</tr>
</table>
<?php }

	if ($i > 10)
		break;
	else
		$i++;

	include "bits/start_section.inc";
	include($news . $file); ?>
	<p class="small">Posted: <?php echo substr($file, 0, -5); ?></p>
<?php
	include "bits/end_section.inc";
}
?>

<?php include "bits/end_page.inc" ; ?>
