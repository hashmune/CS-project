<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect("localhost","root","");
//edit the database name
$db = mysql_select_db("bigdata", $connection);
//clock
date_default_timezone_set('Asia/Kolkata');
$clock = date('Y-m-d h:i:s');
?>