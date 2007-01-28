
<?php $title = "MiniSec" ?>
<?php include "../bits/start_page.inc" ?>
<?php include "../bits/start_section.inc" ?>
<h1>MiniSec</h1>
<h6>Last updated: 28 Jan 2006 - For AI Competition</h6>
<p>
MiniSec is a very simple testing game for Thousand Parsec. It is designed to 
exercises many of the basic features of the Thousand Parsec framework. Some
of these features are,
<ul>
	<li>Ability to give orders.</li>
	<li>Messages results from actions.</li>
	<li>Simple combat.</li>
</ul>
</p><p>
MiniSec was updated on the 28th of January 2006 to make it easier to understand
(and a little more advanced) for the <a href="/tp/comp.php">Thousand Parsec AI 
Programming competition</a>.</p>

<h2>Table of Contents</h2>
<ul>
	<li><a href="#winning">Winning</a></li>
	<li><a href="#ships">Ships</a></li>
	<ul>
		<li><a href="#scout">Scout</a></li>
		<li><a href="#frigate">Frigate</a></li>
		<li><a href="#battleship">Battleship</a></li>
		<li><a href="#planets">Planets</a></li>
		<li><a href="#fleets">Fleets</a></li>
	</ul>
	<li><a href="#building">Building</a></li>
	<li><a href="#colonising">Colonising</a></li>
	<li><a href="#combat">Combat</a></li>
	<li><a href="#example">Example of combat</a></li>
</ul>
<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="winning"></a>
<h2>Winning</h2>

<p>
The game is won by destroying all other players. The definition of 
players being destroy is server (or even game) dependent. Some possible 
definitions are as follows:
<ul>
	<li>All your planets are destroyed. (This is the definition used in the AI competition.)</li>
	<li>Your home world is destroyed.</li>
	<li>All your planets are destroyed and you have no frigates.</li>
	<li>All your planets and fleets are destroyed.</li>
</ul>
You lose if you get destroyed :).
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="ships"></a>
<h2>Ships</h2>

<a name="scout"></a>
<h3>Scout</h3>
<table>
	<tr><td>Weapons</td><td>None</td></tr>
	<tr><td>Moves</td><td>3 units per turn</td></tr>
	<tr><td>Armour</td><td>2 HP</td></tr>
	<tr><td>Build</td><td>1 Turn</td></tr>
	<tr><td>Speed</td><td>5 Units per turn</td></tr>
	<tr><td>Special</td><td>Gives the fleet a chance to escape if the fleet wins a match</td></tr>
</table>
<p>
Scout ships allow your fleet's to escape harm. When your ships win a combat 
round they will have a chance to escape. The formula for this chance is as follows

<table style="text-align: center;">
	<tr><td rowspan="2">No of Scouts *</td><td style="border-bottom: 1px solid white;">100</td>
	<tr><td>No of Ships (include scouts)</td>
</table>
</p><p>
For example,
<style type="text/css">
table.t {
	text-align: center;
	border-top: solid 1px #555555;
	border-right: solid 1px #555555;
}

table.t th {
	border-left: solid 1px #555555;
	border-bottom: solid 1px #555555;
}
table.t td {
	border-left: solid 1px #555555;
	border-bottom: solid 1px #555555;
}
</style>
<table class="t" cellspacing="0">
	<tr><td>Fleet Contents</td><td>Chance of Escape (on Win)</td></tr>
	<tr><td>1 Scout and 2 Other ships</td><td>33%</td></tr>
	<tr><td>2 Scouts and 2 Other ships</td><td>50%</td></tr>
	<tr><td>4 Scouts and 2 Other ships</td><td>64%</td></tr>
	<tr><td>4 Scouts and 1 Other ships</td><td>80%</td></tr>
	<tr><td>any number of Scouts only</td><td>100%</td></tr>
</table>
</p><p>
Scouts are nothing more then some sensors strapped to a massive engine. 
They are the fastest ships in the MiniSec universe, able to go more then twice
the speed of Frigates (the slowest ships).
</p>

<a name="frigate"></a>
<h3>Frigate</h3>
<table>
	<tr><td>Weapon</td><td>2 HP Damage on Win</td></tr>
	<tr><td>Moves</td><td>2 units per turn</td></tr>
	<tr><td>Armour</td><td>4 HP</td></tr>
	<tr><td>Build</td><td>2 Turns</td></tr>
	<tr><td>Special</td><td>Can colonise a planet</td></tr>
	<tr><td>Speed</td><td>2 Units per turn</td></tr>
</table>
<p>
Frigates are the primary ships in the MiniSec universe. Able to do some 
damage and being quite hardy they are also the only ship which can colonise
an unpopulated planet.
</p><p>
The extra space taken up by the colonisation module means that there isn't
much space left for the engines making frigates the slowest moving of all
ships.
</p><p>
On Frigate is used for every planet colonised. For example, a fleet of 3 
Frigates and 2 Battleships try to colonise a planet. The fleet would now
only have 2 Frigates and 2 Battleships.
</p>

<a name="battleship"></a>
<h3>Battleship</h3>
<table>
	<tr><td>Weapon</td><td>3 HP Damage on Win, 1 HP Damage on Draw</td></tr>
	<tr><td>Moves</td><td>1 units per turn</td></tr>
	<tr><td>Armour</td><td>6 HP</td></tr>
	<tr><td>Build</td><td>4 Turns</td></tr>
	<tr><td>Speed</td><td>3 Units per turn</td></tr>
</table>
<p>
Battleships are the largest and most hardy ship in the MiniSec universe.
They have so much firepower that they even when a draw occurs they 
are able to do some damage.
</p><p>
Battleships also have huge engines, which means even though they are
much bigger and more armed then frigates they can move faster.
</p>

<a name="planets"></a>
<h3>Planets</h3>
<p>
Colonised Planets can also participate in combat with anti-ship batteries.
Each battery is equivalent to a battleships and can be destroy separately.
This means they also behave exactly as multiple battleships.
</p><p>
Normal planets are considered to be equivalent to <b>2 battleships</b>. Home
world planets (The planet you start with at the beginning of the game) is
considered <b>5 battleships</b>.
</p><p>
An example, when a planet suffers 6 HP of damage a battery is destroy,
this means that the amount of damage it does on a win is reduced by 3HP 
(exactly like a one battleship being destroy in normal battle).
</p><p>
When a planet looses a battle is becomes unpopulated.
</p>

<a name="fleets"></a>
<h3>Fleets</h3>
<p>
Ships are grouped together in Fleets. A ship by itself does not exist
(but a Fleet with 1 ship in it can exist).
</p><p>
Fleets move at the speed of the slowest ship in the fleet. For example,
a Scout, a Frigate and a Battleship in the same fleet still only move
at 2 Units per turn.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="building"></a>
<h2>Building</h2>
<p>
Once a planet has been colonised it can build fleets. Fleets contain
any number of ships and are only "launched" when all ships in a Fleet
are complete. The number of turns taken to build a fleet is dependent 
on its contents.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="colonising"></a>
<h2>Colonising</h2>
<p>
To expand your empire you will need to colonise planets. A Frigate is used
to colonise a planet, a Frigate is used up in the process. Only unpopulated
planets can be colonised. 
</p><p>
Planets can become unpopulated by wining in combat against them. Colonisation 
occurs after combat, so you can depopulate a planet via combat and colonise 
it in the same turn.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="combat"></a>
<h2>Combat</h2>
<h3>When it occurs?</h3>
<p>
Combat occurs when two enemies are at the same location. Combat can only occur
between any number of parties at the same time. 
</p>
<h3>The process</h3>
<p>
If two fleets owned by the same player are at the same location when combat 
occurs, they will be merged for the period of combat.
</p><p>
During combat the fleets play rounds of rock, paper, scissors against each 
other. Each fleet selects rock, paper or scissors at random. Damage is then 
delt by the winning side to the loosing side. 
</p><p>
Damage is always assigned in whole lots. For example, a Battleship does 3HP 
damage on each shot, however it can still only destory 1 Scout each turn (as 
the overflow is lost).
</p><p>
Damage is always assigned to the least damaged strongest enemy ships first. 
If there are multiple choices one (of the possible choices) is choosen is at 
random.
</p>
<h3>Winning Combat</h3>
<p>
Combat ends when one side destroys the other or the ships escape.
</p>
<h3>After Combat</h3>
<p>
After combat all ships orbiting a planet that the player owns repair to 
full strength. All planets also heal to full strength (rebuilding any 
destroyed batteries).
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h2>Example of combat</h2>
<p>
Fleet 1 = 2 Battleships<br />
Fleet 2 = 1 Scout, 2 Frigate<br />
</p>
<p>
Damage Numbers
<ul>
	<li>Numbers in ascending order of hitpoints (battleship-frigate-scout)</li>
	<li>D - Dead</li>
	<li>(x) - Overflow damage</li>
</ul>

<table class="t" cellspacing="0">
	<tr>
		<th>Fleet 1 Choice</th>
		<th>Fleet 2 Choice</th>
		<th>Winner</th>
		<th>Why</th>
		<th>Result</th>
		<th>Fleet 1 Damage</th>
		<th>Fleet 2 Damage</th>
	</tr>

	<tr><th colspan="7">Round 1</th></tr>
	<tr>
		<td>Rock</td>
		<td>Paper</td>
		<td>Fleet 2</td><td>(Paper beats Rock)</td>
		<td>Fleet 2 does 2 lots of 2 damage<br />Doesn't succeed to escape</td>
		<td>2-2-0</td>
		<td>0-0-0-0</td>
	</tr>

	<tr><th colspan="7">Round 2</th></tr>
	<tr>
		<td>Scissors</td>
		<td>Rock</td>
		<td>Fleet 2</td><td>(Rock beats Scissors)</td>
		<td>Fleet 2 does 2 lots of 2 damage<br />Doesn't succeed to escape</td>
		<td>4-2-2</td>
		<td>0-0-0-0</td>
	</tr>

	<tr><th colspan="7">Round 3</th></tr>
	<tr>
		<td>Scissors</td>
		<td>Rock</td>
		<td>Fleet 2</td><td>(Rock beats Scissors)</td>
		<td>Fleet 2 does 2 lots of 2 damage<br />Doesn't succeed to escape</td>
		<td>4-4-4</td>
		<td>0-0-0-0</td>
	</tr>

	<tr><th colspan="7">Round 4</th></tr>
	<tr>
		<td>Scissors</td>
		<td>Paper</td>
		<td>Fleet 1</td><td>(Scissors beats Paper)</td>
		<td>Fleet 1 does 3 lots of 3 damage<br />Destorys 1 frigate</td>
		<td>4-4-4</td>
		<td>4(2)-3-0-0</td>
	</tr>

	<tr><th colspan="7">Round 5</th></tr>
	<tr>
		<td>Scissors</td>
		<td>Rock</td>
		<td>Fleet 2</td><td>(Rock beats Scissors)</td>
		<td>Fleet 2 does 1 lots of 2 damage<br />Doesn't succeed to escape<br />Destroys a battleship</td>
		<td>6-4-4</td>
		<td>D-3-0-0</td>
	</tr>

	<tr><th colspan="7">Round 6</th></tr>
	<tr>
		<td>Paper</td>
		<td>Paper</td>
		<td>Draw</td><td>&nbsp;</td>
		<td>Fleet 1 does 2 lots of 1 damage<br />Destroys a frigates and 1 scout</td>
		<td>D-4-4</td>
		<td>D-4-1-0</td>
	</tr>
	<tr><th colspan="7">Round 7</th></tr>
	<tr>
		<td>Scissors</td>
		<td>Rock</td>
		<td>Fleet 2</td><td>(Rock beats Scissors)</td>
		<td>Fleet escapes (100% chance as only scouts left)</td>
		<td>D-4-4</td>
		<td>D-D-1-0</td>
	</tr>
</table>


<?php include "../bits/end_section.inc" ?>
<?php include "../bits/end_page.inc" ?>


