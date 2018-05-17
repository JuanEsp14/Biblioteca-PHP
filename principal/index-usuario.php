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
          <th><a href=" ">Título</a></th>
          <th><a href=" ">Autor</a></th>
          <th>Ejemplares</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result)){
          $aux1 = mysqli_query($link,
          'SELECT COUNT(*) AS res
           FROM operaciones
           WHERE ultimo_estado = "RESERVADO" AND libros_id ='.$row["id"]
          );
          $aux2 = mysqli_query($link,
          'SELECT COUNT(*) AS res
           FROM operaciones
           WHERE ultimo_estado = "PRESTADO" AND libros_id ='.$row["id"]
          );
          $cantRes = mysqli_fetch_array($aux1);
          $cantPres = mysqli_fetch_array($aux2)?>
          <tr>
            <td>
              <?php
                echo "<img src='mostrar_portada.php?id=".$row['id']."' width='100' height='150' >";
              ?>
            </td>
            <td><a href="show_libro.php?id=<?php echo $row["id"] ?>"><?php echo $row["titulo"] ?></a></td>
            <td><a href="show_autor.php?id=<?php echo $row["autores_id"] ?>"><?php echo $row["nombre"]  ?> <?php echo $row["apellido"] ?></a></td>
            <td><?php echo $row["cantidad"]?> ( <?php echo $cantRes["res"]?> reservados <?php echo $cantPres["res"]?> prestados)</td>
            <td>
              <?php if($row["cantidad"] > $cantRes["res"]+$cantPres["res"] ){ ?>
                <button type="button" class="btn btn-info">Reservar</button>
                <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>
  </div>
