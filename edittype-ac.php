<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("UPDATE employee SET TypeID=?
WHERE EmpID=?"); 

$stmt->bindParam(1, $_POST["emptype"]); 
$stmt->bindParam(2, $_GET["EmpID"]);



if ($stmt->execute()){
echo ("<script> alert('successfully'); </script>");
header("location:edit-type.php");

}
?>