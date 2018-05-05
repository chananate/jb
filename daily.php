<?php include 'headerr.php'; 
if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
	echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
	return ;
}
if($_SESSION["empType"] !="ET1"){
	echo ('<script> alert("Admin only."); window.location="index.php";</script>');
	return ;
} ?>
<br><br><br><br>
<?php
include 'connect.php';
$sum=0;
	$strSQL = "SELECT * FROM orders WHERE OrderDate='".date('Y-m-d')."'";
	$objQuery = $connect->query($strSQL);
	// echo "DATE - ".date('Y-m-d');
	//echo $objResult[0];
	?>
	<div style="text-align:center">
	<b>Date <br> <?=date('d-m-y');?></b>
	</div>
	<br>
	
	<center>
	
	<table id="example" class="table table-striped "style="width:30%"  >
		<thead>
		<tr style="background-color:#FFC300;color:#000000">
		<td width="50%" style="text-align:center">Time</td>
		<td width="100%" style="text-align:center">Amount Price</td>
		</tr>
	</thead>

	<?php
	
	while($row = $objQuery->fetch_assoc()){
		$sum=$sum+$row['AmountPrice']; ?>
		<tr>
		
		<td style="text-align:center;background-color:#FDF8D9;color:#000000"><b><?=$row["OrderTime"];?></b></td>
		<td style="text-align:center;background-color:#FDF8D9;color:#000000"><?=$row["AmountPrice"];?></td>
		
		</tr>	
		<?php
	}?>
</table>
	<div style="text-align:center; font-size:1.5em; color:red">
	<b>Daily income = <?=$sum;?>
	</b></div>
	<br>
	<!-- <br><a href="add-daily.php?sum=<?=$sum;?>" style="color:#FFFFFF;"><button type="button" class="btn btn-dark">update daily income</button></a> -->


</center>



<?php include 'footer.php'; ?>