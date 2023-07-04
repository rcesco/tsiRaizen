<?php

class User_Model
{
  private $iduser;
  private $name;
  private $username;
  private $email;
  private $cellphone;
  private $password;
  private $idprofile;
  private $create_at;
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

  public function store()
  {
    $table = 'user';
    $statement = 'name = ?, username = ?, email = ?, cellphone = ?, password = ?, Idprofile = ?, created_at = ?, updated_at = ?';
    $params = [$this->name, $this->username, $this->email, $this->cellphone, $this->password, $this->idprofile, $this->created_at, $this->updated_at ];

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
    $table = 'user';
    $statement = 'where id = ?';
    $params = [$this->id];

    $q = model::select($fields, $table, $statement, $params);

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->name = $r['name'];
      $this->username = $r['username'];
      $this->email = $r['email'];
      $this->cellphone = $r['cellphone'];
      $this->idprofile = $r['idprofile'];
      $this->created_at = $r['created_at'];
      $this->updated_at = $r['updated_at'];
      $this->active = $r['active'];
    }

  }

  public function listing()
  {
    $fields = '*';
    $table = 'user';
    $statement = 'where 1 = 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'name' => $r['name'],
        'username' => $r['username'],
        'email' => $r['email'],
        'cellphone' => $r['cellphone'],
        'idprofile' => $r['idprofile'],
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
    $params = [$this->name, $this->username, $this->email, $this->cellphone, $this->password, $this->idprofile, $this->updated_at, $this->active, $this->id ];

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
}