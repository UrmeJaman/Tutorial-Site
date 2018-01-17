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
                    
                    <h1 class="page_title">Tutorail List</h1>
                    
                    <?php $data=select("SELECT * FROM user_post WHERE category_id = '".$_GET['id']."' ORDER BY id DESC");
                            foreach($data as $row) {
                    ?>

                        <a class="all_tutorial_link" href="tutorial.php?id=<?php echo $row->id ?>"><?php echo $row->title; ?></a>
                    <?php } ?>
                    
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