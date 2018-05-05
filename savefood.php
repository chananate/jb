
<?php

// เชื่่อมต่อฐานข้อมูล
include 'connect.php';
//--->
$FoodID = $_POST['FoodID'];
$FoodType = $_POST['FoodType'];
$FoodName = $_POST['FoodName'];
$Price = $_POST['Price'];
$Status = $_POST['Status'];
// เพิ่มลงฐานข้อมูล
$sql_add = "insert into food set 
FoodID  = '$FoodID ' , FoodTypeID = '$FoodType' , FoodName = '$FoodName' , FoodPrice = '$Price' , FoodStatus='$Status' ";
$query=$connect->query($sql_add);
header("location:insertfood.php");
?>