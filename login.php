<?php
include 'headerr.php';
?>


<center>
<div style="margin-top: 10%; color:black">
<form class="px-4 py-3" action="login-ac.php" method="post">
  <div class="form-group col-md-3">
    <label for="formGroupExampleInput" style="font-size:16pt;">Username</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputPassword1" style="font-size:16pt;">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <small id="emailHelp" class="form-text text-muted">
    <span style="color:black">Create account </span>
    <b><i><a href="signup.php" style="color:black;">Register</a></i></b>
    </small>

  </div><br>
  <div class="text-center">
  <button type="submit" class="btn btn-outline-dark"  >Submit</button>
</div>
</form>
</div>
</center>


<?php
include 'footer.php';
?>
