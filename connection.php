<?php
  class Connection{
     public function conectar(){
       $conexion=mysqli_connect('localhost', 'root', '', 'biblio');
       return $conexion;
     }
   }
 ?>
