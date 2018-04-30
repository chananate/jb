<?php
include 'connect.php';
$stmt = $pdo->prepare("SELECT * FROM Food WHERE FoodName LIKE ? ");

if (!empty($_GET)) 
$value = '%'. $_GET["keyword"] . '%'; 
$stmt->bindParam(1, $value);
$stmt->execute();
include 'header.php';
?>
<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top:3%; margin-left:2.8%;">
    <form class="form-inline dropdown-item" action="search.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" style="width:50%"; >
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>

<center style="color:gray;font-size:16pt; margin-left:2.8%;">
 <b>search for " <?=$_GET['keyword']?>"</b>   
</center>
<br><br>

<?php 
while ($row = $stmt->fetch()) : ?>

<div style="position:relative; left:3%;" >
    <span style ="color:red"><?=$row ["FoodName"]?></span>
    <span style ="color:red"><?=$row ["FoodPrice"]?> บาท </span>
    <br><br><br><br>
</div>
<?php endwhile; ?>
<?php
include 'footer.php';
?>



