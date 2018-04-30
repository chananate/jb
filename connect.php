<?php

$connect = new mysqli("localhost","root","","jb_shop");

if($connect->connect_errno){
	printf("Connect failed: %s\n",$connect->connect_error);
	exit();
}
$connect->query("SET NAMES utf8");

try{
	$pdo = new PDO("mysql:host=localhost;dbname=jb_shop;charset=utf8","root","");
	} catch(PDOException $e){
		echo"error : ".$e->getMessage();
	}
	
?>

