<?php $title = "Source Code" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc"; ?>

<h1>How to access Thousand Parsec Source Code</h1>

<h2>Quick Summary</h2>

<p>To check out a copy of the code make sure you have 
	<a href="http://git.or.cz/cogito/">Cogito</a> installed, then use the
	following command:</p>
	<blockquote>
		<tt>cg-clone
		git://git.thousandparsec.net/git/&lt;project&gt;.git</tt>
	</blockquote>
</p>

<p>Projects can be found by browsing the gitweb at 
		<a href="http://git.thousandparsec.net/"
				>http://git.thousandparsec.net/</a>.</p>

<p>To update from upstream use <tt>cg-update</tt>.</p>

<p>Developers can access the git tree using:
	<blockquote>
		<tt>cg-clone
		git+ssh://<em>user</em>@git.thousandparsec.net/var/lib/git/<em>project</em>.git</tt>
	</blockquote>
</p>

<h2>Resources</h2>

<p>There are a fair number of resources available for git.  The <a
href="http://git.or.cz/">git website</a> has a many available.

<p>For people with some understanding of revision control systems (such as
CVS) take a look at 
	<a href="http://www.kernel.org/pub/software/scm/git/docs/everyday.html"
		>Everyday Git in Twenty Commands or So</a>.  This covers most
the things that you will use most of the time.  It focuses on Git rather then
cogito.</p>

<p>For cogito the introduction is excellent, and is probably shipped with your
distrubution (for debian uses try: <a
href="file:///usr/share/doc/cogito/introduction.html">file:///usr/share/doc/cogito/introduction.html</a>).
Otherwise it is online at: 
	<a
	href="http://www.kernel.org/pub/software/scm/cogito/docs/introduction.html">http://www.kernel.org/pub/software/scm/cogito/docs/introduction.html</a>.
</p>

<p>Other good resources include the 
	<a href="http://git.or.cz/course/cvs.html">CVS Crash Course</a>,
	<a href="http://git.or.cz/course/svn.html">SVN Crash Course</a>,
	<a href="http://www.kernel.org/pub/software/scm/git/docs/tutorial.html"
		>A tutorial introduction to git</a>,
	<a href="http://linux.yyz.us/git-howto.html"
		>The Kernel Hackers' Guide to git</a>,
	and even 
	<a href="http://wiki.winehq.org/GitWine">Git And Wine</a> (from the
	wine project).
	</p>  

<p>One short warning, make sure you are looking at documentation for the
correct version of git.  At the time of writing git is at version 1.5.1.  A
lot of documentation around focuses on git 1.4 and earlier, and there are some
notable interface improvements between 1.4 and 1.5.</p>

<h2>Using Cogito</h2>

<p><b>Getting a local copy</b>: <tt>cg-clone &lt;url&gt;</tt>.  The URL can be
fond above.  You have a local branch called 'master' and the upstream URL will
be called 'origin'. </p>

<p>To commit changes use <tt>cg-commit</tt>.  If you only want to commit a few
files use <tt>cg-commit <em>file1</em> <em>file2...</em></tt>.  Note you can
also edit which files are commited by editing the commit message.</p>

<p><tt>cg-status</tt> shows a list of changed files (and branches) and
<tt>cg-diff</tt> shows you your changes.  You can check individual files by
passing them on the command line.  Specific versions can be checked using
either their full name (40 byte SHA1 string), a shortened prefix (d7f55783836f or even d7), a tag
name, or relative to any of the above using ^ (parent), ~n (nth ancestor) or
a number of other ways.  <tt>man git-rev-parse</tt> for the full list of
specifying revisions (in short, almost any way you can think of).</p>

<p>You can register new remote branches (eg from another developer) by using
<tt>cg-branch-add <em>localname</em> <em>remoteurl</em></tt>.  You can update
your local cache of the remote branch using <tt>cg-fetch</tt>.  This allows
you to diff between the branch using <tt>cg-diff -r remotename</tt>.
Similarly you can use ^ and similar notations to get history of the
changes.</p>

<p>You can merge in changes using <tt>cg-merge <em>branchname</em></tt>.  If
you want to merge a single patch, look at <tt>git cherry-pick</tt> (not
covered in any more detail here.</p>

<p>If you want to fetch and merge a set of changes together (for instance from
upstream) use <tt>cg-update <em>branchname</em></tt>.  The default branch is
<em>origin</em> if none is supplied.</p>

<p>Creating local branches (or heads) is really easy too.  To create a new
head you just call <tt>cg-switch -c <em>branchname</em></tt>.
<tt>cg-status</tt> shows you the current branch with a '&gt;' (R indicates a
remote branch).  To switch between branches use <tt>cg-switch
<em>branchname</em></tt>.  If you want to look at a remote branch you have to use
<tt>cg-seek <em>branchname</em></tt>.  This allows you to explore the history
and the like, but not make changes.  You can also use cg-seek to check out old
versions of local branches as well.</p>

<h2>Using Git</h2>

<p>Future work... </p>

<h2>Sending Patches</h2>

<p>If you don't have developer access to the git archives (most people won't
until they have a track record of useful and good patches), there are two ways
to send patches to the developers to be applied to the main tree, email and by
remote pulls.  Email is the easiest to set up, and best for infrequent (and
new commiters.  </p>

<h3>By Email</h3>

<p>Git is quite happy to generate emails to send to the thousand parsec
mailing lists for you.  It can either save them into an imap mail box, or a
text file to be editied by your mail client.</p>

<p>To send via IMAP, you need to set up 
<a
href="http://www.kernel.org/pub/software/scm/git/docs/git-imap-send.html">git-imap-send</a>
first.  Once that is done (which you only need to do once), you can generate a
patch using:
 <blockquote><tt>git format-patch --stdout --keep-subject --attach origin |
 git imap-send</tt></blockquote>
 </p>

<p>Otherwise, you can generate the patch as a plain text file using:
 <blockquote><tt>git format-patch  --keep-subject origin</tt></blockquote></p>

<p>Send the patch to the <a
href="http://www.thousandparsec.net/tp/mailman.php/listinfo/tp-devel"
		>tp-devel</a> list.  Reviews and comments will be posted
		there, while tp-cvs will have commit logs of committed patches.
	</p>

<p>Otherwise if you have your branch in a place a developer can access, he can
do a <tt>cg-pull</tt> to bring you changes in.</p>.

<?php include "bits/end_section.inc"; ?>
<?php include "bits/end_page.inc" ; ?>


