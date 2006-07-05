<?php $title = "Source Code" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc"; ?>

<h1>How to access Thousand Parsec source code</h1>

<p>
	We have moved from CVS (with all it's faults and issues) to
	<a href="http://www.darcs.net/" title="Darcs RCS system website">Darcs</a>.
	Most distributions have Darcs, but it is not normally installed. Windows 
	users and download binaries from the Darcs website.
</p><p>
	Note about modules: when <i>module</i> or <i>modulename</i> are shown below, 
	they should be replaced with the actual module name, which can be found by 
	<a href="http://darcs.thousandparsec.net/darcsweb/darcsweb.cgi">DarcsWeb</a>.
</p>

<?php include "bits/end_section.inc"; ?>
<?php include "bits/start_section.inc"; ?>

<h2>About Darcs</h2>
<p>
	Darcs (Dave's Advanced Revision Control System) is a tool used by many 
	software developers to manage changes within their source code tree. 
	Darcs provides the means to store not only the current version of a piece
	of source code, but a record of all changes (and who made those changes)
	that have occurred to that source code. Darcs changes are handled as a 
	collection of patches, and each developer can pick and choose which changes
	they take, or record. Patches can be sent by email, and later applied by a
	different developer.
</p><p>
	In order to access a Darcs repository, you must install a special piece of
	software called a darcs client; darc clients are available for most 
	operating systems.
</p> 

<h2>Anonymous Darcs Access</h2>
<p>
	Our Darcs repositories are available at 
	<a href="http://darcs.thousandparsec.net/repos/">http://darcs.thousandparsec.net/repos/</a>.
	If you want to grab the latest code then run:

<blockquote>
	<tt>darcs get --partial http://darcs.thousandparsec.net/repos/<i>module</i></tt>
</blockquote>

	This will create a directory for the module and download the lastest code. 
	The <q>--partial</q> flag reduces the amount of data you have to download. 
	You only have to do this once - after the first time, run 

<blockquote>
	<tt>darcs pull http://darcs.thousandparsec.net/repos/<i>module</i></tt>
</blockquote> 

	in the <i>module</i> directory to get the newest changes.
</p>

<!--
<h2>Anonymous CVS Access</h2>
<p><strong>Note: this section subject to change.</strong></p>
<p>
	This project's CVS repository can be checked out through anonymous (pserver)
	CVS with the following instruction set. The module you wish to check out
	must be specified as the <i>modulename</i>. When prompted for a password
	for <i>cvsanon</i>, simply press the Enter key.  To determine the names of
	the modules created by this project, you may examine their CVS repository
	via the provided 
	<a href="http://www.thousandparsec.net/tp/dev/viewcvs.php/">
	web-based CVS repository viewer</a>.
</p> 

<p>
	<tt>cvs -d:pserver:cvsanon@cvs.thousandparsec.net:/tp login<br>&nbsp;</tt>
	<tt>cvs -z3 -d:pserver:cvsanon@cvs.thousandparsec.net:/tp co <i>modulename</i></tt>
</p>

<p>
	Updates from within the module's directory do not need the -d parameter.
</p>

<p>
	<b>NOTE:</b>There are two "quick" modulenames. These will get the modules you
	need to get started, they are <i>client</i> (for your client needs) and 
	<i>server-python</i> (for the python server and support libs).
</p>
-->

<?php include "bits/end_section.inc"; ?>
<?php include "bits/start_section.inc"; ?>

<h2>Central Darcs repository write access.</h2>
<p>
	If you have developed something useful for Thousand Parsec, let us know! 
	Mithro and Lee can give out write access, and any developer with write access 
	can commit patches for you and you still get the credit. Use <tt>darcs send</tt>
	to send your patches to the developer working on the module, or the tp-devel
	mailing list.
</p>

<?php include "bits/end_section.inc"; ?>
<?php include "bits/end_page.inc" ; ?>
