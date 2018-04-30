<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strFoodID"][$Line] = "";
	$_SESSION["strAmount"][$Line] = "";

	header("location:show.php");
?>
