<?php
class ConexionDB{
  private $conn;

  public function __construct(){
    $this -> conn = mysqli_connect('localhost', 'root', 'Serranobrenes310594');
    if(!$this -> conn){
      echo 'Problemas de conexion al servidor';
      exit();
    }
    mysqli_select_db($this -> conn, 'Prueba');
  }

  public function conectar(){
    return $this -> conn;
  }
}
