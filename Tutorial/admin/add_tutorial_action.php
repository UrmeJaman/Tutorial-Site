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

$uid=uniqid();

function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
	}
	$filename = stripslashes($_FILES['video']['name']);
  	$extension = getExtension($filename);
 	$extension = strtolower($extension);
	if ($extension == "mp4" || $extension == "flv" || $extension == "mkv" || $extension == "3gp" || $extension == "gif")
	{
		if ($_FILES['video']["error"] > 0)
		{
			echo  ($_FILES['video']["error"] > 0);
			echo 'file extension must be video type';
			exit;
		}
		else
		{
			if($_FILES['video']['size']>999999999) {
				echo 'file size must be less than 999MB';
				exit;
			}
			else {
                
            $file_link='video_'.$uid."_".$un.'.'.$extension;
			move_uploaded_file($_FILES['video']["tmp_name"],"../video-uploads/".$file_link);
                
            insert("INSERT INTO user_post VALUES('', '".$un."','".$_POST['name']."', '".$_POST['content']."', '".$file_link."', '', '".$_POST['category']."', '', 0, 0)");
			

            header("Location: show_tutorial.php");
                exit;
			}
		}
    }
	else
	{
		echo "File Error";
		exit;
	}
?>