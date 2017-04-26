<?php
session_start(); // Starting Session
if (!isset($_POST['username']) && !isset($_POST['password'])) {
	echo 'Error in Software, Contact Admin';	
	}
	else
	{
	require_once('configuration.php');
	$key = md5(microtime().rand()); 
	// Define $username and $password
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$enryptpassword=md5($password);
	// SQL query to fetch information of registerd users and finds user match.
	$login = mysql_query("SELECT * FROM exe_manager WHERE uname='$username' AND upass='$enryptpassword'");
	$rows = mysql_num_rows($login);
		if ($rows == 1) {
			$uid= mysql_result(mysql_query("SELECT uid FROM exe_manager WHERE uname='$username' AND upass='$enryptpassword'"),0);
			$keyset = mysql_query("UPDATE exe_manager SET ukey='$key' WHERE uid='$uid'");
				if($keyset){
				// Initializing Session
				$_SESSION['ukey']=$key;
				$_SESSION['uid']=$uid;
				echo 'hamburger';  
				}else{echo 'Initializing Session failed';}
		} else{
		echo 'Please enter a correct username and password. ';
		}
mysql_close($connection); // Closing Connection
}
?>