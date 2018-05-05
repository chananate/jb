<?php

mysql_connect("127.0.0.1","root","");
mysql_select_db("jb_shop");
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT * FROM employee WHERE username = '".$_GET['username']."' "; 
$objQuery = mysql_query($strSQL); 
$intRows = mysql_num_rows($objQuery); 
if($intRows>0)
	{
		echo "denied";
	}
	else
	{
		echo "okay";
	}
		mysql_close();


// $na='SELECT employee.username FROM employee';
// $takenUsernames = array ($na);

// sleep(1);

// if (!in_array( $_GET["username"], $takenUsernames )) {
// 	echo "okay";
// } else {
// 	echo "denied";
// }

?>
