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