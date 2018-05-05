<?php
include 'headerr.php';
include 'connect.php';?>
<br><br><br><br>
<div style="font-size:2em; color:red">
<b>BEST SELLER</b>
</div>
<br>
<center>
<table id="example" class="table table-striped "style="width:50%"  >
    <thead>
		<tr style="background-color:#FFC300;color:#000000">
            <td width="50" style="text-align:center">FoodID</td>
            <td width="80" style="text-align:center">FoodName</td>
            <td width="30" style="text-align:center">price</td>
        </tr>
	</thead>
<tbody>
    <?php
    
    $strSQL = "select Food.FoodID,FoodName,FoodPrice from food,orderitem where food.FoodID=orderitem.FoodID order by orderitem.OrderAmount DESC limit 0,3";

    $result=$connect->query($strSQL);

    while($objResult=$result->fetch_assoc() ){
    
    ?>
        <tr >
        <td style="text-align:center;background-color:#FDF8D9;color:#000000"><b><?php echo $objResult["FoodID"];?></b></td>
        <td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodName"];?></td>
        <td style="text-align:center;background-color:#FDF8D9;color:#000000"><?php echo $objResult["FoodPrice"];?> ฿ </td>
        </tr>
    <?php 
    }
    ?>
</table>	
</center>
<?php
include 'footer.php';
?>