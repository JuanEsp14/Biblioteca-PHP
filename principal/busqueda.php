<?php
  //Si se tocó algún botón para setear la pagina
  if (isset($_GET['pagina'])){
    $pagina_actual = $_GET['pagina'];
  }//SI no se tocó le seteó la primera
  else{
    $pagina_actual = 1;
  }
  //Limite de libros a mostrar
  $por_pagina = 5;
  //Primer libro a mostrar
  $primer_libro = ($pagina_actual - 1) * $por_pagina;

  if(isset($_SESSION["session_username"]) && $user['rol'] == "BIBLIOTECARIO") {
      $titulo=""; $autor=""; $lector=""; $inicio=""; $final="";
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
        $query = "SELECT operaciones.*, titulo, cantidad, autores.nombre AS nomAu,
            usuarios.nombre AS nomUs, usuarios.apellido AS apeUs,
            autores.apellido AS apeAu, autores.id AS autorID
         FROM operaciones INNER JOIN libros ON (libros.id = operaciones.libros_id)
         INNER JOIN usuarios ON (usuarios.id = operaciones.lector_id)
         INNER JOIN autores ON (autores.id = libros.autores_id)
         WHERE libros.titulo LIKE '%$titulo%' AND (autores.nombre LIKE '%$autor%' OR
          autores.apellido LIKE '%$autor%') AND (usuarios.nombre LIKE '%$lector%' OR
          usuarios.apellido LIKE '%$lector%')";
        if($inicio != ""){
          $query .= " AND fecha_ultima_modificacion > '$inicio' ";
        }
        if($final != ""){
          $query .= " AND fecha_ultima_modificacion < '$final' ";
        }
        $query .= " LIMIT $primer_libro, $por_pagina";

        $result = mysqli_query($link, $query);
    }else {
      $titulo="";
      $autor="";
      if(isset($_POST["titulo"]))
        $titulo=$_POST["titulo"];
      if(isset($_POST["autor"]))
        $autor=$_POST["autor"];
      //Busco por título y autor
        $query = "SELECT libros.*, nombre, apellido
        FROM libros INNER JOIN autores ON (libros.autores_id = autores.id)
        WHERE titulo LIKE '%$titulo%' AND (nombre LIKE '%$autor%' OR
            apellido LIKE '%$autor%')
        LIMIT $primer_libro, $por_pagina";
        $result = mysqli_query($link, $query);
    }

    //Cantidad de libros
    $total_libros = mysqli_num_rows($result);
    //Cantidad de páginas
    $total_paginas = ceil($total_libros / $por_pagina)+1;
 ?>
