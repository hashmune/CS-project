<?php
session_start();
if(!isset($_SESSION['ukey']) && !isset($_SESSION['uid'])){
	header("location: dashboard_login.php");
}
$sessionkey = $_SESSION['ukey'];
$uid = $_SESSION['uid'];
$dbkey = mysql_result(mysql_query("SELECT ukey FROM exe_manager WHERE uid='$uid'"),0);
if($dbkey != $sessionkey){ 
	header("location: ../logout.php");
}
?>