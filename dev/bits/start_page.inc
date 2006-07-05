<?php  $developer_section = true; ?>
<?php  include dirname(__FILE__) . "/../../bits/start_page.inc" ?>
<?php @include dirname(__FILE__) . "/../../tmp/sf-stats.inc" ?>

<table class="menu">
	<tr> 
		<td<?php echo $title == 'Developers Home' ? ' class="active"' : ''; ?>>
			<a href="/tp/dev/index.php">Home</a>
		</td><td<?php echo $title == 'Documents' ? ' class="active"' : ''; ?>>
			<a href="/tp/dev/documents.php">Documents</a>
		</td><td<?php echo $title == 'Lines of Code' ? ' class="active"' : ''; ?>>
			<a href="/tp/dev/sloc.php">Code Breakdown</a>
		</td><td<?php echo $title == 'Source Code' ? ' class="active"' : ''; ?>>
			<a href="/tp/dev/rcs.php">Source Code</a>
		</td><td>
			<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi">Darcs Web</a>
<!--		</td><td>
			<a href="/tp/dev/viewcvs.php/">Web CVS</a> -->
		</td><td>
			<a href="http://sourceforge.net/tracker/?group_id=132078&amp;atid=723099">
				Bugs (<?php echo $sf_bugs_open?> open)
			</a>
		</td>
</table>
