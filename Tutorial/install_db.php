<?php
include('db.php');
$sql="CREATE TABLE login (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
roll VARCHAR(100) NOT NULL,
status VARCHAR(10) NOT NULL
)";
if($mysqli->query($sql)==TRUE) {
	echo 'Login table Created<br>';
}
else {
	echo $mysqli_error;
}
$sql="CREATE TABLE user_info (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
firstname VARCHAR(100),
address VARCHAR(100),
phone VARCHAR(100),
email VARCHAR(100),
website VARCHAR(100),
picture VARCHAR(100)
)";
if($mysqli->query($sql)==TRUE) {
	echo 'user_info table Created';
}
else {
	echo $mysqli->error;
}
$sql="CREATE TABLE user_post (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
title VARCHAR(1000),
content LONGTEXT,
video_link LONGTEXT,
date VARCHAR(100),
category_id INT(20),
time VARCHAR(100),
lcount INT(20),
vcount INT(20)
)";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
$sql="CREATE TABLE comment_table (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
comment LONGTEXT,
post_id INT(20)
)";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
$sql="CREATE TABLE category (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
)";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
$sql="CREATE TABLE like_tracker (
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
post_id VARCHAR(100) NOT NULL
)";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
$sql = "INSERT INTO login values('','admin', 'password', 'admin', '1')";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
$sql = "INSERT INTO user_info values('','admin', '', '','','','','admin.gif')";
if($mysqli->query($sql)==TRUE) {
	echo 'post table Created';
}
else {
	echo $mysqli->error;
}
?>