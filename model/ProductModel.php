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
      //$query = mysqli_query($this -> conn, "call sp_getProducts('".$id_sexo."', '".$id_etapa."', '".$id_categoria."', '".$id_color."')");
      
      $string = "select p.id, p.nombre, p.descripcion, p.precio, s.sexo, e.nombre as etapa, c.nombre as categoria, 
                      cl.color as color, i.url
              from Producto as p INNER JOIN Sexo as s INNER JOIN Etapa as e INNER JOIN Producto_Etapa as pe
                      INNER JOIN Categoria as c INNER JOIN Producto_Categoria as pc INNER JOIN Color as cl 
                      INNER JOIN Producto_Color as pcl INNER JOIN Producto_Imagen as pi INNER JOIN Imagen as i
    ON p.id_sexo = '".$id_sexo."' AND s.id = '".$id_sexo."' AND e.id = '".$id_etapa."' AND pe.id_etapa = '".$id_etapa."' AND
    c.id = '".$id_categoria."' AND pc.id_categoria = '".$id_categoria."' AND cl.id = '".$id_color."' AND 
        pcl.id_color = '".$id_color."' AND p.id = pi.id_producto AND i.id = pi.id_imagen;";


      $query = mysqli_query($this -> conn, $string);

      $data = mysqli_fetch_all($query);

      return $data;
    }
  }
