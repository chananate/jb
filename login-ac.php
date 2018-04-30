<?php
session_start();
include "connect.php";

if(!isset($_POST['username']) || $_POST['username']==""){
    echo ('<script> alert("Username not found"); window.location="login.php";</script>');
}
if(!isset($_POST['password']) || $_POST['password']==""){
    echo ('<script> alert("Password not found"); window.location="login.php";</script>');
}
$sql='SELECT * FROM employee WHERE username="'.$_POST["username"].
'" and password="'.$_POST["password"].'" ';

$result = $connect->query($sql);
$user = $result->fetch_assoc();


if(!isset($user['username']) || !$user['username']){
    echo ('<script> alert("Invalid username or password."); window.location="login.php";</script>');
}
$result->close();
$_SESSION['username']=$user['username'];
$_SESSION['name']=$user['EmpName'];
$_SESSION['empID']=$user['EmpID'];
$_SESSION['empType']=$user['TypeID'];
echo ('<script> alert("Login seccessfully."); window.location="home.php";</script>');

?>