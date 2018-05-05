<?php include "connect.php"; include 'headerr.php';
if($_SESSION["empType"] !="ET1"){
    echo ('<script> alert("admin only!."); window.location="home.php";</script>');
    exit() ;
}    
?>
<?php
$stmt = $pdo->prepare("SELECT * FROM employee WHERE EmpID = ?");
$stmt->bindParam(1, $_GET["EmpID"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<div style="margin-top:12%;">
<center>
<p style="font-size:2em; ">แก้ไขสิทธิ์ของพนักงาน<p>
<form  action="edittype-ac.php?EmpID=<?=$_GET['EmpID'];?>" method="post">
<table  width="50%" border="1">
<tr style="background-color:#FFC300;color:#000000" >
    <th ><center>Name</center></th>    
    <th ><center>EmpType</center></th>
</tr>
<tr style="text-align:center">
    <td style="background-color:white" width="30%"><?=$row['EmpName'];?></td>
     <td><input style="width:100%;text-align:center" type="text" name="emptype" value="<?=$row["TypeID"]?>"><br></td><br>
</tr>
</table><br>
<input type="submit" value="edit" >
</form>
</center>
</div>
</body>
</html>