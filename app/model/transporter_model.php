<?php
class Transporter_Model
{
  private $id;
  private $name;
  private $document;
  private $zip_code;
  private $address;
  private $number;
  private $complement;
  private $district;
  private $city;
  private $state;
  private $phone;
  private $latitude;
  private $longitude;
  private $note;
  private $active;
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

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getDocument()
  {
    return $this->document;
  }

  public function setDocument($document)
  {
    $this->document = $document;
  }

  public function getZipCode()
  {
    return $this->zip_code;
  }

  public function setZipCode($zip_code)
  {
    $this->zip_code = $zip_code;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function setNumber($number)
  {
    $this->number = $number;
  }

  public function getComplement()
  {
    return $this->complement;
  }

  public function setComplement($complement)
  {
    $this->complement = $complement;
  }

  public function getDistrict()
  {
    return $this->district;
  }

  public function setDistrict($district)
  {
    $this->district = $district;
  }

  public function getCity()
  {
    return $this->city;
  }

  public function setCity($city)
  {
    $this->city = $city;
  }

  public function getState()
  {
    return $this->state;
  }

  public function setState($state)
  {
    $this->state = $state;
  }

  public function getPhone()
  {
    return $this->phone;
  }

  public function setPhone($phone)
  {
    $this->phone = $phone;
  }

  public function getLatitude()
  {
    return $this->latitude;
  }

  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }

  public function getLongitude()
  {
    return $this->longitude;
  }

  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }

  public function getNote()
  {
    return $this->note;
  }

  public function setNote($note)
  {
    $this->note = $note;
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