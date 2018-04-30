
<script type="text/javascript" src="jq142.min.js"> </script>

<?php
include '../headerr.php';
include '../connect.php';
$strSQL = "SELECT * FROM tables";
$result=$connect->query($strSQL);
?>
<br><br><br><br><br>
<center>
<table width="40%" border="4" >
    <tr>
        <th style="text-align:center">โต๊ะ</th>
        <th style="text-align:center">สถานะ</th>
    </tr>
    <?php
    while($objResult=$result->fetch_assoc() )
	{
	?>
					  
    <tr>
        <td style="text-align:center"><?=$objResult["TID"];?></td>
        <?php if($objResult["Status"]==1){ ?>
        <td style="text-align:center"><img id="item_1" src="green.png" style="height:40;" /></td>
        <?php } else { ?>
            <td style="text-align:center"><img id="item_1" src="red.png" style="height:40;" /></td>
        <?php } ?>

    </tr>
    <?php } ?>
</table>
        </center>


