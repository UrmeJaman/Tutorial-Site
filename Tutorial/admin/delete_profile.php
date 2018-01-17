<?php
session_start();
if(isset($_SESSION['login_user'])) {
    
    
    
	include('../db.php');
	$un=$_SESSION['login_user'];
    $role=$_SESSION['user_roll'];
}
else {
	header("Location: /dash.php");
	exit;
}


delete("DELETE FROM user_info WHERE username='$un'");
delete("DELETE FROM login WHERE username='$un'");

session_unset();
session_destroy();
header("Location: index.php");
	exit;
?>