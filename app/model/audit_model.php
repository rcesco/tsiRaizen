<?php

class Audit_Model
{
  private $id;
  private $description;
  private $created_at;
  private $update_at;
  private $active;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getCreatedAt()
  {
    return $this->created_at;
  }

  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;
  }

  public function getUpdateAt()
  {
    return $this->update_at;
  }

  public function setUpdateAt($update_at)
  {
    $this->update_at = $update_at;
  }

  public function getActive()
  {
    return $this->active;
  }

  public function setActive($active)
  {
    $this->active = $active;
  }

  public function store()
  {
    $table = 'audit';
    $statement = 'description = ?';
    $params = [$this->description];

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
    $table = 'audit';
    $statement = 'where idaudit = ?';
    $params = [$this->id];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->id = $r['idaudit'];
      $this->description = $r['description'];
      $this->created_at = $r['created_at'];
      $this->update_at = $r['updated_at'];
      $this->active = $r['active'];

      $res = [
        'idaudit' => $r['idaudit'],
        'description' => $r['description'],
        'created_at' => $r['created_at'],
        'update_at' => $r['updated_at'],
        'active' => $r['active'],
      ];
    }
    return $res;
  }

  public function listing()
  {
    $fields = '*';
    $table = 'audit';
    $statement = 'where 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'idaudit' => $r['idaudit'],
        'description' => $r['description'],
        'created_at' => $r['created_at'],
        'update_at' => $r['updated_at'],
        'active' => $r['active'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'audit';
    $statement = 'description = ?, updated_at = CURRENT_TIMESTAMP';
    $where = 'where idaudit = ?';
    $params = [$this->description, $this->id];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function delete()
  {
    $table = 'audit';
    $statement = 'where idaudit = ?';
    $params = [$this->id];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }
}