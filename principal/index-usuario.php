<?php  include("busqueda.php");?>
<div class="container row">
  <div class="col-md-12" id="Búsqueda" style="margin-top:10px;">
    <form name="form1" method="get" action="index.php">
      <fieldset>
        <div class="row">
          <div class="col-md-6">
            <img src="logo.png" alt="LOGO">
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <label for="titulo">T&iacutetulo: </label>
                <input class="form-control" name="titulo" value="<?php echo $titulo ?>" type="text" autocomplete="off">
              </div>
              <div class="col-md-6">
                <label for="autor">Autor: </label>
                <input class="form-control" name="autor" value="<?php echo $autor ?>" type="text" autocomplete="off">
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

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Listado">
  <br>
  <h4>Cat&aacutelogo de libros</h4>
  <table class="table table-bordered">
    <thead>

      <tr>
        <th>Portada</th>
        <th>Título</a></th>
        <th>Autor</a></th>
        <th>Ejemplares</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($result)){
        $query = "SELECT COUNT(*) AS res FROM operaciones
        WHERE ultimo_estado = 'RESERVADO' AND libros_id = ".$row['id'];
        $aux1 = mysqli_query($link, $query);

        $query = 'SELECT COUNT(*) AS res FROM operaciones
        WHERE ultimo_estado = "PRESTADO" AND libros_id ='.$row["id"];
        $aux2 = mysqli_query($link, $query);

        $query = 'SELECT COUNT(*) AS res FROM operaciones
        WHERE ultimo_estado = "RESERVADO" AND lector_id = '.$user['id'].' AND libros_id = '.$row['id'];
        $aux3 = mysqli_query($link, $query);

        $cantRes = mysqli_fetch_array($aux1);
        $cantPres = mysqli_fetch_array($aux2);
        $reservado = mysqli_fetch_array($aux3);?>
        <tr>
          <td>
            <?php
            echo "<img src='mostrar_portada.php?id=".$row['id']."' width='100' height='150' >";
            ?>
          </td>
          <td><a href="show_libro.php?id=<?php echo $row['id'] ?>"><?php echo $row['titulo'] ?></a></td>
          <td><a href="show_autor.php?id=<?php echo $row['autores_id'] ?>"><?php echo $row["nombre"].' '.$row["apellido"] ?></a></td>
          <td><?php echo $row["cantidad"]?> ( <?php echo $cantRes['res']?> reservados <?php echo $cantPres['res']?> prestados)</td>
          <td>
            <?php if(($row["cantidad"] > $cantRes['res']+$cantPres['res']) &&
            (3 > $cantRes['res']+$cantPres['res']) && ($reservado['res'] == 0)){ ?>
              <button type="button" class="btn btn-info" onclick="mifuncion()">Reservar</button>
              <script>
              function mifuncion()
              {
                <?php
                  $date = date('Y-m-d H:i:s');
                  $usuario = $user['id'];
                  $libro = $row['id'];
                  $query = "INSERT INTO `operaciones` (ultimo_estado, fecha_ultima_modificacion, lector_id, libros_id)
                  VALUES ('RESERVADO', '$date', '$usuario', '$libro')" ;
                  mysqli_query($link, $query);
               ?>
                alert('Se realizó su pedido');
                setTimeout("location.reload()", 10);
              }
            </script>
          <?php } ?>
        </td>
      </tr>
    <?php }
    ?>
  </tbody>
</table>
<?php include('footer-index.php') ?>
</div>
</div>
