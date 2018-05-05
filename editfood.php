<?php include "connect.php" ?>
<?php
$stmt = "UPDATE food SET FoodName='".$_POST["FoodName"]."',FoodPrice=".$_POST["FoodPrice"].",FoodStatus=".$_POST["FoodStatus"]."
WHERE FoodID='".$_POST["FoodID"]."'"; 

$query=$connect->query($stmt);
header("Location:orderadminnew.php");


?>