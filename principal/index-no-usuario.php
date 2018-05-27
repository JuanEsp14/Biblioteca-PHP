<div class="container row">
  <div class="col-md-12" id="Búsqueda" style="margin-top:10px;">
    <form name="form1" method="post" action="index.php">
      <fieldset>
        <div class="row">
          <div class="col-md-6">
            <img src="logo.png" alt="LOGO">
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <label for="titulo">T&iacutetulo: </label>
                <input class="form-control" name="titulo" type="text" autocomplete="off">
              </div>
              <div class="col-md-6">
                <label for="autor">Autor: </label>
                <input class="form-control" name="autor" type="text" autocomplete="off">
              </div>
            </div>
            <button type="submit"
              class="btn btn-default pull-right"
              style="margin-top:10px;">
              Buscar
            </button>
          </div>
        </div>
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
        <th>>Título</a></th>
        <th>Autor</a></th>
        <th>Ejemplares</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td>
              <?php
                echo "<img src='mostrar_portada.php?id=".$row['id']."' width='100' height='150' >";
              ?>
            </td>
            <td><a href="show_libro.php?id=<?php echo $row["id"] ?>"><?php echo $row["titulo"] ?></a></td>
            <td><a href="show_autor.php?id=<?php echo $row["autores_id"] ?>"><?php echo $row["nombre"].' '.$row["apellido"] ?></a></td>
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
