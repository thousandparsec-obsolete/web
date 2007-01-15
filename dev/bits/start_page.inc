<?php  $developer_section = true; ?>
<?php  include dirname(__FILE__) . "/../../bits/start_page.inc" ?>
<?php @include dirname(__FILE__) . "/../../tmp/sf-stats.inc" ?>

<table class="menu">
	<tr> 
		<td>
			<a href="/tp/dev/index.php"
				class="<?php echo $title == 'Developers Home' ? 'on' : ''; ?>">Home</a>
		</td><td>
			<a href="/tp/dev/documents.php"
				class="<?php echo $title == 'Documents' ? 'on' : ''; ?>">Documents</a>
		</td><td>
			<a href="/tp/dev/sloc.php"
				class="<?php echo $title == 'Lines of Code' ? 'on' : ''; ?>">Code Breakdown</a>
		</td><td>
			<a href="/tp/dev/rcs.php"
				class="<?php echo $title == 'Source Code' ? 'on' : ''; ?>">Source Code</a>
		</td><td>
			<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi">Darcs Web</a>
<!--		</td><td>
			<a href="/tp/dev/viewcvs.php/">Web CVS</a> -->
		</td><td>
			<a href="http://sourceforge.net/tracker/?group_id=132078&amp;atid=723099">
				Bugs (<?php echo $sf_bugs_open?> open)
			</a>
		</td>
	</tr>
</table>

<div id="gs">Want to win cool prizes? Why not join the <a href="/tp/comp.php">AI Programming Competition?</a></div>

