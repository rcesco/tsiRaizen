<?php

class audit_controller extends Controller
{
  public function index()
  {
    $id = $this->getParams('id');

    $a = new Audit_Model();

    if (isset($id)) {
      $this->data['id'] = $id;

      $this->view('audit/store');
    } else {
      $this->view('audit/list');
    }
  }

  public function store()
  {
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new Audit_Model();

    $values = isset($post['formValues']) ? $post['formValues'] : null;

    if ($values) {
      $a->setDescription($values['description']);
      if (isset($values['idaudit']) && $values['idaudit'] > 0) {
        $a->setId($values['idaudit']);
        $a->setActive($values['active']);
        $a->update();
        echo json_encode(['msg' => 'Auditoria Alterada Com Sucesso!']);
      } else if (isset($values['description'])) {
        $id = $a->store();
        echo json_encode(['id' => $id, 'msg' => 'Auditoria Cadastrada Com Sucesso!']);
      }
    } else {
      $this->view('audit/store');
    }

  }

  public function listing()
  {
    $a = new Audit_Model();

    $data = $a->listing();

    foreach ($data as $k => $v) {
      $data[$k]['active'] =
        $v['active'] ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>';
      $data[$k]['options'] = '
        <a class="btn btn-icon btn-sm btn-primary" href="' . HTTP_SERVER . 'audit/' . $v['idaudit'] . '"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-icon btn-sm btn-danger" href="#" onclick="deleteAudit(' . $v['idaudit'] . ')"><i class="ri-delete-bin-2-fill"></i></a>
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

    $a = new Audit_Model();

    $a->setId($post['id']);
    $data = $a->select();

    echo json_encode($data);
  }

  public function delete(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new Audit_Model();
    $a->setId($post['id']);

    $res = $a->delete();

    echo json_encode($res ? ['msg' => 'Auditoria Deleteda!'] :['msg' => 'Auditoria não pode ser Deleteda!']);
  }

  public function test(){
    $this->view('audit/test');
  }
}