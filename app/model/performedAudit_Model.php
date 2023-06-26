<?php
class PerformedAudit_Model
{
  private $id;
  private $idaudit;
  private $idtransporter;
  private $iduser;
  private $start_date;
  private $end_date;
  private $type;
  private $note;
  private $own_drivers;
  private $not_own_drivers;
  private $employess_number;
  private $own_vehicles;
  private $not_own_vehicles;
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

  public function getIdaudit()
  {
    return $this->idaudit;
  }

  public function setIdaudit($idaudit)
  {
    $this->idaudit = $idaudit;
  }

  public function getIdtransporter()
  {
    return $this->idtransporter;
  }

  public function setIdtransporter($idtransporter)
  {
    $this->idtransporter = $idtransporter;
  }

  public function getIduser()
  {
    return $this->iduser;
  }

  public function setIduser($iduser)
  {
    $this->iduser = $iduser;
  }

  public function getStartDate()
  {
    return $this->start_date;
  }

  public function setStartDate($start_date)
  {
    $this->start_date = $start_date;
  }

  public function getEndDate()
  {
    return $this->end_date;
  }

  public function setEndDate($end_date)
  {
    $this->end_date = $end_date;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getNote()
  {
    return $this->note;
  }

  public function setNote($note)
  {
    $this->note = $note;
  }

  public function getOwnDrivers()
  {
    return $this->own_drivers;
  }

  public function setOwnDrivers($own_drivers)
  {
    $this->own_drivers = $own_drivers;
  }

  public function getNotOwnDrivers()
  {
    return $this->not_own_drivers;
  }

  public function setNotOwnDrivers($not_own_drivers)
  {
    $this->not_own_drivers = $not_own_drivers;
  }

  public function getEmployessNumber()
  {
    return $this->employess_number;
  }

  public function setEmployessNumber($employess_number)
  {
    $this->employess_number = $employess_number;
  }

  public function getOwnVehicles()
  {
    return $this->own_vehicles;
  }

  public function setOwnVehicles($own_vehicles)
  {
    $this->own_vehicles = $own_vehicles;
  }

  public function getNotOwnVehicles()
  {
    return $this->not_own_vehicles;
  }

  public function setNotOwnVehicles($not_own_vehicles)
  {
    $this->not_own_vehicles = $not_own_vehicles;
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