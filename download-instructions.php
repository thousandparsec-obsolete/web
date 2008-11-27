<?php
	$title = "Download Instructions";

  $prodname = $_GET[ 'product' ];
  if( $prodname == "" )
  {
    $prodname = "tpclient-pywx";
  }
  $platname = $_GET[ 'platform' ];
  if( $platname == "" )
  {
    $platname = "win32";
  }

  // import downloads.xml
  $doc = new DOMDocument();
  $doc->load( 'downloads/downloads.xml' );

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
<td><a href='downloads.php?redirect=no'>All Modules</a></td>

<?php
  // category menu
  $xcategories = $doc->getElementsByTagName( "category" );
  foreach( $xcategories as $xcategory )
  {
    $aclass = $xcategory->getAttribute( "name" ) == $catname ? 'on' : '';
    print "<td><a href='downloads.php?category=" . $xcategory->getAttribute( "name" ) . "'>" . $xcategory->getElementsByTagName( "longname" )->item(0)->nodeValue . "</a></td>";
  }
  print "</tr></table>";

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

  include "bits/start_section.inc";

  $xcategories = $doc->getElementsByTagName( "category" );
  foreach( $xcategories as $xcategory )
  {
    $xproducts = $xcategory->getElementsByTagName( "product" );
    foreach( $xproducts as $xproduct )
    {
      if( $xproduct->getAttribute( "name" ) == $prodname )
      {
        $prodlongname = $xproduct->getElementsByTagName( "longname" )->item(0)->nodeValue;
        print "<h1>Download " . $prodlongname . " for " . $platforms[ $platname ] . "</h1>";
        print "<table class='tabular' style='width: 100%;'><tr>";
        // icons
        $imgfile = ( "img/products/" . $prodname . ".png" );
        if( ! file_exists( $imgfile ) )
        {
          $imgfile = "img/products/default-" . $xcategory->getAttribute( "name" ) . ".png";
        }
        print "<td width=\"64\"><img src=\"" . $imgfile . "\" alt=\"" . $prodname . "\"></td>";
        print "<td width=\"64\"><img src=\"img/platforms/" . $platname . "-lg.png\" alt=\"" . $platforms[ $platname ] . "\"></td>";
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
        print "</td>";
        $shotfile = ( "img/screenshots/" . $prodname . ".png" );
        if( file_exists( $shotfile ) )
        {
          print "<td><a href=\"" . $shotfile . "\"><img src=\"" . $shotfile . "\" border=\"0\" height=\"200\" /></a></td>";
        }
        print "</tr></table><br />";

        print "<h2>General Instructions for " . $platforms[ $platname ] . "</h2>";
        include "bits/instructions-" . $platname . ".inc";

        print "<h2>Specific Instructions for " . $prodlongname . "</h2>";
        $xpackages = $xproduct->getElementsByTagName( "package" );
        foreach( $xpackages as $xpackage )
        {
          if( $xpackage->getAttribute( "platform" ) == $platname )
          {
            $available = true;
            // instructions
            $xinstructions = $xpackage->getElementsByTagName( "instruction" );
            if( $xinstructions->length > 0 )
            {
              print "<h3>Instructions</h3><ul>";
              foreach( $xinstructions as $xinstruction )
              {
                print "<li>" . $xinstruction->nodeValue . "</li>";
              }
              print "</ul>";
            }
            // requirements
            $xrequirements = $xpackage->getElementsByTagName( "requirement" );
            if( $xrequirements->length > 0 )
            {
              print "<h3>Requirements</h3><ul>";
              foreach( $xrequirements as $xrequirement )
              {
                print "<li>" . $xrequirement->nodeValue . "</li>";
              }
              print "</ul>";
            }
            // files
            $xfiles = $xpackage->getElementsByTagName( "file" );
            if( $xfiles->length > 0 )
            {
              $linkstr = $platname == 'developer' ? 'Repository' : 'Download';
              $linkimg = $platname == 'developer' ? 'dlrepo' : 'dlfile';
              print "<h3>" . $linkstr . "</h3><table class='tabular' style='width: auto;'>";
              foreach( $xfiles as $xfile )
              {
                print "<tr><td><a href='" . $xfile->getAttribute( "href" ) . "'><img src='img/" . $linkimg . ".png' alt='Download' /></a></td><td><a href='" . $xfile->getAttribute( "href" ) . "'><b>" . $xfile->nodeValue . "</b></a></td></tr>";
              }
              print "</table>";
            }
            break;
          }
        }
        if( ! $available )
        {
          print "<i>Module is not currently available for this platform.</i>";
        }
        break;
      }
    }
  }

  include "bits/end_section.inc";
	include "bits/end_page.inc";
?>
