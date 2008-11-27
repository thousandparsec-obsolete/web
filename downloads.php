<?php
  // import downloads.xml
  $doc = new DOMDocument();
  $doc->load( 'downloads/downloads.xml' );

	$title = "Downloads";
  $catname = $_GET[ 'category' ];

  // redirect to main/bundle product?
  if( $catname == "" && $_GET[ 'redirect' ] != "no" )
  {
    include "bits/detect.inc";
    switch( browser_detection( 'os' ) )
    {
    case 'win':
    case 'nt':
      $platname = 'win32';
      break;
    case 'mac':
      $platname = 'macosx';
      break;
    case 'lin':
      switch( browser_detection( 'os_number' ) )
      {
      case 'ubuntu':
      case 'kubuntu':
      case 'xubuntu':
        $platname = 'linux-ubuntu';
        break;
      case 'debian':
        $platname = 'linux-debian';
        break;
      case 'redhat':
      case 'fedora':
        $platname = 'linux-redhat';
        break;
      case 'gentoo':
        $platname = 'linux-gentoo';
        break;
      }
      break;
    }

    if( $platname != "" )
    {
      header( "Location: download-instructions.php?product=tpclient-pywx&platform=" . $platname );
    }
  }
	
  include "bits/start_page.inc";
?>

<style type="text/css">
<!--
.new { color: #00ff00; }
.fixme { color: #ff0000; }
.inote { color: #ffff00; }

ul.response {
	margin-top: 0.5em;
	margin-bottom: 0.25em;
	font-size: 8pt;
	padding-left: 0.25em;
}

ul.response ul {
	margin-top: 0em;
	margin-bottom: 0em;
	padding-left: 1em;
}

-->
</style>

<table class='menu'><tr>
<td><a href='downloads.php?redirect=no' class='<?php echo $catname == '' ? 'on' : ''; ?>'>All Modules</a></td>

<?php
  // category menu
  $xcategories = $doc->getElementsByTagName( "category" );
  foreach( $xcategories as $xcategory )
  {
    $aclass = $xcategory->getAttribute( "name" ) == $catname ? 'on' : '';
    print "<td><a href='downloads.php?category=" . $xcategory->getAttribute( "name" ) . "' class='" . $aclass . "'>" . $xcategory->getElementsByTagName( "longname" )->item(0)->nodeValue . "</a></td>";
  }
  print "</tr></table>";

  if( $catname == "" )
  {
    // display some general information on the All Modules page
    include "bits/start_section.inc";
    print "<h1>Downloads</h1>";
    print "<p>As a versatile framework, the Thousand Parsec project consists of a number of different modules. There are multiple client, server, and AI implementations, as well as a variety of utilities and development libraries for several languages. These modules are categorized below. Please click on the <i>Download</i> link next to your platform to see instructions on obtaining and installing a package.</p>";
    include "bits/end_section.inc";
    include "bits/start_section.inc";
    print "<h1>Quick Start</h1>";
    print "<h2>Online Play</h2>";
    print "<p>For online play, all you need is a Thousand Parsec client. Download <a href=\"downloads.php?category=client#tpclient-pywx\">tpclient-pywx</a> for your platform.</p>";
    print "<h2>Single Player</h2>";
    print "<p>For single player games, you will need a locally installed Thousand Parsec server and one or more AI clients in addition to a normal Thousand Parsec client. Download <a href=\"downloads.php?category=client#tpclient-pywx\">tpclient-pywx</a> and <a href=\"downloads.php?category=server#tpserver-cpp\">tpserver-cpp</a> for your platform, then download one or more <a href=\"downloads.php?category=ai#ai\">AI clients</a> supporting the ruleset you wish to play.</p>";
    include "bits/end_section.inc";
  }

  // create the array of platforms
  $platforms = array();
  $xplatforms = $doc->getElementsByTagName( "platform" );
  foreach( $xplatforms as $xplatform )
  {
    $platforms[ $xplatform->getAttribute( "name" ) ] = $xplatform->getElementsByTagName( "longname" )->item(0)->nodeValue;
  }

  // create the array of rulesets
  $rulesets = array();
  $xrulesets = $doc->getElementsByTagName( "ruleset" );
  foreach( $xrulesets as $xruleset )
  {
    $rulesets[ $xruleset->getAttribute( "name" ) ] = $xruleset->getElementsByTagName( "longname" )->item(0)->nodeValue;
  }


  // categories
  $xcategories = $doc->getElementsByTagName( "category" );
  foreach( $xcategories as $xcategory )
  {
    if( $catname == "" || $xcategory->getAttribute( "name" ) == $catname )
    {
      print "<a name=\"" . $xcategory->getAttribute( "name" ) . "\" />";
      include "bits/start_section.inc";
      print "<h1>" . $xcategory->getElementsByTagName( "longname" )->item(0)->nodeValue . "</h1>";

      // products
      $xproducts = $xcategory->getElementsByTagName( "product" );
      foreach( $xproducts as $xproduct )
      {
        if( $xproduct->getAttribute( "visible" ) == "no" )
        {
          continue;
        }
        print "<a name=\"" . $xproduct->getAttribute( "name" ) . "\" />";
        $prodname = $xproduct->getAttribute( "name" );
        print "<h2>" . $xproduct->getElementsByTagName( "longname" )->item(0)->nodeValue . "</h2>";
        print "<table class='tabular' style='width: auto;'><tr>";
        // icon
        $imgfile = ( "img/products/" . $prodname . ".png" );
        if( ! file_exists( $imgfile ) )
        {
          $imgfile = "img/products/default-" . $xcategory->getAttribute( "name" ) . ".png";
        }
        print "<td><img src=\"" . $imgfile . "\" alt=\"" . $prodname . "\"></td>";
        // description
        print "<td><p>" . $xproduct->getElementsByTagName( "description" )->item(0)->nodeValue . "</p>";
        // rulesets
        $xrules = $xproduct->getElementsByTagName( "rules" );
        if( $xrules->length > 0 )
        {
          $rulestr = "<p><b>Supported Rulesets:</b> ";
          foreach( $xrules as $xrule )
          {
            $rulestr .= $rulesets[ $xrule->nodeValue ] . ", ";
          }
          print substr( $rulestr, 0, -2 ) . "</p>";
        }
        print "</td></tr></table><br />";

        // packages
        print "<table class='tabular' style='width: auto;'><tr><td align='center'><b>Platform</b></td><td align='center'><b>Current Version</b></td></tr>";
        $r = 0;
        $xpackages = $xproduct->getElementsByTagName( "package" );
        foreach( $xpackages as $xpackage )
        {
          $platname = $xpackage->getAttribute( "platform" );
          print "<tr class='row" . $r . "'>";
          $r = ( $r + 1 ) % 2;
          print "<td><img src='img/platforms/" . $platname . "-sm.png'> " . $platforms[ $platname ] . "</td>";
          print "<td align='center'>" . $xpackage->getAttribute( "version" ) . "</td>";
          $linkstr = $platname == 'developer' ? 'Repository' : 'Download';
          print "<td align='center'><a href='download-instructions.php?product=" . $prodname . "&platform=" . $platname . "'>" . $linkstr . "</a></td>";
          print "</tr>";
        }
        print "</table>";
      }
      include "bits/end_section.inc";
    }
  }

	include "bits/end_page.inc";
?>
