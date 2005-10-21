<?php $title = "Downloads" ; ?>

<?php $downloads = "downloads/"; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>
<?php 

function display($directory) {
	global $downloads;

	$dir = $downloads . $directory;
	$files = @get_files($dir);

	foreach ($files as $file) {
		if ( substr($file, -4) == '.rpm' || substr($file, -4) == ".deb" ) {
			$second = strrpos(substr($file, 0, strrpos($file, '-')-1), '-');
			$goodness = substr($file, $second+1);
		} else {
			$goodness = substr($file, strrpos($file, '-')+1);
		}
		
		list($major, $minor, $revision, $tar, $compression) = split("\.", $goodness, 5);
	
		$size = (int)(filesize($dir . $file)/1024);

		print "<p>\n";
		print "	<a href=\"$dir$file\"> Version $major.$minor.$revision </a> $tar/$compression, $size KB \n";
		print "</p>\n";
	}
}
?>

<h2>Mirrors</h2>
<p>
	All files are are mirrored on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078">SourceForge here</a>. 
	The SourceForge mirror also includes a complete archive of released files.
</p>

<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>C++ Server</h2>
<p>
	This is the main server for Thousand Parsec.
</p><p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153889">SourceForge here</a>.
</p>
<?php display("tpserver-cpp/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python Server</h2>
<p>
	This is a server for Thousand Parsec written in Python and using a SQL back end.
</p>
<?php display("tpserver-py/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python wxWidgets client</h2>
<p>
	This client should work on any computer which has wxPython and Python installed.
	The following operating systems are officially supported,
</p><p>
	<ul>
		<li>MacOS X</li>
		<li>Debian</li>
		<li>Ubuntu</li>
		<li>Windows 2000</li>
		<li>Windows XP</li>
	</ul>
</p><p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153890">SourceForge here</a>.
</p>
<?php display("tpclient-pywx/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python Text client</h2>
<p>
	This client works with any computer which has Python and the python network library
	installed. This client can only be checked out of CVS at the moment.
</p><p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153889">SourceForge here</a>.
</p>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>Python TP Network Library</h2>
<p>
	This library is used by all the python applications to communicate over the network.
</p><p>
	All python clients and servers <b>require</b> this library to function. Windows 
	binaries do not require a separate download, the library is include in the binary.
</p><p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153888">SourceForge here</a>.
</p>
<?php display("py-netlib/"); ?>
<?php include "bits/end_section.inc" ?>
<?php include "bits/start_section.inc" ?>

<h2>C++ TP Protocol Library</h2>
<p>
	The library libtpproto-cpp is a client side library written in C++ for TP.  It
	is fully featured and can be easily extended in a number of ways including
	logging, socket to the server and async frame handling.
</p>
<?php display("libtpproto-cpp/"); ?>

<?php include "bits/end_section.inc" ?>
<?php include "bits/end_page.inc" ?>
