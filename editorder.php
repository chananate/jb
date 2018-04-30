<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM food WHERE FoodID = ?");
$stmt->bindParam(1, $_GET["FoodID"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form action="editfood.php" method="post">
<input type="hidden" name="FoodID" value="<?=$row["FoodID"]?>">
ชื่อ : <input type="text" name="FoodName" value="<?=$row["FoodName"]?>"><br>
ราคา : <input type="number" name="FoodPrice" value="<?=$row["FoodPrice"]?>"><br>
สถานะ : <input type="number" name="FoodStatus" value="<?=$row["FoodStatus"]?>"><br>
<input type="submit" value="แก้ไขเมนู" >
</form>
</body>
</html>