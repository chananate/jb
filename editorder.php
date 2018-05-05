<?php include "connect.php"; include 'headerr.php';  
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
    echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
    exit() ;
}
$stmt = $pdo->prepare("SELECT * FROM food WHERE FoodID = ?");
$stmt->bindParam(1, $_GET["FoodID"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<div style="margin-top:12%;">
<center>
<p style="font-size:2em; ">แก้ไขรายการอาหาร/เครื่องดื่ม<p>
<form  action="editfood.php" method="post">
<table  width="50%" border="1">
<tr style="background-color:#FFC300;color:#000000" >
    <th ><center>FoodName</center></th>    
    <th ><center>Price</center></th>
    <th ><center>Satatus</center></th>
</tr>
<tr>
     <input type="hidden" name="FoodID" value="<?=$row["FoodID"]?>">
     <td><input style="width:100%;" type="text" name="FoodName" value="<?=$row["FoodName"]?>"><br></td><br>
     <td><input style="width:100%;" type="number" name="FoodPrice" value="<?=$row["FoodPrice"]?>" min="1"><br></td><br>
     <td><input style="width:100%;" type="number" name="FoodStatus" value="<?=$row["FoodStatus"]?>" min="0" max="1"><br></td><br>
</tr>
</table><br>
<input type="submit" value="แก้ไขเมนู" >
</form>
</center>
</div>
</body>
</html>