<?php
	include 'connect.php';

	$strFt = "UPDATE tables SET Status=1 WHERE TID='T".$_POST['idtb']."'";
	$objFt = $connect->query($strFt);
							
header("Location:new.php");
?>