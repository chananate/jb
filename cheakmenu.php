<?php
//โซนนี้ทั้งโซนเลยมึง 55555555
mysql_connect("127.0.0.1","root","");
mysql_select_db("jb_shop");
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT * FROM food WHERE FoodID = '".$_GET['username']."' "; 
$objQuery = mysql_query($strSQL); 
$intRows = mysql_num_rows($objQuery); 
// echo $strSQL;
// exit();
if($intRows>0)
{
    echo "denied";
}
else
{
    echo "okay";
}
    mysql_close();
    //เครียดเลยกู

// $takenFoodID = array("");
// sleep(1);
// if (!in_array( $_GET["FoodID"], $takenFoodID ) ) {
// echo "okay";
// } else {
// echo "denied";
// }
?>