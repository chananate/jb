<?php include 'headerr.php'; 
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
if($_SESSION["empType"] !="ET1"){
	echo ('<script> alert("Admin only."); window.location="index.php";</script>');
	return ;
}
?>


<?php include 'footer.php'; ?>