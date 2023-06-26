<?php

class AuditQuestionPerformed_Model
{
  private $id;
  private $idaudit_question;
  private $idperformed_audit;
  private $own_sampling;
  private $own_attendance;
  private $sub_sampling;
  private $sub_attendance;
  private $note;
  private $created_at;
  private $updated_at;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getIdauditQuestion()
  {
    return $this->idaudit_question;
  }

  public function setIdauditQuestion($idaudit_question)
  {
    $this->idaudit_question = $idaudit_question;
  }

  public function getIdperformedAudit()
  {
    return $this->idperformed_audit;
  }

  public function setIdperformedAudit($idperformed_audit)
  {
    $this->idperformed_audit = $idperformed_audit;
  }

  public function getOwnSampling()
  {
    return $this->own_sampling;
  }

  public function setOwnSampling($own_sampling)
  {
    $this->own_sampling = $own_sampling;
  }

  public function getOwnAttendance()
  {
    return $this->own_attendance;
  }

  public function setOwnAttendance($own_attendance)
  {
    $this->own_attendance = $own_attendance;
  }

  public function getSubSampling()
  {
    return $this->sub_sampling;
  }

  public function setSubSampling($sub_sampling)
  {
    $this->sub_sampling = $sub_sampling;
  }

  public function getSubAttendance()
  {
    return $this->sub_attendance;
  }

  public function setSubAttendance($sub_attendance)
  {
    $this->sub_attendance = $sub_attendance;
  }

  public function getNote()
  {
    return $this->note;
  }

  public function setNote($note)
  {
    $this->note = $note;
  }

  public function getCreatedAt()
  {
    return $this->created_at;
  }

  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;
  }

  public function getUpdatedAt()
  {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at)
  {
    $this->updated_at = $updated_at;
  }

  public function store()
  {
    $table = '';
    $statement = '';
    $params = [];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function select()
  {
    $fields = '';
    $table = '';
    $statement = '';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
    }

  }

  public function listing()
  {
    $fields = '';
    $table = '';
    $statement = '';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [];
    }
    return $res;
  }

  public function update()
  {
    $table = '';
    $statement = '';
    $where = '';
    $params = [];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function delete()
  {
    $table = '';
    $statement = '';
    $params = [];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

}