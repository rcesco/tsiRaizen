<?php

class profile_permission_controller extends Controller
{
  public function index()
  {
    $idprofile_permission = $this->getParams('idprofile_permission');

    $t = new Profile_Permission_Model();

    if (isset($idprofile_permission)) {
      $this->data['idprofile_permission'] = $idprofile_permission;

      $this->view('profile/store');
    } else {
      $this->view('profile/list');
    }
  }

  public function store()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new Profile_Permission_Model();

    $values = isset($post['formProfilePermissionValues']) ? $post['formProfilePermissionValues'] : null;

    if($values){
      foreach ($values as $item) {
        print_r($item);
      }
      // $t->setIdprofile_permission($values['idprofile_permission']);
      // $t->setName($values['name']);
      
      // if ($values['id'] > 0) {
      //   $t->setIdprofile_permission($values['id']);
      //   $t->update();
      //   echo json_encode(['msg' => 'Perfil Alterado Com Sucesso!']);
      // } else if (isset($values['descri'])) {
      //   $id = $t->store();
      //   echo json_encode(['id' => $id, 'msg' => 'Perfil Cadastrado Com Sucesso!']);
      // }
    } else {
      $this->view('profile/store');
    }

  }

  public function listing()
  {
    $t = new Profile_Permission_Model();

    $data = $t->listing();

    foreach ($data as $k => $v) {
      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="' . HTTP_SERVER . 'profile_permission/' . $v['idprofile_permission'] . '"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteProfile_Permission(' . $v['idprofile_permission'] . ')"><i class="ri-delete-bin-2-fill"></i></a>
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

    $t = new Profile_Permission_Model();

    $t->setId($post['id']);
    $data = $t->select();

    echo json_encode($data);
  }

  public function delete()
  {

  }
}