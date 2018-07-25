<?php
  include 'user.php';
  User::logout();
  header("Location: index.php");
  exit();
?>
