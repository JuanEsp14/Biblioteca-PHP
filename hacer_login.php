<?php session_start(); ?>
<?php require_once("connection.php"); ?>
<?php
  $link = conectar();

  if(isset($_SESSION["session_username"])){
    header("Location: index.php");
    exit;
  }

  if(isset($_POST["login"])){
    if(!empty($_POST['email']) && !empty($_POST['clave'])) {
      $username=$_POST['email'];
      $password=$_POST['clave'];

      $query =mysqli_query($link, "SELECT * FROM usuarios WHERE email='".$username."' AND clave='".$password."'");
      $numrows=mysqli_num_rows($query);

      if($numrows!=0){
        while($row=mysqli_fetch_assoc($query)){
          $dbusername=$row['email'];
          $dbpassword=$row['clave'];
        }
        if($username == $dbusername && $password == $dbpassword){
          $_SESSION['session_username']=$username;
          /* Redirect browser */
          header("Location: index.php");
          exit;
        }
      }else{
        $_SESSION['error'] = "Nombre de usuario ó contraseña invalida!";
        header("Location: inicio.php");
        exit;
      }
    }else{
      $_SESSION['error'] = "Todos los campos son requeridos!";
      header("Location: inicio.php");
      exit;
    }
  }
?>
<?php
 mysqli_free_result($query);
 mysqli_close($link);
?>
