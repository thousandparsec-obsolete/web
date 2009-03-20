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
			<a href="http://www.thousandparsec.net/wiki">Wiki</a>
		</td><td>
			<a href="http://git.thousandparsec.net/gitweb/gitweb.cgi">GIT Web</a>
<!--		</td><td>
			<a href="/tp/dev/viewcvs.php/">Web CVS</a> -->
		</td><td>
			<a href="http://code.google.com/p/thousandparsec/issues/list">Bugs</a>
		</td>
	</tr>
</table>

