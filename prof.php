<?php 
    include 'headerr.php';

    if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
        echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
        exit() ;
    }
    echo "<br><br><br>";

    include 'connect.php';

    $sql='SELECT * FROM employee WHERE EmpID="'.$_SESSION["empID"].'" ';
    $query = $connect->query($sql);
    $pro=$query->fetch_assoc();
    
    // var_dump($pro);
    // exit();
   // $pro=$pro;
//    while ($row = mysql_fetch_assoc($res))
//    {
//        print_r($row);
//    }
//    exit();
?>

    
<br><br><br>

<center>

<div class="card mb-3 bg-light" style="max-width: 40em; font-size:13pt;">
  <div class="card-header" style="background-color:#c0c5db">
  <b>Profile</b>
  </div>
  <div class="card-body">
    <p class="card-text">
    <b>ID : </b><?=$pro["EmpID"];?><br>
    <b>Type : </b><?=$pro['TypeID'];?>
    <br>
        <form action="editpro.php" method="post">
            <b>Name : </b><?=$pro['EmpName'];?><br>
            <b>Address : </b><?=$pro['EmpAddress'];?><br>
            <b>Tel. : </b><?=$pro['EmpTel'];?><br>
            <b>username : </b><?=$pro['username'];?><br><br>   
            <button type="submit" class="btn btn-outline-dark btn-lg">Edit</button>
        </form>
    </p>
  </div>
</div>
<br>
<?php if($_SESSION['empType']=='ET1'){ ?>
    <span style="font-size:1.5em">แก้ไขสิทธิ์ของพนักงาน </span><br>
    <a href="edit-type.php"><button type="submit" class="btn btn-outline-danger btn-lg">Edit</button></a>
<?php } ?>

</center>
<br><br>
<?php include "footer.php"; 
?>