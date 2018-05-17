<?php include('layout.php') ?>
<?php
  $operaciones = mysqli_query($link,
    ' SELECT o.*, a.nombre, a.apellido, l.autores_id, l.titulo
      FROM operaciones o
      INNER JOIN libros l ON l.id = o.libros_id
      INNER JOIN autores a ON a.id = l.autores_id'
  );
?>
<div id="Perfil">
  <div class="">
    <img src="logo.png" alt="LOGO">
  </div>
  <hr>
  <div class="row">
    <div class="col-md-2">
      <?php
      echo "<img class='rounded-circle' src='mostrar_foto.php?id=".$user['id']."' width='150' height='150' >";
      ?>
    </div>
    <div class="col-md-10">
      <h1>Mi Perfil</h1>
      <h6><?php echo "Nombre: ".$user['nombre'] ?></h6>
      <h6><?php echo "Apellido: ".$user['apellido'] ?></h6>
      <h6><?php echo "Email: ".$user['email'] ?></h6>
    </div>
  </div>
  <hr>
  <div class="text-center">
    <h4>Historial de operaciones</h4>
    <table class="table">
      <tr>
        <th>Potada</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Estado</th>
        <th>Fecha</th>
      </tr>
      <?php while($row = mysqli_fetch_array($operaciones)){ ?>
        <tr>
          <td>
            <?php
              echo "<img src='mostrar_portada.php?id=".$row['libros_id']."' width='100' height='150' >";
            ?>
          </td>
          <td>
            <?php
              echo " <a href='show_libro.php?id=".$row['libros_id']."' >";
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
          <td>Estado</td>
          <td>Fecha</td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php include('footer.php') ?>
