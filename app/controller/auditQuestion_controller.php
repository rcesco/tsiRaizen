<?php

class auditQuestion_controller extends Controller
{
  public function index(){

  }

  public function store(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new AuditQuestion_Model();

    $values = isset($post['formQuestionValues']) ? $post['formQuestionValues'] : null;

    if ($values) {
      $a->setDescription($values['descriptionQuestion']);
      $a->setAnswering($values['answering']);
      $a->setReference($values['reference']);
      $a->setPillar($values['pillar']);
      $a->setModule($values['module']);
      $a->setConcept($values['concept']);
      $a->setPercentNote($values['percent_note']);
      $a->setIdaudit($values['idaudit']);
      if (isset($values['idaudit_question']) && $values['idaudit_question'] != '') {
        $a->setId($values['idaudit_question']);
        $a->update();
        echo json_encode(['msg' => 'Questão Alterada Com Sucesso!']);
      } else if (isset($values['descriptionQuestion'])) {
        $id = $a->store();
        echo json_encode(['id' => $id, 'msg' => 'Questão Cadastrada Com Sucesso!']);
      }
    }
  }

  public function listing(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new AuditQuestion_Model();
    $a->setIdaudit($post['id']);

    $data = $a->listing();

    foreach ($data as $k => $v){
      $data[$k]['options'] = '
        <a class="btn btn-sm btn-icon btn-secondary" onclick="getQuestion('.$v['idaudit_question'].')"><i class="ri-edit-2-fill"></i></a>
        <a class="btn btn-sm btn-icon btn-danger" onclick="deleteQuestion('.$v['idaudit_question'].')"><i class="ri-delete-bin-2-fill"></i></a>
      ';
    }

    echo json_encode($data);
  }

  public function select(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new AuditQuestion_Model();
    $a->setId($post['id']);

    $data = $a->select();

    echo json_encode($data);
  }

  public function delete(){
    $post = file_get_contents("php://input");
    $post = json_decode($post, true);

    $a = new AuditQuestion_Model();
    $a->setId($post['id']);

    $res = $a->delete();

    echo json_encode($res ? ['msg' => 'Questão Deleteda!'] :['msg' => 'Questão não pode ser Deleteda!']);
  }


}