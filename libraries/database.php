<?php
class Database {
  /**
   * Retourne une connexion a la base de donnees
   * @return PDO
   */
  public static function getPdo()
  {

    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
  }
}
