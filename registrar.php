<?php session_start(); ?>
<?php require_once("connection.php"); ?>
<?php
  $link = Connection::conectar();
  $errors = array();
  $limite_kb = 16384;

  if(isset($_POST["register"])){
    if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['clave']) || empty($_POST['repetir_clave'])) {
      $errors[] = "Todos los campos son requeridos.";
    }
    if(!empty($_POST['email'])){
      $email = $_POST['email'];
      if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
        $errors[] = 'Debe ingresar un email valido.';
      } else {
        $query =mysqli_query($link, "SELECT * FROM usuarios WHERE email='".$email."'");
        $numrows=mysqli_num_rows($query);
        if ($numrows!=0) {
          $errors[] = "Ya existe un usuario registrado al email ingresado.";
        }
      }
    }
    if (!empty($_POST['nombre'])) {
      $nombre = $_POST['nombre'];
      if (!preg_match("/^[a-zA-Z\s]*$/", $nombre)) {
        $errors[] = 'El nombre no puede tener numeros, caracteres especiales.';
      }
    }
    if (!empty($_POST['apellido'])) {
      $apellido = $_POST['apellido'];
      if (!preg_match("/^[a-zA-Z\s]*$/", $apellido)) {
        $errors[] = 'El apellido no puede tener numeros, caracteres especiales.';
      }
    }
    if (!empty($_POST['clave'])) {
      $clave = $_POST['clave'];
      $repetir_clave = $_POST['repetir_clave'];

      if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W])([A-Za-z\d$@$!%*?&]|[^ ]){6,}$/", $clave)) {
        $errors[] = 'Debe ingresar una contraseña valida.';
      } else {
        if ($clave != $repetir_clave) {
          $errors[] = 'Las contraseñas no coinciden.';
        }
      }
    }
    if (is_uploaded_file($_FILES["foto"]["tmp_name"])){
      # verificamos el formato de la imagen
      if ($_FILES["foto"]["type"] != "image/jpeg"){
        $errors[]= "El formato de la imagen tiene que ser JPG.";
      } elseif ($_FILES['foto']['size'] > $limite_kb * 1024) {
        $errors[]= "Imagen demasiado grande, MAXIMO: 2048 KB.";
      }
    } else {
      $errors[]= "Debe cargar alguna imagen.";
    }

    if(empty($errors)){
      $fp = fopen($_FILES['foto']['tmp_name'], 'r');
      $foto = fread($fp, filesize($_FILES['foto']['tmp_name']));
      $foto = addslashes($foto);
      fclose($fp);
      # Agregamos al usuario
      $sql = "INSERT INTO `usuarios` (email,nombre,apellido,clave,rol,foto) VALUES ('$email', '$nombre', '$apellido', '$clave', 'LECTOR', '$foto')";
      if (mysqli_query($link, $sql)) {
        $_SESSION["session_username"] = $email;

        header("Location: index.php");
        exit;
      }else{
        $errors[] = "Error: ".$sql."<br>".mysqli_error($link);
        $_SESSION['error'] = $errors;
        header("Location: registro.php");
        exit;
      }
    } else {
      $_SESSION['error'] = $errors;
      header("Location: registro.php");
      exit;
    }
  }
?>
<?php
 mysqli_free_result($query);
 mysqli_close($link);
?>
