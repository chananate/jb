<?php
include 'headerr.php';

if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
?>
					<?php
					mysql_connect("127.0.0.1","root","");
					mysql_select_db("jb_shop");
					mysql_query("SET NAMES UTF8");
					?>
					<br><br><br>
					<center>
					<table class="table table-striped col-md-3" style="width:70%">
					  <tr style="background-color:#FFC300;color:#000000">
						
						<td width="101" style="text-align:center">FoodID</td>
						<td width="82" style="text-align:center">FoodName</td>
						<td width="82" style="text-align:center">Price</td>
						<td width="79" style="text-align:center">Amount</td>
						<td width="79" style="text-align:center">Total</td>
						<td width="79" style="text-align:center">Note</td>
					  </tr>
					  <?php
					  $Total = 0;
					  $SumTotal = 0;

					  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
					  {
						  if($_SESSION["strFoodID"][$i] != "")
						  {
							$strSQL = "SELECT * FROM food WHERE FoodID = '".$_SESSION["strFoodID"][$i]."' ";
							$objQuery = mysql_query($strSQL)  or die(mysql_error());
							$objResult = mysql_fetch_array($objQuery);
							if($_SESSION["hif"][$i]==2){
								$objResult["FoodPrice"]=$objResult["FoodPrice"]+5;
							}
							if($_SESSION["hif"][$i]==3){
								$objResult["FoodPrice"]=$objResult["FoodPrice"]+10;
							}
							
							$Total = $_SESSION["strAmount"][$i] * $objResult["FoodPrice"];
							$SumTotal = $SumTotal + $Total;
							 $_SESSION["strSum"]=$SumTotal;
							 $_SESSION["strTotal"]=$Total;
						  ?>
						  <tr>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $_SESSION["strFoodID"][$i];?></td>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodName"];?></td>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodPrice"];?></td>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $_SESSION["strAmount"][$i];?></td>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo number_format($Total,2);?></td>
							<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?=$_SESSION["strFoodNote"][$i];?></td>	
						</tr>
						  <?php
						  }
					  }
					  ?>
					</table>
					<form name="form1" method="post" action="save_checkout1.php">
					<br><br><br>
						  <table width="700"  >
						  <tr>
						  
						  <td style="text-align:center;color:red;font-size:1.2em"><b>Total Price : <?php echo number_format($SumTotal,2);?> บาท </b></td>
						  <td style="text-align:center;">
							<select class="custom-select custom-select-sm" name="notable">
							<option selected> Table no. / Take Home</option>
							<option value="1">No.1</option>
							<option value="2">No.2</option>
							<option value="3">No.3</option>
							<option value="4">No.4</option>
							<option value="5">No.5</option>
							<option value="6">No.6</option>
							<option value="7">No.7</option>
							<option value="8">No.8</option>
							<option value="9">No.9</option>
							<option value="10">No.10</option>
							<option value="11">No.11</option>
							<option value="12">No.12</option>
							<option value="13">No.13</option>
							<option value="14">No.14</option>
							<option value="15">No.15</option>
							<option value="16">Takehome</option>
							</select>
							</td>
							<td style="text-align:center;">
						จำนวนลูกค้า <input type="text" name="txtClient" width="50"></td>
						<td style="text-align:center;" width="127px"><input type="submit" value="Accept"></td>
							</tr>
					</table>
					</form>
					</center>
					<br><br>
					<?php
					mysql_close();
					?>
			</div>
		
<?php
include 'footer.php';
?>
