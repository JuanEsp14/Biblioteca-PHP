<?php
  include("connection.php");
  $link = conectar();

  $id = $_GET['id'];
  // se recupera la información de la imagen
  $sql =
  " SELECT portada
    FROM libros
    WHERE id=$id";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  mysqli_close($link);
  // se imprime la imagen y se le avisa al navegador que lo que se está
  // enviando no es texto, sino que es una imagen de un tipo en particular
  header("Content-type: jpg");
  echo $row['portada'];
?>
