<?php
include 'headerr.php';
include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<div style="margin-top:12%;">
<center>
<p style="font-size:2em; ">เพิ่มรายการอาหาร/เครื่องดื่ม<p>
<form  action="savefood.php" name="savefood" method="post">
<table  width="50%" border="1">
  <tr style="background-color:#FFC300;color:#000000" >
    <th width="15%"><center>FoodID</center></th>
    <th width="15%"><center>FoodType</center></th>
    <th width="35%"><center>FoodName</center></th>    
    <th width="15%"><center>Price</center></th>
    <th width="15%"><center>Satatus</center></th>
  </tr>
  <tr>
    <td><input style="width:100%;" type="text" name="FoodID" ></td>
    <td><input style="width:100%;" type="text" name="FoodType" ></td>
    <td><input style="width:100%;" type="text" name="FoodName"></td>
    <td><input style="width:100%;" type="number" name="Price" ></td>
    <td><input style="width:100%;" type="number" name="Status"></td>
  </tr>
  </table>
  <br>
  <input type="submit" name="Add" id="Add"  value="ยืนยัน">
  </form>
  </center>
  </div>
</form>
</body>
</html>