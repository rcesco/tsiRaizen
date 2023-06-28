<?php

class profile_controller extends Controller
{
  public function index(){
    $this->view('profile/list');
  }

  public function store(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new Transporter_Model();

    $values = $post['formValues'];

    $t->setName($values['name']);
    $t->setDocument($values['document']);
    $t->setZipCode($values['zip_code']);
    $t->setAddress($values['address']);
    $t->setNumber($values['number']);
    $t->setComplement($values['complement']);
    $t->setDistrict($values['district']);
    $t->setCity($values['city']);
    $t->setState($values['state']);
    $t->setPhone($values['phone']);
    $t->setLatitude($values['latitude']);
    $t->setLongitude($values['longitude']);
    $t->setNote($values['note']);

    if($values['idtransporter'] > 0 ){
      $t->setId($values['idtransporter']);
    }else if (isset($values['document'])){
      $t->store();
    }else{
      $this->view('transporter/store');
    }

  }

  public function listing(){

  }

  public function delete(){

  }
}