
<?php $title = "Missle and Torpedo Wars (Codename: MTSec)" ?>
<?php include "../bits/start_page.inc" ?>
<?php include "../bits/start_section.inc" ?>
 
<p>Last updated: 30 Oct 2004</p>
 
<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Introduction</h1>

<p>
Missile and Torpedo Wars is the second playable "milestone" game created by Thousand Parsec.
These games are designed to demonstrates the technologies and key features which have been developed
in a fun and playable way. This game builds on features found in the first game, MiniSec,
which is described <a href="/tp/dev/documents/minisec.php">here</a>.
</p><p>
The aim of this game is to demonstrate the following features:
<ul>
	<li>More advanced combat</li>
	<li>Show how design works</li>
</ul>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Story</h1>

<p>
Prophets have long predicted that your race would reach the stars, however
what you found there was a shock even to them. A huge war, like had never been see
before, was being waged throughout the whole galaxy by god like alien races.
</p><p>
Before you could even begin to comprehend what was happening it all ended. Something
happened, you'll never be sure what, that caused both sides to disappear in a matter
of years leaving an advanced technologies, huge ships and powerful weapons just 
lying about. 
</p><p>
However you aren't the only fledging race to exist, others too are now racing to lay 
claim to the galaxy. In fact you will have to continue the war that had just ended to
ensure your own races survival!
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Winning</h1>

<p>The game is won by destroying the other players totally. You loose if you get destroyed :).</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Combat</h1>

<h2>Who goes first?</h2>
Combat will still remain fairly simple. Combat is simultaneous, IE all
combatants fire at the same time.

<h2>Ship Stats</h2>
All ships have 3 stats used in combat:
	* Hit Points, The amount of damage a ship can take.
	* Armour, A defensive quality
	* Weapons, The type of missile/torpedo a ship has

The other important ship stats are:
	* Size, How physically big a ship is
	* Speed, How fast a ship is

<h2>Ship Types</h2>
<p>
There are 10 ship types. Most of the lighter ships have a normal and 
battle variety. The battle variety is generally has more armor but are
slower.
</p>

The types are listed below in order of size:
<ul>
	<li>
		Scout
		<p>
			Scouts are a light reconnaissance ships. Often used to search
			out new worlds. Nothing beats a scout for speed.
		</p>
	</li>
	
	<li>
		Battle Scout
		<p>
			Battle Scouts are light reconnaissance ships which are more heavily
			armed. Often used in more dangerous reconnaissance missions into enemy 
			territory and to guard unimportant outposts.
		</p>
	</li>

	<li>
		Advanced Battle Scout
		<p>
			The advanced battle scout uses advanced technology to pack a bigger punch
			into a smaller and faster package. There speed makes them deadly against torpedo
			based ships but are still relatively weak against missile technologies.
		</p>
	</li>

	<li>
		Frigate
		<p>
			What a frigate doesn't have in its stats is made up by the cheapness they can be 
			produced. Numbers of frigates can easily destroy larger ships. They also advantageous
			against torpedoes as only one ship can be destroyed per torpedo.
		</p>
	</li>

	<li>
		Battle Frigate
		<p>
			Slightly more powerful version of the frigate. Nothing beats a battle frigate for
			speed to firepower ratio.
		</p>
	</li>

	<li>
		Destroyer
		<p>
			Destroyers are the main offensive weapon in any fleet. More expensive then frigates
			they have much larger armor are can withstand a battering. 
		</p>
	</li>

	<li>
		Battle Destroyer
		<p>
			Battle Destroyers are a poor mans battleship. Smaller groups of battle destroyers can
			easily devastate larger groups of destroyers (have more firepower and armor) and can 
			hold their own against similar number of battleships. Their biggest drawback is their 
			speed, this is because the smaller engines (compared to battleships) strain to provide
			similar speed.
		</p>
	</li>	

	<li>
		Battleship
		<p>
			Battleships are hugely armor and armed. Able to dispatch huge numbers of missiles
			or torpedo in a very short period. Even a single battleship can quickly turn the
			tide in a battle. These ships are also surprisingly fast due to the huge engines.
			However without support battleships can easily fall prey to torpedoes.
		</p>
	</li>

	<li>		
		Dreadnought
		<p>
			Dreadnoughts are the largest movable ship available. They are so large that equipping 
			with engines is a huge problem, this means that they are extremely slow. No other ship
			can boast about so much firepower in one package.
		</p>
	</li>

	<li>
		Argonaut
		<p>
			These ships, commonly called "death stars", are so big that they can't break orbit
			of the planet they are constructed on. Normally considers a space station instead of a
			ship they hail doom on any ship trying to attack the planet they orbit. They however
			are unable to avoid even the slowest moving torpedo's.
		</p>
	</li>
</ul>

<h2>Number of Weapons</h2>
All Ships can only carry a single type of missile/torpedo. The number of
missiles/torpedoes a ship can carry is the determined by the following formula:

Number of Missiles = Ship Size / Missile Size
Number of Torpedoes = Ship Size / (20 * Torpedo Size)

<h2>Dodging</h2>
Missiles are impossible to dodge.
Torpedoes can be dodged, the chance of dodging a torpedo is determined by the
following formula:

Chance to dodge = Torpedo Size / (Ship Size/Ship Speed) %

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/end_page.inc" ?>


