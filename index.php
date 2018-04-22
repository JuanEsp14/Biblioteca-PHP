<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biblioteca</title>
  <!-- Se utiliza la metaetiqueta para que bootstrap funcione en los celulares o
  tablets, no tiene efecto en el página -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mis_estilos.css">
</head>

<body>
  <header>
    <div class="text-right">
      <a href="show-producto.html">Iniciar Sesi&oacuten</a>
      <a href="show-producto.html">Registrarse</a>
      <!-- Si se está loggeado, capaz que se transforme en un input
      <a href=" ">Cerrar sesi&oacuten</a> -->
    </div>
    <div>
      <!-- Si el usuario está logueado mostrar su nombre -->
      <p class="text-right">Usuario loggeado<a href="show-producto.html"> %nombre</a></p>
    </div>
    <div id="Logo" class="navbar-header">
      <!-- Pongo el parráfo por si se le agrega un texto al rededor de la imagen
    en un futuro. El nombre de alt es para que lo utilicen las aplicaciones
    que le leen las páginas a las personas no videntes-->
      <!--img src="prueba.jpg" width="200" height="150" alt="LOGO"><br clear="all"/-->
      <i class="fa fa-camera-retro"></i>
    </div>
  </header>

  <div class="container row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="Búsqueda">
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

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="Listado">
      <h4>Cat&aacutelogo de libros</h4>
      <!-- Si el bibliotecario está loggeado -->
      <h4>Operaciones</h4>
      <table>
        <tr>
          <th>Portada</th>
          <th><a href="show-producto.html">Título</a></th>
          <th><a href="show-producto.html">Autor</a></th>
          <th>Ejemplares</th>
          <!-- Si el usuario logueado es un bibliotecario -->
          <th>Título</th>
          <th>Autor</th>
          <th>Lector</th>
          <th>Estado</th>
          <th>Fecha</th>
          <th>Acción</th>
        </tr>
        <tr>
          <td><a href="show-producto.html"><img src=" " width="75" height="75" alt="nombre"></a></td>
          <td><a href="show-producto.html">Nombre libro</a></td>
          <td><a href="show-producto.html">Nombre autor</a></td>
          <td>Stock</td>
          <td>Nombre Título</td>
          <td>Nombre Autor</td>
          <td>Nombre Lector</td>
          <td>Estado</td>
          <td>Fecha</td>
          <!-- Analizar el botón luego para realizar las diferentes acciones -->
          <td><button type="button" class="btn btn-info">Boton de acción</button></td>
        </tr>
      </table>
    </div>

    <footer>
      <div class="container">
        <button type="button" class="btn"><a href="./index.html"> Primer P&aacutegina</a></button>
        <button type="button" class="btn">P&aacutegina Anterior</button>
        <button type="button" class="btn">P&aacutegina Siguiente</button>
        <button type="button" class="btn">&Uacuteltima P&aacutegina</button>
    </div>
    </footer>
  </div>
</body>
</html>
