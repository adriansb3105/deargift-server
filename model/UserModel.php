<?php

  require_once 'core/ConexionDB.php';

  class UserModel{
    private $conn;

    public function __construct(){
      $conexion = new ConexionDB();
      $this->conn = $conexion->conectar();
    }

    public function insertarComentario($nombre, $email, $asunto, $comentarios){
      $query = mysqli_query($this -> conn, "call sp_insertar_comentario('$nombre','$email','$asunto','$comentarios')");
      if($query) {
        return "Insertado el comentario";
      }else{
        return "No se inserto nada";
      }
    }

    public function obtenerComentarios(){
      $query = mysqli_query($this -> conn, "call sp_obtener_comentarios()");
      $data = mysqli_fetch_all($query);

      return $data;
    }

    public function login($username, $password){
      $query = mysqli_query($this -> conn, "select id, email, password from Usuario where email='"+$username+"' AND password='"+$password+"';");

      $data = mysqli_fetch_all($query);

      return $data;
    }
  }


