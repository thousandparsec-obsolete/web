<?php
	$title = "Protocol Definition Ver 0.3";
	include "../bits/start_page.inc";
	include "../bits/start_section.inc";
?>

<style type="text/css">
<!--
.new { color: #00ff00; }
.fixme { color: #ff0000; }
.inote { color: #ffff00; }
-->
</style>

<h1>Protocol Definition for Thousand Parsec</h1>
<h4>Version 0.3 (Draft) 
	<span class="fixme">
		WARNING: This document is under development, the current protocol is 
		still version 0.2
	</span>
</h4>
<p>Last updated 15 July 2005.</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="TOC"></a>
<h2>Table of Contents</h2>

<ul class="TOC">
	<li><a href="#TOC">Table of Contents</a></li>
	<li><a href="#Introduction">Introduction</a></li>
	<li><a href="#Key">Key</a></li>
	<li><a href="#Basics">Basics</a>
		<ul>
			<li><a href="#EncryptedAccess">Encrypted Access</a></li>
			<li><a href="#HTTPSTunneling">HTTPS Tunneling</a></li>
			<li><a href="#HTTPTunneling">HTTP Tunneling</a></li>
		</ul>
	</li>
	<li><a href="#FrameFormat">Frame Format</a></li>
	<li><a href="#FrameTypes">Frame Types</a></li>
	<li><a href="#FrameIDList">Frame ID List</a></li>
	<li><a href="#FrameFormats">Frame Formats</a>
		<ul>
			<li><a href="#GenericResponses">Generic Responses</a>
				<ul>
					<li><a href="#Ok_Desc">OK Frame</a></li>
					<li><a href="#Fail_Desc">Fail Frame</a></li>
					<li><a href="#Sequence_Desc">Sequence Frame</a></li>
				</ul>
			</li>
			<li><a href="#BaseFrames">Base Frames</a>
				<ul>
					<li><a href="#GetwithID_Desc">Get with ID Frame</a></li>
					<li><a href="#GetwithIDandSlot_Desc">Get with ID and Slot Frame</a></li>
					<li><a href="#GetIDSequence_Desc">Get ID Sequence Frame</a></li>
					<li><a href="#IDSequence_Desc">ID Sequence Frame</a></li>
				</ul>
			</li>
			<li><a href="#Connecting">Connecting</a>
				<ul>
					<li><a href="#Redirect_Desc">Redirect Frame</a></li>
					<li><a href="#Connect_Desc">Connect Frame</a></li>
					<li><a href="#Login_Desc">Login Frame</a></li>
				</ul>
			</li>
			<li><a href="#FeatureNegotiation">Feature Negotiation</a>
				<ul>
					<li><a href="#GetFeatures_Desc">Get Features Frame</a></li>
					<li><a href="#Features_Desc">Feature Frame</a></li>
				</ul>
			</li>
			<li><a href="#KeepAlive">Keep Alive</a>
				<ul>
					<li><a href="#Ping_Desc">Ping Frame</a></li>
				</ul>
			</li>
			<li><a href="#Objects">Objects</a>
				<ul>
					<li><a href="#GetObjectsByID_Desc">Get Objects by ID Frame</a></li>
					<li><a href="#Object_Desc">Object Frame</a></li>
					<li><a href="#GetObjectIDs_Desc">Get Object IDs Frame</a></li>
					<li><a href="#GetObjectIDsByPosition_Desc">Get Object IDs by Position Frame</a></li>
					<li><a href="#GetObjectIDsByContainer_Desc">Get Object IDs by Container Frame</a></li>
					<li><a href="#ListOfObjectIDs_Desc">List of Object IDs Frame</a></li>
				</ul>
			</li>
			<li><a href="#Orders">Orders</a>
				<ul>
					<li><a href="#GetOrderDescription_Desc">Get Order Description Frame</a></li>
					<li><a href="#OrderDescription_Desc">Order Description Frame</a></li>
					<li><a href="#GetOrderDescriptionIDs_Desc">Get Order Description IDs Frame</a></li>
					<li><a href="#ListOfOrderDescriptionIDs_Desc">List of Order Description IDs Frame</a></li>
					<li><a href="#GetOrder_Desc">Get Order Frame</a></li>
					<li><a href="#RemoveOrder_Desc">Remove Order Frame</a></li>
					<li><a href="#Order_Desc">Order Frame</a></li>
					<li><a href="#InsertOrder_Desc">Insert Order Frame</a></li>
					<li><a href="#ProbeOrder_Desc">Probe Order Frame</a></li>
				</ul>
			</li>
			<li><a href="#Time">Time</a>
				<ul>
					<li><a href="#GetTimeRemaining_Desc">Get Time Remaining Frame</a></li>
					<li><a href="#TimeRemaining_Desc">Time Remaining Frame</a></li>
				</ul>
			</li>
			<li><a href="#Messages">Messages</a>
				<ul>
					<li><a href="#GetBoards_Desc">Get Boards Frame</a></li>
					<li><a href="#Board_Desc">Board Frame</a></li>
					<li><a href="#GetBoardIDs_Desc">Get Board IDs Frame</a></li>
					<li><a href="#ListOfBoardIDs_Desc">List of Board IDs Frame</a></li>
					<li><a href="#GetMessage_Desc">Get Message Frame</a></li>
					<li><a href="#RemoveMessage_Desc">Remove Message Frame</a></li>
					<li><a href="#Message_Desc">Message Frame</a></li>
					<li><a href="#PostMessage_Desc">Post Message Frame</a></li>
				</ul>
			</li>
			<li><a href="#Resources">Resources</a>
				<ul>
					<li><a href="#GetResourceDescription_Desc">Get Resource Description Frame</a></li>
					<li><a href="#ResourceDescription_Desc">Resource Description Frame</a></li>
					<li><a href="#GetResourceDescriptionIDs_Desc">Get Resource Description IDs Frame</a></li>
					<li><a href="#ListOfResourceDescriptionIDs_Desc">List of Resource Description IDs Frame</a></li>
				</ul>
			</li>
			<li><a href="#Players">Players</a>
				<ul>
					<li><a href="#GetPlayerData_Desc">Get Player Data Frame</a></li>
					<li><a href="#PlayerData_Desc">Player Data Frame</a></li>
				</ul>
			</li>
			<li><a href="#DesignManipulation">Design Manipulation</a>
				<ul>
					<li><a href="#Categories">Categories</a>
						<ul>
							<li><a href="#GetCategory_Desc">Get Category Frame</a></li>
							<li><a href="#Category_Desc">Category Frame</a></li>
							<li><a href="#AddCategory_Desc">Add Category Frame</a></li>
							<li><a href="#RemoveCategory_Desc">Remove Category Frame</a></li>
							<li><a href="#GetCategoryIDs_Desc">Get Category IDs Frame</a></li>
							<li><a href="#ListOfCategoryIDs_Desc">List Of Category IDs Frame</a></li>
						</ul>
					</li>
					<li><a href="#Designs">Designs</a>
						<ul>
							<li><a href="#GetDesign_Desc">Get Design Frame</a></li>
							<li><a href="#Design_Desc">Design Frame</a></li>
							<li><a href="#AddDesign_Desc">Add Design Frame</a></li>
							<li><a href="#ModifyDesign_Desc">Modify Design Frame</a></li>
							<li><a href="#RemoveDesign_Desc">Remove Design Frame</a></li>
							<li><a href="#GetDesignIDs_Desc">Get Design IDs Frame</a></li>
							<li><a href="#ListOfDesignIDs_Desc">List Of Design IDs Frame</a></li>
						</ul>
					</li>
					<li><a href="#Components">Components</a>
						<ul>
							<li><a href="#GetComponent_Desc">Get Component Frame</a></li>
							<li><a href="#Component_Desc">Component Frame</a></li>
							<li><a href="#GetComponentIDs_Desc">Get Component IDs Frame</a></li>
							<li><a href="#ListOfComponentIDs_Desc">List Of Component IDs Frame</a></li>
						</ul>
					</li>
					<li><a href="Properties">Properties</a>
						<ul>
							<li><a href="#GetProperty_Desc">Get Property Frame</a></li>
							<li><a href="#Property_Desc">Property Frame</a></li>
							<li><a href="#GetPropertyIDs_Desc">Get Property IDs Frame</a></li>
							<li><a href="#ListOfPropertyIDs_Desc">List Of Property IDs Frame</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li><a href="#OrderArgumentTypes">Order Argument Types</a></li>
	<li><a href="#GenericReferenceSystem">Generic Reference System</a></li>
	<li><a href="ncl.php">New Component Language (separate document)</a></li>
</ul>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Introduction"></a>
<h2>Introduction</h2>

<p>
	This protocol definition is for the Thousand Parsec project. It
	is designed as a simple, easy to implement protocol. It is designed by
	Lee Begg and Tim Ansell and any questions should be directed at these 
	two or the tp-devel mailing list.
</p>

<p>
	This version of the protocol extends the <a href="protocol2.php">previous
	version (0.2)</a>. It should be mostly backwards compatible with the previous
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

<a name="Key"></a>
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
	<li class="new">New features of this document are marked like this</li>
	<li class="inote">Notes marked with this color are issues for consideration when 
	implementing (normally to do with security)</li>
</ul>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Basics"></a>
<h2>Basics</h2>
<p>
	TP will use, TCP port 6923 for unencrypted access <span class="new">and TCP port 6924 
	for encrypted access. The server can also be run on port 80 for unencrypted access and 
	443 for encrypted access.</span>
</p>
<ul>
	<li>
		All integers are in Network Byte Order (Big Endian).
	</li><li>
		Strings will be prefixed by the 32 bit integer number of bytes the string takes
		up. <span class="new">All strings will be transmitted in UTF-8.</span>
		<p class="new">
		Previously all strings had to be terminate by a null character, this is no 
		longer necessary. It is recommend that the null terminator is no longer
		transmitted.
		</p>
	</li><li class="new">
		Semi-signed Integers are integers which act like normal unsigned numbers except
		that the biggest possible number is considered -1, this should equal the normal
		signed representation for this number. These are noted as SInt&lt;Size&gt;.
	</li><li class="new">
		All times are in 64 bit Unix time stamp format in the timezone of UTC (with no 
		daylight savings). 
		<p class="inote">
		Note: Modified times should be relative to a person. If a person should not know
		about the thing which caused the change then they should not know that the object
		has been modified.
		</p>
	</li>
</ul>
<p class="new">
	A client can connect to a TP server on the standard 6923 port and use the new
	negotiation frames to find out if the server supports tunneling or encrypted
	access (and other optional features). The client is not required to do this however.
</p>

<span class="new">
<a name="EncryptedAccess"></a>
<h3>Encrypted Access (Optional)</h3>
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
<a name="HTTPSTunneling"></a>
<h3>HTTPS Tunneling (Optional)</h3>
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
<a name="HTTPTunneling"></a>
<h3>HTTP Tunneling (Optional)</h3>
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
	An example implementation of this can be found in libtpproto-py.
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="FrameFormat"></a>
<h2>Frame format</h2>
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
</p><p class="new">
	No frame may be bigger then <b>1048576</b> bytes (1 megabytes) long.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>
 
<a name="FrameTypes"></a>
<h2>Frame Types</h2>
<p>
	There are a number of types that can be put in types field of the
	frame. There is no meaning in odd/even distinction in this version.
	The types are listed below:
</p><p>
<table class="tabular">
	<tr>
		<th>Value</th>
		<th>Name</th>
		<th>Description</th>
		<th>Base</th>
	</tr>
	
	<tr>
		<th colspan="4"><a href="#GenericResponses">Generic Responses</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These responses are the most common and generic that should be the 
			first to be implemented.
		</td>
	</tr><tr class="row0">
		<td class="numeric">0</td>
		<td><a href="#Ok_Desc">Ok</a></td>
		<td>Ok, continue or passed</td>
		<td></td>
	</tr><tr class="row1">
		<td class="numeric">1</td>
		<td><a href="#Fail_Desc">Fail</a></td>
		<td>Failed, stop or impossible</td>
		<td></td>
	</tr><tr class="row0">
		<td class="numeric">2</td>
		<td><a href="#Sequence_Desc">Sequence</a></td>
		<td>Multiple frames will follow</td>
		<td></td>
	</tr>

	<tr class="new">
		<th colspan="4"><a href="#BaseFrames">Base Frames</a></th>
	</tr><tr class="new">
		<td colspan="4" class="desc">
			These packets don't really exist but are the common parts of other 
			packets.
		</td>
	</tr><tr class="row0 new">
		<td class="numeric">-</td>
		<td><a href="#GetwithID_Desc">Get with ID</a></td>
		<td>Gets things using ids (Objects, Boards)</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">-</td>
		<td><a href="#GetwithIDandSlot_Desc">Get with ID and Slots</a></td>
		<td>Gets things on a thing using slots (Orders, Messages)</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">-</td>
		<td><a href="#GetIDSequence_Desc">Get ID Sequence</a></td>
		<td>Gets a sequence of IDs</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">-</td>
		<td><a href="#IDSequence_Desc">ID Sequence</a></td>
		<td>A sequence of IDs and their last modified times</td>
		<td></td>
	</tr>
	
	<tr>
		<th colspan="4"><a href="#Connecting">Connecting</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These frames are used for setting up the connection to a server.
		</td>
	</tr><tr class="row0">
		<td class="numeric">3</td>
		<td><a href="#Connect_Desc">Connect</a></td>
		<td>Can I connect?</td>
		<td></td>
	</tr><tr class="row1">
		<td class="numeric">4</td>
		<td><a href="#Login_Desc">Login</a></td>
		<td>Login with username/password</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">24</td>
		<td><a href="#Redirect_Desc">Redirect</a></td>
		<td>Redirects a client to a different server.</td>
		<td></td>
	</tr>

	<tr class="new">
		<th colspan="4"><a href="#FeatureNegotiation">Feature Negotiation</a></th>
	</tr><tr class="new">
		<td colspan="4" class="desc">
			These frames are used for negotiation which features to use.
		</td>
	</tr><tr class="row0 new">
		<td class="numeric">25</td>
		<td><a href="#GetFeatures_Desc">Get Features</a></td>
		<td>Get the features available on this server.</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">26</td>
		<td><a href="#Features_Desc">Available Features</a></td>
		<td>The features available on this server.</td>
		<td></td>
	</tr>
	
	<tr class="new">
		<th colspan="4"><a href="#KeepAlive">Keep alive</a> (Optional)</th>
	</tr><tr class="new">
		<td colspan="4" class="desc">
			These frames are used to keep a connection alive, these are often
			needed when using the tunneling connections. (Some broken NAT 
			implementations also need this to keep open long running, low 
			bandwidth connections.) These frames only required to be implemented
			if HTTP or HTTPS tunneling is supported.
		</td>
	</tr><tr class="row0 new">
		<td class="numeric">27</td>
		<td><a href="#Ping_Desc">Ping</a></td>
		<td>Get the server to respond with a OK request.</td>
		<td></td>
	</tr>
	
	<tr>
		<th colspan="4"><a href="#Objects">Objects</a></th>
	</tr><tr>
		<td colspan="4" class="desc">These frames are used for getting objects.</td>
	</tr><tr class="row0">
		<td class="numeric">5</td>
		<td><a href="#GetObjectsByID_Desc">Get Objects by ID</a></td>
		<td>Returns object with the given IDs.</td>
		<td>Get with ID</td>
	</tr><tr class="row1">
		<td class="numeric">7</td>
		<td><a href="#Object_Desc">Object</a></td>
		<td>Description of an Object</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">28</td>
		<td><a href="#GetObjectIDs_Desc">Get Object IDs</a></td>
		<td></td>
		<td>Get ID Sequence</td>
	</tr><tr class="row1 new">
		<td class="numeric">29</td>
		<td><a href="#GetObjectIDsByPosition_Desc">Get Object IDs by Position</a></td>
		<td>Returns the IDs which are within a sphere.</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">30</td>
		<td><a href="#GetObjectIDsByContainer_Desc">Get Object IDs by Container</a></td>
		<td>Returns the Object IDs which are within an Object.</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">31</td>
		<td><a href="#ListOfObjectIDs_Desc">List of Object IDs</a></td>
		<td>Gets a sequence of IDs.</td>
		<td>ID Sequence</td>
	</tr>
	
	<tr>
		<th colspan="4"><a href="#Orders">Orders</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These frames are used for manipulating orders.
		</td>
	</tr><tr class="row0">
		<td class="numeric">8</td>
		<td><a href="#GetOrderDescription_Desc">Get Order Description</a></td>
		<td>Returns a description of an order type</td>
		<td>Get with ID</td>
	</tr><tr class="row1">
		<td class="numeric">9</td>
		<td><a href="#OrderDescription_Desc">Order Description</a></td>
		<td>Describes an order type and it's parameters</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">32</td>
		<td><a href="#GetOrderDescriptionIDs_Desc">Get Order Description IDs</a></td>
		<td>Gets a sequence of order type IDs.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row1 new">
		<td class="numeric">33</td>
		<td><a href="#ListOfOrderDescriptionIDs_Desc">List of Order Description IDs</a></td>
		<td>A sequence of order type IDs.</td>
		<td>ID Sequence</td>
		
	</tr><tr class="row0">
		<td class="numeric">10</td>
		<td><a href="#GetOrder_Desc">Get Order</a></td>
		<td>Returns a description of an order</td>
		<td>Get with ID and Slots</td>
	</tr><tr class="row1">
		<td class="numeric">11</td>
		<td><a href="#Order_Desc">Order</a></td>
		<td>Description of an order</td>
		<td></td>
	</tr><tr class="row0">
		<td class="numeric">12</td>
		<td><a href="#InsertOrder_Desc">Insert Order</a></td>
		<td>Insert order on object before slot</td>
		<td></td>
	</tr><tr class="row1">
		<td class="numeric">13</td>
		<td><a href="#RemoveOrder_Desc">Remove Order</a></td>
		<td>Remove an order from a slot of an object</td>
		<td>Get with ID and Slots</td>
	</tr><tr class="row0 new">
		<td class="numeric">34</td>
		<td><a href="#ProbeOrder_Desc">Probe Order</a></td>
		<td>Returns an order object which would be created if this was an Insert order</td>
		<td></td>
	</tr>

	<tr>
		<th colspan="4"><a href="#Time">Time</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These frames are used to find out when the next turn will occur.
		</td>
	</tr><tr class="row0">
		<td class="numeric">14</td>
		<td><a href="#GetTimeRemaining_Desc">Get Time Remaining</a></td>
		<td>Get the amount of time before the end of turn</td>
		<td></td>
	</tr><tr class="row1">
		<td class="numeric">15</td>
		<td><a href="#TimeRemaining_Desc">Time remaining</a></td>
		<td>The amount of time before the end of turn</td>
		<td></td>
	</tr>

	<tr>
		<th colspan="4"><a href="#Messages">Messages</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These frames are used to manipulate the in game message boards. Each person
			has a message board and there are some shared message boards.
		</td>
	</tr><tr class="row0">
		<td class="numeric">16</td>
		<td><a href="#GetBoards_Desc">Get Boards</a></td>
		<td>Get message boards the player can see.</td>
		<td>Get with ID</td>
	</tr><tr class="row1">
		<td class="numeric">17</td>
		<td><a href="#Board_Desc">Board</a></td>
		<td>A Message.</td>
		<td></td>

	</tr><tr class="row0 new">
		<td class="numeric">35</td>
		<td><a href="#GetBoardIDs_Desc">Get Board IDs</a></td>
		<td>Gets a list of board ids that the player can see.</span></td>
		<td>Get ID Sequence</td>
	</tr><tr class="row1 new">
		<td class="numeric">36</td>
		<td><a href="#ListOfBoardIDs_Desc">List Of Board IDs</a></td>
		<td>The list of board ids the player can see.</td>
		<td>ID Sequence</td>

	</tr><tr class="row0">
		<td class="numeric">18</td>
		<td><a href="#GetMessage_Desc">Get Message</a></td>
		<td>Get a Message from a board.</td>
		<td>Get with ID and Slots</td>
	</tr><tr class="row1">
		<td class="numeric">19</td>
		<td><a href="#Message_Desc">Message</a></td>
		<td>A Message.</td>
		<td></td>
	</tr><tr class="row0">
		<td class="numeric">20</td>
		<td><a href="#PostMessage_Desc">Post Message</a></td>
		<td>Post a message to a board.</td>
		<td></td>
	</tr><tr class="row1">
		<td class="numeric">21</td>
		<td><a href="#RemoveMessage_Desc">Remove Message</a></td>
		<td>Remove a message from a board.</td>
		<td>Get with ID and Slots</td>
	</tr>

	<tr>
		<th colspan="4"><a href="#Resources">Resources</a></th>
	</tr><tr>
		<td colspan="4" class="desc">
			These frames are used to get information about resources.
		</td>
	</tr><tr class="row0">
		<td class="numeric">22</td>
		<td><a href="#GetResourceDescription_Desc">Get Resource Description</a></td>
		<td>Returns a description of an resource type</td>
		<td>Get with ID</td>
	</tr><tr class="row1">
		<td class="numeric">23</td>
		<td><a href="#ResourceDescription_Desc">Resource Description</a></td>
		<td>Describes a resource</td>
		<td></td>
		
	</tr><tr class="row0 new">
		<td class="numeric">37</td>
		<td><a href="#GetResourceDescriptionIDs_Desc">Get Resource Description IDs</a></td>
		<td>Gets a list of resource type ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row1 new">
		<td class="numeric">38</td>
		<td><a href="#ListOfResourceDescriptionIDs_Desc">List Of Resource Description IDs</a></td>
		<td>A list of resource type ids.</td>
		<td>ID Sequence</td>
	</tr>

	<tr class="new">
		<th colspan="4"><a href="#Players">Players</a></th>
	</tr><tr class="new">
		<td colspan="4" class="desc">
			These frames are used to get information about other places/races.
		</td>
	</tr><tr class="row0 new">
		<td class="numeric">39</td>
		<td><a href="#GetPlayerData_Desc">Get Player Data</a></td>
		<td>Get the information about a player/race.</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">40</td>
		<td><a href="#PlayerData_Desc">Player Data</a></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr class="new">
		<th colspan="4"><a href="#DesignManipulation">Design Manipulation</a></th>
	</tr><tr class="new">
		<td colspan="4" class="desc">
			These are the frames required to manipulate designs (such as those for ships
			or Weapons).
		</td>

	</tr><tr class="row0 new">
		<td class="numeric">41</td>
		<td><a href="#GetCategory_Desc">Get Category</a></td>
		<td>Get the details about a category</td>
		<td>Get with ID</td>
	</tr><tr class="row1 new">
		<td class="numeric">42</td>
		<td><a href="#Category_Desc">Category</a></td>
		<td>Describes a category</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">43</td>
		<td><a href="#AddCategory_Desc">Add Category</a></td>
		<td>Adds a new category</td>
		<td>Category</td>
	</tr><tr class="row1 new">
		<td class="numeric">44</td>
		<td><a href="#RemoveCategory_Desc">Remove Category</a></td>
		<td>Remove a category</td>
		<td>Get with ID</td>
	</tr><tr class="row0 new">
		<td class="numeric">45</td>
		<td><a href="#GetCategoryIDs_Desc">Get Category IDs</a></td>
		<td>Gets a list of category ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row1 new">
		<td class="numeric">46</td>
		<td><a href="#ListOfCategoryIDs_Desc">List Of Category IDs</a></td>
		<td>A list of category type ids.</td>
		<td>ID Sequence</td>
	</tr>

	<tr class="new">
		<td colspan="4">&nbsp;</td>
	</tr>
	
	</tr><tr class="row0 new">
		<td class="numeric">47</td>
		<td><a href="#GetDesign_Desc">Get Design</a></td>
		<td>Get the details about a design</td>
		<td>Get with ID</td>
	</tr><tr class="row1 new">
		<td class="numeric">48</td>
		<td><a href="#Design_Desc">Design</a></td>
		<td>Describes a design</td>
		<td></td>
	</tr><tr class="row0 new">
		<td class="numeric">49</td>
		<td><a href="#AddDesign_Desc">Add Design</a></td>
		<td>Adds a new design</td>
		<td>Design</td>
	</tr><tr class="row1 new">
		<td class="numeric">50</td>
		<td><a href="#ModifyDesign_Desc">Modify Design</a></td>
		<td>Modifies an old design</td>
		<td>Design</td>
	</tr><tr class="row0 new">
		<td class="numeric">51</td>
		<td><a href="#RemoveDesign_Desc">Remove Design</a></td>
		<td>Remove a design</td>
		<td>Design</td>
	</tr><tr class="row1 new">
		<td class="numeric">52</td>
		<td><a href="#GetDesignIDs_Desc">Get Design IDs</a></td>
		<td>Gets a list of design ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row0 new">
		<td class="numeric">53</td>
		<td><a href="#ListOfDesignIDs_Desc">List Of Design IDs</a></td>
		<td>A list of design type ids.</td>
		<td>ID Sequence</td>
	
	<tr class="new">
		<td colspan="4">&nbsp;</td>
	</tr>

	</tr><tr class="row1 new">
		<td class="numeric">54</td>
		<td><a href="#GetComponent_Desc">Get Component</a></td>
		<td>Gets the details about a component</td>
		<td>Get with ID</td>
	</tr><tr class="row0 new">
		<td class="numeric">55</td>
		<td><a href="#Component_Desc">Component</a></td>
		<td>Describes a component</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">56</td>
		<td><a href="#GetComponentIDs_Desc">Get Component IDs</a></td>
		<td>Gets a list of component ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row0 new">
		<td class="numeric">57</td>
		<td><a href="#ListOfComponentIDs_Desc">List Of Component IDs</a></td>
		<td>A list of component ids.</td>
		<td>ID Sequence</td>

	<tr class="new">
		<td colspan="4">&nbsp;</td>
	</tr>

	</tr><tr class="row1 new">
		<td class="numeric">54</td>
		<td><a href="#GetProperty_Desc">Get Property</a></td>
		<td>Gets the details about a property</td>
		<td>Get with ID</td>
	</tr><tr class="row0 new">
		<td class="numeric">55</td>
		<td><a href="#Property_Desc">Property</a></td>
		<td>Describes a property</td>
		<td></td>
	</tr><tr class="row1 new">
		<td class="numeric">56</td>
		<td><a href="#GetPropertyIDs_Desc">Get Property IDs</a></td>
		<td>Gets a list of property ids.</td>
		<td>Get ID Sequence</td>
	</tr><tr class="row0 new">
		<td class="numeric">57</td>
		<td><a href="#ListOfPropertyIDs_Desc">List Of Property IDs</a></td>
		<td>A list of property ids.</td>
		<td>ID Sequence</td>

	</tr>

</table>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="FrameIDList"></a>
<h2>Frame ID List</h2>

<table class="tabular">
	<tr class="row0 new"><td class="numeric"> -</td><td>Get with ID</td></tr>
	<tr class="row1 new"><td class="numeric"> -</td><td>Get with ID and Slots</td></tr>
	<tr class="row0 new"><td class="numeric"> -</td><td>Get ID Sequence</td></tr>
	<tr class="row1 new"><td class="numeric"> -</td><td>ID Sequence</td></tr>
	<tr class="row0"><td class="numeric"> 0</td><td>Ok</td></tr>
	<tr class="row1"><td class="numeric"> 1</td><td>Fail</td></tr>
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
	<tr class="row1 new"><td class="numeric">26</td><td>Available Features</td></tr>
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
	<tr class="row1 new"><td class="numeric">40</td><td>Player Data</td></tr>
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
	<tr class="row1 new"><td class="numeric">54</td><td>Get Property</td></tr>
	<tr class="row0 new"><td class="numeric">55</td><td>Property</td></tr>
	<tr class="row1 new"><td class="numeric">56</td><td>Get Property IDs</td></tr>
	<tr class="row0 new"><td class="numeric">57</td><td>List Of Property IDs</td></tr>
</table>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="FrameFormats"></a>
<h2>Frame formats</h2>
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

<a name="GenericResponses"></a>
<h2>Generic Responses</h2>

<a name="Ok_Desc"></a>
<h3>OK Frame</h3>
<p>
	The OK frame consists of:
	<ul>
		<li>a String, the string can be safely ignored - however it may 
			contain useful information for debugging purposes)</li>
	</ul>
</p>

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

<a name="Sequence_Desc"></a>
<h3>Sequence Frame</h3>
<p>
	Sequence frame consist of:
	<ul>
		<li>a UInt32, giving the number of frames to follow</li>
	</ul>
</p><p>
	This frame will proceed a response which requires numerous frames to be complete.
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="BaseFrames"></a>
<h2>Base Frames</h2>

<a name="GetwithID_Desc"></a>
<h3>Get with ID Frame</h3>
<p>
	A Get with ID frame consist of:
	<ul>
		<li>a list of UInt32, IDs of the things requested</li>
	</ul>
</p><p>
	This packet is used to get things using their IDs. Such things would be
	objects, message boards, etc.
</p>

<a name="GetwithIDandSlot_Desc"></a>
<h3>Get with ID and Slot Frame</h3>
<p>
	Get with ID and Slot frame consist of:
	<ul>
		<li>a UInt32, id of base thing</li>
		<li>a list of UInt32, slot numbers of contained things be requested</li>
	</ul>
</p><p>
	An empty list means you should return all slots.
</p><p>
	This packet is used to get things which are in "slots" on a parent. Examples 
	would be orders (on objects), messages (on boards), etc.
</p><p>
	<b>Note:</b> If this is really a Remove frame then slot numbers should be in decrementing 
	value if you don't want strange things to happen. (IE 10, 4, 1)
</p>

<a name="GetIDSequence_Desc"></a>
<h3>Get ID Sequence Frame</h3>
<p>
	Get ID Sequence frame consist of:
	<ul>
		<li>a SInt32, the sequence key</li>
		<li>a UInt32, the starting number in the sequence</li>
		<li>a SInt32, the number of IDs to get</li>
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
			If the number of IDs to get is -1, then all (remaining) IDs should be returned.
		</li><li>
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

<a name="IDSequence_Desc"></a>
<h3>ID Sequence Frame</h3>
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
 
<a name="Connecting"></a>
<h2>Connecting</h2>

<span class="new">
<a name="Redirect_Desc"></a>
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
		<li>http://mithro.dyndns.org/ - Connect using HTTP tunneling</li>
		<li>https://mithro.dyndns.org/ - Connect using HTTPS tunneling</li>
	</ul>
</p>
</span>

<a name="Connect_Desc"></a>
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

<a name="Login_Desc"></a>
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
		<li>0x10005 - Sends Component ID Sequences in descending modified time order</li>
	</ul>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="KeepAlive"></a>
<h2>Keep Alive</h2>

<span class="new">
<a name="Ping_Desc"></a>
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

<a name="Objects"></a>
<h2>Objects</h2>

<a name="GetObjectsByID_Desc"></a>
<h3>Get Objects by ID Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>

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

<span class="new">
<a name="GetObjectIDs_Desc"></a>
<h3>Get Object IDs Frame</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<a name="GetObjectIDsByPosition_Desc"></a>
<h3>Get Object IDs by Position Frame</h3>
<p>
	A Get Object IDs by Position frame consist of:
	<ul>
		<li>3 by Int64, giving the position of center the sphere</li>
		<li>a UInt64, giving the radius of the sphere</li>
	</ul>
</p><p class="new">
	This will return an ID Sequence which contains all the object IDs which are inside the sphere. If
	a sphere size of zero is used all object IDs at the point will be returned.
</p>

<span class="new">
<a name="GetObjectIDsByContainer_Desc"></a>
<h3>Get Object IDs by Container Frame</h3>
<p>
	A Get Object IDs by Container frame consist of:
	<ul>
		<li>a UInt32, object that is the container</li>
	</ul>
</p><p>
	This will return an ID Sequence which contains all the object IDs which are directly contained by 
	this object. To get all objects inside a container you will need to call this recursively on the IDs
	returned.
</p>
</span>

<span class="new">
<a name="ListOfObjectIDs_Desc"></a>
<h3>List of Object IDs Frame</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Orders"></a>
<h2>Orders</h2>

<a name="GetOrderDescription_Desc"></a>
<h3>Get Order Description Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>

<a name="OrderDescription_Desc"></a>
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
</p><p>
	<a name="OrderArgumentTypes"></a>
	The Argument Types are given below:
<table class="tabular">
	<tr>
		<th>Name</th>
		<th>Int32 Code</th>
		<th>Description</th>
		<th>Expected Format</th>
	</tr>
	<tr class="row0">
		<td>Absolute Space Coordinates</td>
		<td class="numeric">0</td>
		<td>Coordinates in absolute space. (Relative to the center of the Universe)</td>
		<td>
			<ul>
				<li>a Int64, read write, X value</li>
				<li>a Int64, read write, Y value</li>
				<li>a Int64, read write, Z value</li>
			</ul>
		</td>
	</tr>
	<tr class="row1">
		<td>Time</td>
		<td class="numeric">1</td>
		<td>The number of turns before something happens.</td>
		<td>
			<ul>
				<li>a Int32, read write, number of turns</li>
				<li>a Int32, read only, maximum number of turns</li>
			</ul>
		</td>
	</tr>
	<tr class="row0">
		<td>Object</td>
		<td class="numeric">2</td>
		<td>An object's ID number.</td>
		<td>
			<ul>
				<li>a UInt32, read write, objects id</li>
			</ul>
		</td>
	</tr>
	<tr class="row1">
		<td>Player</td>
		<td class="numeric">3</td>
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
	<tr class="row0">
		<td>Relative Space Coordinates</td>
		<td class="numeric">4</td>
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
	<tr class="row1">
		<td>Range</td>
		<td class="numeric">5</td>
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
	<tr class="row0">
		<td>List</td>
		<td class="numeric">6</td>
		<td>A list in which numerous items can be selected</td>
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
	<tr class="row1">
		<td>String</td>
		<td class="numeric">7</td>
		<td>A number textual string</td>
		<td>
			<ul>
				<li>a Int 32, read only, maximum length of the string</li>
				<li>a String, read write, the string</li>
			</ul>
		</td>
	</tr>
	<tr class="row0">
		<td>Generic Reference</td>
		<td class="numeric">8</td>
		<td>A reference to something.</td>
		<td>
			<ul>
				<li>A read write reference, as describe in the <a href="#GenericReferenceSystem">Generic Reference System</a> section.</li>
				<li>The valid reference types, A list of:
					<ul>
						<li>a UInt32, read only, id of valid reference types</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr class="row1">
		<td>Generic Reference List</td>
		<td class="numeric">9</td>
		<td>A list of reference to something.</td>
		<td>
			<ul>
				<li>A read write list of,
					<ul>
						<li>A reference, as describe in the <a href="#GenericReferenceSystem">Generic Reference System</a> section.</li>
					</ul>
				</li>
				<li>The valid reference types, A list of:
					<ul>
						<li>a UInt32, read only, id of valid reference types</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
</table>
</p><p>
	<b>NOTE:</b> read only fields should be transmitted by the client as 0, 
	empty lists or empty string to conserve bandwidth. The server will
	ignore any information in read only field (even if they are non-empty).
</p>

<span class="new">
<a name="GetOrderDescriptionIDs_Desc"></a>
<h3>Get Order Description IDs Frame</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfOrderDescriptionIDs_Desc"></a>
<h3>List of Order Description IDs Frame</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<a name="GetOrder_Desc"></a>
<a name="RemoveOrder_Desc"></a>
<h3>Get Order Frame, Remove Order Frame</h3>
<p>
	See <a href="#GetwithIDandSlot_Desc">Get With ID and Slot</a>
</p>

<a name="Order_Desc"></a>
<a name="InsertOrder_Desc"></a>
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
</p><p>
	<b>Note:</b> Order type IDs below 1000 are reserved for orders defined 
	by the extended protocol specification.
</p><p class="inote">
	Note: Order's do not have a last modified time. Instead when an order changes
	the object which they are on has it's last modified time updated. This is because orders
	can change position and do all types of other weird stuff.
</p>

<span class="new">
<a name="ProbeOrder_Desc"></a>
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

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Time"></a>
<h2>Time</h2>

<a name="GetTimeRemaining_Desc"></a>
<h3>Get Time Remaining Frame</h3>
<p>
	Get the time remaining before the end of turn. No data
</p>

<a name="TimeRemaining_Desc"></a>
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

<a name="Messages"></a>
<h2>Messages</h2>

<a name="GetBoards_Desc"></a>
<h3>Get Boards Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>

<a name="Board_Desc"></a>
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
<a name="GetBoardIDs_Desc"></a>
<h3>Get Board IDs Frame</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfBoardIDs_Desc"></a>
<h3>List Of Board IDs Frame</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<a name="GetMessage_Desc"></a>
<a name="RemoveMessage_Desc"></a>
<h3>Get Message Frame, Remove Message Frame</h3>
<p>
	See <a href="#GetwithIDandSlot_Desc">Get With ID and Slot</a>
</p>

<a name="Message_Desc"></a>
<a name="PostMessage_Desc"></a>
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
<a name="GenericReferenceSystem"></a>
<h2>Generic Reference System</h2>
<p class="new">
	The new reference system is similar to the old type system but has been expanded to cover more features.
</p><p>
	The reference system uses two integers to reference any object in the game. The first integer indicated what
	type of thing is being referenced and the second gives the ID of the thing being referenced.
</p><p>
	<ul>
		<li>a Int32, type of thing being referenced</li>
		<li>a UInt32, the ID of the object being referenced</li>
	</ul>
</p><p>
	As well the references system has a bunch of references which point to "actions" (from example an order 
	completing). As these do not refer to actual items in the game the type is negative.
</p><p>
	The types used in the reference system are described below,
	<ul class="new">
		<li>-1000 - Server specific action reference</li>
		<li>-5? - Design action reference</li>
		<li>-4? - Player action reference</li>
		<li>-3? - Message action reference</li>
		<li>-2 - Order action special reference</li>
		<li>-1 - Object action reference</li>
		<li>0 - Misc special reference</li>
		<li>1 - Object</li>
		<li>2 - Order Type (IE A type of order)</li>
		<li>3 - Order Instance (An actual order on an object, should also include an Object reference)</li>
		<li>4 - Board</li>
		<li>5 - Message (Should also include a Board reference)</li>
		<li>6 - Resource Description</li>
		<li>7 - Player</li>
		<li>8? - Category</li>
		<li>9? - Component</li>
	</ul>
	
</p><p>
	The special references are listed below,

</p><p>
	Misc
	<ol>
		<li class="new">System Message, this message is from a the internal game system</li>
		<li class="new">Administration Message, this message is an message from game administrators</li>
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

<a name="Resources"></a>
<h2>Resources</h2>

<a name="GetResourceDescription_Desc"></a>
<h3>Get Resource Description Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>

<a name="ResourceDescription_Desc"></a>
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
<a name="GetResourceDescriptionIDs_Desc"></a>
<h3>Get Resource Description IDs Frame</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfResourceDescriptionIDs_Desc"></a>
<h3>List Of Resource Description IDs Frame</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<?php
	include "../bits/end_section.inc";
	include "../bits/start_section.inc";
?>

<a name="Players"></a>
<h2>Players</h2>

<span class="new">
<a name="GetPlayerData_Desc"></a>
<h3>Get Player Data Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>
<p>Note: Getting id 0 will return the current player and the returned player object will have the correct player id set.</p>
</span>

<span class="new">
<a name="PlayerData_Desc"></a>
<h3>Player Data Frame</h3>
<p>
	A Player Data frame consists of:
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

<a name="DesignManipulation"></a>
<h2>Design Manipulation</h2>

<a name="Categories"></a>

<span class="new">
<a name="GetCategory_Desc"></a>
<a name="RemoveCategory_Desc"></a>
<h3>Get Category Frame, Remove Category Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>
</span>

<span class="new">
<a name="Category_Desc"></a>
<a name="AddCategory_Desc"></a>
<h3>Category Frame, Add Category Frame</h3>
<p>
	A Category frame consist of:
	<ul>
		<li>a UInt32, Category ID</li>
		<li>a UInt64, the last modified time of this category description</li>
		<li>a String, name of the category</li>
		<li>a String, description of the category</li>
	</ul>
</p>
</span>

<span class="new">
<a name="GetCategoryIDs_Desc"></a>
<h3>Get Category IDs</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfCategoryIDs_Desc"></a>
<h3>List Of Category IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<a name="Designs"></a>

<span class="new">
<a name="GetDesign_Desc"></a>
<a name="RemoveDesign_Desc"></a>
<h3>Get Design Frame, Remove Design Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>
</span>

<span class="new">
<a name="Design_Desc"></a>
<a name="AddDesign_Desc"></a>
<a name="ModifyDesign_Desc"></a>
<h3>Design Frame, Add Design Frame, Modify Design Frame</h3>
<p>
	A Design frame consist of:
	<ul>
		<li>a UInt32, Design ID</li>
		<li>a UInt64, the last modified time of this design description</li>
		<li>a list of UInt32, categories this design is in</li>
		<li>a String, name of the design</li>
		<li>a String, description of the design</li>
		<li>a SInt32, number of times the design is in use</li>
		<li>a UInt32, owner of the design</li>
		<li>a String, human readable feedback on the design</li>
		<li>
			a list of,
				<ul>
					<li>a UInt32, property id</li>
					<li>a UInt32, property value</li>
					<li>a String, property display string</li>
				</ul>
		</li>
	</ul>
</p><p>
	<b>Note:</b> If usage is -1, then the design is unusable.
</p>
</span>

<span class="new">
<a name="GetDesignIDs_Desc"></a>
<h3>Get Design IDs</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfDesignIDs_Desc"></a>
<h3>List Of Design IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<a name="Components"></a>

<span class="new">
<a name="GetComponent_Desc"></a>
<h3>Get Component Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>
</span>

<span class="new">
<a name="Component_Desc"></a>
<h3>Component Frame</h3>
<p>
	A Component frame consist of:
	<ul>
		<li>a UInt32, component ID</li>
		<li>a UInt64, the last modified time of this component</li>
		<li>a list of UInt32, categories this component is in</li>
		<li>a String, name of the component</li>
		<li>a String, description of the component</li>
		<li>a String, TPCL "Requirements" function (see <a href="ncl.php#Func_Requirements">TPCL Document</a> for more information)</li>
		<li>
			a list of
				<ul>
					<li>a UInt32, Property ID</li>
					<li>a String, TPCL "Property Value" function (see <a href="ncl.php#Func_PropertyValue">TPCL Document</a> for more information)</li>
				</ul>
		</li>
	</ul>
</p>
</span>

<span class="new">
<a name="GetComponentIDs_Desc"></a>
<h3>Get Component IDs</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfComponentIDs_Desc"></a>
<h3>List Of Component IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
</p>
</span>

<a name="Properties"></a>

<span class="new">
<a name="GetProperty_Desc"></a>
<h3>Get Property Frame</h3>
<p>
	See <a href="#GetwithID_Desc">Get With ID</a>
</p>
</span>

<span class="new">
<a name="Property_Desc"></a>
<h3>Property Frame</h3>
<p>
	A Property frame consist of:
	<ul>
		<li>a UInt32, property ID</li>
		<li>a UInt64, the last modified time of this property</li>
		<li>a list of UInt32, categories this property is in</li>
		<li>a UInt32, rank of the property</li>
		<li>a String, name of the property</li>
		<li>a String, description of the property</li>
		<li>a String, TPCL "Calculate" function (see <a href="ncl.php#Func_PropertyCalculate">TPCL Document</a> for more information)</li>
	</ul>
</p>
</span>

<span class="new">
<a name="GetPropertyIDs_Desc"></a>
<h3>Get Property IDs</h3>
<p>
	See <a href="#GetIDSequence_Desc">Get ID Sequence</a>
</p>
</span>

<span class="new">
<a name="ListOfPropertyIDs_Desc"></a>
<h3>List Of Property IDs</h3>
<p>
	See <a href="#IDSequence">ID Sequence</a>
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
		<li>Figure out how to support object descriptions (ie similar to order stuff)</li>
		<li>Figure out a way for the opT_List_ID to "suggest" maximums as well as hard maximums</li>
		<li>Help support?</li>
		<li>Permissions to change your stuff? Not really needed for now...</li>
		<li>Multi-language support?</li>
		<li>Add Research support</li>
		<li>Anything else I have forgotten</li>
	</ul>
</p>

<?php
	include "../bits/end_section.inc";
	include "../bits/end_page.inc";
?>
