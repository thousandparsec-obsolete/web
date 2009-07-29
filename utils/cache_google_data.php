<?php
require('googleCodeStats.php');

$stats = new GoogleCodeStats('thousandparsec');
$data = $stats->getFeed('issues', 'CSV', -1, '?can=2&colspec=Reporter%20Component');
?>
