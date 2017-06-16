<?php

    include_once 'model/DefaultModel.php';

  class DefaultController{
    private $model;

    public function __construct(){
      $this->model = new DefaultModel();
    }

    public function invoke(){
      if(isset($_GET['formulario'])){
        
        if ($_GET['formulario'] == 'registrar'){
          echo 'I am at controller';
          $respuesta = $this -> model -> insertarComentario($_POST['nombre'], $_POST['email'], $_POST['asunto'], $_POST['comentarios']);
        }elseif ($_GET['formulario'] == 'obtener') {
          $comentarios = $this -> model -> obtenerComentarios();
        }
        include 'view/formulario.php';
      }else{
        include 'view/indexView.php';
      }
    }
  }
