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
<title>Register</title>
<script>
var un=0,pw=0;
    var error_num=0;
function check_username() {
	un=0;
	var str=document.getElementById("tun").value;
	if(str.length>4) {
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
				un=1;
			}
			else if(xmlhttp.responseText=="no") {
				document.getElementById("unmsg").innerHTML="Username Exist";
				document.getElementById("unmsg").style.background="red";
				un=0;
			}
			else {
				document.getElementById("unmsg").innerHTML="Username Field Empty";
				document.getElementById("unmsg").style.background="red";
				un=0;
			}
		}
	}
xmlhttp.open("GET","chk_un.php?un="+str,true);
xmlhttp.send();
	}
	else {
		document.getElementById("unmsg").innerHTML="Username Must be Minimum 5 letter";
		document.getElementById("unmsg").style.background="red";
		un=0;
	}
}
function check_password() {
	var str=document.getElementById("tpw").value;
	var str2=document.getElementById("tpw2").value;
	if(str.length>4) {
		document.getElementById("pwmsg").innerHTML="Password OK";
		document.getElementById("pwmsg").style.background="green";
		if(str==str2) {
			pw=1;
		}
	}
	else {
		document.getElementById("pwmsg").innerHTML="Password Must be Minimum 5 letter";
		document.getElementById("pwmsg").style.background="red";
		pw=0;
	}
}
function check_password2() {
	var str=document.getElementById("tpw").value;
	var str2=document.getElementById("tpw2").value;
	if(str.length>4) {
		if(str==str2) {
			document.getElementById("pwmsg2").innerHTML="Password Matches";
			document.getElementById("pwmsg2").style.background="green";
			pw=1;
		}
		else {
			document.getElementById("pwmsg2").innerHTML="Password do not match";
			document.getElementById("pwmsg2").style.background="red";
			pw=0;
		}
	}
	else {
		document.getElementById("pwmsg2").innerHTML="Password Must be Minimum 5 letter";
		document.getElementById("pwmsg2").style.background="red";
		pw=0;
	}
}
function go_reg() {
	if(un==1 && pw==1) {
		document.getElementById("reg1").style.display="none";
		document.getElementById("reg2").style.display="block";
		document.getElementById("reg4").style.display="none";
		document.getElementById("nxtmsg").innerHTML="OK";
		document.getElementById("nxtmsg").style.background="green";
	}
	else {
		document.getElementById("nxtmsg").innerHTML="Give Username,Password correctly";
		document.getElementById("nxtmsg").style.background="red";
	}
}


function confirm_reg() {
if(document.getElementById("mcheck").checked == true) {
document.getElementById("allmsg1").innerHTML="ok";
document.getElementById("allmsg1").style.background="green";
	//document.getElementById("loader_img").style.display="block";
	var xmlhttp;
	var str22
	str22=document.getElementById("ione").value;
	var formData = new FormData();
	formData.append("ione", document.getElementById("ione").files[0])
	var usn=document.getElementById("tun").value;
	var upw=document.getElementById("tpw").value;
	
		var ufn=document.getElementById("tname").value;
			if(ufn.length>4) {
				document.getElementById("tname").style.border="1px solid green"; document.getElementById("r1").style.display="none";
				
			}
	
	else { 
	document.getElementById("tname").innerHTML="Full name  Must be Minimum 5 letter"; }
	
	var uadd=document.getElementById("tadd").value;
	var uemail=document.getElementById("temail").value;
	var uphone=document.getElementById("tphone").value;
	var uweb=document.getElementById("twebsite").value;
	error_num=0;
	
	document.getElementById("allmsg").innerHTML="";
	
		
	if (uadd=="") { document.getElementById("tadd").style.border="1px solid red"; document.getElementById("r2").style.display="inline-block"; error_num++; }
	else { document.getElementById("tadd").style.border="1px solid green"; document.getElementById("r2").style.display="none"; }
	
	if (uemail=="") { document.getElementById("temail").style.border="1px solid red"; document.getElementById("r4").style.display="inline-block"; error_num++; }
	else { document.getElementById("temail").style.border="1px solid green"; document.getElementById("r4").style.display="none"; }
	
	if (uphone=="") { document.getElementById("tphone").style.border="1px solid red"; document.getElementById("r3").style.display="inline-block"; error_num++; }
	else { document.getElementById("tphone").style.border="1px solid green"; document.getElementById("r3").style.display="none"; }
	
	if (uweb=="") { document.getElementById("twebsite").style.border="1px solid red"; document.getElementById("r5").style.display="inline-block"; error_num++; }
	else { document.getElementById("twebsite").style.border="1px solid green"; document.getElementById("r5").style.display="none"; }
	
	if(error_num>0) { 
	document.getElementById("reg4").style.display="none";
	document.getElementById("reg2").style.display="block"; 
	document.getElementById("allmsg").innerHTML="* Complete required fields<br>"; document.getElementById("allmsg").style.background="red"; }
	
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
			if(xmlhttp.responseText=="fl") {
				document.getElementById("allmsg").innerHTML=document.getElementById("allmsg").innerHTML+"File extension must be .png .jpg .bmp";
				document.getElementById("allmsg").style.background="red";
				document.getElementById("reg4").style.display="none";
				document.getElementById("reg2").style.display="block";
			}
			else if(xmlhttp.responseText=="fs") {
				document.getElementById("allmsg").innerHTML=document.getElementById("allmsg").innerHTML+"File Size more than 20kb";
				document.getElementById("allmsg").style.background="red";
				document.getElementById("reg4").style.display="none";
				document.getElementById("reg2").style.display="block";
			}
			else if(xmlhttp.responseText=="fe") {
				document.getElementById("allmsg").innerHTML=document.getElementById("allmsg").innerHTML+"File ERROR";
				document.getElementById("allmsg").style.background="red";
				document.getElementById("reg4").style.display="none";
				document.getElementById("reg2").style.display="block";
			}
			else if(xmlhttp.responseText=="yes") {
				document.getElementById("allmsg").innerHTML="Registration complete";
				document.getElementById("allmsg").style.background="Green";
				document.getElementById("reg4").style.display="none";
				document.getElementById("reg2").style.display="none";
				document.getElementById("reg3").style.display="block";
			}
			else if(xmlhttp.responseText=="all") {
				document.getElementById("allmsg").innerHTML=document.getElementById("allmsg").innerHTML+"Select Image file please";
				document.getElementById("allmsg").style.background="red";
				document.getElementById("reg4").style.display="none";
				document.getElementById("reg2").style.display="block";
			}
		}
   }
xmlhttp.open("POST","confirm_reg.php?un="+usn+"&pw="+upw+"&fullname="+ufn+"&address="+uadd+"&email="+uemail+"&phone="+uphone+"&website="+uweb+"",true);
xmlhttp.send(formData);
}
else {
document.getElementById("allmsg1").innerHTML="please confirm term and condition";
document.getElementById("allmsg1").style.background="red";
}
}

function check_final_box(vvv,did,rr) {
	if (vvv=="") { document.getElementById(did).style.border="1px solid red"; document.getElementById(rr).style.display="inline-block"; error_num++; }
	else { document.getElementById(did).style.border="1px solid green"; document.getElementById(rr).style.display="none"; }
}

function go_back() {
	document.getElementById("reg1").style.display="block";
	document.getElementById("reg2").style.display="none";
}

function go_next() {
	document.getElementById("reg4").style.display="block";
	document.getElementById("reg2").style.display="none";
}









</script>
</head>
<body>
	<div style="margin:0 auto; width:466px; position:relative; text-align:center;">
		<h2 style="margin-top:100px;">Register</h2>
		<div id="reg1" style="display:block;">
			<div style="margin-top:30px; width:400; padding:30px; position:relative; border:3px solid black; text-align:center;">
			<div style = "text-align:right";><a href="index.php"><button class="button" >Home</button></a></div>
				<p style="margin-left: -5px;">Username: &nbsp; &nbsp; &nbsp; <input type="text" id="tun" onkeyup="check_username()" onblur="check_username()" value="" /></p>
				<p id="unmsg" style="color:white;"></p>
				<p>password: &nbsp; &nbsp; &nbsp; <input type="password" id="tpw" onblur="check_password()" /></p>
				<p id="pwmsg" style="color:white;"></p>
				<p style="margin-left: -60px;">Re-Type password: &nbsp; &nbsp; &nbsp; <input type="password" id="tpw2" onblur="check_password2()" onkeyup="check_password2()" /></p>
				<p id="pwmsg2" style="color:white;"></p>
				<p><button onclick="go_reg()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">Next</button>
				<p id="nxtmsg"></p>
			</div>
		</div>
		
		<div id="reg2" style="display:none;">
			<div style="margin-top:30px; padding:30px; width:400px; position:relative; border:3px solid black; text-align:center;">
			<p>Upload Image: &nbsp;&nbsp;&nbsp;<input type="file" name="ione" id="ione" style=""/></p>
			<p>Full Name: &nbsp; &nbsp; &nbsp; <input type="text" id="tname" onkeyup="check_final_box(this.value,'tname','r1')" onblur="check_final_box(this.value,'tname','r1')" value="" /><b id="r1" style="display:none; color:red">*</b></p>
			<p>Address: &nbsp; &nbsp; &nbsp; <input type="text" id="tadd" onkeyup="check_final_box(this.value,'tadd','r2')" onblur="check_final_box(this.value,'tadd','r2')" value="" /><b id="r2" style="display:none; color:red">*</b></p>
			<p>Phone: &nbsp; &nbsp; &nbsp; <input type="text" id="tphone" onkeyup="check_final_box(this.value,'tphone','r3')" onblur="check_final_box(this.value,'tphone','r3')" value="" /><b id="r3" style="display:none; color:red">*</b></p>
			<p>Email: &nbsp; &nbsp; &nbsp; <input type="text" id="temail" onkeyup="check_final_box(this.value,'temail','r4')" onblur="check_final_box(this.value,'temail','r4')" value="" /><b id="r4" style="display:none; color:red">*</b></p>
			<p>Website: &nbsp; &nbsp; &nbsp; <input type="text" id="twebsite" onkeyup="check_final_box(this.value,'twebsite','r5')" onblur="check_final_box(this.value,'twebsite','r5')" value="" /><b id="r5" style="display:none; color:red">*</b></p>
			<p id="allmsg" style="color:white;"></p>
			<p><button onclick="go_back()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">Back</button>
			&nbsp; &nbsp; <button onclick="go_next()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">Next</button></p>
			</div>
		</div>
		<div id="reg3" style="display:none;">
			<div style="margin-top:30px; padding:30px; width:400px; position:relative; border:3px solid black; text-align:center; background:green; color:white;">
				<h3>Registration Successfull. <a href="admin/login.php">Login Here</a></h3>
			</div>
		</div>
		<div id="reg4" style="display:none;">
			<p><input type="checkbox" id="mcheck"/> I Agree to the term and conditions</p>
			<p id="allmsg1" style="color:white;"></p>
			<p><button onclick="go_reg()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">Back</button>
			&nbsp; &nbsp; <button onclick="confirm_reg()" style="background: none; border-radius: 20px; padding: 10px; font-size: 18px;">Register</button></p>
		</div>
	</div>
</body>
</html>