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

<h2>Server Location (Meta) Protocol</h2>

<p>
There are two parts to server location. The first is finding servers on a local
network, for this ZeroConf is used. The second is finding servers on the
Internet, for this a <a
href="http://metaserver.thousandparsec.net/">metaserver</a> is used. The
protocol used in both situations is basically the same, the transport mechanism
is just a little different.
</p><p>
The unit of discovery is not "a server" as one might first think, rather it is
"a game". Each game has a set of "locations" which is can be found at.
</p><p>
"A game" is describe by the following properties
</p>
<h4>Required Parameters</h4>
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
<h4>Optional parameters</h4>
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
		<td>sn</td>
		<td>8</td>
		<td>short (computer) name of the sever</td>
	</tr><tr>
		<td>turn</td>
		<td>9</td>
		<td>the current turn the game is at</td>
	</tr><tr>
		<td>prd</td>
		<td>10</td>
		<td>the time between turns in seconds</td>
	</tr>
</table>

<h4>Location Parameters</h4>
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

<h2>Local LAN Discovery</h2>

<p>
Local LAN discovery is being done with ZeroConf MDNS. Each server should
advertise a record PER GAME (per location). The location details are
automatically discovered. The required and optional parameters should be found
in the TXT record.
</p><p>
The service name should be the "ln" parameter. The "sn" should then be sent as
an optional parameter.
</p>

<h2>Internet Discovery</h2>

<h3>Registration</h3>
<p>
There are two ways to register with a Metaserver. The primary Thousand Parsec
Metaserver can be found at <a
href="metaserver.thousandparsec.net">metaserver.thousandparsec.net</a>.
</p><p>
When registering with a metaserver you must also send a "key", if the game with
this name has never been seen before the "key" will be stored. The key must then
be sent for all updates for that game name to take effect.
</p><p>
The server should send a registration/update request at least once every 10
minutes. A server which hasn't send a request in the last 10 minutes will be
removed from the list of known servers. A server should send a
registration/update request no more then once every 5 minutes.
</p>

<h4>HTTP Registration</h4>
<p>
To register a new game you must send either a HTTP GET or POST request with the
require parameters. 
</p><p>
To encode locations in a game you append a number to the text fields, IE
<pre>
type0, dns0, ip0, port0 - details for first location
type1, dns1, ip1, port1 - details for second location
</pre>
</p><p>
An example (using get) would be the following,
<a href="http://metaserver.thousandparsec.net/?action=update&amp;tp=0.3,0.2&amp;key=mykey&amp;server=0.3.0&amp;name=MyGame1&amp;sertype=tpserver-cpp&amp;rule=MiniSec&amp;rulever=0.1&amp;type0=tp&amp;dns0=mithro.dyndns.org&amp;ip0=203.122.246.117&amp;port0=8000">url</a>
</p><p>
One request should be sent for each game. The HTTP Registration supports
HTTP/1.1 keep alive, so they can be sent in one connection.
</p><p>
On a protocol or other HTTP error, the metaserver will return a plain text
response with the appropriate error code. (IE 404 Not Found.)
</p><p>
Other errors should be returned using a tp04 Fail frame.
</p>

<h4>TCP Registration</h4>
<p>
To register a new game you must connect to the metaserver on port XXXX. There
you send a tp04 Sequence frame describing the number of games you are about to send.
You then send the tp04 Game frames.
</p>

<h4>UDP Registration</h4>
<p>
To register a new game you send a single UDP frame to the metaserver on port
XXXX. The UDP frame will contain a single tp04 Game frame.
</p>

<h3>Discovery</h3>

<h4>HTTP Discovery (Optional)</h4>
<p>
To get the details about which servers exist the client should send a HTTP Get
request to the metaserver.
</p><p>
An example of this is "http://metaserver.thousandparsec.net/?action=get".
</p>

<h4>TCP Discovery</h4>
<p>
To get the details about which games exist the client should connect to the
metaserver on port XXXX. It should then then send a Get Games frame.
</p>

<p>
The server will return in the body of the message a Sequence frame
telling the number of "Game" frames to come. Game frames are described
as follows,
</p><p>
<ul>
	<li> a string,           (name)     Game (short) name</li>
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
If SSL filter is used it should always be the outer most filter. There should
only be one compression filter in use.
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
The TP03 header will be changed to a "TP&lt;protocol version byte&gt;&lt; frame
version byte&gt;". The bytes are in binary not ASCII.
</p><p>
As new versions of frames are added the frame version byte will be incremented.
(They all start at zero for the first release of a major protocol version.) A
frame will not change in an non-backwards compatible way within a major
protocol.
</p><p>
Although this frame type versioning was only introduced in tp04 protocol. The
method can be used by tp03 clients with a protocol version byte set to 3 and 
frame version byte set to 0.
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
</p><p>
Thinking about it, we really only need two: Free space (3d) and "bound". In 
most cases, we don't need to specify where they are bound to.
</p><p>
So either the 3 int64 position, or a uint32 object id that the object is bound 
to.
</p>

<h4>Time properties</h4>
<p>
Describe which turn something has occured or when something will occur. In
turns.
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
	<li>New Fleet Queue - What orders are given to a new fleet (Any order valid
to a fleet this planet can build - IE Move, Remote Mine, Create Minefield, Merge
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
</ul>

<pre>
I was thinking a cut back version of the current common attributes.

  * a UInt32, object ID
      * a UInt32, object type
      * a String, name of object
      * a String, description of the object
      * a list of UInt32, object IDs of objects contained in the current object 
      * a UInt64, the last modified time
      * x by UInt32 of padding, for future expansion of common attributes 
      * 
      * extra data, as defined by each object description
</pre>

<h1>Common Stuff</h1>
<ul>
    <li>a UInt32, Object ID </li>
    <li>a UInt32, Object type </li>
    <li>a String, Name of object </li>
    <li>a String, Description of the object </li>
    <li>a list of UInt32, Object IDs of objects contained in the current object </li>
    <li>a UInt64, The last modified time </li>
    <li>x by UInt32 of padding, for future expansion of common attributes</li>
</ul>

<h1>Descriptions Stuff</h1>
<ul>
    <li>A List of
	<ul>
		<li>UInt32, Property Group ID</li>
		<li>A String, Object Property Group Name</li>
		<li>A String, Object Property Group Description</li>
		<li>A List of
		<ul>
			<li>UInt32, Object Property Type,</li>
			<li>List of UInt32, Object Property Categories</li>
			<li>A String, Object Property Name</li>
			<li>A String, Object Property Description</li>
			<li>?? UInt32, Number of bytes of &quot;extra&quot; details ??</li>
		</ul>
	</ul></li>
</ul>
<p>
Each object will have a list of properties groups (which are a list of
properties) they have.
</p><p>
The properties will be divided into groups so that multiple properties can be
put together, for example to have a property which describes a position 6 turns
ago you would have a Time Property and Position property in one group.
</p>

<h2>Property Types</h2>
<p>
Each property type has a two parts, arguments which are part of the description
and arguments which are different for each object. For example, a range would
have a possible maximum, possible minimum - which are part of the description,
and each instance of the object has it's own value.</p>

<h3>Positioning</h3>
<ul>
    <li>Position, Velocity or Acceleration
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>3 * Int64, Position of Object</li>
			<li>UInt64, Object ID this position is relative to</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>None</li>
		</ul></li>
	</ul></li>

    <li>Bound Position
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>Int32, Object Slot Position </li>
			<li>UInt64, Object ID that this Object is bound too </li>
		</ul></li>
		<li><b>On the Object Description</b>
		<ul>
			<li>None</li>
		</ul></li>
	</ul></li>

</ul>

<h3>Telling things what to do?</h3>
<ul>
    <li>&quot;Order Queue&quot;
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>UInt32, Queue ID</li>
			<li>UInt32, Current number of orders on this object</li>
			<li>List of UInt32, Order Type (Description) ID's which are valid in
this queue</li> 
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>UInt32, Number of the slots the queue</li>
		</ul></li>
	</ul>
	<p>
	The "default" order queue (IE The most use queue) should have the same ID as
the object it is on. Other order queue's can have any ID but the ID should not
be the same as an object ID (as it would conflict with the information above).
How servers solve this problem is up to them.
	</p></li>
</ul>

<h3>Descriptional</h3>
<ul>
    <li>Reference
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>A reference as described by the Generic Reference System.</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>?Acceptable references?</li>
        </ul></li>
	</ul>

    <li>Time (Turn)
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>A UInt64, The Turn</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>None</li>
		</ul></li>
	</ul></li>

    <li>Time (Real)
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>A UInt64, A Unix timestamp in UTC</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>None</li>
		</ul></li>
	</ul></li>

    <li>Enumeration (Argument)
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>UInt32, the actual choice</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>A list of Strings, the text value of the enumeration value</li>
		</ul></li>
	</ul></li>

    <li>Graph
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>UInt32, the value on the graph</li>
			<li>UInt32, the current &quot;heading&quot; of the value of the graph</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>Enumeration, the Type of the X axis 
			<ol>
				<li>Linear </li>
				<li>Logarithmic Base 2 </li>
				<li>Logarithmic Base 8 </li>
				<li>Logarithmic Base 10 </li>
				<li>dB (10*log(x^2)) </li>
				<li>??? </li>
			</ol></li>
			<li>A String, the X axis label</li>
			<li>Enumeration, the Type of the Y axis (same as above)</li>
			<li>A String, the Y axis label</li>
			<li>a List of (which are the points on the graph)
			<ul>
				<li>UInt32, The X value</li>
				<li>UInt32, The Y value</li>
			</ul></li>
		</ul></li>
	</ul></li>

    <li>Range
	<ul>
		<li><b>On the Object</b>
		<ul>
			<li>Int64, the value</li>
			<li>Int64, the current &quot;heading&quot; of the value of the
range</li>
		</ul></li>

		<li><b>On the Object Description</b>
		<ul>
			<li>Int64, Smallest possible value</li>
			<li>Int64, Largest possible value</li>
			<li>Int32, Smallest Delta (IE Step Size)</li> 
			<li>Enumeration, a transform type for the value
			<ol>
				<li>Linear </li>
				<li>Logarithmic Base 2 </li>
				<li>Logarithmic Base 8 </li>
				<li>Logarithmic Base 10 </li>
				<li>dB (10*log(x^2)) </li>
				<li>??? </li>
			</ol></li>
		</ul></li>
	</ul></li>

	
	<li>String</li>
	<li>Settable String</li>
</ul>

<p>
Examples:
<pre>

Planet Description
 0, "Where", "Position and heading of the Planet"
	- POSITION, [], "Position", "Current Position of the Planet"
	- VELOCITY, [], "Velocity", "Current Velocity of the Planet"
	- ACCELERATION, [], "Acceleration", "Current Acceleration of the Planet"

 1, "Resources", "Resources available on the Planet",
	- LIST
		- GRS, [], "Resource", "The Resource"
		- INTEGER, [], "Surface", "Amount of the resource on surface"
		- INTEGER, [], "Minable", "Amount of the resource which can be mined"
		- INTEGER, [], "Availiable", "Amount of the resource which might be mined given better technology"
	- TURNS, "Age", "Age of this information"

 2, "Owner", "Person who owns the Planet",
	- GRS, [], "Player", "Player who owns the planet"
	- TURNS, "Age", "Age of this information"

 3, "Production", "Current production capabilities of the planet."
	- GRAPH, [], "Workers", "The number of workers in factories", 
		Linear, "Workers", 
		Linear, "Production Points per Factory", 
		[[0,0], [10,5], [20, 7], [30, 8], [40, 9], [50, 10]]
	- INTEGER, [], "Factories", "Number of factories on this planet",  
	- INTEGER, [], "Production Points", "Number of production points this planet produces each turn",
	- TURNS, "Age", "Age of this information"
</pre>

<p>A few actual planets,</p>
<pre>

0, PlanetType, "Tim's Planet", "Tim's magnificent planet!", [], 11:45am 2006-07-10, 

	- 10000, 10000, 10000, 0, 0, 0, 0, 0, 0

	- 3 [
		- GRS(Resource, 100 - Kryptonite), 100, 400000, 0
		- GRS(Resource, 56 - Uranium), 10, 1000000, 770000
	], 0

	- GRS(Player, 100 - Tim), 0

	- 3, 5,   12, 12,  39, 41
</pre>
<p>
The first line is the stuff for Group 0 (Where) - It says this object was seen
last turn at 10000, 10000, 10000 going nowhere.  

The second line is the stuff for Group 1 (Resources) - It says that there
is 100 units of Kryptonite on the surface, while only 10 units of Uranium on
the surface. There is also 400,000 units of minable Kryptonite and 1 million
units of minable uranium. Lastly there is no more kryptonite I might be able to
access but there are 770,000 units of uranium which might be accessible.

The third line is the stuff for Group 2 (Owner) - It says that I own the planet.

The four line is the stuff for Group 3 (Production) - It says that I'm
currently have 3 "Workers", producing 6 points of production per factory.
Things are also going well, in the fact that it will soon be 5 workers giving
10 production points per factory. It is also saying that there are 12
factories, but I'm not in line to produce any more. I'm also producing 39
production points a turn (and it soon will be 41). (3*12 != 39 - Maybe I'm
getting a bonus production points?).

It would probably be displayed in the client like the following,
<table>
	<tr>
		<th colspan='4' style='text-align: left'>[+] Where</th>
	</tr><tr>
		<td>&nbsp;</td><td>Position</td><td>1000, 1000, 1000</td><td>[GOTO]</td>
	</tr><tr>
		<td>&nbsp;</td><td>Velocity</td><td>0, 0, 0</td><td></td>
	</tr><tr>
		<td>&nbsp;</td><td>Acceleration</td><td>0, 0, 0</td><td></td>
	</tr><tr>
		<th colspan='4' style='text-align: left'>[+] Resources</th>
	</tr><tr>
		<td>&nbsp;</td><td>Kryptonite</td><td>Surface: 0, Minable: 400,000, Other: 0</td><td></td>
	</tr><tr>
		<td>&nbsp;</td><td>Uranium</td><td>Surface: 0, Minable: 1,000,000, Other: 770,000</td><td></td>
	</tr><tr>
		<th colspan='4' style='text-align: left'>[+] Owner</th>
	</tr><tr>
		<td>&nbsp;</td><td>Player</td><td>Tim Ansell</td><td>[MESSAGE]</td>
	</tr><tr>
		<th colspan='4' style='text-align: left'>[+] Production</th>
	</tr><tr>
		<td>&nbsp;</td><td>Workers</td><td><img src="protocol4-graph.png"></td><td></td>
	</tr><tr>
		<td>&nbsp;</td><td>Factories</td><td>12</td><td></td>
	</tr><tr>
		<td>&nbsp;</td><td>Production Points</td><td>39</td><td></td>

</table>		
	

</pre>

</p>

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
		<li>List of GRS, Describes what the error message refers to</li>
	</ul>
	Current error codes consist of:
	<ul>

		<li>0 - Protocol Error, Something went wrong with the protocol
<p>
This error it means that your frame header has something which wasn't valid.
Specific errors include,
<ul>
	<li>Something or rather</li>
</ul>
</p><p>
This error is a fatal error and the server can hang up after this error.
</p></li>

		<li>1 - Frame Error, One of the frames sent was bad
<p>
This means that the frame header and data was okay, but something else about
the frame was invalid.  
</p></li>

		<li>2 - Unavailable Permanently, This operation is unavailable
<p>
This error means that a request you sent doesn't work on this server (and will
not work). An example would be a server which doesn't support Designs.
</p></li>

		<li>3 - Unavailable Temporarily, This operation is unavailable at this
moment (IE The server is currently overloaded)
<p>
This operation has been temporarily disabled. This means that the server may be
overloaded and can't service this request at the moment.
</p></li>

		<li>4 - No such thing, The object/order/message does not exist.
<p>
This object does not exist (and probably never will exist). This is useful for
returning when the client asked for something silly in regards to your 
server (IE Maybe your server can only have IDs from 100-400, and the client
asks for ID 401 - probably a stupid example).  
</p></li>

		<li>5 - Permission Denied, You don't have permission to do this
operation 
<p>
This means you are trying to access an admin only functionality. (Or other
functionality that is server, not game, restricted).
</p></li>

		<li class="new">6 - Permission Denied, You don't have permission to
access this object/order/message 
<p>
The object you are trying to access (and can see), you don't have permission to
get this type of detail about. Servers should NOT return this error on
objects/order/messages that the player can't see.
</p></li>

		<li class="new">7 - Gone Permanently, The object/order/message has been
destroyed or similar 
<p>
An object has been removed and will never be seen again.
</p></li>

		<li class="new">8 - Gone Temporarily, The object/order/message has been
obscured from your view 
<p>
An object can no longer be seen. It may be seen again some time in the future.
</p></li>


		<li class="new">9 - Version not Supported, The server doesn't support
that version of the packet 
<p>
You have sent a packet with a version number that the server doesn't support.
This will only occur when there is a protocol version mismatch. As frame 
versions are backwards compatible there should not be a failure.
</p></li>

		<li class="new">10 - ???</li>
		<li class="new">11 - ???</li>
		<li class="new">12 - ???</li>
	</ul>
</p><p>
Exception: If the connect frame is not valid TP frame, this frame will not be
returned, instead a plain text string will be sent saying that the wrong
protocol has been used. A fail frame may be send if the wrong protocol version
is detected.  This does not affect clients as they should always get the
connect frame right.
</p><p class="note">
The server needs to be careful that it doesn't disclose extra information by
returning different fail codes.
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
