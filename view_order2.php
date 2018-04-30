
<?php
include 'headerr.php';
?>
    <div id="pageContent">
		<div class="articleTitle"></div>
			<div class="articleContent">
						<?php
					mysql_connect("127.0.0.1","root","");
					mysql_select_db("jb_shop");
					mysql_query("SET NAMES UTF8");
					
					$strSQL = "SELECT * FROM orders WHERE Orderid=".$_GET['OrderID'];
					$objQuery = mysql_query($strSQL)  or die(mysql_error());
					$objResult = mysql_fetch_array($objQuery);
					?>
					<center>
						<br><br><br><br><br>
						<div style="font-size:1.5em"><b> Order No. <?=$_GET['OrderID'];?></b>
						<?php if($objResult["Takehome"]!=1){ ?>
									<div style="font-size:0.8em"> Table No. <?=$objResult['TID'];?></div>
						<?php }else{ ?>
									<div style="font-size:0.8em">Takehome</div>
						<?php } ?>
						</div><br><br>
					<form>
					<table width="700" border="1" bordercolor="#FFFFFF">
					  <tr style="background-color:#FF99FF;color:#000000">
						<td width="71" style="text-align:center">OrderID</td>
						<td width="71" style="text-align:center">OrderDate</td>
						<td width="101" style="text-align:center">FoodID</td>
						<td width="2000" style="text-align:center">FoodName</td>
						<td width="82" style="text-align:center">Price</td>
						<td width="79" style="text-align:center">Amount</td>
						<td width="79" style="text-align:center">Total</td>
					  </tr>
					<?php
					
					$Total = 0;
					$SumTotal = 0;

					$strSQL2 = "SELECT * FROM orderitem";
					$objQuery2 = mysql_query($strSQL2)  or die(mysql_error());

					while($objResult2 = mysql_fetch_array($objQuery2))
					{
						if($objResult2['Orderid']==$_GET['OrderID']){
							$strSQL3 = "SELECT * FROM food WHERE FoodID = '".$objResult2["FoodID"]."' ";
							$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
							$objResult3 = mysql_fetch_array($objQuery3);
							$Total = $objResult2["OrderAmount"] * $objResult3["FoodPrice"];
							$SumTotal = $SumTotal + $Total;

							
						  ?>
						  <tr>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["Orderid"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["OrderDate"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["FoodID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult3["FoodName"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult3["FoodPrice"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["OrderAmount"];?></td>
							<td style="text-align:cente;background-color:#FFFAF0;color:#000000"><?php echo number_format($Total,2);?></td>

						  </tr>
							<?php
							}
					 }
					  ?>
					</table>
					<table width="700" border="1" bordercolor="#FFFFFF">
					<tr>
					 <td style="text-align:center;background-color:#00FF33;color:#000000">Total : <?php echo $objResult["AmountPrice"];?> บาท</td>
					 </tr>
					</table>
					</form>
					</center>
					<!-- <br><a href="index.php" style="color:#FFFFFF;margin-left:90px">Back to Food Menu</a> -->
					<br><br><a href="checkBill.php" style="color:#FFFFFF;"><button type="button" class="btn btn-danger">Check Bill</button></a>
					<?php
					mysql_close();
					unset($_SESSION["intLine"]);
					unset($_SESSION["strFoodID"]);
					unset($_SESSION["strAmount"]);
					unset($_SESSION["hif"]);
					unset($_SESSION["strFoodNote"]);
					unset($_SESSION["noTable"]);
					unset($_SESSION["tkh"]);
					unset($_SESSION['strSum']);
					?>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>