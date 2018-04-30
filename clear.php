<?php
	ob_start();
	session_start();

	// session_destroy();

	unset($_SESSION["intLine"]);
	unset($_SESSION["strFoodID"]);
	unset($_SESSION["strAmount"]);
	unset($_SESSION["hif"]);
	unset($_SESSION["strFoodNote"]);

	// $_SESSION["intLine"]="";
	// $_SESSION["strFoodID"]="";
	// $_SESSION["strAmount"]="";
	// $_SESSION["hif"]="";
	// $_SESSION["strFoodNote"]="";
	header("location:show.php");
?>

