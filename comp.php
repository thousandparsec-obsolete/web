<?php $title = "Getting Started" ?>
<?php include "bits/start_page.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<h1>Thousand Parsec AI Programming Competition</h1>

<p>
	Thousand Parsec is running an AI Programming Competition in which you can
	win cool prizes. See below for lots of cool details.
</p>

<ul>
	<li><a href="#news">News</a></li>
	<li><a href="#prizes">Prizes</a></li>
	<li><a href="#categories">Categories</a>
		<ul>
			<li><a href="#battle">Battle Points</a>
				<ul>
					<li><a href="#1v1">1v1 Games</a></li>
					<li><a href="#4va">4 All-On-All Games</a></li>
				</ul>
			</li>
			<li><a href="#good">Good Code</a>
				<ul>
					<li><a href="#criteria">Criteria</a></li>
					<li><a href="#judges">Judges</a></li>
				</ul>
			</li>
		</ul>
	</li>
	<li><a href="#submit">Submission Details</a>
		<ul>
			<li><a href="#email">Email Contact</a></li>
			<li><a href="#list">Mailing List</a></li>
			<li><a href="#forum">Web Forum</a></li>
		</ul>
	</li>
	<li><a href="#terms">Other Terms</a></li>
</ul>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>
<a name="news"></a>
<h1>News</h1>

<h2>Help for all you AI coders</h2>
<p>by Mithro</p>
<p>
There have been a lot of interesting updates which should help you produce an
even better AI. There have been a lot of interesting updates which should help
you produce an even better AI.
</p><p>
<h3>Rusty Russel on Wesnoth's AI</h3>
The first update is a high quality video of the AI section of Rusty's Gaming
Miniconf talk. You can find the video 
<a href="/~tim/rusty-ai.ogg">here</a>. You can also find the full talk and the
other talk from the Gaming Miniconf at the following locations.
<ul>
	<li><a href="http://mirror.linux.org.au/linux.conf.au/2007/video/tuesday/">Direct download from LCA Video mirror (low quality version only)</a> or</li>
	<li><a href="http://lester.mithis.com/~bittorrent/">Bittorrents (high quality and low quality)</a></li>
</ul>
</p>
<p>
<h3>MiniSec Battle Simulator</h3>
As part if trying to fix MiniSec support in <a href="/tp/downloads.php#tpserver-py">tpserver-py</a>
I've had to redo the Battle Simulator. It now <b>runs standalone</b> from the
server infrastructure. You can download the required file
<a href="http://darcs.thousandparsec.net/repos/tpserver-py/tp/server/rules/minisec/actions/FleetCombat.py">directly</a> or 
<a href="/tp/dev/rcs.php">check out tpserver-py from darcs</a>. 
It should be useful for getting a feel for how battles occur.
</p><p>
<b>WARNING:</b>This simulator is not exactly the same as the code running in
tpserver-cpp (which will be used in the competition battles).
</p>
<p>
<h3>tpserver-cpp config file</h3>
Lee has created a server config file which produces a situation that will be
very similar to the final config. You can get a copy of this config file 
<a href="/~tim/ai_comp.conf">here</a>.
</p>

</p><p>
<h3>Rusty Russel on Wesnoth's AI</h3>
The first update is a high quality video of the AI section of Rusty's Gaming
Miniconf talk. You can find the video 
<a href="/~tim/rusty-ai.ogg">here</a>. You can also find the full talk and the
other talk from the Gaming Miniconf at the following locations.
<ul>
	<li><a href="http://mirror.linux.org.au/linux.conf.au/2007/video/tuesday/">Direct download from LCA Video mirror (low quality version only)</a> or</li>
	<li><a href="http://lester.mithis.com/~bittorrent/">Bittorrents (high quality and low quality)</a></li>
</ul>
</p>
<p>
<h3>MiniSec Battle Simulator</h3>
As part if trying to fix MiniSec support in <a href="/tp/downloads.php#tpserver-py">tpserver-py</a>
I've had to redo the Battle Simulator. It now <b>runs standalone</b> from the
server infrastructure. You can download the required file
<a href="http://darcs.thousandparsec.net/repos/tpserver-py/tp/server/rules/minisec/actions/FleetCombat.py">directly</a> or 
<a href="/tp/dev/rcs.php">check out tpserver-py from darcs</a>. 
It should be useful for getting a feel for how battles occur.
</p><p>
<b>WARNING:</b>This simulator is not exactly the same as the code running in
tpserver-cpp (which will be used in the competition battles).
</p>
<p>
<h3>tpserver-cpp config file</h3>
Lee has created a server config file which produces a situation that will be
very similar to the final config. You can get a copy of this config file 
<a href="/~tim/ai_comp.conf">here</a>.
</p>
<h6>Friday, 2nd Feb 2007</h6>

<h2>End date wrong!</h2>
<p>by Mithro</p>
<p>
It looks like I stuffed up, the due date for entries is the <b>31st of March</b>
not the 1st of March. This gives you a whole extra month to make your AI even
better.
</p>
<h6>Monday, 22nd Jan 2007</h6>

<h2>Forum setup!</h2>
<p>by Mithro</p>
<p>
I've setup a <a href="http://www.thousandparsec.net/forums/viewforum.php?f=6">Forum</a> 
linked to the <a href="http://www.thousandparsec.net/tp/mailman.php/listinfo/tp-comp">tp-comp mailing list</a>.
It works just like the other mailing lists/forums.
</p>
<h6>Friday, 19th Jan 2007</h6>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<a name="prizes"></a>
<h2>Prizes</h2>
<p>
	The most important part of all competitions is what you could possibly win!
</p><p>
	There are two major prizes up for grabs, each major prize consists of
	<ul>
		<li>$AUD 300 in cold hard cash.</li>
		<li>"Artwork of Thousand Parsec" Wall Calender.</li>
		<li>Signed Thousand Parsec T-Shirt.</li>
		<li>Custom Thousand Parsec Mug.</li>
	</ul>
</p><p>
	There are also 2 minor prizes, each minor prize consists of
	<ul>
		<li>"Artwork of Thousand Parsec" Wall Calender.</li>
		<li>Signed Thousand Parsec T-Shirt.</li>
		<li>Custom Thousand Parsec Mug.</li>
	</ul>
</p><p>
	One major prize and one minor prize will be awarded in each of the two 
	categories:
	<ul>
		<li>"Battle Points" - The AI which gains the most "battle points" via 
			beating other AI into a bloody pulp.</li>
		<li>"Good Code" - The AI with the code judged to be the "best".</li>
	</ul>
	See below for more information about how each of these categories is 
	judged.
</p><p>
	Every AI entry which gains at least 3 battle points will receive a pack of 
	Thousand Parsec stickers to plaster over everything.
</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<a name="categories"></a>
<h2>Categories</h2>
<p>
	There are two independent categories that each AI will participate in. 
</p>

<a name="battle"></a>
<h3>Battle Points</h3>
<p>
	The first category is the AI which "wins" the most "battle points". At the
	competition close, each AI will be run in a number of games. These games
	will fall into two types. Battle points will be awarded for achieving certain 
	goals in each game.
</p><p>
	All battle points achieved will be tallied and then the AI with the largest
	amount will win the major prize. The AI with the second largest amount will
	win the minor prize.
</p>
<a name="1v1"></a>
<h4>One vs One Games</h4>
<p>
	The first type of game will be a One vs One games. In these games each AI 
	will battle it out with one other AI according to the rules listed below.
	<ul>
		<li>Each AI will compete in a game with every other AI.</li>
		<li><a href="/tp/dev/documents/minisec.php">MiniSec rules</a> as implemented in tpserver-cpp at competition close.</li>
		<li>The server will be tpserver-cpp.</li>
		<li>Turns will be 50 seconds long with 10 seconds for turn generation.</li>
		<li>There will be 25 Planets scattered under a random number of Systems.</li>
		<li>There will be 2 Planets in each AI's Home System.</li>
		<li>Winning condition is wiping out all enemy planets.</li>
		<li>If no AI has won after 500 turns the game will be considered a draw.</li>
	</ul><ul>
		<li>A winning AI will receive 3 Battle Points.</li>
		<li>A drawing AI will receive 1 Battle Point.</li>
	</ul> 
</p>
<a name="4va"></a>
<h4>4 All-Against-All Games</h4>
<p>
	The second type of game will be a 4 way All-Against-All games. In these games 
	each AI will battle it out with three other AI according to the rules listed below.
	<ul>
		<li>Each AI will compete in a game with every other AI.</li>
		<li><a href="/tp/dev/documents/minisec.php">MiniSec rules</a> as implemented in tpserver-cpp at competition close.</li>
		<li>The server will be tpserver-cpp.</li>
		<li>Turns will be 50 seconds long with 10 seconds for turn generation.</li>
		<li>There will be 50 Planets scattered under a random number of Systems.</li>
		<li>There will be 4 Planets in each AI's Home System.</li>
		<li>Each AI's home planet will be a minimum of 5 turns by battleship away from each.</li>
		<li>The Universe will be (at it's widest point) 20 turns by battleship across.</li>
		<li>Winning condition is wiping out all enemy planets.</li>
		<li>If no AI has won after 1500 turns the game will be considered a draw (of the remaining AI).</li>
	</ul><ul>
		<li>A winning AI will receive 9 Battle Points.</li>
		<li>A drawing AI will receive 3 Battle Point.</li>
	</ul> 
</p>

<a name="good"></a>
<h3>Good Code</h3>
<p>
	For the second category, each AI will be graded by a panel against a set of
	criteria. The grades in each category will be added together to obtain a total
	grade for the AI. The AI with the highest total grade will be awarded the 
	major prize, the AI with the second height total grade will be awarded the
	minor prize.

<a name="criteria"></a>
<h4>Judging Criteria</h4>
	<ul>
		<li>Readability, how easy it is to figure out what the code is trying to do. Good documentation plays a very large part of this category. Quality rather then quantity will also improve your score.</li>
		<li>Extendability, how easy it would be to use the same AI for MTSec.</li>
		<li>Simplicity, how simply the code which actually works is.</li>
		<li>Usability, how easy it is to setup and get the client running on a standard Ubuntu box.</li>
	</ul>

<a name="judges"></a>
<h4>Judges</h4>
<p>
	Their will be 3 judges for this section, there names are listed below.
	<ul>
		<li>Tim Ansell (mithro)</li>
		<li>Lee Begg (llnz)</li>
		<li>Jure Repinc (JLP)</li>
	</ul>
</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<a name="submit"></a>
<h2>Submission Details</h2>
<p>
	All submissions must be in before 00:01 on the 31st of March 2007 (UTC).
</p><p>
	Submission Details will be released closer to the closing date.
</p><p>
	<a name="email"></a>
	<h4>Contact</h4>
	Register your interest or intent to compete by sending an email to the 
	following address <a href="mailto:comp@thousandparsec.net">comp@thousandparsec.net</a>.
	This email address can also be used if you have any problems or suggestions.
</p><p>
	<a name="list"></a>
	<h4>Mailing List</h4>
	You can also join the mailing list which you can discuss how totally 
	kick arse your AI is. You can also organise test games and other stuff.
	<a href="http://www.thousandparsec.net/tp/mailman.php/listinfo/tp-comp">List can be found here.</a>
</p><p>
	<a name="forum"></a>
	<h4>Forum</h4>
	There is also an <a href="http://www.thousandparsec.net/forums/viewforum.php?f=6">Internet forum</a>
	which is linked to the mailing list like other forums.
</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<a name="terms"></a>
<h2>Other Terms and Conditions</h2>
<p>
	The competition prizes will only be awarded if there are more then 4 
	competitors (or at the discretion of the judges when less then 4 competitors).
</p><p>
	A competitor may submit more then one AI, however a competitor may only win 
	one prize in each category. (IE They can win the major prize in both "Battle
	Points" and "Good Code". They CAN NOT win both the major and minor prize in 
	the "Battle Points" category.)
</p><p>
	All code must be released under an OSI approved Open Source License which 
	is GPL compatible.
</p><p>
	All AI clients must run via normal client connections. Integrating with the
	server is not an option.
</p><p>
	All code must be run on Ubuntu Dapper Drake using only tools and libraries
	with OSI approved licenses. (For example, Don't use Java functions which are 
	not implemented in the free versions.)
</p><p>
	Any programming language which can runs on Ubuntu Dapper Drake and has
	an implementation with an OSI approved license can be used. Note however
	that some languages naturally rate low on the Readability category. 
</p><p>
	Judges or their close family will not be allowed to participate.
</p><p>
	This page and the competition details can change without notice. No change will
	reduce the overall cash value of any of the prizes.
</p>
<?php include "bits/end_section.inc" ; ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php include "bits/end_page.inc" ; ?>
