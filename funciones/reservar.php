<?php
$conexion = mysqli_connect('localhost', 'root', '') or die("Error ". mysqli_error());
mysqli_select_db($conexion, 'biblio');

$date = date('Y-m-d H:i:s');
$usuario = "";
$libro = "";
if(isset($_GET["usId"])){
  $usuario = $_GET["usId"];
}
if(isset($_GET["usId"])){
  $libro = $_GET["id"];
}

# Agregamos una operación
if($libro != "" && $usuario != ""){
  $query = "INSERT INTO `operaciones` (ultimo_estado, fecha_ultima_modificacion, lector_id, libros_id)
  VALUES ('RESERVADO', '$date', '$usuario', '$libro')" ;
  mysqli_query($conexion, $query);
  header("Location: ../index.php");
}
?>
