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

	print "<table class='tabular' style='width: auto;'>\n";

	$i = 0;
	foreach ($files as $file) {
		$tail = substr($file, -4);
	
		if ($tail == '.asc' || $tail == '.sig')
			continue;
		if ($tail == '.rpm' || $tail == ".deb" ) {
			$second = strrpos(substr($file, 0, strrpos($file, '-')-1), '-');
			$goodness = substr($file, $second+1);
		} else {
			$goodness = substr($file, strrpos($file, '-')+1);
		}
	
		$size = (int)(filesize($dir . $file)/1024);
		
		unset($tar);
		if (substr_count($goodness, ".") > 3) {
			$result = split("\.", strrev($goodness), 5);
			list($compression, $tar, $revision, $minor, $major) = array_map('strrev',$result);
		} else {
			$result = split("\.", strrev($goodness), 4);
			list($compression, $revision, $minor, $major) = array_map('strrev',$result);
		}
		
		$pos = strpos($revision, '-');
		if ($pos !== False)
			$revision = substr($revision, 0, $pos);
		if ($previous != "$major.$minor.$revision") {
			print " <tr>\n";
			print "   <th colspan='3' style='padding-top: 0;'><h3>Version $major.$minor.$revision</h3></th>\n";
			print " </tr>\n";
			$previous = "$major.$minor.$revision";
		}

		print " <tr class=\"row{$i}\">\n";
		$i = ($i+1) % 2; 

		if (isset($tar))
			print " <td><a href='$dir$file'>$tar/$compression</a></td>\n";
		else
			print " <td><a href='$dir$file'>$compression</a></td>\n";
		print " <td class='numeric'>$size KB</td>\n";

		if (file_exists("$dir$file.asc"))
			print "	 <td><a href='$dir$file.asc'><i>Signature</i></a></td>\n";
		else if (file_exists("$dir$file.sig"))
			print "	 <td><a href='$dir$file.sig'><i>Signature</i></a></td>\n";
		else
			print "  <td></td>\n";

		print " </tr>\n";
		
	}
	print "</table>\n";
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
</p>
<?php display("tpserver-cpp/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153889">SourceForge here</a>.
</p>
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
	If you want to download and play with the client, use the following files for each
	operating system,
	<ul>
		<li>Windows - use the setup/exe</li>
		<li>Unsupported Linux (non RPM) - use the inplace version</li>
		<li>Unsupported Linux (RPM) - use the RPM version, you will also need the RPMs
		of libtpclient-py and libtpproto-py</li>
		<li>Supported Linux - use the inplace version for the time being until debs
		appear in the distribution</li>
		<li>MacOS X - use the inplace version until a package is available</li>
	</ul>
</p>
<?php display("tpclient-pywx/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153890">SourceForge here</a>.
</p>
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
<h2>Python TP Client library</h2>
<p>
	This library is used by all the more complicated python applications to share
	common code.
</p><p>
	You do <b>not</b> require this library if you are using a prebuild binary or the
	inplace version of the client.
</p>
<?php display("libtpclient-py/"); ?>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<h2>Python TP Network Library</h2>
<p>
	This library is used by all the python applications to communicate over the network.
</p><p>
	All python clients and servers <b>require</b> this library to function. 
</p><p>
	You do <b>not</b> require this library if you are using a prebuilt binary or the
	inplace version of the client.
</p>
<?php display("py-netlib/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153888">SourceForge here</a>.
</p>
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
