<?php
  $title = "Protocol Definition Ver 0.1";
  include "../bits/start_page.inc";
  include "../bits/start_section.inc";
?>

<h1>Protocol Definition for Thousand Parsec</h1>
<h3>Version 0.2</h3>

<p>Last updated 21 December 2003.</p>

<p>
	This protocol definition is for the Thousand Parsec project. It
	is designed as a simple, easy to impliment protocol. It is desgined by
	Lee Begg (and modifide by Tim Ansell) and any questions should be
	directed at these two.
</p>

<p>
	This protocol will only change in a backward compatable way, with
	respect to current versions and revisions that the client(s) and
	server are using. Any change that is not backward compatable will
	change the version number of the protocol.
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Basics</h2>
<p>
	TP will use TCP port 6923. This port is not known to have any other
	services on it.
</p>
<p>
	All data will be 32 bit aligned. Strings will be prefixed by the 32
	bit integer length (include null terminator) and then padded with nulls
	('\0') to the next 32 bit boundary (if necessary). A list will be of 
	only one type (ie int32 or int64) and be prefixed by an int32 for the
	length of the list.
<p>
<p>
	All integers are in Network Byte Order (Big Endian).
</p>
<p>
	In this document a 32 bit integer is shown as &lt;n&gt; and a 64 bit
	integer as &lt;&lt;n&gt;&gt;
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>TP Frame format</h2>
<p>
	A TP Frame has the following parts:
<table border="1">
  <tbody>
    <tr>
      <td><b>Fields</b></td>
      <td>Header</td>
	  <td>Sequence Number</td>
      <td>Type</td>
      <td>Length</td>
      <td>Data Packet</td>
    </tr>
    <tr>
      <td><b>Sizes</b></td>
      <td>32 bits</td>
      <td>32 bits</td>
      <td>32 bits</td>
      <td>32 bits</td>
      <td>length * 8 bits</td>
    </tr>
    <tr>
      <td><b>Description and notes</b></td>
      <td>Always has value "TP02" ("TP" plus version number)</td>
	  <td>
		An autoincrementing number "sequence number". The sequence number
		should alway be one more then the previous packets sequence number.
      </td>
      <td>Type of data, see table below</td>
      <td>Length of data in bytes, must be mutliple of 4</td>
      <td>The data</td>
    </tr>
    <tr>
      <td><b>Example</b></td>
      <td>TP02</td>
	  <td>2345</td>
      <td>2</td>
      <td>24</td>
      <td>&lt;5&gt;blah\0\0\0\0&lt;6&gt;blah2\0\0\0</td>
    </tr>
  </tbody>
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Types</h2>
<p>
	There are a number of types that can be put in types field of the
	packet. Even values are sent from the client, odd values from the
	server. The types are listed below:
</p>
<p>
	If there is no C++ enum value, it is not current implemented yet and
	should be taken as advisory only.

<table border="1">
  <tbody>
    <tr>
      <td><b>Value</b></td>
      <td><b>Name</b></td>
      <td><b>Java Constant</b></td>
      <td><b>C++ enum</b></td>
      <td><b>Description</b></td>
      <td><b>Milestone</b></td>
    </tr>
	
    <tr>
      <td colspan="6" align="center"><b>Generic Responses</b></td>
    </tr>
    <tr>
      <td>0</td>
      <td>Ok</td>
      <td>&nbsp;</td>
      <td>ft_OK</td>
      <td>Ok, continue or passed</td>
      <td>Alpha</td>
    </tr>
    <tr>
      <td>1</td>
      <td>Fail</td>
      <td>&nbsp;</td>
      <td>ft_Fail</td>
      <td>Failed, stop or impossible</td>
      <td>Alpha</td>
    </tr>
	
    <tr>
      <td colspan="6" align="center"><b>Connecting</b></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Connect</td>
      <td>&nbsp;</td>
      <td>ft_Connect</td>
      <td>Can I connect?</td>
      <td>Alpha</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Login</td>
      <td>&nbsp;</td>
      <td>ft_Login</td>
      <td>Login with username/password</td>
      <td>Alpha</td>
    </tr>
	
    <tr>
      <td colspan="6" align="center"><b>Objects</b></td>
    </tr>
    <tr>
      <td>4</td>
      <td>Get Object by ID</td>
      <td>&nbsp;</td>
      <td>ft_Object_Get</td>
      <td>Returns an object with the same ID.</td>
      <td>Bravo</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Get Objects by Position</td>
      <td>&nbsp;</td>
      <td>ft_Object_GetByPos</td>
      <td>Returns all objects within a sphere.</td>
      <td>Bravo</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Object</td>
      <td>&nbsp;</td>
      <td>ft_Object</td>
      <td>Description of an Object</td>
      <td>Bravo</td>
    </tr>
	
    <tr>
      <td colspan="6" align="center"><b>Orders</b></td>
    </tr>
    <tr>
      <td>6</td>
      <td>Get Order Description</td>
      <td>&nbsp;</td>
      <td>ft_OrderDesc_Get</td>
      <td>Returns a description of an order type</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Order Description</td>
      <td>&nbsp;</td>
      <td>ft_OrderDesc</td>
      <td>Describes an order type and it's parameters</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>8</td>
      <td>Get Order</td>
      <td>&nbsp;</td>
      <td>ft_Order_Get</td>
      <td>Returns a description of an order</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Order</td>
      <td>&nbsp;</td>
      <td>ft_Order</td>
      <td>Description of an order</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>10</td>
      <td>Add Order</td>
      <td>&nbsp;</td>
      <td>ft_Order_Add</td>
      <td>Add order to an object in a slot</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>11</td>
      <td>Remove Order</td>
      <td>&nbsp;</td>
      <td>ft_Order_Remove</td>
      <td>Remove an order from a slot of an object</td>
      <td>Charlie</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Messages</b></td>
    </tr>
    <tr>
      <td>13</td>
      <td>Get Boards</td>
      <td>&nbsp;</td>
      <td>ft_Board_Get</td>
      <td>Get a list of message boards the player can see.</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>14</td>
      <td>Board</td>
      <td>&nbsp;</td>
      <td>ft_Board</td>
      <td>A Message.</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>15</td>
      <td>Get Message</td>
      <td>&nbsp;</td>
      <td>ft_Message_Get</td>
      <td>Get a Message from a board.</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>16</td>
      <td>Message</td>
      <td>&nbsp;</td>
      <td>ft_Message</td>
      <td>A Message.</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>17</td>
      <td>Post Message</td>
      <td>&nbsp;</td>
      <td>ft_Message_Post</td>
      <td>Post a message to a board.</td>
      <td>Charlie</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Obsolete</b></td>
    </tr>
    <tr>
      <td>12</td>
      <td>Get Outcome</td>
      <td>&nbsp;</td>
      <td>ft_Get_Outcome</td>
      <td>Get the probable outcome of an order</td>
      <td>Delta</td>
    </tr>
    <tr>
      <td>13</td>
      <td>Outcome</td>
      <td>&nbsp;</td>
      <td>ft_Outcome</td>
      <td>The Outcome of an order in a slot on an object</td>
      <td>Delta</td>
    </tr>
    <tr>
      <td>14</td>
      <td>Get Result</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Get the result of some order or event</td>
      <td>Echo</td>
    </tr>
    <tr>
      <td>15</td>
      <td>Result</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>The Result of an order or event</td>
      <td>Echo</td>
    </tr>
    <tr>
      <td>16</td>
      <td>Get Time remaining</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Get the amount of time before the end of turn</td>
      <td>Echo</td>
    </tr>
    <tr>
      <td>17</td>
      <td>Time remaining</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>The amount of time before the end of turn</td>
      <td>Echo</td>
    </tr>
	
  </tbody>
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>


<h2>Data Packet formats</h2>
<p>
	The different types have different formats for the Data Packet.	Any Data
	Packet may have be extended at any time in a backward compatible manner.
	The program should just ignore any extra data in the Data Packet which
	it does not understand.
</p>

<h3>OK Packet</h3>
<p>
	The OK packet consists of:
	<ol>
		<li>a int32 sequence number (which packet caused this ok)</li> 
		<li>
			may contain a string (the string can be	safely ignored - 
			however it may contain useful information for debugging purposes)
		</li>
	</ol>
</p>

<h3>Fail Packet</h3>
<p>
	A fail packet consists of:
	<ol>
		<li>a int32, sequence number (which packet caused this error)</li>
		<li>a int32, error code</li>
		<li>a text string, message of the error</li>
	</ol>
	Current error codes consist of:
	<ol>
		<li></li>
		<li></li>
	</ol>
</p>

<h3>Connect Packet</h3>
<p>
	No Data Packet. The length is zero.
</p>

<h3>Login Packet</h3>
<p>
	The Login packet consists of:
	<ol>
		<li>a text string, the username of the player</li>
		<li>a text string, the password</li>
	</ol>
	Currently the password will be transmitted in plaintext, futher
	security will be added in future version.
</p>

<h3>Get Object by ID Packet</h3>
<p>
	A Get Object by ID packet consits of:
	<ol>
		<li>a int32, object ID of the object requested<li>
	</ol>
	An object ID of 0 is the top level Universe object.
</p>

<h3>Get Objects by Position Packet</h3>
<p>
	A Get Objects by Position packet consits of:
	<ol>
  		<li>3 by signed int64, giving the position of center the sphere</li>
		<li>a unsigned int64, giving the radius of the sphere</li>
	</ol>
	This will return a bunch of Objects which are inside the sphere. If
	a sphere size of zero is used all object at the point will be returned.
</p>


<h3>Object Packet</h3>
<p>
	An Object packet consits of:
	
	<ol>
		<li>a int32, sequence number (which packet requested this object)</li>
		<li>a int32, object ID</li>
		<li>a int32, object type</li>
		<li>a text string, name of object</li>
		<li>unsigned int64, size of object (diameter)</li>
		<li>3 by signed int64, position of object</li>
		<li>3 by signed int64, velocity of object</li>
		<li>3 by signed int64, acceleration of object</li>
		<li>
			a list of int32, object IDs of objects contained in the current
			object
		</li>
		<li>
			a list of int32, order types that the player can send to this
			object
		</li>
		<li>a int32, number of orders currently on this object</li>
		<li>
			16 by 8bits of padding, for future expansion of common
			attributes
		</li>
		<li>
			extra data, as defined by each object type
		</li>
	</ol>

Example:
&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0\0\0\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;

<h3>Get Order Packet, Remove Order Packet</h3>

<p>
	Get Order packet and Remove Order packet have the int32 id of the
	object it's on, and the int32 slot number the order is in to be sent or
	removed.
</p>

<h3>Order Packet, Add Order packet</h3>
<p>
	An Order Packet or Add Order packet has int32 Object ID of the
	object it's on (or to be put on), int32 type, and
	which slot number it is in or should go in, -1 for last. Any extra data
	required by the order is appended to the end and is defined on a type
	by type basis.
</p>

<h3>Describe Order Packet</h3>
<p>
	This packet contains a single int32, the order type to be described.
</p>

<h3>Order Description Packet</h3>
<p>
	The Order Description packet contains: int32 order type, string
	name, string description, int32 number of parameters and then of each
	parameter:
	string name, int32 typeID, string desc. The Parameter Types are given
	below:
<table>
  <tbody>
    <tr>
      <td><b>Name</b></td>
      <td><b>Int32 Code</b></td>
      <td><b>C++ Enum</b></td>
      <td><b>Description</b></td>
      <td><b>Expected Format</b></td>
    </tr>
    <tr>
      <td>Absolute Space Coordinates</td>
      <td>0</td>
      <td>opT_Space_Coord</td>
      <td>Coordinates in absolute space, three int64: x, y, z</td>
      <td>&lt;&lt;x&gt;&gt; &lt;&lt;y&gt;&gt; &lt;&lt;z&gt;&gt;</td>
    </tr>
    <tr>
      <td>Time</td>
      <td>1</td>
      <td>opT_Time</td>
      <td>The number of turns before something happens, int32</td>
      <td>&lt;n&gt;</td>
    </tr>
    <tr>
      <td>Object</td>
      <td>2</td>
      <td>opT_Object_ID</td>
      <td>An object's ID number, unsigned int32</td>
      <td>&lt;id&gt;</td>
    </tr>
    <tr>
      <td>Player</td>
      <td>3</td>
      <td>opT_Player_ID</td>
      <td>A player's ID number, int32</td>
      <td>&lt;id&gt;</td>
    </tr>
  </tbody>
</table>
</p>


<h3>Get Outcome</h3>
<p>The Get Outcome data packet consists of int32 Object id and int32
order slot number.</p>
<h3>Outcome</h3>
<p>The Outcome Frame contains int32 Objet id, int32 order slot number,
int32 turns to completion,
followed by more data to be specified in future.</p>
<h3>Other Packets</h3>
<p>All other data packets are not defined yet and shall be added to
this protocol version (unless the protocol is revised).</p>
<h2>Example</h2>
<p>The following is a simple example of the first interaction.</p>
<p>
<table>
  <tbody>
    <tr>
      <td><b>From</b></td>
      <td><b>type</b></td>
      <td><b>Data Packet</b></td>
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
      <td>&lt;5&gt;blah\0\0\0\0&lt;6&gt;blah2\0\0\0</td>
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
      <td>&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0\0\0\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;</td>
      <td>Universe object</td>
    </tr>
  </tbody>
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>


