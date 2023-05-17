<?php
  session_start();
  if (!isset($_SESSION['activeUser'])){
    header('location:login.php?error=1');
    die ();
  }
?>