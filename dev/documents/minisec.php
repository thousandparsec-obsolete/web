
<?php $title = "MiniSec" ?>
<?php include "../bits/start_page.inc" ?>
<?php include "../bits/start_section.inc" ?>
 
<p>Last updated: 28 Jun 2004</p>
 
<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Winning</h1>

<p>The game is won by destroying the other player
totally. You lose if you get destroyed :).</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Ships</h1>

<h2>Scout</h2>
<ul>
	<li>Weapons - Escapes if it wins a match</li>
	<li>Moves - 3 units per turn</li>
	<li>Armour - 2 HP</li>
	<li>Build - 1 Turn</li>
</ul>

<h2>Frigate</h2>
<ul>
	<li>Weapon - 2 HP Damage on Win, Fires First</li>
	<li>Moves - 2 units per turn</li>
	<li>Armour - 4 HP</li>
	<li>Build - 2 Turns</li>
	<li>Special - Can colonise a planet</li>
</ul>

<h2>Battleship</h2>
<ul>
	<li>Weapon - 3 HP Damage on Win, 1 HP Damage on Draw</li>
	<li>Moves - 1 units per turn</li>
	<li>Armour - 6 HP</li>
	<li>Build - 4 Turns</li>
</ul>

<p>Fleets move at the speed of the slowest ship in the fleet.</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Building</h1>
<p>
Any planet which has been "Colonised" can build a ship.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Colonising</h1>
<p>
A Frigate is used up in the process of colonising a planet. 
</p><p>
If the planet is already colonised combat occurs between the Frigate and
the Planet. A normal planet is considered 2 battleships, a home world is
considered 5 battleships.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Combat</h1>
<p>
When two fleets start combat the following occurs, they play rock,
paper, scissors. Damage is always assigned to the strongest ships first.
All ships orbiting a planet that the player owns repair to full
strength.
</p><p>
Combat ends when one side destroys the other or the ships escape.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Example of combat</h2>

Fleet 1 = 1 Scout, 3 Frigate
Fleet 2 = 2 Battleships

<h3>Round 1</h3>
<ul>
	<li>Fleet 1, Rock</li>
	<li>Fleet 2, Paper</li>
	<li>Paper beats Rock</li>
</ul>

<p>Fleet 2 does 3 damage to 2 Frigates</p>

<h3>Round 2</h3>
<ul>
	<li>Fleet 1, Scissors</li>
	<li>Fleet 2, Rock</li>
	<li>Rock beats Scissors</li>
</ul>

<p>Fleet 2 does 3 damage to 2 Frigates - Destroying one Frigate</p>

<h3>Round 3</h3>
<ul>
	<li>Fleet 1, Scissors</li>
	<li>Fleet 2, Paper</li>
	<li>Scissors beats Paper</li>
</ul>

<p>Fleet 1 does 2 Damage to 2 Battleships</p>

<h3>Round 4</h3>
<ul>
	<li>Fleet 1, Scissors</li>
	<li>Fleet 2, Paper</li>
	<li>Scissors beats Paper</li>
</ul>

<p>Fleet 1 does 2 Damage to 2 Battleships</p>


<h3>Round 5</h3>
<ul>
	<li>Fleet 1, Paper</li>
	<li>Fleet 2, Paper</li>
	<li>Draw</li>
</ul>

<p>Fleet 2 does 1 Damage to 2 Frigates - Destroying two Frigates</p>

<h3>Round 6</h3>
<ul>
	<li>Fleet 1, Paper</li>
	<li>Fleet 2, Paper</li>
	<li>Draw</li>
</ul>

<p>Fleet 2 does 1 damage to 2 Scouts</p>

<h3>Round 7</h3>
<ul>
	<li>Fleet 1, Rock</li>
	<li>Fleet 2, Scissors</li>
	<li>Rock beats Scissors</li>
</ul>

<p>Two scout ships escape and the combat ends</p>


<?php include "../bits/end_section.inc" ?>
<?php include "../bits/end_page.inc" ?>
