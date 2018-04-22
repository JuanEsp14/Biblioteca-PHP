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
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mis_estilos.css">
</head>

<body>
  <header>
    <div class="row">
      <div id="Logo" class="col-md-6 navbar-header">
        <!-- Pongo el parráfo por si se le agrega un texto al rededor de la imagen
        en un futuro. El nombre de alt es para que lo utilicen las aplicaciones
        que le leen las páginas a las personas no videntes-->
        <img src="prueba.jpg" width="200" height="150" alt="LOGO"><br clear="all"/>
      </div>
      <div class="col-md-6 text-right">
        <!-- Si el usuario está logueado mostrar su nombre -->
        <?php if(isset($_SESSION["session_username"])){ ?>
          <p>Usuario loggeado<a href="show-producto.php"><?php echo $user['apellido'].", ".$user['nombre']; ?></a></p>
          <a href="salir.php">Salir</a>
        <?php }else{ ?>
          <a href="inicio.php">Iniciar Sesi&oacuten</a>
          <a href="registro.php">Registrarse</a>
        <?php } ?>
      </div>
    </div>
  </header>
