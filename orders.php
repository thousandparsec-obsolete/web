<?php $title = "Orders" ?>

<?php include "bits/start_page.inc" ?>

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
			  Jump drives jump directly to the destination without parseing through
			  the points inbetween. They take a long time to charge and without
			  "space anchors" never really turn up at the extact destination.
			  How long the engine charges for increases the accuracy. Longer
			  distances have less acurracy. Most distances have a "minimum"
			  charge time.
			  Requires: Destination, ChargeTime
	</li>
	<li>
		Link drives<br>
			  Use "holes" in space to go from one system to another. These drives
			  just open the holes which already exist. (At higher tech levels
			  "holes" can be created and destoryied).
			  Requires: Hole to enter
	</li>
	<li>
		Grav accel drives<br>
			  As used by packet accelerators, once in transit no course change can
			  be made. These drives don't use any fuel at all, how ever ships are
			  damanged in transport. Max speed is determined by the maximum damanage
			  the ship can withstand.
			  Requires: Destination, Speed
	</li>
</ul>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Colonise</h2>
<p>
	Colonise the currently orbiting planet.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Deploy space station</h2>
<p>
	Like colonise but deploys a space station. Used for races which can't exist
	on a planet.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Deploy space anchor</h2>
<p>
	Create a space anchor so that jump ships can reliably jump to this location
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Create "hole"</h2>
<p>
	Create a "hole" from this system to the target system.
	Longer distances require exponentionally more energy.
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
	Lay mines or sentinal defense systems at location
</p>
