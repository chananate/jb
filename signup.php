<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<title>J&B restuarant</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<style>
		
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
			xmlHttp = new XMLHttpRequest();
			xmlHttp.onreadystatechange = showUsernameStatus; 
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
	</script>
</head>
<body id="dt_example" style="background:#f2e268">
<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" href="home.php" style="color:black"><b>J & B &nbsp;&nbsp;&nbsp; </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="home.php">HOME &nbsp;&nbsp;&nbsp; <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="new.php"> &nbsp;&nbsp;TABLE &nbsp;&nbsp; </a>
      </li>
			<?php 
			if(isset($_SESSION['empType']) && $_SESSION['empType']!=""){ 
				if($_SESSION["empType"] =="ET1" && $_SESSION["empType"] =="ET2"){ ?>
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
        <a class="nav-link" href="foodmenu.php"> &nbsp;&nbsp;RECOMMEND &nbsp;&nbsp; </a>
      </li>
 
      <li class="nav-item">
      <a class="nav-link" href="about.php">ABOUT J&B </a>
    </li> -->
    <?php
      if(isset($_SESSION['name']) && $_SESSION['name']!=""){ 
        ?>
        <li class="nav-item">
        <a class="nav-link" href="home.php">&nbsp;&nbsp;<?=$_SESSION['name']?></a>
    </a></li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i>(logout)</i></a>
        </li>
      <?php }else{ ?>
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">SIGN IN</a>
      </li>
      <?php } ?>
      
</ul>


  </div>
</nav>

	<center>
	<div >
	<form action="fsignup.php" method="post" style="margin-top:10%; margin-left:30%; margin-right:30% ">
		<span id="txfm">Name</span><br>
		<input type="text" name="name" id="name" placeholder="Name" class="form-control mb-2 mb-sm-0"><br><br>
        <span id="txfm">Employee Type</span><br>
		<input type="text" name="emptype" id="emptype" placeholder="Employee Type" class="form-control mb-2 mb-sm-0"><br><br>
        <span style="color:black"><i>*หมายเหตุ ET1 - admin , ET2 - cashier , ET3 - employee </i></span><br><br>
        <span id="txfm">Username</span><br>
		<input type="text"  onblur="checkUsername()" name="username" id="username" placeholder="Username" class="form-control mb-2 mb-sm-0"><br><br>
		<span id="txfm">Password</span><br>
		<input type="password" name="password" id="password" placeholder="Password" class="form-control mb-2 mb-sm-0"><br><br>
        <span id="txfm">Confirm Password</span><br>
        <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password" class="form-control mb-2 mb-sm-0"><br><br>
        <span id="txfm">Tel.</span><br>
		<input type="text" name="tel" id="tel" placeholder="08xxxxxxxx" class="form-control mb-2 mb-sm-0"><br><br>
        <span id="txfm">Address</span><br>
		<textarea class="textareaB" name="address" rows="3" cols="58" id="address" placeholder="Address"></textarea><br><br>
		<button type="submit" class="btn btn-outline-dark" >SUBMIT</button>

</form>
</div>
</center>
<br><br><br>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>