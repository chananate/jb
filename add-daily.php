<?php

include 'connect.php';

$stmt = "INSERT INTO daily_income VALUES ( '',  '".date('Y-m-d')."', ".$_GET['sum'].")";
$query=$connect->query($stmt);

$strDailyID = mysqli_insert_id($connect);

$strDid="UPDATE orders SET DID= '".$strDailyID."' WHERE OrderDate='".date('y-m-d')."'";
$query2=$connect->query($strDid);

echo ('<script> alert("successfully!"); </script>');
header("location:home.php");
	?>