<?php
	$title = "Protocol Definition Ver 0.3";
	include "../bits/start_page.inc";
	include "../bits/start_section.inc";
?>

<style type="text/css">
<!--
.new { color: #00FF00; }
.fixme { color: #FF0000; }
-->
</style>

<h1>Protocol Definition for Thousand Parsec</h1>
<h3>Version 0.3 (Draft)</h3>

<h2>WARNING: This document is under development, the current protocol is still version 0.2</h2>

<p>Last updated 10 February 2005.</p>

<p>
	This protocol definition is for the Thousand Parsec project. It
	is designed as a simple, easy to implement protocol. It is designed by
	Lee Begg and Tim Ansell and any questions should be directed at these 
	two or the tp-devel mailing list.
</p>

<p>
	This version of the protocol extends the <a href="protocol2.php">previous
	version (0.2)</a>. It should be completely backwards compatible with the previous
	version. It extends the protocol to include the following abilities
	
	<ul>
		<li>SSL support</li>
		<li>HTTP tunnel support</li>
		<li>server-client negotiation of features</li>
		<li>better support of offline operations</li>
		<li>Unicode support</li>
		<li>modify on-server designs</li>
		<li>download extra data (such as battle data or media)</li>
	</ul>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Key</h2>
<p>
	In this document a
</p>
<ul>
	<li>8 bit integer is shown as &gt;n&lt;</li>
	<li>32 bit integer is shown as &lt;n&gt;</li>
	<li>64 bit integer as &lt;&lt;n&gt;&gt;</li>
	<li>A list is shown as &lt;length&gt;[item1, item2]</li>
	<li><pre>Unicode text is shown as preformatted text</pre></li>
	<li><pre><i>Binary data is shown as preformatted italics</i></pre></li>
	<li><span class="new">New features of this document are marked like this</span></li>
</ul>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Basics</h2>
<p>
	TP will use, TCP port 6923 for unencrypted access <span class="new">and TCP port 6924 for encrypted
	access. The server can also be run on port 80 for unencrypted access and 443 for
	encrypted access.</span>
</p>
<ul>
	<li>
		All integers are in Network Byte Order (Big Endian).
	</li><li>
		Strings will be prefixed by the 32 bit integer number of bytes the string takes
		up. <span class="new">All strings will be transmitted in UTF-8.</span>
		<p><span class="new">
		Previously all strings had to be terminate by a null character, this is no 
		longer necessary. It is recommend that the null terminator is no longer
		transmitted.
		</span></p>
	</li><li>
		<span class="fixme">FIXME: This is not correct, we have lists which are a set of 3
		integers or a set of an integer and string.</span>
		A list will be of only a one type (IE Int32 or String) and be prefixed by an
		Int32 for the number of items in the list.
	</li><li class="new">
		Semi-signed Integers are integers which act like normal unsigned numbers except
		that the biggest possible number is considered -1, this should equal the normal
		signed representation for this number. These are noted as SInt&lt;Size&gt;.
	</li><li class="new">
		All times are in 64 bit Unix time stamp format in the timezone of UTC (with no 
		daylight savings).
	</li>
</ul>
<p class="new">
	A client can connect to a TP server on the standard 6923 port and use the new
	negotiation frames to find out if the server supports tunneling or encrypted
	access (and other optional features). The client is not required to do this however.
</p>

<span class="new">
<h2>Encrypted Access (Optional)</h2>
<p>
	TP uses standard SSL for encrypted access to the server, no special extensions have been 
	added and client certificates are not used.
</p><p>
	This can easily be implemented on the server side by using the stunnel (http://www.stunnel.org/) 
	program in front of a normal unencrypted TP server.
</p><p>
	On the client side SSL support will need to be added, the recommend way is to use 
	library such as OpenSSL which will handle all the details for you.
</p>
</span>

<span class="new">
<h2>HTTPS Tunneling (Optional)</h2>
<p>
	No features need to be added to the server (apart from SSL support) to support
	HTTPS server. For full details on what needs to be implemented in the client
	to support HTTPS tunneling please see 
	<a href="http://www.web-cache.com/Writings/Internet-Drafts/draft-luotonen-web-proxy-tunneling-01.txt">
		http://www.web-cache.com/Writings/Internet-Drafts/draft-luotonen-web-proxy-tunneling-01.txt
	</a>
</p>
</span>

<span class="new">
<h2>HTTP Tunneling (Optional)</h2>
<p>
	To support HTTP tunneling additions need to be added to both the client and server.
	These changes are minimal however and only effect the connection setup.
</p><p>
	On a connection, if the server finds a valid TP Connect frame then a normal connection occurs.
	Otherwise the server should wait until a valid POST request. The server should then
	respond with the correct HTTP headers to cause the proxy to not cache the connection and
	then continue with a normal TP connection.
</p></p>
	The client should connect to the server as if POSTing to a standard web page with a 
	random 12 digit ASCII numeric URL (for example /1a49fJKL12aU). It is important that the
	URL requested is random to stop broken proxy servers from caching the connection.
	Once the POST connection has been established a normal TP connection follows.
</p><p>
	An example implementation of this can be found in py-netlib.
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>TP Frame format</h2>
<p>
	A TP Frame has the following parts:

<table border="1">
	<tr>
		<td><b>Fields</b></td>
		<td>Header</td>
		<td>Sequence Number</td>
		<td>Type</td>
		<td>Length</td>
		<td>Data Frame</td>
	</tr><tr>
		<td><b>Sizes</b></td>
		<td>32 bits</td>
		<td>32 bits</td>
		<td>32 bits</td>
		<td>32 bits</td>
		<td>length * 8 bits</td>
	</tr><tr>
		<td><b>Type</b></td>
		<td>4 * Char</td>
		<td>UInt32</td>
		<td>UInt32</td>
		<td>UInt32</td>
		<td>data</td>
	</tr><tr>
		<td><b>Description and notes</b></td>
		<td>Always has value "TP02" ("TP" plus version number), no null terminator.</td>
		<td>
			An incrementing number "sequence number". The sequence number
			should always be one more then the previous frames sequence number.
		</td>
		<td>Type of data, see table below</td>
		<td>Length of data in bytes</td>
		<td>The data</td>
	</tr><tr>
		<td><b>Example</b></td>
		<td>TP02</td>
		<td>2345</td>
		<td>2</td>
		<td>21</td>
		<td>&lt;5&gt;blah\0&lt;6&gt;blah2\0</td>
	</tr>
</table>
</p><p>
	The Client may start with any positive (it's an unsigned number) sequence number except 
	zero (0). Server replies have sequence numbers that are the same as the sequence
	number on the operation they are a response to. If the server sends a frame that is not
	a response, the frames sequence number will be zero (0).
</p><p class="fixme">
	FIXME: This number seems a bit large now that we are no longer moving large data via the TP protocol
	but via HTTP or similar?
</p><p class="new">
	No frame may be bigger then <b>1048576</b> bytes (1 megabytes) long.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Types</h2>
<p>
	There are a number of types that can be put in types field of the
	frame. There is no meaning in odd/even distinction in this version.
	The types are listed below:
</p><p>
<table border="1">
	<tr>
		<td><b>Value</b></td>
		<td><b>Name</b></td>
		<td><b>Description</b></td>
		<td><b>Base</b></td>
	</tr>
	
	<tr>
		<td colspan="4" align="center"><b>Generic Responses</b></td>
	</tr><tr>
		<td colspan="4" align="center">These responses are the most common and generic that should be the first to be implemented.</td>
	</tr><tr>
		<td>0</td>
		<td>Ok</td>
		<td>Ok, continue or passed</td>
		<td></td>
	</tr><tr>
		<td>1</td>
		<td>Fail</td>
		<td>Failed, stop or impossible</td>
		<td></td>
	</tr><tr>
		<td>2</td>
		<td>Sequence</td>
		<td>Multiple frames will follow</td>
		<td></td>
	</tr>

	<tr class="new">
		<td colspan="4" align="center"><b>Base Packets</b></td>
	</tr><tr class="new">
		<td colspan="4" align="center">These packets don't really exist but are the common parts of other packets.</td>
	</tr><tr class="new">
		<td>-</td>
		<td>Get with ID</td>
		<td>Gets things using ids (Objects, Boards)</td>
		<td></td>
	</tr><tr class="new">
		<td>-</td>
		<td>Get with ID and Slots</td>
		<td>Gets things on a thing using slots (Orders, Messages)</td>
		<td></td>
	</tr><tr class="new">
		<td>-</td>
		<td>Get ID Sequence</td>
		<td>Gets a sequence of IDs</td>
		<td></td>
	</tr><tr class="new">
		<td>-</td>
		<td>ID Sequence</td>
		<td>A sequence of IDs and their last modified times</td>
		<td></td>
	</tr>
	
	<tr>
		<td colspan="4" align="center"><b>Connecting</b></td>
	</tr><tr>
		<td colspan="4" align="center">These frames are used for setting up the connection to a server.</td>
	</tr><tr>
		<td>3</td>
		<td>Connect</td>
		<td>Can I connect?</td>
		<td></td>
	</tr><tr>
		<td>4</td>
		<td>Login</td>
		<td>Login with username/password</td>
		<td></td>
	</tr><tr class="new">
		<td>24</td>
		<td>Redirect</td>
		<td>Redirects a client to a different server.</td>
		<td></td>
	</tr>

	<tr class="new">
		<td colspan="4" align="center"><b>Feature Negotiation</b></td>
	</tr><tr class="new">
		<td colspan="4" align="center">These frames are used for negotiation which features to use.</td>
	</tr><tr class="new">
		<td>25</td>
		<td>Get Features</td>
		<td>Get the features available on this server.</td>
		<td></td>
	</tr><tr class="new">
		<td>26</td>
		<td>Available Features</td>
		<td>The features available on this server.</td>
		<td></td>
	</tr>
	
	<tr class="new">
		<td colspan="4" align="center"><b>Keep alive (Optional)</b></td>
	</tr><tr class="new">
		<td colspan="4" align="center">
			These frames are used to keep a connection alive, these are often needed when using the
			tunneling connections. (Some broken NAT implementations also need this to keep open long
			running, low bandwidth connections.) These frames only required to be implemented if HTTP 
			or HTTPS tunneling is supported.
		</td>
	</tr><tr class="new">
		<td>27</td>
		<td>Ping</td>
		<td>Get the server to respond with a OK request.</td>
		<td></td>
	</tr>
	
	<tr>
		<td colspan="4" align="center"><b>Objects</b></td>
	</tr><tr>
		<td colspan="4" align="center">These frames are used for getting objects.</td>
	</tr><tr>
		<td>5</td>
		<td>Get Objects by ID</td>
		<td>Returns object with the given IDs.</td>
		<td>Get with ID</td>
	</tr><tr>
		<td>7</td>
		<td>Object</td>
		<td>Description of an Object</td>
		<td></td>
	</tr><tr class="new">
		<td>28</td>
		<td>Get Object IDs</td>
		<td></td>
		<td>Get ID Sequence</td>
	</tr><tr class="new">
		<td>29</td>
		<td>Get Object IDs by Position</td>
		<td>Returns the IDs which are within a sphere.</td>
		<td></td>
	</tr><tr class="new">
		<td>30</td>
		<td>Get Object IDs by Container</td>
		<td>Returns the Object IDs which are within an Object.</td>
		<td></td>
	</tr><tr class="new">
		<td>31</td>
		<td>List of Object IDs</td>
		<td>Gets a sequence of IDs.</td>
		<td>ID Sequence</td>
	</tr>
	
	<tr>
		<td colspan="4" align="center"><b>Orders</b></td>
	</tr><tr>
		<td colspan="4" align="center">These frames are used for manipulating orders.</td>
	</tr><tr>
		<td>8</td>
		<td>Get Order Description</td>
		<td>Returns a description of an order type</td>
		<td>Get with ID</td>
	</tr><tr>
		<td>9</td>
		<td>Order Description</td>
		<td>Describes an order type and it's parameters</td>
		<td></td>
	</tr><tr class="new">
		<td>32</td>
		<td>Get Order Description IDs</td>
		<td></td>
		<td>Get ID Sequence</td>
	</tr><tr class="new">
		<td>33</td>
		<td>List of Order Description IDs</td>
		<td>Gets a sequence of IDs.</td>
		<td>ID Sequence</td>
		
	</tr><tr>
		<td>10</td>
		<td>Get Order</td>
		<td>Returns a description of an order</td>
		<td>Get with ID and Slots</td>
	</tr><tr>
		<td>11</td>
		<td>Order</td>
		<td>Description of an order</td>
		<td></td>
	</tr><tr>
		<td>12</td>
		<td>Insert Order</td>
		<td>Insert order on object before slot</td>
		<td></td>
	</tr><tr>
		<td>13</td>
		<td>Remove Order</td>
		<td>Remove an order from a slot of an object</td>
		<td>Get with ID and Slots</td>
	</tr><tr class="new">
		<td>34</td>
		<td>Probe Order</td>
		<td>Returns an order object which would be created if this was an Insert order</td>
		<td></td>
	</tr>

	<tr>
		<td colspan="4" align="center"><b>Time</b></td>
	</tr><tr>
		<td colspan="4" align="center">These frames are used to find out when the next turn will occur.</td>
	</tr><tr>
		<td>14</td>
		<td>Get Time remaining</td>
		<td>Get the amount of time before the end of turn</td>
		<td></td>
	</tr><tr>
		<td>15</td>
		<td>Time remaining</td>
		<td>The amount of time before the end of turn</td>
		<td></td>
	</tr>

	<tr>
		<td colspan="4" align="center"><b>Messages</b></td>
	</tr><tr>
		<td colspan="4" align="center">
			These frames are used to manipulate the in game message boards. Each person has a
			message board and there are some shared message boards.
		</td>
	</tr><tr>
		<td>16</td>
		<td>Get Boards</td>
		<td>Get message boards the player can see.</td>
		<td>Get with ID</td>
	</tr><tr>
		<td>17</td>
		<td>Board</td>
		<td>A Message.</td>
		<td></td>

	</tr><tr class="new">
		<td>35</td>
		<td>Get Board IDs</td>
		<td>Gets a list of board ids that the player can see.</span></td>
		<td>Get ID Sequence</td>
	</tr><tr class="new">
		<td>36</td>
		<td>List Of Board IDs</td>
		<td>The list of board ids the player can see.</td>
		<td>ID Sequence</td>

	</tr><tr>
		<td>18</td>
		<td>Get Message</td>
		<td>Get a Message from a board.</td>
		<td>Get with ID and Slots</td>
	</tr><tr>
		<td>19</td>
		<td>Message</td>
		<td>A Message.</td>
		<td></td>
	</tr><tr>
		<td>20</td>
		<td>Post Message</td>
		<td>Post a message to a board.</td>
		<td></td>
	</tr><tr>
		<td>21</td>
		<td>Remove Message</td>
		<td>Remove a message from a board.</td>
		<td>Get with ID and Slots</td>
	</tr>

	<tr>
		<td colspan="4" align="center"><b>Resources</b></td>
	</tr><tr>
		<td colspan="4" align="center">These frames are used to get information about resources.</td>
	</tr><tr>
		<td>22</td>
		<td>Get Resource Description</td>
		<td>Returns a description of an resource type</td>
		<td>Get with ID</td>
	</tr><tr>
		<td>23</td>
		<td>Resource Description</td>
		<td>Describes a resource</td>
		<td></td>
		
	</tr><tr class="new">
		<td>37</td>
		<td>Get Resources IDs</td>
		<td>Gets a list of resource type ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="new">
		<td>38</td>
		<td>List Of Resources IDs</td>
		<td>A list of resource type ids.</td>
		<td>ID Sequence</td>
	</tr>

	<tr class="new">
		<td colspan="4" align="center"><b>Players</b></td>
	</tr><tr class="new">
		<td colspan="4" align="center">
			These frames are used to get information about other places/races.
		</td>
	</tr><tr class="new">
		<td>39</td>
		<td>Get Player Data</td>
		<td>Get the information about a player/race.</td>
		<td></td>
	</tr><tr class="new">
		<td>40</td>
		<td>Player Data</td>
		<td></td>
		<td></td>
	</tr>
	
	<tr class="new">
		<td colspan="4" align="center"><b>Design Manipulation</b></td>
	</tr><tr class="new">
		<td colspan="4" align="center">
		</td>
	</tr><tr class="new">
		<td>? - 41</td>
		<td>Get Category Description</td>
		<td>Returns a description of an category type</td>
		<td>Get with ID</td>
	</tr><tr class="new">
		<td>? - 42</td>
		<td>Category Description</td>
		<td>Describes a category</td>
		<td></td>

	</tr><tr class="new">
		<td>? - 43</td>
		<td>Get Category Description IDs</td>
		<td>Gets a list of category description ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="new">
		<td>? - 44</td>
		<td>List Of Category Description IDs</td>
		<td>A list of resource type ids.</td>
		<td>ID Sequence</td>
		
	</tr><tr class="new">
		<td>? - 45</td>
		<td>Get Component</td>
		<td>Gets the details about a component</td>
		<td>Get with ID</td>
	</tr><tr class="new">
		<td>? - 46</td>
		<td>Component</td>
		<td>Describes a component</td>
		<td></td>
	</tr><tr class="new">
		<td>? - 47</td>
		<td>Insert Component</td>
		<td>Creates a new component out of existing components</td>
		<td></td>
	</tr><tr class="new">
		<td>? - 48</td>
		<td>Remove Component</td>
		<td>Removes a component</td>
		<td>Get with ID</td>
	</tr>

</span>

</table>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Data Frame formats</h2>
<p>
	The different types have different formats for the Data Frame. Any Data
	Frame may have be extended at any time in a backward compatible manner.
	The program should just ignore any extra data in the Data Frame which
	it does not understand.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Generic Responses</h2>
<hr>

<h3>OK Frame</h3>
<p>
	The OK frame consists of:
	<ul>
		<li>a String, the string can be safely ignored - however it may 
			contain useful information for debugging purposes)</li>
	</ul>
</p>

<h3>Fail Frame</h3>
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

<h3>Sequence Frame</h3>
<p>
	Sequence frame consist of:
	<ul>
		<li>a UInt32, giving the number of frames to follow</li>
	</ul>
	This frame will proceed a response which requires numerous frames to be complete.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Base Frames</h2>
<hr>

<a name="GetWithID"></a><h3>Get with ID Frame</h3>
<p>
	A Get with ID frame consist of:
	<ul>
		<li>a list of UInt32, IDs of the things requested</li>
	</ul>
</p><p>
	This packet is used to get things using their IDs. Such things would be
	objects, message boards, etc.
</p>

<a name="GetWithIDandSlot"></a><h3>Get with ID and Slot Frame</h3>
<p>
	Get with ID and Slot frame consist of:
	<ul>
		<li>a UInt32, id of base thing</li>
		<li>a list of UInt32, slot numbers of contained things be requested</li>
</ul>
</p><p>
	This packet is used to get things which are in "slots" on a parent. Examples 
	would be orders (on objects), messages (on boards), etc.
</p><p>
	<b>Note:</b> If this is really a Remove frame then slot numbers should be in decrementing 
	value if you don't want strange things to happen. (IE 10, 4, 1)
</p>

<a name="GetIDSequence"></a><h3>Get ID Sequence</h3>
<p>
	Get ID Sequence frame consist of:
	<ul>
		<li>a SInt32, the sequence key</li>
		<li>a UInt32, the starting number in the sequence</li>
		<li>a UInt32, the number of IDs to get</li>
	</ul>
</p><p>
	Requirements:
	<ul>
		<li>To start a sequence, the key of -1 should be sent in the first request</li>
		<li>Subsequent requests in a sequence should use the key which is returned</li>
		<li>All requests must be continuous and ascending</li>
		<li>Only one sequence key can exist at any time, starting a new sequence causes the old one to be discarded</li>
		<li>Key persist for only as long as the connection remains and there are IDs left in the sequence</li>
	</ul>
	Other Information:
	<ul>
		<li>
			If a key becomes invalid because of some change on the server (IE the ID order changes because
			of modification by another client) a Fail packet will be returned
		</li><li>
			If the client for a key requests any of the following a Fail packet will be returned
			<ul>
				<li>a range has already had any part already given (IE no overlaps)</li>
				<li>a range specifies a range which starts below the ending (IE requesting from 6, 10 then 0 to 5)</li>
				<li>a range is bigger then the remaining IDs left (IE requesting 6 when only 4 remain)</li>
			</ul>
		</li>
	</ul>
</p><p>
	<b>Note:</b> All servers must follow all the requirements above even if the server could allow otherwise.
</p>

<a name="IDSequence"></a><h3>ID Sequence</h3>
<p>
	ID Sequence frame consist of:
	<ul>
		<li>a SInt32, the sequence key</li>
		<li>a SInt32, the number of IDs remaining</li>
		<li>a list of
			<ul>
				<li>a UInt32, the IDs</li>
				<li>a UInt64, the last modified time of this ID</li>
			</ul>
		</li>
	</ul>
</p><p>
	These IDs are not guaranteed to be in any order.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Connecting</h2>
<hr>

<span class="new">
<h3>Redirect Frame</h3>
<p>
	Redirect frame consist of:
	<ul>
		<li>a String, the URI of the new server to connect too</li>
	</ul>
</p><p>
	This URI will be of the standard format. A server won't redirect to a different type of
	service (IE If you using the tunnel service it will only redirect to another tunnel service).
</p><p>
	Example URIs:
	<ul>
		<li>tp://mithro.dyndns.org/ - Connect on standard tp port</li>
		<li>tps://mithro.dyndns.org/ - Connect on standard tps port using SSL</li>
		<li>tp://mithro.dyndns.org:6999/ - Connect on port 6999</li>
		<li>http://mithro.dyndns.org/ - Connect using http tunneling</li>
		<li>https://mithro.dyndns.org/ - Connect using https tunneling</li>
	</ul>
</p>
</span>

<h3>Connect Frame</h3>
<p>
	The Connect frame consists of:
	<ul>
		<li>a String, a client identification string</li>
	</ul>
	The client identification string can be any string but will mostly
	used to produce stats of who uses which client. The server may return 
	either a OK, Fail or Redirect frame.
</p><p>
	If the server wants to return a Redirect and the client only supports
	the old protocol a Fail should be returned instead.
</p>

<h3>Login Frame</h3>
<p>
	The Login frame consists of:
	<ul>
		<li>a String, the username of the player</li>
		<li>a String, the password</li>
	</ul>
</p><p>
	Currently the password will be transmitted in plain text. 
	<span class="new">To avoid interception	SSL service should be used. Some
	servers may refuse to authenticate on the unencrypted service and only
	run it to allow detection of encryption support.</span>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Feature Negotiation</h2>
<hr>

<span class="new">
<h3>Get Features Frame</h3>
<p>
	The Get Features frame has no data.
	Get the features this server supports. This frame can be sent before 
	Connect.
</p>
</span>

<span class="new">
<h3>Features Frame</h3>
<p>
	The Features frame consists of:
	<ul>
		<li>a List of UInt32, ID code of feature</li>
	</ul>
	The feature codes that are currently available,
	<ul>
		<li>0x1 - Secure Connection available on this port</li>
		<li>0x2 - Secure Connection available on another port</li>
		<li>0x3 - HTTP Tunneling available on this port</li>
		<li>0x4 - HTTP Tunneling available on another port</li>
		<li>0x5 - Support Keep alive frames</li>
	</ul>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Keep Alive</h2>
<hr>

<span class="new">
<h3>Ping Frame</h3>
<p>
	The Ping frame is empty and is only used to keep a connection alive
	that would possibly terminate otherwise. No more then 1 ping frame every 
	second should be sent and then only if no other data has been sent.
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Objects</h2>
<hr>

<h3>Get Object by ID Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>

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
			<span class="new">2</span> by UInt32 of padding, for future expansion of common
			attributes
		</li>
		<li>
			extra data, as defined by each object type
		</li>
	</ul>
</p><p>
Example:
&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;
</p>

<h3>Get Objects by Position Frame</h3>
<p>
	A Get Objects by Position frame consist of:
	<ul>
		<li>3 by Int64, giving the position of center the sphere</li>
		<li>a UInt64, giving the radius of the sphere</li>
	</ul>
	This will return a bunch of Objects which are inside the sphere. If
	a sphere size of zero is used all object at the point will be returned.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Orders</h2>
<hr>

<h3>Get Order Frame, Remove Order Frame</h3>
<p>
	See <a href="#GetWithIDandSlot">Get With ID and Slot</a>
</p>

<h3>Order Frame, Insert Order Frame</h3>
<p>
	A Order frame consist of:
	<ul>
		<li>a UInt32, Object ID of the order is on/to be placed on</li>
		<li>a <span class="new">SInt32</span>, Slot number of the order/to be put in, -1 will insert
			at the last position, otherwise it is inserted before the number</li>
		<li>a UInt32, Order Type ID</li>
		<li>a UInt32, (Read Only) The number of turns the order will take</li>
		<li>a list of</li>
		<ul>
			<li>a UInt32, The resource ID</li>
			<li>a UInt32, The units of that resource required</li>
		</ul>
		<li>extra data, required by the order is appended to the end</li>
	</ul>
</p><p>
	The extra data is defined by Order descriptions frames. The number of turns
	and the size of the	resource list should be zero (0) when sent by the client.<br>
	<br>
	<b>Note:</b> Order type IDs below 1000 are reserved for orders defined 
	by the extended protocol specification.
	<br>
	<b>Note:</b> Order's do not have a last modified time. Instead when an order changes
	the object which they are on has it's last modified time updated. This is because orders
	can change position and do all types of other weird stuff.
</p>

<span class="new">
<h3>Probe Order Frame</h3>
<p>
	A Probe Order frame gets an order as if the order given was put in the object's order queue. 
	These probes should occur as if no orders currently exist on object and should 
	have no side-effects.
	This is used to get the read-only fields for an order which is needed for good
	offline operation.
</p>
<p>
	The data in this frame is the same as an Insert Order frame.
	The server replies with the Order frame as if they were already on the object. Fail frames are possible
	if the order type is not allowed, or the object or order type doesn't exist.
</p>
<p>
	<b>Note:</b>This data should only be used as a guide, complex interactions may 
	cause the read-only fields to be different in some cases.
</p>
</span>

<h3>Describe Order Frame</h3>
<p>
	Describe Order frame consist of:
	<ul>
		<li>a list of UInt32, the order types to be described</li>
	</ul>
</p>

<h3>Order Description Frame</h3>
<p>
	The Order Description frame contains:
	<ul>
		<li>a UInt32, order type</li>
		<li>a String, name</li>
		<li>a String, description</li>
		<li>a list of</li>
		<ul>
			<li>a String, argument name</li>
			<li>a UInt32, argument type ID</li>
			<li>a String, description</li>
		</ul>
		<li class="new">a UInt64, the last time this description was modified</li>
	</ul>
	The Argument Types are given below: <br>
<table cellpadding=5>
	<tr>
		<td><b>Name</b></td>
		<td><b>Int32 Code</b></td>
		<td><b>Description</b></td>
		<td><b>Expected Format</b></td>
	</tr>
	<tr>
		<td>Absolute Space Coordinates</td>
		<td>0</td>
		<td>Coordinates in absolute space. (Relative to the center of the Universe)</td>
		<td>
			<ul>
				<li>a Int64, read write, X value</li>
				<li>a Int64, read write, Y value</li>
				<li>a Int64, read write, Z value</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Time</td>
		<td>1</td>
		<td>The number of turns before something happens.</td>
		<td>
			<ul>
				<li>a Int32, read write, number of turns</li>
				<li>a Int32, read only, maximum number of turns</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Object</td>
		<td>2</td>
		<td>An object's ID number.</td>
		<td>
			<ul>
				<li>a UInt32, read write, objects id</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Player</td>
		<td>3</td>
		<td>A player's ID number, Int32</td>
		<td>
			<ul>
			<li>a UInt32, read write, players id</li>
			<li>a UInt32, read only, mask (ON bits are NOT allowed to chosen),
				<ul>
					<li>0x00000001 - Allies</li>
					<li>0x00000002 - Trading Partner</li>
					<li>0x00000004 - Neutral</li>
					<li>0x00000008 - Enemies</li>
					<li>0x00000010 - Non-player</li>
				</ul>
			</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Relative Space Coordinates</td>
		<td>4</td>
		<td>Coordinates in absolute space relative to an object</td>
		<td>
			<ul>
				<li>a UInt32, read write, ID of the object these coordinates are relative to</li>
				<li>a Int64, read write, X value</li>
				<li>a Int64, read write, Y value</li>
				<li>a Int64, read write, Z value</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Range</td>
		<td>5</td>
		<td>A number value from a range</td>
		<td>
			<ul>
				<li>a Int32, read write, value</li>
				<li>a Int32, read only, minimum value</li>
				<li>a Int32, read only, maximum value</li>
				<li>a Int32, read only, value to increment by</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>List</td>
		<td>6</td>
		<td>A list in which numerous objects can be selected</td>
		<td>
			The possible selections, A list of:
			<ul>
				<li>a UInt32, read only, id of what can be selected</li>
				<li>a String, read only, String Name of can be selected</li>
				<li>a UInt32, read only, Maximum number of can to be selected</li>
			</ul>
			The selection, A list of:
			<ul>
				<li>a UInt32, read write, id of the selection</li>
				<li>a UInt32, read write, number of the selection</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>String</td>
		<td>7</td>
		<td>A number textual string</td>
		<td>
			<ul>
				<li>a Int 32, read only, maximum length of the string</li>
				<li>a String, read write, the string</li>
			</ul>
		</td>
	</tr>
</table>
<b>NOTE:</b> read only fields should be transmitted by the client as 0, 
empty lists or empty string to conserve bandwidth. The server will
ignore any information in read only field (even if they are non-empty).
<br>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Time</h2>
<hr>

<h3>Get Time Remaining Frame</h3>
<p>
	Get the time remaining before the end of turn. No data
</p>

<h3>Time Remaining Frame</h3>
<p>
	A Time Remaining frame consist of:
	<ul>
		<li>a UInt32, the time in seconds before the next end of turn starts</li>
	</ul>
</p><p>
	If the value is 0 then the end of turn has just started.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Messages</h2>
<hr>

<h3>Get Board Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>

<h3>Board Frame</h3>
<p>
	A Board frame consist of:
	<ul>
		<li>a UInt32, Board ID</li>
		<li>a String, name of the Board</li>
		<li>a String, description of the Board</li>
		<li>a UInt32, number of messages on the Board</li>
		<li class="new">a UInt64, the last modified time</li>
	</ul>
</p><p class="new">
	<b>Note:</b>The last modified time should be updated every time a message on the board
	has changed.
</p>

<span class="new">
<h3>Get Board IDs</h3>
<p>
	See <a href="#GetIDSequence">Get ID Sequence</a>
</p>
</span>

<span class="new">
<h3>List Of Board IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<h3>Get Message Frame, Remove Message Frame</h3>
<p>
	See <a href="#GetWithIDandSlot">Get With ID and Slot</a>
</p>

<h3>Message Frame, Post Message Frame</h3>
<p>
	A Message frame consist of:
	<ul>
		<li>a UInt32, Board ID of the message is on/to be placed on</li>
		<li>a <span class="new">SInt32</span>, Slot number of the message/to be put in, 
			-1 will insert at the last position, otherwise it is inserted before the number</li>
		<li>a list of UInt32, type of message (can be multiple types at once). <b class=new>This list is now obsolete and will be removed in future versions.</b></li>
		<li>a String, Subject of the message</li>
		<li>a String, Body of the message</li>
		<li class="new">a UInt32, Turn the message was generated on</li>
		<li class="new">a list of as described in the Generic Reference System</li>
	</ul>
</p><p class="new">
	Please note that messages should be immutable, once posted/created they should not change. <span class="fixme">Maybe 
	we should have a modified time, then we could remove this restriction?</span>
</p>
	
<span class="new">
<h4>Generic Reference System</h4>
<p class="new">
	The new reference system is similar to the old type system but has been expanded to cover more features.
</p><p>
	The reference system uses two integers to reference any object in the game. The first integer indicated what
	type of thing is being referenced and the second gives the ID of the thing being referenced. As well the 
	references system has a bunch of references which point to "actions" (from example an order completing). 
	As these do not refer to actual items in the game the type is negative.
	<ul>
		<li>a Int32, type of thing being referenced</li>
		<li>a UInt32, the ID of the object being referenced</li>
	</ul>
</p><p>
	The list of actions follows.
</p><p>
	The types used in the reference system are described below,
	<ul class="new">
		<li>-1000 - Server specific action reference</li>
		<li>-5 - Design action reference</li>
		<li>-4 - Message action reference</li>
		<li>-3 - Order action special reference</li>
		<li>-2 - Object action reference</li>
		<li>-1 - Player action reference</li>
		<li>0 - Misc special reference</li>
		<li>1 - Player</li>
		<li>2 - Object</li>
		<li>3 - Order Type (IE A type of order)</li>
		<li>4 - Order Instance (An actual order on an object, should also include an Object reference)</li>
		<li>5 - Message</li>
		<li>6 - Design</li>
		<li>7 - Data (IE Battle data)</li>
	</ul>
	
</p><p>
	The special references are listed below,

</p><p>
	Misc
	<ol>
		<li class="new">System Message, this message is from a the internal game system</li>
		<li class="new">Administration Message, this message is an important message from game administrators</li>
		<li class="new">Important Message, this message is flagged to be important</li>
		<li class="new">Unimportant Message, this message is flagged as unimportant</li>
	</ol>
	
</p><p>
	Player Action
	<ol>
		<li class="new">Player Eliminated, this message refers to the elimination of a player from the game</li>
		<li class="new">Player Quit, this message refers to a player leaving the game</li>
		<li class="new">Player Joined, this message refers to a new player joining the game</li>
	</ol>
	
</p><p>
	Order Action
	<ol>
		<li>Order Completion, this message refers to a completion of an order</li>
		<li>Order Canceled, this message refers to the cancellation of an order (IE Building a ship and ship yard destroyed)</li>
		<li class="new">Order Incompatible, this message refers to the inability to complete an order (IE Build Ship A when not enough material for Ship A is available)</li>
		<li class="new">Order Invalid, this message refers to an order which is invalid (IE Mine order on a fleet with no remote miners)</li>
	</ol>

</p><p>
	Object Action
	<ol>
		<li class="new">Object Idle, this message refers to an object having nothing to do</li>
	</ol>

</p><p>
	Message Action
	<ol>
		<li class="new"></li>
	</ol>
	
</p><p>
	Design Action
	<ol>
		<li class="new"></li>
	</ol>
	
</p><p>
	Examples:
	<ul class="new">
		<li>(1, 6) would be a message about/from player 6</li>
		<li>(0, 1) would be a system message</li>
		<li>(-1, 3) would be a player joined message</li>
	</ul>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Resources</h2>
<hr>

<h3>Get Resource Description Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>

<h3>Resource Description Frame</h3>
<p>
	A Resource is something that things are build out of, or consumed 
	in production of something (IE work units).
</p><p>
	A Resource Description frame consist of:
	<ul>
		<li>a UInt32, Resource ID</li>
		<li>a String, singular name of the resource</li>
		<li>a String, plural name of the resource</li>
		<li>a String, singular name of the resources unit</li>
		<li>a String, plural name of the resources unit</li>
		<li>a String, description of the resource</li>
		<li>a UInt32, weight per unit of resource (0 for not applicable)</li>
		<li>a UInt32, size per unit of resource (0 for not applicable)</li>
		<li class="new">a UInt64, the last modified time of this resource description</li>
	</ul>
</p>


<span class="new">
<h3>Get Resource Description IDs</h3>
<p>
	See <a href="#GetIDSequence">Get ID Sequence</a>
</p>
</span>

<span class="new">
<h3>List Of Resource Description IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Design Manipulation</h2>
<hr>

<span class="new">
<h3>Get Category Description Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>
</span>

<span class="new">
<h3>Category Description Frame</h3>
<p>
	A Category Description frame consist of:
	<ul>
		<li>a UInt32, Category ID</li>
		<li>a String, name of the category</li>
		<li>a String, description of the category</li>
		<li class="new">a UInt64, the last modified time of this category description</li>
	</ul>
</p>
</span>

<span class="new">
<h3>Get Component Frame, Remove Component Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>
</span>

<span class="new">
<h3>Component Frame, Insert Component frame</h3>
<p>
	A Component frame and Insert Component frame consist of:
	<ul>
		<li>a UInt32, component ID</li>
		<li>a UInt32, base component ID</li>
		<li>a UInt32, the number of times this component is in use</li>
		<li>a list of UInt32, component types</li>
		<li>a String, name of component</li>
		<li>a String, description of component</li>
		<li>
			a list of,
			<ul>
				<li>a UInt32, component ID</li>
				<li>a UInt32, number of the components</li>
			</ul>
		</li>
		<li>a list as described in Component Language section</li>
	</ul>
</p><p>
	A base component ID of zero means that this is a basic component and cannot
	be modified or removed. The base component ID must either be zero or a basic 
	component.
</p><p>
	A component can only be modified or removed if it's base component ID is not
	zero and the number of times it is in use is zero.
</p>
</span>

<span class="new">
<h4>Component Language</h4>
<p>
	Components have a simple language for describing the sub-components which can be
	added to them. If this component cannot have anything added to it then it's 
	this field should be empty. This language should only be taken as a guide to
	what can and can't be added. 
</p><p>
	It is a simple Reverse Polish Notation logic. It has a very limited number of
	operands and can refer to either part categories or individual part IDs.
	This allows for complex instructions.
</p><p>
	This is encoded using a list of 3 integers.
	<ul class="new">
		<li>a UInt8, the operand</li>
		<li>a UInt32, the number of components</li>
		<li>a UInt32, the component category or ID</li>
	</ul>
</p><p>
	The operands are as follows,
	<ul class="new">
		<li>0x1 - Component ID</li>
		<li>0x2 - Component Category</li>
		<li>0x3 - AND</li>
		<li>0x4 - OR</li>
		<li>0x5 - NOT</li>
	</ul>
</p><p>
	For example
</p>
</span>

<font face="courier">
<pre>
Normal,
(3 Electrical Type AND (2 Weapons Type OR 2 Cargo Type)) AND 1 Your Engine

PN,
AND AND (3 Electrical Type) OR (2 Weapons Type) (11 Cargo Type) (1 Your Engine) 

RPN,
(1 Your Engine) (11 Cargo Type) (2 Weapons Type) OR (3 Electrical Type) AND AND

Encoded,

1 Your Engine 11 Cargo      2 Weapon     OR          3 Elec       AND         AND         
+-----------+ +-----------+ +----------+ +---------+ +----------+ +---------+ +---------+ 
>1< <1> <99>  >2< <11> <11> >2< <2> <13> >4< <0> <0> >2< <3> <12> >3< <0> <0> >3< <0> <0>
</pre>
</font>

<span class="new">
<h4>How Component Creation Works</h4>
<p>
Component creation works creating a new component with the base component ID set to a basic component.
The client can then add/remove sub-components to newly created component. (Of course this could be
done in one step).
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Players</h2>
<hr>

<span class="new">
<h3>Get Player Frame</h3>
<p>
	See <a href="#GetWithID">Get With ID</a>
</p>
</span>

<span class="new">
<h3>Player Frame</h3>
<p>
	A Player frame consists of:
	<ul>
		<li>a UInt32, the Player id</li>
		<li>a String, the Player's name</li>
		<li>a String, the Race's name</li>
		<li>(more?)</li>
	</ul>
</p><p class="fixme">
	FIXME: Should this include details about a race? What happens if a player controls more then
	once race? What if a player can have partial control over an allies race? What about player governors?
</p>

</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>Example</h2>
<p>The following is a simple example of the first interaction.</p>
<table>
	<tr>
		<td><b>From</b></td>
		<td><b>type</b></td>
		<td><b>Data Frame</b></td>
		<td><b>Description</b></td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Connect</td>
		<td>&nbsp;</td>
		<td>Can I connect? (version check)</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Ok</td>
		<td>&nbsp;</td>
		<td>You can connect</td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Login</td>
		<td>&lt;5&gt;blah\0&lt;6&gt;blah2\0</td>
		<td>This is my username and password</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Ok</td>
		<td>&nbsp;</td>
		<td>Username/password accepted</td>
	</tr>
	<tr>
		<td>Client</td>
		<td>Get Object</td>
		<td>&lt;0&gt;</td>
		<td>Get the Universe object</td>
	</tr>
	<tr>
		<td>Server</td>
		<td>Object</td>
		<td>&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;</td>
		<td>Universe object</td>
	</tr>
</table>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<h2>TO DO</h2>
<p>
	Stuff we have to be considered fixed...
	<ul>
		<li>Figure out how to do masking for the opT_Object_ID Order Argument type (IE like opT_Object_Type)</li>
		<li>Figure out how to support renaming objects</li>
		<li>Figure out a way for the opT_List_ID to "suggest" maximums as well as hard maximums</li>
		<li>Maybe a generic "string getter" for category names</li>
		<li>Help support?</li>
		<li>Permissions to change your stuff? Not really needed for now...</li>
		<li>Get range functions?</li>
		<li>Multi-language support?</li>
		<li>Anything else I have forgotten</li>
		<li>Last modified time?</li>
	</ul>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/end_page.inc";
?>
