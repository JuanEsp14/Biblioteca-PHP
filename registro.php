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
    <link rel="stylesheet" href="css/mis_estilos.css">
    <script src="js/bootstrap.min.js"></script>
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
      <div id="registro" class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <img src="logo.png" alt="LOGO_IMAGEN">
          </div>
          <hr>
          <h1>Registrarse</h1>
          <?php if (!empty($_SESSION["error"])) {?>
            <div class='list-group'>
              <?php foreach ($_SESSION['error'] as $error) { ?>
                <div class='list-group-item list-group-item-danger'>
                  <?php echo "<small class='font-italic'> $error </small>" ?>
                </div>
              <?php } $_SESSION['error'] = '';?>
            </div>
          <?php } ?>
          <form id="registeform" enctype="multipart/form-data" action="registrar.php" method="POST" onsubmit="return validar();">
            <div class="row" style="margin-top:10px;">
              <div class="col-md-6">
                <label for="user_login">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" />
                <small id='js-msg-nombre' class="font-italic text-danger d-none">
                  Debe ingresar un nombre.
                </small>
              </div>
              <div class="col-md-6">
                <label for="user_login">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" />
                <small id='js-msg-apellido' class="font-italic text-danger d-none">
                  Debe ingresar un apellido.
                </small>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="user_login">Email</label>
                <input type="text" name="email" id="email" class="form-control" />
                <small id='js-msg-email' class="font-italic text-danger d-none">
                  Debe ingresar un email valido.
                </small>
              </div>
              <div class="col-md-6">
                <label for="user_login">Foto de Usuario</label>
                <input type="file" name="foto" id="foto"/>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="user_pass">Contraseña</label>
                <input type="password" name="clave" id="clave" class="form-control" />
                <small id='js-msg-clave' class="font-italic">
                  Minimo 6 caracteres, al menos una letra, un numero y un caracter especial.
                </small>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="user_pass">Repetir Contraseña</label>
                <input type="password" name="repetir_clave" id="repetir_clave" class="form-control" />
                <small id='js-msg-repetir' class="font-italic text-danger d-none">
                  Las contraseñas no coinciden.
                </small>
              </div>
            </div>
            <div class="submit" style="margin-top:10px;">
              <input id='js-submit' type="submit" name="register" class="btn btn-success btn-block" value="Registrarse" />
            </div>
            <p class="regtext">
              ¿Ya estas registrado?
              <a href="inicio.php" >Inicia Sesión Aquí</a>!
            </p>
          </form>
        </div>
      </div>
    </div>

    <script>
      function validar() {
        debugger
        var ok = true;
        if ($('#nombre').val() == "") {
          $('#nombre').addClass('is-invalid');
          $('#js-msg-nombre').html('Debe ingresar un nombre.');
          $('#js-msg-nombre').removeClass('d-none');
          ok = false;
        } else {
          if (!validarString($('#nombre').val())) {
            $('#nombre').addClass('is-invalid');
            $('#js-msg-nombre').html('El nombre no puede tener numeros, ni caracteres especiales');
            $('#js-msg-nombre').removeClass('d-none');
            ok = false;
          } else {
            $('#nombre').removeClass('is-invalid');
            $('#js-msg-nombre').addClass('d-none');
          }
        }
        if ($('#apellido').val() == "") {
          $('#apellido').addClass('is-invalid');
          $('#js-msg-apellido').html('Debe ingresar un apellido.');
          $('#js-msg-apellido').removeClass('d-none');
          ok = false;
        } else {
          if (!validarString($('#apellido').val())) {
            $('#apellido').addClass('is-invalid');
            $('#js-msg-apellido').html('El apellido no puede tener numeros, ni caracteres especiales');
            $('#js-msg-apellido').removeClass('d-none');
            ok = false;
          } else {
            $('#apellido').removeClass('is-invalid');
            $('#js-msg-apellido').addClass('d-none');
          }
        }
        if (!validateEmail($('#email').val())) {
          $('#email').addClass('is-invalid');
          $('#js-msg-email').removeClass('d-none');
          ok = false;
        } else {
          $('#email').removeClass('is-invalid');
          $('#js-msg-email').addClass('d-none');
        }
        if (!validateClave($('#clave').val())) {
          $('#clave').addClass('is-invalid');
          $('#js-msg-clave').addClass('text-danger');
          $('#repetir_clave').val('');
          ok = false;
        } else {
          $('#clave').removeClass('is-invalid');
          $('#js-msg-clave').removeClass('text-danger');
          if ($('#repetir_clave').val() != $('#clave').val()) {
            $('#repetir_clave').addClass('is-invalid');
            $('#js-msg-repetir').removeClass('d-none');
            $('#repetir_clave').val('');
            ok = false;
          } else {
            $('#repetir_clave').removeClass('is-invalid');
            $('#js-msg-repetir').addClass('d-none');
          }
        }
        return ok;
      }

      function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }

      function validateClave(clave) {
        var re = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W])([A-Za-z\d$@$!%*?&]|[^ ]){6,}$/;
        return re.test(clave);
      }

      function validarString(string) {
        var re = /^[a-zA-Z\s]*$/;
        return re.test(string);
      }
    </script>
  </body>
</html>
