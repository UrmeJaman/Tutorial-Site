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

$data=select("SELECT * FROM user_post WHERE id='".$_GET['id']."' ORDER BY id DESC");
foreach($data as $row) {
    unlink('../video-uploads/'.$row->video_link);
}

update("DELETE FROM user_post WHERE id='".$_GET['id']."'");

header("Location: show_tutorial.php");
	exit;
?>