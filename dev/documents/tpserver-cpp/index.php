<?php
  $title = "CPP-Server Documentation";
  include "../../bits/start_page.inc";
  include "../../bits/start_section.inc";
?>

<h1>tpserver-cpp Documentation</h1>
<p>The tpserver-cpp documentation is now on the wiki, so please have a look at the <a href="/wiki/Tpserver-cpp">tpserver-cpp wiki pages</a>. While the content below was true for a time, more up to date information is on the wiki.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>


<h1>Documentation of cpp-server</h1>
<p>Last updated 2 August 2004.</p>
<p>This document outlines the design of the cpp-server and some of the ideas behind it.</p>
<p>Most of this documentation is coming from my Advanced OO Design project at Uni.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>UML Diagram</h2>
<p>Just to prove I'm serious, here is the full UML diagram as on 24 July.</p>
<a href="tp-server-040724-full.png"><img src="tp-server-040724-full-small.png" alt="Small UML diagram, click of large size"></a>
<p>Click for a larger version.</p>

<p>Other diagrams:</p>
<ul>
  <LI><a href="tp-server-040724-simple.png">Simpler diagram (24 July)</a></LI>
  <LI><a href="tp-server-040730-focus.png">Refactoring #1 (30 July)</a></LI>
</ul>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Class List</h2>
<h2>Central Classes</h2>

<p>Most of the main classes in the server are SingletonPattern, because it only makes sense to have one of each.  These classes provide the basis for the server and most of the non-game features and code.</p>

<h3>Game</h3>
<p>The Game Class is the class that holds all the in-game information and the main interface for most game related functions.  It is SingletonPattern.</p>

<p>The Game class as a collection of IGObjects, and holds a reference to the universe object (for speed).  It provides methods like getObjectByID() and getObjectByPos().  A collection of Players is also held, and used by the connection class to associate a connection with a player.  The turn processing is done in this class, as well as timing the end of turn.</p>

<h3>Network</h3>
<p>This class provides the network interface, and with the Connection class hides the ugly C sockets.  It is partly multi-threaded.  The main loop for the program exists in the class, as it is formed around the select() system call, making the server network event driven.  This class is a SingletonPattern class, as no other object can have the main loop and network socket.  The class suports IPv6.</p>

<h3>Logger</h3>
<p>Logging is important in any server and I have found it very useful to have logging for debugging.  Again, this class is SingletonPattern and fairly similar to other Logging classes written in C++.  It nicely hides how logging is done and what is done with the log output.  Currently prints to the console only.  The methods debug(), info(), warning() and error() take printf-style variable number of arguments.</p>

<h3>Console</h3>
<p>The Admin console, currently the terminal the server is running on.  Allows some basic control of the server.  SingletonPattern as there is only one terminal.</p>

<h3>Settings</h3>
<p>Settings class (obviously) and again, SingletonPattern.  Currently not used.  Waiting for a good design for it, low priority.</p>

<h3>Frame</h3>
<p>This class is representation of what is sent across the network.  Data is packed into it by type.  Is send on the network and created from the network by the Connection class.</p>

<h3>Connection</h3>
<p>This class is the current network connection to a player.  Is controlled and contained by the Network class.  Holds details on the type of network connection and what version of the protocol the client is running, and creates the correct type of frame.  Looks after the players socket and is responsable for sending and receiving Frames. Suports IPv6.</p>

<h3>Player</h3>
<p>The representation of the Player, including login name and password.  Collection held by Game object.  Actions all the processing of client request frames.</p>

<p>The processSomething methods in player are used to handle the various frame types that can come from the client. Player::processIGFrame() is the entry point for the connection to pass the frame, and this method chooses which of the processBlah() methods is called. Hence, processIGFrame() is public. I was surprised when I noticed that the processBlah() methods are protected - they could be private without any change. I'm not even sure if they should be in that class. </p>

<h3>IGObject</h3>
<p>The In Game Objects (hence the name).  Uses the StrategyPattern for the various types of objects that could exist (the {{{ObjectData}}} class) as it is posible for an object to change from one type to another, without the destruction of the current object and the creation of a new one (ie: "becomes...").  Common object attributes, such as position, size, velocity, etc, are in this class, along with objects that are "inside" this object, Order queue and access control lists for the order queue.</p>

<h2>Object Data classes</h2>
<p>These classes are used by the IGObject class to represent the various object types that can exist.  They can set what orders are allowed on an object.</p>

<h3>ObjectData</h3>
<p>ObjectData is the baseclass/interface for the StrategyPattern hierarchy.  There are currently two methods defined, one that will be run once a turn to do any housekeeping, and the other is to pack any extra data into the Object frame that is going to be sent to a client.</p>

<h3>EmptyObject</h3>
<p>EmptyObject does not add any extra data, and is just a concrete version of ObjectData.</p>

<h3>Universe</h3>
<p>The Universe Object has the age of the universe (ie turn counter), and is added the object frame.</p>

<h3>OwnedObject</h3>
<p>This is the base class for any object data that is owned by a player (or could be owned by a player).  It holds a PlayerID (not a pointer to a player object).  It packs the playerid into object frames. </p>

<h3>Planet</h3>
<p>This is an OwnedObject, but does add any more data at this time (but will soon).</p>

<h3>Fleet</h3>
<p>Represents a fleet of ships of various types, and the amount of damage the fleet has taken.  This extra data is packed after the owner's player id.</p>

<h2>Order classes</h2>
<p>The Order classes are the orders that have been given to an IGObject.  They also define how the order is performed, and how they are serialised.</p>

<h3>Order</h3>
<p>Baseclass for Order objects.  Impliments some of the basic frame packing/unpacking and order creation in a type of FactoryMethodPattern.</p>

<h3>Nop</h3>
<p>This order tells the object to nothing for a number of turns.  The internal counter counts down and the order removed when it gets to zero (as implimented in doOrder()).  Packs and unpacks the data related to this order.</p>

<h3>Move</h3>
<p>Moves the object from the current position to a new position. </p>

<h3>Build</h3>
<p>Builds a new fleet with one ship of one type.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/end_page.inc";
?>
