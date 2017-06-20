<?php
  include_once 'model/ProductModel.php';

  class ProductController{
    private $model;

    public function __construct(){
      $this->model = new ProductModel();
    }

    public function getProducts($id_sexo, $id_etapa, $categoria, $color){//llamarla varias veces por cada categoria y color, evitar que los productos tengan el mismo id

      $products = array();
      $products2 = array();

      for ($i=0; $i < sizeof($categoria); $i++) { 
        for ($j=0; $j < sizeof($color); $j++) {
          array_push($products, $this->model->getProducts($id_sexo, $id_etapa, $categoria[$i], $color[$j]));
        }
      }

      
      for ($k=0; $k < sizeof($products); $k++) { 
        if(sizeof($products[$k]) > 0){
          array_push($products2, $products[$k]);
        }
      }

      return $products2;

    }
  }