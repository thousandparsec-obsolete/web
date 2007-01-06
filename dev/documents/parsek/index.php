<?php
  $title = "Parsek Documentation";
  include "../../bits/start_page.inc";
  include "../../bits/start_section.inc";
?>

<h1>Documentation for Parsek client</h1>
<p>This is development documentation for Parsek, a KDE 4 client for Thousand Parsec games.</p>
<p>Here you will find description of Parsek and some info on how to get started with development.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>What is Parsek?</h2>
<p>Parsek is one of the clients for Thousand Parsec games. It is designed to run in <a href="http://www.kde.org/" target="_blank" title="K Desktop Environment">KDE</a> 4.x desktop environment.
This version of KDE is currently under development and is planned to be released somehere in the middle of 2007.
Like most of the KDE 4 applications, Parsek is programmed in C++ and uses <a href="http://www.trolltech.com/products/qt" target="_blank" title="Trolltech Qt 4">Qt 4.2</a> and KDE 4 libraries. In
addition it also uses <a href="http://www.thousandparsec.net/tp/dev/documents/libtpproto-cpp/html/" title="Thousand Parsec C++ protocol library documentation">libtpproto-cpp</a> library, which provides functions needed to communicate with Thousand
Parsec game servers.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Preparing for development</h2>
<h3>KDE 4 development environment</h3>
<p>First you will need to set up KDE 4 development environment. This means that you get Qt 4.2 and kdelibs installed.
The complete process is described on <a href="http://developernew.kde.org/Getting_Started/Build/Unstable_Version" target="_blank" title="Instructions for building KDE 4">this web page</a>.</p>
<h3>libtpproto-cpp library</h3>
<p>Before trying to compile Parsek you will also need to compile and install libtpproto-cpp library. Download it from <a href="http://sourceforge.net/project/showfiles.php?group_id=132078&package_id=153887" title="Download libtpproto-cpp">here</a>.</p>
<h3>Get Parsek source code</h3>
<p>The source code for Parsek is available in <a href="http://abridgegame.org/darcs/" target="_blank">Darcs</a> repository of Thousand Parsec project. To get the source code
for Parsek, run the command:<br />
<blockquote><kbd>darcs get --partial http://darcs.thousandparsec.net/repos/parsek</kbd></blockquote>
You use this command only for the first time you are getting the source code. Later, to update to the latest version
of source code, you run:
<blockquote><kbd>dracs pull</kbd></blockquote>
from within the parsek folder.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Compiling Parsek</h2>
<p>Now that you have development environment ready and source code on your computer it is time to compile Parsek.
For this it is recommended that you first create a separate folder for building. Then you move into this folder
and issue this command:
<blockquote><kbd>cmake -DCMAKE_BUILD_TYPE=debugfull /home/kde4dev/parsek/src</kbd></blockquote>
Be sure to replace <kbd>/home/kde4dev/parsek/src</kbd> with the actual path to Parsek source code folder. After
the <kbd>cmake</kbd> command finishes (make sure it finds everything needed) it is time to actually run the
compilation by running the command:
<blockquote><kbd>make</kbd></blockquote>
from within the build folder. After make finishes succesfully you should have the parsek binary in the build folder.</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/end_page.inc";
?>