<?php

class User_Model
{
  private $iduser;
  private $name;
  private $username;
  private $email;
  private $type;
  private $cellphone;
  private $password;
  private $idprofile;
  private $created_at;
  private $updated_at;
  private $active;

  public function getIdUser()
  {
    return $this->iduser;
  }

  public function setIdUser($iduser)
  {
    $this->iduser = $iduser;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getCellphone()
  {
    return $this->cellphone;
  }

  public function setCellphone($cellphone)
  {
    $this->cellphone = $cellphone;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getIdprofile()
  {
    return $this->idprofile;
  }

  public function setIdprofile($idprofile)
  {
    $this->idprofile = $idprofile;
  }

  public function getActive()
  {
    return $this->active;
  }

  public function setActive($active)
  {
    $this->active = $active;
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

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getCreateAt()
  {
    return $this->create_at;
  }

  public function setCreateAt($create_at)
  {
    $this->create_at = $create_at;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function store()
  {
    $table = 'user';
    $statement = 'name = ?, username = ?, email = ?, cellphone = ?, password = PASSWORD(?), type = ?, created_at = ?, updated_at = ?';
    $params = [$this->name, $this->username, $this->email, $this->cellphone, $this->password, $this->type, $this->created_at, $this->updated_at];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      http_response_code(200);
      return model::lastId('user', null, 'iduser');
    } else {
      http_response_code(400);
      return false;
    }

  }

  public function select()
  {
    $fields = '*';
    $table = 'user';
    $statement = 'where iduser = ?';
    $params = [$this->iduser];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->name = $r['name'];
      $this->username = $r['username'];
      $this->email = $r['email'];
      $this->cellphone = $r['cellphone'];
      $this->created_at = $r['created_at'];
      $this->updated_at = $r['updated_at'];
      $this->active = $r['active'];

      $res = [
        'iduser' => $r['iduser'],
        'name' => $r['name'],
        'username' => $r['username'],
        'email' => $r['email'],
        'type' => $r['type'],
        'cellphone' => $r['cellphone'],
        'created_at' => $r['created_at'],
        'updated_at' => $r['updated_at'],
        'active' => $r['active']
      ];
    }
    return $res;
  }

  public function listing()
  {
    $fields = '*';
    $table = 'user';
    $statement = 'where 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'iduser' => $r['iduser'],
        'name' => $r['name'],
        'type' => $r['type'],
        'username' => $r['username'],
        'email' => $r['email'],
        'cellphone' => $r['cellphone'],
        'created_at' => $r['created_at'],
        'updated_at' => $r['updated_at'],
        'active' => $r['active'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'user';
    $where = 'where id = ?';
    $statement = 'name = ?, username = ?, email = ?, cellphone = ?, password = ?, Idprofile = ?, updated_at = ?, active = ?';
    $params = [$this->name, $this->username, $this->email, $this->cellphone, $this->password, $this->idprofile, $this->updated_at, $this->active, $this->id];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function delete()
  {
    $table = 'user';
    $statement = 'where id = ?';
    $params = [$this->id];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }

  public function udpatePassword()
  {
    $table = 'user';
    $statement = 'password = PASSWORD(?)';
    $where = 'where id = ?';
    $params = [$this->iduser, $this->password];

    $q = model::update($table, $statement, $params, $where);

    if ($q) {
      http_response_code(200);
      return true;
    } else {
      http_response_code(200);
      return false;
    }

  }

  public function setAccess(){
    $fields = '*';
    $table = 'user';
    $statement = 'where username = ? and password = PASSWORD(?)';
    $params = [$this->username, $this->password];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res = [
        'iduser' => $r['iduser'],
        'name' => $r['name'],
        'type' => $r['type'],
        'username' => $r['username'],
        'password' => $r['password'],
        'email' => $r['email'],
        'cellphone' => $r['cellphone'],
        'created_at' => $r['created_at'],
        'updated_at' => $r['updated_at'],
        'active' => $r['active'],
      ];
    }

    session_cache_expire(300);
    session_start();
    $_SESSION['iduser'] = $res['iduser'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['password'] = $res['password'];
    $_SESSION['name'] = $res['name'];
    $_SESSION['active'] = $res['active'];
    //print_r($_SESSION);
    if ($q->rowCount() >= 1) {
      return true;
    } else {
      return false;
    }
  }

  public function logout(){
    session_start();
    session_destroy();
  }

}