<?php  include("header-index.php");?>
  <div class="container row">
    <div class="col-md-12" id="Búsqueda">
      <form name="form1" method="post" action="index.php">
        <fieldset>
          <legend> Refinar b&uacutesqueda </legend>
            T&iacutetulo: <input name="titulo" type="text"><br>
            Autor: <input name="autor" type="text"><br><br>
          <button type="submit" class="btn btn-default">Buscar</button>
        </fieldset>
      </form>
    </div>

<?php  include("busqueda.php");?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Listado">
      <br>
      <h4>Cat&aacutelogo de libros</h4>
      <table class="table table-bordered">
        <thead>

        <tr>
          <th>Portada</th>
          <th><a href=" ">Título</a></th>
          <th><a href=" ">Autor</a></th>
          <th>Ejemplares</th>
        </tr>
      </thead>
      <tbody>
        <?php
         while($row = mysqli_fetch_array($result)){ ?>
          <tr>
              <td>
                <?php
                echo "<img src='mostrar_portada.php?id=".$row['id']."' width='100' height='150' >";
              ?>
              </td>
              <td><a href="show_libro.php?id=<?php echo $row["id"] ?>"><?php echo $row["titulo"] ?></a></td>
              <td><a href="show_autor.php?id=<?php echo $row["autores_id"] ?>"><?php echo $row["nombre"]  ?> <?php echo $row["apellido"] ?></a></td>
              <td><?php echo $row["cantidad"] ?></td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
      <?php
        include("footer-index.php");
      ?>
    </div>
  </div>
