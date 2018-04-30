<?php 
    include 'headerr.php';

    if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
        echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
        exit() ;
    }
    echo "<br><br><br>";

    $hostname = "localhost"; 
    $usename = "root"; 
    $password = ""; 
    $database = "jb_shop"; 
    $conn = mysql_connect($hostname,$usename,$password,$database) or die ("ติดต่อฐานข้อมูลไม่ได้");
    mysql_query("SET NAMES UTF8",$conn);
    mysql_select_db($database) or die ("เลือกฐานข้อมูลไม่ได้");

    $sql='SELECT * FROM employee WHERE EmpID="'.$_SESSION["empID"].'" ';
    $query = mysql_query($sql) or die ("pro error [".$sql."]");
    $pro=mysql_fetch_assoc($query);
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
        <form action="edit-pro.php" method="post">
       
            <b>ID : </b><?=$pro["EmpID"];?><br>
            <b>Type : </b><?=$pro['TypeID'];?><br>
            <b>Name : </b><?=$pro['EmpName'];?><br>
            <b>Address : </b><?=$pro['EmpAddress'];?><br>
            <b>Tel. : </b><?=$pro['EmpTel'];?><br>
            <b>username : </b><?=$pro['username'];?><br><br>   
            <button type="submit" class="btn btn-outline-dark btn-lg">Edit</button>
        </form>
    </p>
  </div>
</div>

</center>

<?php include "footer.php"; 
?>