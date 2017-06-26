<?php
  include_once 'model/ProductModel.php';
  include_once 'domain/Product.php';

  class ProductController{
    private $model;

    public function __construct(){
      $this->model = new ProductModel();
    }

    public function getProducts($sexo, $id_etapa, $categoria, $color){//llamarla varias veces por cada categoria y color, evitar que los productos tengan el mismo id

      $products = array();
      $products_json = array();

      for ($i=0; $i < sizeof($categoria); $i++) { 

         $producttmp = $this->model->getProducts($sexo, $id_etapa, $categoria[$i], $color);

         if (sizeof($producttmp) > 0) {
          for ($k=0; $k < sizeof($producttmp); $k++) {
            $Product = new Product();

            $Product->setId($producttmp[$k][0]);
            $Product->setNombre($producttmp[$k][1]);
            $Product->setDescripcion($producttmp[$k][2]);
            $Product->setPrecio($producttmp[$k][3]);
            $Product->setSexo($producttmp[$k][4]);
            $Product->setCategoria($producttmp[$k][5]);
            $Product->setEtapa($producttmp[$k][6]);
            $Product->setColor($producttmp[$k][7]);
            $Product->setUrl($producttmp[$k][8]);

            array_push($products, $Product);
            //return $producttmp[$k];

          }

         }
      }

      //if (sizeof($products) > 0) {
      //  for ($l=0; $l < sizeof($products); $l++) { 
      //    array_push($products_json, json_encode($products[$l]));
      //  }
      //}
      

      return $products;
    }
  }