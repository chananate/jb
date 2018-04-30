<?php
//session_start();
//session_destroy();
?><html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
mysql_connect("localhost","root","");
mysql_select_db("jb_shop");
$strSQL = "SELECT * FROM food";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
?>
<table width="450"  border="1">
  <tr>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="50">Price</td>
    <td width="100">Cart</td>
  </tr>
  <?php
  while($objResult = mysql_fetch_array($objQuery))
  {
  ?>
  <tr>
  <form action="order.php" method="post">
    <td><?php echo $objResult["FoodID"];?></td>
    <td><?php echo $objResult["FoodName"];?></td>
    <td><?php echo $objResult["FoodPrice"];?></td>
    <td><input type="hidden" name="txtProductID" value="<?php echo $objResult["FoodID"];?>" size="2"> <input type="text" name="txtQty" value="1" size="2"> <input type="submit" value="Add"></td>
	</form>
  </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
<?php

?>
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>