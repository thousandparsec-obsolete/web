<?php
	$title = "Protocol Discussion Ver 0.4";
	include "../bits/start_page.inc";
	include "../bits/start_section.inc";
?>

<style type="text/css">
<!--
.new { color: #00ff00; }
.fixme { color: #ff0000; }
.inote { color: #ffff00; }

ul.response {
	margin-top: 0.5em;
	margin-bottom: 0.25em;
	font-size: 8pt;
	padding-left: 0.25em;
}

ul.response ul {
	margin-top: 0em;
	margin-bottom: 0em;
	padding-left: 1em;
}

-->
</style>

<h1>Protocol Discussions for Version 0.4</h1>
<p>
	Unlike previous versions of the protocol, the version 0.4 will be total
specified in an XML specification. The main purpose of this document is to collect
ideas until they are fully implemented in the XML specification.
</p><p>
<b>THIS IS NOT A PROTOCOL SPECIFICATION!</b>
</p>

<h2>Currently in tp03</h2>
<p>The current version of the protocol currently has the following features. As
tp04 is being built on top of tp03 it will also include these features.</p>

<dl>
	<dt>Dynamic Orders</dt>
<dd>Thousand Parsec servers can define new orders and clients can automatically
discover these orders and show the user quite a bit of detail about what
arguments should be given to the order.</dd>

	<dt>Comprehensive Design Support with tpcl</dt>
<dd>Designing things is a very important part of most empire building games.
tp03 includes support for building designs out of "components", these components
dynamical describe their properties and requirements. They can be either
calculated on the server or calculated on the client. It is quite possible to
have components which require other components, forbid other components via
either specific exclusion</dd>

	<dt>Dynamic Resources</dt>
<dd>Resources which are used for doing things are dynamical described by the
server.</dd>

	<dt>Message and Board system</dt>
<dd>Support for a wide variety of messages including referencing objects related
to a message (IE This message came from this object). Servers can also have both
private and public boards.</dd>

	<dt>Partial Design Discover</dt>
 <dd>Although no server currently implements a system where as you can only
discover partial information about enemy designs, this option is total
supported.</dd> 

</dl> 

<h2>New to tp04</h2>
<dl>

	<dt>Full XML protocol specification</dt> 
<dd>The protocol will be completely specified in an XML document. This will
allow more dynamic languages (such as Python, Ruby and PHP) to read in the
protocol document and dynamical create the correct data. This doesn't mean
our good documentation is going away (for those people who want to implement it
the "hard way"), instead it will be more accurate and contain better
linking, lot more useful tables and even an index.  The documentation will all
be generated using XSLT from the protocol XML document so it will also always be
current.</dd> 

	<dt>Meta Protocol definition</dt> 
<dd>A definition on how to talk the "meta protocol", IE talking to
the metaserver and find local games will be specified. It will be almost
identical to the current protocol specified separately.</dd> 

	<dt>Filter Support</dt> 
<dd>The protocol will support filters such as encryption and compression (or
even a 32bit aligned strings filter), there will be a way to negotiate which
filters to use.</dd>

	<dt>Difference Support</dt>
<dd>The protocol will include (and servers will be required to support) a
proper method for downloading "what has changed" lists. This will be
extended from the current "get id sequence" stuff but made so it
doesn't require downloading every single ID in the universe to find out
the differences.</dd>

	<dt>Dynamic Objects</dt>
<dd>Like how servers can define new a interesting order types, with tp04
servers will also be able to do the same for objects. A wide variety of object
properties types will exist, from Graph like properties to just plain strings.
This will rapidly allow many more advanced rulesets to exist.  
	<dl>
		<dt>Old Data support</dt>
<dd>As a side effect of Dynamic Objects, object properties will be able to be
"aged". This means that if you could detect/determine the value in the past, but
can't determine the value now, the client will be able to understand this.</dd>

		<dt>Multiple Instruction queue support</dt>
<dd>As another side effect of Dynamic Objects, objects will be able to have
multiple instruction queues. These will allow for things like "standing
battle orders" and "research queues" (and probably plenty of other things I
can't think of at this very moment).</dd> 

		<dt>Media support</dt> 
<dd>The current "media support" is just a hack in tpclient-pywx. The
dynamic objects will allow proper specification of what media should be used for
objects and such.</dd> 
	</dl> 
</dd>

	<dt>Research support</dt>
 <dd>The protocol will include support for figuring out which "Research options"
are available. It will support a wide range of research methods too (from
researching for a specific object, to researching researching in a general
area).</dd>

	<dt>EOT Support</dt>
<dd>There will be support for things like saying "I'm Done" and "Please end the
turn now.". This will mean we are no longer just stuck with the EOT at a certain
time problem like in tpserver-cpp (or when admin runs a special program like in
tpserver-py).</dd>

	<dt>Frame Type Versions</dt>
<dd>Support for changing frames (in a backward compatible way) separately. This
will allow better updates of the protocol without having to do a complete new
version.</dd>

</dl>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Server Location Protocol</h2>

<p>
There are two parts to server location. The first is finding servers on a local
network, for this ZeroConf is used. The second is finding servers on the
internet, for this a metaserver is used. The protocol used in both situations is
basically the same, the transport mechanism is just a little different.
</p>

<p>
In hopes of making it easier for people to find and actually play games
I have been working on automatic server discovery. There are two parts
to this,
<ul>
	<li>local LAN discovery</li>
	<li>metaserver discovery</li>
</ul>
</p><p>
The unit of discovery is not server as one might first jump to but a "game".
Each game has a set of "locations" which is can be found at.
</p>

<p>
A game record has the following details,
</p>
<p>Required Parameters:</p>
<table>
	<tr>
		<td>tp</td>
		<td>comma seperated list of version strings (0.3, 0.2)</td>
	</tr><tr>
		<td>server</td>
		<td>version of the server</td>
	</tr><tr>
		<td>servtype</td>
		<td>server type (tpserver-cpp, tpserver-py)</td>
	</tr><tr>
		<td>rule</td>
		<td>ruleset name (MiniSec, TPSec, MyCustomRuleset)</td>
	</tr><tr>
		<td>rulever</td>
		<td>version of the ruleset</td>
	</tr>
</table>

<p>Optional parameters:</p>
<table>
	<tr>
		<td>plys</td>
		<td>1</td>
		<td>number of players in the game</td>
	</tr><tr>
		<td>cons</td>
		<td>2</td>
		<td>number of clients currently connected</td>
	</tr><tr>
		<td>objs</td>
		<td>3</td>
		<td>number of "objects" in the game universe</td>
	</tr><tr>
		<td>admin</td>
		<td>4</td>
		<td>admin email address</td>
	</tr><tr>
		<td>cmt</td>
		<td>5</td>
		<td>comment about the game</td>
	</tr><tr>
		<td>next</td>
		<td>6</td>
		<td>unixtime stamp (GMT) when next turn is generated</td>
	</tr><tr>
		<td>ln</td>
		<td>7</td>
		<td>human readable name of the sever</td>
	</tr><tr>
		<td>turn</td>
		<td>8</td>
		<td>the current turn the game is at</td>
	</tr><tr>
		<td>prd</td>
		<td>9</td>
		<td>the time between turns in seconds</td>
	</tr>
</table>

<p>A location is specified as a tuple of:</p>
<table>
	<tr>
		<td>protocol</td>
		<td>tp, tps, tphttp, tphttps</td>
	</tr><tr>
		<td>dns</td>
		<td>A resolvable name of the server</td>
	</tr><tr>
		<td>ip</td>
		<td>Resolved ip address of the server</td>
	</tr><tr>
		<td>port</td>
		<td>The port of the server</td>
	</tr>
</table>
<p>
Local LAN discovery is being done with ZeroConf MDNS. Each server should
advertise a record PER GAME. The location details are automatically
discovered. The required and optional parameters should be found in the
TXT record.
</p>
<p>
A metaserver exists at metaserver.thousandparsec.net, to register a new
server you must send either a HTTP get or post request with the require
parameters. Each location is specified by doing the following
type0, dns0, ip0, port0 - details for first location
type1, dns1, ip1, port1 - details for second location
</p>
<p>
You must also send a "key", if the game with this name has never been
seen before the "key" will be stored. The key must then be sent for all
updates to take effect.
</p><p>
An example (using get) would be the following,
http://metaserver.thousandparsec.net/?action=update&tp=0.3,0.2&key=mykey&server=0.3.0&name=MyGame1&sertype=tpserver-cpp&rule=MiniSec&rulever=0.1&type0=tp&dns0=mithro.dyndns.org&ip0=203.122.246.117&port0=8000
</p><p>
All parameters are sanity checked but most are treated as a string.
</p><p>
To get the details about which servers exist the client should get the
following page.
http://metaserver.thousandparsec.net/?action=get
</p><p>
The server will return in the body of the message a Sequence frame
telling the number of "Game" frames to come. Game frames are described
as follows,
</p><p>
<ul>
	<li> a string,           (name)     Game name</li>
	<li> a string,           (key)      Empty on receive</li>
	<li> a list of Strings,  (tp)       List of protocol versions supported</li>
	<li> a string,           (server)   Server Version</li>
	<li> a string,           (servtype) Server Type</li>
	<li> a string,           (rule)     Ruleset Name</li>
	<li> a string,           (rulever)  Ruleset version</li>
	<li> a list of,
	<ul>
	   <li> a string,        (type)     Connection type (tp, tps, ...)</li>
	   <li> a string,        (dns)      Resolvable DNS name</li>
	   <li> a string,        (ip)       IP Address</li>
	   <li> a UInt32,        (port)     Port to connect on</li>
	</ul></li>
	<li> a list of,
	<ul>
	   <li> a id,             Optional param id</li>
	   <li> a string,         Optional param string value</li>
	   <li> a UInt32,         Optional param int value</li>
	</ul></li>
</ul>
</p><p>
I plan for the metaserver to eventually support sending packets directly
without using HTTP (IE connect to port xxxx and send a game frame -
maybe even a UDP connectionless method), but for now it's just easier to
do it over HTTP.
</p><p>
The metaserver also has a "human" mode, just browse to
http://metaserver.thousandparsec.net/ and you should get a webpage
listing the the servers with clickable URLs.
</p>
<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<p>
Formatted Strings are exactly like normal strings but use the structured text
method for formatting their contents. For a complete description of structured
text please see the following <a href="">document</a>. This allows display of
color, underline, super/subscript and much more. It is also easy to convert to
plain text or HTML.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Frames which are obsolete</h2>
<table class="tabular">
</table>

<h2>Frames which have changed</h2>
<table class="tabular">
	<tr class="row0 new"><td class="numeric"> -</td><td>Get ID Sequence</td></tr>
	<tr class="row1"><td class="numeric"> 1</td><td>Fail</td></tr>
	<tr class="row1 new"><td class="numeric">26</td><td>Available Features</td></tr>
	<tr class="row1 new"><td class="numeric">40</td><td>Player Data</td></tr>
</table>

<h2>Frames which haven't changed</h2>
 
<table class="tabular">
	<tr class="row0 new"><td class="numeric"> -</td><td>Get with ID</td></tr>
	<tr class="row1 new"><td class="numeric"> -</td><td>Get with ID and Slots</td></tr>
	<tr class="row1 new"><td class="numeric"> -</td><td>ID Sequence</td></tr>
	<tr class="row0"><td class="numeric"> 0</td><td>Ok</td></tr>
	<tr class="row0"><td class="numeric"> 2</td><td>Sequence</td></tr>
	<tr class="row1"><td class="numeric"> 3</td><td>Connect</td></tr>
	<tr class="row0"><td class="numeric"> 4</td><td>Login</td></tr>
	<tr class="row1"><td class="numeric"> 5</td><td>Get Objects by ID</td></tr>
	<tr class="row0"><td class="numeric"> 7</td><td>Object</td></tr>
	<tr class="row1"><td class="numeric"> 8</td><td>Get Order Description</td></tr>
	<tr class="row0"><td class="numeric"> 9</td><td>Order Description</td></tr>
	<tr class="row1"><td class="numeric">10</td><td>Get Order</td></tr>
	<tr class="row0"><td class="numeric">11</td><td>Order</td></tr>
	<tr class="row1"><td class="numeric">12</td><td>Insert Order</td></tr>
	<tr class="row0"><td class="numeric">13</td><td>Remove Order</td></tr>
	<tr class="row1"><td class="numeric">14</td><td>Get Time remaining</td></tr>
	<tr class="row0"><td class="numeric">15</td><td>Time remaining</td></tr>
	<tr class="row1"><td class="numeric">16</td><td>Get Boards</td></tr>
	<tr class="row0"><td class="numeric">17</td><td>Board</td></tr>
	<tr class="row1"><td class="numeric">18</td><td>Get Message</td></tr>
	<tr class="row0"><td class="numeric">19</td><td>Message</td></tr>
	<tr class="row1"><td class="numeric">20</td><td>Post Message</td></tr>
	<tr class="row0"><td class="numeric">21</td><td>Remove Message</td></tr>
	<tr class="row1"><td class="numeric">22</td><td>Get Resource Description</td></tr>
	<tr class="row0"><td class="numeric">23</td><td>Resource Description</td></tr>
	<tr class="row1 new"><td class="numeric">24</td><td>Redirect</td></tr>
	<tr class="row0 new"><td class="numeric">25</td><td>Get Features</td></tr>
	<tr class="row0 new"><td class="numeric">27</td><td>Ping</td></tr>
	<tr class="row1 new"><td class="numeric">28</td><td>Get Object IDs</td></tr>
	<tr class="row0 new"><td class="numeric">29</td><td>Get Object IDs by Position</td></tr>
	<tr class="row1 new"><td class="numeric">30</td><td>Get Object IDs by Container</td></tr>
	<tr class="row0 new"><td class="numeric">31</td><td>List of Object IDs</td></tr>
	<tr class="row1 new"><td class="numeric">32</td><td>Get Order Description IDs</td></tr>
	<tr class="row0 new"><td class="numeric">33</td><td>List of Order Description IDs</td></tr>
	<tr class="row1 new"><td class="numeric">34</td><td>Probe Order</td></tr>
	<tr class="row0 new"><td class="numeric">35</td><td>Get Board IDs</td></tr>
	<tr class="row1 new"><td class="numeric">36</td><td>List Of Board IDs</td></tr>
	<tr class="row0 new"><td class="numeric">37</td><td>Get Resources IDs</td></tr>
	<tr class="row1 new"><td class="numeric">38</td><td>List Of Resources IDs</td></tr>
	<tr class="row0 new"><td class="numeric">39</td><td>Get Player Data</td></tr>
	<tr class="row0 new"><td class="numeric">41</td><td>Get Category</td></tr>
	<tr class="row1 new"><td class="numeric">42</td><td>Category</td></tr>
	<tr class="row0 new"><td class="numeric">43</td><td>Add Category</td></tr>
	<tr class="row1 new"><td class="numeric">44</td><td>Remove Category</td></tr>
	<tr class="row0 new"><td class="numeric">45</td><td>Get Category IDs</td></tr>
	<tr class="row1 new"><td class="numeric">46</td><td>List Of Category IDs</td></tr>
	<tr class="row0 new"><td class="numeric">47</td><td>Get Design</td></tr>
	<tr class="row1 new"><td class="numeric">48</td><td>Design</td></tr>
	<tr class="row0 new"><td class="numeric">49</td><td>Add Design</td></tr>
	<tr class="row1 new"><td class="numeric">50</td><td>Modify Design</td></tr>
	<tr class="row0 new"><td class="numeric">51</td><td>Remove Design</td></tr>
	<tr class="row1 new"><td class="numeric">52</td><td>Get Design IDs</td></tr>
	<tr class="row0 new"><td class="numeric">53</td><td>List Of Design IDs</td></tr>
	<tr class="row1 new"><td class="numeric">54</td><td>Get Component</td></tr>
	<tr class="row0 new"><td class="numeric">55</td><td>Component</td></tr>
	<tr class="row1 new"><td class="numeric">56</td><td>Get Component IDs</td></tr>
	<tr class="row0 new"><td class="numeric">57</td><td>List Of Component IDs</td></tr>
	<tr class="row1 new"><td class="numeric">58</td><td>Get Property</td></tr>
	<tr class="row0 new"><td class="numeric">59</td><td>Property</td></tr>
	<tr class="row1 new"><td class="numeric">60</td><td>Get Property IDs</td></tr>
	<tr class="row0 new"><td class="numeric">61</td><td>List Of Property IDs</td></tr>
	<tr class="row1 new"><td class="numeric">62</td><td>Account Create</td></tr>
</table>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Protocol "Filter" Negotiation</h2>
<p>
Filter negotiation will be performed in the following way.

<ul>
  <li>Extra Id's will be added to the features frame to add different
filters.</li>
  <li>The client will choose which filters are used.</li>
  <li>Server has "right of refusal".</li>
  <li>Filter negotiation can not be pipelined.</li>
  <li>New "Set Filters" frame will be created.</li>
</ul>
</p><p>
An example session would be as follows,

<pre>
Client  -- connect -----&gt;  Server
        &lt;- okay ---------
        -- get features &gt;
        &lt;-- features ----
        -- set filters -&gt;
        &lt;-- okay --------
 --- filters are activated here ---
</pre>
</p><p>
If SSL filter is used it should always be the outer most filter.
</p>

<h2>EOT Notification</h2>
<p>
A new frame will be added to allow clients to request that a turn be ended. The
Time Remaining frame will had a new field added which explains why this Time
Remaining frame was sent.
</p><p>
This should allow the following cases,
<ul>
	<li>EOT when everyone finished.</li>
	<li>EOT at timeout.</li>
	<li>EOT after short timeout when majority finished.</li>
</ul>
For example, say 6 players are playing. After 4 players submit "Finished"
frames, the other players get a "Time Remaining frame" with, say, 2 minutes left
and an ID which says "All other players finished".
</p>

<h2>Media</h2>
<p>
The Game frame will be extended to have a "base media" URL. All other media URL
that are sent will be relative to this URL. 
</p><p>
Each media server will provide a "media.gz" which includes a file listing as
follows
<pre>
&lt;filename&gt; &lt;size&gt; &lt;last modtime&gt; &lt;checksum&gt;
</pre>
URLs will not specify the file type. It is up to the client to choose the file
type. (For example PNG, MNG, etc)
</p>

<h2>Difference support</h2>
<p>
The Get ID's frames will have a "from" field added. This is a SInt64 which is
the timestamp to get changes from. If it is -1 then it should be all objects.
</p><p>
It is important to note that the Get ID's frame when called with a valid time
stamp, the server should send ID's for objects which may have been destroyed or
no longer exist.
</p>

<h2>Frame type Versioning</h2>
<p>
The TP03 header will be changed to a "TP&lt;major byte&gt;&lt;minor byte&gt;".
The major byte is the version of the protocol (for example 1, 2, 3, 4).
</p><p>
Minor byte is the minor revision of the frame. As new versions of frames are
added the minor byte will be incremented. (They all start at zero.)
</p><p>
A frame will not change in an non-backwards compatible way within a major
protocol.
</p><p>
The major byte can be 3, for tp03 with frame type versioning and header and all
minor bytes are 0. tp04 with major 4 and minor 0 is the same as tp03 with new
header.
</p>

<h2>Object Parametrisation/Last seen</h2>
<p>
It was decided that Last seen ended up to not be needed on anything except
objects. The new Object parametrisation (as describe in other emails) includes
support for Last Seen.
</p><p>
One important property is the Order Queue.  Order Queue's will have their own ID
which the Order frames will now refer to (instead of using Object ID's). For
this to be backwards compatible the default order queue will always have the
same ID as the Object ID.
</p><p>
Properties will be grouped.
</p>

<h2>History Support</h2>
<p>
History support will wait till tp05.
</p><p>
But should be stored server side in preparation for tp05.
</p>

<h2>Settable information</h2>
<p>
Object settable information will be done by sending the full object to be
consistent with other things such as Designs and Orders. The object
parametrisation will describe if fields are user modifiable.
</p>

<h2>Virtual Hosting/Game Frames</h2>
<p>
A new "Get Games" frame will exist. This will return the same frames which the
metaserver currently returns.
</p><p>
Virtual Hosting support will use the current @ system. Servers which only
support one game should ignore everything after the first @.
</p>

<h2>Async Frames</h2>
<p>
If something changes on the server is can send a frame at any time saying so.
This is mainly used when a creating a Design might add a new component. (For
example, creating a new Torpedo design would create a new Torpedo component.)
</p><p>
Currently only components are on this list (other than the time remaining
frames). Once research/technology is implemented, there could be others.  I
would rather have a set list.
</p>

<h2>Research / Technology Frames</h2>
<p>
A new frame will be added which describes things which can be researched. The
standard get ids, etc frames will be added for these objects. This frame will
have at least the following,
<ul>
	<li>Name</li>
	<li>Description</li>
	<li>Generic Reference System List of things which this technology
brings</li>
</ul>
Each technology which describe which technology it depends on and which
technology is an anti-dependency. How these dependencies are described is yet to
be figured out.
</p>


<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Object property</h2>

<h4>Locational Properties</h4>
<p>
These are properties which describe where an object is on a starmap (and where
they are going). Things like wormholes could have multiple positions.
</p>

<h4>Descriptional Properties</h4>
<p>
These are properties which are for the players information when making
decisions. As far as the client is concerned they don't have any effect on the
game. These would include things like "Name", "Description", etc.
</p>

<h4>Habitation Properties</h4>
<p>
These are properties which describe if a race can survive at an object. Things
like temperature, atmosphere, etc. They are most likely to be found on planets. 
</p><p>
Many of these descriptional properties can be edited (like changing a name)
without affected the game at all. It might be nice to be able to edit them
without sending the whole object.
</p>

<h4>Resource Properties</h4>
<p>
These describe what is available to be used/mined/etc at a location.  Found
generally on planets, asteroid fields, 
</p>

<h4>Goodness Properties</h4>
<p>
These describe how good X is at doing something. For example production
capability or population size.
</p>

<h4>Order Queues</h4>
<p>
Currently we only have one order queue. There is no real reason an object
couldn't have multiple order queue's. 
</p><p>
This could be used for where you want a separate "Build Queue" to an "Action
Queue". It could also be used on ships where you have an "Battle Queue" which
specifies what the fleet should do in battle (IE Attack hard for X turns, run
away).
</p><p>
Another option would be a "Default Order Queue". IE If you wanted new fleets to
have a "move to x", "remote mine" default order queue.
</p><p>
I think the client should handling "Order Queue"s which only have one type of
order specially. 
</p><p>
Maybe order queues could also have a possible "limit" on the number of orders
can be put in them.
</p><p>
I was thinking per planet. IE A planet could have the following order queues (on
one particular server).
</p><p>
<ol>
 <li>Build Queue    - Things to build, Order Types (Build Fleet, Build
Infrastructure, Nop)</li>
 <li>Priority Queue - What the planet should concentrate on, (Nop, Research,
Production, Defence)</li>
 <li>New Fleet Queue - What orders are given to a new fleet (Any order valid to
a fleet this planet can build - IE Move, Remote Mine, Create Minefield, Merge
Fleet.)</li>
</ol>
</p><p>
We could also have a "hidden" object which could has queues to be use for planet
defaults or something.
</p><p>
Each queue specifies (on each object) which type of order is allowed in
that queue. (Rather then the current per object order types.)
</p><p>
Maybe order queues could also have a possible "limit" on the number of orders
can be put in them.
</p><p> 
Not hard to do either. Although most of the time, the limit will be one of these
things:
<ul> 
	<li>- the human player's patience entering the orders</li>
	<li>- the resources at the object (fuel, supplies (endurance), or other
normal resources)</li>
	<li> - boredom</li>
</ul>
</p>

<h3>Property types</h3>
<p>Properties also have a general type,
<ul>
  <li>Text Property - Just a string, HTML or some other Formatted String,
etc.</li>
  <li>Integer Property - Just a plan number.</li>
  <li>Range Property - Some type of range, for example the bars in Stars!
habitability.</li>
  <li>Gauge Property - Some type of thing which fills up, like the fuel bars or
the cargo bar in Stars!</li>
  <li>Reference Property - Refers to something else (for example a player, a
design, etc)</li>
  <li>List Property - Lists a bunch of other properties (IE Resources would be a
list of reference properties?)</li>
  <li>Choice Property - Can make a choice of something.</li>
  <li>Graph Property - Some type of graph, with the location where the current
value is and where it is heading. This could be used for production capability
(which is likely to be non-linear).</li>
</ul>

<pre>
I was thinking a cut back version of the current common attributes.

  * a UInt32, object ID
      * a UInt32, object type
      * a String, name of object
      * a String, description of the object
      * a list of UInt32, object IDs of objects contained in the current
        object 
      * a UInt64, the last modified time
      * x by UInt32 of padding, for future expansion of common
        attributes 
      * 
      * extra data, as defined by each object description
</pre>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Fail_Desc">
</a><h3>Fail Frame</h3>
<p>
	A fail frame consists of:
	<ul>
		<li>a Int32, error code</li>
		<li>a String, message of the error</li>
	</ul>
	Current error codes consist of:
	<ul>
		<li>0 - Protocol Error, Something went wrong with the protocol</li>
		<li>1 - Frame Error, One of the frames sent was bad</li>
		<li>2 - Unavailable Permanently, This operation is unavailable</li>
		<li>3 - Unavailable Temporarily, This operation is unavailable at this moment</li>
		<li>4 - No such thing, The object/order/message does not exist</li>
		<li class="new">5 - Permission Denied, You don't have permission to do this operation</li>
		<li>...</li>
	</ul>
	Exception: If the connect frame is not valid TP frame, this
	frame will not be returned, instead a plain text string will be sent saying that the wrong
	protocol has been used. A fail frame may be send if the wrong protocol version is detected.
	This does not affect clients as they should always get the connect frame right.
</p>


<a name="FeatureNegotiation"></a>
<h2>Feature Negotiation</h2>

<span class="new">
<a name="GetFeatures_Desc"></a>
<h3>Get Features Frame</h3>
<p>
	The Get Features frame has no data.
	Get the features this server supports. This frame can be sent before 
	Connect.
</p>
</span>

<span class="new">
<a name="Features_Desc"></a>
<h3>Features Frame</h3>
<p>
	The Features frame consists of:
	<ul>
		<li>a list of UInt32, list of available features</li>
	</ul>
</p><p>
	The feature codes that are currently available,
	<ul>
		<li>0x1 - Secure Connection available on this port</li>
		<li>0x2 - Secure Connection available on another port</li>
		<li>0x3 - HTTP Tunneling available on this port</li>
		<li>0x4 - HTTP Tunneling available on another port</li>
		<li>0x5 - Support Keep alive frames</li>
		<li>0x6 - Support server side property calculation</li>
		<li>0x3E8 - Account creation is allowed</li>
	</ul>
</p><p>
	Optimizations are features which allow the clients to take certain shortcuts.
	All optimization are highly optional. Optimizations have ids greater then 0xffff,
	<ul>
		<li>0x10000 - Sends Object ID Sequences in descending modified time order</li>
		<li>0x10001 - Sends Order Description ID Sequences in descending modified time order</li>
		<li>0x10002 - Sends Board ID Sequences in descending modified time order</li>
		<li>0x10003 - Sends Resource Description ID Sequences in descending modified time order</li>
		<li>0x10004 - Sends Category Description ID Sequences in descending modified time order</li>
		<li>0x10005 - Sends Design ID Sequences in descending modified time order</li>
		<li>0x10006 - Sends Component ID Sequences in descending modified time order</li>
		<li>0x10007 - Sends Property ID Sequences in descending modified time order</li>
	</ul>
</p>
</span>

<a name="Object_Desc"></a>
<h3>Object Frame</h3>
<p>
	An Object frame consist of:
	
	<ul>
		<li>a UInt32, object ID</li>
		<li>a UInt32, object type</li>
		<li>a String, name of object</li>
		<li>a UInt64, size of object (diameter)</li>
		<li>3 by Int64, position of object</li>
		<li>3 by Int64, velocity of object</li>
		<li>
			a list of UInt32, object IDs of objects contained in the current
			object
		</li>
		<li>
			a list of UInt32, order types that the player can send to this
			object
		</li>
		<li>a UInt32, number of orders currently on this object</li>
		<li class="new">a UInt64, the last modified time</li>
		<li>
			<span class="new">2</span> by UInt32 of padding, for future expansion of
			common attributes
		</li>
		<li>
			extra data, as defined by each object type
		</li>
	</ul>
</p><p class="inote">
	Note: The number of orders should be the number of orders the person can see on the
	object. Not the total number of orders on the object. 
</p>


<?php
	include "../bits/end_section.inc";
	include "../bits/end_page.inc";
?>
