<p>Some Thousand Parsec packages appear in the standard software repositories for Debian, but you can obtain more current releases using our APT repository as follows:</p>
<ol>
<li>The packages and the repository meta-data are digitally signed, so you'll need to import the key into your apt's list of trusted keys in order to not get warnings about it:
<blockquote><code>curl http://packages.thousandparsec.net/key.asc | sudo apt-key add - </code></blockquote></li>
<li>Add the following lines to either your <code>/etc/apt/sources.list</code> file or to a new file in <code>/etc/apt/sources.list.d</code>, replacing <font color="red">DIST</font> with <font color="red">etch</font> (Debian 4.0) or <font color="red">sid</font> (Debian Unstable) as appropriate for your system:</li>
<blockquote><code># Thousand Parsec repository at packages.thousandparsec.net<br />
deb http://packages.thousandparsec.net/<font color="red">DIST DIST</font> main<br />
deb-src http://packages.thousandparsec.net/<font color="red">DIST DIST</font> main</code></blockquote></li>
<li>Update your local copy of the package meta-data:
<blockquote><code>sudo apt-get update</code></blockquote></li>
</ol>
