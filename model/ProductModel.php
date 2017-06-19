<?php

  require_once 'core/ConexionDB.php';

  class ProductModel{
    private $conn;

    public function __construct(){
      $conexion = new ConexionDB();
      $this->conn = $conexion->conectar();
    }

    public function login($email, $password){
      $query = mysqli_query($this -> conn, "call sp_login('".$email."', '".$password."')");

      $data = mysqli_fetch_all($query);

      return $data;
    }

    public function getProducts($id_sexo, $id_etapa, $id_categoria, $id_color){
      $query = mysqli_query($this -> conn, "call sp_getProducts('".$id_sexo."', '".$id_etapa."', '".$id_categoria."', '".$id_color."')");

      $data = mysqli_fetch_all($query);

      return $data;
    }
  }


