<?php
ob_start();
session_start();

if(!isset($_SESSION["intLine"]))
{
	if(isset($_POST["txtFoodID"]))
	{
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strFoodID"][0] = $_POST["txtFoodID"];
		 $_SESSION["strAmount"][0] = $_POST["txtQty"];
		 $_SESSION["hif"][0]=$_POST["exampleRadios"];
		 $_SESSION["strFoodNote"][0]=$_POST["txtnote"];

		 header("location:show.php");
	}
}
else
{
	
	$key = array_search($_POST["txtFoodID"], $_SESSION["strFoodID"]);

	
	if((string)$key != "")
	{
		 $_SESSION["strAmount"][$key] = $_SESSION["strAmount"][$key] + $_POST["txtQty"];
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strFoodID"][$intNewLine] = $_POST["txtFoodID"];
		 $_SESSION["strAmount"][$intNewLine] = $_POST["txtQty"];
		 $_SESSION["hif"][$intNewLine]=$_POST["exampleRadios"];
		 $_SESSION["strFoodNote"][$intNewLine]=$_POST["txtnote"];
	}
	
	 header("location:show.php");

}
?>
