<?php $title = "Getting Started" ?>
<?php include "bits/start_page.inc" ; ?>

<div id="gs">Want to win cool prizes? Why not join the <a href="/tp/comp.php">AI Programming Competition?</a></div>

<?php include "bits/start_section.inc" ; ?>
<table class="borderless">
	<tr>
		<td>

<h1>About</h1>
<p>
	Thousand Parsec is a framework for turn based space empire building games.
</p><p>
	It is important to understand that Thousand Parsec is <b>not</b> a game by itself,
	it is a frame work for creating a similar group of games. Some of the games,
	such as our first demo game <a href="/tp/dev/documents/minisec.php">MiniSec</a>,
	are developed by the Thousand Parsec developers themselves. In the near 
	future we hope that other developers will create their own games using Thousand Parsec.
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
	At the moment you most probably want tpclient-pywx as it's the only client in 
	active development. You should <b>always</b> get the latest version of the 
	client because older versions tend to lack important features and have more
	bugs. Below are instructions on how to install tpclient-pywx.
</p><p>
	If you are a console junkie you can also use tpclient-pytext, however this
	client is far from polished. You can find instructions for installing this
	client in the developer section.
</p><p>
	After you have installed a client you should then head over to the 
	<a href="http://metaserver.thousandparsec.net">metaserver</a> which lists all
	the currently running public servers.
</p>

<h2>Installing tpclient-pywx on Windows</h2>
<p>
	Just download the setup/exe version from the download page and run it!
</p>

<h2>Installing tpclient-pywx on Mac OS X</h2>
<p>
	Just download the Mac DMG version from the download page and double click on it!
</p>

<h2>Installing tpclient-pywx on Debian or Ubuntu</h2>
<p>
	First you need to install the prerequisites for tpclient-pywx not developed by the Thousand Parsec project.
</p>
<ul>
	<li>
		Firstly you need to install Python package.
		<pre class="code">
	apt-get install python
		</pre>
	</li><li>
		You also need to install NumArray
		<pre class="code">
	apt-get install python-numarray
		</pre>
	</li><li>
		Next you need to install wxPython
		<pre class="code">
	apt-get install python-wxgtk2.6
		</pre>
		<b>Note:</b> If you have wxPython 2.4 installed make sure you update to
the latest version by doing a 
		<pre class="code">
	apt-get install python-wxgtk2.4
		</pre>
	</li>
	</li><li>
		For best performance and the most functionality it is recommended you
install the following.  
		<pre class="code">
	apt-get install python-psyco
	apt-get install python-pyopenssl
	apt-get install python-imaging
		</pre>
		If you are running a <a href="http://www.gnome.org">Gnome</a> or gtk
system (which you are if you are running Ubuntu) it is also recommended you
installed the following.
		<ul>
			<li>On Debian:
			<pre class="code">
	apt-get install python-gconf
			</pre>
		</li><li>On Ubuntu:
			<pre class="code">
	apt-get install python-gconf
			</pre></li>
		</ul>
	</li>
</ul>

<p>
	Next you need to install tpclient-pywx. 
</p>
<ul>	
	</li><li>
		Now all you need to do is get <b>tpclient-pywx</b>
		<ol>
			<li>Download the <b>"inplace"</b> version tar.gz from <a href="/tp/downloads.php#tpclient-pywx">here</a></li>
			<li>Extract the tar.gz</li>
			<li>Enter the newly created directory</li>
			<li>Run <pre class="code">./tpclient-pywx</pre></li>
		</ol>
	</li>
</ul>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<h1 id="admin">I want to run a game!</h1>
<p>There are two servers that can be used, tpserver-py and tpserver-cpp.</p>

<h2>Tpserver-py</h2>

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

<h2>Tpserver-cpp</h2>
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
	persistence backend. You might want a server too. (0.1.3 onward)
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
is provided and a sample config file is in the source package. The console when
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
