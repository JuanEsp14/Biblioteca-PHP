<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include("connection.php");
  $link = conectar();
?>
<?php
  if(isset($_SESSION["session_username"])){
    $query_user = mysqli_query($link, "SELECT * FROM usuarios WHERE email ='".$_SESSION['session_username']."' LIMIT 1");
    $user = mysqli_fetch_array($query_user);
  }
?>
<html lang="en">
<head>
  <title>Biblioteca</title>
  <!-- Se utiliza la metaetiqueta para que bootstrap funcione en los celulares o
  tablets, no tiene efecto en el página -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><img src="logo_icono.png" width="40" height="40" alt="LOGO"></a>
      <div class="text-right">
        <?php if(isset($_SESSION["session_username"])){ ?>
          <a class="btn" href="perfil.php"><?php echo $user['apellido'].", ".$user['nombre']; ?></a>
          <a class="btn btn-danger" href='salir.php'>Salir</a>
        <?php }else{ ?>
          <a class="btn btn-success" href='inicio.php'>Iniciar Sesión</a>
          <a class="btn btn-success" href='registro.php'>Registrarse</a>
        <?php } ?>
      </div>
    </nav>
  </header>
  <div class="container">
