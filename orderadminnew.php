
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>J&B restuarant</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script type="text/javascript">
        $(function(){
                $('#example').dataTable();
        });
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
      <li class="nav nav-item" >
        <a class="nav-link" href="signup.php">SIGN UP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">SIGN IN</a>
      </li>
      <?php } ?>
      
</ul>


  </div>
</nav>

<br>
<center>
<a href="indexf.php" ><button type="button" class="btn btn-outline-success btn-lg">Foods</button></a> 
| <a href="indexd.php" ><button type="button" class="btn btn-outline-info btn-lg">Drinks</button></a>
</center>
		<div id="container" style="margin-left:5%; margin-right:5%">
			<br>
					<center>
					<div id="demo">
					<br>
					<table id="example" class="table table-striped "style="width:70%"  >
            <thead>
							<tr style="background-color:#FFC300;color:#000000">
								<td width="50" style="text-align:center">FoodID</td>
								<td width="80" style="text-align:center">FoodName</td>
								<td width="30" style="text-align:center">price</td>
								<td width="50" style="text-align:center">Status</td>
								<td width="100" style="text-align:center">editmenu</td>
						
							</tr>
						</thead>
						<tbody>
					  <?php
						
						$strSQL = "SELECT * FROM food";
                        $result=$connect->query($strSQL);

						while($objResult=$result->fetch_assoc() ){
                       
					  ?>
					  <tr >
					  	<form action="order.php" method="post">
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><b><?php echo $objResult["FoodID"];?></b></td>
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodName"];?></td>
                        <td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodPrice"];?> ฿ </td>
						<?php if($objResult["FoodStatus"]==1){ ?>
						<td style="text-align:center;background-color:#FDF8D9;color:green;font-size:1em;"><input type="hidden" name="txtFoodID" value="<?php echo $objResult["FoodID"];?>"> 
						Left in stock</td>
						<?php }else{ ?>
						<td style="text-align:center;background-color:#FDF8D9;color:red;font-size:1em;">out of stock</td>
						<?php } ?>						
                        <td style="text-align:center;background-color:#FDF8D9;color:#000000"><a href='editorder.php?FoodID=<?= $objResult["FoodID"]?>'>แก้ไข</td>
						
            			</form>
					  </tr>
					  <?php
                      
                    }
					  ?>
					</table>					
					</center>
					
    </body>
<?php
include 'footer.php';
?>
</html>