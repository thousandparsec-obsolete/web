<?php $title = "Getting Started" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc" ; ?>
<table class="borderless">
	<tr>
		<td>

<h1>About</h1>

<p>
Thousand Parsec is a <a href="http://www.thousandparsec.net/wiki/Rulesets">
bunch of games</a> based on a common framework for building turn based space
empire building games. Some of the games, such as our first demo game <a
href="/tp/dev/documents/minisec.php">MiniSec</a>, are developed by the Thousand
Parsec developers themselves.  In the near future we hope that other developers
will create their own games using Thousand Parsec framework.
</p><p>
	Some examples of games which Thousand Parsec draws ideas from are,
<a href="http://www.faqs.org/faqs/games/stars/newsgroup-faq/">Stars!</a>, 
<a href="http://www.vgaplanets.com/">VGA Planets</a>,
<a href="http://moo3.quicksilver.com/">Master of Orion</a> and
<a href="http://www.galciv.com/">Galactic Civilizations</a>.
	These games are often called 4 X's from the main phases found in the games,
	eXplore, eXpand, eXploit and eXterminate.

	If you haven't heard of them, other games which are a bit similar include,
<a href="http://www.civ3.com/">Civilisation</a>, 
<a href="http://www.mightandmagic.com/">Hero's of Might and Magic</a> and
<a href="http://www.blizzard.com/starcraft/">Starcraft</a>.
</p><p>
	Thousand Parsec includes everything you need for
	<ul>
		<li>play any of the currently running games,</li>
		<li>set up your own game using already designed games, and</li>
		<li>building your own space empire building game.</li>
	</ul>
	As Thousand Parsec is a rather large project it is easy to get confused 
	when first starting out. This page has instructions on how to get started
	with Thousand Parsec.
</p>

<h1>Getting Started!</h1>
<p>
	Before we can give you instructions on what to do, we need to figure out
	which part of Thousand Parsec you are interested in. Click the Link below
	which best describes you.
	<ul>
		<li><a href="#gamer">I want to actually play a game!</a></li>
		<li><a href="#admin">I want to run a game!</a></li>
		<li><a href="#developer">I want to develop a game!</a></li>
	</ul>
</p>


		</td><td>
			<img style="text-align: right;" src="graphics/lizard.png" />
			<p class="caption">Most races don't survive finding out what lizard men eat.</p>
		</td>
	</tr>
</table>
<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>
<a name="gamer"></a>
<h1>I want to actually play a game!</h1>
<p>
	To actually play a game which uses Thousand Parsec you need a client. Any
	Thousand Parsec client can connect to any Thousand Parsec server.
</p><p>
	There are currently to primary clients for playing Thousand Parsec. The
	<a href="/tp/downloads.php?product=tpclient-pywx">tpclient-pywx client</a>
	is 2d based but gets new features first (such as single player mode), while
	<a href="/tp/downloads.php?product=tpclient-pyogre">tpclient-pyogre client</a>
	is a snazzy looking 3d client.
</p><div style="text-align: center;"> 
	<table style="width: 600px; margin-left:auto; margin-right:auto;">
		<tr>
			<td style="width: 50%;">
				<a href="/tp/downloads.php?product=tpclient-pywx"><img style="border: 2px solid white; height: 200px;" src="/tp/img/screenshots/tpclient-pywx.png"></a>
			</td><td style="width: 50%;">
				<a href="/tp/downloads.php?product=tpclient-pyogre"><img style="border: 2px solid white; height: 200px;" src="/tp/img/screenshots/tpclient-pyogre.png"></a>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
				<a href="/tp/downloads.php?product=tpclient-pywx">tpclient-pywx screenshot</a>
			</td><td style="width: 50%;">
				<a href="/tp/downloads.php?product=tpclient-pyogre">tpclient-pyogre screenshot</a>
			</td>
		</tr>
	</table>
</div><p>
	After you have installed a client you should then head over to the 
	<a href="http://metaserver.thousandparsec.net">metaserver</a> which lists all
	the currently running public servers.
</p><p>
	You can download the both clients <a href="http://www.thousandparsec.net/tp/downloads.php?category=client">here</a>.
</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<h1 id="admin">I want to run a game!</h1>
<p>There are two servers that can be used, tpserver-py and tpserver-cpp.</p>

<h2>tpserver-py</h2>

<p>Real Instructions coming soon.</p>

<pre class="code">
git-clone git://git.thousandparsec.net/git/scratchpad
git-clone git://git.thousandparsec.net/git/libtpproto-py
git-clone git://git.thousandparsec.net/git/tpserver-py

cd scratchpad
sh setup.sh
cd ..
cd tpclient-pywx

cp config.py-template config.py
./tpserver-py-tool --addgame tp minisec [admin email] "A test game"
./tpserver-py-tool --populate tp 0 10 10 2 2
./tpserver-py-tool --adduser tp [username] [password]

# Run the following to generate a turn
./tpserver-py-tool --turn tp
</pre>

<h2>tpserver-cpp</h2>
<p>The tpserver-cpp is written in C++. It should compile and run under most
unix-like operating systems (Linux, MacOS X, *BSD). No binaries are currently
supplied.</p>
<p>To build from source, follow these steps:</p>
<ol>
<li>
Install the dependencies: autotools (autoconf, autoheader, automake, aclocal),
libtprl, and MzScheme or guile. Don't forget to install dev packages for
libraries.
</li><li>
Optionally, install the optional dependencies.
  <ul><li>
	libmysql-client (and dev package) if you want to use a MySQL server for the
	persistence backend. You might want a server too.
  </li><li>
    libgnutls (and dev package) if you want secure sockets.
  </li></ul>
</li><li>
	Download the sources from 
	<a href="/tp/downloads.php#tpserver-cpp">Thousand Parsec Download page</a>.
</li><li>
	Extract the tar.gz file.
</li><li>
	Enter the created directory.
</li><li>
	Run <pre class="code">./configure</pre> To see what build options are
	available run <pre class="code">./configure --help</pre>
</li><li>
	Build with make. 
	<pre class="code">make</pre>
</li><li>
	As root (or administrator user) run <pre class="code">make install</pre>. The
	executable, static data and man page are installed. They can be uninstalled with
	<pre class="code">make uninstall</pre>
</li><li>
	To start server, run <pre class="code">tpserver-cpp</pre>
</li>
</ol>
<p>
tpserver-cpp has a number of command line arguments and config files. A man page
is provided and a sample config file is in the source package. quickstart config files for 
the available games are also provided in the tarbal. The console when
the server starts has a number of commands, and has help and tab completion.
</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<h1 id="developer">I want to develop a game!</h1>
<!--
<h2>Installing tpclient-pytext on Debian or Ubuntu</h2>
<p>
	Do NOT use tpclient-pytext unless you are weird.....
</p>
<ul>
	<li>
		Firstly you need to install Python and the Python development packages.
		<pre class="code">
	apt-get install python
	apt-get install python-dev
		</pre>
	</li><li>
		You also need to install <a href="http://excess.org/urwid/">Urwid</a>. Follow the
		instructions found <a href="http://excess.org/urwid/#htoc7">here</a>.
	</li><li>
		Next you need to get and setup <b>libtpproto-py</b> and <b>tpclient-pytext</b>
		<pre class="code">
	# Install CVS if you don't already have it
	apt-get install cvs 
	
	# Check the stuff out of CVS
	cvs -d:pserver:cvsanon@cvs.thousandparsec.net:/tp login
	cvs -z3 -d:pserver:cvsanon@cvs.thousandparsec.net:/tp co libtpproto-py tpclient-pytext setup.sh

	# Setup the stuff for out of tree building
	./setup.sh

	# Run tpclient-pytext
	cd tpclient-pytext
	python tpclient-pytext
		</pre>
	</li>
</ul>
-->

<h2>tpserver-cpp</h2>
<p>
There are a number of small tasks in the 
<a href="http://sourceforge.net/tracker/?group_id=132078&atid=723099">TP bugs tracker</a> 
on Sourceforge that a new programmer could start on.
</p>
<h3>Rulesets</h3>
<p>
The tpserver-cpp game server supports plug-in rulesets that define new games. A
book which talks about how to develop new rulesets can be found 
<a href="http://www.thousandparsec.net/~lee/ruleset-book.pdf">here</a>.
</p><p>
The latest version of the document can be found in git
<a href="http://git.thousandparsec.net/gitweb/gitweb.cgi?p=ruleset-book.git;a=summary">here</a>.
</p>

<?php include "bits/end_section.inc" ; ?>

<?php include "bits/end_page.inc" ; ?>
