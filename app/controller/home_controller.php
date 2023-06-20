<?php

  class home_controller extends Controller{
    public function index(){
      $this->VerifyLogin();
      $this->view('home');
    }

  }

?>