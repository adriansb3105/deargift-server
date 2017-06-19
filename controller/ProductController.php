<?php
  include_once 'model/ProductModel.php';

  class ProductController{
    private $model;

    public function __construct(){
      $this->model = new ProductModel();
    }

    public function getProducts($id_sexo, $id_etapa, $id_categoria, $id_color){//llamarla varias veces por cada pasatiempo y color, evitar que los productos tengan el mismo id
/*
      $products = array();

      for ($i=0; $i < sizeof($pasatiempo); $i++) { 
        array_push($products, $pasatiempo[$i]);
      }


      return $products;
*/

    return $this->model->getProducts($id_sexo, $id_etapa, $id_categoria, $id_color);

    }
  }
