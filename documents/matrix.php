<?php
  $title = "Feature Matrix for Thousand Parsec";
  include "../bits/start_page.inc";
  include "../bits/start_section.inc";
?>

<h1>Key</h1>

<table>
	<tr>
		<td align="center" bgcolor="#00ff00">Fully Supported and Working</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#ffff00">Partially Working</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#ff0000">Not working or Not implimented</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#000000">Unknown</td>
	</tr>
</table>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h1>Client Support Matrix</h1>
<p>Last updated 8 August 2004.</p>

<table>
	<tr>
		<td>&nbsp;</td>
		<td colspan=3><b>py-netlib</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>pywx-client</td>
		<td>pytext-client</td>
		<td>pygame-client</td>
	</tr>
	<tr>
		<td align="center" colspan=4>
			<b>Network Features</b>
		</td>
	</tr>
	<tr>
		<td>Can Connect?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can Login?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view objects?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can add orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can remove orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view boards?</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view messages?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can tell when a turn will end?</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
</td>
</table>

<br>
<br>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h1>Server Support Matrix</h1>
<p>Last updated 02 October 2004.</p>

<table>
	<tr>
		<td>&nbsp;</td>
		<td>py-server</td>
		<td>cpp-server</td>
	</tr>
	<tr>
		<td align="center" colspan=3>
			<b>Features</b>
		</td>
	</tr>
	<tr>
		<td>Persistant Universe</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Protocol (version)</td>
		<td align="center" bgcolor="#00ff00">2</td>
		<td align="center" bgcolor="#00ff00">2</td>
	</tr>
	<tr>
		<td>IPv6 support</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Message Boards</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>

	<tr>
		<td align="center" colspan=3>
			<b>Orders</b>
		</td>
	</tr>
	<tr>
		<td>NOp</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Move</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ffff00">#</td>
	</tr>
	<tr>
		<td>BuildFleet</td>
		<td align="center" bgcolor="#ffff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Attack</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Merge/Split Fleet</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Colonise</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ffff00">#</td>
	</tr>
</table>


<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>
