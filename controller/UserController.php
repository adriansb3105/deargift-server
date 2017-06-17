<?php
  include_once 'model/UserModel.php';

  class UserController{
    private $model;

    public function __construct(){
      $this->model = new UserModel();
    }

    public function invoke(){
      if(isset($_GET['calendar'])){
        $JSON = '';
        $activities = $this->model->get_activity();

        if(isset($_SESSION['Secretaria'])){
          foreach ($activities as $com_ => $val_){
            if($val_[5] === 'interna'){
              //id, date_day, start_time, end_time, hours, kind, description, total
              $arr_ = array('id'=>$val_[0], 'date'=>$val_[1], 'start_time'=>$val_[2], 'end_time'=>$val_[3],
                            'hours'=>$val_[4], 'kind'=>$val_[5], 'description'=>$val_[6], 'total'=>$val_[7]);
              $JSON .= json_encode($arr_).',';
            }
          }
        }

        foreach ($activities as $com => $val_){
          if($val_[5] === 'publica'){
            $arr = array('id'=>$val_[0], 'date'=>$val_[1], 'start_time'=>$val_[2], 'end_time'=>$val_[3],
                          'hours'=>$val_[4], 'kind'=>$val_[5], 'description'=>$val_[6], 'total'=>$val_[7]);
            $JSON .= json_encode($arr).',';
          }
        }


        $events_array = $JSON;

        include 'view/calendarView.php';
      }else{
        include 'view/indexView.php';
      }
    }

    public function login($email, $password){
      return $this->model->login($email, $password);
    }
  }
