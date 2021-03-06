<?php include('layout.php') ?>

<?php
  $id = $_GET['id'];
  $query_autor = mysqli_query($link,
    " SELECT *
      FROM autores
      WHERE id = ".$id."
      LIMIT 1"
    );
  $autor = mysqli_fetch_array($query_autor);

  $libros = mysqli_query($link,
    " SELECT l.*, a.nombre, a.apellido
      FROM libros l
      INNER JOIN autores a ON l.autores_id = a.id
      WHERE autores_id = ".$id
    );
?>

<div id="Autor">
  <div class="">
    <img src="logo.png" alt="LOGO">
  </div>
  <hr>
  <h1><?php echo "Libros de ".$autor['nombre']." ".$autor['apellido'] ?></h1>

  <table class="table">
    <tr>
      <th>Potada</th>
      <th>Título</th>
      <th>Autor</th>
      <th>Ejemplares</th>

    </tr>
    <?php while($row = mysqli_fetch_array($libros)){
        $query = "SELECT COUNT(*) AS res FROM operaciones
        WHERE ultimo_estado = 'RESERVADO' AND libros_id = ".$row['id'];
        $aux1 = mysqli_query($link, $query);

        $query = 'SELECT COUNT(*) AS res FROM operaciones
        WHERE ultimo_estado = "PRESTADO" AND libros_id ='.$row["id"];
        $aux2 = mysqli_query($link, $query);


        $cantRes = mysqli_fetch_array($aux1);
        $cantPres = mysqli_fetch_array($aux2);?>
      <tr>
        <td>
          <?php
            echo "<img src='mostrar_portada.php?id=".$row['id']."' width='100' height='150' >";
          ?>
        </td>
        <td>
          <?php
            echo " <a href='show_libro.php?id=".$row['id']."' >";
              echo $row["titulo"];
            echo "</a>";
          ?>
        </td>
        <td>
          <?php
            echo " <a href='show_autor.php?id=".$row['autores_id']."' >";
              echo $row["apellido"].", ".$row["nombre"];
            echo "</a>";
          ?>
        </td>
        <td><?php echo $row["cantidad"]?> ( <?php echo $cantRes['res']?> reservados <?php echo $cantPres['res']?> prestados)</td>
      </tr>
    <?php } ?>
  </table>


</div>
<?php
  mysqli_free_result($query_autor);
  mysqli_free_result($libros);
  include('footer.php');
?>
