<?php
include('db.php');
$un='';
session_start();
if(isset($_SESSION['login_user'])) {
	$un=$_SESSION['login_user'];

    delete("DELETE FROM like_tracker WHERE username='".$un."' AND post_id='".$_GET['id']."'");
    insert("INSERT INTO like_tracker VALUES('', '".$un."', '".$_GET['id']."')");
    header('Location: tutorial.php?id='.$_GET['id'].'&msg=liked');
    exit;
}
?>