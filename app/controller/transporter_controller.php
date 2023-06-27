<?php

class transporter_controller extends Controller
{
  public function index()
  {
    $this->view('transporter/list');
  }

  public function store()
  {
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

    if ($values['idtransporter'] > 0) {
      $t->setId($values['idtransporter']);
    } else if (isset($values['document'])) {
      $t->store();
    } else {
      $this->view('transporter/store');
    }

  }

  public function listing()
  {
    $t = new Transporter_Model();

    $data = $t->listing();

    foreach ($data as $k => $v){
      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="'.HTTP_SERVER.'transporter/'.$v['idtransporter'].'"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteTransporter('.$v['idtransporter'].')"><i class="ri-delete-bin-2-fill"></i></a>
      ';
    }

    echo json_encode(
      [
        "recordsTotal" => sizeof($data),
        "recordsFiltered" => sizeof($data),
        "data" => $data
      ]
    );
  }

  public function delete()
  {

  }
}