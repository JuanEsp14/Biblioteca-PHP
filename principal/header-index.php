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
    //Consulta a la BD
    $query = "SELECT operaciones.*, titulo, cantidad, autores.nombre AS nomAu,
        usuarios.nombre AS nomUs, usuarios.apellido AS apeUs,
        autores.apellido AS apeAu, autores.id AS autorID
     FROM operaciones INNER JOIN libros ON (libros.id = operaciones.libros_id)
     INNER JOIN usuarios ON (usuarios.id = operaciones.lector_id)
     INNER JOIN autores ON (autores.id = libros.autores_id)
     LIMIT $primer_libro, $por_pagina";
    $result = mysqli_query($link, $query);
    }else {
      //Consulta a la BD
      $query = "SELECT libros.*, nombre, apellido
      FROM libros INNER JOIN autores ON (libros.autores_id = autores.id)
      LIMIT $primer_libro, $por_pagina";
      $result = mysqli_query($link, $query);
    }

  //Cantidad de libros
  $total_libros = mysqli_num_rows($result);
  //Cantidad de páginas
  $total_paginas = ceil($total_libros / $por_pagina)+1;
?>
