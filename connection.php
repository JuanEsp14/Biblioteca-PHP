<?php
   function conectar(){
     $conexion = mysqli_connect('localhost', 'root', '') or die("Error ". mysqli_error());
     mysqli_select_db($conexion, 'biblio');
     return $conexion;
   }
 ?>
