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

                  
print_r($GLOBALS);


                
            insert("INSERT INTO comment_table VALUES('', '".$un."','".$_POST['comment']."', '".$_POST['title']."')");
			


            header(".php");
                exit;
	
?>