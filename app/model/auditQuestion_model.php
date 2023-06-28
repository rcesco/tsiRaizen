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
    $table = 'audit_question';
    $statement = '
      description = ?, answering = ?, reference = ?, pillar = ?, module = ?, concept = ?, percent_note = ?, idaudit = ?
    ';
    $params = [
      $this->description, $this->asnwering, $this->reference, $this->pillar, $this->module, $this->concept,
      $this->percent_note, $this->idaudit
    ];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function select()
  {
    $fields = '*';
    $table = 'audit_question';
    $statement = 'where idaudit_question = ?';
    $params = [$this->id];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->description = $r['description'];
      $this->asnwering = $r['asnwering'];
      $this->reference = $r['reference'];
      $this->pillar = $r['pillar'];
      $this->module = $r['module'];
      $this->concept = $r['concept'];
      $this->percent_note = $r['percent_note'];
      $this->idaudit = $r['idaudit'];
      $this->created_at = $r['created_at'];
      $this->updated_at = $r['updated_at'];

      $res = [
        'idaudit_question' => $r['idaudit_question'],
        'description' => $r['description'],
        'asnwering' => $r['asnwering'],
        'reference' => $r['reference'],
        'pillar' => $r['pillar'],
        'module' => $r['module'],
        'concept' => $r['concept'],
        'percent_note' => $r['percent_note'],
        'idaudit' => $r['idaudit'],
        'created_at' => $r['created_at'],
        'updated_at' => $r['updated_at'],
      ];
    }
    return $res;
  }

  public function listing()
  {
    $fields = '*';
    $table = 'audit_question';
    $statement = 'where 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'idaudit_question' => $r['idaudit_question'],
        'description' => $r['description'],
        'asnwering' => $r['asnwering'],
        'reference' => $r['reference'],
        'pillar' => $r['pillar'],
        'module' => $r['module'],
        'concept' => $r['concept'],
        'percent_note' => $r['percent_note'],
        'idaudit' => $r['idaudit'],
        'created_at' => $r['created_at'],
        'updated_at' => $r['updated_at'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'audit_question';
    $statement = 'description = ?, answering = ?, reference = ?, pillar = ?, module = ?, concept = ?, percent_note = ?, idaudit = ?';
    $where = 'where idaudit_question = ?';
    $params = [
      $this->description, $this->asnwering, $this->reference, $this->pillar, $this->module, $this->concept,
      $this->percent_note, $this->idaudit, $this->id
    ];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function delete()
  {
    $table = 'audit_question';
    $statement = 'where idaudit_question = ?';
    $params = [$this->id];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }
}