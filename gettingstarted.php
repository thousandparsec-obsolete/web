<?php $title = "Getting Started!" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc" ; ?>
<h1>Getting Started!</h1>
<p>
	Thousand Parsec is a rather large project so it is easy to get confused 
	when first starting out. This page has instructions on how to get started
	with Thousand Parsec.
</p><p>
	It is important to understand that Thousand Parsec is <b>not</b> a game by itself,
	it is a frame work for creating a similar group of games. Some of the games,
	such as our first demo game <a href="/tp/dev/documents/minisec.php">MiniSec</a>,
	are developed by the Thousand Parsec developers themselves. In the near 
	future we hope other developers create there own games using Thousand Parsec.
</p><p>
	Before we can give you instructions on what to do, we need to figure out
	which part of Thousand Parsec you are intrested in. Click the Link below
	which best describes you.
	<ul>
		<li><a href="#gamer">I want to actually play a game!</a></li>
		<li><a href="#admin">I want to run a game!</a></li>
		<li><a href="#developer">I want to develop a game!</a></li>
	</ul>
</p>
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
	bugs. Below is instructions on how to install tpclient-pywx.
</p><p>
	If you are a console junky you can also use tpclient-pytext, however this
	client is far from polished. You can find instructions for installing this
	client in the developer section.
</p>


<h2>Installing tpclient-pywx on Debian or Ubuntu</h2>

<p>
	First you need to install the prerequistest for tpclient-pywx not developed by the Thousand Parsec project.
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
		<b>Note:</b> If you have wxPython 2.4 installed make sure you update to the latest version by doing a 
		<pre class="code">
	apt-get install python-wxgtk2.4
		</pre>
	</li>
</ul>

<p>
	Next you need to install tpclient-pywx. 
</p>
<ul>	
	</li><li>
		Now all you need to do is get <b>tpclient-pywx</b>
		<ol>
			<li>Download the "inplace" version tar.gz from <a href="http://www.thousandparsec.net/tp/downloads.php">here</a></li>
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
<p>Instructions coming soon.</p>

<h2>Tpserver-cpp</h2>
<p>The tpserver-cpp is written in C++. It should compile and run under most unix-like operating systems (Linux, MacOS X, *BSD). No 
binaries are currently supplied.</p>
<p>To build from source, follow these steps:</p>
<ol>
<li>Install the dependencies: autotools (autoconf, autoheader, automake, aclocal), libreadline, MzScheme. Don't forget to install dev packages for libraries.</li>
<li>Optionally, install the optional dependencies.
  <ul><li>libmysql-client (and dev package) if you want to use a MySQL server for the persistence backend. You might want a 
	server too. (0.1.3 onward)</li></ul></li>
<li>Download the sources from <a href="http://www.thousandparsec.net/tp/downloads.php">Thousand Parsec Download page</a> or from <a href="http://sourceforge.net/project/showfiles.php?group_id=132078&amp;package_id=145028">Sourceforge downloads</a>.</li>
<li>Extract the tar.gz file.</li>
<li>Enter the created directory.</li>
<li>Run <pre class="code">./configure</pre> To see what build options are available run <pre class="code">./configure --help</pre></li>
<li>Build with make. <pre class="code">make</pre></li>
<li>As root (or administrator user) run <pre class="code">make install</pre>. The executable, static data and man page are installed. They can be uninstalled with <pre class="code">make uninstall</pre></li>
<li>To start server, run <pre class="code">tpserver-cpp</pre></li>
</ol>
<p>Tpserver-cpp has a number of command line arguments (and in future, config files).</p>

<?php include "bits/end_section.inc" ; ?>
<?php include "bits/start_section.inc" ; ?>

<h1 id="developer">I want to develop a game!</h1>

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

<h2>Tpserver-cpp rulesets</h2>
<p>The tpserver-cpp game server supports plug-in rulesets that define new games.  The interface inside tpserver-cpp isn't very
stable yet. Please talk to Lee by email or on IRC.</p>

<h2>Libtpproto-cpp clientside protocol library</h2>
<p>A client-side protocol and game interface library called libtpproto-cpp is under development. If you want to write a game in
C++ you should use this library. Online documentation is available on the 
<a href="http://www.thousandparsec.net/tp/dev/documents/libtpproto-cpp/">libtpproto-cpp documentation</a> page. Any feedback on
the library or assistance programming it will be very helpful.</p>

<h2>Tpserver-cpp</h2>
<p>There are a number of small tasks in the <a href="http://sourceforge.net/tracker/?group_id=132078&atid=723099">TP bugs tracker</a> on 
Sourceforge that a new programmer could start on.</p>

<?php include "bits/end_section.inc" ; ?>

<?php include "bits/end_page.inc" ; ?>
