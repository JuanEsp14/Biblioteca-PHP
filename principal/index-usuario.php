<?php
  $result = mysqli_query($link,
  'SELECT libros.*, nombre, apellido
   FROM libros INNER JOIN autores ON (libros.autores_id = autores.id)'
  );
?>
  <div class="container row">
    <div class="col-md-12" id="Búsqueda">
      <form>
        <fieldset>
          <legend> Refinar b&uacutesqueda </legend>
          T&iacutetulo: <input type="text"><br>
          Autor: <input type="text"><br>
          <button type="button" class="btn btn-default">Buscar</button>
        </fieldset>
      </form>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Listado">
      <h4>Cat&aacutelogo de libros</h4>
      <table class="table table-bordered">
        <thead>

        <tr>
          <th>Portada</th>
          <th><a href="show-producto.php">Título</a></th>
          <th><a href="show-producto.php">Autor</a></th>
          <th>Ejemplares</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><a href="show-producto.html"><img src=" " width="75" height="75" alt="nombre"></a></td>
            <td><a href="show-producto.html"><?php echo $row["titulo"] ?></a></td>
            <td><a href="show-producto.html"><?php echo $row["nombre"]  ?> <?php echo $row["apellido"] ?></a></td>
            <td><?php echo $row["cantidad"] ?></td>
            <td>
              <?php if($row["cantidad"] > 0){ ?>
                <button type="button" class="btn btn-info">Reservar</button>
                <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>
  </div>
