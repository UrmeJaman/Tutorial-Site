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


update("UPDATE user_post SET title = '".$_POST['name']."', content = '".$_POST['content']."', category_id = ' ".$_POST['category']."' WHERE id='".$_GET['id']."'");

header("Location: show_tutorial.php");
	exit;
?>