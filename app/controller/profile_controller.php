<?php

class profile_controller extends Controller
{
  public function index()
  {
    $idprofile = $this->getParams('idprofile');

    $t = new Profile_Model();

    if (isset($idprofile)) {
      $this->data['idprofile'] = $idprofile;

      $this->view('profile/store');
    } else {
      $this->view('profile/list');
    }
  }

  public function store()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new Profile_Model();

    $values = isset($post['formValues']) ? $post['formValues'] : null;

    var_dump($values);

    if($values){
      $t->setIdprofile($values['idprofile']);
      $t->setName($values['name']);

      if ($values['idprofile'] > 0) {
        $t->setId($values['idprofile']);
        $t->update();
        echo json_encode(['msg' => 'Perfil Alterado Com Sucesso!']);
      } else if (isset($values['document'])) {
        $id = $t->store();
        echo json_encode(['id' => $id, 'msg' => 'Perfil Cadastrado Com Sucesso!']);
      }
    } else {
      $this->view('profile/store');
    }

  }

  public function listing()
  {
    $t = new Profile_Model();

    $data = $t->listing();

    foreach ($data as $k => $v) {
      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="' . HTTP_SERVER . 'profile/' . $v['idprofile'] . '"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteProfile(' . $v['idprofile'] . ')"><i class="ri-delete-bin-2-fill"></i></a>
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

  public function select()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new Profile_Model();

    $t->setId($post['id']);
    $data = $t->select();

    echo json_encode($data);
  }

  public function delete()
  {

  }
}