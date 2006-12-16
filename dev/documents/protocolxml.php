<?php
	$title = "Protocol Definition";
	include "../bits/start_page.inc";
	include "../bits/start_section.inc";
?>

<style type="text/css">
<!--
.new { color: #00ff00; }
.fixme { color: #ff0000; }
.inote { color: #ffff00; }

ul.response {
	margin-top: 0.5em;
	margin-bottom: 0.25em;
	font-size: 8pt;
	padding-left: 0.25em;
}

ul.response ul {
	margin-top: 0em;
	margin-bottom: 0em;
	padding-left: 1em;
}

-->
</style>

<h1>Protocol Definition for Thousand Parsec</h1>
<h4>Current from darcs (Draft) 
	<span class="fixme">
		WARNING: This document is under development, the current protocol is 
		still version 0.3
	</span>
</h4>
<p>Last updated <?php echo date ("d F Y", filemtime("../bits/protocolxml.inc")); ?>.</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<?php
	include "../bits/protocolxml.inc"
?>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Example</h2>
<p>The following is a simple example of the first interaction.</p>
<table>
	<tr>
		<td><b>From</b></td>
		<td><b>type</b></td>
		<td><b>Data Frame</b></td>
		<td><b>Description</b></td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Connect</td>
		<td>&nbsp;</td>
		<td>Can I connect? (version check)</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Ok</td>
		<td>&nbsp;</td>
		<td>You can connect</td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Login</td>
		<td>&lt;5&gt;blah\0&lt;6&gt;blah2\0</td>
		<td>This is my username and password</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Ok</td>
		<td>&nbsp;</td>
		<td>Username/password accepted</td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Get Object</td>
		<td>&lt;0&gt;</td>
		<td>Get the Universe object</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Object</td>
		<td>&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;</td>
		<td>Universe object</td>
	</tr>
</table>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>TO DO</h2>
<p>
	Stuff we have to be considered fixed...
	<ul>
		<li>Figure out how to do masking for the opT_Object_ID Order Argument type (IE like opT_Object_Type)</li>
		<li>Figure out how to support renaming objects</li>
		<li>Figure out how to support object descriptions (ie similar to order stuff)</li>
		<li>Figure out a way for the opT_List_ID to "suggest" maximums as well as hard maximums</li>
		<li>Help support?</li>
		<li>Permissions to change your stuff? Not really needed for now...</li>
		<li>Multi-language support?</li>
		<li>Add Research support</li>
		<li>Anything else I have forgotten</li>
	</ul>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/end_page.inc";
?>
