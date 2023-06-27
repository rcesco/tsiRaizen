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
    $table = 'transporter';
    $statement = '
      name = ?, document = ?, zip_code = ?, address = ?, number = ?, complement = ?, district = ?, city = ?,
      state = ?, phone = ?, latitude = ?, longitude = ?, note = ? 
    ';
    $params = [
      $this->name, $this->document, $this->zip_code, $this->address, $this->number, $this->complement,
      $this->district, $this->city, $this->state, $this->phone, $this->latitude,
      $this->longitude, $this->note
    ];

    $q = model::insert($table, $statement, $params);

    if ($q) {
      return model::lastId('transporter');
    } else {
      return false;
    }

  }

  public function select()
  {
    $fields = '*';
    $table = 'transporter';
    $statement = 'where idtransporter = ?';
    $params = [$this->id];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $this->name = $r['name'];
      $this->document = $r['document'];
      $this->zip_code = $r['zip_code'];
      $this->address = $r['address'];
      $this->number = $r['number'];
      $this->complement = $r['complement'];
      $this->district = $r['district'];
      $this->city = $r['city'];
      $this->state = $r['state'];
      $this->phone = $r['phone'];
      $this->latitude = $r['latitude'];
      $this->longitude = $r['longitude'];
      $this->note = $r['note'];

      $res = [
        'idtransporter' => $r['idtransporter'],
        'name' => $r['name'],
        'document' => $r['document'],
        'zip_code' => $r['zip_code'],
        'address' => $r['address'],
        'number' => $r['number'],
        'complement' => $r['complement'],
        'district' => $r['district'],
        'city' => $r['city'],
        'state' => $r['state'],
        'phone' => $r['phone'],
        'latitude' => $r['latitude'],
        'longitude' => $r['longitude'],
        'note' => $r['note'],
      ];
    }
    return $res;
  }

  public function listing()
  {
    $fields = '*';
    $table = 'transporter';
    $statement = 'where 1';
    $params = [];

    $q = model::select($fields, $table, $statement, $params);

    $res = [];

    while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
      $res[] = [
        'idtransporter' => $r['idtransporter'],
        'name' => $r['name'],
        'document' => $r['document'],
        'zip_code' => $r['zip_code'],
        'address' => $r['address'],
        'number' => $r['number'],
        'complement' => $r['complement'],
        'district' => $r['district'],
        'city' => $r['city'],
        'state' => $r['state'],
        'phone' => $r['phone'],
        'latitude' => $r['latitude'],
        'longitude' => $r['longitude'],
        'note' => $r['note'],
      ];
    }
    return $res;
  }

  public function update()
  {
    $table = 'transporter';
    $statement = '
      name = ?, document = ?, zip_code = ?, address = ?, number = ?, complement = ?, district = ?, city = ?,
      state = ?, phone = ?, latitude = ?, longitude = ?, note = ?, updated_at = CURRENT_TIMESTAMP
    ';
    $where = ' where idtransporter = ? ';
    $params = [
      $this->name, $this->document, $this->zip_code, $this->address, $this->number, $this->complement,
      $this->district, $this->city, $this->state, $this->phone, $this->latitude,
      $this->longitude, $this->note, $this->id
    ];

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
    $table = 'transporter';
    $statement = ' where id = ? ';
    $params = [$this->id];

    $q = model::delete($table, $statement, $params);

    if ($q) {
      return true;
    } else {
      return false;
    }

  }
}