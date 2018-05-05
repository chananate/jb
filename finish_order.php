
<?php
include 'headerr.php';
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	exit() ;
}
?>
    <div id="pageContent">
		<div class="articleTitle"></div>
			<div class="articleContent">
				Finish Your Order. <br><br>

				
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
