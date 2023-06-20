<?php


abstract class db
{
  private static $host = "mysql.hostinger.com.br";
  private static $dbname = "u935454432_depalexandre";
  private static $user = "u935454432_depalexandre";
  private static $password = "NFq/jg+4I";
  private static $cnx;

  private static function setConn()
  {
    try {
      if (is_null(db::$cnx)) {
        db::$cnx = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u935454432_depalexandre', 'u935454432_depalexandre', 'NFq/jg+4I', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return db::$cnx;
      } else {
        return db::$cnx;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public static function getConn()
  {
    return db::setConn();
  }

}


?>