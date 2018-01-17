<?php
session_start();
if(isset($_SESSION['login_user'])) {
    
    if($_SESSION['user_roll']=='admin') ;
    else header("Location: /dash.php");
    
	include('../db.php');
	$un=$_SESSION['login_user'];
    $role=$_SESSION['user_roll'];
}
else {
	header("Location: /dash.php");
	exit;
}


update("UPDATE category SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."'");

header("Location: show_category.php");
	exit;
?>