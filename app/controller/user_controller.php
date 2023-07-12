<?php

class user_controller extends Controller
{
  public function index()
  {
    $id = $this->getParams('id');

    $u = new User_Model();

    if (isset($id)) {
      $this->data['id'] = $id;

      $this->view('user/store');
    } else {
      $this->view('user/list');
    }
  }

  public function store()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $t = new User_Model();

    $values = $post['formValues'];

    if ($values) {
      $t->setName($values['name']);
      $t->setUserName($values['username']);
      $t->setEmail($values['email']);
      $t->setCellphone($values['cellphone']);
      $t->setPassword($values['password']);
      $t->setType($values['type']);
      $t->setCreatedAt(date('Y-m-d H:i:s'));
      $t->setUpdatedAt(date('Y-m-d H:i:s'));

      if (isset($values['iduser']) && $values['iduser'] > 0) {
        $t->setIdUser($values['iduser']);
        $t->setActive($values['active']);
        $t->update();
        echo json_encode(['msg' => 'Usuario Alterado Com Sucesso!']);
      } else if (isset($values['name'])) {
        $id = $t->store();
        echo json_encode(['id' => $id, 'msg' => 'Usuario Cadastrado Com Sucesso!']);
      }
    } else {
      $this->view('user/store');
    }

  }

  public function listing()
  {
    $t = new User_Model();

    $data = $t->listing();

    foreach ($data as $k => $v) {
      $data[$k]['active'] =
        $v['active'] ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>';

      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="' . HTTP_SERVER . 'user/' . $v['iduser'] . '"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteUser(' . $v['iduser'] . ')"><i class="ri-delete-bin-2-fill"></i></a>
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

  public function select()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $u = new User_Model();

    $u->setIdUser($post['id']);
    $data = $u->select();

    echo json_encode($data);
  }

  public function setAccess(){
    $u = new User_Model();

    $u->setUsername($_POST['username']);
    $u->setPassword($_POST['password']);

    $response = $u->setAccess();

    if ($response) {
      header("location: " . HTTP_SERVER . "home");
    } else {
      $this->index();
    }
  }

  public function logout(){
    $u = new User_Model();

    $u->logout();

    if (isset($_COOKIE['usuario'])) {
      $this->view("lockscreen");
    } else {
      $this->view('user/login');
    }
  }
}