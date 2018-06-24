<?php include('layout.php') ?>

<?php
  $id = $_GET['id'];
  $query_libro = mysqli_query($link,
    " SELECT l.*, a.nombre, a.apellido
      FROM libros l
      INNER JOIN autores a ON l.autores_id = a.id
      WHERE l.id = ".$id."
      LIMIT 1 "
    );
  $libro = mysqli_fetch_array($query_libro);

  $query = "SELECT COUNT(*) AS res FROM operaciones
  WHERE ultimo_estado = 'RESERVADO' AND libros_id = ".$id;
  $aux1 = mysqli_query($link, $query);

  $query = 'SELECT COUNT(*) AS res FROM operaciones
  WHERE ultimo_estado = "PRESTADO" AND libros_id ='.$id;
  $aux2 = mysqli_query($link, $query);

  $cantRes = mysqli_fetch_array($aux1);
  $cantPres = mysqli_fetch_array($aux2);

?>

<div id="Libro">
  <div class="">
    <img src="logo.png" alt="LOGO">
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8">
      <h1><?php echo $libro['titulo'] ?></h1>
      <h6><?php echo "Autor: ".$libro['nombre']." ".$libro['apellido'] ?></h6>
      <h6><?php echo "Ejemplares: ".$libro["cantidad"]." (".$cantRes['res']." reservados - ".$cantPres['res']." prestados)" ?> </h6>
      <h6>Descripci&oacuten</h6>
      <p><?php echo $libro['descripcion'] ?></p>
    </div>
    <div class="col-md-4 text-right">
      <?php
        echo "<img src='mostrar_portada.php?id=".$libro['id']."' width='290' height='425' >";
       ?>
    </div>
  </div>
</div>
<?php
  mysqli_free_result($query_libro);
  include('footer.php')
?>
