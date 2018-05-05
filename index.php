<?php
include 'headerr.php';

?>
<center>
    <div id="pageContent">
				<div style="margin-top:10%;">

				<img src="img/iconn.png"></img><br>
				<b><font size="6em">J&B restuarant</font></b></div><br>
				<?php if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){?>
				<font size="4em"><i>please login first.</i></font></div><br>
				<a href="login.php">
				<button type="button" class="btn btn-outline-dark btn-lg">
				LOGIN</button><a>
				<?php } else {?>
					<font size="4em"><i><?=$_SESSION['username'];?></i></font></div><br>
					<a href="prof.php">
				<button type="button" class="btn btn-outline-dark btn-lg">
				profile</button><a>
				<?php } ?>
				</div>
</div>
</center>
<br><br><br><br>



<?php
include 'footer.php';
?>