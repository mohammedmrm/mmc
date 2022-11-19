<?php
  if(isset($_SESSION['login']) && isset($_SESSION['user_id']) && $_SESSION['login']==1){

  }else{
    header("location: http://37.98.226.42/mmc/login.php");
    die("Access Denied");
  }
?>
