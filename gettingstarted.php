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
	bugs. Below is instructions on how to install tpclient-pywx
</p>

<h2>Installing tpclient-pywx on Debian or Ubuntu</h2>
<ul>
	<li>
		Firstly you need to install Python and the Python development packages.
		<pre class="code">
	apt-get install python
	apt-get install python-dev
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
	</li><li>
		Next you need to install <b>libtpproto-py</b>
		<ol>
			<li>Download the tar.gz from <a href="http://www.thousandparsec.net/tp/downloads.php">here</a></li>
			<li>Extract the tar.gz</li>
			<li>Enter the newly created directory</li>
			<li>As <b>root</b> run <pre class="code">python setup.py install</pre></li>
		</ol>
	</li><li>
		Now all you need to do is get <b>tpclient-pywx</b>
		<ol>
			<li>Download the tar.gz from <a href="http://www.thousandparsec.net/tp/downloads.php">here</a></li>
			<li>Extract the tar.gz</li>
			<li>Enter the newly created directory</li>
			<li>Run <pre class="code">./tpclient-pywx</pre></li>
		</ol>
	</li>
</ul>

<h2>Installing tpclient-pywx on RPM systems</h2>
<p>
	
</p>



<?php include "bits/end_section.inc" ; ?>

<?php include "bits/end_page.inc" ; ?>
