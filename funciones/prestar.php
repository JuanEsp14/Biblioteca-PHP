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
  $query = "UPDATE `operaciones` SET ultimo_estado = 'PRESTADO', fecha_ultima_modificacion = '$date'
  WHERE libros_id = '$libro' AND lector_id = '$usuario' AND ultimo_estado = 'RESERVADO'" ;
  mysqli_query($conexion, $query);
  header("Location: ../index.php");
}
?>
