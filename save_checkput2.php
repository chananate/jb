<?php
session_start();

include 'connect.php';


for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
{
    if($_SESSION["strFoodID"][$i] != "")
    {
          

            $strSQL = "INSERT INTO ordersItem (OrderID,EmpID,FoodID,Amount)
              VALUES('".$strOrderID."','".$_SESSION["strFoodID"][$i]."','".$_SESSION["strAmount"][$i]."') 
            ";
            mysql_query($strSQL) or die(mysql_error());
    }
}



mysql_close();

session_destroy();
echo "<script>window.location='view_order.php?OrderID=".$strOrderID."';</script>"
//header("location:view_order.php?OrderID=".$strOrderID);
?>