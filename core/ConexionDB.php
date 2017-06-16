<?php
class ConexionDB{
  private $conn;

  public function __construct(){
    $this -> conn = mysqli_connect('us-cdbr-iron-east-03.cleardb.net', 'bf98e650d2c1e8', '4484b84b', 'heroku_6c4e448085e0350', '3306');
    //if(!$this -> conn){
    //  echo 'Problemas de conexion al servidor';
    //  exit();
    //}

  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    //mysqli_select_db($this -> conn, 'heroku_1dc4dabb03f9b5c');
  }

  public function conectar(){
    return $this -> conn;
  }
}
