<?php $title = "Google Summer of Code 2007" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<h1>Google Summer of Code 2007</h1>
<h6>Last updated: 15 March 2007</h6>

<p>Thousand Parsec is one of the mentoring organisations for
<a href="http://code.google.com/soc/" target="_blank">Google Summer of Code 2007</a>.
This is a great chance for all students to work on a cool open source game project during
the summer of 2007, have fun and earn some money during the process.</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Ideas</h2>

<p>
Below are some of the ideas and suggestion for students who are interested in joining
Thousand Parsec project. The list is not definitive and any student is more than welcome
to come up with their own idea to work on. Initiative is a very good skill.
</p><p style='font-size: 18px'>
The list is not definitive and any student is more than welcome to come up with their own
idea to work on. Initiative is a skill which will rate highly when selecting projects.
Feel free to come up with your own projects.  
</p><p>For additional ideas we encourage students to look at
<a href="http://sourceforge.net/tracker/?group_id=132078&atid=829724">Thousand Parsec TODO list</a>.</p>


<table>
	<tr>
		<td colspan="2"><h3>Implement MTSec game in one server</h3></td>
	</tr><tr>
		<td colspan="2">
<p>
Currently, Thousand Parsec servers only implement a very simple game we call MiniSec. To
make the game more interesting and challenging a more complex game needs to be implemented
in one of the servers. The rules and properties of this new game are already defined in a
game we call MTSec (short for Missile and Torpedo Wars).
</p><p>
You can choose to implement the game in either the 
<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=tpserver-cpp;a=summary">Python Server</a> 
or in the 
<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=tpserver-py;a=summary">C++ Server</a>.
</p>
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
			<a href="/tp/dev/documents/mtsec.php">MTSec Documentation</a><br />
			<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1678819&group_id=132078&atid=829724">SF Todo Tracker Item</a>
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>Strong C++ or Strong Python skill.</td>
	</tr>
</table>


<table>
	<tr>
		<td colspan="2"><h3>Web based client</h3></td>
	</tr><tr>
		<td colspan="2">
<p>
A web based client enables players to join Thousand Parsec games easily from any computer
with a web browser and internet connection. This makes web based client the fastest and
easiest way to start playing the game.
</p><p>
Any language could be used for the client. Some suggestions are 
<a href="http://www.php.net/">PHP</a>, <a href="http://www.python.org/">Python</a> or 
<a href="http://www.ruby-lang.org/en/">Ruby</a>. It might be a good idea to use 
<a href="http://en.wikipedia.org/wiki/AJAX">AJAX</a> or something similar.
</p><p>
It is expected that you would produce a client which has the following functionality,
<ul>
	<li>Support for displaying the Starmap</li>
	<li>Support for displaying all information about objects</li>
	<li>Support for issuing orders</li>
	<li>Support for creating designs</li>
</ul>
</p>
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
			<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=libtpproto-php;a=summary">libtpproto-php</a>,
			<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=libtpproto-rb;a=summary">libtpproto-rb</a>,
			<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi?r=libtpproto-py;a=summary">libtpproto-py</a>
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>Strong Web development skill.</td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h3>Develop a 3D Client (or improve tpclient-pyogre)</h3></td>
	</tr><tr>
		<td colspan="2">

<p>
A cool 3d client for Thousand Parsec is needed. A pyOgre client was started but is in need
of quite a bit of love. You could choose to use that as a base or start a new client from
scratch.
</p><p>
It is expected that you would produce a client which has the following functionality,
<ul>
	<li>Support for displaying the Starmap</li>
	<li>Support for displaying all information about objects</li>
	<li>Support for issuing orders</li>
	<li>Support for creating designs</li>
</ul>
</p>

		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>Some 3D development skills</td>
	</tr>
</table>


<table>
	<tr>
		<td colspan="2"><h3>Write a PostgreSQL persistence module for tpserver-cpp</h3></td>
	</tr><tr>
		<td colspan="2">

<p>
<a href="/tp/dev/documents/tpserver-cpp/">Tpserver-cpp</a> (C++ Thousand Parsec server)
has an abstract persistence interface that allows different methods of saving the game
data. Currently, only a basic MySQL module has been written.
</p><p>
The interface it fairly straight forward, but there is likely to be changes to the
interface as the new game features are created and the internal architecture changes.
</p>

		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
			<a href="http://www.postgresql.org/">PostgresSQL</a>
			<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1678819&group_id=132078&atid=829724">SF Todo Tracker Item</a>.
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>SQL (preferably PostgreSQL and or MySQL) experience, C++ experience</td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h3>Write a SQLlite persistence module for tpserver-cpp</h3></td>
	</tr><tr>
		<td colspan="2">
<p>
<a href="/tp/dev/documents/tpserver-cpp/">Tpserver-cpp</a> (C++ Thousand Parsec server)
has an abstract persistence interface that allows different methods of saving the game
data. Currently, only a basic MySQL module has been written.
</p><p>
The interface it fairly straight forward, but there is likely to be changes to the
interface as the new game features are created and the internal architecture changes.
</p>
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
			<a href="http://www.sqlite.org/">SQLlite</a>
			<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1678819&group_id=132078&atid=829724">SF Todo Tracker Item</a>.
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>SQL (preferably SQLlite or MySQL) experience, C++ experience</td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h3>Improve the XSLT document generation</h3></td>
	</tr><tr>
		<td colspan="2">
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
			<a href="">MTSec Documentation</a>
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h3>Create a ruleset development Enviroment</h3></td>
	</tr><tr>
		<td colspan="2">
<p>
Scheme is quite a hard language to work write. Create an IDE which makes it easy to create
new components and properties (and develop the scheme code to go with it).
</p>
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652210&group_id=132078&atid=829724">[1652210] - Add long term stats to Metaserver</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652205&group_id=132078&atid=829724">[1652205] - Add match making service to the Metaserver.</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652204&group_id=132078&atid=829724">[1652204] - Add RSS Feeds to the Metaserver.</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1586115&group_id=132078&atid=829724">[1652209] - Clean up Metaserver code.</a><br />
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>Some PHP skills (or other Web development skills).</td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h3>Improve the metaserver - make it standalone</h3></td>
	</tr><tr>
		<td colspan="2">
<p>
The metaserver was written in about 5 hours. It works but requires a lot of work before
it's a "good" piece of software. It could also be rewritten in another language.
</p><p>
Some features would include:
<ul>
	<li>Implementing the full specification found in the 
<a href="http://www.thousandparsec.net/tp/dev/documents/protocol4.php">discussion document</a></li>
	<li>Make it portable across databases</li>
	<li>Add RSS output support</li>
	<li>Produce statistics and some type of graphing</li>
	<li>"Back Connect" support for verification of details</li>
	<li>Some type of "match making" support</li>
</ul>
</p>
		</td>
	</tr><tr>
		<td><h4>More Information</h4></td>
		<td>
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652210&group_id=132078&atid=829724">[1652210] - Add long term stats to Metaserver</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652205&group_id=132078&atid=829724">[1652205] - Add match making service to the Metaserver.</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1652204&group_id=132078&atid=829724">[1652204] - Add RSS Feeds to the Metaserver.</a><br />
<a href="https://sourceforge.net/tracker/index.php?func=detail&aid=1586115&group_id=132078&atid=829724">[1652209] - Clean up Metaserver code.</a><br />
		</td>
	</tr><tr>
		<td><h4>Required Skills</h4></td>
		<td>Some PHP skills (or other Web development skills).</td>
	</tr>
</table>


<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Mentors</h2>
<ul>
<li>Tim Ansell (mithro)</li>
    <ul>
        <li>E-mail: <a href="mailto:mithro NOSPAM mithis PLEASE com">jlp@holodeck1.com</a></li>
        <li>Jabber: <a href="xmpp:mithro@gmail.org">mithro@gmail.org</a></li>
    </ul>
<li>Lee Begg (llnz)</li>
    <ul>
        <li>E-mail: <a href="mailto:llnz NOSPAM paradise PLEASE net.nz">llnz AT paradise DOT net DOT nz</a></li>
        <li>Jabber: <a href="xmpp:llnz@jabber.org">llnz@jabber.org</a></li>
    </ul>
<li>Jure Repinc (JLP)</li>
    <ul>
        <li>E-mail: <a href="mailto:jlp NOSPAM holodeck1 PLEASEcom">jlp@holodeck1.com</a></li>
        <li>Jabber: <a href="xmpp:jlp@jabber.org">jlp@jabber.org</a></li>
    </ul>
</ul>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Important dates</h2>
<dl>

<dt>March 14</dt>
<dd>List of accepted mentoring organizations published on code.google.com; student application period opens</dd>

<dt>March 24</dt>
<dd>Student application deadline</dd>

<dt>April 9</dt>
<dd>List of accepted student applications published on code.google.com</dd>
 
<dt>May 28</dt>
<dd>Students begin coding for their GSoC projects; Google begins issuing initial student payments</dd>
 
<dt>July 9</dt>
<dd>Students upload code to code.google.com/hosting; mentors begin mid-term evaluations</dd>
 
<dt>July 16</dt>
<dd>Mid-term evaluation deadline; Google begins issuing mid-term student payments</dd>
 
<dt>August 20</dt>
<dd>Students upload code to code.google.com/hosting; mentors begin final evaluations; students begin final program evaluations</dd>
 
<dt>August 31</dt>
<dd>Final evaluation deadline; Google begins issuing student and mentoring organization payments</dd>

</dl>

<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>
