
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
of years leaving advanced technologies, huge ships and powerful weapons just 
lying about. 
</p><p>
However you aren't the only fledging race to exist, others too are now racing to lay 
claim to the galaxy. In fact you will have to continue the war that had just ended to
ensure your own races survival!
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Winning</h1>

<p>
The game is won by destroying the other players totally. You loose if you get destroyed :).
</p>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/start_section.inc" ?>

<h1>Combat</h1>

<h2>Who goes first?</h2>
<p>
Combat will still remain fairly simple. Combat is simultaneous, IE all
combatants fire at the same time.
</p>

<h2>Ship Stats</h2>
<p>
All ships have 3 stats used in combat:
</p>
<ul>
	<li> Hit Points, The amount of damage a ship can take</li>
	<li> Armour, A defensive quality</li>
	<li> Weapons, The type of missile/torpedo a ship has</li>
</ul>
<p>
The other important ship stats are:
</p>
<ul>
	<li> Size, How physically big a ship is</li>
	<li> Speed, How fast a ship is</li>
</ul>

<h2>Ship Types</h2>
<p>
There are 10 ship types. Most of the lighter ships have a normal and 
battle variety. The battle variety is generally has more armor but are
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

<table>
<tr><td align="right">Name 					</td><td align="center">Speed	</td><td align="center">Size	</td></tr>
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

<h2>Weapons</h2>
<p>
There are five types of missiles and six types of torpedoes. Each different weapon can 
carry a different amount of explosives. Missiles can only carry a single type of 
explosive material, torpedoes can carry a mixture of explosive materials. The cost of 
the super structure of the weapon is insignificant compared to the cost of the explosives, 
this means that the amount of explosives determines the actual cost per weapon.
</p><p>
The formula to calculate the amount of explosive material that can fit in a weapon
<blockquote>
	Amount of explosive material = Floor( Missile Size / Explosive Size )
</blockquote>
</p>
<h3>Missiles</h3>
<table>
	<tr><td align="right" width="100">Name</td><td align="center" width="100">Size</td></tr>
	<tr><td align="right">Alpha  </td><td align="center">3 </td></tr>
	<tr><td align="right">Beta   </td><td align="center">6 </td></tr>
	<tr><td align="right">Gamma  </td><td align="center">8 </td></tr>
	<tr><td align="right">Delta  </td><td align="center">12</td></tr>
	<tr><td align="right">Epsilon</td><td align="center">24</td></tr>
</table>

<h3>Torpedoes</h3>
<table>
	<tr><td align="right" width="100">Name</td><td align="center" width="100">Size</td></tr>
	<tr><td align="right">Omega   </td><td align="center">40 </td></tr>
	<tr><td align="right">Upsilon </td><td align="center">60 </td></tr>
	<tr><td align="right">Tau     </td><td align="center">80 </td></tr>
	<tr><td align="right">Sigma   </td><td align="center">110</td></tr>
	<tr><td align="right">Rho     </td><td align="center">150</td></tr>
	<tr><td align="right">Xi      </td><td align="center">200</td></tr>
</table>

<h3>Explosive Materials</h3>

<table>
	<tr>
		<td align="right" width="100">Name</td>
		<td align="center" width="100">Size</td>
		<td align="center" width="100">Explosiveness</td>
		<td align="center" width="100">Cost/Size</td>
		<td align="center" width="100">Explosiveness/Size</td>
		<td align="center" width="100">Explosiveness/Cost</td>
		<td align="center" width="100">Description</td>
	</tr>

<tr><td align="right">Uranium		</td><td align="center">4	</td><td align="center">1	</td><td align="center">1		</td><td align="center">0.25	</td><td align="center">0.25	</td><td align="center">Most basic nuclear explosive</td></tr>
<tr><td align="right">Thorium		</td><td align="center">4	</td><td align="center">0.5	</td><td align="center">0.25	</td><td align="center">0.12	</td><td align="center">0.50	</td><td align="center">A significantly cheaper but less explosive nuclear explosive</td></tr>
<tr><td align="right">Cerium		</td><td align="center">3	</td><td align="center">8	</td><td align="center">5		</td><td align="center">2.67	</td><td align="center">0.53	</td><td align="center"></td></tr>
<tr><td align="right">				</td><td align="center">6	</td><td align="center">11	</td><td align="center">6		</td><td align="center">1.83	</td><td align="center">0.31	</td><td align="center"></td></tr>
<tr><td align="right">				</td><td align="center">12	</td><td align="center">55	</td><td align="center">13		</td><td align="center">4.58	</td><td align="center">0.35	</td><td align="center">A huge but extremely explosive sub-nuclear particle</td></tr>
<tr><td align="right">Antiparticle	</td><td align="center">0.8	</td><td align="center">16	</td><td align="center">80		</td><td align="center">20.00	</td><td align="center">0.25	</td><td align="center">An extremely expensive but hugely explosive particle and anti-particle explosive</td></tr>
<tr><td align="right">Antimatter	</td><td align="center">0.5	</td><td align="center">18	</td><td align="center">122		</td><td align="center">36.00	</td><td align="center">0.30	</td><td align="center">An even more extremely expensive but insanely explosive antimatter-matter explosive</td></tr>

</table>










<h2>Number of Weapons</h2>
All Ships can only carry a single type of missile/torpedo. The number of
missiles/torpedoes a ship can carry is the determined by the following formula:

<blockquote>
	Number of Missiles = Floor(Ship Size / Missile Size)
</blockquote>
<blockquote>
	Number of Torpedoes = Floor(Ship Size / Torpedo Size) * 4
</blockquote>

<h2>Dodging</h2>
Missiles are impossible to dodge.
Torpedoes can be dodged, the chance of dodging a torpedo is determined by the
following formula:

<blockquote>
	Chance to dodge = Minimum(Torpedo Size / (Ship Size/Ship Speed), 100) %
</blockquote>

<?php include "../bits/end_section.inc" ?>
<?php include "../bits/end_page.inc" ?>
