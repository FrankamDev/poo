<?php
$model = new \Models\Comment();

$commentaires = $model->findAll();
$commentaire = $model->find(1);
$model->delete(1);
class Database {
  /**
   * Retourne une connexion a la base de donnees
   * @return PDO
   */

   private static $instance = null;

  public static function getPdo()
  {
if(self::$instance === null){

  self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
}
    return self::$instance;
  }
}
