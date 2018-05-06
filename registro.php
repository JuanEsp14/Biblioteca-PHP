<!DOCTYPE html>
<?php session_start();
  if(isset($_SESSION["session_username"])){
    header("Location: index.php");
    exit;
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
        <a class="navbar-brand" href="inicio.php">
          <img src="prueba.jpg" width="300" height="90" alt="LOGO">
        </a>
      </nav>
    </header>
    <div class="jumbotron">
      <div id="login" class="row justify-content-center">
        <div class="col-md-6">
          <h1>Registrarse</h1>
          <?php if (!empty($_SESSION["error"])) {?>
            <div class='alert alert-danger' role='alert'>
              <?php
                echo "ERROR: " . $_SESSION['error'];
                $_SESSION['error'] = '';
              ?>
            </div>
          <?php } ?>
          <form name="registeform" id="registeform" action="registrar.php" method="POST">
            <div class="row">
              <div class="col-md-6">
                <label for="user_login">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="user_login">Apellido</label>
                <input type="text" name="apellid" id="apellido" class="form-control" />
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="user_login">Email</label>
                <input type="text" name="email" id="email" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="user_login">Foto de Usuario</label>
                <input type="file" name="foto" id="foto"/>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="user_pass">Contraseña</label>
                <input type="password" name="clave" id="clave" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="user_pass">Repetir Contraseña</label>
                <input type="password" name="repetir_clave" id="repetir_clave" class="form-control" />
              </div>
            </div>
            <div class="submit" style="margin-top:10px;">
              <input id='js-submit' type="submit" name="login" class="btn btn-success btn-block" value="Registarse" />
            </div>
            <p class="regtext">
              ¿Ya estas registrado?
              <a href="inicio.php" >Inicia Sesión Aquí</a>!
            </p>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      //javascript para validar del lado del cliente
    </script>
  </body>
</html>
