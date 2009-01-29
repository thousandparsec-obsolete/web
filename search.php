<?php $title = "Search" ; ?>
<?php include "bits/start_page.inc" ?>

<style type="text/css">

#sb {
	margin: 2px;
	background: #000000;
	border: 1px solid white;
	color: #ffffff;
}

#qt {
	margin: 2px;
	background: #000000;
	border: 1px solid white;
	color: #ffffff;
}
</style>

<?php include "bits/start_section.inc" ?>
<form action="/tp/search.php" id="cse-search-box">
  <div style="text-align: center; width: 100%;">
    <input type="hidden" name="cx" value="013215799341597957085:-jwhg5lztgk" />
    <input type="hidden" name="cof" value="FORID:9" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input id="sb" type="text" name="q" size="31" />
    <input id="qt" type="submit" name="sa" value="Search" />
  </div>
</form>

<div id="cse-search-results" style="text-align: center;"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = document.getElementById("cse-search-results").offsetWidth-100;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
<?php include "bits/end_section.inc" ?>

<?php include "bits/end_page.inc" ?>
