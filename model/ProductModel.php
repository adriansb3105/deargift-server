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

    public function getProducts($sexo, $id_etapa, $id_categoria, $id_color){
      //$query = mysqli_query($this -> conn, "call sp_getProducts('".$id_sexo."', '".$id_etapa."', '".$id_categoria."', '".$id_color."')");
      
      
      $string = " select p.id, p.nombre, p.descripcion, p.precio, p.sexo, ct.nombre as categoria, 
                  e.nombre as etapa, cl.color as color, i.url as imagen
                  from Producto as p 
                  inner join Producto_Categoria as pc on pc.id_producto = p.id 
                  inner join Categoria as ct on pc.id_categoria = ct.id AND ct.id = ".$id_categoria."
                  inner join Producto_Etapa as pe on pe.id_producto = p.id
                  inner join Etapa as e on e.id = pe.id_etapa AND e.id = ".$id_etapa."
                  inner join Producto_Color as pcl on pcl.id_producto = p.id
                  inner join Color as cl on cl.id = pcl.id_color AND cl.id = ".$id_color."
                  inner join Producto_Imagen as pi on pi.id_producto = p.id
                  inner join Imagen as i on i.id = pi.id_imagen
                  where p.sexo = '".$sexo."' OR p.sexo = 'ambos';";

                  //where p.sexo = 'hombre' OR p.sexo = 'ambos';
      

      $query = mysqli_query($this -> conn, $string);

      $data = mysqli_fetch_all($query);

      return $data;
    }
  }