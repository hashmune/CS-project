<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("location: dashboard_login.php"); // Redirecting To Home Page
}
?>