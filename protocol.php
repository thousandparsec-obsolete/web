<?php
  $title = "Protocol Definition Ver 0.1";
  include "bits/start_page.inc";
  include "bits/start_section.inc";
?>

<h1>Protocol Definition for Thousand Parsec</h1>
<h3>Version 0.1</h3>
<p>Last updated 2 May 2003.</p>
<p>This protocol definition is for the Thousand Parsec project.  It
is designed as a simple, easy to impliment protocol.  It is desgined by Lee Begg and
any questions should be directed to him.</p>
<p>This protocol will only change in a backward compatable way, with respect to current versions and
revisions that the client(s) and server are using.  Any change that is not backward compatable will
change the version number of the protocol.</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Basics</h2>
<p>TP will use TCP port 6923.  This port is not known to have any other services on it.</p>
<p>All data will be 32 bit aligned.  Strings will be prefixed by the 32 bit integer length (include null terminator) and then padded
with nulls ('\0') to the next 32 bit boundary (if necessary).  All integers are in Network Byte Order
(Big Endian).</p>
<p>In this document a 32 bit integer is shown as &lt;n&gt; and a 64 bit integer as &lt;&lt;n&gt;&gt;</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>TP Frame format</h2>
<p>A TP Frame has the following parts:
<table border="1">
  <tr>
    <td><b>Fields</b></td>
    <td>Header</td>
    <td>Type</td>
    <td>Length</td>
    <td>Data Packet</td>
  </tr>
  <tr>
    <td><b>Sizes</b></td>
    <td>32 bits</td>
    <td>32 bits</td>
    <td>32 bits</td>
    <td>length * 8 bits</td>
  </tr>
  <tr>
    <td><b>Description and notes</b></td>
    <td>Always has value &quot;TP01&quot; (&quot;TP&quot; plus version number)</td>
    <td>Type of data, see table below</td>
    <td>Length of data in bytes, must be mutliple of 4</td>
    <td>The data</td>
  </tr>
  <tr>
    <td><b>Example</b></td>
    <td>TP01</td>
    <td>2</td>
    <td>24</td>
    <td>&lt;5&gt;blah\0\0\0\0&lt;6&gt;blah2\0\0\0</td>
  </tr>
</table>
</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Types</h2>
<p>There are a number of types that can be put in types field of the packet.
Even values are sent from the client, odd values from the server. The types are listed below:</p>
<p>If there is no C++ enum value, it is not current implemented yet and should be taken as advisory only.
<table border="1">
  <tr>
    <td><b>Value</b></td>
    <td><b>Name</b></td>
    <td><b>Java Constant</b></td>
    <td><b>C++ enum</b></td>
    <td><b>Description</b></td>
    <td><b>Milestone</b></td>
  </tr>
  <tr>
    <td>0</td>
    <td>Connect</td>
    <td>&nbsp;</td>
    <td>ft_Connect</td>
    <td>Can I connect?</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Ok</td>
    <td>&nbsp;</td>
    <td>ft_OK</td>
    <td>Ok, continue or passed</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Login</td>
    <td>&nbsp;</td>
    <td>ft_Login</td>
    <td>Login packet</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Fail</td>
    <td>&nbsp;</td>
    <td>ft_Fail</td>
    <td>Failed, stop or impossible</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Get Object</td>
    <td>&nbsp;</td>
    <td>ft_Get_Object</td>
    <td>Get information about an object</td>
    <td>Bravo</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Object</td>
    <td>&nbsp;</td>
    <td>ft_Object</td>
    <td>Object information</td>
    <td>Bravo</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Get Order</td>
    <td>&nbsp;</td>
    <td>ft_Get_Order</td>
    <td>Get infomration about an order</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Order</td>
    <td>&nbsp;</td>
    <td>ft_Order</td>
    <td>Order Information</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Add Order</td>
    <td>&nbsp;</td>
    <td>ft_Add_Order</td>
    <td>Add order to an object in a slot</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Remove Order</td>
    <td>&nbsp;</td>
    <td>ft_Remove_Order</td>
    <td>Remove an order from a slot of an object</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Describe Order</td>
    <td>&nbsp;</td>
    <td>ft_Describe_Order</td>
    <td>Requests a description of an order</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Order Description</td>
    <td>&nbsp;</td>
    <td>ft_Order_Description</td>
    <td>Describes an order and it's parameters</td>
    <td>Charlie</td>
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
</table></p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Data Packet formats</h2>
<p>The different types have different formats for the Data Packet.</p>
<h3>Connect Packet</h3>
<p>No Data Packet.  The length is zero.</p>
<h3>OK Packet</h3>
<p>the OK packet in the frame may contain a string.  The string can be safely ignored.</p>
<h3>Login Packet</h3>
<p>The login packet consists of two strings. The first is the username of the player and/or character.
The second is Password. The password will be transmitted in plaintext, futher security will be added in
future version.</p>
<h3>Fail Packet</h3>
<p>A fail packet consists of a integer code, a text string of the error.</p>
<h3>Get Object Packet</h3>
<p>Packet contains the int32 object ID of the object requested.  Object 0 is the top level Universe object.</p>
<h3>Object Packet</h3>
<p>An object packet contains:
<ol>
	<li>int32 object ID,</li>
	<li>int32 object type,</li>
	<li>string name,</li>
	<li>unsigned int64 size (diameter),</li>
	<li>3 by signed int64 position,</li>
	<li>3 by signed int64 velocity,</li>
	<li>3 by signed int64 acceleration,</li>
	<li>a list of int32 object IDs of objects contained in the current object, prefixed by the int32 of the number of items in the list,</li>
	<li>a list of int32 order types that the player can send to this object prefixed by the number of items in the list,</li>
	<li>an int32 number of orders currently on this object from the player.</li>
</ol>
After the number of orders, any type specific data is appended.  Example:
&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0\0\0\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;</p>
<h3>Get Order Packet, Remove Order Packet</h3>
<p>Get Order packet and Remove Order packet have the int32 id of the object it's on, and the int32 slot number the 
order is in to be sent or removed.</p>
<h3>Order Packet, Add Order packet</h3>
<p>An Order Packet or Add Order packet has int32 Object ID of the object it's on (or to be put on), int32 type, and
which slot number it is in or should go in, -1 for last. Any extra data required by the order is appended to the end 
and is defined on a type by type basis.</p>
<h3>Describe Order Packet</h3>
<p>This packet contains a single int32, the order type to be described.</p>
<h3>Order Description Packet</h3>
<p>The Order Description packet contains: int32 order type, string name, string description, int32 number of parameters and then of each parameter:
string name, int32 typeID, string desc.  The Parameter Types are given below:
<table>
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
    <td>The number of turns before something happens, int32.</td>
    <td>&lt;n&gt;</td>
  </tr>
  <tr>
    <td>Object</td>
    <td>2</td>
    <td>opT_Object_ID</td>
    <td>An object's ID number, unsigned int32.</td>
    <td>&lt;id&gt;</td>
  </tr>
  <tr>
    <td>Player</td>
    <td>3</td>
    <td>opT_Player_ID</td>
    <td>A player's ID number, int32</td>
    <td>&lt;id&gt;</td>
  </tr>
</table></p>
<h3>Get Outcome</h3>
<p>The Get Outcome data packet consists of int32 Object id and int32 order slot number.</p>
<h3>Outcome</h3>
<p>The Outcome Frame contains int32 Objet id, int32 order slot number, int32 turns to completion,
followed by more data to be specified in future.</p>
<h3>Other Packets</h3>
<p>All other data packets are not defined yet and shall be added to this protocol version (unless the 
protocol is revised).</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Example</h2>
<p>The following is a simple example of the first interaction.</p>
<p>
<table>
  <tr>
    <td><b>From</b></td><td><b>type</b></td><td><b>Data Packet</b></td><td><b>Description</b></td>
  </tr>
  <tr>
    <td>Client</td><td>Connect</td><td>&nbsp;</td><td>Can I connect? (version check)</td>
  </tr>
  <tr>
    <td>Server</td><td>Ok</td><td>&nbsp;</td><td>You can connect</td>
  </tr>
  <tr>
    <td>Client</td><td>Login</td><td>&lt;5&gt;blah\0\0\0\0&lt;6&gt;blah2\0\0\0</td><td>This is my username and password</td>
  </tr>
  <tr>
    <td>Server</td><td>Ok</td><td>&nbsp;</td><td>Username/password accepted</td>
  </tr>
  <tr>
    <td>Client</td><td>Get Object</td><td>&lt;0&gt;</td><td>Get the Universe object</td>
  </tr>
  <tr>
    <td>Server</td>
    <td>Object</td>
    <td>&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0\0\0\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
      &lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
      &lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;</td>
    <td>Universe object</td>
  </tr>
</table>
</p>


<?php
  include "bits/end_section.inc";
  include "bits/end_page.inc";
?>
