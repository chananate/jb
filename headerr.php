<?php
session_start();
include 'connect.php';
$rootFloder="/jb/"

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
  	<title>J&B restuarant</title>
    <link rel="stylesheet" type="text/css" href="head.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
  </head>
<body style="background:#f2e268">



<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-right ">
    <li class="nav-item ">
        <a class="nav-link" href="<?=$rootFloder?>home.php" style="color:black"><b>J & B &nbsp;&nbsp;&nbsp; </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?=$rootFloder?>home.php">HOME &nbsp;&nbsp;&nbsp; <span class="sr-only">(current)</span></a>
      </li>
      <?php
      if(isset($_SESSION['name']) && $_SESSION['name']!=""){ 
        ?>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         MENU
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="<?=$rootFloder?>indexf.php">Foods&nbsp;</a>
          <a class="dropdown-item " href="<?=$rootFloder?>indexd.php">Drinks&nbsp;</a>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="hot.php"> &nbsp;&nbsp;HOT &nbsp;&nbsp; </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new.php"> &nbsp;&nbsp;TABLE &nbsp;&nbsp; </a>
      </li>
      <?php 
			if(isset($_SESSION['empType']) && $_SESSION['empType']!=""){ 
				if($_SESSION["empType"] =="ET1" || $_SESSION["empType"] =="ET2"){ ?>
				<li class="nav-item">
					<a class="nav-link" href="checkBill.php"> &nbsp;&nbsp;Check Bill &nbsp;&nbsp; </a>
				</li>
				<?php } if($_SESSION["empType"] =="ET1"){ ?>
				<li class="nav-item">
					<a class="nav-link" href="daily.php"> &nbsp;&nbsp;Daily income &nbsp;&nbsp; </a>
				</li>
				<?php } } ?>
<!--     
      <li class="nav-item">
        <a class="nav-link" href="<?=$rootFloder?>foodmenu.php"> &nbsp;&nbsp;RECOMMEND &nbsp;&nbsp; </a>
      </li>
 
      <li class="nav-item">
      <a class="nav-link" href="<?=$rootFloder?>about.php">ABOUT J&B </a>
    </li> -->
    <?php
      if(isset($_SESSION['name']) && $_SESSION['name']!=""){ 
        ?>
        <li class="nav-item dropdown dropdown-menu-left">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$_SESSION['username']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item " href="prof.php">PROFILE</a>
        <a class="dropdown-item " href="logout.php">SIGN OUT</a>
        </div>
      </li>
      <?php }else{ ?>
      <li class="nav nav-item" >
        <a class="nav-link" href="<?=$rootFloder?>signup.php">SIGN UP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$rootFloder?>login.php">SIGN IN</a>
      </li>
      <?php } ?>
      
</ul>


  </div>
</nav>
