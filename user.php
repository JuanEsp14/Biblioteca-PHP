<?php
  class User{
    public $nombre, $apellido, $email, $rol, $id;

    function __construct(){
      if (isset($_SESSION["session_username"])) {
        $result = mysqli_query(Connection::conectar(), "SELECT * FROM usuarios WHERE email='".$_SESSION["session_username"]."' LIMIT 1");
        $row = mysqli_fetch_array($result);
        $this->id=$row['id'];
        $this->email=$row['email'];
        $this->nombre=$row['nombre'];
        $this->apellido=$row['apellido'];
        $this->rol=$row['rol'];
      }
    }

    function login($email, $clave){
      if(empty($email) || empty($clave)) {
        throw new Exception("Todos los campos son requeridos!");
      }
      $result = mysqli_query(Connection::conectar(), "SELECT * FROM usuarios WHERE email='".$email."' AND clave='".$clave."' LIMIT 1");
      $user = mysqli_fetch_array($result);

      if(empty($user)){
        throw new Exception("Email ó contraseña invalida!");
      }
      $_SESSION["session_username"] = $user['email'];
    }

    function logeado(){
      return isset($_SESSION["session_username"]);
    }

    //Nos devuelve si el usuario reservo el libro enviado por parámetro
    function reservado($usID, $libroId){
      $query = 'SELECT COUNT(*) AS res FROM operaciones
      WHERE ultimo_estado = "RESERVADO" AND lector_id = '.$usID.' AND libros_id = '.$libroId;
      $aux = mysqli_query(Connection::conectar(), $query);
      $respuesta = mysqli_fetch_array($aux);
      return $respuesta['res'];
    }

    //Nos devuelve la cantidad de las operaciones realizadas por el usuario
    function cantidadOperaciones($usID){
      $query = 'SELECT COUNT(*) AS res FROM operaciones
      WHERE ultimo_estado = "RESERVADO" OR ultimo_estado = "PRESTADO" AND lector_id = '.$usID;
      $aux = mysqli_query(Connection::conectar(), $query);
      $respuesta = mysqli_fetch_array($aux);
      return $respuesta['res'];
    }

    function logout(){
      session_start();
      session_destroy();
    }
  }
 ?>
