<?php
  if(isset($_SESSION["session_username"]) && $user['rol'] == "BIBLIOTECARIO") {
      $titulo="";
      $autor="";
      $lector="";
      $inicio="";
      $final="";
      if(isset($_POST["titulo"]))
        $titulo=$_POST["titulo"];
      if(isset($_POST["autor"]))
        $autor=$_POST["autor"];
      if(isset($_POST["lector"]))
        $lector=$_POST["lector"];
      if(isset($_POST["inicio"]))
        $inicio=$_POST["inicio"];
      if(isset($_POST["final"]))
        $final=$_POST["final"];
      //Busco por título y autor
      if(($titulo != "") || ($autor != "") || ($lector != "") || ($inicio != "")
              || ($final != "") ){
        $query = "SELECT operaciones.*, titulo, cantidad, autores.nombre AS nomAu,
            usuarios.nombre AS nomUs, usuarios.apellido AS apeUs,
            autores.apellido AS apeAu, autores.id AS autorID
         FROM operaciones INNER JOIN libros ON (libros.id = operaciones.libros_id)
         INNER JOIN usuarios ON (usuarios.id = operaciones.lector_id)
         INNER JOIN autores ON (autores.id = libros.autores_id)
         WHERE libros.titulo LIKE '%$titulo%' AND autores.nombre LIKE '%$autor%' AND
          autores.apellido LIKE '%$autor%' AND usuarios.nombre LIKE '%$lector%' AND
          usuarios.apellido LIKE '%$lector%' AND
          fecha_ultima_modificacion BETWEEN '$inicio' AND '$final'
         LIMIT $primer_libro, $por_pagina";
        $result = mysqli_query($link, $query);
      }
    }else {
      $titulo="";
      $autor="";
      if(isset($_POST["titulo"]))
        $titulo=$_POST["titulo"];
      if(isset($_POST["autor"]))
        $autor=$_POST["autor"];
      //Busco por título y autor
      if(($titulo != "") || ($autor != "")){
        $query = "SELECT libros.*, nombre, apellido
        FROM libros INNER JOIN autores ON (libros.autores_id = autores.id)
        WHERE titulo LIKE '%$titulo%' AND nombre LIKE '%$autor%' OR
            apellido LIKE '%$autor%'
        LIMIT $primer_libro, $por_pagina";
        $result = mysqli_query($link, $query);
      }
    }

 ?>
