<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include("connection.php");
  include("user.php");

  $link = Connection::conectar();
  $user = new User();
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
  <link rel="stylesheet" href="css/mis_estilos.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        <img src="logo_icono.png" width="40" height="40" alt="LOGO">
      </a>
      <div class="text-right">
        <?php if($user->logeado()){ ?>
          <a class="btn" href="mi_perfil.php">
            <?php echo $user->rol.": ".$user->apellido.", ".$user->nombre; ?>
          </a>
          <a class="btn btn-danger" href='salir.php'>Salir</a>
        <?php }else{ ?>
          <a class="btn btn-success" href='inicio.php'>Iniciar Sesión</a>
          <a class="btn btn-success" href='registro.php'>Registrarse</a>
        <?php } ?>
      </div>
    </nav>
  </header>
  <div class="container">
