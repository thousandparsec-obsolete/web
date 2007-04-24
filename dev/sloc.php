<?php $title = "Lines of Code" ?>
<?php include "bits/start_page.inc" ; ?>

<?php include "bits/start_section.inc" ; ?>
<center>
<?php 

if (is_readable("bits/sloc.inc"))
	include "bits/sloc.inc" ; 
else
	include "http://www.thousandparsec.net/tp/dev/bits/sloc.inc" ;

?>
</center>
<br>
<br>
<?php include "bits/end_section.inc" ; ?>

<?php include "bits/end_page.inc" ; ?>
