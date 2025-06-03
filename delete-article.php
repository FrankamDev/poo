<?php
require_once('./libraries/database.php');
require_once('./libraries/utils.php');
require_once('./libraries/models/Article.php');


$model = new Article();

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$id = $_GET['id'];


$pdo = getPdo();

/**  
 * 3. Vérification que l'article existe bel et bien
 */
$article = $model->find($id);

if (!$article) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

$model->delete($id);
redirect('index.php');
