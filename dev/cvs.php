<?php $title = "How to access CVS" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc"; ?>

<h1>How to access Thousand Parsec CVS</h1>

<p>
We use a system similar to Sourceforge. I've basicly modified their documentation.
</p>
<p>
If you use a <i>modulename</i> of <i>.</i> (thats a single full stop) you will get everything.
</p>

<p><b>About CVS</b></p>
<p>CVS (Concurrent Versions System) is a tool used by many software developers to manage changes within their source code tree.  CVS provides the means to store not only the current version of a piece of source code, but a record of all changes (and who made those changes) that have occurred to that source code.  Use of CVS is particularly common on projects with multiple developers, since CVS ensures changes made by one developer are not accidentally removed when another developer posts their changes to the source tree.</p>

<p>In order to access a CVS repository, you must install a special piece of software called a CVS client; CVS clients are available for most any operating system.</p> 

<p><br /><b>Anonymous CVS Access</b></p>
<p>This project's CVS repository can be checked out through anonymous (pserver) CVS with the following instruction set. The module you wish to check out must be specified as the <i>modulename</i>. When prompted for a password for <i>cvsanon</i>, simply press the Enter key.  To determine the names of the modules created by this project, you may examine their CVS repository via the provided <a href="http://www.thousandparsec.net/tp/dev/viewcvs.php/">web-based CVS repository viewer</a>.</p> 

<p><tt>cvs -d:pserver:cvsanon@cvs.thousandparsec.net:/tp login
<br>&nbsp;<br>

cvs -z3 -d:pserver:cvsanon@cvs.thousandparsec.net:/tp co <i>modulename</i>
</tt></p>

<p>Updates from within the module's directory do not need the -d parameter.</p>

<p><b>NOTE:</b>There are two "quick" modulenames. These will get the modules you need to get started, they are <i>client</i> (for your client needs) and <i>python-server</i> (for the python server and support libs).</p>
<p><br /><b>Developer CVS Access via SSH</b>

<p>Only project developers can access the CVS tree via this method. A SSH client must
be installed on your client machine. Substitute <i>modulename</i> and
<i>developername</i> with the proper values. Enter your site password when
prompted.

<p><tt>export CVS_RSH=ssh
<br>&nbsp;<br>cvs -z3 -d:ext:<i>developername</i>@cvs.thousandparsec.net:/var/lib/cvsd/tp co <i>modulename</i></tt>
<p><b>NOTE:</b> UNIX file and directory names are case sensitive.  The path to the project CVSROOT must be specified using lowercase characters (i.e. /cvsroot/gallery)



<?php include "bits/end_section.inc"; ?>

<?php include "bits/end_page.inc" ; ?>
