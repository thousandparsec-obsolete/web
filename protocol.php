<?php
  $title = "Protocol Definition Ver 0.1";
  include "bits/start_page.inc";
  include "bits/start_section.inc";
?>

<h1>Protocol Definition for Thousand Parasec, version 0.1</h1>
<p>This protocol definition is for the Thousand Parasec project.  It
is designed as a simple, easy to impliment protocol.  It is desgined by Lee Begg and
any questions should be directed to him.</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Basics</h2>
<p>TP will use TCP port 6923.  This port is not known to have any other services on it.</p>
<p>All data will be 32 bit aligned.  Strings will be prefixed by the 32 bit integer length and then padded
with nulls ('\0') to the next 32 bit boundary (if necessary).  All integers are in Network Byte Order
(Big Endian).</p>

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
    <td>Lenght of data in bytes, must be mutliple of 4</td>
    <td>The data</td>
  </tr>
  <tr>
    <td><b>Example</b></td>
    <td>TP01</td>
    <td>2</td>
    <td>20</td>
    <td>&lt;4&gt;lee\0&lt;8&gt;blah2\0\0\0</td>
  </tr>
</table>
</p>

<?php
  include "bits/end_section.inc";
  include "bits/start_section.inc";
?>

<h2>Types</h2>
<p>There are a number of types that can be put in types field of the packet.
Even values are sent from the client, odd values from the server. The types are listed below:
<table border="1">
  <tr>
    <td><b>Value</b></td>
    <td><b>Name</b></td>
    <td><b>Java Constant</b></td>
    <td><b>C enum</b></td>
    <td><b>Description</b></td>
    <td><b>Milestone</b></td>
  </tr>
  <tr>
    <td>0</td>
    <td>Connect</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Can I connect?</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Ok</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Ok, continue or passed</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Login</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Login packet</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Fail</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Failed, stop or impossible</td>
    <td>Alpha</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Get Object</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Get information about an object</td>
    <td>Bravo</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Object</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Object information</td>
    <td>Bravo</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Get Order</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Get infomration about an order</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Order</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Order Information</td>
    <td>Charlie</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Get Time remaining</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Get the amount of time before the end of turn</td>
    <td>Echo</td>
  </tr>
  <tr>
    <td>9</td>
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
<h3>Connect Packet, Ok Packet</h3>
<p>No Data Packet.  The length is zero.</p>
<h3>Login Packet</h3>
<p>The login packet consists of two strings. The first is the username of the player and/or character.
The second is Password. The password will be transimitted in plaintext, futher security will be added in
future version.</p>
<h3>Fail Packet</h3>
<p>A fail packet consists of a integer code, a text string of the error, then the packet (plus type and 
length prefix) if the error relates to a particular data packet.</p>
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
    <td><b>From</b></td><td><b>type</b></td><td><b>Data Packet</b></td><td>Description</td>
  </tr>
  <tr>
    <td>Client</td><td>Connect</td><td>&nbsp;</td><td>Can I connect? (version check)</td>
  </tr>
  <tr>
    <td>Server</td><td>Ok</td><td>&nbsp;</td><td>You can connect</td>
  </tr>
  <tr>
    <td>Client</td><td>Login</td><td>&lt;4&gt;lee\0&lt;8&gt;blah2\0\0\0</td><td>This is my username and password</td>
  </tr>
  <tr>
    <td>Server</td><td>Ok</td><td>&nbsp;</td><td>Username/password accepted</td>
  </tr>
  <tr>
    <td>Client</td><td>Get Object</td><td>&lt;no defined yet&gt;</td><td>Get the Universe object</td>
  </tr>
  <tr>
    <td>Server</td><td>Object</td><td>&lt;no defined yet&gt;</td><td>Universe object</td>
  </tr>
</table>
</p>


<?php
  include "bits/end_section.inc";
  include "bits/end_page.inc";
?>
