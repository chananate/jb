<?php
session_start();


$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "jb_shop";
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$conn->query("set names utf8");



	//$strSQL = $pdo->prepare("INSERT INTO orders(OrderDate) VALUES (". date("Y-m-d H:i:s").")");
	

  // $strSQL = "
	// INSERT INTO orders (OrderDate)
	// VALUES
	// ('".date("Y-m-d H:i:s")."') 
  // ";
	// 
	// $Total = 0;
	// $SumTotal = 0;
	// for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
	// {
	// 	if($_SESSION["strFoodID"][$i] != "")
	// 	{
	// $strSQL0 = "SELECT * FROM Food WHERE FoodID = '".$_SESSION["strFoodID"][$i]."' ";
	// $objQuery = mysql_query($strSQL0)  or die(mysql_error());
	// $objResult = mysql_fetch_array($objQuery);
	// if($_SESSION["hif"][$i]==2){
	// 	$objResult["FoodPrice"]=$objResult["FoodPrice"]+5;
	// }
	// if($_SESSION["hif"][$i]==3){
	// 	$objResult["FoodPrice"]=$objResult["FoodPrice"]+10;
	// }
	// $Total = $_SESSION["strAmount"][$i] * $objResult["FoodPrice"];
	// $SumTotal = $SumTotal + $Total;
	// echo $SumTotal;
	// exit();
	// 	}
	// }

	$_SESSION["tkh"]=0;
	if($_POST["notable"]<16){
		$_SESSION["noTable"]=$_POST["notable"];
		$stsTable="UPDATE tables SET status = 0 WHERE TID='T".$_SESSION['noTable']."'";
		$conn->query($stsTable); 
	}
	if($_POST["notable"]==16){
		$_SESSION["tkh"]=1;
	}

	if($_POST["notable"]==""){
		echo ('<script> alert("No. table / take home not found"); window.location="checkout.php";</script>');
	}
	if($_POST["txtClient"]==""){
		echo ('<script> alert("No. table / take home not found"); window.location="checkout.php";</script>');
	}else{
		// echo $_SESSION['empID']." ".$_SESSION['empType']." ".$_SESSION['noTable']." ".$_SESSION['strSum']." ".$_POST['txtClient'];
		// exit();
		
	$strSQL1 = "INSERT INTO orders (EmpID,TypeID,TID,OrderDate,AmountPrice,TotalCustomer,Takehome) VALUES ('".$_SESSION['empID']."','".$_SESSION['empType']."','T".$_SESSION['noTable']."','".date('Y-m-d H:i:s')."','".$_SESSION['strSum']."','".$_POST['txtClient']."','".$_SESSION['tkh']."')";
	$conn->query($strSQL1); 
	
	$strOrderID = mysqli_insert_id($conn);
	// echo json_encode($_POST),"\n";
	// echo $strOrderID,"\n";
	// echo $strSQL1,"\n";
	// exit();
// echo $strOrderID;
// exit();
// while ($row = mysql_fetch_assoc($strSQL1))
// {
//     print_r($row);
// }
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strFoodID"][$i] != "")
	  {
		// $strSQL2 = "SELECT * FROM orders ";
		// $objQuery = mysql_query($strSQL2)  or die(mysql_error());
		// $objResult = mysql_fetch_array($objQuery);
		// $strSQL3 = "SELECT * FROM food WHERE FoodID = '".$objResult2["FoodID"]."' ";
		// $objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
		// $objResult3 = mysql_fetch_array($objQuery3);
		// $Total = $objResult2["OrderAmount"] * $objResult3["FoodPrice"];
		$strSQL4 = "INSERT INTO orderItem (OrderID,EmpID,TypeID,FoodID,TID,OrderAmount,OrderFoodPrice,ItemNote) VALUES('".$strOrderID."','".$_SESSION['empID']."','".$_SESSION['empType']."','".$_SESSION['strFoodID'][$i]."','T".$_SESSION['noTable']."','".$_SESSION['strAmount'][$i]."','".$_SESSION['strSum']."','".$_SESSION['strFoodNote'][$i]."')";
		// mysql_query($strSQL) or die(mysql_error());
		// $query2 = mysqli_query($conn,$strSQL4);
		$conn->query($strSQL4); 
	  }
  }
  
//mysql_close($conn); $conn->close()
//$_SESSION['strSum'];
// session_destroy();
// echo ('<script>window.location="view_order2.php?OrderID="'.$strOrderID.'";</script>');
//exit();


header("Location: view_order2.php?OrderID=".$strOrderID);
// echo 'location : view_order2.php?OrderID='.$strOrderID;
	}
?>