<?php
session_start();


if(!isset($_SESSION["username"]) || $_SESSION["username"] ==""){
    echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
    return ;
}

if($_POST["password"] != $_POST["con-pass"]){
    echo ("<script> alert('Password not match!'); window.location='editpro.php';</script>");
    exit();
    }

   include 'connect.php';

    $strSQL = 'UPDATE employee SET ';

    if($_POST['name'] != ""){
$strSQL .="EmpName = '".$_POST['name']."' ";
    }
    if($_POST['name'] == ""){
        $strSQL .="EmpName = EmpName ";
            }

    //$strSQL .=",username = '".$_POST["username"]."' ";


    if($_POST['password'] != ""){
    $strSQL .=",password = '".md5($_POST['password'])."' ";
}
if($_POST['password'] == ""){
    $strSQL .=",password = password ";
}

    if($_POST['address'] != ""){
    $strSQL .=",EmpAddress = '".$_POST['address']."' ";
}
if($_POST['address'] == ""){
    $strSQL .=",EmpAddress = EmpAddress ";
}

    if($_POST['tel'] != ""){
    $strSQL .=",EmpTel = '".$_POST['tel']."' ";
}
if($_POST['tel'] == ""){
    $strSQL .=",EmpTel = EmpTel ";
}

    $strSQL .="WHERE username = '".$_SESSION['username']."' ";
    $objQuery =$connect->query($strSQL);
        echo ("<script> alert('submit seccessfully!'); window.location='prof.php';</script>");
    

?>