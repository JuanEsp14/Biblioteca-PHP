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

<?php session_start(); ?>
<?php require_once("connection.php"); ?>
<?php
$link = conectar();

if(isset($_SESSION["session_username"])){
  // echo "Session is set"; // for testing purposes
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
      $message = "Nombre de usuario ó contraseña invalida!";
    }
  }else{
    $message = "Todos los campos son requeridos!";
  }
}
?>

 <div class="container mlogin">
 <div id="login">
 <h1>Inicio</h1>
<form name="loginform" id="loginform" action="hacer_login.php" method="POST">
 <p>
 <label for="user_login">Nombre De Usuario
 <input type="text" name="email" id="email" class="form-control" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña
 <input type="password" name="clave" id="clave" class="form-control" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="btn btn-success" value="Entrar" />
 </p>
 <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
</form>

</div>

</div>

 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

 </body>
