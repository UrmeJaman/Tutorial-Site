<?php
include('db.php');
$un='';
session_start();
if(isset($_SESSION['login_user'])) {
	$un=$_SESSION['login_user'];

    insert("INSERT INTO comment_table VALUES('', '".$un."', '".$_POST['comment']."', '".$_GET['id']."')");
    header('Location: tutorial.php?id='.$_GET['id'].'&msg=commented');
    exit;
}
?>