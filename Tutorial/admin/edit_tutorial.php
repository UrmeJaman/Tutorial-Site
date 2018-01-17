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
<script>
function validate(event) {
    var error = '';
    if(document.getElementsByName("name")[0].value=='') {
        error += 'Tutorial Name Cannot be Blank';
    }
    if(document.getElementsByName("content")[0].value=='') {
        error += ', Tutorial Description Cannot be Blank';
    }
    if(error != '') {
        event.preventDefault();
        alert(error);
    }
}    
</script>
</head>
<body style="background: #E0E0D1; margin:0; padding:0;">
	<div style="margin:0 auto; width:900px; position:relative; text-align:center;">
		<div style="height:150px; width:896px; border:2px solid black; background:#FCFCFA; float:left;">
		<h1 style="font-size:55px;"><a style="text-decoration:none; color:black;" href="dash.php">Dashboard</a></h1>
		</div>
		<div style="width:900px; background:#FCFCFA; margin-top:-2px; float:left;">
			<div style="width:580px; height:400px; border:2px solid black; float:left; padding:10px; font-size:15px; text-align:left;">
			<h3>Welcome Back, <?php echo $un; ?></h3>
			
			
			
			<form action="edit_tutorial_action.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" onsubmit="validate(event)">
			    <?php $data=select("SELECT * FROM user_post WHERE id='".$_GET['id']."' ORDER BY id DESC");
                    foreach($data as $row) {
                ?>
			    <p>Tutorial name: <input name="name" type="text" value="<?php echo $row->title; ?>" /></p>
			    <p>Tutorial Category: <select name="category">
			        <?php $data=select("SELECT * FROM category ORDER BY id DESC");
                    foreach($data as $row_cat) {
                ?>
                    <option value="<?php echo $row_cat->id; ?>" <?php if($row_cat->id==$row->category_id) echo 'selected'; ?>><?php echo $row_cat->name; ?></option>
                    <?php } ?>
                    </select>
			    </p>
			    
			    <p>Tutorial Description: <textarea name="content"><?php echo $row->content; ?></textarea></p>
			    <input type="submit" value="Submit" />
			    <?php } ?>
			</form>
			
			
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