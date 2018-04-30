<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("UPDATE food SET FoodName=?,FoodPrice=?,FoodStatus=?
WHERE FoodID=?"); 

$stmt->bindParam(1, $_POST["FoodName"]); 
$stmt->bindParam(2, $_POST["FoodPrice"]);
$stmt->bindParam(3, $_POST["FoodID"]);
$stmt->bindParam(4, $_POST["FoodID"]);


if ($stmt->execute())
echo "แก้ไข " . $_POST["FoodName"] . " สําเร็จ";


?>