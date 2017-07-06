<?php

  require_once 'core/ConexionDB.php';

  class EventModel{
    private $conn;

    public function __construct(){
      $conexion = new ConexionDB();
      $this->conn = $conexion->conectar();
    }

    public function getEvents(){
      $query = mysqli_query($this -> conn, "select id, fecha, evento, tipo from Eventos;");

      $data = mysqli_fetch_all($query);

      return $data;
    }

    


    public function createEvent($date, $desc, $type){
      $query = mysqli_query($this -> conn, "call sp_insertEvents('".$date."', '".$desc."', '".$type."')");

      return $query;
    }
  }