<?php
class Profile_Model
{
  private $idprofile;
  private $name;
  private $active;
  private $create_at;
  private $updated_at;

  public function getIdprofile() {
    return $this->idprofile;
  }
  public function setIdprofile($value) {
    $this->idprofile = $value;
  }

  public function getName() {
    return $this->name;
  }
  public function setName($value) {
    $this->name = $value;
  }

  public function getActive() {
    return $this->active;
  }
  public function setActive($value) {
    $this->active = $value;
  }

  public function getCreate_at() {
    return $this->create_at;
  }
  public function setCreate_at($value) {
    $this->create_at = $value;
  }

  public function getUpdated_at() {
    return $this->updated_at;
  }
  public function setUpdated_at($value) {
    $this->updated_at = $value;
  }

  public function store()
  {
    $table = 'profile';
    $statement = 'idprofile = ?, name = ?, create_at = CURRENT_TIMESTAMP, updated_at = CURRENT_TIMESTAMP';
    $params = [
      $this->idprofile, $this->name ];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      return model::lastId('profile');
    } else {
      return false;
    }

  }

  public function select()
  {
    $fields = '*';
    $table = 'profile';
    $statement = 'where idprofile = ?';
    $params = [$this->idprofile];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->idprofile = $r['idprofile'];
      $this->name = $r['name'];
      $this->active = $r['active'];
      $this->create_at = $r['create_at'];
      $this->updated_at = $r['updated_at'];

      $res = [
        'idprofile' => $r['idprofile'],
        'name' => $r['name'],
        'active' => $r['active'],
        'create_at' => $r['create_at'],
        'updated_at' => $r['updated_at'],
      ];
    }
    return $res;
  }

  public function listing()
  {
    $fields = '*';
    $table = 'profile';
    $statement = 'where 1 = 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'idprofile' => $r['idprofile'],
        'name' => $r['name'],
        'active' => $r['active'],
        'create_at' => $r['create_at'],
        'updated_at' => $r['updated_at'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'profile';
    $statement = 'name = ?, active = ?, updated_at = CURRENT_TIMESTAMP';
    $where = ' where idprofile = ? ';
    $params = [$this->name, $this->active, $this->idprofile];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      http_response_code(200);
      return true;
    } else {
      http_response_code(400);
      return false;
    }

  }

  public function delete()
  {
    $table = 'profile';
    $statement = ' where idprofile = ? ';
    $params = [$this->idprofile];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

}