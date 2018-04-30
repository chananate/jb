<?php
if($_POST['Add'])
{
// เชื่่อมต่อฐานข้อมูล
$host="localhost"; // กำหนด host
$username="root"; // กำหนด username
$pass_word=""; // กำหนด Password
$db="jb_shop"; // กำหนดชื่อฐานข้อมูล
$Conn = mysql_connect( $host,$username,$pass_word) or die ("ติดต่อฐานข้อมูลไม่ได้");// ติดต่อฐานข้อมูล
mysql_query("SET NAMES utf8",$Conn); // set กำหนดมาตราฐาน
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล 
//--->
$FoodID = $_POST['FoodID'];
$FoodType = $_POST['FoodType'];
$FoodName = $_POST['FoodName'];
$Price = $_POST['Price'];
$Status = $_POST['Status'];
// เพิ่มลงฐานข้อมูล
$sql_add = "insert into food set 
FoodID  = '$FoodID ' , FoodTypeID = '$FoodType' , FoodName = '$FoodName' , FoodPrice = '$Price' , FoodStatus='$Status' ";
mysql_query($sql_add) or die(mysql_error());
echo "เพิ่มข้อมูลของ". $name." สำเร็จแล้ว";
}
?>