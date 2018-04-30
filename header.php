<?php
session_start();
include 'connect.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>J&B restuarant</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="asubtleorange.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <!-- <style>
.thinking { 
	background: white url("img/checking.gif") no-repeat; 
	background-position: 150px 1px;   
}

.approved { 
	background: white url("img/true.gif") no-repeat; 
	background-position: 150px 1px;   
}

.denied { 
	background: #FF8282 url("img/false.gif") no-repeat; 
	background-position: 150px 1px;   
}

</style>
<script>
var xmlHttp;
function checkUsername() {
document.getElementById("username").className = "thinking";
xmlHttp = new XMLHttpRequest();// โหลดแบบไม่ต้องรีเฟรช
xmlHttp.onreadystatechange = showUsernameStatus; //ตรวจสอบสถานะ
var username = document.getElementById("username").value; 
var url = "checkName.php?username=" + username;
xmlHttp.open("GET", url);
xmlHttp.send();
}
function showUsernameStatus() {
if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
if (xmlHttp.responseText == "okay") {
document.getElementById("username").className = "approved";
} else {
document.getElementById("username").className = "denied";
document.getElementById("username").focus();
document.getElementById("username").select();
 }
 }
}
</script> -->

</head>

<body background="images/banner.jpg">

<div id="page"> 
    <div id="header">
    	<div class="title">J&B Restuarant and Service</div>
        <div class="subText"></div>
    </div>
    <div id="bar">
        <div class="menuLink"><a href="home.php">Home</a></div>
        <div class="menuLink"><a href="foodmenu.php">Recommend</a></div>
        <?php
        if(isset($_SESSION['name']) && $_SESSION['name']!=""){ 
        ?>
        <div class="menuLink"><a href="index.php">Menu</a></div>
        <?php } ?>
        <div class="menuLink"><a href="about.php">About</a></div>
        <?php
      if(isset($_SESSION['name']) && $_SESSION['name']!=""){ 
        ?>
        <div class="menuLink"><a href="logout.php">logout</a></div>
        <div class="menuLink" style="color:red; "><?=$_SESSION['username']?></div>
        <?php }else{ ?>
            <div class="menuLink"><a href="login.php">Login</a></div>
            <?php } ?>
    </div>