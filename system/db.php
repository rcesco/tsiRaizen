<?php


abstract class db
{
  private static $host = "mysql.hostinger.com.br";
  private static $dbname = "u390472747_tsi";
  private static $user = "u390472747_tsi";
  private static $password = "TfBc@3TAZa[2";
  private static $cnx;

  private static function setConn()
  {
    try {
      if (is_null(db::$cnx)) {
        db::$cnx = new PDO('mysql:host=srv795.hstgr.io;dbname=u390472747_tsi', 'u390472747_tsi', 'TfBc@3TAZa[2', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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