<?php
  $title = "Protocol Definition Ver 0.2";
  include "../bits/start_page.inc";
  include "../bits/start_section.inc";
?>

<h1>Protocol Definition for Thousand Parsec</h1>
<h3>Version 0.2</h3>

<p>Last updated 29 April 2004.</p>

<p>
    This protocol definition is for the Thousand Parsec project. It
    is designed as a simple, easy to implement protocol. It is designed by
    Lee Begg (and modified by Tim Ansell) and any questions should be
    directed at these two or the tp-devel mailing list.
</p>

<p>
    This version of the protocol replaces the <a href="protocol.php">previous version (0.1)</a> and
    has improvements where we noticed we could have done better.  Any server
    should try to remain backward compatible with version 0.1 for a period
    to allow the clients to be ported gradually.
</p>

<p>
    This protocol will only change in a backward compatible way, with
    respect to current versions and revisions that the client(s) and
    server are using. Any change that is not backward compatible will
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
    Data does not need to be 32 bit aligned. Strings will be prefixed by the 32
    bit integer length (include null terminator) with no padding necessary. A list will be of
    only one type (IE Int32 or Int64) and be prefixed by an Int32 for the
    number of items in the list.
<p>
<p>
    All integers are in Network Byte Order (Big Endian).
</p>
<p>
    In this document a 32 bit integer is shown as &lt;n&gt; and a 64 bit
    integer as &lt;&lt;n&gt;&gt;.  ASCII text is shown as normal.
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
        <td><b>Type</b></td>
        <td>4 * Char</td>
        <td>UInt32</td>
        <td>UInt32</td>
        <td>UInt32</td>
        <td>data</td>
    </tr>
    <tr>
      <td><b>Description and notes</b></td>
      <td>Always has value "TP02" ("TP" plus version number), no null terminator.</td>
      <td>
        An incrementing number "sequence number". The sequence number
        should alway be one more then the previous packets sequence number.
      </td>
      <td>Type of data, see table below</td>
      <td>Length of data in bytes, must be multiplies of 4</td>
      <td>The data</td>
    </tr>
    <tr>
      <td><b>Example</b></td>
      <td>TP02</td>
      <td>2345</td>
      <td>2</td>
      <td>21</td>
      <td>&lt;5&gt;blah\0&lt;6&gt;blah2\0</td>
    </tr>
  </tbody>
</table>
</p>
<p>
    The Client may start with any positive (it's an unsigned number) sequence number except 
    zero (0).  Server replies with have sequence numbers that are the same as the sequence
    number on the operation they are a response to.  If the server sends a frame that is not
    a response, the frames sequence number will be zero (0).
</p>
<p>    
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>

<h2>Types</h2>
<p>
    There are a number of types that can be put in types field of the
    packet. There is no meaning in odd/even distinction in this version.
    The types are listed below:
</p>
<p>
    If there is no C++ enum value, it is not current implemented yet and
    should be taken as advisory only.
</p>
<p>
    <b>Warning:</b> these values have changed from version 0.1 to 0.2.

<table border="1">
  <tbody>
    <tr>
      <td><b>Value</b></td>
      <td><b>Name</b></td>
      <td><b>Java Constant</b></td>
      <td><b>C++ enum</b></td>
      <td><b>Description</b></td>
      <td><b>ParsecStone</b></td>
    </tr>
    
    <tr>
      <td colspan="6" align="center"><b>Generic Responses</b></td>
    </tr>
    <tr>
      <td>0</td>
      <td>Ok</td>
      <td>&nbsp;</td>
      <td>ft02_OK</td>
      <td>Ok, continue or passed</td>
      <td>Alpha</td>
    </tr>
    <tr>
      <td>1</td>
      <td>Fail</td>
      <td>&nbsp;</td>
      <td>ft02_Fail</td>
      <td>Failed, stop or impossible</td>
      <td>Alpha</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Sequence</td>
      <td>&nbsp;</td>
      <td>ft02_Sequence</td>
      <td>Multiple frames will follow</td>
      <td>Alpha</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Connecting</b></td>
    </tr>
    <tr>
      <td>3</td>
      <td>Connect</td>
      <td>&nbsp;</td>
      <td>ft02_Connect</td>
      <td>Can I connect?</td>
      <td>Alpha</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Login</td>
      <td>&nbsp;</td>
      <td>ft02_Login</td>
      <td>Login with username/password</td>
      <td>Alpha</td>
    </tr>
    
    <tr>
      <td colspan="6" align="center"><b>Objects</b></td>
    </tr>
    <tr>
      <td>5</td>
      <td>Get Objects by ID</td>
      <td>&nbsp;</td>
      <td>ft02_Object_GetById</td>
      <td>Returns object with the IDs.</td>
      <td>Bravo</td>
    </tr>
    <tr>
      <td>6</td>
      <td>Get Objects by Position</td>
      <td>&nbsp;</td>
      <td>ft02_Object_GetByPos</td>
      <td>Returns all objects within a sphere.</td>
      <td>Bravo</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Object</td>
      <td>&nbsp;</td>
      <td>ft02_Object</td>
      <td>Description of an Object</td>
      <td>Bravo</td>
    </tr>
    <tr>
      <td colspan="6" align="center"><b>Orders</b></td>
    </tr>
    <tr>
      <td>8</td>
      <td>Get Order Description</td>
      <td>&nbsp;</td>
      <td>ft02_OrderDesc_Get</td>
      <td>Returns a description of an order type</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Order Description</td>
      <td>&nbsp;</td>
      <td>ft02_OrderDesc</td>
      <td>Describes an order type and it's parameters</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>10</td>
      <td>Get Order</td>
      <td>&nbsp;</td>
      <td>ft02_Order_Get</td>
      <td>Returns a description of an order</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>11</td>
      <td>Order</td>
      <td>&nbsp;</td>
      <td>ft02_Order</td>
      <td>Description of an order</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>12</td>
      <td>Insert Order</td>
      <td>&nbsp;</td>
      <td>ft02_Order_Insert</td>
      <td>Insert order on object before slot</td>
      <td>Charlie</td>
    </tr>
    <tr>
      <td>13</td>
      <td>Remove Order</td>
      <td>&nbsp;</td>
      <td>ft02_Order_Remove</td>
      <td>Remove an order from a slot of an object</td>
      <td>Charlie</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Time</b></td>
    </tr>
    <tr>
      <td>14</td>
      <td>Get Time remaining</td>
      <td>&nbsp;</td>
      <td>ft02_Time_Remaining_Get</td>
      <td>Get the amount of time before the end of turn</td>
      <td>Echo</td>
    </tr>
    <tr>
      <td>15</td>
      <td>Time remaining</td>
      <td>&nbsp;</td>
      <td>ft02_Time_Remaining</td>
      <td>The amount of time before the end of turn</td>
      <td>Echo</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Messages</b></td>
    </tr>
    <tr>
      <td>16</td>
      <td>Get Boards</td>
      <td>&nbsp;</td>
      <td>ft02_Board_Get</td>
      <td>Get a list of message boards the player can see.</td>
      <td>Foxtrot</td>
    </tr>
    <tr>
      <td>17</td>
      <td>Board</td>
      <td>&nbsp;</td>
      <td>ft02_Board</td>
      <td>A Message.</td>
      <td>Foxtrot</td>
    </tr>
    <tr>
      <td>18</td>
      <td>Get Message</td>
      <td>&nbsp;</td>
      <td>ft02_Message_Get</td>
      <td>Get a Message from a board.</td>
      <td>Foxtrot</td>
    </tr>
    <tr>
      <td>19</td>
      <td>Message</td>
      <td>&nbsp;</td>
      <td>ft02_Message</td>
      <td>A Message.</td>
      <td>Foxtrot</td>
    </tr>
    <tr>
      <td>20</td>
      <td>Post Message</td>
      <td>&nbsp;</td>
      <td>ft02_Message_Post</td>
      <td>Post a message to a board.</td>
      <td>Foxtrot</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Resources</b></td>
    </tr>
    <tr>
      <td>21</td>
      <td>Get Resource Description</td>
      <td>&nbsp;</td>
      <td>ft02_ResDesc_Get</td>
      <td>Returns a description of an resource type</td>
      <td>Foxtrot</td>
    </tr>
    <tr>
      <td>22</td>
      <td>Resource Description</td>
      <td>&nbsp;</td>
      <td>ft02_ResDesc</td>
      <td>Describes a resource</td>
      <td>Foxtrot</td>
    </tr>

    <tr>
      <td colspan="6" align="center"><b>Obsolete</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Get Outcome</td>
      <td>&nbsp;</td>
      <td>ft_Get_Outcome</td>
      <td>Get the probable outcome of an order</td>
      <td>Delta</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Outcome</td>
      <td>&nbsp;</td>
      <td>ft_Outcome</td>
      <td>The Outcome of an order in a slot on an object</td>
      <td>Delta</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Get Result</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Get the result of some order or event</td>
      <td>Echo</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Result</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>The Result of an order or event</td>
      <td>Echo</td>
    </tr>
    
    
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/start_section.inc";
?>


<h2>Data Packet formats</h2>
<p>
    The different types have different formats for the Data Packet. Any Data
    Packet may have be extended at any time in a backward compatible manner.
    The program should just ignore any extra data in the Data Packet which
    it does not understand.
</p>

<h3>OK Packet</h3>
<p>
    The OK packet consists of:
    <ul>
        <li>
            a String, the string can be safely ignored - however it may 
			contain useful information for debugging purposes)
        </li>
    </ul>
</p>

<h3>Fail Packet</h3>
<p>
    A fail packet consists of:
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
        <li>4 - No such thing, The object/order does not exist</li>
        <li>...</li>
    </ul>
    Exception: If the connect packet is not valid TP frame, this
    packet will not be returned, instead a plain text string will be sent saying that the wrong
    protocol has been used. A fail packet may be send if the wrong protocol version is detected.
    This does not affect clients as they should always get the connect packet right.
</p>

<h3>Sequence Packet</h3>
<p>
    Sequence packet consist of:
    <ul>
        <li>a UInt32, giving the number of packets to follow</li>
    </ul>
    This packet will proceed a response which requires numerous packets to be complete.
</p>

<h3>Connect Packet</h3>
<p>
    The Connect packet consists of:
    <ul>
        <li>a String, a client identification string</li>
    </ul>
    The client identification string can be any string but will mostly
    used to produce stats of who uses which client.
</p>

<h3>Login Packet</h3>
<p>
    The Login packet consists of:
    <ul>
        <li>a String, the username of the player</li>
        <li>a String, the password</li>
    </ul>
    Currently the password will be transmitted in plain text, further
    security will be added in future version.
</p>

<h3>Get Object by ID Packet</h3>
<p>
    A Get Object by ID packet consist of:
    <ul>
        <li>a list UInt32, object IDs of the object requested<li>
    </ul>
    An object ID of 0 is the top level Universe object.
</p>

<h3>Object Packet</h3>
<p>
    An Object packet consist of:
    
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
        <li>
            4 by UInt32 of padding, for future expansion of common
            attributes
        </li>
        <li>
            extra data, as defined by each object type
        </li>
    </ul>

Example:
&lt;0&gt;&lt;0&gt;&lt;9&gt;Universe\0&lt;&lt;2^64-1&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;&lt;&lt;0&gt;&gt;
&lt;2&gt;&lt;1&gt;&lt;2&gt;&lt;0&gt;&lt;0&gt;

<h3>Get Objects by Position Packet</h3>
<p>
    A Get Objects by Position packet consist of:
    <ul>
        <li>3 by Int64, giving the position of center the sphere</li>
        <li>a UInt64, giving the radius of the sphere</li>
    </ul>
    This will return a bunch of Objects which are inside the sphere. If
    a sphere size of zero is used all object at the point will be returned.
</p>

<h3>Get Order Packet, Remove Order Packet</h3>
<p>
    Get Order packet and Remove Order packet have the Int32 ID of the
    object it's on, and a list of Int32 slot numbers for the orders that
    are to be sent or removed.
</p>
<p>
    Note: You should sent Remove Order slot numbers in decrementing value if
    you don't want strange things to happen. (IE 10, 4, 1)
</p>

<h3>Order Packet, Insert Order packet</h3>
<p>
    A Order packet consist of:
    <ul>
        <li>a UInt32, Object ID of the order is on/to be placed on</li>
        <li>a UInt32, Order Type ID</li>
        <li>a UInt32, Slot number of the order/to be put in, -1 will insert
			at the last position, otherwise it is inserted before the number</li>
        <li>a UInt32, (Read Only) The number of turns the order will take</li>
        <li>a list of</li>
		<ul>
	        <li>a UInt32, The resource ID</li>
	        <li>a UInt32, The units of that resource required</li>
		</ul>
    	<li>extra data, required by the order is appended to the end</li>
    </ul>

	The extra data is defined by Order descriptions packets. The number of turns and the size of the
	resource list should be zero (0) when sent by the client.<br>
	<br>
	<b>Note:</b> Order type ID's below 1000 are reserved for orders defined 
	by the extended protocol specification.
</p>

</p>

<h3>Describe Order Packet</h3>
<p>
    This packet contains a list of Int32 which are the order types to be described.
</p>

<h3>Order Description Packet</h3>
<p>
    The Order Description packet contains:
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
	</ul>
	The Argument Types are given below:  <b>NOTE: read only fields are currently not transmitted at any time</b>
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
      <td>opT_Space_Coord_Abs</td>
      <td>Coordinates in absolute space. (Relative to the center of the Universe)</td>
      <td>
          <ul>
            <li>Int 64, read write, X value</li>
            <li>Int 64, read write, Y value</li>
            <li>Int 64, read write, Z value</li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Time</td>
      <td>1</td>
      <td>opT_Time</td>
      <td>The number of turns before something happens.</td>
      <td>
          <ul>
            <li>Int 32, read write, number of turns</li>
            <li>Int 32, read only, maximum number of turns</li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Object</td>
      <td>2</td>
      <td>opT_Object_ID</td>
      <td>An object's ID number.</td>
      <td>
          <ul>
            <li>UInt 32, read write, objects id</li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Player</td>
      <td>3</td>
      <td>opT_Player_ID</td>
      <td>A player's ID number, Int32</td>
      <td>
          <ul>
            <li>UInt 32, read write, players id</li>
            <li>UInt 32, read only, mask (ON bits should be not be able to be selected),
                <ul>
                    <li>0x00000001 - Allies</li>
                    <li>0x00000002 - Trading Partner</li>
                    <li>0x00000004 - Neutral</li>
                    <li>0x00000008 - Enemies</li>
                    <li>0x00000016 - Non-player</li>
                </ul>
            <li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Relative Space Coordinates</td>
      <td>4</td>
      <td>opT_Space_Coord_Rel</td>
      <td>Coordinates in absolute space relative to an object</td>
      <td>
          <ul>
            <li>UInt 32, read write, ID of the object these coordinates are relative to</li>
            <li>Int 64, read write, X value</li>
            <li>Int 64, read write, Y value</li>
            <li>Int 64, read write, Z value</li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Range</td>
      <td>5</td>
      <td>opT_Range</td>
      <td>A number value from a range</td>
      <td>
          <ul>
            <li>Int 32, read write, value</li>
            <li>Int 32, read only, minimum value</li>
            <li>Int 32, read only, maximum value</li>
            <li>Int 32, read only, value to increment by</li>
          </ul>
      </td>
    </tr>
    <tr>
      <td>Resource List</td>
      <td>6</td>
      <td>opT_Resource_List</td>
      <td>A list of resources</td>
      <td>
        A list of:
	<ul>
	  <li>a UInt32, The resource ID</li>
          <li>a UInt32, The units of that resource required</li>
	</ul>
      </td>
    </tr>
	
</table>
</p>

<h3>Get Time Remaining</h3>
<p>Get the time remaining before the end of turn.  No data</p>

<h3>Time Remaining</h3>
<p>Contains one Int32, with the time in seconds before the next end
of turn starts.  Can be sent at any time.  If the value is 0 then the
end of turn has just started.</p>

<h3>Get Resource Description</h3>
<p>
    Get the Resource Description. 
</p>

<h3>Resource Description</h3>
<p>
	A Resource is something that things are build out of, or consumed 
	in production of something (ie work units).

    A Resource Description consist of:
    <ul>
        <li>a UInt32, Resource ID</li>
        <li>a String, singular name of the resource</li>
        <li>a String, plural name of the resource</li>
        <li>a String, singular name of the resources unit</li>
        <li>a String, plural name of the resources unit</li>
        <li>a String, description of the resource</li>
        <li>a UInt32, weight per unit of resource (0 for not applicable)</li>
        <li>a UInt32, size per unit of resource (0 for not applicable)</li>
    </ul>
</p>


<h3>Other Packets</h3>
<p>
	All other data packets are not defined yet and shall be added to
	this protocol version (unless the protocol is revised).
</p>
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
  </tbody>
</table>
</p>

<?php
  include "../bits/end_section.inc";
  include "../bits/end_page.inc";
?>


