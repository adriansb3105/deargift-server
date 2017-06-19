<?php

require '../cloudinary/Cloudinary.php';
require '../cloudinary/Uploader.php';
require '../cloudinary/Api.php';


\Cloudinary::config(array( 
  "cloud_name" => "adriansb3105", 
  "api_key" => "314278813578557", 
  "api_secret" => "TZJQ4zvPzyOh_VKQr4RZOFH8bEs" 
));


class CloudinaryModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function uploadImage($urlImage){
    $array_image = \Cloudinary\Uploader::upload($urlImage);
    return $array_image;
  }
}
