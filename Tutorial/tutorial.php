<?php
include('db.php');
$un='';
session_start();
if(isset($_SESSION['login_user'])) {
	$un=$_SESSION['login_user'];
}
?>
<html>
    <head>
        <title>Tutorial Site</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
    </head>
    <body>
        <div class="main">
            <div class="header">
                <a href="#">Tutorial Site</a>  
            </div>
            <div class="main_content">
                <div class="left">
                   
                   
                    
                    <?php if($un != '') { ?>
                    
                    <?php $data=select("SELECT * FROM user_post WHERE id = '".$_GET['id']."' ORDER BY id DESC");
                        foreach($data as $row) {
                    ?>
                    
                    <h6 class="page_title"><?php echo $row->title; ?></h6>

                    
                    <video width="698"  controls autoplay>
                      <source src="video-uploads/<?php echo $row->video_link; ?>"  type="video/mp4">
                      Your browser does not support HTML5 video.
                    </video>
                    
                    <p class="content"><?php echo $row->content; ?></p>
                    
                    <?php } ?>
                    
                    
                    
                    <h2 class="like">
                        Like Count: <?php 

                        $result=select("SELECT * FROM like_tracker WHERE post_id = '".$_GET['id']."' ORDER BY id DESC");

                        echo sizeof($result);

                        ?> | <?php
                                 $result=select("SELECT * FROM like_tracker WHERE post_id = '".$_GET['id']."' AND username='".$un."' ORDER BY id DESC");   
                                     if(sizeof($result)==0) {    
                                         echo '<a href="like.php?id='.$_GET['id'].'">Like</a>';

                                     }
                                      else {
                                          echo '<a href="unlike.php?id='.$_GET['id'].'">Unlike</a>';
                                      }       
                            ?>
                    </h2>
                                    
                                    
                     <h6 class="msg"><?php if(isset($_GET['msg'])) {
                         if($_GET['msg']=="liked") {
                             echo 'You have liked the Tutorial';
                         }
                        else if($_GET['msg']=="unliked") {
                             echo 'You have unliked the Tutorial';
                         }
                        else if($_GET['msg']=="commented") {
                             echo 'You Have commented on this Tutorial';
                         }

                    } ?></h6>
                                    
                    <form class="comment" action="add_comment.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    Your comment:


                       <textarea name="comment"></textarea><br>

                        <p><br /><input name="submit" value="comment" type="submit" /></p>

                       </form>  
                    <div style="clear:both"></div>

                    <div style="padding:10px; width:671px; border:2px solid black; background:#FCFCFA; float:left; margin-top:-2px;">
                        <h1>Comment List</h1><br></br>
                    <?php $data=select("SELECT * FROM comment_table WHERE post_id = '".$_GET['id']."' ORDER BY id DESC");
                                foreach($data as $row) {
                            ?>
                    <p><span style="font-size:18px; font-weight: bold;"><?php echo $row->username; ?>: </span> <?php echo $row->comment; ?></p>

                    <?php } ?>
                    </div>
                                    
                    <?php } ?>
                                     
                                                                       
                    
                </div>
                <div class="right">
                    <?php if($un == '') { ?>
                    
                    <a class="sidebar_link" href="admin/login.php">LOGIN</a> 
		            <a class="sidebar_link" href="reg.php">Register</a>
                    
                    <?php } else { ?>
                    
                    <form class="search" action="search_tutorial.php" method="post">
                
                        <p>Search Tutorial by title: <input name="title" type="text" /> &nbsp; <input type="submit" value="Search" /></p>

                    </form> 
                    
                    <a class="sidebar_link" href="admin/dash.php">Dashboard</a>
                    
                    <a class="sidebar_link" href="admin/logout.php">Logout</a>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        <script src="javascript.js"></script>
    </body>
</html>