
<?php $title = "Orders" ?>

<?php include "bits/start_page.inc" ?>

<?php include "bits/start_section.inc" ?>

<p>Last updated: 18 Feb 2003</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Move</h2>
<ul>
	<li>
		Warp drive<br>
		Warp drives move through normal space at a speed greater then light.
		Higher speed uses more fuel, possibility of "ram scoop" engines which 
		can get fuel from space at lower speeds.
		Requires: Destination, Speed
	</li>
	<li>
		Jump drive<br>
			  Jump drives jump directly to the destination without passing through
			  the points in-between. They take a long time to charge and without
			  "space anchors" never really turn up at the exact destination.
			  How long the engine charges for increases the accuracy. Longer
			  distances have less accuracy. Most distances have a "minimum"
			  charge time.
			  Requires: Destination, ChargeTime
	</li>
	<li>
		Link drives<br>
			  Use "holes" in space to go from one system to another. These drives
			  just open the holes which already exist. (At higher tech levels
			  "holes" can be created and destroyed).
			  Requires: Hole to enter
	</li>
	<li>
		Grav accel drives<br>
			  As used by packet accelerators, once in transit no course change can
			  be made. These drives don't use any fuel at all, how ever ships are
			  damaged in transport. Max speed is determined by the maximum damage
			  the ship can withstand.
			  Requires: Destination, Speed
	</li>
</ul>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Build</h2>
<p>
	Build something. Planets can build planety facilities and ships with 
	surface to space capability. Space stations (and construction ships)
	can build ships which can fit in their docks.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Colonize</h2>
<p>
	Colonize the currently orbiting planet.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Colonize using Space Station</h2>
<p>
	Like colonize but deploys a space station. Used for races which can't exist
	on a planet.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Deploy, Space Station</h2>
<p>
	Unpack a stationary space device.
	This also include sensors and communication relays (as they are just space
	station commonents).
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Deploy, Space Anchor</h2>
<p>
	Create a space anchor so that jump ships can reliably jump to this location
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Create "hole"</h2>
<p>
	Create a "hole" from this system to the target system.
	Longer distances require exponentially more energy.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Mine</h2>
<p>
	Mines the current location. (Used for remote mining operations)
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Transport</h2>
<p>
	You can only transfer to a planet if it has a space station or the ship has
	ground to space capability.
</p>
<ul>
	<li>
		Pickup<br>
		How much of what?
	</li>
	<li>
		Drop off<br>
		How much of what?
	</li>
	<li>
		Transfer<br>
		How much of what?
	</li>
</ul>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>??Tow??</h2>
<p>
	Drags a target to a destination, used by tug boats etc..
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Attack</h2>
<p>
	Attack and enemy
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Lay defense</h2>
<p>
	Lay mines or sentinel defense systems at location
</p>
