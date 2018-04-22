<?php include('layout.php'); ?>
<?php
  $result = mysqli_query($link,
    'SELECT * FROM libros'
  );
?>
  <div class="container row">
    <div class="col-md-12" id="Búsqueda">
      <form>
        <fieldset>
          <legend> Refinar b&uacutesqueda </legend>
          T&iacutetulo: <input type="text"><br>
          Autor: <input type="text"><br>
          <!-- Si el usuario logueado es un bibliotecario -->
          Lector: <input type="text"><br>
          Fecha desde: <input type="date"><br>
          Fecha hasta  <input type="date"><br>
          <button type="button" class="btn btn-default">Buscar</button>
        </fieldset>
      </form>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" id="Listado">
      <h4>Cat&aacutelogo de libros</h4>
      <!-- Si el bibliotecario está loggeado -->
      <h4>Operaciones</h4>
      <table class="table table-bordered">
        <thead>

        <tr>
          <th>Portada</th>
          <th><a href="show-producto.php">Título</a></th>
          <th><a href="show-producto.php">Autor</a></th>
          <th>Ejemplares</th>
          <!-- Si el usuario logueado es un bibliotecario -->
          <th>Título</th>
          <th>Autor</th>
          <th>Lector</th>
          <th>Estado</th>
          <th>Fecha</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result)){ ?>
          <tr>
              <td><a href="show-producto.html"><img src=" " width="75" height="75" alt="nombre"></a></td>
              <td><a href="show-producto.html"><?php echo $row["titulo"] ?></a></td>
              <td><a href="show-producto.html"><?php echo $row["autores_id"]  ?></a></td>
              <td>Stock</td>
              <td>Nombre Título</td>
              <td>Nombre Autor</td>
              <td>Nombre Lector</td>
              <td>Estado</td>
              <td>Fecha</td>
              <!-- Analizar el botón luego para realizar las diferentes acciones -->
              <td><button type="button" class="btn btn-info">Boton de acción</button></td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>

    <footer>
      <div class="container">
        <button type="button" class="btn"><a href="index.php"> Primer P&aacutegina</a></button>
        <button type="button" class="btn">P&aacutegina Anterior</button>
        <button type="button" class="btn">P&aacutegina Siguiente</button>
        <button type="button" class="btn">&Uacuteltima P&aacutegina</button>
    </div>
    </footer>
  </div>

<?php mysqli_free_result($result); ?>
<?php include('footer.php') ?>
