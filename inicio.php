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
    <link rel="stylesheet" href="css/mis_estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
          <img src="logo_icono.png" width="40" height="40" alt="LOGO">
        </a>
      </nav>
    </header>
    <div class="container">
      <div id="login" class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <img src="logo.png" alt="LOGO_IMAGEN">
          </div>
          <hr>
          <h1>Iniciar Sesión</h1>
          <?php if (!empty($_SESSION["error"])) {?>
            <div class='alert alert-danger' role='alert'>
              <?php
                echo "ERROR: " . $_SESSION['error'];
                $_SESSION['error'] = '';
              ?>
            </div>
          <?php } ?>
          <form name="loginform" id="loginform" action="hacer_login.php" method="POST">
            <p>
              <label for="user_login">Email</label>
              <input type="text" name="email" id="email" class="form-control" />
            </p>
            <p>
              <label for="user_pass">Contraseña</label>
              <input type="password" name="clave" id="clave" class="form-control" />
            </p>
            <p class="submit">
              <input type="submit" name="login" class="btn btn-success btn-block" value="Entrar" />
            </p>
            <p class="regtext">
              ¿No estas registrado?
              <a href="registro.php" >Registrate Aquí</a>!
            </p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
