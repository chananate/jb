<?php
include 'headerr.php';

if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<br><br><br><br>
		<form action='search.php'>
    		  <input type="text"  placeholder="Search" name="keyword">
    		  <input type="submit" value="ค้นหา">
   		 </form>
			
				<?php
					// mysql_connect("127.0.0.1","root","");
					// mysql_select_db("jb_shop");
					// mysql_query("SET NAMES UTF8");
					$strSQL = "SELECT * FROM food";
					$result=$connect->query($strSQL);
					//$objQuery = mysql_query($strSQL)  or die(mysql_error());
					?>
					<br>
					
					<center>
					<form>
					<table class="table table-striped col-md-3" style="width:70%">
            <thead>
					  <tr style="background-color:#FFC300;color:#000000">
						<td width="50" style="text-align:center">FoodID</td>
						<td width="80" style="text-align:center">Foods</td>
						<td width="50" style="text-align:center">Price</td>
						<td width="100" style="text-align:center">Status</td>
		    			<td width="50" style="text-align:center">editmenu</td>
					  </tr>
                      </thead>
					  <?php
						//while($objResult = mysql_fetch_array($objQuery))
						while($objResult=$result->fetch_assoc() )
					  {
                          
					  ?>
					  
					  <tr>
					  <form action="order.php" method="post">
						<tbody>
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><b><?php echo $objResult["FoodID"];?></b></td>
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodName"];?></td>
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodPrice"];?> ฿ </td>
						<?php if($objResult["FoodStatus"]==1){ ?>
						<td style="text-align:center;background-color:#FDF8D9;color:green"><input type="hidden" name="txtFoodID" value="<?php echo $objResult["FoodID"];?>"> 
						Left in stock</td>
							<?php }else{ ?>
								<td style="text-align:center;background-color:#FDF8D9;color:red">out of stock</td>
							<?php }?>
						<td style="text-align:center;background-color:#FDF8D9;color:#000000"><a href='editorder.php?FoodID=<?= $objResult["FoodID"]?>'>แก้ไข</td>
           				</tbody>
						</form>
					  </tr>
					  <?php
                      }
                    
					  ?>
					</table>
					</form>
									</center>
					<div style="text-align:center">
					<br><a href="show.php" style="color:#FFFFFF;"><button type="button" class="btn btn-primary">View Order</button></a><!-- | <a href="view_order2.php" style="color:#FFFFFF"><button type="button" class="btn btn-light">View OrderAll</button></a>-->
					</div>
			</div>
	
<br><br><br><br>

</body>
<?php
include 'footer.php';
?>
</html>
