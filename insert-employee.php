
<?php
include "connect.php";


if(trim($_POST["username"]) == ""){	
echo ("<script> alert('Please input Username!'); window.location='signup.php';</script>");
exit();
}

if(trim($_POST["password"]) == ""){
echo ("<script> alert('Please input Password!'); window.location='signup.php';</script>");
exit();
}  

if($_POST["password"] != $_POST["conpassword"]){
echo ("<script> alert('Password not match!'); window.location='signup.php';</script>");
exit();
}

if(trim($_POST["name"]) == ""){
echo ("<script> alert('Please input Name!'); window.location='signup.php';</script>");
exit();
}  


if(trim($_POST["tel"]) == ""){
    echo ("<script> alert('Please input tel!'); window.location='signup.php';</script>");
    exit();
    }  

if($_POST["address"] ==""){
		echo ("<script> alert('Please input Address!'); window.location='signup.php';</script>");
		exit();
		}


				$stmt = $pdo->prepare("INSERT INTO employee VALUES ( '', 'ET3', ?, ?, ?, ?, ?)");
				
				$stmt->bindParam(1, $_POST["name"]);
				$stmt->bindParam(2, $_POST["address"]);
				$stmt->bindParam(3, $_POST["tel"]);
				$stmt->bindParam(4, $_POST["username"]);
				$stmt->bindParam(5, md5($_POST["password"]));
				
				$stmt->execute(); // เริ่มเพิ่มข้อมูล
				$pid = $pdo->lastInsertId(); // ขอคยี ห์ ลกัทเี่ พมิ่ สา เร็จ
					
				
?>
