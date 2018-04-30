

<?php
include 'headerr.php';
?>

				<?php
					include 'connect.php';
					
					$strSQL = "SELECT * FROM orders WHERE OrderID = '".$_GET["strOrderID"]."' ";
					$objQuery = mysql_query($strSQL)  or die(mysql_error());
					$objResult = mysql_fetch_array($objQuery);
					?><br><br><br><br><br>
					<form>

					<table width="700" border="1" bordercolor="#FFFFFF">
					  <tr style="background-color:#FF99FF;color:#000000">
						
						<td width="71" style="text-align:center">OrderID</td>
						<td width="71" style="text-align:center">EmpID</td>
						<td width="71" style="text-align:center">Table</td>
						<td width="71" style="text-align:center">OrderDate</td>
						<td width="79" style="text-align:center">Amount</td>
						<td width="79" style="text-align:center">Total</td>
					  </tr>
					<?php

					$Total = 0;
					$SumTotal = 0;

					$strSQL2 = "SELECT * FROM orderItem WHERE OrderID = '".$_GET["strOrderID"]."' ";
					$objQuery2 = mysql_query($strSQL2)  or die(mysql_error());

					while($objResult2 = mysql_fetch_array($objQuery2))
					{
							$strSQL3 = "SELECT * FROM food WHERE FoodID = '".$objResult2["FoodID"]."' ";
							$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
							$objResult3 = mysql_fetch_array($objQuery3);
							$Total = $objResult2["Amount"] * $objResult3["FoodPrice"];
							$SumTotal = $SumTotal + $Total;
						  ?>
						  <tr>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["OrderID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["EmpID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["TID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["OrderDate"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["Amount"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo number_format($Total,2);?></td>

						  </tr>
						  <?php
					 }
					  ?>
					</table>
					<table width="700" border="1" bordercolor="#FFFFFF">
					<tr>
					 <td style="text-align:center;background-color:#00FF33;color:#000000">Total Price : <?php echo number_format($SumTotal,2);?> บาท</td>
					 </tr>
					</table>
					</form>
					<br><br><a href="index.php" style="color:#FFFFFF;margin-left:90px">Back to Food Menu | </a>
					<a href="view_order2.php?OrderID=<?php echo $_GET["OrderID"];?>" style="color:#FFFFFF">View OrderAll</a>
					<?php
					mysql_close();
					?>
			</div>
		
<?php
include 'footer.php';
?>