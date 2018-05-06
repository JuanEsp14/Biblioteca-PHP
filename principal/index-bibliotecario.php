<?php
  $result = mysqli_query($link,
  'SELECT operaciones.*, titulo, cantidad, autores.nombre AS nomAu,
  usuarios.nombre AS nomUs, usuarios.apellido AS apeUs, autores.apellido AS apeAu
   FROM operaciones INNER JOIN libros ON (libros.id = operaciones.libros_id)
   INNER JOIN usuarios ON (usuarios.id = operaciones.lector_id)
   INNER JOIN autores ON (autores.id = libros.autores_id)'
  );
?>
  <div class="container row">
    <div class="col-md-12" id="Búsqueda">
      <form>
        <fieldset>
          <legend> Refinar b&uacutesqueda </legend>
          T&iacutetulo: <input type="text"><br>
          Autor: <input type="text"><br>
          Lector: <input type="text"><br>
          Fecha desde: <input type="date"><br>
          Fecha hasta  <input type="date"><br>
          <button type="button" class="btn btn-default">Buscar</button>
        </fieldset>
      </form>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Listado">
      <h4>Operaciones</h4>
      <table class="table table-bordered">
        <thead>

        <tr>
          <th><a href="show-producto.php">Título</a></th>
          <th><a href="show-producto.php">Autor</a></th>
          <th>Lector</th>
          <th>Estado</th>
          <th>Fecha</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><a href="show-producto.html"><?php echo $row["titulo"] ?></a></td>
            <td><a href="show-producto.html"><?php echo $row["nomAu"]  ?> <?php echo $row["apeAu"] ?></a></td>
            <td><?php echo $row["nomUs"]  ?> <?php echo $row["apeUs"] ?></td>
            <td><?php echo $row["ultimo_estado"] ?></td>
            <td><?php echo $row["fecha_ultima_modificacion"] ?></td>
            <td>
              <?php if($row["ultimo_estado"] == "PRESTADO"){ ?>
                <button type="button" class="btn btn-info">Devolver</button>
              <?php }elseif ($row["ultimo_estado"] == "RESERVADO") {?>
                <button type="button" class="btn btn-info">Prestar</button>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>
  </div>
