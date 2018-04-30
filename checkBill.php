<?php include 'headerr.php';
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
} ?>

<br><br><br><br>
<div style="margin-top:10%">
    <b>CHECK BILL</b><br><br>
<form action="cb-ac.php" method="post">
No. order <input type="text" name="idbill"> <input type="submit">
</form>
</div>

<?php include 'footer.php';?>