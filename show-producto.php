<html>
<head>
  <title>Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mis_estilos.css">
</head>
<body>
  <div id="Inicio/registro">
    <a href="http://ideas.info.unlp.edu.ar">Iniciar Sesi&oacuten</a>
    <a href="http://ideas.info.unlp.edu.ar">Registrarse</a>
    <!-- Si se está loggeado -->
    <a href=" ">Cerrar sesi&oacuten</a>
  </div>

  <div id="Logo">
    <!-- Pongo el parráfo por si se le agrega un texto al rededor de la imagen
  en un futuro. El nombre de alt es para que lo utilicen las aplicaciones
  que le leen las páginas a las personas no videntes-->
    <p>
      <img src=" " width="200" height="150" alt="LOGO"><br clear="all"/>LOGO
    </p>
  </div>

  <!-- Pongo comentarios intermedios para dividir los if hasta realizar esa
  parte -->
  <div id="Título" width="400" height="150">
    <!-- Si se presionó un autor -->
    <h2> Libros de %autor </h2>
    <!-- Si se presionó un libro -->
    <h2> Título del libro </h2>
    <!-- Si se presionó Registrarse -->
    <h2> Registro del lector </h2>
  </div>

  <div id="Autor">
    <!-- Si se tocó un autor -->
    <table>
      <tr>
        <th>Portada</th>
        <th><a href="show-producto.html">Título</a></th>
        <th>Ejemplares</th>
      </tr>
      <tr>
        <td><a href="show-producto.html"><img src=" " width="75" height="75" alt="nombre"></a></td>
        <td><a href=" ">Nombre libro</a></td>
        <td>Stock</td>
      </tr>
    </table>
  </div>

  <div id="Libro">
    <!-- Si se presionó un libro -->
    <img src=" " width="200" height="150" alt="LOGO"><br clear="all"/>LOGO
    <p>Autor %nombre </p>
    <p>Ejemplares: %stock </p>
    <p>Descripci&oacuten:</p>
    <p>Informaci&oacuten</p>
  </div>

  <div id="Registro">
    <form>
      <fieldset>
        <legend>Registro del lector</legend>
        Nombre: <input type="text"><br>
        Apellido: <input type="text"><br>
        Foto: <input type="image"><br>
        Email: <input type="email"><br>
        Clave: <input type="password"><br>
        Confirmaci&oacuten de la clave: <input type="password"><br>
        <button type="button" class="btn">Registrar</button>
      </fieldset>
    </form>
  </div>

  <div id="Perfil">
    <h4>Mi Perfil</h4>
    <div id="Datos persona">
      <p>Nombre %nombre perfil</p>
      <p>Apellido %Apellido perfil</p>
      <p>Email %Email perfil</p>
    </div>
    <div>
      <img src=" " width="200" height="150" alt="LOGO"><br clear="all"/>
    </div>

    <h4>Historial de operaciones</h4>
    <div id="Operaciones">
      <table>
        <tr>
          <th>Portada</th>
          <th><a href="show-producto.html">Título</a></th>
          <th><a href="show-producto.html">Autor</a></th>
          <th>Estado</th>
          <th>Fecha</th>
        </tr>
        <tr>
          <td><a href="show-producto.html"><img src=" " width="75" height="75" alt="nombre"></a></td>
          <td><a href="show-producto.html">Nombre libro</a></td>
          <td><a href="show-producto.html">Nombre autor</a></td>
          <td>Estado</td>
          <td>Fecha</td>
        </tr>
      </table>
    </div>

  <div id="footer">
    <button type="button" class="btn"><a href="./index.html"> Primer P&aacutegina</a></button>
    <button type="button" class="btn">P&aacutegina Anterior</button>
    <button type="button" class="btn">P&aacutegina Siguiente</button>
    <button type="button" class="btn">&Uacuteltima P&aacutegina</button>
  </div>
</body>
</html>
