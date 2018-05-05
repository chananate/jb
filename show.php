<?php

include 'headerr.php';
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
?>

    <div id="pageContent">
		<div class="articleTitle"></div>
			<div class="articleContent">
							<?php

							if(!isset($_SESSION["intLine"]))
							{
								echo "Cart empty";
								exit();
							}
							
							include 'connect.php';
						
						?>
						<br><br><br><br>
						<center>
						  <form action="update.php" method="post">
							<table class="table table-striped col-md-3" style="width:70%">
						  <tr style="background-color:#FFC300;color:#000000">
							<td width="101" style="text-align:center">FoodID</td>
							<td width="82" style="text-align:center">FoodName</td>
							<td width="82" style="text-align:center">Price</td>
							<td width="79" style="text-align:center">Amount</td>
							<td width="79" style="text-align:center">Total</td>
							<td width="79" style="text-align:center">Note</td>
							<td width="10" style="text-align:center">Delete</td>
						  </tr>
						  <?php
						  $Total = 0;
						  $SumTotal = 0;

						  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
						  {
							  if($_SESSION["strFoodID"][$i] != "")
							  {
								$strSQL = "SELECT * FROM Food WHERE FoodID = '".$_SESSION["strFoodID"][$i]."' ";
								$objQuery = $connect->query($strSQL);
								$objResult=$objQuery->fetch_assoc();

								
								// echo json_encode($_SESSION);
								// echo sizeof($_SESSION["hif"]);
								// exit();
								if($_SESSION["hif"] && $_SESSION["hif"][$i]==2){
									
									$objResult["FoodPrice"]=$objResult["FoodPrice"]+5;
								}
								if($_SESSION["hif"] && $_SESSION["hif"][$i]==3){
									$objResult["FoodPrice"]=$objResult["FoodPrice"]+10;
								}
								

								$Total = $_SESSION["strAmount"][$i] * $objResult["FoodPrice"];
								
								$SumTotal = $SumTotal + $Total;
							  ?>
							  <tr>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><b><?=$_SESSION["strFoodID"][$i];?><input type="hidden" name="txtFoodID<?=$i;?>" value="<?=$_SESSION["strFoodID"][$i];?>"></b></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?=$objResult["FoodName"];?></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?=$objResult["FoodPrice"];?></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?=$_SESSION["strAmount"][$i];?></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?=number_format($Total,2);?></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?=$_SESSION["strFoodNote"][$i];?></td>
								<td style="text-align:center;background-color:#FFFAF0;color:#000000"><a href="delete.php?Line=<?=$i;?>" style="color:red">x</a></td>
							  </tr>
							
							  <?php
							  }
						  }
						  ?>
						</table>
						<!-- <table width="700"  border="1" bordercolor="#FFFFFF">
						  <tr>
						  <td style="text-align:center ;background-color:#00FF33;color:#000000" width="117px"><input type="submit" value="Update"></td>
						  <td style="text-align:center ;background-color:#00FF33;color:#000000">Total Price : php total บาท</td>
						  </tr>
						  </table> -->
						</form>
						</center>
						<div style="text-align:center">
						<div style="font-size:1.5em; color:#DF0101">
						<b>	Total : <?php echo number_format($SumTotal,2);?> ฿ </b>
						</div>
						<br><br><span style="font-size:1em; color:#535353"><b><i>Back to menu</i></b></span>
						<br><br><a href="indexf.php" style="color:#FFFFFF;"><button type="button" class="btn btn-warning">Foods</button></a> | 
						<a href="indexd.php" style="color:#FFFFFF"><button type="button" class="btn btn-info">Drinks</button></a>
						</div>
						<?php
							if($SumTotal > 0)
							{
						?>
							<br> <a href="checkout.php" style="color:#FFFFFF"><button type="button" class="btn btn-outline-success">Make Order</button></a>
							<!-- | <a href="clear.php" style="color:#FFFFFF;"><button type="button" class="btn btn-danger">Clear All</button></a> -->
						<?php
							}
						?>
						<?php
						//mysql_close();
						?>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>