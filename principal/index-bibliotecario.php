<div class="container row">
  <div class="col-md-4 align-self-center">
    <img src="logo.png" alt="LOGO">
  </div>
  <div class="col-md-8" id="Búsqueda" style="margin-top:10px;">
    <form name="form1" method="post" action="index.php">
      <fieldset>
        <div class="row">
          <div class="col-md-4">
            <label for="titulo">T&iacutetulo:</label>
            <input class="form-control" name="titulo" type="text" autocomplete="off">
          </div>
          <div class="col-md-4">
            <label for="autor">Autor: </label>
            <input class="form-control" name="autor" type="text" autocomplete="off">
          </div>
          <div class="col-md-4">
            <label for="lector">Lector: </label>
            <input class="form-control" name="lector" type="text" autocomplete="off">
          </div>
        </div>
        <div class="row" style="margin-top:10px;">
          <div class="col-md-4">
            <label for="inicio">Fecha desde: </label>
            <input class="form-control" name="inicio" type="date" autocomplete="off">
          </div>
          <div class="col-md-4">
            <label for="final">Fecha hasta: </label>
            <input class="form-control" name="final" type="date" autocomplete="off">
          </div>
          <div class="col-md-4 text-right" style="margin-top:25px;">
            <button type="submit"
              class="btn btn-default"
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
      <h4>Operaciones</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Título</a></th>
            <th>Autor</a></th>
            <th>Lector</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
              <td><a href="show_libro.php?id=<?php echo $row['libros_id'] ?>"><?php echo $row['titulo'] ?></a></td>
              <td><a href="show_autor.php?id=<?php echo $row['autorID'] ?>"><?php echo $row['nomAu'].' '.$row['apeAu'] ?></a></td>
              <td><?php echo $row['nomUs'].' '.$row['apeUs'] ?></td>
              <td><?php echo $row['ultimo_estado'] ?></td>
              <td><?php echo $row['fecha_ultima_modificacion'] ?></td>
              <td>
                <?php if($row['ultimo_estado'] == 'PRESTADO'){ ?>
                  <button type="button" class="btn btn-info">Devolver</button>
                <?php }elseif ($row['ultimo_estado'] == 'RESERVADO') {?>
                  <button type="button" class="btn btn-info">Prestar</button>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php include("footer-index.php");?>
    </div>
  </div>
