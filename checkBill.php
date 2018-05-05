<?php include 'headerr.php';
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
} ?>

<br><br><br><br>
<div style="margin-top:8%">
    <b>CHECK BILL</b><br><br>
<form action="cb-ac1.php" method="post">
No. Order <input type="number" name="idbill" min="1"> <input type="submit">
</form>
</div>
<br><br><br><br>
<div>
    <b>CLEAR TABLE</b><br><br>
<form action="cb-ac2.php" method="post">
No. Table <input type="number" name="idtb" min="1"> <input type="submit">
</form>
</div>

<?php include 'footer.php';?>