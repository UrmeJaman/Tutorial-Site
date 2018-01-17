<?php
session_start();
if(isset($_SESSION['login_user'])) {
	header('Location: dash.php');
	exit;
}
else {
	
}
?>
<html>
<head>
<title >Login to Dashboard</title>

<script>
var s=4;
function check_login() {
	var str=document.getElementById("tun").value;
	var str1=document.getElementById("tpw").value;
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText=="yes") {
				document.getElementById("unmsg").innerHTML="Username OK";
				document.getElementById("unmsg").style.background="green";
				document.getElementById("main").style.display="none";
				document.getElementById("main2").style.display="block";
				 document.getElementById("smsg").innerHTML="Login Successfull. You Will be Redirected in "+s+" Seconds...";
				redirect();
			}
			else if(xmlhttp.responseText=="no") {
				document.getElementById("unmsg").innerHTML="Username or Password do not match";
				document.getElementById("unmsg").style.background="red";
			}
            else if(xmlhttp.responseText=="inactive") {
				document.getElementById("unmsg").innerHTML="Your Account is not Activated Yet";
				document.getElementById("unmsg").style.background="red";
			}
			else {
				document.getElementById("unmsg").innerHTML="Username or Password Field Empty";
				document.getElementById("unmsg").style.background="red";
			}
		}
	}
xmlhttp.open("GET","chk_login.php?un="+str+"&pw="+str1+"",true);
xmlhttp.send();
}
function redirect() {
	setInterval(function(){ document.getElementById("smsg").innerHTML="Login Successfull. You Will be Redirected in "+s+" Seconds..."; s--; }, 1000);
	setInterval(function(){ window.location="dash.php" }, 4000);
}

function clk_enter(e) {
    if (e.keyCode == 13) {
        check_login();
        return false;
    }
}
</script>
</head>
<body>
	<div style="margin:0 auto; width:466px; position:relative; text-align:center;">
		<h2 style="margin-top:100px;">LOGIN</h2>
	
		<div id="main" style="margin-top:30px; width:400; padding:30px; position:relative; border:3px solid black; text-align:center;background-color:powderblue">
			<div style = "text-align:right;"><a href="../index.php"><button class="button" ><span>Home</span></button></a></div>
				<p id="unmsg"></p>
				<p>Username: &nbsp; &nbsp; &nbsp; <input type="text" id="tun" onkeypress="return clk_enter(event)" /></p>
				<p>password: &nbsp; &nbsp; &nbsp; <input type="password" id="tpw" onkeypress="return clk_enter(event)" /></p>
				<p><button onclick="check_login()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">LOGIN</button>&nbsp; &nbsp; &nbsp;
				<button style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;"><a style="text-decoration:none; color:black;" href="../reg.php">Register</a></button></p>
		</div>
		<div id="main2" style="margin-top:30px; width:400; padding:20px; position:relative; color:white; border:3px solid black; text-align:center; display:none; background:green">
			<h3 id="smsg"></h3>
		</div>
	</div>
</body>
</html>