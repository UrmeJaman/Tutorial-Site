<?php
session_start();
if(isset($_SESSION['login_user'])) {
	header('Location: dash.php');
	exit;
}
else {
	include('../db.php');
	if(isset($_GET['un']) && !empty($_GET['un']) && isset($_GET['pw']) && !empty($_GET['pw'])) {
		$un=$_GET['un'];
		$pw=$_GET['pw'];
		$sql="SELECT * FROM login WHERE username='".$un."' AND password='".$pw."'";
		$result=$mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                if($row['status']=="1") {
                    $_SESSION['login_user']=$row['username'];
                    $_SESSION['user_roll']=$row['roll'];
                    echo 'yes';
                    exit;
                }
                else {
                   echo 'inactive';
                    exit; 
                }
			}
		}
		else {
			echo 'no';
			exit;
		}
	}
	else {
		echo 'empty';
		exit;
	}
}
?>