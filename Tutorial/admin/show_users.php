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
?>
<html>
<head>
<title>Add Category</title>
</head>
<body style="background: #E0E0D1; margin:0; padding:0;">
	<div style="margin:0 auto; width:900px; position:relative; text-align:center;">
		<div style="height:150px; width:896px; border:2px solid black; background:#FCFCFA; float:left;">
		<h1 style="font-size:55px;"><a style="text-decoration:none; color:black;" href="dash.php">Back</a></h1>
		</div>
		<div style="width:900px; background:#FCFCFA; margin-top:-2px; float:left;">
			<div style="width:580px; height:400px; border:2px solid black; float:left; padding:10px; font-size:15px; text-align:left;">
			<h3>Welcome Back, <?php echo $un; ?></h3>
			
			
			<?php $data=select("SELECT * FROM login ORDER BY id DESC");
                    foreach($data as $row) {
                ?>
            <p><?php echo $row->username; ?> | 
            <?php if($row->status=="0") echo '<a href="change_user_status.php?id='.$row->id.'&status=1">Activate</a> (Can\'t Login Now)'; else echo '<a href="change_user_status.php?id='.$row->id.'&status=0">Deactive</a>(Can Login Now)'; ?> | 
            <a href="edit_user.php?id=<?php echo $row->id ?>">Edit</a> | <a href="delete_user.php?id=<?php echo $row->id ?>">Delete</a></p>
            <?php } ?>
			
			
			<div style="clear:both"></div>
            </div>
			<?php if($_SESSION['user_roll']=='admin') { ?>
			
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			
			<p><a style="text-decoration:none; color:black;" href="index.php">Home</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="add_category.php">Add Category</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="show_category.php">Show Category</a></p>
			
			<?php } else { ?>
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="index.php"><>Home</button></a></p>
			
			<?php } ?>
			
		</div>
	</div>
    
    
    
</body>
</html>