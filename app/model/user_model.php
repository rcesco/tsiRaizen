<?php

namespace model;

class User_Model
{
  private $id;
  private $name;
  private $cellphone;
  private $username;
  private $email;
  private $password;
  private $access;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
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

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getAccess()
  {
    return $this->access;
  }

  public function setAccess($access)
  {
    $this->access = $access;
  }

  public function store()
  {
    $table = 'user';
    $statement = 'username = ?, email = ?, password = ?, access = ?';
    $params = [$this->username, $this->email, $this->password, $this->access];

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
      $this->username = $r['username'];
      $this->email = $r['email'];
      $this->access = $r['access'];
    }

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
        'name' => $r['name'],
        'username' => $r['username'],
        'email' => $r['email'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'user';
    $statement = 'username = ?, name = ?, password = ?, email = ? ';
    $where = 'where id = ?';
    $params = [$this->username, $this->name, $this->password, $this->email, $this->id];

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