<?php
  include_once 'model/ProductModel.php';

  class ProductController{
    private $model;

    public function __construct(){
      $this->model = new ProductModel();
    }

    public function getProducts($id_sexo, $id_etapa, $categoria, $color){//llamarla varias veces por cada categoria y color, evitar que los productos tengan el mismo id

      $products = array();

      for ($i=0; $i < sizeof($categoria); $i++) { 
       for ($j=0; $j < sizeof($color); $j++) {
         $producttmp = $this->model->getProducts($id_sexo, $id_etapa, $categoria[$i], $color[$j]);

         if (sizeof($producttmp) > 0) {
          for ($k=0; $k < sizeof($producttmp); $k++) {
            array_push($products, $producttmp[$k]);
            //return $producttmp[$k];
          }

         }
        }
      }

      return $products;
    }
  }