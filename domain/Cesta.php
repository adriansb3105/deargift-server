<?php

  class Cesta{

     public $id_producto = 0;
     public $nombre = '';
     public $descripcion = '';
     public $precio = 0;
     public $sexo = '';
     public $etapa = '';
     public $color = '';
     public $categoria = '';
     public $url = '';
    
    public function __construct(){
       $this->id_producto = 0;
       $this->nombre = '';
       $this->descripcion = '';
       $this->precio = 0;
       $this->sexo = '';
       $this->etapa = '';
       $this->color = '';
       $this->categoria = '';
       $this->url = '';
    }


    public function getId_producto(){
    	return $this->id_producto;
    }

    public function getNombre(){
    	return $this->nombre;
    }

    public function getDescripcion(){
    	return $this->descripcion;
    }

    public function getPrecio(){
    	return $this->precio;
    }

    public function getSexo(){
      return $this->sexo;
    }

    public function getEtapa(){
      return $this->etapa;
    }

    public function getColor(){
      return $this->color;
    }

    public function getCategoria(){
      return $this->categoria;
    }

    public function getUrl(){
      return $this->url;
    }



    public function setId_producto($id_producto){
    	$this->id_producto = $id_producto;
    }

    public function setNombre($nombre){
    	$this->nombre = $nombre;
    }

    public function setDescripcion($descripcion){
    	$this->descripcion = $descripcion;
    }

    public function setPrecio($precio){
    	$this->precio = $precio;
    }

    public function setSexo($sexo){
      $this->sexo = $sexo;
    }

    public function setEtapa($etapa){
      $this->etapa = $etapa;
    }

    public function setColor($color){
      $this->color = $color;
    }

    public function setCategoria($categoria){
      $this->categoria = $categoria;
    }

    public function setUrl($url){
      $this->url = $url;
    }

}
