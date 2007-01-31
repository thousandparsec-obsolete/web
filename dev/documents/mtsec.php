
<?php $title = "Missle and Torpedo Wars (Codename: MTSec)" ?>
<?php include "../bits/start_page.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Missile and Torpedo Wars (MTSec)</h1>
<h6>Last updated: 29 Jan 2007</h6>

<p> 
Missile and Torpedo Wars (MTSec) is the second playable "milestone" game.
MTSec is designed to exercise some of the more advanced features that 
Thousand Parsec games can exhibit. MTSec builds on the feature set incorporated
 in MiniSec, the first playable  "milestone" game, which can be found 
<a href="/tp/dev/documents/minisec.php">here</a>.
</p><p>
MTSec is specifically designed to add and demonstrate the following 
capabilities:
<ul>
	<li>Advanced Design Capabilities.</li>
	<li>Simple economy.</li>
	<li>More advanced combat.</li>
</ul>
MTSec will <b>NOT</b> include the following features:
<ul>
	<li>Research (Creating and finding new technologies, etc).</li>
</ul>
</p>
<h2>Table of Contents</h2>
<ul>
	<li><a href="#story">Story</a></li>
	<li><a href="#winning">Winning</a></li>
	<li><a href="#economy">Economy</a></li>
	<ul>
		<li><a href="#economy_resources">Resources</a></li>
		<li><a href="#economy_examples">Examples</a></li>
	</ul>
	<li><a href="#ships">Ships</a></li>
	<ul>
		<li><a href="#ships_types">Ship Types</a></li>
		<li><a href="#ships_weapons">Weapons</a></li>
		<li><a href="#ships_components">Other Componenets</a></li>
	</ul>
	<li><a href="#combat">Combat</a></li>
</ul>

<h2>TODO</h2>
<ul>
	<li>Hit points for ships</li>
	<li>Damage from explosiveness</li>
	<li>Formula for sending of production points</li>
	<li>Scrapping ships?</li>
	<li>Transportation of resources??.</li>
</ul>
<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="story"></a>
<h2>Story</h2>
<p>
Prophets have long predicted that your race would reach the stars, however
what you found there was a shock even to them. A huge war, like had never been see
before, was being waged throughout the whole galaxy by god like alien races.
</p><p>
Before you could even begin to comprehend what was happening it all ended. Something
happened, you'll never be sure what, that caused both sides to disappear in a matter
of years leaving advanced technologies, huge ships and powerful weapons just 
lying about. 
</p><p>
However you aren't the only fledgling race to exist, others too are now racing to lay 
claim to the galaxy. In fact you will have to continue the war that had just ended to
ensure your own race's survival!
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="winning"></a>
<h2>Winning</h2>

<p>
Like in MiniSec, the game is won by destroying all other players. The definition of
players being destroyed is server (or even game) dependent. Some possible 
definitions are as follows:
<ul>
	<li>All your planets are destroyed.</li>
	<li>Your home world is destroyed.</li>
	<li>All your planets are destroyed and you have no ship carying the colonisation module.</li>
	<li>All your planets and fleets are destroyed.</li>
</ul>
You lose if you get destroyed :).
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="economy"></a>
<h1>Economy</h1>
<p>
Unlike in MiniSec, planets in MTSec are not all equal. The two major changes are
the longer you control a planet the more production capability it has. 
As well, not all planets have the same resources. Some planets are rich in 
certain resources, others are poor in every resource.
</p>

<h3>Production Capability</h3>
<p>
Production points are used to both mine resources and to convert resources
into ships and weapons. Production points are first used to try and satisfy
Orders in the queue, any left over points are then used to mine sources.
All production points must be used every turn.
</p><p>
For an example how this works you can see the example at the end of the
Economy section.
</p><p>
For each turn you control a planet it gains one point of production capability,
each planet can have a maximum of 100 points of production capability. Each 
turn a planet will produce productions points equal to it's production 
capability.
</p>
<h4>Enhance Order</h4>
<p>
The enhance order uses production points to quickly increase the production
capability. For every <b>xx</b> production points spent the enhance order increases
the production capability by one.
</p>
<h4>Send Production Points</h4>
<p>
Production points can also be sent to other planets. However there is a significant
cost in sending points. The cost of sending points is proportional to the distance
between the source and destination. Only whole production points can be sent and 
the number will always be round down.
</p>
<h4>Build Weapons</h4>
<p>
Each weapon takes one production point to produce. Plus it also consumes the 
resources to produce the weapon.
</p>
<h4>Build Ships</h4>
<p>
Each ship takes one production point for every 10 units of size. For example,
a scout takes 6 production points to produce, while an Argonaut will take
100 production points to produce.
</p>

<a name="economy_resources"></a>
<h2>Resources</h2>
<p>
There following resources exist in MTSec. Resources are used to make all
types of explosives.

<table>
<tr>
	<th align="right">Name</th>
	<th align="center">Size per kt</th>
	<th align="center">Rarity</th>
	<th align="center">Explosiveness per kt</th>
	<th align="center">Description</th>
</tr>

<tr><td align="right">Uranium 			</td><td align="center">4	</td><td align="center">Common 			</td><td align="center">1	</td><td align="center">Most basic nuclear explosive</td></tr>
<tr><td align="right">Thorium 			</td><td align="center">4.5	</td><td align="center">Very Common 	</td><td align="center">0.5	</td><td align="center">A more abundant but less explosive nuclear explosive</td></tr>
<tr><td align="right">Cerium 			</td><td align="center">3	</td><td align="center">Rare			</td><td align="center">4	</td><td align="center"></td></tr>
<tr><td align="right">Enriched Uranium 	</td><td align="center">2	</td><td align="center">Uncommon		</td><td align="center">4	</td><td align="center">An enhanced version of uranium which is more explosive</td></tr>
<tr><td align="right">Massivium			</td><td align="center">12	</td><td align="center">Common 			</td><td align="center">2	</td><td align="center">A huge but extremely explosive sub-nuclear particle</td></tr>
<tr><td align="right">Antiparticle 		</td><td align="center">0.8	</td><td align="center">Very Rare 		</td><td align="center">60	</td><td align="center">An very rare but hugely explosive anti-particle explosive</td></tr>
<tr><td align="right">Antimatter 		</td><td align="center">0.5	</td><td align="center">Extreme Rare 	</td><td align="center">100	</td><td align="center">An extremely rare but insanely explosive antimatter-matter explosive</td></tr>
</table>

</p><p>
Resources are mined from a planet by "spending" production capability.
The amount of resources produced on mining is dictated by the amount of
mineable resources found on the planet.
</p><p>
For each 1 unit of mineable resources on the planet, 1 production point produces
1kt of that resource.
</p><p>
Each planet has a virtually unlimited supply of each resource (so you don't need 
to worry about running out) but the accessibility of the resource is key.
</p><p>
For example:
<ul>
	<li>A planet has mineable 
		<ul>
			<li>10 units of Uranium</li>
			<li>100 units of Thorium</li>
			<li>0.1 units of Antiparticle</li>
		</ul>
	</li>
	<li>Spending one unit of production will produce
		<ul>
			<li>10kt of Uranium</li>
			<li>100kt of Thorium</li>
			<li>0.1kt of Antiparticle</li>
		</ul>
	</li>
</ul>
</p>

<a name="economy_examples"></a>
<h2>Examples</h2>

<h4>Example: No Orders - 1 resource</h4>
<ul>
	<li>A planet is producing 33 production points each turn.</li>
	<li>5 units of the Uranium are mineable.</li>
</ul><ul>
	<li>xx production points are used to mine. Producing xx kt of Uranium.</li>
</ul>
<p>
NOp orders can also be used to force all production points for that turn to go towards mining.
</p>
<h4>Example: No Orders - Many resources</h4>
<ul>
	<li>A planet is producing 1 production points each turn.</li>
	<li>10 units of Uranium</li>
	<li>100 units of Thorium</li>
	<li>0.1 units of Antiparticle</li>
</ul><ul>
	<li>xx production points are used to mine. Producing:</li>
	<li>10kt of Uranium</li>
	<li>100kt of Thorium</li>
	<li>0.1kt of Antiparticle</li>
</ul>
<p></p>

<h4>Example: A Build Fleet Order</h4>
<ul>
	<li>A planet is producing 33 production points each turn.</li>
	<li>A Build Fleet order exists which requires 15kt of Uranium.</li>
	<li>10kt of Uranium is available, 5 units of the Uranium are mineable.</li>
</ul><ul>
	<li>xx production points are used to build the fleet using 15kt of Uranium.</li>
	<li>xx production points are used to mine. Producing 5kt of Uranium.</li>
	<li>xx production points are used to build the fleet using 5kt of Uranium.</li>
	<li>xx production points are used to mine. Producing xx kt of Uranium.</li>
</ul>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="ships"></a>
<h1>Ships</h1>
<p>Ships are how you fight your wars.</p>

<h2>Ship Stats</h2>
<p>
All ships have 3 stats used in combat:
</p>
<ul>
	<li> Hit Points (HP), The amount of damage a ship can take</li>
	<li> Armour, A defensive quality (which reduces damage from incoming weapons)</li>
	<li> Weapons, The type of missile/torpedo a ship has</li>
</ul>
<p>
The other important ship stats are:
</p>
<ul>
	<li> Size, How physically big a ship is - Dictates the amount of weapons you can carry.</li>
	<li> Speed, How fast a ship is - Also dictates how good you are at dodging torpedoes.</li>
</ul>

<a name="ships_types"></a>
<h2>Ship Types</h2>
<p>
There are 10 ship types. Most of the lighter ships have a normal and 
battle variety. The battle variety generally has more armor but is
slower.
</p><p>
The types are listed below in order of size:
</p>
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
			into a smaller and faster package. Their speed makes them deadly against torpedo
			based ships but are still relatively weak against missile technologies.
		</p>
	</li>

	<li>
		Frigate
		<p>
			What a frigate doesn't have in its stats is made up by the cheapness it can be 
			produced at. Numbers of frigates can easily destroy larger ships. They're also advantageous
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
			they have much larger armor and can withstand a battering. 
		</p>
	</li>

	<li>
		Battle Destroyer
		<p>
			Battle Destroyers are a poor man's battleship. Smaller groups of battle destroyers can
			easily devastate larger groups of destroyers (have more firepower and armor) and can 
			hold their own against similar number of battleships. Their biggest drawback is their 
			speed, this is because the smaller engines (compared to battleships) strain to provide
			similar speed.
		</p>
	</li>	

	<li>
		Battleship
		<p>
			Battleships are hugely armored and armed. Able to dispatch huge numbers of missiles
			or torpedoes in a very short period. Even a single battleship can quickly turn the
			tide in a battle. These ships are also surprisingly fast due to the huge engines.
			However, without support battleships can easily fall prey to torpedoes.
		</p>
	</li>

	<li>		
		Dreadnought
		<p>
			Dreadnoughts are the largest movable ships available. They are so large that equipping 
			with engines is a huge problem. This means that they are extremely slow. No other ship
			can boast about so much firepower in one package.
		</p>
	</li>

	<li>
		Argonaut
		<p>
			These ships, commonly called "death stars", are so big that they can't break orbit
			of the planet they are constructed on. Normally considered a space station instead of a
			ship they hail doom on any ship trying to attack the planet they orbit. They however
			are unable to avoid even the slowest moving torpedo's.
		</p>
	</li>
</ul>

<table>
<tr><th align="right">Name 					</th><th align="center">Speed	</th><th align="center">Size	</th></tr>
<tr><td align="right">Scout					</td><td align="center">100		</td><td align="center">60		</td></tr>
<tr><td align="right">Battle Scout			</td><td align="center">75		</td><td align="center">88		</td></tr>
<tr><td align="right">Advanced Battle Scout	</td><td align="center">86		</td><td align="center">133		</td></tr>
<tr><td align="right">Frigate				</td><td align="center">56		</td><td align="center">200		</td></tr>
<tr><td align="right">Battle Frigate		</td><td align="center">45		</td><td align="center">200		</td></tr>
<tr><td align="right">Destroyer				</td><td align="center">35		</td><td align="center">300		</td></tr>
<tr><td align="right">Battle Destroyer		</td><td align="center">26		</td><td align="center">300		</td></tr>
<tr><td align="right">Battleship			</td><td align="center">36		</td><td align="center">375		</td></tr>
<tr><td align="right">Dreadnought			</td><td align="center">24		</td><td align="center">500		</td></tr>
<tr><td align="right">Argonaut 				</td><td align="center">8		</td><td align="center">1000	</td></tr>
</table>

<a name="ships_weapons"></a>
<h2>Weapons</h2>
<p>
There are five types of missiles and six types of torpedoes. Each different weapon can 
carry a different amount of explosives. Missiles can only carry a single type of 
explosive material, torpedoes can carry a mixture of explosive materials. 
</p><p>
The resources needed for the super structure of the weapon is insignificant compared
to the resources for the explosives. This means that the amount of explosives determines 
what is actually required to build the weapon.
</p><p>
The formula to calculate the amount of explosive material that can fit in a weapon
<blockquote>
	Amount of explosive material = Floor( Missile Size / Explosive Size )
</blockquote>
</p>

<h3>Missiles</h3>
<p>
Missiles are fast, light devices which seek and destroy the enemy. They
are impossible to avoid because even the fastest ship is slow compared to 
a missile. 
</p><p>
Each missile can only destroy one ship at a time.
</p>
<table>
	<tr><th align="right" width="100">Name</th><th align="center" width="100">Size</th></tr>
	<tr><td align="right">Alpha  </td><td align="center">3 </td></tr>
	<tr><td align="right">Beta   </td><td align="center">6 </td></tr>
	<tr><td align="right">Gamma  </td><td align="center">8 </td></tr>
	<tr><td align="right">Delta  </td><td align="center">12</td></tr>
	<tr><td align="right">Epsilon</td><td align="center">24</td></tr>
</table>

<h3>Torpedoes</h3>
<p>
Torpedoes are large slow devices with massive amounts of explosives. The
larger torpedoes can be as big as small ships. As they are so slow 
torpedoes can be dodged.
</p><p>
Like missile each torpedo can only destroy one ship at a time.
</p>
<table>
	<tr><th align="right" width="100">Name</th><th align="center" width="100">Size</th></tr>
	<tr><td align="right">Omega   </td><td align="center">40 </td></tr>
	<tr><td align="right">Upsilon </td><td align="center">60 </td></tr>
	<tr><td align="right">Tau     </td><td align="center">80 </td></tr>
	<tr><td align="right">Sigma   </td><td align="center">110</td></tr>
	<tr><td align="right">Rho     </td><td align="center">150</td></tr>
	<tr><td align="right">Xi      </td><td align="center">200</td></tr>
</table>

<h3>Number of Weapons</h3>
<p>
All Ships can only carry a single type of missile or torpedo. For example,
a ship could carry two different Omega torpedoes, but not an Omega torpedo
and a Upsilon Torpedo. This is because a ship is created with launch tubes
of only one size and hence is unable to launch other sizes.
</p><p>
Each missile/torpedo takes up space in a ship. Each missile takes up
the equivalent size while torpedoes take up a quarter of their size.

For example, the maximum number of missiles and torpedoes a ship can 
hold can be calculated using the following formula:
<blockquote>
	Number of Missiles = Floor(Ship Size / Missile Size)
</blockquote>
<blockquote>
	Number of Torpedoes = Floor(Ship Size / (Torpedo Size/4))
</blockquote>
</p>

<a name="ships_components"></a>
<h2>Other Components</h2>
<h3>Armour</h3>
<p>
Armour is just plating put on the ship. Armour takes 10 units of space for every
0.1% of armour.
</p>

<h3>Colonisation Module</h3>
<p>
A colonisation module takes up 100 units of space. It allows a ship to colonise
a planet. The ship is destroy in the colonisation process all resources used in 
the ship are lost.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<a name="combat"></a>
<h1>Combat</h1>

<h2>When does it occur?</h2>
<p>
Combat occurs when two enemies are at the same location. Combat can occur
between any number of parties at the same time. 
</p>
<h2>The process</h2>
<p>
Like in MiniSec, if two fleets owned by the same player are at the same location 
when combat occurs, they will be merged for the period of combat.
</p><p>
Each ship fires its weapons. All weapons are fired simultaneously, and 
damage is then resolved simultaneously too. This means that both a ship 
and it's destroyer can be destroyed in one turn.
</p><p>
</p>

<h2>Resolving Damage</h2>
<p>
Resolving damage is quite complicated. Each amount of damage is considered
a whole block. Damage is resolved from the largest block downwards. The damage
is then applied to the ship with the most hit points.
</p><p>
For example:
Damage to be applied
<ul>
	<li>8HP of Damage</li>
	<li>5HP of Damage</li>
	<li>3HP of Damage</li>
</ul>
Ships to apply damage to.
<ul>
	<li>Battleship - 11 HP</li>
	<li>Damaged Battleship - 6HP left</li>
	<li>Scout - 2HP</li>
</ul>
The damage is applied the following way,
<ul>
	<li>8HP is applied to the Battleship - reducing it's HP to 3HP</li>
	<li>5HP is applied to the Damaged Battleship (as it now has the most HP) - reducing it to 1HP</li>
	<li>3HP is applied to the Battleship (as it now has the most HP) - reducing it to 0HP and destroying it.</li>
</ul>
</p>

<h3>Armour</h3>
<p>
Amour directly reduces a percentage of the damage which would be applied to 
a ship from torpedoes. Missile damage goes straight through the armour.
</p><p>
For example, a ship has 30% Armour which would reduce damage by 30% rounded up. 
IE 8HPs of damage would be reduced to 5HP (8-ceil(8*0.3)).
</p>

<h3>Dodge</h3>
<p>
Dodge prevents damage from taking effect. Only damage from torpedoes can
be dodged. The chance of dodging a torpedo is determined by the
following formula:
<blockquote>
	Chance to dodge = Minimum(Torpedo Size / (Ship Size/Ship Speed), 100) %
</blockquote>
</p>

<h3>Capacity</h3>
<p>
A ship only has a limited supply of missiles or torpedoes. Each time a ship
fires a weapon, one is subtracted from its stores. A weapon can then be
restocked at friendly planets.
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/end_page.inc" ?>


