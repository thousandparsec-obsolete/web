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
		<td align="center" bgcolor="#000000">Unknown or NA</td>
	</tr>
</table>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h1>Client Support Matrix</h1>
<p>Last updated 06 November 2004.</p>

<table cellpadding=3>
	<tr>
		<td>&nbsp;</td>
		<td colspan="4"><b>py-netlib</b></td>
		<td colspan="2"><b>libtpproto-cpp</b></td>
		<td><b>(none)</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>(library)</td>
		<td>tpclient-pywx</td>
		<td>tpclient-pytext</td>
		<td>pygame-client</td>
		<td>(library)</td>
		<td>tpclient-cpptext</td>
		<td>TPJava</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center" colspan="7">
			<b>Network Features</b>
		</td>
	</tr>
	<tr>
		<td>IPv6 support</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#000000">#</td>
	</tr>
	<tr>
		<td>Can Connect?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can Login?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view objects?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can add orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can remove orders?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view boards?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view messages?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
		<td>Can post messages?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	<tr>
		<td>Can tell when a turn will end?</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can download weapon/ship designs?</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can upload weapon/ship designs?</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can download battle data?</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center" colspan="7">
			<b>Other Features</b>
		</td>
	</tr>
	<tr>
		<td>Can work in offline mode?</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ffff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view weapon/ship designs?</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view weapon/ship designs?</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Can view battles?</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#000000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
</table>

<br>
<br>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h1>Server Support Matrix</h1>
<p>Last updated 24 October 2004.</p>

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
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Protocol (version)</td>
		<td align="center" bgcolor="#00ff00">2</td>
		<td align="center" bgcolor="#00ff00">2</td>
	</tr>
	<tr>
		<td>IPv6 support</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Message Boards</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Postable Message Boards</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ffff00">#</td>
	</tr>
	<tr>
		<td>MiniSec Combat</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>MTSec Combat</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Componet Design</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
	</tr>
	<tr>
		<td>Ship Design</td>
		<td align="center" bgcolor="#ff0000">#</td>
		<td align="center" bgcolor="#ff0000">#</td>
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
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>BuildFleet</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Merge/Split Fleet</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
	<tr>
		<td>Colonise</td>
		<td align="center" bgcolor="#00ff00">#</td>
		<td align="center" bgcolor="#00ff00">#</td>
	</tr>
</table>

<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>
