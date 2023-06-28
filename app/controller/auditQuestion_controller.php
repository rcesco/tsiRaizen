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
      $a->setDescription($values['description']);
      $a->setAsnwering($values['answering']);
      $a->setReference($values['reference']);
      $a->setPillar($values['pillar']);
      $a->setModule($values['module']);
      $a->setConcept($values['concept']);
      $a->setPercentNote($values['percent_note']);
      $a->setIdaudit($values['idaudit']);
      if ($values['idaudit_question'] > 0) {
        $a->setId($values['idaudit_question']);
        $a->update();
        echo json_encode(['msg' => 'Questão Alterada Com Sucesso!']);
      } else if (isset($values['description'])) {
        $id = $a->store();
        echo json_encode(['id' => $id, 'msg' => 'Questão Cadastrada Com Sucesso!']);
      }
    }
  }

  public function listing(){

  }

  public function select(){

  }

  public function delete(){

  }


}