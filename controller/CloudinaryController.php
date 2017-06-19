<?php
  include_once 'model/CloudinaryModel.php';

  class CloudinaryController{
    private $model;

    public function __construct(){
      $this->model = new CloudinaryModel();
    }

    public function uploadImage($urlImage){
    	return $this->model->uploadImage($urlImage);
  	}
  }