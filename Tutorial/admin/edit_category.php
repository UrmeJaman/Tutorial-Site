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
<title>Update Category</title>
<script>
function validate(event) {
    var error = '';
    if(document.getElementsByName("name")[0].value=='') {
        error += 'Category Name Cannot be Blank';
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
		<h1 style="font-size:55px;"><a style="text-decoration:none; color:black;" href="dash.php">Back</a></h1>
		</div>
		<div style="width:900px; background:#FCFCFA; margin-top:-2px; float:left;">
			<div style="width:580px; height:400px; border:2px solid black; float:left; padding:10px; font-size:15px; text-align:left;">
			<h3>Welcome Back, <?php echo $un; ?></h3>
			
			
			
			<form action="edit_category_action.php?id=<?php echo $_GET['id']; ?>" method="post" onsubmit="validate(event)">
			    <?php $data=select("SELECT * FROM category WHERE id='".$_GET['id']."' ORDER BY id DESC");
                    foreach($data as $row) {
                ?>
			    <p>Category name: <input name="name" type="text" value="<?php echo $row->name; ?>" /></p>
			    <input type="submit" value="Submit" />
			    <?php } ?>
			</form>
			
			
			<div style="clear:both"></div>
            </div>
			<?php if($_SESSION['user_roll']=='admin') { ?>
			
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			
			
			
			<p><a style="text-decoration:none; color:black;" href="add_category.php">Add Category</a></p>
			
			<p><a style="text-decoration:none; color:black;" href="show_category.php">Show Category</a></p>
			
			<?php } else { ?>
			
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="logout.php">Logout?</a></button></p>
			<p><button style="background: none;width:150px;border-radius: 20px; font-size: 18px;text-align:center;"><a style="text-decoration:none; color:black;" href="index.php">Home</a></button></p>
			
			<?php } ?>
			
		</div>
	</div>
    
    
    
</body>
</html>