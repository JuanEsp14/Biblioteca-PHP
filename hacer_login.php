<?php session_start(); ?>
<?php
  include("user.php");
  include("connection.php");

  if(User::logeado()){
    header("Location: index.php");
    exit;
  }

  if(isset($_POST["login"])){
    try {
      User::login($_POST['email'], $_POST['clave']);
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
      header('Location: inicio.php');
      exit;
    }
  }
  header('Location: index.php');
?>
