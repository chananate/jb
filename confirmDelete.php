<?php include "connect.php" ?>
<?php

$stmt = $pdo->prepare("DELETE FROM Food WHERE FoodID=?");
$stmt->bindParam(1, $_GET["FoodID"]); 
if ($stmt->execute())
{
header("location:orderadminnew.php");}
?>