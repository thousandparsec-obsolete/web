<?php
  $title = "HOWTO setup pywx-client on Windows";
  include "../../bits/start_page.inc";
  include "../../bits/start_section.inc";
?>

<h1>HOWTO setup pywx-client on Windows</h1>
<p>
	This document will walk you through how to setup pywx-client on
	windows.

	<ol>
		<li>Setting up somewhere</li>
		<li>Downloading and Installing TortioseCVS</li>
		<li>Downloading Python and support libraries</li>
		<li>Installing Python and support libraries</li>
		<li>Testing Python and support libraries installed okay</li>
		<li>Downloading py-netlib and pytext-client</li>
		<li>Testing with pytext-client</li>
		<li>Downloading pywx-client and media</li>
		<li>Using pywx-client</li>
	</ol>
</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Setting up somewhere</h2>
<p>
	The first thing we need to create a new directory to work in (I have called my directory
	"thousandparsec"). Inside this directory we are going to create another directory called 
	"downloads" which are going to put all the things we download for easy access at a later
	date. The first image below shows what your structure should look like.
</p>
<center><img src="1.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Downloading and Installing TortioseCVS</h2>
<p>
	You will need to download TortioseCVS and put it in your downloads directory. 
	You can download TortoiseCVS from here - 
	<a href="http://prdownloads.sourceforge.net/tortoisecvs/TortoiseCVS-1.7.3.exe">
		http://prdownloads.sourceforge.net/tortoisecvs/TortoiseCVS-1.7.3.exe
	</a>
</p><p>
	The following image shows me downloading TortoiseCVS.
</p>
<center><img src="2.jpg"></center>

<p>
	Now you now need to install TortioseCVS. Just double-click on the package you have just 
	downloaded or click the "Open" button if you still have the download screen up. You should
	be able to just follow the prompts, all the defaults should be exactly what you want. 
	Here are the screens you should see and the values that should be entered.
</p>

<center><img src="3.jpg"></center>
<center><img src="4.jpg"></center>
<center><img src="5.jpg"></center>
<center><img src="6.jpg"></center>
<center><img src="7.jpg"></center>

<p>
	It is <b>REALLY</b> important that you reboot. This is one of the only programs which
	actually requires you to reboot your computer. You are now ready to continue to the next
	stage.
</p>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Downloading Python and support libraries</h2>
<p>
	You will need to download Python 2.3.4 and put it in your downloads directory. 
	You can download Python from here -
	<a href="http://www.python.org/ftp/python/2.3.4/Python-2.3.4.exe">
		http://www.python.org/ftp/python/2.3.4/Python-2.3.4.exe
	</a>
</p><p>
	The following image shows me downloading Python 2.3.4
</p>

<center><img src="8.jpg"></center>

<p>
	You will need to also download wxPython 2.5.1 and put it in your downloads directory. 
	You can download wxPython from here -
	<a href="http://prdownloads.sourceforge.net/wxpython/wxPythonWIN32-2.5.1.5-Py23.exe">
		http://prdownloads.sourceforge.net/wxpython/wxPythonWIN32-2.5.1.5-Py23.exe
	</a>
</p><p>
	The following image shows me downloading wxPython 2.5.1
</p>

<center><img src="9.jpg"></center>

<p>
	You will need to also download Numeric (also called numpy) 23.1 and put it in your
	downloads directory. You can download Numeric from here -
	<a href="http://prdownloads.sourceforge.net/numpy/Numeric-23.1.win32-py2.3.exe">
		http://prdownloads.sourceforge.net/numpy/Numeric-23.1.win32-py2.3.exe
	</a>

</p><p>
	The following image shows me downloading Numeric 23.1
</p>

<center><img src="10.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Installing Python and support libraries</h2>

<p>
	Install Python by double-clicking on the the installer. If you have an older 
	version	of windows you may need to install some updated before python will install.
	Any version of Windows XP or 2000 should work fine.<br>
</p>

<center><img src="11.jpg"></center>
<center><img src="12.jpg"></center>
<center><img src="13.jpg"></center>
<center><img src="14.jpg"></center>
<center><img src="15.jpg"></center>
<center><img src="16.jpg"></center>
<center><img src="17.jpg"></center>

<p>
	After installing Python you now need to install wxPython. You can do this by
	double-clicking on the installer. You may need to install some updates if your windows
	is old. Any version of Windows XP or 2000 should work fine. You should follow the 
	prompts as given below.
</p>

<center><img src="18.jpg"></center>
<center><img src="19.jpg"></center>
<center><img src="20.jpg"></center>
<center><img src="21.jpg"></center>
<center><img src="22.jpg"></center>
<center><img src="23.jpg"></center>
<center><img src="24.jpg"></center>
<center><img src="25.jpg"></center>
<center><img src="26.jpg"></center>

<p>
	After installing Python and wxPython you now need to install Numeric. You can also
	do this by double-clicking on the installer. You should follow the prompts as given
	below.
</p>

<center><img src="27.jpg"></center>
<center><img src="28.jpg"></center>
<center><img src="29.jpg"></center>
<center><img src="30.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Testing Python and support libraries installed okay</h2>

<p>
	Now everything has installed we need to test everything works. To do this we are going
	to start up the wxPython demo and try and look at the "wxFloatCanvas" object which 
	pywx-client uses extensively. The screenshots below describe how to do this.
</p>

<center><img src="31.jpg"></center>
<center><img src="32.jpg"></center>
<center><img src="33.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Downloading py-netlib and pytext-client</h2>

<p>
	From now on it gets tricky as we have to deal with CVS.
</p>
<p>
	Startup Explorer and go to the folder you created to work in. Right click on free space in 
	the folder and select the "CVS Checkout" option. This action is shown below.
</p>
<center><img src="34.jpg"></center>
<p>
	Now you need to fill in all the values EXACTLY as shown. It is very important you get these
	right otherwise you won't be able to download the client.
</p>
<center><img src="35.jpg"></center>
<p>
	You should get a screen similar to the following. After a few seconds it should say everything
	is okay. You can just click the Close button.
</p>
<center><img src="36.jpg"></center>
<p>
	You should now have a green folder called "py-netlib". (As shown below)
</p>
<center><img src="37.jpg"></center>
<p>
	You need to rename this folder to "netlib". (As shown below)
</p>
<center><img src="38.jpg"></center>
<p>
	You now have the network library ready for use. Again, right click on the free space in the
	folder and select the "CVS Checkout" option. This time the screen will look like below. You 
	need to change the value which says py-netlib to pytext-client.
</p>
<center><img src="39.jpg"></center>
<p>
	You'll get a conformation that it worked by this screen, just click okay. (As shown below)
</p>
<center><img src="40.jpg"></center>
<p>
	You'll also have another green folder called pytext-client. (As shown below)
</p>
<center><img src="41.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/start_section.inc";
?>

<h2>Testing with pytext-client</h2>

<p>
	Enter the pytext-client folder (you should see something similar to below) and double click
	on the file called main.py.
</p>
<center><img src="42.jpg"></center>
<p>
	In the black window that pops up you should now type "debug" followed by enter. Then type
	"connect mithro.dyndns.org" followed by enter. It should display information as shown below.
</p>
<p>
	If a black window pops-up and then quickly disappears it means you have somehow stuffed up
	installing the network library or downloading pytext-client. Jump on irc and ask on 
	irc://irc.worldforge.org/#tp
</p>
<p>
	If the client complains about "Connection refused" or "Connection failed" it means that it can't
	contact the server. This means that pywx-client won't be able to contact the server either. Check
	that you don't have a firewall installed or anything and then jump on IRC and ask what is up with
	the server.
</p>
<center><img src="43.jpg"></center>
<center><img src="44.jpg"></center>
<center><img src="45.jpg"></center>

<?php
  include "../../bits/end_section.inc";
  include "../../bits/end_page.inc";
?>
