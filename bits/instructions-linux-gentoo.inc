<p>All Thousand Parsec packages are installed on Gentoo Linux via our Portage overlay. You can use this overlay with Layman as follows:</p>
<ol>
<li>Make sure Layman and Git are installed.</li>
<li>Add the following URL to the list of remote overlays in <code>/etc/layman/layman.cfg</code>:<br>
<code>http://thousandparsec.net/tp/downloads/layman-tp.xml</code></li>
<li>Run <code>layman -a thousand-parsec</code> (you may need to <code>layman -L</code> first).</li>
</ol>
<p>For more information regarding overlays, see the <a href="http://www.gentoo.org/proj/en/overlays/userguide.xml">Gentoo overlays users' guide</a>.
