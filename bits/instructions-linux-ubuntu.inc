<?php
$dist = 'DIST';
$distopts = array( '[feisty]', '[gutsy]', '[hardy]', '[intrepid]' );
foreach( $distopts as $distopt )
{
  if( preg_match( $distopt, $_SERVER[ 'HTTP_USER_AGENT' ] ) )
  {
    $dist = substr( $distopt, 1, -1 );
  }
}
?>
<p>Some Thousand Parsec packages appear in the standard software repositories for Ubuntu, but you can obtain more current releases using our APT repository as follows:</p>
<ol>
<li>The packages and the repository meta-data are digitally signed, so you'll need to import the key into your apt's list of trusted keys in order to not get warnings about it:
<blockquote><code>curl http://packages.thousandparsec.net/key.asc | sudo apt-key add - </code></blockquote></li>
<li>Add the following lines to either your <code>/etc/apt/sources.list</code> file or to a new file in <code>/etc/apt/sources.list.d</code><?php if( $dist == 'DIST' ) { echo ", replacing <font color='red'>DIST</font> with <font color='red'>feisty</font> (Ubuntu 7.04), <font color='red'>gutsy</font> (Ubuntu 7.10), or <font color='red'>hardy</font> (Ubuntu 8.04) as appropriate for your system"; } ?>:</li>
<blockquote><code># Thousand Parsec repository at packages.thousandparsec.net<br />
deb http://packages.thousandparsec.net/<font color="red"><?php echo $dist . " " . $dist ?></font> universe<br />
deb-src http://packages.thousandparsec.net/<font color="red"><?php echo $dist . " " . $dist ?></font> universe</code></blockquote></li>
<li>Update your local copy of the package meta-data:
<blockquote><code>sudo apt-get update</code></blockquote></li>
</ol>
