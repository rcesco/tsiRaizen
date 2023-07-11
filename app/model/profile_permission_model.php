<?php
class Profile_Permission_Model
{
  private $idprofile_permission;
  private $idprofile;
  private $permission;
  private $value;
  private $active;
  private $create_at;
  private $updated_at;

  public function getIdProfilePermission() {
    return $this->idProfilePermission;
  }
  public function setIdProfilePermission($value) {
    $this->idProfilePermission = $value;
  }

  public function getIdprofile() {
    return $this->idprofile;
  }
  public function setIdprofile($value) {
    $this->idprofile = $value;
  }

  public function getPermission() {
    return $this->permission;
  }
  public function setPermission($value) {
    $this->permission = $value;
  }

  public function getValue() {
    return $this->value;
  }
  public function setValue($value) {
    $this->value = $value;
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
    $table = 'profile_permission';
    $statement = 'idprofile = ?, permission = ?, value = ?, create_at = CURRENT_TIMESTAMP, updated_at = CURRENT_TIMESTAMP';
    $params = [
      $this->idprofile, $this->permission, $this->value ];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      return model::lastId('profile_permission');
    } else {
      return false;
    }

  }

  public function select()
  {
    $fields = '*';
    $table = 'profile_permission';
    $statement = 'where idprofile_permission = ?';
    $params = [$this->idprofile_permission];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->idprofile_permission = $r['idprofile_permission'];
      $this->idprofile = $r['idprofile'];
      $this->permission = $r['permission'];
      $this->value = $r['value'];
      $this->active = $r['active'];
      $this->create_at = $r['create_at'];
      $this->updated_at = $r['updated_at'];

      $res = [
        'idprofile_permission' => $r['idprofile_permission'],
        'idprofile' => $r['idprofile'],
        'permission' => $r['permission'],
        'value' => $r['value'],
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
    $table = 'profile_permission';
    $statement = 'where 1 = 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'idprofile_permission' => $r['idprofile_permission'],
        'idprofile' => $r['idprofile'],
        'permission' => $r['permission'],
        'value' => $r['value'],
        'active' => $r['active'],
        'create_at' => $r['create_at'],
        'updated_at' => $r['updated_at'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'profile_permission';
    $statement = 'idprofile = ?, permission = ?, value = ?, active = ?, updated_at = CURRENT_TIMESTAMP';
    $where = ' where idprofile_permission = ? ';
    $params = [$this->idprofile, $this->permission, $this->value, $this->active, $this->idprofile_permission];

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
    $table = 'profile_permission';
    $statement = ' where idprofile_permission = ? ';
    $params = [$this->idprofile_permission];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

}