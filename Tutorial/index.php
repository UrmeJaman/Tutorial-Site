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
                    
                    <h1 class="page_title">All Tutorials Category</h1>
                    
                    <?php 
                        $data=select("SELECT * FROM category ORDER BY id DESC");

                        foreach($data as $row) {
                    ?>

                        <a class="all_tutorial_link" href="category.php?id=<?php echo $row->id ?>"><?php echo $row->name; ?></a>
                    <?php } ?>
                    
                    <?php } else { ?>
                    
                    <div class="w3-content w3-display-container">
                        <img class="mySlides" src="image_slider/img1.jpg" style="width:100%">
                        <img class="mySlides" src="image_slider/img2.jpg" style="width:100%">
                        <img class="mySlides" src="image_slider/img3.jpg" style="width:100%">
                        <img class="mySlides" src="image_slider/img4.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img5.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img6.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img7.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img8.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img9.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img10.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img11.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img12.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img13.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img14.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img15.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img16.jpg" style="width:100%">
						<img class="mySlides" src="image_slider/img18.jpg" style="width:100%">
						
						
						
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