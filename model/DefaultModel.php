<?php

  require_once 'core/ConexionDB.php';

  class DefaultModel{
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
  }




/*
CREATE PROCEDURE sp_insertar_comentario(nombre_ varchar(100), email_ varchar(100), asunto_ varchar(100), comentarios varchar(500)) INSERT INTO Com(nombre, email, asunto, comentarios) VALUES(nombre_, email_, asunto_, comentarios_)
*/
