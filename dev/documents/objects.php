<?php
  $title = "Object Definition for Thousand Parsec";
  include "../bits/start_page.inc";
  include "../bits/start_section.inc";
?>

<h1>Object Definition for Thousand Parsec</h1>
<p>Last updated 24 March 2004.</p>
<p>The document outlines the various objects in the TP universe and the extra data associated with them.</p>
<p>These definitions will only change in a backward compatable way.  Any change that is not backward 
compatable will change the Object Type Numbers affected by the change.</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Basics</h2>
<p>This document will follow the same style as the protocol doc, IE, a 32 bit integer is shown as &lt;n&gt; 
and a 64 bit integer as &lt;&lt;n&gt;&gt;</p>
<p>The extra data sections show follow the standard data for each object.</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Object Types</h2>
<p>There are many in game Object types.  Each has an object type number, as shown in the table below:
<table class="tabular">
  <tr>
    <th>Type Number</th>
    <th>Object Type</th>
  </tr>
  <tr class="row0">
    <td class="numeric">0</td>
    <td>Universe</td>
  </tr>
  <tr class="row1">
    <td class="numeric">1</td>
    <td>Galaxy</td>
  </tr>
  <tr class="row0">
    <td class="numeric">2</td>
    <td>Star System</td>
  </tr>
  <tr class="row1">
    <td class="numeric">3</td>
    <td>Planet</td>
  </tr>
  <tr class="row0">
    <td class="numeric">4</td>
    <td>Fleet</td>
  </tr>
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Universe</h2>
<p>The Universe is the top level object, everyone can always get it.  It does not handle much itself.</p>
<p>It only has one piece of data, that is the int32 turn number, also know as the year since game start.</p>
<h4>Extra data</h4>
<ul>
	<li>a UInt32, the current year/turn number</li>
</ul>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Galaxy</h2>
<p>The Galaxy is a container for a large group of close star systems, like the Milky Way.</p>
<p>The Galaxy contains no extra data.</p>
<h4>Extra data</h4>
<p>No extra data.</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Star System</h2>
<p>A star system contains one or more stars and any related objects.  The star itself is not yet modeled.</p>
<p>Star System objects do not have any extra data.</p>
<h4>Extra data</h4>
<p>No extra data.</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Planet</h2>
<p>A planet is any body in space which is very large and naturally occuring.</p>
<p>Planet objects have int32 Player id, which is the owner of the planet.</p>
<h4>Extra data</h4>
<ul>
	<li>a SInt32, the id of the player who "owns" this planet or -1 if not owned or unknown</li>
	<li>a list of,
		<ul class="new">
			<li>a UInt32, the resource id</li>
			<li>a UInt32, the units of this resource on the "surface"</li>
			<li>a UInt32, the maximum units of this resource remaining which are minable</li>
			<li>a UInt32, the maximum units of this resource remaining which are inaccessable</li>
		</ul>
	</li>
</ul>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Fleet</h2>
<p>A fleet is a collection of ships.  Many different ships can make up a fleet.</p>
<p>A fleet has an owner, int32 Player ID.</p>
<h4>Extra data</h4>
<ul>
	<li>a SInt32, the id of the player who owns this fleet or -1 if not owned or unknown</p>
	<li>a list of,
		<ul>
			<li>a UInt32, the type of the ship</li>
			<li>a Uint32, the number of the ships in the fleet</li>
		</ul>
	</li>
	<li>a UInt32, the amount of damage the fleet currently has</li>
</ul>

<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>
