<?php
  include_once 'model/EventModel.php';
  include_once 'domain/Event.php';

  class EventController{
    private $model;

    public function __construct(){
      $this->model = new EventModel();
    }

    public function getEvents(){

      $events = array();

         $eventTmp = $this->model->getEvents();

         if (sizeof($eventTmp) > 0) {
          for ($k=0; $k < sizeof($eventTmp); $k++) {
            $Event = new Event();

            $Event->setId($eventTmp[$k][0]);
            $Event->setDate($eventTmp[$k][1]);
            $Event->setEvent($eventTmp[$k][2]);
            $Event->setType($eventTmp[$k][3]);

            array_push($events, $Event);

          }

         }

      return $events;
    }

    public function createEvent($date, $desc, $type){
      return $this->model->createEvent($date, $desc, $type);
    }

  }