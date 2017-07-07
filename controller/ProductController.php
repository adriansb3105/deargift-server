<?php
  include_once 'model/ProductModel.php';
  include_once 'domain/Product.php';
  include_once 'domain/Cesta.php';

  class ProductController{
    private $model;

    public function __construct(){
      $this->model = new ProductModel();
    }

    public function getProducts($sexo, $id_etapa, $categoria, $color){//llamarla varias veces por cada categoria y color, evitar que los productos tengan el mismo id

      $products = array();
      $products_json = array();

      //for ($i=0; $i < sizeof($categoria); $i++) { 

         $producttmp = $this->model->getProducts($sexo, $id_etapa, $categoria, $color);

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
      //}

      //if (sizeof($products) > 0) {
      //  for ($l=0; $l < sizeof($products); $l++) { 
      //    array_push($products_json, json_encode($products[$l]));
      //  }
      //}
      

      return $products;
    }

    public function buyProduct($correo, $id, $nombre, $descripcion, $precio, $sexo, $categoria, $etapa, $color, $url){
      return $this->model->buyProduct($correo, $id, $nombre, $descripcion, $precio, $sexo, $categoria, $etapa, $color, $url);
    }

    public function getCesta($email){

      $events = array();

         $eventTmp = $this->model->getCesta($email);

         if (sizeof($eventTmp) > 0) {
          for ($k=0; $k < sizeof($eventTmp); $k++) {
            $Cesta = new Cesta();

            $Cesta->setId_producto($eventTmp[$k][0]);
            $Cesta->setNombre($eventTmp[$k][1]);
            $Cesta->setDescripcion($eventTmp[$k][2]);
            $Cesta->setPrecio($eventTmp[$k][3]);
            $Cesta->setSexo($eventTmp[$k][4]);
            $Cesta->setEtapa($eventTmp[$k][5]);
            $Cesta->setColor($eventTmp[$k][6]);
            $Cesta->setCategoria($eventTmp[$k][7]);
            $Cesta->setUrl($eventTmp[$k][8]);

            array_push($events, $Cesta);

          }

         }

      return $events;
    }

  }