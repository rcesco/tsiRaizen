<?php
class user_controller extends Controller
{

  public function index()
  {
    $this->view('user/list');
  }

  public function store(){
    $this->view('user/store');
  }


}


?>
