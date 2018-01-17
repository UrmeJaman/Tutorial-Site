<?php
session_start();
if(isset($_SESSION['login_user'])) {
	include('../db.php');
	$un=$_SESSION['login_user'];
}
else {
	header("Location: /dash.php");
	exit;
}
?>
<html>
<head>
<title>Tutorial</title>
</head>
<body style="background: #E0E0D1; margin:0; padding:0;">
	<div style="margin:0 auto; width:900px; position:relative; text-align:center;">
		<div style="height:150px; width:896px; border:2px solid black; background:#FCFCFA; float:left;">
		<h1 style="font-size:55px;"><a style="text-decoration:none; color:black;" href="dash.php">Tuitorial</a></h1>
		</div>
		<div style="width:900px; background:#FCFCFA; margin-top:-2px; float:left;">
			<div style="width:580px; height:400px; border:2px solid black; float:left; padding:10px; font-size:15px; text-align:left;">
			<h3>Welcome Back, <?php echo $un; ?></h3>
			
			
			<?php
			$sql="SELECT * FROM user_info WHERE username='$un'";
			$result=$mysqli->query($sql);
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$propic=$row['picture'];
				}
			}
			?>
				
			
			
			<div style="clear:both"></div>
				<p><img src="../uploads/pp_<?php echo $propic; ?>" height="100px" width="250px" /></p>
				<p><button style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;"><a style="text-decoration:none; color:black;" href="edit_profile.php">Edit Profile</a></button></p>
				<p><button style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;"><a style="text-decoration:none; color:black;" href="delete_profile.php">Delete profile</a></button></p>
			</div>
			
			<?php if($_SESSION['user_roll']=='admin') { //ADMIN MENUUUUUUUUUUUUUUUUUUUUU ?>
			
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			
			<p><a style="text-decoration:none; color:black;" href="../index.php">Home</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="add_category.php">Add Category</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="show_category.php">Show Category</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="add_tutorial.php">Add TUTORIAL</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="show_tutorial.php">SHOW ALL TUTORIAL</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="show_users.php">SHOW ALL USERS</a></p>
			
			<?php } else {  //USER MENUUUUUUUUUUUUUUUUUUUUUU ?>
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="../index.php">Watch tutorial </button></a></p>
			
			<?php } ?>
			
		</div>
	</div>
</body>
</html>