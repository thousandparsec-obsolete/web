<?php $title = "Downloads" ; ?>

<?php $downloads = "downloads/"; ?>

<?php include "bits/func.inc" ?>
<?php include "bits/start_page.inc" ?>
<?php include "bits/start_section.inc" ?>

<style>
th.heading {
	color: #E1870D;
	width: 90%;
	border-bottom: 1px solid #333333;
	text-align: left;
	padding-bottom: 0px;
}
</style>


<?php 
function mycmp($a, $b) {
	print "<!-- {$a['version']}-{$a['versiontype']}-{$a['size']} {$b['version']}-{$b['versiontype']}-{$b['size']} -->\n";

	if (strcmp($a['version'], $b['version']) === 0) {
		if (strlen($a['versiontype']) > 0 || strlen($b['versiontype']) > 0) {
			if ($b['versiontype'] == $a['versiontype'])
				return strnatcmp($b['size'], $a['size']);

			// Check the super minor
 			return strcmp($b['versiontype'], $a['versiontype']);
		} else {
			if ($b['versionminor'] == $a['versionminor'])
				return strnatcmp($b['size'], $a['size']);

 			return strcmp($b['versionminor'], $a['versionminor']);
		}
	}
	return strcmp($b['version'], $a['version']);
}

function display($directory) {
	global $downloads;

	$dir = $downloads . $directory;
	$files = @get_files($dir);

	print "<table class='tabular' style='width: auto;'>\n";

	$i = 0;

	$details = array();
	foreach ($files as $file) {
		if (substr($file, 0, 1) == '.')
			continue;

		$tail = substr($file, -4);
		if ($tail == '.asc' || $tail == '.sig')
			continue;
		if (substr($file, -5) == '.size')
			continue;

		# Figure out the ending of this file
		$formatmap = array(
			".dmg"			=> "Mac dmg",
			".zip"			=> "zip",
			".tar.gz"		=> "tar/gz",
			".tar.bz2"		=> "tar/bz2",
			".win32.exe"	=> "setup/exe",
			"-setup.exe"	=> "setup/exe",
			"-py2.3.egg"	=> "py2.3/egg",
			"-py2.4.egg"	=> "py2.4/egg",
			"-py2.5.egg"	=> "py2.5/egg",
			"-noarch.rpm"	=> "noarch/rpm",
		);

		$ending = "";
		$type   = "";
		foreach ($formatmap as $ending => $type) {
			$pos = strpos($file, $ending);
			if ($pos !== false)
				break;
		}
		$version = substr($file, 0, strlen($file)-strlen($ending));
		
		# See if there is a subversion
		$versiontype  = "";
		$versionminor = "";
		if (strrpos($version, '-') > strrpos($version, '.')) {
			$versionminor = substr(substr($version, strrpos($version, '-')), 1);
			$version = substr($version, 0, strlen($version)-strlen($versionminor)-1);

			# Is this a string version?
			if (!is_numeric($versionminor)) {
				$versiontype  = $versionminor;
				$versionminor = "";
			}
		}

		# Get the other versions
		$version = substr($version, max(strrpos($version, '_'), strrpos($version, '-'))+1);

		$sfonly = file_exists("$dir$file.size");
		if ($sfonly)
			$size = (int)(trim(file_get_contents("$dir$file.size"))/1024);
		else
			$size = (int)(filesize($dir . $file)/1024);

		# Does a signature exist?
		if (file_exists("$dir$file.asc"))
			$signature = "$dir$file.asc";
		else if (file_exists("$dir$file.sig"))
			$signature = "$dir$file.sig";
		else
			$signature = "";

		$details[] = array(
			'file'			=> $file, 
			'size'			=> $size, 
			'type'			=> $type,
			'sfonly' 		=> $sfonly,
			'version'		=> $version, 
			'versiontype'	=> $versiontype,
			'versionminor'	=> $versionminor,
			'signature'		=> $signature,
		);
	}

	# FIXME: Only take only the one with a largest versiontype
	usort($details, "mycmp");

	print "<table class='tabular' style='width: auto;'>";

	foreach ($details as $detail) {
		$sversion = "{$detail['version']}";
		if ($sprevious != $sversion) {
			if (strlen($sprevious) == 0) {
				print "<tr>";
				print "   <th colspan='5' class='heading'><h3>Current Version</h3></th>\n";
				print "</tr>";
			} else if (!$older) {
				print "<tr>";
				print "   <th colspan='5' class='heading' style='padding-top: 50px;'><h3>Older Versions</h3></th>\n";
				print "</tr>";
				$older = true;
			}
		}
		$sprevious = $sversion;

		$version = ucfirst($detail['versiontype'])." Version {$detail['version']}";
		if ($previous != $version) {
			print " <tr>\n";
			print "   <th colspan='3' style='padding-top: 0;'><h4>$version</h4></th>\n";
			print " </tr>\n";
		}
		$previous = $version;

		print " <tr class=\"row{$i}\">\n";
		$i = ($i+1) % 2; 

		print " <td>{$detail['type']}</td>\n";
		print " <td class='numeric'>{$detail['size']} KB</td>\n";

		if (strlen($detail['signature']) > 0)
			print "	 <td><a href='$dir{$detail['signature']}'><i>Signature</i></a></td>\n";
		else
			print "  <td></td>\n";

		if (!$detail{'sfonly'}) {
			print " <td><a href='$dir{$detail['file']}'>";
			print "		<img src='img/logo-micro.png'>\n";
			print "		Download from this host</a></td>\n";
		} else {
			print " <td></td>\n";
		}

		#print " <td><a href='http://downloads.sourceforge.net/thousandparsec/{$detail['file']}'>\n";
		print " <td><a href='http://sourceforge.net/project/downloading.php?group_id=132078&filename={$detail['file']}'>\n";
		print "		<img src='img/service_links/sf.png'>\n";
		print "		Download from Sourceforge Mirrors</a></td>\n";
		
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
<a name="tpclient-pywx"></a>
<h2>Python wxWidgets client</h2>
<p>
	This client should work on any computer which has wxPython and Python installed.
	The following operating systems are officially supported,
</p><p>
	<ul>
		<li>
<a href="http://www.debian.org">Debian</a> and 
<a href="http://www.ubuntu.com">Ubuntu</a> packages can be found on 
<a href="http://packages.thousandparsec.net">our packages repository</a>.</li><br />
        <li><span class="highlight">Windows</span>
        <ul>
                <li>Windows 98 or greater, Windows 2000 or XP preferred</li>
                <li>50mb disk space</li>
                <li>1024x768 screen or greater</li>
        </ul><br /></li>
        <li><span class="highlight">Mac OS X</span>
        <ul>
				<li>Runs on Intel- and PowerPC-based Mac computers</li>
                <li>Mac OS X 10.4.1 or higher is preferred</li>
                <li>200mb disk space</li>
                <li>1024x768 screen or greater</li>
        </ul><br /></li>
	</ul>
</p><p>
	If you want to download and play with the client, use the following files for each
	operating system,
	<ul>
		<li>Windows - use the setup/exe like any other windows application.</li>
		<li>MacOS X - use the dmg package like any other mac application.<br /></li>
		<li>Unsupported Linux - use the <b>inplace</b> version</li>
		<li>Supported Linux - use the <b>inplace</b> version for the time being until debs
		appear in the distribution</li>
	</ul>
	If is highly recommend to use versions marked <b>"inplace"</b>. These
packages have all the Thousand Parsec developed dependencies needed to run the
application.
</p><p>
</p>
<?php display("tpclient-pywx/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153890">SourceForge here</a>.
</p>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<a name="tpclient-pytext"></a>
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
<a name="libtpclient-py"></a>
<h2>Python TP Client library</h2>
<p>
	This library is used by all the more complicated python applications to share
	common code.
</p><p>
	You do <b>not</b> require this library if you are using a prebuild binary or the
	inplace version of the client.
</p>
<?php display("libtpclient-py/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=214276">SourceForge here</a>.
</p>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<a name="libtpproto-py"></a>
<h2>Python TP Network Library</h2>
<p>
	This library is used by all the python applications to communicate over the network.
</p><p>
	All python clients and servers <b>require</b> this library to function. 
</p><p>
	You do <b>not</b> require this library if you are using a prebuilt binary or the
	inplace version of the client.
</p>
<?php display("libtpproto-py/"); ?>
<p>
	Archives of <b>unsupported</b> old previous versions can be found on
	<a href="https://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153888">SourceForge here</a>.
</p>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<a name="libtpproto-cpp"></a>
<h2>C++ TP Protocol Library</h2>
<p>
	The library libtpproto-cpp is a client side library written in C++ for TP.  It
	is fully featured and can be easily extended in a number of ways including
	logging, socket to the server and async frame handling.
</p>
<?php display("libtpproto-cpp/"); ?>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<a name="tpserver-cpp"></a>
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
<a name="libtprl"></a>
<h2>C++ TP Readline library</h2>
<p>
  This library is used by tpserver-cpp to provide the console interface.
</p>
<?php display("libtprl/"); ?>
<?php include "bits/end_section.inc" ?>

<?php include "bits/start_section.inc" ?>
<a name="tpserver-py"></a>
<h2>Python Server</h2>
<p>
	This is a server for Thousand Parsec written in Python and using a SQL back end.
</p>
<?php display("tpserver-py/"); ?>
<?php include "bits/end_section.inc" ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php include "bits/end_page.inc" ?>
