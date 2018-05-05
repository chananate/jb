<?php
include 'headerr.php';

if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
?>
					
					<?php
					include 'connect.php';
					
					$strSQL = "SELECT * FROM orders WHERE Orderid='".$_POST['idbill']."'";
					$objQuery = $connect->query($strSQL);
					$objResult = $objQuery->fetch_assoc();
				?>

					<center>
						<br><br><br><br><br>
						<div style="font-size:1.5em"><b> Order No. <?=$_POST['idbill'];?></b>
						<?php if($objResult["Takehome"]!=1){ ?>
									<div style="font-size:0.8em"> Table No. <?=$objResult['TID'];?></div>
						<?php }else{ ?>
									<div style="font-size:0.8em">Takehome</div>
						<?php } ?>
						</div><br><br>
					<form>
					<table class="table table-striped col-md-3" style="width:70%" border="1" bordercolor="#FFFFFF">
					  <tr style="background-color:#FF99FF;color:#000000">
						<td width="71" style="text-align:center;background-color:#FFC300;color:#000000">OrderID</td>
						<td width="71" style="text-align:center;background-color:#FFC300;color:#000000">OrderDate</td>
						<td width="71" style="text-align:center;background-color:#FFC300;color:#000000">EmpID</td>
						<td width="71" style="text-align:center;background-color:#FFC300;color:#000000">TypeID</td>
						<td width="71" style="text-align:center;background-color:#FFC300;color:#000000"">TID</td>
						<td width="101" style="text-align:center;background-color:#FFC300;color:#000000">FoodID</td>
						<td width="2000" style="text-align:center;background-color:#FFC300;color:#000000">FoodName</td>
						<td width="82" style="text-align:center;background-color:#FFC300;color:#000000">TotalCustomer</td>
						<td width="79" style="text-align:center;background-color:#FFC300;color:#000000">Takehome</td>
					  </tr>
					<?php
					
					$Total = 0;
					$SumTotal = 0;

					$strSQL2 = "SELECT * FROM orderitem";
					//$strSQL4 = "SELECT * FROM orders";
					$objQuery2 = $connect->query($strSQL2);

					

					while($objResult2 = $objQuery2->fetch_assoc())
					{
						if($objResult2['Orderid']==$_POST['idbill']){

							$strSQL3 = "SELECT * FROM food WHERE FoodID = '".$objResult2["FoodID"]."' ";
							$objQuery3 = $connect->query($strSQL3);
							$objResult3 = $objQuery3->fetch_assoc();

							// $strFt = "UPDATE tables SET Status=1 WHERE TID='".$objResult2['TID']."'";
							// $objFt = $connect->query($strFt);
							
							$strCas="UPDATE orders SET Cashier= '".$_SESSION['empID']."' WHERE Orderid='".$_POST['idbill']."'";
							$objCas = $connect->query($strCas);
							

							$Total = $objResult2["OrderAmount"] * $objResult3["FoodPrice"];
							$SumTotal = $SumTotal + $Total;

					?>
						  <tr>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["Orderid"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["OrderDate"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["EmpID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["TypeID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000" width="700"><?php echo $objResult["TID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult2["FoodID"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo $objResult3["FoodName"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo
							$objResult["TotalCustomer"];?></td>
							<td style="text-align:center;background-color:#FFFAF0;color:#000000"><?php echo
							$objResult["Takehome"];?></td>
				
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
					<?php
					
					
					//mysql_close();
					unset($_SESSION["intLine"]);
					unset($_SESSION["strFoodID"]);
					unset($_SESSION["strAmount"]);
					unset($_SESSION["hif"]);
					unset($_SESSION["strFoodNote"]);
					unset($_SESSION["noTable"]);
					unset($_SESSION["tkh"]);
					unset($_SESSION['strSum']);
				


include 'footer.php';
?>