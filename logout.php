<?php
session_start();
session_destroy();
echo ('<script> alert("Logout seccessfully."); window.location="home.php";</script>');
?>