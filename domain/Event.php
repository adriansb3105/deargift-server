<?php

  class Event{
     public $id = 0;
     public $date = '';
     public $event = '';
     public $type = '';
    
    public function __construct(){
      $this->id = 0;
      $this->date = '';
      $this->event = '';
      $this->type = '';
    }


    public function getId(){
    	return $this->id;
    }

    public function getDate(){
    	return $this->date;
    }

    public function getEvent(){
    	return $this->event;
    }

    public function getType(){
    	return $this->type;
    }

    

    public function setId($id){
    	$this->id = $id;
    }

    public function setDate($date){
    	$this->date = $date;
    }

    public function setEvent($event){
    	$this->event = $event;
    }

    public function setType($type){
    	$this->type = $type;
    }

}
