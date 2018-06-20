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
      if(isset($_Get["titulo"]))
        $titulo=$_GET["titulo"];
      if(isset($_GET["autor"]))
        $autor=$_GET["autor"];
      if(isset($_GET["lector"]))
        $lector=$_GET["lector"];
      if(isset($_GET["inicio"]))
        $inicio=$_GET["inicio"];
      if(isset($_GET["final"]))
        $final=$_GET["final"];
      //Busco por título y autor
        $query = "SELECT operaciones.*, titulo, cantidad, autores.nombre AS nomAu,
            usuarios.nombre AS nomUs, usuarios.apellido AS apeUs,
            autores.apellido AS apeAu, autores.id AS autorID
         FROM operaciones INNER JOIN libros ON (libros.id = operaciones.libros_id)
         INNER JOIN usuarios ON (usuarios.id = operaciones.lector_id)
         INNER JOIN autores ON (autores.id = libros.autores_id)
         WHERE libros.titulo LIKE '%$titulo%' AND (autores.nombre LIKE '%$autor%' OR
          autores.apellido LIKE '%$autor%') AND (usuarios.nombre LIKE '%$lector%' OR
          usuarios.apellido LIKE '%$lector%')
          ORDER BY titulo";
        if($inicio != ""){
          $query .= " AND fecha_ultima_modificacion > '$inicio' ";
        }
        if($final != ""){
          $query .= " AND fecha_ultima_modificacion < '$final' ";
        }
        $resultCount = mysqli_query($link, $query);
        $query .= " LIMIT $primer_libro, $por_pagina";

        $result = mysqli_query($link, $query);
    }else {
      $titulo="";
      $autor="";
      if(isset($_GET["titulo"]))
        $titulo=$_GET["titulo"];
      if(isset($_GET["autor"]))
        $autor=$_GET["autor"];

      $url= "index.php?titulo=".$titulo."&autor=".$autor;
      //Busco por título y autor
        $query = "SELECT libros.*, titulo, nombre, apellido
        FROM libros INNER JOIN autores ON (libros.autores_id = autores.id)
        WHERE titulo LIKE '%$titulo%' AND (nombre LIKE '%$autor%' OR
            apellido LIKE '%$autor%')
        ORDER BY titulo";

        $resultCount = mysqli_query($link, $query);

        $query .=" LIMIT $primer_libro, $por_pagina";
        $result = mysqli_query($link, $query);
    }

    //Cantidad de libros
    $total_libros = mysqli_num_rows($resultCount);
    //Cantidad de páginas
    $total_paginas = ceil($total_libros / $por_pagina);
 ?>
