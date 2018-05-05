
<script type="text/javascript" src="jq142.min.js"> </script>

<?php
include 'headerr.php';
include 'connect.php';
$strSQL = "SELECT * FROM tables";
$result=$connect->query($strSQL);
?>
<br><br><br><br><br>
<B style="font-size:2em;">สถานะของโต๊ะ ร้านอาหาร j&b</B><br><br>
<a href="checkBill.php" style="text-decoration: none">
<span style="font-size:1.5em;">>>เปลี่ยนสถานะโต๊ะ<<</span></a>
<br><br>
<center>
<table width="40%" border="2" >
    <tr>
        <th style="text-align:center; background-color:#D6DBDF;">โต๊ะ</th>
        <th style="text-align:center; background-color:#D6DBDF;" >สถานะ</th>
    </tr>
    <?php
    while($objResult=$result->fetch_assoc() )
	{
	?>
					  
    <tr>
        <td style="text-align:center; background-color:#F2F3F4;"><?=$objResult["TID"];?></td>
        <?php if($objResult["Status"]==1){ ?>
        <td style="text-align:center; background-color:#F2F3F4;"><img id="item_1" src="green.png" style="height:40;" /></td>
        <?php } else { ?>
            <td style="text-align:center;background-color:#F2F3F4;"><img id="item_1" src="red.png" style="height:40;" /></td>
        <?php } ?>

    </tr>
    <?php } ?>
</table>
        </center>

<br><br><br>
<?php include 'footer.php'; ?>
