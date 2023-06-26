<?php
class AuditQuestion_Model
{
  private $id;
  private $idaudit;
  private $description;
  private $asnwering;
  private $reference;
  private $pillar;
  private $module;
  private $concept;
  private $percent_note;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getIdaudit()
  {
    return $this->idaudit;
  }

  public function setIdaudit($idaudit)
  {
    $this->idaudit = $idaudit;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getAsnwering()
  {
    return $this->asnwering;
  }

  public function setAsnwering($asnwering)
  {
    $this->asnwering = $asnwering;
  }

  public function getReference()
  {
    return $this->reference;
  }

  public function setReference($reference)
  {
    $this->reference = $reference;
  }

  public function getPillar()
  {
    return $this->pillar;
  }

  public function setPillar($pillar)
  {
    $this->pillar = $pillar;
  }

  public function getModule()
  {
    return $this->module;
  }

  public function setModule($module)
  {
    $this->module = $module;
  }

  public function getConcept()
  {
    return $this->concept;
  }

  public function setConcept($concept)
  {
    $this->concept = $concept;
  }

  public function getPercentNote()
  {
    return $this->percent_note;
  }

  public function setPercentNote($percent_note)
  {
    $this->percent_note = $percent_note;
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