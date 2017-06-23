<?php

  class Product{
     public $id = 0;
     public $nombre = '';
     public $descripcion = '';
     public $precio = '';
     public $sexo = '';
     public $categoria = '';
     public $etapa = '';
     public $color = '';
     public $url = '';

    
    public function __construct(){
      $this->id = 0;
      $this->nombre = '';
      $this->descripcion = '';
      $this->precio = '';
      $this->sexo = '';
      $this->categoria = '';
      $this->etapa = '';
      $this->color = '';
      $this->url = '';
    }

    /*public function __construct($id, $nombre, $descripcion, $precio, $sexo, $categoria, $etapa, $color, $url){
      $this->id = $id;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
      $this->precio = $precio;
      $this->sexo = $sexo;
      $this->categoria = $categoria;
      $this->etapa = $etapa;
      $this->color = $color;
      $this->url = $url;
    }*/

    public function getId(){
    	return $this->id;
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

    public function getCategoria(){
    	return $this->categoria;
    }

    public function getEtapa(){
    	return $this->etapa;
    }

    public function getColor(){
    	return $this->color;
    }

    public function getUrl(){
    	return $this->url;
    }

    public function setId($id){
    	$this->id = $id;
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

    public function setCategoria($categoria){
    	$this->categoria = $categoria;
    }

    public function setEtapa($etapa){
    	$this->etapa = $etapa;
    }

    public function setColor($color){
    	$this->color = $color;
    }

    public function setUrl($url){
    	$this->url = $url;
    }
}
