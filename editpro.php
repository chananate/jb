<?php 
    include "headerr.php";
    if(!isset($_SESSION["username"]) ||$_SESSION["username"] ==""){
        echo ('<script> alert("Not found any profile, Please login first."); window.location="login.php";</script>');
        return ;
    }
    include 'connect.php';

    $sql='SELECT * FROM employee WHERE EmpID="'.$_SESSION["empID"].'" ';
    $query = $connect->query($sql);
    $pro=$query->fetch_assoc();
    ?>
    <br><br><br>
<center>
    
<div class="card mb-3 bg-light" style="max-width: 40rem; font-size:13pt;">
  <div class="card-header" style="background-color:#c0c5db"><b>Edit Profile</b></div>
  <div class="card-body">
    <p class="card-text">
        <form action="update-emp.php" method="post">
    <b>Name : </b>
    <input type="text" name="name" id="name" placeholder="<?=$pro['EmpName'];?>"><br><br>
<!--<b>Username : </b>
<input type="text" name="username" id="username" placeholder="<.?=$pro['username'];?>"><br><br>-->
<b>Password : </b>
<input type="password" name="password" id="password" ><br><br>
<b>Confirm Password : </b>
<input type="password" name="con-pass" id="con-pass"><br><br>
<b>Address : </b>
<input type="text" name="address" id="address" placeholder="<?=$pro['EmpAddress'];?>"><br><br>
<b>Tel. : </b>
<input type="text" name="tel" id="tel" placeholder="<?=$pro['EmpTel'];?>"><br><br>
<br>   
<button type="submit" class="btn btn-outline-dark btn-lg">Submit</button>
<a href="prof.php" style="z-index:3;"><button type="button" class="btn btn-outline-dark btn-lg">Cancel</button></a>
</form>
    </p>
  </div>
</div>

</center>
<br><br>
<?php include "footer.php"; 
?>