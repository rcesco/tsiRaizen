<?php

class user_controller extends Controller
{
  public function index()
  {
    $this->view('user/list');
  }

  public function store()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new User_Model();

    $values = $post['formValues'];

    $t->setName($values['name']);
    $t->setUserName($values['username']);
    $t->setEmail($values['email']);
    $t->setCellphone($values['cellphone']);
    $t->setPassword($values['password']);
    $t->setIdProfile($values['idprofile']);
    $t->setCreatedAt(new DateTime());
    $t->setUpdatedAt(new DateTime());

    if ($values['iduser'] > 0) {
      $t->setIdUser($values['iduser']);
      $t->setActive($values['active']);
    } else if (isset($values['document'])) {
      $t->store();
    } else {
      $this->view('user/store');
    }

  }

  public function listing()
  {
    $t = new User_Model();

    $data = $t->listing();

    foreach ($data as $k => $v){
      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="'.HTTP_SERVER.'user/'.$v['iduser'].'"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteUser('.$v['iduser'].')"><i class="ri-delete-bin-2-fill"></i></a>
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